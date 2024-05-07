@extends('template')

@section('main')
<style>
    .ad-btn{
        border:none;
        outline:none;
        padding:7px 12px;
        background:#fff;
        color:#7cb342;
        border-radius:2px;
       font-size:12px;
       font-weight:600;
       border:1px solid #fff;
       transition:0.5s;
       
        
    }
    .ad-btn:hover{
        background:transparent;
        color:#fff !important;
        
    }
    .shrt-desc p{
        font-size:14px;
        color:#222;
        line-height:27px;
        margin-top:15px;
        letter-spacing:0.5px;
    }
</style>
<div class="margin-top-85">
    <div class="row m-0">
        @include('users.sidebar')

        <div class="col-lg-10">
            <div class="main-panel">
                <div class="container-fluid min-height">
                    <div class="row">
                        <div class="col-md-12 p-0 mb-3">
                            <div class="list-bacground mt-4 rounded-3 p-4 border d-flex justify-content-between align-items-center" style="background:#7cb342;">
                                <div class=" d-flex justify-content-between align-items-center " style="width:55%; flex-wrap:wrap;" >
                                <div class="pull-right "><a class="ad-btn f-14 " href="{{ url('/property/create') }}">Add Farm Houses</a></div>
                                    <span class="text-18 " style="font-weight:500; color:#fff; font-size:21px;">{{ __('Farm House Listing') }}</span>    
                                </div>

                                <div >
                                    <div class="d-flex align-items-center">
                                        <div class="pr-4">
                                            <span class="text-14 pt-2 pb-2 font-weight-700 text-white" >{{ __('Sort By') }}</span>
                                        </div>

                                        <div>
                                            <form action="{{ url('/properties') }}" method="POST" id="listing-form">
                                                {{ csrf_field() }}
                                                <select class="form-control text-center text-14 minus-mt-6" id="listing_select" name="status" style="height:30px; width:120px; border-radius:4px;">
                                                    <option value="All" {{ ($status ?? '') == "All" ? ' selected = "selected"' : '' }}>{{ __('All') }}</option>
                                                    <option value="Listed" {{ ($status ?? '') == "Listed" ? ' selected = "selected"' : '' }}>{{ __('Listed') }}</option>
                                                    <option value="Unlisted" {{ ($status ?? '') == "Unlisted" ? ' selected = "selected"' : '' }}>{{ __('Unlisted') }}</option>
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-success d-none" role="alert" id="alert">
                        <span id="messages"></span>create
                    </div>
                  
                    <div id="products" class="row mt-3">
                        @forelse ($properties as $property)
                            <div class="col-md-12 p-0 mb-4">
                                <div class=" row   p-2 " style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;border:3px solid #7cb342; border-radius:8px;">
                                    <div class="col-md-3 col-xl-4 p-2">
                                        <div class="img-event">
                                            <a href="properties/{{ $property->slug }}">
                                                <img class="room-image-container200 rounded" src="{{ $property->cover_photo }}" alt="cover_photo">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-5 col-xl-5 p-2">
                                        <div class="d-flex align-items-center justify-content-between" >
                                            <a href="properties/{{ $property->slug }}">
                                                <p class="mb-0 text-18 text-color font-weight-700 text-color-hover">{{ ($property->name == '') ? '' : $property->name }}</p>
                                            </a>
                                            <p class="text-14  text-muted mb-0">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{ optional($property->property_address)->address_line_1 }}
                                        </p>
                                        </div>
                                        <div class="shrt-desc">
                                            <p>
                                                Reconnect with nature at this unforgettable escape. 
