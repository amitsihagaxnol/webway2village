@extends('admin.template')
@section('main')

    <div class="content-wrapper">
    <!-- Main content -->
        <section class="content-header">
            <h1>
                List Your Space
                <small>List Your Space</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            </ol>
        </section>

        <section class="content">
            <div class="row gap-2">
                <div class="col-md-3 settings_bar_gap">
                    @include('admin.common.property_bar')
                </div>
                <div class="col-md-9">
                    <form method="post" action="{{ url('admin/listing/' . $result->id . '/' . $step) }}" class='signup-form login-form' accept-charset='UTF-8'>
                    {{ csrf_field() }}
                        <div class="box box-info">
                            <div class="box-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="mb-0 f-18 mt-1">Listings</p>
                                    </div>
                                </div>
                                <div class="row d-none">
                                    <div class="col-md-4">
                                        <label class="label-large fw-bold">Property Type</label>
                                        <select name="property_type" data-saving="basics1" class="form-control f-14">
                                            @foreach ($property_type as $key => $value)
                                                <option value="{{ $key }}" {{ ($key == $result->property_type) ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="label-large fw-bold">Recomended</label>
                                        <select name="recomended" id="basics-select-recomended" class="form-control f-14">
                                            <option value="1" {{ ( $result->recomended == 1) ? 'selected' : '' }}>Yes</option>
                                            <option value="0" {{ ( $result->recomended == 0) ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="label-large fw-bold">Verified</label>
                                        <select name="verified" class="form-control f-14">
                                            <option value="Pending" {{ ( $result->is_verified == 'Pending') ? 'selected' : '' }}>Pending</option>
                                            <option value="Approved" {{ ( $result->is_verified == 'Approved' || $result->is_verified == '' ) ? 'selected' : '' }}>Approved</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="mb-0 f-18 mt-1">Stay Available : </p>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="stay_available" type="radio" id="yesCheckbox" value="1" @if($result->stay_available == 1) checked @endif>
                                            <label class="form-check-label" for="yesCheckbox">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="stay_available" type="radio" id="noCheckbox" value="0" @if($result->stay_available == 0) checked @endif>
                                            <label class="form-check-label" for="noCheckbox">No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <span id="cloneOption" class="btn btn-primary">Add</span>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Room Type</th>
                                                        <th>Total Room</th>
                                                        <th>Room Available</th>
                                                        <th>Total Adults</th>
                                                        <th>Total Children</th>
                                                        <th>Status</th>
                                                        <th>Price per Night</th>
                                                        <th>Default</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tableBody">
                                                    {{-- @dd($room_type_table_data); --}}
                                                    @if(isset($room_type_table_data) && count($room_type_table_data) != 0)
                                                        @foreach ($room_type_table_data as $item)
                                                            <tr>
                                                                <td>
                                                                    <select name="room_type[]" class="form-control">
                                                                        @foreach($room_type as $key => $room)
                                                                        <option value="{{ $room->id }}" {{ isset($item) && $room->id == $item->room_type ? 'selected' : '' }}>{{ $room->name }}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </td>
                                                                <td><input type="text" name="total[]" class="form-control numeric" value="{{ $item->total ?? '' }}" placeholder=""></td>
                                                                <td><input type="text" name="available[]" class="form-control numeric" value="{{ $item->available ?? '' }}" placeholder=""></td>

                                                                <td><input type="text" name="for_adults[]" class="form-control numeric" value="{{ $item->for_adults ?? '' }}" placeholder=""></td>
                                                                <td><input type="text" name="for_childrens[]" class="form-control numeric" value="{{ $item->for_childrens ?? '' }}" placeholder=""></td>
                                                                <td>
                                                                    <select name="status[]" class="form-control">
                                                                        <option value="available" {{ $item->status == 'available' ?? 'selected' }}>Available</option>
                                                                        <option value="unavailable" {{ $item->status == 'unavailable' ?? 'selected' }}>UnAvailable</option>
                                                                        <option value="under_maintenance" {{ $item->status == 'under_maintenance' ?? 'selected' }}>Under Maintenance</option>
                                                                    </select>
                                                                </td>
                                                                <td><input type="text" name="price_per_night[]" class="form-control numeric"  value="{{ $item->price_per_night ?? '' }}" placeholder="Price per Night"></td>
                                                                <td>
                                                                    @if($item->is_default == 1)
                                                                        <a href="#" class="btn btn-primary">Default</a>
                                                                    @else
                                                                        <a href="{{ route('properties.room-type-default', ['id'=>$item->id]) }}" class="btn btn-primary">Make Default</a>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                <br>
                                    <div class="col-12 text-right mt-2">
                                    <button type="submit" class="btn btn-large btn-primary next-section-button f-14">
                                        Next
                                    </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- /.content -->
        <div class="clearfix"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            var index = 0; // Counter for dynamic field names

            $('#cloneOption').click(function() {
                var newRow = '<tr>' +
                                '<td><select name="room_type[]" class="form-control">';

                // Loop through roomTypes to populate the options
                @foreach($room_type as $key => $room)
                    newRow += '<option value="{{ $room->id }}">{{ $room->name }}</option>';
                @endforeach

                newRow += '</select></td>' +
                                '<td><input type="text" name="total[]" class="form-control numeric" placeholder="Total"></td>' +
                                '<td><input type="text" name="available[]" class="form-control numeric" placeholder="Available"></td>' +
                                '<td><input type="text" name="for_adults[]" class="form-control numeric" placeholder=""></td>' +
                                '<td><input type="text" name="for_childrens[]" class="form-control numeric" placeholder=""></td>' +
                                '<td><select name="status[]" class="form-control"><option value="available">Available</option><option value="unavailable">UnAvailable</option><option value="under_maintenance">Under Maintenance</option></select></td>' +
                                '<td><input type="text" name="price_per_night[]" class="form-control numeric" placeholder="Price per Night"></td>' +
                            '</tr>';
                $('#tableBody').append(newRow);
                index++; // Increment the counter
            });
        });

        $('#tableBody').on('input', '.numeric', function() {
            var inputVal = $(this).val();
            // Replace non-numeric characters except commas and periods
            inputVal = inputVal.replace(/[^0-9,.]/g, '');
            $(this).val(inputVal);
        });
    </script>
@endsection
