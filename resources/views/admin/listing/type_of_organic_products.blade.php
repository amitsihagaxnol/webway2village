@extends('admin.template')
@section('main')
  <div class="content-wrapper">
        <!-- Main content -->
    <section class="content-header">
        <h1>
            Type Of Organic Products
            <small>Booking</small>
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
                                    <h4> Type Of Organic Products</h4>
                                 
                                </div>
                        <div class="card-body add_products-Offered mt-3">
                            
                               @if($organic_products->isNotEmpty())
                                
                               @php
                                     $i=1;
                               @endphp
                                  @foreach($organic_products as $product)
                                        <div class="row  products-Offered-original-fields">
                                   <div class="col-sm-1 count-number">
                                         {{$i}}
                                   </div>
                                    <div class="col-sm-2 col-md-2">
                                       <div class="form-group">
        									<label class="form-label">Product Title<span class="text-red">*</span></label>
        									<input type="text" class="form-control"  name="product_title[]"  value="{{$product->product_title}}" placeholder="Enter Product Title"/>
        								</div>
                                   </div>
                                   
                                   <div class="col-sm-2 col-md-2">
                                       <div class="form-group">
        									<label class="form-label">Product Unit Price<span class="text-red">*</span></label>
        									<input type="number" class="form-control"  name="product_unit[]" value="{{$product->price}}" placeholder="Enter Price "/>
        								</div>
                                   </div>
                                   
                                   <div class="col-sm-2 col-md-2">
                                       <div class="form-group">
        									<label class="form-label">Seasonal Availability <span class="text-red">*</span></label>
        									<select class="form-control"  name="seasonal_availability[]"   aria-hidden="true">
        										      <option value="yes" @if($product->product_unit=="yes") selected @endif>Yes</option>
        										      <option value="no" @if($product->product_unit=="no") selected @endif>No</option>
        										</select>
        								</div>
                                    </div>
                                    
                                    
                                    <div class="col-sm-2 col-md-2">
                                        <div class="form-group">
                                        <label class="form-label">Product Description<span class="text-red">*</span></label>
                                           <textarea class="form-control mb-4" name="description[]" placeholder="full description" rows="3" style="height:35px !important">{{$product->description}}</textarea>
                                      </div>
                                    </div>
                                    <div class="col-sm-2 col-md-2">
                                       <div class="form-group">
        									<label class="form-label">Product Availability <span class="text-red">*</span></label>
        										<select class="form-control"  name="usproduct_availability[]"   aria-hidden="true">
        										      <option value="Monthly" @if($product->usproduct_availability=="Monthly") selected @endif>Monthly</option>
        										      <option value="Quarterly" @if($product->usproduct_availability=="Quarterly") selected @endif>Quarterly</option>
        										      <option value="Half Yearly" @if($product->usproduct_availability=="Half Yearly") selected @endif>Half Yearly</option>
        										      <option value="Yearly" @if($product->usproduct_availability=="Yearly") selected @endif>Yearly</option>
        										</select>
        										
        								</div>
                                   </div>
                                   
                                    <div class="col-sm-1 col-md-1 product_availability-add-check d-flex justify-content-center align-items-center">
                                        @if($i==1)
                                          <button type="button" class="btn btn-primary  clone-btn">   + </button>
                                        @else
                                           <button type="button" class="btn btn-danger products-Offered-remove-btn">-</button>
                                        @endif
                                   </div>
                                   
                                </div>
                                  @php
                                      $i++
                                  @endphp
                                  @endforeach
                               
                               @else
                                <div class="row  products-Offered-original-fields">
                                   <div class="col-sm-1 count-number">
                                          1
                                   </div>
                                    <div class="col-sm-2 col-md-2">
                                       <div class="form-group">
        									<label class="form-label">Product Title<span class="text-red">*</span></label>
        									<input type="text" class="form-control"  name="product_title[]"  placeholder="Enter Product Title"/>
        								</div>
                                   </div>
                                   
                                   <div class="col-sm-2 col-md-2">
                                       <div class="form-group">
        									<label class="form-label">Product Unit Price<span class="text-red">*</span></label>
        									<input type="number" class="form-control"  name="product_unit[]"  placeholder="Enter Price "/>
        								</div>
                                   </div>
                                   
                                   <div class="col-sm-2 col-md-2">
                                       <div class="form-group">
        									<label class="form-label">Seasonal Availability <span class="text-red">*</span></label>
        									<select class="form-control"  name="seasonal_availability[]"   aria-hidden="true">
        										      <option value="yes">Yes</option>
        										      <option value="no">No</option>
        										</select>
        								</div>
                                    </div>
                                    
                                    
                                    <div class="col-sm-2 col-md-2">
                                        <div class="form-group">
                                        <label class="form-label">Product Description<span class="text-red">*</span></label>
                                           <textarea class="form-control mb-4" name="description[]" placeholder="full address" rows="3" style="height:35px !important"></textarea>
                                      </div>
                                    </div>
                                    <div class="col-sm-2 col-md-2">
                                       <div class="form-group">
        									<label class="form-label">Product Availability <span class="text-red">*</span></label>
        										<select class="form-control"  name="usproduct_availability[]"   aria-hidden="true">
        										      <option value="Monthly">Monthly</option>
        										      <option value="Quarterly">Quarterly</option>
        										      <option value="Half Yearly">Half Yearly</option>
        										      <option value="Yearly">Yearly</option>
        										</select>
        										
        								</div>
                                   </div>
                                   
                                    <div class="col-sm-1 col-md-1 product_availability-add-check d-flex justify-content-center align-items-center">
                                        <button type="button" class="btn btn-primary  clone-btn">   + </button>
                                   </div>
                                   
                                </div>
                            @endif
                        
                    </div>
                                <div class="clear-both"></div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6 text-left">
                                            <a data-prevent-default="" href="{{ url('admin/listing/' . $result->id . '/pricing') }}" class="btn btn-large btn-primary f-14">Back</a>
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
            $(document).ready(function(){
                   $(document).on('click','.clone-btn',function(){
                        var clonedFields = $('.products-Offered-original-fields').last().clone();
                        clonedFields.find('input').val('');
                        clonedFields.find('textarea').val('');
                        var lastSerialNumber = parseInt($('.products-Offered-original-fields').last().find('.count-number').text().trim());
                        var newSerialNumber = lastSerialNumber + 1;
                    
                        clonedFields.find('.count-number').text(newSerialNumber);
                    
                        clonedFields.find('.clone-btn').remove();
                        clonedFields.find('.product_availability-add-check').html('<button type="button" class="btn btn-danger products-Offered-remove-btn">-</button>');
                    
                        $(".add_products-Offered").append(clonedFields);
                    });
                    
                    $(document).on('click', '.products-Offered-remove-btn', function() {
                        $(this).closest('.row').remove();
                          $('.products-Offered-original-fields').each(function(index) {
                            $(this).find('.count-number').text(index + 1);
                        });
                    });
            });
  </script>

@endsection


