	@extends('template')
	<style>
	    .tble-cstm tr th{
	        background:#7cb342;
	        color:#fff;
	        text-align:left;
	    }
	    .ad-btn{
	        width:30px;
	        height:30px;
	        background:#cc0000;
	        color:#fff;
	        border:none;
	        outline:none;
	        border-radius:50%;
	        display:flex;
	        justify-content:center;
	        align-items:center;
	        

	    }
	    .veri-submt{
	        padding:6px 25px;
	        background:#cc0000;
	        color:#fff;
	        border:none;
	        font-size:13px;
	        outline:none;
	        border-radius:30px;
	        display:flex;
	        justify-content:center;
	        align-items:center;
	        

	    }
	    .file-inp::file-selector-button {
  border:none;
  outline:none;
  background:#f2f2f2;
  color:#222;
  font-size:11px !important;
  width:100px;
  height:100% !important;
}
.v-inp{
    font-size:13px !important;
}
.v-inp::placeholder{
    font-size:12px !important;
    
}
	</style>
	@section('main')
	<div class="margin-top-85">
		<div class="row m-0">
			<!-- sidebar start-->
			@include('users.sidebar')
			<!--sidebar end-->
			<div class="col-lg-10 p-0 ">
				<div class="container-fluid min-height ">
					<div class="col-md-12 mt-5">
						<div class="main-panel">

							@include('users.profile_nav')

							<!--Success Message -->
							@if (Session::has('message'))
								<div class="row mt-5">
									<div class="col-md-12  alert {{ Session::get('alert-class') }} alert-dismissable fade in top-message-text opacity-1">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										{{ Session::get('message') }}
									</div>
								</div>
							@endif

							<div class="row justify-content-center mt-5">
								       <form class="form-horizontal" action="{{ url('users/customer/verification') }}"   method="post" enctype="multipart/form-data">
                              @csrf
                              <table class="table table-borderless">

                                  <tbody class="add_verified_fields">
                                         <tr class="verified-original-fields d-flex justify-content-center align-items-center" style="gap:50px !important; flex-wrap:wrap; border:1px solid #c9c9c9  !important; padding:5px; border-radius:7px !important; margin-top:10px;;" >
                                             <td class="count-number ">
                                                 1
                                             </td>
                                             <td>
                                                <div >
                                                 <input type="text" class="form-control w-100 v-inp" name="document_titles[]" placeholder="Enter Document Title" required style="width:250px">
                                                </div>
                                             </td>
                                             <td>
                                                 <div >
                                                   <input type="file" class="form-control file-inp p-0 v-inp" name="document_images[]" required style="width:280px">
                                                 </div>
                                             </td>
                                             <td>
                                                  <select class="form-control v-inp " name="document_status[]" required style="width:250px">
                                                       <option value="unverified">Unverified</option>
                                                  <select>
                                             </td>
                                             <td  class="verified_availability_add-check">
                                                
                                                  <button type="button" class=" ad-btn  clone-btn">+ </button>
                                             </td>
                                         </tr>
                                        
                                  </tbody>
                                 
                              </table>
                              <br>
                             <center>
                                       <button type="submit" class="w2v-lgn-btn w-25"> Submit </button>
                                  </center>
                                  <br>
                        </form>
                        
                        
                             <table class="table table-bordered tble-cstm">
                                  <thead>
                                         <tr> 
                                               <th>S. No.</th>
                                               <th>Document Title</th>
                                               <th>View Document</th>
                                               <th>Status</th>
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
                                                {{$document->status}}
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
				</div>
			</div>
		</div>
	</div>
	@endsection
	@section('validation_script')
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
                        url:"{{url('users/customer/document/delete')}}",
                        data:{id:id,'_token':"{{ csrf_token() }}"},
                        success:function(res){
                          window.location.reload();
                        }
                     });  
                });
                
                
     
           });
        </script>
	@endsection
