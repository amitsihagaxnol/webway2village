@extends('admin.template')
@section('main')
  <div class="content-wrapper">
        <!-- Main content -->
    <section class="content-header">
        <h1>
           Irrigation Method Farm Practices 
            <small> Irrigation Method Farm Practices </small>
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
                                    <h4>Irrigation Method Farm Practices </h4>
                                 
                                </div>
                                                
                                       <div class="card-body add-irrigation mt-3">
                                           
                                                @php
                                                     $i=1;
                                                @endphp
                                                  @if($irrigation_methds->isNotEmpty())
                                    
                                                    @php
                                                       $i=1;
                                                    @endphp
                                                @foreach($irrigation_methds as $practice)
                                                          <div class="row  irrigation-original-fields">
                                                       <div class="col-sm-1 irrigation-count">
                                                               {{$i}}
                                                       </div>
                                                       
                                                        
                                                        <div class="col-sm-5 col-md-5">
                                                           <div class="form-group">
                            									<label class="form-label"> Irrigation Method <span class="text-red">*</span></label>
                            										<select class="form-control irrigation_method"  name="irrigation_method[]"  tabindex="-1" aria-hidden="true">
                            										    <option value="">select irrigation method</option>
                            										     @forelse($irrigationMethds as $irrigationMethd)
                            										         <option value="{{$irrigationMethd->id}}" @if($irrigationMethd->id==$practice->irrigation_method_id) selected @endif>{{$irrigationMethd->name}}</option>
                            										     @empty
                            										     
                            										     @endforelse
                            										  
                            										</select>
                            										
                            								</div>
                                                       </div>
                                                        <div class="col-sm-5 col-md-5">
                                                            <div class="form-group">
                                                            <label class="form-label">Irrigation Details<span class="text-red">*</span></label>
                                                               <textarea class="form-control mb-4" name="irrigation_method_details[]"  rows="3" style="height:35px !important; "value= "{{$practice['irrigation_method']->description}}"> {{$practice['irrigation_method']->description}}</textarea>
                                                          </div>
                                                        </div>
                                                        
                                                       
                                                        <div class="col-sm-1 col-md-1 irrigation-add-check d-flex justify-content-center align-items-center"> 
                                                        @if($i==1)
                                                               <button type="button" class="btn btn-primary  irrigation-clone-btn">   + </button>
                                                        @else
                                                                <button type="button" class="btn btn-danger irrigation-remove-btn">-</button>
                                                        @endif
                                                       </div>
                                                    </div>
                                        
                                                
                                                
                                                       @php
                                                     $i++;
                                               @endphp
                                        @endforeach
                                        
                                        
                                        
                                    
                                    
                                    @else
                                                 
                           
                                                    <div class="row  irrigation-original-fields">
                                                       <div class="col-sm-1 irrigation-count">
                                                              1
                                                       </div>
                                                       
                                                        
                                                        <div class="col-sm-5 col-md-5">
                                                           <div class="form-group">
                            									<label class="form-label"> Irrigation Method <span class="text-red">*</span></label>
                            										<select class="form-control irrigation_method"  name="irrigation_method[]"  tabindex="-1" aria-hidden="true">
                            										    <option value="">select irrigation method</option>
                            										     @forelse($irrigationMethds as $irrigationMethd)
                            										         <option value="{{$irrigationMethd->id}}">{{$irrigationMethd->name}}</option>
                            										     @empty
                            										     
                            										     @endforelse
                            										  
                            										</select>
                            										
                            								</div>
                                                       </div>
                                                        <div class="col-sm-5 col-md-5">
                                                            <div class="form-group">
                                                            <label class="form-label">Irrigation Details<span class="text-red">*</span></label>
                                                               <textarea class="form-control mb-4" name="irrigation_method_details[]"  rows="3" style="height:35px !important;"></textarea>
                                                          </div>
                                                        </div>
                                                        
                                                       
                                                        <div class="col-sm-1 col-md-1 irrigation-add-check d-flex justify-content-center align-items-center"> 
                                                            <button type="button" class="btn btn-primary  irrigation-clone-btn">   + </button>
                                                       </div>
                                                    </div>
                                        @endif
                        </div>           
                                                
                                                
                                                
                                <div class="clear-both"></div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6 text-left">
                                            <a data-prevent-default="" href="{{ url('admin/listing/' . $result->id . '/sustainable_farm_practices') }}" class="btn btn-large btn-primary f-14">Back</a>
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
                    $(document).on('click','.irrigation-clone-btn',function(){
                        var clonedFields = $('.irrigation-original-fields').last().clone();
                         clonedFields.find('textarea').val('');
                        var lastSerialNumber = parseInt($('.irrigation-original-fields').last().find('.irrigation-count').text().trim());
                        var newSerialNumber = lastSerialNumber + 1;
                    
                        clonedFields.find('.irrigation-count').text(newSerialNumber);
                    
                        clonedFields.find('.clone-btn').remove();
                        clonedFields.find('.irrigation-add-check').html('<button type="button" class="btn btn-danger irrigation-remove-btn">-</button>');
                    
                        $(".add-irrigation").append(clonedFields);
                    });
                    
                    $(document).on('click', '.irrigation-remove-btn', function() {
                        $(this).closest('.row').remove();
                          $('.irrigation-original-fields').each(function(index) {
                            $(this).find('.irrigation-count').text(index + 1);
                        });
                    });
                    
                     
                 $(document).on('change','.irrigation_method',function(){
                     var self = this;
                     var irrigation_id = $(this).val();
                      $.ajax({
                        url: "{{ route('irrigation-method-fetch.details') }}",
                        type: "post",
                        data: {
                            irrigation_id: irrigation_id,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(res) {
                            $(self).parent().parent().next().children().find('textarea').val(res);
    
                        }
                    });
                });
            });
  </script>

@endsection


