@extends('admin.template')
@section('main')
  <div class="content-wrapper">
        <!-- Main content -->
    <section class="content-header">
        <h1>
          Facilities
            <small>Facilities</small>
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
                <div class="box box-info">
                    <div class="box-body">
                        <form method="post" action="{{ url('admin/listing/' . $result->id . '/' . $step) }}" class='signup-form login-form' accept-charset='UTF-8'>
                            {{ csrf_field() }}
                            <div class="row p-3">
                                <div class="col-md-12">
                                    <h4>Facilities</h4>

                                </div>

                                <div class="card-body add-facilities mt-3">
                                   @if($facilities->isNotEmpty())

                                        @php
                                             $i=1;
                                        @endphp
                                        @foreach($facilities as $facility)
                                                 <div class="row  facilities-original-fields">
                                                   <div class="col-sm-1 facilities-count">
                                                           {{$i}}
                                                   </div>

                                                     <div class="form-group mt-1 row">
                                                        <label for="facility_id" class="control-label col-sm-3 mt-2 fw-bold">Facility<span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control facility-select" name="facility_id[]">
                                                                <option value="">Select Facility</option>
                                                                @foreach($facilityAll as $item)
                                                                    <option value="{{ $item->id }}" data-code="{{ $item->facility_code }}" data-price="{{ $item->price }}" {{ $facility->facility_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>

                                                            <span class="text-danger">{{ $errors->first("facility_id") }}</span>
                                                        </div>
                                                    </div>
                                                     <div class="form-group mt-1 row">
                                                        <label for="facility_code" class="control-label col-sm-3 mt-2 fw-bold">Facility Code<span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control facility-code" name="facility_code[]" placeholder="" value="{{ $facility->facility_code }}" readonly>
                                                            <span class="text-danger">{{ $errors->first("facility_code") }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-3 row">
                                                        <label for="description" class="control-label col-sm-3 mt-2 fw-bold">Description<span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <textarea id="description" name="description[]" placeholder="" rows="5" cols="70" class="">{{ $facility->description }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group mt-3 row">
                                                        <label for="price" class="control-label col-sm-3 mt-2 fw-bold">Price<span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control facility-price" name="price[]" value="{{ $facility->price }}" placeholder="">
                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>



                                                    <div class="col-sm-1 col-md-1 facilities-add-check d-flex justify-content-center align-items-end">
                                                    @if($i==1)
                                                        <button type="button" class="btn btn-primary  facilities-clone-btn">   + </button>
                                                    @else
                                                       <button type="button" class="btn btn-danger facilities-remove-btn">-</button>
                                                    @endif
                                                   </div>
                                                </div>

                                                @php
                                                     $i++;
                                               @endphp
                                        @endforeach


                                    @else


                                    <div class="row facilities-original-fields">
                                        <div class="col-sm-1 facilities-count d-flex justify-content-center align-items-center">
                                            1
                                        </div>

                                        <div class="col-sm-1 col-md-1 facilities-add-check d-flex justify-content-center align-items-center">
                                            <button type="button" class="btn btn-primary facilities-clone-btn"> + </button>
                                        </div>

                                        <div class="box-body facility-details">
                                            <div class="form-group mt-1 row">
                                                <label for="facility_id" class="control-label col-sm-3 mt-2 fw-bold">Facility<span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <select class="form-control facility-select" name="facility_id[]">
                                                        <option value="">Select Facility</option>
                                                        @foreach($facilityAll as $item)
                                                            <option value="{{ $item->id }}" data-code="{{ $item->facility_code }}" data-price="{{ $item->price }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger">{{ $errors->first("facility_id") }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group mt-1 row">
                                                <label for="facility_code" class="control-label col-sm-3 mt-2 fw-bold">Facility Code<span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control facility-code" name="facility_code[]" value="" placeholder="" readonly>
                                                    <span class="text-danger">{{ $errors->first("facility_code") }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group mt-3 row">
                                                <label for="description" class="control-label col-sm-3 mt-2 fw-bold">Description<span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <textarea id="description" name="description[]" placeholder="" rows="5" cols="70" class=""></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group mt-3 row">
                                                <label for="price" class="control-label col-sm-3 mt-2 fw-bold">Price<span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control facility-price" name="price[]" value="" placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    @endif
                             </div>

                                <div class="clear-both"></div>
                                <div class="col-12 mt-3">
                                    <div class="row">
                                        <div class="col-6 text-left">
                                            <a data-prevent-default="" href="{{ url('admin/listing/' . $result->id . '/location_near_me') }}" class="btn btn-large btn-primary f-14">Back</a>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button type="submit" class="btn btn-large btn-primary next-section-button f-14">Next</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
      </div>
    </section>
  </div>
@endsection
@section('validate_script')

  <script>
   $(document).ready(function() {
    // Function to update code and price fields when dropdown value changes
    function updateFields() {
        var selectedOption = $(this).find('option:selected');
        var code = selectedOption.data('code');
        var price = selectedOption.data('price');
        $(this).closest('.facilities-original-fields').find('.facility-code').val(code);
        $(this).closest('.facilities-original-fields').find('.facility-price').val(price);
    }

    // Attach change event listener to dynamically added dropdowns
    $(document).on('change', '.facility-select', updateFields);

    // Clone functionality
    $(document).on('click', '.facilities-clone-btn', function() {
        var clonedFields = $('.facilities-original-fields').last().clone();
        // Clear the description field in the cloned fields
        clonedFields.find('textarea').val('');
        // Clear the selected option in the dropdown
        clonedFields.find('.facility-select').val('');
        // Clear the code and price fields
        clonedFields.find('.facility-code').val('');
        clonedFields.find('.facility-price').val('');

        var lastSerialNumber = parseInt($('.facilities-original-fields').last().find('.facilities-count').text().trim());
        var newSerialNumber = lastSerialNumber + 1;
        clonedFields.find('.facilities-count').text(newSerialNumber);
        clonedFields.find('.facilities-add-check').html('<button type="button" class="btn btn-danger facilities-remove-btn">-</button>');
        $(".add-facilities").append(clonedFields);
    });


    // Remove functionality
    $(document).on('click', '.facilities-remove-btn', function() {
        $(this).closest('.facilities-original-fields').remove();
        $('.facilities-original-fields').each(function(index) {
            $(this).find('.facilities-count').text(index + 1);
        });
    });
});


 </script>

@endsection


