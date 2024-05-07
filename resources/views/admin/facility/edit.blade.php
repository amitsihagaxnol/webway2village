@extends('admin.template')

@section('main')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Facility<small>Edit Facility</small></h1>
        @include('admin.common.breadcrumb')
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
            <div class="box">
                <form class="form-horizontal" action="{{ url('admin/edit-facility/' . $result->id) }}" method="post"  accept-charset='UTF-8'  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">

                        <div class="form-group mt-1 row">
                            <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Facility Code<span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="facility_code" value="{{ $result->facility_code}}" id="facility_code" placeholder="">
                                 <span class="text-danger">{{ $errors->first("facility_code") }}</span>
                            </div>
                        </div>

                        <div class="form-group mt-1 row">
                            <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Name<span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" value="{{ $result->name}}" id="name" placeholder="">
                                 <span class="text-danger">{{ $errors->first("name") }}</span>
                            </div>
                        </div>

                        <div class="form-group mt-3 row">
                            <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Description<span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <textarea id="description" name="description" placeholder=""  rows="5" cols="70" class=""> {{ $result->description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group mt-3 row">
                            <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Status <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                            <select class="form-control f-14" name="status" id="status">
                                <option value="Active" @if($result->status=="Active") selected @endif>Active</option>
                                <option value="Inactive" @if($result->status=="Inactive") selected @endif>Inactive</option>
                            </select>
                            </div>
                            <span class="text-danger">{{ $errors->first("status") }}</span>
                        </div>

                        <div class="form-group mt-3 row">
                            <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Price<span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="price" value="{{ $result->price}}" id="price  " placeholder="">
                                  <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>


                    <div class="box-footer">
                    <button type="submit" class="btn btn-info f-14 text-white" id="submitBtn">Submit</button>
                    <button type="reset" class="btn btn-danger f-14">Reset</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('validate_script')

<script src="{{ asset('public/backend/dist/js/validate.min.js') }}" type="text/javascript"></script>

<script>
       $(document).ready(function(){
             $(document).on('change','#state',function(){
                    var state_id = $(this).val();
                     $.ajax({
                        type:"post",
                        url:"{{url('admin/fetch-district-list')}}",
                        data:{state_id:state_id,'_token':"{{ csrf_token() }}"},
                        success:function(res){
                         $("#district").html('');
                          $("#district").html(res);
                        }
                     });
             });

             $(document).on('click','.clone-btn',function(){
                        var clonedFields = $('.products-Offered-original-fields').last().clone();
                        clonedFields.find('input').val('');
                        var lastSerialNumber = parseInt($('.products-Offered-original-fields').last().find('.count-number').text().trim());
                        var newSerialNumber = lastSerialNumber + 1;

                        clonedFields.find('.count-number').text(newSerialNumber);

                        clonedFields.find('.clone-btn').remove();
                        clonedFields.find('.product_availability-add-check').html('<button type="button" class="btn btn-danger products-Offered-remove-btn">-</button>');

                        $(".add_products_Offered").append(clonedFields);
                    });

                $(document).on('click', '.products-Offered-remove-btn', function() {
                    $(this).closest('.row').remove();
                      $('.products-Offered-original-fields').each(function(index) {
                        $(this).find('.count-number').text(index + 1);
                    });
                });


                $(document).on('change','#type',function(){
                     var check  = $(this).val();

                     if(check=="private")
                     {

                         $(".add_products_Offered").html('');
                         $(".add_products_Offered").hide();
                     }else{

                 var otherinput = '<div class="row products-Offered-original-fields">' +
                            '<div class="col-sm-1 count-number">1</div>' +
                            '<div class="col-sm-2 col-md-2">' +
                            '<div class="form-group">' +
                            '<label class="form-label">Enter Item<span class="text-red">*</span></label>' +
                            '<input type="text" class="form-control" name="iteam[]" placeholder="Enter Item" required/>' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-sm-2 col-md-2">' +
                            '<div class="form-group">' +
                            '<label class="form-label">Duration<span class="text-red">*</span></label>' +
                            '<input type="number" class="form-control" name="duration[]" placeholder="Enter Duration" required/>' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-sm-2 col-md-2">' +
                            '<div class="form-group">' +
                            '<label class="form-label">Amount<span class="text-red">*</span></label>' +
                            '<input type="number" class="form-control" name="amount[]" placeholder="Enter amount" required/>' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-sm-1 col-md-1 product_availability-add-check d-flex justify-content-center align-items-center">' +
                            '<button type="button" class="btn btn-primary clone-btn">+</button>' +
                            '</div>' +
                            '</div>';

                        $(".add_products_Offered").html(otherinput);
                         $(".add_products_Offered").show();

                     }
                });


       });
</script>

@endsection
