@extends('admin.template')
@section('main')
  <div class="content-wrapper">
        <!-- Main content -->
    <section class="content-header">
        <h1>
            Sustainable Farm Practices
            <small> Sustainable Farm Practices</small>
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
                                    <h4>  Sustainable Farm Practices</h4>
                                 
                                </div>
                                                
                                 <div class="card-body add-sustainable mt-3">
                                    @if($sustainable_practices->isNotEmpty())
                                    
                                            @php
                                               $i=1;
                                            @endphp
                                        @foreach($sustainable_practices as $practice)
                                        
                                                <div class="row  sustainable-original-fields">
                                           <div class="col-sm-1 sustainable-count">
                                                  {{$i}}
                                           </div>
                                           
                                            
                                            <div class="col-sm-5 col-md-5">
                                               <div class="form-group">
                									<label class="form-label">Sustainable Farming Practice  <span class="text-red">*</span></label>
                										<select class="form-control sustainable_farming"  name="sustainable_farming[]"   tabindex="-1" aria-hidden="true">
                										     <option value="0">select sustainable farming</option>
                										      @forelse($sustainableFarmings as $sustainableFarming)
                										         <option value="{{$sustainableFarming->id}}"  @if($sustainableFarming->id==$practice->id) selected @endif>{{$sustainableFarming->name}}</option>
                										     @empty
                										     
                										     @endforelse
                										     
                										</select>
                										
                								</div>
                                           </div>
                                            <div class="col-sm-5 col-md-5">
                                                <div class="form-group">
                                                <label class="form-label">Sustainable Details<span class="text-red">*</span></label>
                                                   <textarea class="form-control mb-4 test-data" name="sustainable_farming_details[]"   rows="3" style="height:35px !important" value="{{$practice['sustainable_practice']->description}}">{{$practice['sustainable_practice']->description}}</textarea>
                                              </div>
                                            </div>
                                            
                                           
                                            <div class="col-sm-1 col-md-1 sustainable-add-check d-flex justify-content-center align-items-center"> 
                                              @if($i==1)
                                              
                                                <button type="button" class="btn btn-primary  sustainable-clone-btn">   + </button>
                                              @else
                                                 <button type="button" class="btn btn-danger sustainable-remove-btn">-</button>
                                              @endif
                                           </div>
                                        </div>
                                               @php
                                                     $i++;
                                               @endphp
                                        @endforeach
                                    
                                    
                                    @else
                                        <div class="row  sustainable-original-fields">
                                           <div class="col-sm-1 sustainable-count">
                                                  1
                                           </div>
                                           
                                            
                                            <div class="col-sm-5 col-md-5">
                                               <div class="form-group">
                									<label class="form-label">Sustainable Farming Practice  <span class="text-red">*</span></label>
                										<select class="form-control sustainable_farming"  name="sustainable_farming[]"   tabindex="-1" aria-hidden="true">
                										     <option value="0">select sustainable farming</option>
                										      @forelse($sustainableFarmings as $sustainableFarming)
                										         <option value="{{$sustainableFarming->id}}">{{$sustainableFarming->name}}</option>
                										     @empty
                										     
                										     @endforelse
                										     
                										</select>
                										
                								</div>
                                           </div>
                                            <div class="col-sm-5 col-md-5">
                                                <div class="form-group">
                                                <label class="form-label">Sustainable Details<span class="text-red">*</span></label>
                                                   <textarea class="form-control mb-4 test-data" name="sustainable_farming_details[]"   rows="3" style="height:35px !important"></textarea>
                                              </div>
                                            </div>
                                            
                                           
                                            <div class="col-sm-1 col-md-1 sustainable-add-check d-flex justify-content-center align-items-center"> 
                                                <button type="button" class="btn btn-primary  sustainable-clone-btn">   + </button>
                                           </div>
                                        </div>
                                      @endif
                        </div>               
                                                
                                                
                                                
                                <div class="clear-both"></div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6 text-left">
                                            <a data-prevent-default="" href="{{ url('admin/listing/' . $result->id . '/products') }}" class="btn btn-large btn-primary f-14">Back</a>
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
                    $(document).on('click','.sustainable-clone-btn',function(){
                        var clonedFields = $('.sustainable-original-fields').last().clone();
                          clonedFields.find('textarea').val('');
                        var lastSerialNumber = parseInt($('.sustainable-original-fields').last().find('.sustainable-count').text().trim());
                        var newSerialNumber = lastSerialNumber + 1;
                    
                        clonedFields.find('.sustainable-count').text(newSerialNumber);
                    
                        clonedFields.find('.clone-btn').remove();
                        clonedFields.find('.sustainable-add-check').html('<button type="button" class="btn btn-danger sustainable-remove-btn">-</button>');
                    
                        $(".add-sustainable").append(clonedFields);
                    });
                    
                    $(document).on('click', '.sustainable-remove-btn', function() {
                        $(this).closest('.row').remove();
                          $('.sustainable-original-fields').each(function(index) {
                            $(this).find('.sustainable-count').text(index + 1);
                        });
                    });
                    
                $(document).on('change','.sustainable_farming',function(){
                     var self = this;
                     var sustainable_id = $(this).val();
                      $.ajax({
                        url: "{{ route('sustainable-fetch.details') }}",
                        type: "post",
                        data: {
                            sustainable_id: sustainable_id,
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


