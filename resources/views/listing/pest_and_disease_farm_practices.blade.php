@extends('template')

@section('main')

		<style>
    .main-panelbg{
        background:#7cb342;
    }
    .main-panelbg h4{
        color:#fff;
    }
    .prop-label label{
        color:#7cb342;
        font-size:13px;
        font-weight:600;
    }
    .prop-label select, .prop-label input,.prop-label textarea{
        border-radius:2px !important;
        
    }
    .prop-label select:focus, .prop-label input:focus, .prop-label textarea:focus{
        /*outline:none;*/
        box-shadow:none;
    }
    .nxt-btn{
        border:none;
        outline:none;
        background:#7cb342;
        color:#fff;
        border:1px solid #7cb342;
        transition:0.5s;
        padding:3px 15px;
        border-radius:2px;
        width:150px;
        font-weight:600;
    }
    .nxt-btn:hover{
        background:transparent;
        color:#7cb342;
    }
    .back-btn{
        border:none;
        outline:none;
        background:red;
        color:#fff;
        border:1px solid red;
        transition:0.5s;
        border-radius:3px;
        width:150px;
        font-weight:600;
        height:50px  !important;
        
        padding:7px 15px !important;
    }
    .back-btn:hover{
        background:transparent;
        color:red !important;
    }
   
   input[type='checkbox'] {
    accent-color: #7cb342;
    color:#fff;
}
</style>


	<div class="margin-top-85">
		<div class="row m-0">
			<!-- sidebar start-->
			@include('users.sidebar')
			<!--sidebar end-->
			<div class="col-md-10">
				<div class="main-panel min-height mt-4">
					<div class="row justify-content-center">
						<div class="col-md-3 pl-4 pr-4">
							@include('listing.sidebar')
						</div>

						<div class="col-md-9 mt-sm-0 pl-4 pr-4">
						    <form method="post" action="{{ url('listing/' . $result->id . '/' . $step) }}" class='signup-form login-form' accept-charset='UTF-8'>
                               {{ csrf_field() }}
					          	<div class="col-md-12 p-0 mt-4  pb-4 m-0" style="border:1px solid #7cb342;">
									<div class="form-group col-md-12 main-panelbg pb-3 pt-3 pl-4">
											<h4 class="text-16 font-weight-700"> Pest and Disease Farm Practices</h4>
									</div>
									
									 <div class="card-body add-pest mt-2">
                                           @if($pest_disease_practices->isNotEmpty())
                                    
                                            @php
                                               $i=1;
                                            @endphp
                                        @foreach($pest_disease_practices as $practice)
                                        
                                                             <div class="row  pest-original-fields">
                                           <div class="col-sm-1 pest-count d-flex justify-content-center">
                                                  {{$i}}
                                           </div>
                                           
                                            
                                            <div class="col-sm-5 col-md-5">
                                               <div class="form-group prop-label">
                									<label class="form-label"> Pest and Disease Management <span class="text-danger">*</span></label>
                										<select class="form-control pest_disease"  name="pest_disease[]"  tabindex="-1" aria-hidden="true">
                										        <option value="">select Pest and Disease </option>
                    										     @forelse($pestDiseases as $pestDiseas)
                    										         <option value="{{$pestDiseas->id}}"  @if($pestDiseas->id==$practice->pest_disease_id) selected @endif>{{$pestDiseas->name}}</option>
                    										     @empty
                    										     
                    										     @endforelse
                										</select>
                										
                								</div>
                                           </div>
                                            <div class="col-sm-5 col-md-5">
                                                <div class="form-group prop-label">
                                                <label class="form-label">Pest and Disease Details<span class="text-danger">*</span></label>
                                                   <textarea class="form-control mb-4" name="pest_disease_details[]" placeholder="full address" rows="3" style="height:41px !important;" value="{{$practice['pest_disease_practice']->description}}">{{$practice['pest_disease_practice']->description}}</textarea>
                                              </div>
                                            </div>
                                            
                                           
                                            <div class="col-sm-1 col-md-1 pest-add-check d-flex justify-content-center align-items-center"> 
                                              @if($i==1)
                                                <button type="button" class="btn btn-primary  pest-clone-btn">   + </button>
                                              @else
                                                <button type="button" class="btn btn-danger pest-remove-btn">-</button>
                                              @endif
                                                
                                           </div>
                                        </div>
                                        
                                                @php
                                                     $i++;
                                               @endphp
                                        @endforeach
                                        @else
                                    
                                    
                                        <div class="row  pest-original-fields">
                                           <div class="col-sm-1 pest-count d-flex justify-content-center align-items-center">
                                                  1
                                           </div>
                                           
                                            
                                            <div class="col-sm-5 col-md-5">
                                               <div class="form-group prop-label">
                									<label class="form-label"> Pest and Disease Management <span class="text-danger">*</span></label>
                										<select class="form-control pest_disease"  name="pest_disease[]"  tabindex="-1" aria-hidden="true">
                										        <option value="">select Pest and Disease </option>
                    										     @forelse($pestDiseases as $pestDiseas)
                    										         <option value="{{$pestDiseas->id}}">{{$pestDiseas->name}}</option>
                    										     @empty
                    										     
                    										     @endforelse
                										</select>
                										
                								</div>
                                           </div>
                                            <div class="col-sm-5 col-md-5">
                                                <div class="form-group prop-label">
                                                <label class="form-label">Pest and Disease Details<span class="text-danger">*</span></label>
                                                   <textarea class="form-control mb-4" name="pest_disease_details[]" placeholder="full address" rows="3" style="height:41px !important;"></textarea>
                                              </div>
                                            </div>
                                            
                                           
                                            <div class="col-sm-1 col-md-1 pest-add-check d-flex justify-content-center align-items-center"> 
                                                <button type="button" class="btn btn-primary  pest-clone-btn">   + </button>
                                           </div>
                                        </div>
                                    @endif
                        </div>
								
								</div>
								
                               
								<div class="col-md-12 mt-4 p-0 mb-5">
									<div class="row justify-content-between">
										<div class="mt-4">
											<a href="{{ url('listing/' . $result->id . '/soil_health_and_fertility_practices') }}" class="back-btn">
												{{ __('Back') }}
											</a>
										</div>

										<div class="mt-4">
											<button type="submit" class="nxt-btn" id="btn_next"><i class="spinner fa fa-spinner fa-spin d-none" ></i>
												<span id="btn_next-text">{{ __('Next') }}</span>

											</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('validation_script')
	<script type="text/javascript" src="{{ asset('public/js/jquery.validate.min.js') }}"></script>

	<script type="text/javascript">
		'use strict'
		let nextText = "{{ __('Next') }}..";
		let fieldRequiredText = "{{ __('This field is required.') }}";
		let page = 'booking';
	</script>

	<script type="text/javascript" src="{{ asset('public/js/listings.min.js') }}"></script>
	
  <script>
            $(document).ready(function(){
                     $(document).on('click','.pest-clone-btn',function(){
                        var clonedFields = $('.pest-original-fields').last().clone();
                         clonedFields.find('textarea').val('');
                        var lastSerialNumber = parseInt($('.pest-original-fields').last().find('.pest-count').text().trim());
                        var newSerialNumber = lastSerialNumber + 1;
                    
                        clonedFields.find('.pest-count').text(newSerialNumber);
                    
                        clonedFields.find('.clone-btn').remove();
                        clonedFields.find('.pest-add-check').html('<button type="button" class="btn btn-danger pest-remove-btn">-</button>');
                    
                        $(".add-pest").append(clonedFields);
                    });
                    
                    $(document).on('click', '.pest-remove-btn', function() {
                        $(this).closest('.row').remove();
                          $('.pest-original-fields').each(function(index) {
                            $(this).find('.pest-count').text(index + 1);
                        });
                    });
                    
                     $(document).on('change','.pest_disease',function(){
                     var self = this;
                     var pest_disease_id = $(this).val();
                      $.ajax({
                        url: "{{ route('pest-disease-fetch.details') }}",
                        type: "post",
                        data: {
                            pest_disease_id: pest_disease_id,
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
	
