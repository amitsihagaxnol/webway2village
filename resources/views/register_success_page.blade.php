@extends('template')
<style>
.n-hvr{
   color:#fff !important;
   margin-left:10px;
}
.n-hvr2{
   color:#222 !important;
}
    .n-hvr:hover{
        color:#fff !important;
    }
    .n-hvr2:hover{
        color:#222 !important;
    }
    .md-c-3{
        height:100%;
        padding:20px !important;
        background:#fff;

    }
    .md-c-3 p{
        font-size:13px;
        line-height:30px;
    }
   .btn-model{
       background: #7cb342;
       color:#fff;
       padding:3px 15px;
       border-radius:4px;

   }
.intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-2 .selected-flag {
    background:#f2f2f2;
    color:#222;
    font-size:13px;
    height: 100% !important;
}
.intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-3 .selected-flag {
    width: 65px;
    height: 50px !important;
    font-size: 13px;
    padding:5px;
}
.remember-inp[type=checkbox] {
    display: inline-block !important;
    height: 15px !important;
    width: 15px !important;
    text-align: center !important;
    vertical-align: top !important;
    border-width: 1px !important;
    border-style: solid !important;
    border-color: rgb(176, 176, 176) !important;
    background: rgb(255, 255, 255) !important;
    overflow: hidden !important;
    border-radius: 4px !important;
    margin-right: 5px;
}
</style>
@push('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('js/intl-tel-input-13.0.0/build/css/intlTelInput.min.css') }}">
	<!--<link rel="stylesheet" type="text/css" href="{{ asset('css/custom-theme.css') }}" />-->
@endpush
@section('main')
<div class="container margin-top-85 pb-5  d-flex justify-contnet-center align-items-center flex-column " >
    <h2 class="mn-lgn-tle my-3">Registered Successfully</h2>
    <div class="d-flex justify-content-center align-items-center my-5 sgnup-bx pd-2"  style="background:#7cb342; padding: 35px;  border-radius:5px;">
		<div class="p-4  " style="border:4px solid #fff; border-radius:10px">
		    @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <p>Thanks for registering with us. Please follow these steps to complete the Process.</p>
                    <ol>
                        <li>Please check your inbox and click on the verification link to get Active.</li>
                        <li>Login to the Account and Complete the Profile Set Up.</li>
                    </ol>
                    <p>Thanks</p>
                </div>

            </div>

			</div>
    </div>
</div>



@endsection

