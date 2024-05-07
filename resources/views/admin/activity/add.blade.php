@extends('admin.template')

@section('main')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Activity<small>Add Activity</small></h1>
        @include('admin.common.breadcrumb')
    </section>
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">
            <div class="box">
                <form class="form-horizontal" action="{{ url('admin/add-activity') }}" method="post"  accept-charset='UTF-8'  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <input type="hidden" name="default_country" id="default_country" class="form-control">
                        <input type="hidden" name="carrier_code" id="carrier_code" class="form-control">
                        <input type="hidden" name="formatted_phone" id="formatted_phone" class="form-control">
                        <div class="form-group mt-1 row">
                            <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Name<span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" id="name" placeholder="">
                                 <span class="text-danger">{{ $errors->first("name") }}</span>
                            </div>
                        </div>

                        <div class="form-group mt-3 row">
                            <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Category<span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <select class="form-control" name="activityType" id="activityType">
                                      <option value="">select activity type</option>
                                      @forelse($activities as $activity)
                                        <option value="{{$activity->id}}">{{$activity->name}}</option>
                                      @empty
                                      
                                      @endforelse
                                    
                                </select>
                                
                                <span class="text-danger">{{ $errors->first("activityType") }}</span>
                               
                            </div>
                        </div>
                
                        <div class="form-group mt-3 row">
                            <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Type <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <select class="form-control" name="type" id="type">
                                      <option value="">select type</option>
                                      <option value="General/Village Farm House">General/Village Farm House</option>
                                      <option value="Private">Private</option>
                                    
                                </select>
                                  <span class="text-danger">{{ $errors->first("type") }}</span>
                            </div>
                            
                        </div>
                        
                         <div class="form-group mt-3 row">
                            <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">State <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <select class="form-control" name="state" id="state">
                                      <option value="">select state</option>
                                      @forelse($states as $state)
                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                      @empty
                                      
                                      @endforelse
                                </select>
                                   <span class="text-danger">{{ $errors->first("state") }}</span>
                            </div>
                        </div>
                        
                        <div class="form-group mt-3 row">
                            <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">District <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <select class="form-control" name="district" id="district">
                                      <option value="">select district</option>
                                     
                                </select>
                                <span class="text-danger">{{ $errors->first("district") }}</span>
                               
                            </div>
                        </div>
                        
                        <div class="form-group mt-3 row">
                            <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Location <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="location" id="location" placeholder="">
                                  <span class="text-danger">{{ $errors->first("location") }}</span>
                            </div>
                        </div>
                        
                        <div class="form-group mt-3 row">
                            <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Meta Title <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="">
                                  <span class="text-danger">{{ $errors->first("meta_title") }}</span>
                            </div>
                        </div>
                        
                         <div class="form-group mt-3 row">
                            <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Meta Keywords <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="meta_keywords" id="meta_keywords" placeholder="">
                                  <span class="text-danger">{{ $errors->first("meta_keywords") }}</span>
                            </div>
                        </div>
                        
                         <div class="form-group mt-3 row">
                            <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Meta Description<span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <textarea id="meta_description" name="meta_description" placeholder="" rows="5" cols="70" class=""> </textarea>
                            </div>
                        </div>
                        
                        <div class="form-group mt-3 row">
                            <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Description<span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <textarea id="description" name="description" placeholder="" rows="5" cols="70" class=""> </textarea>
                            </div>
                        </div>
                        
                        
                        <div class="form-group mt-3 row">
                            <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Promo Video<span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <textarea id="promo_video" name="promo_video" placeholder="Promo Video" rows="5" cols="70" class=""> </textarea>
                                <span class="text-danger">{{ $errors->first("promo_video") }}</span>
                            </div>
                        </div>
                        
                        <div class="form-group mt-3 row">
                            <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Rules and Regulations<span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <textarea id="rules_and_regulations" name="rules_and_regulations" placeholder="" rows="5" cols="70" class=""> </textarea>
                                <span class="text-danger">{{ $errors->first("rules_and_regulations") }}</span>
                            </div>
                        </div>
                        
                        <div class="form-group mt-3 row">
                            <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Status <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                            <select class="form-control f-14" name="status" id="status">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                            </div>
                            <span class="text-danger">{{ $errors->first("status") }}</span>
                        </div>
                         
                        <div class="form-group mt-3 row">
                            <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Banner Image</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="banner_image" id="banner_image">
                                <span class="text-danger">{{ $errors->first("banner_image") }}</span>
                            </div>
                        </div>
                        
                        <div class="form-group mt-3 row">
                            <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Featured Image</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="featured_image[]" id="featured_image" multiple >
                                <span class="text-danger">{{ $errors->first("featured_image") }}</span>
                            </div>
                        </div>
                        
                       <div class="form-group mt-3 row">
                            <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Default Price<span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="default_price" value="0" id="default_price" placeholder="">
                                  <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="add_products_Offered" style="display:none;">
                            
                                 <div class="row  products-Offered-original-fields">
                                       <div class="col-sm-1 count-number">
                                              1
                                       </div>
                                        <div class="col-sm-2 col-md-2">
                                           <div class="form-group">
            									<label class="form-label">Enter Item<span class="text-red">*</span></label>
            									<input type="text" class="form-control"  name="Iteam[]"  placeholder="Enter Item"  required/>
            								</div>
                                       </div>
                                       
                                       <div class="col-sm-2 col-md-2">
                                           <div class="form-group">
            									<label class="form-label">Duration<span class="text-red">*</span></label>
            									<input type="number" class="form-control"  name="duration[]"  placeholder="Enter Duration" required/>
            								</div>
                                       </div>
                                        <div class="col-sm-2 col-md-2">
                                           <div class="form-group">
            									<label class="form-label">Amount<span class="text-red">*</span></label>
            									<input type="number" class="form-control"  name="amount[]"  placeholder="Enter amount" required/>
            								</div>
                                       </div>
                                       
                                       
                                        <div class="col-sm-1 col-md-1 product_availability-add-check d-flex justify-content-center align-items-center">
                                            <button type="button" class="btn btn-primary  clone-btn">   + </button>
                                       </div>
                                   
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
                    
                     if(check=="Private")
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