Be it a picturesque sunset or bright stary night!
Perfect get away from the hustle of your life and rejuvenate oneself.
                                            </p>
                                            
                                        </div>

                                        

                                      

                                        <ul class="list-inline mt-2 pb-3 d-flex justify-content-start">
                                            <li class="list-inline-item border rounded-3 p-1 mt-4 pl-3 pr-3">
                                                <p class="text-center mb-0">
                                                    <i class="fas fa-bed text-20 d-none d-sm-inline-block " style="color:#7cb342;"></i>
                                                    {{ $property->bedrooms }}
                                                    <span class=" text-14 font-weight-700">{{ __('Beds') }}</span>
                                                </p>
                                            </li>
                                            <li class="list-inline-item  border rounded-3 mt-4 p-1  pl-3 pr-3">
                                                <p  class="text-center mb-0" >
                                                    <i class="fas fa-user-friends d-none d-sm-inline-block text-20 " style="color:#7cb342;"></i>
                                                    {{ $property->accommodates }}
                                                    <span class=" text-14 font-weight-700">{{ __('Guests') }}</span>
                                                </p>
                                            </li>
                                            <li class="list-inline-item  border rounded-3 mt-4 p-1  pl-3 pr-3">
                                                <p  class="text-center mb-0">
                                                    <i class="fas fa-bath text-20  d-none d-sm-inline-block  " style="color:#7cb342;"></i>
                                                    {{ $property->bathrooms }}
                                                    <span class="text-14 font-weight-700">{{ __('Bathrooms') }}</span>
                                                </p>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-md-4 col-xl-3">
                                        <div class=" w-100 h-100  mt-3 mt-sm-0 p-2">
                                         
                                            
                                                <div class="row">
                                                    <div class="col-6 col-sm-12 " >
                                                         <div class="review-0 ">
                                            <div class="d-flex justify-content-around align-items-center">
                                                <div>
                                                    <span><i class="fa fa-star text-14 secondary-text-color"></i>
                                                        @php
                                                            $review = $property->reviews_count;
                                                        @endphp
                                                        @if ($review)
                                                            {{ $property->avg_rating }}
                                                        @else
                                                            0
                                                        @endif
                                                        ({{ $review }})
                                                    </span>
                                                </div>

                                                <div class="">
                                                    <span class="font-weight-700 text-20">{!! moneyFormat( $currentCurrency->symbol, optional($property->property_price)->price) !!}</span> / {{ __('night') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-6 col-sm-12">
                                                        <div class="main-toggle-switch text-left text-sm-center  d-flex justify-content-center align-items-center" style="height:80px;">
                                                            @if ($property->steps_completed == 0)
                                                                @if ($property_approval == 'Yes' && $property->is_verified == 'Pending' )
                                                                    <span class="badge badge-warning p-3 pl-4 pr-4 text-14 border-r-25">{{ __('Waiting for verify') }}</span>
                                                                @else
                                                                    <label class="toggleSwitch large" onclick="">
                                                                        <input type="checkbox" id="status" data-id="{{ $property->id }}" data-status="{{ $property->status }}"  {{ $property->status == "Listed" ? 'checked' : '' }}/>
                                                                        <span>
                                                                            <span>{{ __('Unlisted') }}</span>
                                                                            <span>{{ __('Listed') }}</span>
                                                                        </span>
                                                                        <a href="#" aria-label="toggle"></a>
                                                                    </label>
                                                                @endif
                                                            @else
                                                            <span class="badge badge-warning p-3 pl-4 pr-4 text-14 border-r-25">{{ $property->steps_completed }} {{ __('steps to listed') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if ($property->steps_completed != 0 && $property->is_verified == 'Pending' && $property_approval == 'Yes')
                                                        <div class="col-6 col-sm-12">
                                                            <a href="{{ url('listing/' . $property->id . '/basics') }}" >
                                                                <div class="text-color text-color-hover text-14 text-right text-sm-center mt-0 mt-md-3 p-2" >
                                                                    <i class="fas fa-edit"></i>
                                                                    {{ __('Manage Listing and Calendar') }}
                                                                </div>
                                                            </a>
                                                        </div>
                                                    @elseif ($property->is_verified == 'Pending' && $property_approval == 'Yes')
                                                    @else
                                                        <div class="col-6 col-sm-12">
                                                            <a href="{{ url('listing/' . $property->id . '/basics') }}">
                                                                <div class="text-color text-color-hover text-14 text-right text-sm-center mt-0 mt-md-3 p-2" style="font-weight:600;">
                                                                    <i class="fas fa-edit"></i>
                                                                    {{ __('Manage Listing') }}
                                                                </div>
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="row jutify-content-center position-center w-100 p-4 mt-4">
                                <div class="text-center w-100">
                                    <img src="{{ asset('public/img/unnamed.png') }}" class="img-fluid"   alt="Not Found">
                                    <p class="text-center">{{ __('You don’t have any Listing yet—but when you do, you’ll find them here.') }}</p>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <div class="row justify-content-between overflow-auto  pb-3 mt-4 mb-5">
                        {{ $properties->appends(request()->except('page'))->links('paginate') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('validation_script')
<script type="text/javascript">
    'use strict'
    var token = "{{ csrf_token() }}";
    var hasBeen = "{{ __('has been') }}";
</script>
<script src="{{ asset('public/js/front.min.js') }}"></script>
@endsection




