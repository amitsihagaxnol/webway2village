@extends('admin.template')
@section('main')
  <div class="content-wrapper">
        <!-- Main content -->
    <section class="content-header">
        <h1>
            Pest and Disease Farm Practices
            <small>Pest and Disease Farm Practices</small>
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
                                    <h4> Pest and Disease Farm Practices</h4>
                                 
                                </div>
                                                  
                               <div class="card-body add-pest mt-2">
                                           @if($pest_disease_practices->isNotEmpty())
                                    
                                            @php
                                               $i=1;
                                            @endphp
                                        @foreach($pest_disease_practices as $practice)
                                        
                                                             <div class="row  pest-original-fields">
                                           <div class="col-sm-1 pest-count">
                                                  {{$i}}
                                           </div>
                                           
                                            
                                            <div class="col-sm-5 col-md-5">
                                               <div class="form-group">
                									<label class="form-label"> Pest and Disease Management <span class="text-red">*</span></label>
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
                                                <div class="form-group">
                                                <label class="form-label">Pest and Disease Details<span class="text-red">*</span></label>
                                                   <textarea class="form-control mb-4" name="pest_disease_details[]" placeholder="full address" rows="3" style="height:35px !important;" value="{{$practice['pest_disease_practice']->description}}">{{$practice['pest_disease_practice']->description}}</textarea>
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
                                           <div class="col-sm-1 pest-count">
                                                  1
                                           </div>
                                           
                                            
                                            <div class="col-sm-5 col-md-5">
                                               <div class="form-group">
                									<label class="form-label"> Pest and Disease Management <span class="text-red">*</span></label>
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
                                                <div class="form-group">
                                                <label class="form-label">Pest and Disease Details<span class="text-red">*</span></label>
                                                   <textarea class="form-control mb-4" name="pest_disease_details[]" placeholder="full address" rows="3" style="height:35px !important;"></textarea>
                                              </div>
                                            </div>
                                            
                                           
                                            <div class="col-sm-1 col-md-1 pest-add-check d-flex justify-content-center align-items-center"> 
                                                <button type="button" class="btn btn-primary  pest-clone-btn">   + </button>
                                           </div>
                                        </div>
                                    @endif
                        </div>               
                                                  
                                                  
                                <div class="clear-both"></div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6 text-left">
                                            <a data-prevent-default="" href="{{ url('admin/listing/' . $result->id . '/soil_health_and_fertility_practices') }}" class="btn btn-large btn-primary f-14">Back</a>
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


