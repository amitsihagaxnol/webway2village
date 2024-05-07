@extends('admin.template')
@section('main')
  <div class="content-wrapper">
        <!-- Main content -->
    <section class="content-header">
        <h1>
            Activities
            <small>Activities</small>
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
                        <form method="post" action="{{ url('admin/listing/' . $result->id . '/' . $step) }}" class='signup-form login-form' accept-charset='UTF-8' enctype='multipart/form-data'>
                            {{ csrf_field() }}
                            <div class="row p-3">
                                <div class="col-md-12">
                                    <h4> Activities</h4>

                                </div>

                        <div class="card-body add-activities mt-3">

                                        @if($activities->isNotEmpty())

                                            @php
                                               $i=1;
                                            @endphp
                                        @foreach($activities as $activity)
                                                       <div class="row  activities-original-fields">
                                                           <div class="col-sm-1 activities-count">
                                                                  {{$i}}
                                                           </div>


                                                            <div class="col-sm-5 col-md-5">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Title <span class="text-red">*</span></label>
                                                                        <input type="text" class="form-control" name="activity_title[]" value="{{$activity->name}}" placeholder="Enter  Title">

                                                                    </div>
                                                            </div>

                                                             <div class="col-sm-5 col-md-5">
                                                                <div class="form-group">
                                                                    <label class="form-label">Price<span class="text-red">*</span></label>
                                                                    <input type="number" class="form-control" name="activity_price[]" value="{{$activity->price}}" placeholder="Enter  Price">

                                                                </div>
                                                             </div>

                                                             <div class="col-sm-6 col-md-6 mt-4">
                                                                    <div class="form-group  d-flex justify-content-start align-items-start " style="gap:5px;">
                                                                        <label class="form-label" style="width:90px;">Description <span class="text-red">*</span></label>
                                                                        <textarea class="form-control" name="description[]" required placeholder="Enter Description">{{$activity->description}}</textarea>

                                                                    </div>
                                                            </div>

                                                             <div class="col-sm-5 col-md-5 mt-4">
                                                                <div class="form-group  d-flex justify-content-start align-items-start " style="gap:10px;">
                                                                    <label class="form-label" style="width:55px;">Image<span class="text-red">*</span></label>
                                                                    <!--<br>-->
                                                                    <div class="d-flex justify-content-center align-items-center  flex-column" style="gap:10px;">

                                                                    <input type="file" class="form-control w-100" name="images[]" required >
                                                                        <img src="{{ asset('public/images/activity/images/' . $activity->image) }}"  style="height:50px; width:50px;">
                                                                    </div>




                                                                </div>

                                                             </div>


                                                            <div class="col-sm-1 col-md-1 activities-add-check d-flex justify-content-center align-items-center">
                                                            @if($i==1)

                                                                <button type="button" class="btn btn-primary  activities-clone-btn mb-4">   + </button>
                                                            @else
                                                                <button type="button" class="btn btn-danger activities-remove-btn">-</button>
                                                            @endif
                                                           </div>
                                                        </div>

                                                @php
                                                     $i++;
                                               @endphp
                                        @endforeach


                                    @else

                                        <div class="row  activities-original-fields">
                                           <div class="col-sm-1 activities-count">
                                                  1
                                           </div>


                                             <div class="col-sm-5 col-md-5">
                                                    <div class="form-group">
                                                        <label class="form-label">Title <span class="text-red">*</span></label>
                                                        <input type="text" class="form-control" name="activity_title[]" placeholder="Enter  Title">

                                                    </div>
                                             </div>

                                             <div class="col-sm-5 col-md-5">
                                                <div class="form-group">
                                                    <label class="form-label">Price<span class="text-red">*</span></label>
                                                    <input type="number" class="form-control" name="activity_price[]" placeholder="Enter  Price">

                                                </div>
                                             </div>

                                             <div class="col-sm-5 col-md-5">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Description <span class="text-red">*</span></label>
                                                                        <textarea class="form-control" name="description[]" placeholder="Enter Description" required></textarea>

                                                                    </div>
                                              </div>

                                             <div class="col-sm-5 col-md-5">
                                                <div class="form-group">
                                                    <label class="form-label">Image<span class="text-red">*</span></label>
                                                    <input type="file" class="form-control" name="images[]" required>

                                                </div>
                                             </div>


                                            <div class="col-sm-1 col-md-1 activities-add-check d-flex justify-content-center align-items-end">
                                                <button type="button" class="btn btn-primary  activities-clone-btn">   + </button>
                                           </div>
                                        </div>
                                     @endif
                        </div>

                                <div class="clear-both"></div>
                                <div class="col-12 mt-3">
                                    <div class="row">
                                        <div class="col-6 text-left">
                                            <a data-prevent-default="" href="{{ url('admin/listing/' . $result->id . '/facilities') }}" class="btn btn-large btn-primary f-14">Back</a>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button type="submit" class="btn btn-large btn-primary next-section-button f-14">next</button>
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
            $(document).ready(function(){
                    $(document).on('click','.activities-clone-btn',function(){
                        var clonedFields = $('.activities-original-fields').last().clone();
                         clonedFields.find('input').val('');
                          clonedFields.find('textarea').val('');
                            clonedFields.find('img').attr('src', '');
                        var lastSerialNumber = parseInt($('.activities-original-fields').last().find('.activities-count').text().trim());
                        var newSerialNumber = lastSerialNumber + 1;

                        clonedFields.find('.activities-count').text(newSerialNumber);

                        clonedFields.find('.clone-btn').remove();
                        clonedFields.find('.activities-add-check').html('<button type="button" class="btn btn-danger activities-remove-btn">-</button>');

                        $(".add-activities").append(clonedFields);
                    });

                    $(document).on('click', '.activities-remove-btn', function() {
                        $(this).closest('.row').remove();
                          $('.activities-original-fields').each(function(index) {
                            $(this).find('.activities-count').text(index + 1);
                        });
                    });
            });
  </script>

@endsection


