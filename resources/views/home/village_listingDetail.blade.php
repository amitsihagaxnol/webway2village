@extends('template')
@section('main')
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
                    <div class="col-lg-3">
                        <div class="share-icnz">
                            <a href="#" class="text-muted"><span><i class="fa-solid fa-share-from-square"></i></span>
                                Share</a>
                            <a href="#" class="text-muted"><span><i class="fa-regular fa-heart"></i></span> Saved</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-3 pdng">
                <div class="row">
                    <div class="col-lg-8 pdng">
                        <div class="container ">
                            <div class="row">
                                <div class="col-12 pdng" >
                                    <div>
                                        <section class="gallery">
                                            @if(!empty($property->property_photos))
                                                @foreach ($property->property_photos as $key => $photo)
                                                @if ($photo->cover_photo)
                                                    <div class="gallery__item">
                                                        <input type="radio" id="cover-img" checked name="gallery" class="gallery__selector" />
                                                        <img class="gallery__img" src="{{ asset('public/images/village_property/'.$photo->property_id.'/'.$photo->photo ) }}" alt="" />
                                                        <label for="cover-img" class="gallery__thumb"><img src="{{ asset('public/images/village_property/'.$photo->property_id.'/'.$photo->photo)}}" alt="" class="botom-img" /></label>
                                                    </div>
                                                    @break
                                                @endif
                                                @endforeach
                                                @foreach ($property->property_photos as $photo)
                                                    @if (!$photo->cover_photo)
                                                        <div class="gallery__item">
                                                            <input type="radio" id="img-{{ $photo->serial }}" name="gallery" class="gallery__selector" />
                                                            <img class="gallery__img" src="{{ asset('public/images/village_property/'.$photo->photo ) }}" alt="" />
                                                            <label for="img-{{ $photo->serial }}" class="gallery__thumb"><img src="{{ asset('public/images/village_property/'.$photo->property_id.'/'.$photo->photo)}}" alt="" class="botom-img" /></label>
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
                                            <li class="m-md-30"><a  href="#about">Basic Details</a></li>
                                            <li class="m-md-30"><a  href="#general">General Information</a></li>
                                            <li class="m-md-30"><a  href="#facilities">Facilities</a></li>
                                            <li class="m-md-30"><a  href="#Activities">Activities</a></li>
                                            <li class="m-md-30"><a  href="#terms">Terms & Conditions</a></li>
                                            <li class="m-md-30"><a  href="#reviews">Reviews</a></li>
                                            <!--<li><a class="" href="#nearlocation">Near by Location</a></li>-->
                                        </ul>
                                    </div>
                                    <div class="sumry-bx">
                                        <h3 class="d-tle">Summary</h3>
                                        <p>{{ $property['property_description']->summary ?? ''  }}</p>
                                    </div>
                                </div>

                                <div class="col-12 mt-3"  id="about">
                                    <h3 class="d-tle">Basic Details</h3>
                                    <table class="table details-table " style="border-color:#7cb342 !important;">
                                        <thead>
                                            <tr>
                                                <th>Accommodation</th>
                                                <td>{{ $property->farm_house->accomodation_type ?? '' }}</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Stay Availability</th>
                                                <td>{{ $property->stay_available == '1' ? 'Yes' : 'No' }}</td>
                                            </tr>
                                            <tr>
                                                <th >Types of room we have</th>
                                                 <td></td>
                                            </tr>
                                            @foreach ($property->property_room_types as $item)
                                                <tr>
                                                    <th colspan="2">
                                                        {{ $item->roomType->name }}
                                                        ({{ $item->price_per_night . ' INR /Per Night' }})
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
                                                <th>Property Type</th>
                                                <td>{{ $property['farm_house']['property_type']->name ?? '' }}</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Farm Type </th>
                                                <td>{{ $property['farm_house']['farm_type']->name ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Location</th>
                                                <td>{{ $property->farm_house->location ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Full Address</th>
                                                <td>{{ $property->farm_house->full_address ?? '' }} </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 mt-3"  id="facilities">
                                    <h3 class="d-tle">Facilities</h3>
                                    <table class="table details-table-2 mt-3" style="border: none">
                                        <thead>
                                            @if (isset($property['farm_facility']))
                                                @php $count = 0; @endphp <!-- Initialize a counter -->
                                                @foreach ($property['farm_facility'] as $facility)
                                                    @if ($count % 4 == 0)
                                                        <tr>
                                                    @endif
                                                    <td>
                                                        <i class="fa-regular fa-hand"></i> {{ $facility->name }}
                                                    </td>
                                                    @php $count++; @endphp <!-- Increment the counter -->
                                                    @if ($count % 4 == 0 || $loop->last)
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </thead>
                                    </table>
                                </div>

                                <div class="col-12 mt-3" " id="Activities">
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
                                                                <h6 class="mb-0 dt-act-tle">{{ $Factivity->name ?? '' }}</h6>
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
                                                <div class="accordion-body" style="overflow-x:scroll;">
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
                                                    Sustainble Practices
                                                </button>
                                            </h2>
                                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body" style="overflow-x:scroll;">
                                                    <table class="table acd-table">
                                                        <tr>
                                                            <th><div class="tble-wd-2">Sustainable Farming Practice</div></th>
                                                            <th><div class="tble-wd-2">Sustainable Details</div></th>

                                                        </tr>
                                                        @foreach ($property->farm_sustainable_practices as $practice)
                                                        <tr>
                                                            <td>
                                                                <div class="dt-s-bx">
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
                                                <div class="accordion-body" style="overflow-x:scroll;">
                                                    <table class="table acd-table">
                                                        <tr>
                                                            <th><div class="tble-wd">Irrigation Method</div> </th>
                                                            <th><div class="tble-wd">Irrigation Details</div></th>

                                                        </tr>
                                                        @foreach ($property->farm_house_irrigation_practice as $irrigation)
                                                        <tr>

                                                            <td>
                                                                <div class="dt-s-bx">
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
                                                <div class="accordion-body" style="overflow-x:scroll;">
                                                    <table class="table acd-table">
                                                        <tr>
                                                            <th><div class="tble-wd-2">Soil Health and Fertility Practices</div></th>
                                                            <th><div class="tble-wd-2">Soil Health and Fertility Details</div></th>
                                                        </tr>
                                                        @foreach ($property->farm_house_soil_health_practice as $health)
                                                            <tr>
                                                                <td>
                                                                    <div class="dt-s-bx">
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
                                                <div class="accordion-body" style="overflow-x:scroll;">
                                                    <table class="table acd-table">
                                                        <tr>
                                                            <th><div class="tble-wd-2">Pest and Disease Management</div></th>
                                                            <th><div class="tble-wd-2">Pest and Disease Details</div></th>

                                                        </tr>
                                                        @foreach ($property->farm_house_pest_disease_practice as $pest)
                                                        <tr>
                                                            <td>
                                                                <div>
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
                                            <div class="col-lg-8 pdng-20" >
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
                                            <div class="col-lg-8 pdng-20" >
                                                <div class="main-review">
                                                    <small style="color: #7cb342">HUNTER LAMOUREAUX</small>
                                                    <p style="font-weight: 600; color: #000">
                                                        it Was as great as expected. Amazing
                                                    </p>
                                                    <p style="font-weight: 400; color: #ccc">
                                                        June 27, 2023
                                                    </p>
                                                    <div class="review-box mt-2 ">
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
                                            <div class="col-lg-2 pdng-20" >
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
                    <div class="col-lg-4">
                        <div class="container  m-md-30">
                            <div class="row">
                                <div class="col" style="padding:0;">
                                    <div class="reserv-bx">
                                        <div class="reserv-bx-1">
                                            <strike>₹14,406</strike>
                                            <p>₹11,899 <span>night</span></p>
                                        </div>
                                        <div class="reserv-bx-2">
                                            <div class="reserv-check">
                                                <div class="d-flex justify-content-center align-items-center"
                                                    style="
                          height: 100%;
                          width: 50%;
                          border-right: 1px solid #aeaeae8b;
                        ">
                                                    <label id="CheckIn">
                                                        <span style="font-size: 12px">CHECK IN</span>
                                                        <span class="fas fa-chevron-down" style="font-size: 12px"></span>
                                                        <p style="margin: 0; font-size: 10px">1/2/2024</p>
                                                    </label>
                                                </div>
                                                <div class="d-flex justify-content-center align-items-center"
                                                    style="height: 100%; width: 50%">
                                                    <label id="CheckIn">
                                                        <span style="font-size: 12px">CHECK OUT</span>
                                                        <span class="fas fa-chevron-down" style="font-size: 12px"></span>
                                                        <p style="margin: 0; font-size: 10px">1/2/2024</p>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="value_box-2">
                                                <select class="form-select form-select-lg w-100" style="border: 0">
                                                    <option selected>Guests</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div
                                            class="w-100 mt-4 d-flex flex-column justify-content-center align-items-center">
                                            <button type="button" class="reserv-btn"> Book Now</button>
                                            <!--<span class="mt-4" style="color: #b2b1b1;">You won't be charged yet</span>-->
                                        </div>
                                        <!--<div class="rupees">-->
                                        <!--    <p>₹14,406 x 5 Nights <span style="text-decoration: none;">₹72,030</span></p>-->
                                        <!--    <p>₹14,406 x 5 Nights <span style="text-decoration: none; color: #7cb342;">-₹14,406</span></p>-->
                                        <!--</div>-->
                                        <div class="tax">
                                            <p>Total Amount <span style="text-decoration: none;">₹57,624</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3" style="padding:0;">
                                    <div class="reserv-bx px-3">
                                        <h4 class="text-center" style="color:#7cb342; font-weight:600;">Attractions Near to Us</h4>
                                        <div class="w-100">
                                            <table class="table lc-near-table">
                                                {{-- @dd($property); --}}
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
@endsection
