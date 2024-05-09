<?php
namespace App\Http\Controllers;

use Auth, DB, Session, DateTime, Common;
use Carbon\Carbon;
use App\DataTables\UserBookingsDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\{
    Controller,
};
use App\Models\{
    page,
    Bookings,
    BookingActivity,
    BookingFacility,
    PropertyRoomType,
    User,
};
use Modules\Gateway\Entities\GatewayModule;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;



class BookingController extends Controller
{
    private $helper;

    public function __construct()
    {
        $this->helper = new Common;
    }

    public function myBookings(UserBookingsDataTable $dataTable)
    {

        //hello
        $data = [];
        if (isset(request()->status)) {
            $status = '%' . request()->status . '%'; // Add wildcards
            $data['bookings'] = Bookings::where('host_id', Auth::user()->id)->where('status', 'LIKE', $status)->get();
        }

        if(isset(request()->customer_name)){
            $data['bookings'] = '%' . request()->customer_name . '%'; // Add wildcards
        }

        return $dataTable->render('booking.my_bookings', $data);

    }

    public function index(Request $request)
    {
        $data['title']      = 'Booking Details';
        $data['booking_id'] = $request->id;
        $data['result']     = Bookings::find($request->id);

        if (! $data['result'] || $data['result']->host_id != Auth::user()->id ) {

            abort('404');
        }
        $data['price_list']         = json_decode(Common::getPrice($data['result']->property_id, $data['result']->start_date, $data['result']->end_date, $data['result']->guest, true));
        $data['symbol'] = Common::getCurrentCurrencySymbol();

        return view('booking.detail', $data);
    }


    public function storeBooking(Request $request)
    {

        try {
            $bookingDetails = session()->get('booking_details');
            $host = User::find($bookingDetails['property']->host_id);

            $booking = new Bookings();
            $booking->property_id = $bookingDetails['data']['property_id'];
            $booking->user_id = Auth::user()->id;
            $booking->host_id = $bookingDetails['property']->host_id;
            $booking->code = $bookingDetails['bookingNo'];
            $booking->start_date = $bookingDetails['data']['check_in_date'];
            $booking->end_date = $bookingDetails['data']['check_out_date'];
            $booking->status = 'Reserved';
            $booking->total_night = $bookingDetails['data']['totalNights'];
            $booking->total_rooms = $bookingDetails['data']['totalRooms'];
            $booking->base_price = $bookingDetails['data']['check_out_date'];
            $booking->total_price = $bookingDetails['data']['check_out_date'];
            $booking->total_adults = $bookingDetails['data']['total_no_adults'];
            $booking->total_childrens = $bookingDetails['data']['total_no_children'];
            $booking->booking_type = '';
            $booking->currency_code = '';
            $booking->facility_id = '';
            $booking->activity_id ='';




            $hostEmail = $host->email;
            $userEmail =  Auth::user()->email;
            $bookingDetails['to_email'] = $userEmail;
            $bookingDetails['owner_email'] = $hostEmail;
            $bookingDetails['admin_email'] = 'sales@way2village.in';

            $bookingDetails['refund'] = Page::where('name', 'Refund')->first();
            $bookingDetails['cancellation'] = Page::where('name', 'Cancellation')->first();
            // $bookingDetails['roomType'] = PropertyRoomType::where('id', $bookingDetails['room_type'])->first();
            // $bookingDetails['roomTypeDetail'] = $bookingDetails['roomType']->roomType;
            $bookingDetails['propertyAddress'] =  $bookingDetails['property']->property_address;
            DB::beginTransaction();

            // return view('emails.booking_confirmation', compact('bookingDetails'));
            if($booking->save()) {
                if(count($bookingDetails['activityRecords']) > 0) {
                    foreach($bookingDetails['activityRecords'] as $record) {
                        BookingActivity::create([
                            'booking_id' => $booking->id,
                            'activity_id' => $record->id,
                            'activity_name' => $record->name,
                            'activity_price' => $record->price,
                        ]);
                    }
                }

                if(count($bookingDetails['facilityRecords']) > 0) {
                    foreach($bookingDetails['facilityRecords'] as $record) {
                        BookingFacility::create([
                            'booking_id' => $booking->id,
                            'facility_id' => $record->id,
                            'facility_name' => $record->name,
                            'facility_price' => $record->price,
                        ]);
                    }
                }

                $mail = new PHPMailer(true);
                // /* Email SMTP Settings */
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = 'way2village.in';
                $mail->SMTPAuth = true;
                $mail->Username = 'sales@way2village.in';
                $mail->Password = '!@#sales789';
                $mail->SMTPSecure = 'SSL';
                $mail->Port = '25';

                $mail->setFrom('sales@way2village.in', 'way2village');
                $mail->addAddress($bookingDetails['to_email']);
                $mail->addBCC($bookingDetails['owner_email']);
                $mail->addBCC($bookingDetails['admin_email']);

                $mail->isHTML(true);

                $mail->Subject = 'Booking Confirmation Way2Village';
                $bodyContent = View::make('emails.booking_confirmation', compact('bookingDetails'))->render();
                $mail->Body  = $bodyContent;
                $mail->send();

                DB::commit();

                return Redirect::to('dashboard')->with('success_message', 'Booking successful.');

            } else {
                throw new Exception("Booking could not be saved.");
            }
        } catch (Exception $e) {
            DB::rollback();
            return Redirect::back()->with('error_message', 'Error: ' . $e->getMessage());
        }
    }
}

