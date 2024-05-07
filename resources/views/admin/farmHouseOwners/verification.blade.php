@extends('admin.template')

@section('main')
    <div class="content-wrapper">
        <section class="content">
            @include('admin.farmHouseOwnerDetails.customer_menu')
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ $form_name ?? '' }}</h3>
                            
                        </div>
                      
                        <form class="form-horizontal" action="{{ url('admin/farm-house-owner/verification') }}/{{ $user->id }}"   method="post" enctype="multipart/form-data">
                              @csrf
                              <table class="table table-borderless">

                                  <tbody class="add_verified_fields">
                                         <tr class="verified-original-fields">
                                             <td class="count-number">
                                                 1
                                             </td>
                                             <td>
                                                <div class="form-group  col-sm-8">
                                                 <input type="text" class="form-control" name="document_titles[]" placeholder="Enter Document Title" required>
                                                </div>
                                             </td>
                                             <td>
                                                 <div class="form-group  col-sm-8">
                                                   <input type="file" class="form-control" name="document_images[]" required>
                                                 </div>
                                             </td>
                                             <td>
                                                  <select class="form-control" name="document_status[]" required>
                                                       <option value="unverified">Unverified</option>
                                                       <option value="verified">Verified</option>
                                                  <select>
                                             </td>
                                             <td  class="verified_availability_add-check">
                                                
                                                  <button type="button" class="btn btn-danger btn-sm  clone-btn">+ </button>
                                             </td>
                                         </tr>
                                        
                                  </tbody>
                                 
                              </table>
                              <br>
                             <center>
                                       <button type="submit" class="btn btn-danger"> Submit </button>
                                  </center>
                                  <br>
                        </form>
                        
                        
                             <table class="table table-borderless">
                                  <thead>
                                         <tr> 
                                               <th>S. No.</th>
                                               <th>Document Title</th>
                                               <th>View Document</th>
                                               <th> Update Status</th>
                                               <th>Action</th>
                                         </tr>
                                  </thead>
                                  <tbody>
                                  @php
                                      $i=1;
                                  @endphp
                                    @forelse($user['documents'] as $document)
                                         <tr>
                                             <td>
                                                 {{$i++}}
                                             </td>
                                             <td>
                                                {{$document->title}}
                                             </td>
                                             <td>
                                                   
     
                                               <iframe src="{{ url('public/images/vendor-user/documents/'.$document->image) }}" width="200px" height="200px"></iframe>
                                               <a href="{{ url('public/images/vendor-user/documents/'.$document->image) }}"  TARGET="_blank" class="btn btn-primary btn-sm">Preview</a>
                                              
                                             </td>
                                             <td>
                                                 <div class="form-check form-switch ">
                                                    <input class="form-check-input document-status" type="checkbox"
                                                        data-id="{{ $document->id }}" name="status" @if($document->status=="verified") checked @endif>
                                                </div>
                                             </td>
                                             <td>
                                                  <a href="javascript:void(0);" class="btn btn-danger btn-sm document-delete"  data-id="{{$document->id}}"> <i class="fa fa-trash"></i></a>
                                             </td>
                                             
                                         <tr>
                                     @php
                                         $i++;
                                     @endphp
                                     @empty
                                           <tr></tr>
                                     @endforelse
                                        
                                  </tbody>
                                 
                              </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


@section('validate_script')
    <script src="{{ asset('public/backend/js/intl-tel-input-13.0.0/build/js/intlTelInput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/backend/js/isValidPhoneNumber.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/backend/dist/js/validate.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        'use strict'
        var hasPhoneError = false;
        var hasEmailError = false;
        let requiredFieldText = "This field is required.";
	    let minLengthText = "Please enter at least 6 characters.";
	    let maxLengthText = "Please enter no more than 255 characters.";
        let emailExistText = "Email address is already Existed.";
        let checkUserURL = "{{ route('checkUser.check') }}";
        var url = '{{ asset("public/js/intl-tel-input-13.0.0/build/js/utils.js") }}';
        var duplicate_check_url = "{{ url('duplicate-phone-number-check-for-existing-customer') }}";
        var tel_error = '{{ __("Please enter a valid International Phone Number.") }}'
        var token = "{{ csrf_token() }}";
    </script>
    
    <script src="{{ asset('public/backend/js/customer_edit.min.js') }}"></script>
    
    <script>
           $(document).ready(function(){
                  $(document).on('click','.clone-btn',function(){
                        var clonedFields = $('.verified-original-fields').last().clone();
                        clonedFields.find('input').val('');
                         var lastSerialNumber = parseInt($('.verified-original-fields').last().find('.count-number').text().trim());
                        var newSerialNumber = lastSerialNumber + 1;
                    
                        clonedFields.find('.count-number').text(newSerialNumber);
                        clonedFields.find('.clone-btn').remove();
                        clonedFields.find('.verified_availability_add-check').html('<button type="button" class="btn btn-danger verified-remove-btn">-</button>');
                      
                        $(".add_verified_fields").append(clonedFields);
                    }); 
                    
                    $(document).on('click', '.verified-remove-btn', function() {
                        $(this).closest('.verified-original-fields').remove();
                          $('.verified-original-fields').each(function(index) {
                            $(this).find('.count-number').text(index + 1);
                        });
                    });
                    
                    
                $(document).on('click','.document-delete',function(){
                     var id = $(this).attr('data-id');
                     $.ajax({
                        type:"post",
                        url:"{{url('admin/customer/document/delete')}}",
                        data:{id:id,'_token':"{{ csrf_token() }}"},
                        success:function(res){
                          window.location.reload();
                        }
                     });  
                });
                
                
          $(".document-status").change(function() {
            const isChecked = $(this).is(":checked");
            const Id = $(this).data('id');
            // Send an AJAX request to update the status
                    $.ajax({
                        url: "{{url('admin/customer/document/update/status')}}"
                        , method: 'GET'
                        , data: {
                            id: Id
                        }
                        , success: function(response) {
                                    location.reload();
                        }
                        , error: function() {
                            
                        }
                    });
                });
           });
    </script>
@endsection
    
