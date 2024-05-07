@extends('template')
@section('main')
<meta name="csrf-token" content="{{ csrf_token() }}">

    <style>



        table {
            background-color: transparent;
            max-width: 100%;
        }

        th {
            text-align: left;
        }

        table {
            width: 100%;
            margin-bottom: 15px;
        }

        table>thead>tr>th,
        table>tbody>tr>th,
        table>tfoot>tr>th,
        table>thead>tr>td,
        table>tbody>tr>td,
        table>tfoot>tr>td {
            border-top: 1px solid #dbdbdb;
            border: 1px solid #dbdbdb;
            line-height: 2.5;
            padding-left: 3px;
            text-align: center;
            vertical-align: top;
        }

        table thead tr th {
            border-top: 1px solid #dbdbdb;
            text-align: center;
            text-transform: capitalize;
        }



        table>thead>tr>th {
            border-bottom: 2px solid #dbdbdb;
            vertical-align: bottom;
        }

        table>caption+thead>tr:first-child>th,
        table>colgroup+thead>tr:first-child>th,
        table>thead:first-child>tr:first-child>th,
        table>caption+thead>tr:first-child>td,
        table>colgroup+thead>tr:first-child>td,
        table>thead:first-child>tr:first-child>td {
            border-bottom: 0;
        }

        table>tbody+tbody {
            border-top: 2px solid #dbdbdb;
        }
        .activity-checkbox:focus,.facility-checkbox:focus{
            outline:none;
                
        }

    </style>
    <br>
    <br>
    <br>
    <br>
    <div id="at-wrapper" class="at-wrapper at-haslayout">

        <section class="details-section py-5 h-100 mt-4">
            <div class="container text-left pdng">
                <div class="row" style="padding:0px 30px;">
                    <div class="col-lg-9">
                        <div class="main-name">
                            <h2>
                                @if (isset($property))
                                    {{ $property->name }}
                                @endif
                            </h2>
                            <span><i class="fa-solid fa-crown"></i>Premium</span>
                        </div>
                    </div>
                    <div class="col-lg-3 p-0">
                        <div class="share-icnz w-100 p=0" style="justify-content:flex-end;gap:10px;">
                            <a href="#" class="text-muted"><span><i class="fa-solid fa-share-from-square"></i></span>
                                </a>
                            <a href="#" class="text-muted"><span><i class="fa-regular fa-heart"></i></span> </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-3 pdng">
                <div class="row">
                    <div class="col-lg-8 pdng">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 pdng" >
                                    <div>
                                        <section class="gallery">
                                            @if(!empty($property->property_photos))
                                                @foreach ($property->property_photos as $key => $photo)
                                                @if ($photo->cover_photo)
                                                    <div class="gallery__item">
                                                        <input type="radio" id="cover-img" checked name="gallery" class="gallery__selector" />
                                                        <img class="gallery__img" src="{{ asset('public/images/property/'.$photo->property_id.'/'.$photo->photo ) }}" alt="" />
                                                        <label for="cover-img" class="gallery__thumb"><img src="{{ asset('public/images/property/'.$photo->property_id.'/'.$photo->photo)}}" alt="" class="botom-img" /></label>
                                                    </div>
                                                    @break
                                                @endif
                                                @endforeach
                                                @foreach ($property->property_photos as $photo)
                                                    @if (!$photo->cover_photo)
                                                        <div class="gallery__item">
                                                            <input type="radio" id="img-{{ $photo->serial }}" name="gallery" class="gallery__selector" />
                                                            <img class="gallery__img" src="{{ asset('public/images/property/'.$photo->photo ) }}" alt="" />
                                                            <label for="img-{{ $photo->serial }}" class="gallery__thumb"><img src="{{ asset('public/images/property/'.$photo->property_id.'/'.$photo->photo)}}" alt="" class="botom-img" /></label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </section>
                                    </div>
                                    <div class="main-details">
                                        <h3>Room in Badowala, India</h3>
                                        <p>1 Double Bed Private Attached Bathroom</p>
                                        <p>
                                            <span class="fas fa-star spn-1"></span> No Reviews Yet
                                        </p>
                                    </div>
                                </div>
                                <div class="col-12" >
                                    <div class="w-100 my-5 details-scroll">
                                        <ul class="w-100 d-flex justify-content-between align-items-center">
                                            <li class="m-md-30"><a class="" href="#about">Basic Details</a></li>
                                            <li class="m-md-30"><a class="" href="#general">General Information</a></li>
                                            <li class="m-md-30"><a class="" href="#facilities">Facilities</a></li>
                                            <li class="m-md-30"><a class="" href="#Activities">Activities</a></li>
                                            <li class="m-md-30"><a class="" href="#terms">Terms & Conditions</a></li>
                                            <li class="m-md-30"><a class="" href="#reviews">Reviews</a></li>
                                            <!--<li><a class="" href="#nearlocation">Near by Location</a></li>-->
                                        </ul>
                                    </div>
                                    <div class="sumry-bx">
                                        <h3 class="d-tle">Summary</h3>
                                        <p>{{ $property['property_description']->summary }}</p>
                                    </div>
                                </div>

                                <div class="col-12 mt-3"  id="about">
                                    <h3 class="d-tle">Basic Details</h3>
                                    <table class="table details-table " style="border-color:#7cb342 !important;">
                                        <thead>
                                            <tr>
                                                <!--<i class="fa-solid fa-house" style="margin-right:10px; color:#a3a3a3c; "></i>-->
                                                <th><label style="width:25px; color:#a3a3a3;"><i class="fa-solid fa-house" ></i></label> Accommodation</th>
                                                <td>{{ $property->farm_house->accomodation_type ?? '' }}</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                 <!--<i class="fa-solid fa-bed" style="margin-right:10px; color:#a3a3a3; "></i>-->
                                                <th><label style="width:30px;  color:#a3a3a3;"><i class="fa-solid fa-bed" ></i></label>Stay Availability</th>
                                                <td><div style="width:150px;">{{ $property->stay_available == '1' ? 'Yes' : 'No' }}</div></td>
                                            </tr>
                                            <tr>
                                                <!--<i class="fa-solid fa-building" style="margin-right:10px; color:#a3a3a3; "></i>-->
                                                <th ><label style="width:25px; color:#a3a3a3;"><i class="fa-solid fa-building" ></i></label> Types of room we have</th>
                                                 <td></td>
                                            </tr>
                                            @foreach ($property->property_room_types as $item)
                                                <tr>
                                                    <th colspan="2">
                                                        {{ $item->roomType->name }}
                                                        ({{ $item->price_per_night . ' INR / Per Night' }})
                                                    </th>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-12 mt-3"  id="general">
                                    <h3 class="d-tle">General Information</h3>
                                    <table class="table details-table">
                                        <thead>
                                            <tr>
                                                <th><div style="width:150px;"><label style="width:25px; color:#a3a3a3;"><i class="fa-solid fa-house"></i></label>Property Type</div></th>
                                                <td>{{ $property['farm_house']['property_type']->name ?? '' }}</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th><label style="width:25px; color:#a3a3a3;"><i class="fa-solid fa-house-chimney-window"></i></label>Farm Type </th>
                                                <td>{{ $property['farm_house']['farm_type']->name ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th><label style="width:25px; color:#a3a3a3;"><i class="fa-solid fa-location-dot"></i></label>Location</th>
                                                <td>{{ $property->farm_house->location ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th><label style="width:25px; color:#a3a3a3;"><i class="fa-regular fa-address-card"></i></label>Full Address</th>
                                                <td>{{ $property->farm_house->full_address ?? '' }} </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 mt-3" id="facilities">
                                    <h3 class="d-tle">Facilities</h3>
                                    <table class="table acd-table-2 mt-3" style="border: none">
                                        <thead>
                                            <tr>
                                                <th style="border-left:1px solid #ccc;">Facility Name</th>
                                                <th>Price</th>
                                                <th>Description</th>
                                                <th>Select</th> <!-- Header for the checkbox column -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($property['farm_facility']))
                                                @php $count = 0; @endphp <!-- Initialize a counter -->
                                                @foreach ($property['farm_facility'] as $facility)
                                                    <tr>
                                                        <td>{{ $facility->name }}</td>
                                                        <td>{{ $facility->price }}</td>
                                                        <td>{{ $facility->Description }}</td>
                                                        <td>
                                                            <!-- Checkbox input -->
                                                            <input type="checkbox" name="facility_ids[]" class="facility-checkbox" style="height: 21px !important; width: 21px !important; margin-top:10px;" id="facility-{{ $facility->id }}" data-name="{{ $facility->name }}" data-price="{{ $facility->price }}">
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>


                                <div class="col-12 mt-3"  id="Activities">
                                    <h3 class="d-tle">Activities</h3>
                                    @if (isset($property['farm_activity']))
                                        @foreach ($property['farm_activity'] as $Factivity)
                                            <div class="details-activities">
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <div class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                                            href="#">
                                                            <div class="col-lg-5 details-activities-img-bx">
                                                                <img src="{{ asset('public/images/activity/images/' . $Factivity->image) }}"
                                                                    alt="" />
                                                            </div>
                                                            <div class="col-lg-7">
                                                               <div class="d-flex justify-content-between align-items-center">
                                                                    <h6 class="mb-0 dt-act-tle">{{ $Factivity->name ?? '' }}</h6>
                                                                <div class="">
                                                                <input type="checkbox" class="activity-checkbox" style="height: 21px !important; width: 21px !important;" id="activity-{{ $Factivity->id }}" data-name="{{ $Factivity->name }}" data-price="{{ $Factivity->price }}">
                                                            </div>
                                                               </div>
                                                                <small class="text-body-secondary mt-2"
                                                                    style="line-height: 0px">{{ $Factivity->description }}
                                                                </small>
                                                                <p><span>INR</span>{{ $Factivity->price ?? '' }} </p>
                                                            </div>
                                                            
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="col-12 my-2">


                                    <div class="accordion accordion-flush" id="accordionPanelsStayOpenExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                    aria-expanded="false" aria-controls="flush-collapseOne">
                                                    Organic Products
                                                </button>
                                            </h2>
                                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body" style="overflow-x:auto;">
                                                    <table class="table acd-table ">
                                                        <tr>
                                                           <th><div class="tble-wd">Product Title</div></th>
                                                            <th><div class="tble-wd">Product Unit Price</div></th>
                                                            <th><div class="tble-wd">Seasonal Availability </div></th>
                                                            <th><div class="tble-wd">Product Description</div></th>
                                                            <th><div class="tble-wd">Product Availability </div></th>
                                                        </tr>
                                                        @if (isset($property['organic_product']))
                                                            @foreach ($property['organic_product'] as $organicProduct)
                                                                <tr>
                                                                    <td>{{ $organicProduct['product_title'] ?? '' }}</td>
                                                                    <td>{{ $organicProduct['price'] ?? '' }}</td>
                                                                    <td>{{ $organicProduct['seasonal_availability'] ?? ''  }}</td>
                                                                    <td>{{ $organicProduct['description'] ?? '' }}</td>
                                                                    <td>{{ $organicProduct['product_availability'] ?? '' }}</td>
                                                                </tr>
                                                            @endforeach
                                                        @endif

                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                                    aria-expanded="false" aria-controls="flush-collapseTwo">
                                                    Sustainable Practices
                                                </button>
                                            </h2>
                                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body" style="overflow-x:auto;">
                                                    <table class="table acd-table">
                                                        <tr>
                                                            <th><div style="width:270px;">Sustainable Farming Practice</div></th>
                                                            <th><div style="width:270px;">Sustainable Details</div></th>

                                                        </tr>
                                                        @foreach ($property->farm_sustainable_practices as $practice)
                                                        <tr>
                                                            <td>
                                                                <div >
                                                                   {{ optional($practice->sustainable_practice)->name ?? '' }}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <p class="m-0 font-size:13px; line-height:25px;">
                                                                       {{ optional($practice->sustainable_practice)->description ?? '' }}
                                                                    </p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                                    aria-expanded="false" aria-controls="flush-collapseThree">
                                                    Irrigation Method Farm Practices
                                                </button>
                                            </h2>
                                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <table class="table acd-table" style="overflow-x:auto;">
                                                        <tr>
                                                             <th><div style="width:270px;">Irrigation Method</div> </th>
                                                            <th><div style="width:270px;">Irrigation Details</div></th>

                                                        </tr>
                                                        @foreach ($property->farm_house_irrigation_practice as $irrigation)
                                                        <tr>

                                                            <td>
                                                                <div >
                                                                   {{ optional($irrigation->irrigation_method)->name ?? '' }}
                                                                </div>
                                                            </td>
                                                            <td>

                                                                <div>
                                                                    <p class="m-0 font-size:13px; line-height:25px;">
                                                                       {{ optional($irrigation->irrigation_method)->description ?? '' }}
                                                                    </p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapsefour"
                                                    aria-expanded="false" aria-controls="flush-collapsefour">
                                                    Soil Health and Fertility Practices
                                                </button>
                                            </h2>
                                            <div id="flush-collapsefour" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body" style="overflow-x:auto;">
                                                    <table class="table acd-table">
                                                        <tr>
                                                            <th><div style="width:270px;">Soil Health and Fertility Practices</div></th>
                                                            <th><div style="width:270px;">Soil Health and Fertility Details</div></th>
                                                        </tr>
                                                        @foreach ($property->farm_house_soil_health_practice as $health)
                                                            <tr>
                                                                <td>
                                                                    <div >
                                                                        {{ optional($health->soil_health_practice)->name ?? '' }}
                                                                    </div>
                                                                </td>
                                                                <td>

                                                                    <div>
                                                                        <p class="m-0 font-size:13px; line-height:25px;">
                                                                           {{ optional($health->soil_health_practice)->description ?? ''}}
                                                                        </p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapsefive"
                                                    aria-expanded="false" aria-controls="flush-collapsefive">
                                                    Pest Disease Farm Practices
                                                </button>
                                            </h2>
                                            <div id="flush-collapsefive" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body" style="overflow-x:auto;">
                                                    <table class="table acd-table" >
                                                        <tr>
                                                           <th><div style="width:270px;">Pest and Disease Management</div></th>
                                                            <th><div class="tble-wd-2">Pest and Disease Details</div></th>

                                                        </tr>
                                                        @foreach ($property->farm_house_pest_disease_practice as $pest)
                                                        <tr>
                                                            <td>
                                                                <div >
                                                                    {{ $pest->pest_disease_practice->name }}
                                                                </div>
                                                            </td>
                                                            <td>

                                                                <div>
                                                                    <p class="m-0 font-size:13px; line-height:25px;">
                                                                        {{ $pest->pest_disease_practice->description }}
                                                                    </p>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-5">
                                    <div class="details-terms-condition mt-4" id="terms">
                                    <ul class="list-unstyled">
                                        <li>
                                            <div class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none"
                                                href="#">
                                                <div class="col-lg-5 details-terms-img-bx">
                                                    <img src="{{ asset('public/images/terms.png') }}" alt="" />
                                                </div>
                                                <div class="col-lg-7 pdng-20">
                                                    <h6 class="mb-0" style="font-size: 25px">
                                                        Terms & Conditions
                                                    </h6>
                                                    <div style="height:140px;">
                                                        <small class="text-body-secondary mt-2" style="line-height: 0px; font-size:12px;">Lorem
                                                        {!! str_limit($property->terms_condition, 250) !!}
                                                    </small>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-start align-items-center w-100 mt-3">
                                                        <button class="terms-btn" role="button">
                                                            Read All
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                </div>
                                <div class="col-12 mt-5"  id="reviews">
                                    <h3>256 Reviews</h3>
                                    <div class="container mt-4 shdw">
                                        <div class="row">
                                            <div class="col-lg-2 p-0 d-flex justify-content-center align-items-center"
                                                style="padding: 0">
                                                <div class="review-img-box">
                                                    <img src="{{ asset('public/images/user/user.png') }}" alt="" />
                                                </div>
                                            </div>
                                            <div class="col-lg-8 pdng-20">
                                                <div class="main-review">
                                                    <small style="color: #7cb342">HUNTER LAMOUREAUX</small>
                                                    <p style="font-weight: 600; color: #000">
                                                        it Was as great as expected. Amazing
                                                    </p>
                                                    <p style="font-weight: 400; color: #ccc">
                                                        June 27, 2023
                                                    </p>
                                                    <div class="review-box mt-2">
                                                        <p>
                                                            Lorem ipsum dolor sit amet consectetur,
                                                            adipisicing elit. Libero quibusdam nihil
                                                            dolorem. Molestias tempora consectetur error
                                                            exercitationem minus laboriosam? Itaque, fuga
                                                            repellat? Doloremque beatae obcaecati, unde
                                                            molestiae facilis corporis illum.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 pdng-20">
                                                <small>
                                                    <span class="fas fa-star spn-star-review"></span>
                                                    <span class="fas fa-star spn-star-review"></span>
                                                    <span class="fas fa-star spn-star-review"></span>
                                                    <span class="fas fa-star spn-star-review"></span>
                                                    <span class="fas fa-star spn-star-review"></span>
                                                </small>
                                                <p>Excellent</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container mt-4 shdw">
                                        <div class="row">
                                            <div class="col-lg-2 p-0 d-flex justify-content-center align-items-center"
                                                style="padding: 0">
                                                <div class="review-img-box">
                                                    <img src="{{ asset('public/images/user/user.png') }}" alt="" />
                                                </div>
                                            </div>
                                            <div class="col-lg-8 pdng-20">
                                                <div class="main-review">
                                                    <small style="color: #7cb342">HUNTER LAMOUREAUX</small>
                                                    <p style="font-weight: 600; color: #000">
                                                        it Was as great as expected. Amazing
                                                    </p>
                                                    <p style="font-weight: 400; color: #ccc">
                                                        June 27, 2023
                                                    </p>
                                                    <div class="review-box mt-2">
                                                        <p>
                                                            Lorem ipsum dolor sit amet consectetur,
                                                            adipisicing elit. Libero quibusdam nihil
                                                            dolorem. Molestias tempora consectetur error
                                                            exercitationem minus laboriosam? Itaque, fuga
                                                            repellat? Doloremque beatae obcaecati, unde
                                                            molestiae facilis corporis illum.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 pdng-20">
                                                <small>
                                                    <span class="fas fa-star spn-star-review"></span>
                                                    <span class="fas fa-star spn-star-review"></span>
                                                    <span class="fas fa-star spn-star-review"></span>
                                                    <span class="fas fa-star spn-star-review"></span>
                                                    <span class="fas fa-star spn-star-review"></span>
                                                </small>
                                                <p>Excellent</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container mt-4 shdw">
                                        <div class="row">
                                            <div class="col-lg-2 p-0 d-flex justify-content-center align-items-center"
                                                style="padding: 0">
                                                <div class="review-img-box">
                                                    <img src="{{ asset('public/images/user/user.png') }}" alt="" />
                                                </div>
                                            </div>
                                            <div class="col-lg-8 pdng-20">
                                                <div class="main-review">
                                                    <small style="color: #7cb342">HUNTER LAMOUREAUX</small>
                                                    <p style="font-weight: 600; color: #000">
                                                        it Was as great as expected. Amazing
                                                    </p>
                                                    <p style="font-weight: 400; color: #ccc">
                                                        June 27, 2023
                                                    </p>
                                                    <div class="review-box mt-2">
                                                        <p>
                                                            Lorem ipsum dolor sit amet consectetur,
                                                            adipisicing elit. Libero quibusdam nihil
                                                            dolorem. Molestias tempora consectetur error
                                                            exercitationem minus laboriosam? Itaque, fuga
                                                            repellat? Doloremque beatae obcaecati, unde
                                                            molestiae facilis corporis illum.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 pdng-20">
                                                <small>
                                                    <span class="fas fa-star spn-star-review"></span>
                                                    <span class="fas fa-star spn-star-review"></span>
                                                    <span class="fas fa-star spn-star-review"></span>
                                                    <span class="fas fa-star spn-star-review"></span>
                                                    <span class="fas fa-star spn-star-review"></span>
                                                </small>
                                                <p>Excellent</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container mt-4 shdw">
                                        <div class="row">
                                            <div class="col-lg-2 p-0 d-flex justify-content-center align-items-center"
                                                style="padding: 0">
                                                <div class="review-img-box">
                                                    <img src="{{ asset('public/images/user/user.png') }}" alt="" />
                                                </div>
                                            </div>
                                            <div class="col-lg-8 pdng-20">
                                                <div class="main-review">
                                                    <small style="color: #7cb342">HUNTER LAMOUREAUX</small>
                                                    <p style="font-weight: 600; color: #000">
                                                        it Was as great as expected. Amazing
                                                    </p>
                                                    <p style="font-weight: 400; color: #ccc">
                                                        June 27, 2023
                                                    </p>
                                                    <div class="review-box mt-2">
                                                        <p>
                                                            Lorem ipsum dolor sit amet consectetur,
                                                            adipisicing elit. Libero quibusdam nihil
                                                            dolorem. Molestias tempora consectetur error
                                                            exercitationem minus laboriosam? Itaque, fuga
                                                            repellat? Doloremque beatae obcaecati, unde
                                                            molestiae facilis corporis illum.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 pdng-20">
                                                <small>
                                                    <span class="fas fa-star spn-star-review"></span>
                                                    <span class="fas fa-star spn-star-review"></span>
                                                    <span class="fas fa-star spn-star-review"></span>
                                                    <span class="fas fa-star spn-star-review"></span>
                                                    <span class="fas fa-star spn-star-review"></span>
                                                </small>
                                                <p>Excellent</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center w-100 mt-5">
                                        <button class="review-btn" role="button">View All</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 " style="padding:0;">
                        <div class="container m-md-30" >
                            <div class="row">
                                <form action="{{ route('property.book.form') }}" method="POST"  id="booking-form">
                                    @csrf
                                    <div class="col" style="padding:0;">
                                        <div class="reserv-bx">
                                            <div class="reserv-bx-1">
                                                <input type="hidden" name="property_id" id="property-id-hidden" value="{{ $property->id }}">
                                                <input type="hidden" name="room_for_adults" id="room_for_adults" value="0">
                                                <input type="hidden" name="room_for_children" id="room_for_children" value="0">
                                                <p class="reserv-rate">INR <span style="font-size:20px !important; font-weight:600 !important; margin:0 !important; color:#222;" id="room_price_main">0  </span> ₹/<span>night</span></p>
                                            </div>
                                            <div class="reservation-box">
                                                <div class="reservation-check">
                                                    <div class="check-in-section w-100 d-flex justify-content-center align-items-center" style="border-right:1px solid #7cb342;">
                                                        <label for="check-in-date" style="margin:0;">
                                                            <span class="label-text chk-lbl " style="margin-left:7px;" >CHECK IN</span>
                                                            <span class="chevron-icon fas fa-chevron-down chk-lbl-icn" style="margin-left:30px;"></span>
                                                            <p class="input-container m-0">
                                                                <input type="date" class="form-control check-in" name="check_in_date" id="check-in-date" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}">
                                                            </p>
                                                        </label>
                                                    </div>
                                                    <div class="check-out-section w-100 d-flex justify-content-center align-items-center" >
                                                        <label for="check-out-date" style="margin:0;">
                                                            <span class="label-text chk-lbl ms-4" style="margin-left:7px;">CHECK OUT</span>
                                                            <span class="chevron-icon fas fa-chevron-down chk-lbl-icn" style="margin-left:24px;"></span>
                                                            <p class="input-container m-0">
                                                                <input type="date" class="form-control check-out" name="check_out_date" id="check-out-date" value="{{ date('Y-m-d', strtotime('+1 day')) }}" min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                                                            </p>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 p-0 room-selection-box  res-inp" style="padding:5px 3px !important;">
                                                    <label for="room-type" class="chk-lbl mt-2">Type of Rooms</label>
                                                    <select name="room_type" id="room-type">
                                                        <option value=""></option>
                                                        @foreach ($property->property_room_types as $room)
                                                            <option value="{{ $room->id }}" {{ $room->is_default == 1 ? 'selected' : '' }} data-price="{{ $room->price_per_night }}" data-adults="{{ $room->for_adults }}" data-child="{{ $room->for_childrens }}">
                                                                {{ $room->roomType->name }} (INR {{ $room->price_per_night }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 p-0 guests-info-box res-inp" style="padding:5px 3px !important;">
                                                    <label for="" class="chk-lbl">Total Adults</label>
                                                    <input type="text" class="form-control total-no-adults" name="total_no_adults" placeholder="Total Adults" value="1">

                                                </div>
                                                <div class="col-md-12 guests-info-box res-inp" style="padding:5px 3px !important;">
                                                    <label for="" class="chk-lbl">Total Childrens(less than 1 years)</label>
                                                    <input type="text" class="form-control total-no-children" name="total_no_children" placeholder="Total Child(less than 1 years)" value="0">
                                                </div>
                                                </div>
                                            </div>
                                            <div class="tax res-inp">
                                                <p>Total Nights <span class="" id="total-nights">1</span></p>
                                                <p>Total Rooms  <span class="" id="total-rooms">0</span> </p>
                                                <p>Room Amount <span class="total_amount">0</span></p>
                                                <p>Activity Amount <span class="activity_amount">0</span></p>
                                                <p>Facility Amount <span class="facility_amount">0</span></p>
                                                <p>Total Amount <span class="final_amount">0</span></p>
                                                <!--<input type="text" name="total_rooms" id="total-rooms" class="w-25" readonly>-->
                                            </div>

                                            <div id="inputBoxDetails">
                                                <input type="hidden" name="totalNights" value="0">
                                                <input type="hidden" name="totalRooms" value="0">
                                                <input type="hidden" name="roomAmount" value="0">
                                                <input type="hidden" name="activityAmount" value="0">
                                                <input type="hidden" name="facilityAmount" value="0">
                                                <input type="hidden" name="finalAmount" value="0">
                                                <input type="hidden" name="activityId[]" value="">
                                                <input type="hidden" name="facilityId[]" value="">
                                            </div>
                                            <div class="w-100 mt-4 d-flex flex-column justify-content-center align-items-center">
                                                @if(Auth::check())
                                                    <button type="submit" class="reserv-btn">Book Now</button>
                                                @else
                                                    <button type="button" class="reserv-btn" id="reserv-btn-login">Book Now</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="col-12 mt-3" style="padding:0;">
                                    <div class="reserv-bx px-3">
                                        <h4 class="text-center" style="color:#7cb342; font-weight:600;">Attractions Near to Us</h4>
                                        <div class="w-100">
                                            <table class="table lc-near-table">
                                                @foreach ($property->farm_locations_nearby as $location)
                                                <tr>
                                                    <th>{{ $location->location_title ?? ''}}</th>
                                                    <td>{{ $location->distance.' KM' ?? '' }}</td>
                                                </tr>
                                                @endforeach
                                            </table>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 " style="padding:0;">
                                    <video width="320" height="240" autoplay loop muted
                                        style="border-radius: 10px; overflow: hidden;">
                                        <source style="border-radius: 20px;" src="{{ asset('public/images/video/video.mp4') }}"
                                            type="video/mp4">
                                    </video>
                                </div>
                                <div class="col-12" style="padding:0;">
                                    <div class="reserv-bx" >
                                        <h3>Related</h3>
                                        <div class="related-bx mt-4">
                                            <div class="relate-img-bx">
                                                <img src="{{ asset('public/images/farmhouse/fh-img-3.webp') }}" alt="">
                                            </div>
                                            <div class="main-details-2 mt-3">
                                                <h3 style="font-size: 20px;">Room in Badowala, India</h3>
                                                <p style="margin: 0; font-size: 11px;">1 Double Bed Private Attached
                                                    Bathroom</p>
                                                <p style="margin: 0; font-size: 11px; margin-top: 5px;">
                                                    <span class="fas fa-star "></span> No Reviews Yet
                                                </p>
                                            </div>
                                        </div>
                                        <div class="related-bx mt-4">
                                            <div class="relate-img-bx">
                                                <img src="{{ asset('public/images/farmhouse/fh-img-4') }}" alt="">
                                            </div>
                                            <div class="main-details-2 mt-3">
                                                <h3 style="font-size: 20px;">Room in Badowala, India</h3>
                                                <p style="margin: 0; font-size: 11px;">1 Double Bed Private Attached
                                                    Bathroom</p>
                                                <p style="margin: 0; font-size: 11px; margin-top: 5px;">
                                                    <span class="fas fa-star "></span> No Reviews Yet
                                                </p>
                                            </div>
                                        </div>
                                        <div class="related-bx mt-4">
                                            <div class="relate-img-bx">
                                                <img src="{{ asset('public/images/farmhouse/fh-img-5') }}" alt="">
                                            </div>
                                            <div class="main-details-2 mt-3">
                                                <h3 style="font-size: 20px;">Room in Badowala, India</h3>
                                                <p style="margin: 0; font-size: 11px;">1 Double Bed Private Attached
                                                    Bathroom</p>
                                                <p style="margin: 0; font-size: 11px; margin-top: 5px;">
                                                    <span class="fas fa-star "></span> No Reviews Yet
                                                </p>
                                            </div>
                                        </div>
                                        <div class="related-bx mt-4">
                                            <div class="relate-img-bx">
                                                <img src="{{ asset('public/images/farmhouse/fh-img-6') }}" alt="">
                                            </div>
                                            <div class="main-details-2 mt-3">
                                                <h3 style="font-size: 20px;">Room in Badowala, India</h3>
                                                <p style="margin: 0; font-size: 11px;">1 Double Bed Private Attached
                                                    Bathroom</p>
                                                <p style="margin: 0; font-size: 11px; margin-top: 5px;">
                                                    <span class="fas fa-star "></span> No Reviews Yet
                                                </p>
                                            </div>
                                        </div>
                                        <div class="related-bx mt-4">
                                            <div class="relate-img-bx">
                                                <img src="{{ asset('public/images/farmhouse/fh-img-7') }}" alt="">
                                            </div>
                                            <div class="main-details-2 mt-3">
                                                <h3 style="font-size: 20px;">Room in Badowala, India</h3>
                                                <p style="margin: 0; font-size: 11px;">1 Double Bed Private Attached
                                                    Bathroom</p>
                                                <p style="margin: 0; font-size: 11px; margin-top: 5px;">
                                                    <span class="fas fa-star "></span> No Reviews Yet
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <script>

        $('#reserv-btn-login').click(function(){
            Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please login to book!',
                });
        });
        $(document).ready(function() {
            calculateTotal();
            // Function to handle room type selection and calculate the number of rooms needed
            $('#room-type').change(function() {
                var roomId = $(this).val(); // Get the selected room type ID
                var checkInDate = $('#check-in-date').val();
                var checkOutDate = $('#check-out-date').val();
                var propertyId = $('#property-id-hidden').val();
                var totalAdults = parseInt($('.total-no-adults').val());
                var totalChildren = parseInt($('.total-no-children').val());

                // Make an AJAX request to get room availability details
                $.ajax({
                    url: '{{ route("ajax.fetch.booking.details") }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        room_id: roomId,
                        check_in_date: checkInDate,
                        check_out_date: checkOutDate,
                        propertyId: propertyId
                    },
                    success: function(response) {
                        console.log(response);

                        // Check if response.data is not null or undefined
                        if (response.data !== null && response.data !== undefined) {
                            // Calculate the total number of guests
                            var totalAdults = parseInt($('#total-adults').val()) || 0; // Assuming you get the total adults from an input field
                            var totalChildren = parseInt($('#total-children').val()) || 0; // Assuming you get the total children from an input field
                            var totalGuests = totalAdults + totalChildren;

                            // Calculate the number of rooms needed based on available capacity
                            var availableForAdults = response.data.for_adults || 0;
                            var availableForChildren = response.data.for_childrens || 0;

                            // Update the room details
                            var price = response.price || 0;
                            $('#room-price').text(price);
                            $('#room-id').text(response.id);
                            $('#room-name').text(response.name);

                            // Check if price_per_night is a valid number before updating the total amount
                            var pricePerNight = response.data.price_per_night;
                            var totalPrice = isNaN(pricePerNight) ? 0 : pricePerNight * totalGuests;
                            $('.total_amount').text(totalPrice);
                        } else {
                            // Handle the case when response.data is null or undefined
                            console.log("Response data is null or undefined");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }).change();

            // Function to calculate total amount and update UI
            function calculateTotal() {
            var checkInDate = $('#check-in-date').val();
            var checkOutDate = $('#check-out-date').val();
            var roomPrice = parseFloat($('#room-type option:selected').data('price'));
            var totalAdults = parseInt($('.total-no-adults').val());
            var totalChildren = parseInt($('.total-no-children').val());

            var totalNights = Math.ceil((new Date(checkOutDate) - new Date(checkInDate)) / (1000 * 60 * 60 * 24));

            // Initialize total activity price
            var totalActivityPrice = 0;
            var totalFacilityPrice = 0;
            var selectedActivityIds = [];
            var selectedFacilityIds = [];

            // Loop through all checked activity checkboxes
            $('.activity-checkbox:checked').each(function() {
                var activityPrice = parseFloat($(this).data('price'));
                totalActivityPrice += activityPrice;
                selectedActivityIds.push($(this).attr('id').split('-')[1]);
            });

            $('.facility-checkbox:checked').each(function() {
                var facilityPrice = parseFloat($(this).data('price'));
                totalFacilityPrice += facilityPrice;
                selectedFacilityIds.push($(this).attr('id').split('-')[1]); // Push the facility ID to the array
            });

            updateTotalRoom(roomPrice, totalAdults, totalChildren, totalNights, totalActivityPrice, totalFacilityPrice);
            $('#total-nights').text(totalNights);
            $('input[name="totalNights"]').val(totalNights);
            $('input[name="activityId[]"]').val(selectedActivityIds.join(',')); // Set the value of activity IDs
            $('input[name="facilityId[]"]').val(selectedFacilityIds.join(','));

        }

        // Event listeners for triggering calculation on change
        $('#check-in-date, #check-out-date, #room-type, .total-no-adults, .total-no-children, .activity-checkbox, .facility-checkbox').change(calculateTotal);

       // Function to update total rooms and total amount
            function updateTotalRoom(roomPrice, totalAdults, totalChildren, totalNights, totalActivityPrice, totalFacilityPrice) {
                var roomId = $('#room-type').val();
                var roomName = $('#room-type option:selected').text().split('(')[0].trim();
                var roomAdults = parseInt($('#room-type option:selected').data('adults'));
                var roomChildren = parseInt($('#room-type option:selected').data('child'));

                var totalRooms = 0;
                var finalAmount = 0;
                var activityAmountAdd = 0;
                var facilityAmountAdd = 0;

                while (totalAdults >= roomAdults || totalChildren >= roomChildren) {
                    // Check if there are enough adults and children for one room
                    if (totalAdults >= roomAdults && totalChildren >= roomChildren) {
                        totalRooms++;
                        totalAdults -= roomAdults;
                        totalChildren -= roomChildren;
                    } else if (totalAdults >= roomAdults) { // Check if there are enough adults for one room
                        totalRooms++;
                        totalAdults -= roomAdults;
                    } else if (totalChildren >= roomChildren) { // Check if there are enough children for one room
                        totalRooms++;
                        totalChildren -= roomChildren;
                    } else {
                        break; // No more guests to accommodate
                    }
                }

                $('#total-rooms').text(totalRooms);
                var roomAmount = isFinite(totalRooms) && !isNaN(roomPrice) ? totalRooms * roomPrice : 0;
                activityAmountAdd += isNaN(totalActivityPrice) ? 0 : totalActivityPrice; // Check and replace NaN with 0
                facilityAmountAdd += isNaN(totalFacilityPrice) ? 0 : totalFacilityPrice; // Check and replace NaN with 0

                finalAmount = activityAmountAdd + facilityAmountAdd || 0;
                var mainRoomPrice = roomPrice || 0;

                // Check if final amount is zero or not defined
                var displayAmount = finalAmount + roomAmount;

                $('.total_amount').text(roomAmount);
                $('#selected-room-id').text(roomId);
                $('#selected-room-name').text(roomName);
                $('.activity_amount').text(isNaN(totalActivityPrice) ? 0 : totalActivityPrice); // Check and replace NaN with 0
                $('.facility_amount').text(isNaN(totalFacilityPrice) ? 0 : totalFacilityPrice); // Check and replace NaN with 0
                $('.final_amount').text(displayAmount);
                $('#room_price_main').text(mainRoomPrice);

                $('input[name="totalRooms"]').val(totalRooms);
                $('input[name="roomAmount"]').val(roomAmount);
                $('input[name="activityAmount"]').val(activityAmountAdd);
                $('input[name="facilityAmount"]').val(facilityAmountAdd);
                $('input[name="finalAmount"]').val(displayAmount);
            }

        });


        function validateBooking() {
            // Get the total amount
            var totalAmount = parseFloat(document.querySelector('.final_amount').innerText);

            // Check if total amount is greater than 0
            if (totalAmount > 0) {
                // If valid, submit the form
                document.getElementById('booking-form').submit();
            } else {
                // If not valid, show SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select a room type!',
                });
            }
        }

     // Attach the function to the form submission event
     document.getElementById('booking-form').addEventListener('submit', function (event) {
        // Prevent the default form submission
        event.preventDefault();
        // Validate the booking
        validateBooking();
    });

</script>
@endsection
