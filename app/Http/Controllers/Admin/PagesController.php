<?php

/**
 * Pages Controller
 *
 * Pages Controller manages Pages by admin.
 *
 * @category   Pages
 * @package    vRent
 * @author     Techvillage Dev Team
 * @copyright  2020 Techvillage
 * @license
 * @version    2.7
 * @link       http://techvill.net
 * @email      support@techvill.net
 * @since      Version 1.3
 * @deprecated None
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\PagesDataTable;
use App\DataTables\ContactDataTable;
use App\DataTables\HelpDataTable;
use App\Models\Page;
use App\Models\Help;
use App\Models\Contact;
use Validator, Common;

class PagesController extends Controller
{
    public function index(PagesDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.view');
    }
    
     public function contactIndex(ContactDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.contact_view');
    }
     public function indexHelp(HelpDataTable $dataTable)
    {
        
        return $dataTable->render('admin.pages.help_view');
    }
    public function add(Request $request)
    {
        if (! $request->isMethod('post')) {
             return view('admin.pages.add');
        } elseif ($request->isMethod('post')) {
            $rules = array(
                    'name'           => 'required|max:100',
                    //'url'            => 'required|unique:pages|max:100',
                      'url'            => 'required|max:100',
                      'content'        => 'required',
                    'heading'       => 'required',
                    'meta_title'=>'required',
                    'meta_description'=>'required'
                    );

            $fieldNames = array(
                        'name'              => 'Name',
                        'url'               => 'Url',
                        'content'           => 'Content',
                        'heading'          => 'Heading',
                        'meta_title'          => 'Meta Title',
                        'meta_description'          => 'Meta Description'
                        );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                  $page = new Page;
                 if($request->hasfile('image'))
                {
                  
                    $file = $request->file('image');
                    $extenstion = $file->getClientOriginalExtension();
                    $filename ='banner-image'.time().'-'.date('Ymd').'.'.$extenstion;
                    $file->move('public/images/cms/banner/',$filename);
                    $page->image = $filename;
                  
                }

               
                $page->name             = $request->name;
                $page->heading          = $request->heading;
                $page->url              = $request->url;
              
                 if($request->hasfile('feature_image'))
                {
                  
                    $file = $request->file('feature_image');
                    $extenstion = $file->getClientOriginalExtension();
                    $filename ='banner-image'.time().'-'.date('Ymd').'.'.$extenstion;
                    $file->move('public/images/cms/feature_image/', $filename);
                    $page->feature_image = $filename;
                }
                $page->content          = $request->content;
                $page->meta_title          = $request->meta_title;
                $page->meta_description   = $request->meta_description;
                $page->status           = $request->status;

                $page->save();

                Common::one_time_message('success', 'Added Successfully');
                return redirect('admin/pages');
            }
        }
    }
    
    
    public function addHelp(Request $request)
    {
        if (! $request->isMethod('post')) {
             return view('admin.pages.add-help');
        } elseif ($request->isMethod('post')) {
            $rules = array(
                    'type'           => 'required|max:100',
                    'question'        => 'required',
                    'answer'        => 'required',
                    // 'meta_title'=>'required',
                    // 'meta_description'=>'required'
                    );

            $fieldNames = array(
                        'type'              => 'Type',
                        'question'           => 'Question',
                        'answer'          => 'Answer',
                        // 'meta_title'          => 'Meta Title',
                        // 'meta_description'          => 'Meta Description'
                        );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                
                  $help = new Help;
                //  if($request->hasfile('image'))
                // {
                  
                //     $file = $request->file('image');
                //     $extenstion = $file->getClientOriginalExtension();
                //     $filename ='banner-image'.time().'-'.date('Ymd').'.'.$extenstion;
                //     $file->move('public/images/cms/banner/',$filename);
                //     $help->image = $filename;
                  
                // }

                $help->type             = $request->type;
                $help->question          = $request->question;
                $help->answer              = $request->answer;
                // $page->meta_title          = $request->meta_title;
                // $page->meta_description   = $request->meta_description;
                $help->status           = $request->status;

                $help->save();

                Common::one_time_message('success', 'Added Successfully');
                return redirect('admin/help');
            }
        }
    }

    public function update(Request $request)
    {
        if (!$request->isMethod('post')) {
            $data['result'] = Page::find($request->id);

            return view('admin.pages.edit', $data);
        } elseif ($request->isMethod('post')) {
            $rules = array(
                    'name'           => 'required|max:100',
                    'url'            => 'required|max:100',
                    'content'        => 'required',
                    //'position'       => 'required|max:40',
                    'heading'       => 'required',
                    'meta_title'=>'required',
                    'meta_description'=>'required',
                    );

            $fieldNames = array(
                        'name'          => 'Name',
                        'url'           => 'Url',
                        'content'       => 'Content',
                       // 'position'      => 'Position',
                        'heading' =>'Heading',
                         'meta_title'          => 'Meta Title',
                        'meta_description'          => 'Meta Description'
                        );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                 $page = Page::find($request->id);
                 if($request->hasfile('image'))
                {
                  
                    $file = $request->file('image');
                    $extenstion = $file->getClientOriginalExtension();
                    $filename ='banner-image'.time().'-'.date('Ymd').'.'.$extenstion;
                    $file->move('public/images/cms/banner/', $filename);
                    $page->image = $filename;
                  
                }
                if($request->hasfile('feature_image'))
                {
                  
                    $file = $request->file('feature_image');
                    $extenstion = $file->getClientOriginalExtension();
                    $filename ='feature-image'.time().'-'.date('Ymd').'.'.$extenstion;
                    $file->move('public/images/cms/feature_image/', $filename);
                    $page->feature_image = $filename;
                }
                $page->name            = $request->name;
                $page->url             = $request->url;
                $page->heading          = $request->heading;
                $page->content         = $request->content;
                $page->position        = $request->position;
                $page->meta_description = $request->meta_description;
                $page->meta_title = $request->meta_title;
                $page->status          = $request->status;
                $page->save();

                Common::one_time_message('success', 'Updated Successfully');

                return redirect('admin/pages');
            }
        }
    }
    
     public function updateContact(Request $request)
    {
        if (!$request->isMethod('post')) {
            $data['result'] = Contact::find($request->id);

            return view('admin.pages.contact_edit', $data);
        } elseif ($request->isMethod('post')) {
            $rules = array(
                    'name'           => 'required|max:100',
                    'email'            => 'required',
                    'contact_no'        => 'required',
                    'address'=>'required',
                    'meta_title'=>'required',
                    'meta_description'=>'required',
                    'lat'=>'required',
                    'longitude'=>'required',
                    );

            $fieldNames = array(
                        'name'          => 'Name',
                        'email'           => 'Email',
                        'contact_no'       => 'Contact Number',
                        'address' =>'Address',
                        'meta_title'  => 'Meta Title',
                        'meta_description' => 'Meta Description',
                        'lat' => 'Latitude',
                        'longitude' => 'Longitude'
                        );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                 $contact = Contact::find($request->id);
         
                $contact->name            = $request->name;
                $contact->email             = $request->email;
                $contact->contact_no             = $request->contact_no;
                $contact->lat             = $request->lat;
                $contact->longitude             = $request->longitude;
                $contact->address = $request->address;
                $contact->meta_description = $request->meta_description;
                $contact->meta_title = $request->meta_title;
                $contact->status          = $request->status;
                $contact->save();

                Common::one_time_message('success', 'Updated Successfully');

                return redirect('admin/contact');
            }
        }
    }

    public function delete(Request $request)
    {
        Page::find($request->id)->delete();

        Common::one_time_message('success', 'Deleted Successfully');

        return redirect('admin/pages');
    }
    
     public function deleteHelp(Request $request)
    {
         Help::find($request->id)->delete();

        Common::one_time_message('success', 'Deleted Successfully');

        return redirect('admin/help');
    }
    public function uploadImage(Request $request)
    { 
        $CKEditor = $request->input('CKEditor');
        $funcNum  = $request->input('CKEditorFuncNum');
        $message  = $url = '';
        if ($request->file('upload')) {
            $file = $request->upload;

            if ($file->isValid()) {

                $filename =rand(1000,9999).$file->getClientOriginalName();

                $file->move(public_path().'/images/', $filename);
                $url = url('public/images/' . $filename);

            } else {
                $message = 'An error occurred while uploading the file.';
            }
        } else {
            $message = 'No file uploaded.';
        }
        return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
    }
}
