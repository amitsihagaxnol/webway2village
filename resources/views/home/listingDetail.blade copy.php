@extends('template')
@section('main')
<br>
<br>
<br>


      <section class="details-section py-5 h-100">
        <div class="container text-left">
          <div class="row">
            <div class="col-lg-9">
              <div class="main-name">
                <h2> @if(isset($property)){{$property->name}} @endif</h2>
                <span><i class="fa-solid fa-crown"></i>Premium</span>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="share-icnz">
                <a href="#" class="text-muted"
                  ><span><i class="fa-solid fa-share-from-square"></i></span>
                  Share</a
                >
                <a href="#" class="text-muted"
                  ><span><i class="fa-regular fa-heart"></i></span> Saved</a
                >
              </div>
            </div>
          </div>
        </div>
        <div class="container mt-3">
          <div class="row">
            <div class="col-lg-8">
              <div class="container">
                <div class="row">
                  <div class="col-12" style="padding: 0">
                    <div>
                      <section class="gallery">
                        <div class="gallery__item">
                          <input
                            type="radio"
                            id="img-1"
                            checked
                            name="gallery"
                            class="gallery__selector"
                          />
                          <img
                            class="gallery__img"
                            src="./images/farmhouse/fh-img-1.webp"
                            alt=""
                          />
                          <label for="img-1" class="gallery__thumb"
                            ><img
                              src="./images/farmhouse/fh-img-1.webp"
                              alt=""
                              class="botom-img"
                          /></label>
                        </div>
                        <div class="gallery__item">
                          <input
                            type="radio"
                            id="img-2"
                            name="gallery"
                            class="gallery__selector"
                          />
                          <img
                            class="gallery__img"
                            src="./images/farmhouse/fh-img-2.webp"
                            alt=""
                          />
                          <label for="img-2" class="gallery__thumb"
                            ><img
                              src="./images/farmhouse/fh-img-2.webp"
                              alt=""
                              class="botom-img"
                          /></label>
                        </div>
                        <div class="gallery__item">
                          <input
                            type="radio"
                            id="img-3"
                            name="gallery"
                            class="gallery__selector"
                          />
                          <img
                            class="gallery__img"
                            src="./images/farmhouse/fh-img-3.webp"
                            alt=""
                          />
                          <label for="img-3" class="gallery__thumb"
                            ><img
                              src="./images/farmhouse/fh-img-3.webp"
                              alt=""
                              class="botom-img"
                          /></label>
                        </div>
                        <div class="gallery__item">
                          <input
                            type="radio"
                            id="img-4"
                            name="gallery"
                            class="gallery__selector"
                          />
                          <img
                            class="gallery__img"
                            src="./images/farmhouse/fh-img-8.webp"
                            alt=""
                          />
                          <label for="img-4" class="gallery__thumb"
                            ><img
                              src="./images/farmhouse/fh-img-8.webp"
                              alt=""
                              class="botom-img"
                          /></label>
                        </div>
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
                  <div class="col-12 " style="padding: 0">


                    <div class="w-100 my-5 details-scroll">
                        <ul class="w-100 d-flex justify-content-between align-items-center">
                            <li><a class="" href="#about">Summary</a></li>
                            <li><a class="" href="#general">General Information</a></li>
                            <li><a class="" href="#facilities">Facilities</a></li>
                            <li><a class="" href="#Activities">Activities</a></li>
                            <li><a class="" href="#terms">Terms & Conditions</a></li>
                            <li><a class="" href="#reviews">Reviews</a></li>
                            <!--<li><a class="" href="#nearlocation">Near by Location</a></li>-->
                        </ul>
                    </div>
                    <div>
                          <h3>Summary</h3>
                          <p>{{$property['property_description']->summary}}</p>

                    </div>
                  </div>

                  <div class="col-12 mt-3" style="padding: 0" id="about">
                    <h3>Basic Details</h3>
                    <table class="table details-table">
                      <thead>
                        <tr>
                          <th>Accomodation</th>
                          <td> {{$property->accommodates}} Guests</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th>Bedroom</th>
                          <td></td>
                        </tr>
                        <tr>
                          <th>Bathroom</th>
                          <td>{{$property->bedrooms}}</td>
                        </tr>
                        <tr>
                          <th>Dimension</th>
                          <td>1200 Sq Ft</td>
                        </tr>
                        <tr>
                          <th>Type</th>
                          <td>Sperate Room</td>
                        </tr>
                        <tr>
                          <th>Popular Nearby</th>
                          <td>Yes</td>
                        </tr>
                        <tr>
                          <th>Check in start @</th>
                          <td>09:00 am</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                    <div class="col-12 mt-3" style="padding: 0" id="general">
                    <h3>General Information</h3>
                    <table class="table details-table">
                      <thead>
                        <tr>
                          <th>Property Type</th>
                          <td>{{$property['farm_house']['property_type']->name}}</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th>Farm Type </th>
                          <td>{{$property['farm_house']['farm_type']->name}}</td>
                        </tr>
                        <tr>
                          <th>Location</th>
                          <td>Kodaikanal, Tamil Nadu, India</td>
                        </tr>
                        <tr>
                          <th>Full Address</th>
                          <td>  Kodaikanal, Tamil Nadu, India  </td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                  <div class="col-12 mt-3" style="padding: 0" id="facilities">
                    <h3>Facilities</h3>
                    <table
                      class="table details-table-2 mt-3"
                      style="border: none"
                    >
                      <thead>

                      <tbody>

                        @if(isset($property['farm_facility']))
                        @foreach($property['farm_facility'] as $facility)
                        <tr>
                          <td>
                            <i class="fa-regular fa-hand"></i> {{$facility->name}}
                          </td>

                        </tr>
                        @endforeach
                        @endif

                      </tbody>
                    </table>
                  </div>

                  <div class="col-12 mt-3" style="padding: 0" id="Activities">
                    <h3>Activities</h3>
                     @if(isset($property['farm_activity']))
                        @foreach($property['farm_activity'] as $Factivity)
                           <div class="details-activities">
                      <ul class="list-unstyled">
                        <li>
                          <div
                            class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                            href="#"
                          >
                            <div class="col-lg-5 details-activities-img-bx">
                              <img src="{{ asset('public/images/activity/images/' . $Factivity->image) }}" alt="" />
                            </div>
                            <div class="col-lg-7">
                              <h6 class="mb-0">{{$Factivity->name}}</h6>
                              <small
                                class="text-body-secondary mt-2"
                                style="line-height: 0px"
                                >{{$Factivity->description}}
                              </small>
                              <p><span>INR</span>{{$Factivity->price}} </p>
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
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Organic Products
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
          <table class="table acd-table">
              <tr>
                  <th>Product Title</th>
                  <th>Product Unit Price</th>
                  <th>Seasonal Availability </th>
                  <th>Product Description</th>
                  <th>Product Availability </th>
              </tr>

            @if(isset($property['organic_product']))
             @foreach($property['organic_product'] as $organicProduct)
              <tr>
                  <td>{{$organicProduct['product_title']}}</td>
                  <td>{{$organicProduct['price']}}</td>
                  <td>{{$organicProduct['seasonal_availability']}}</td>
                  <td>{{$organicProduct['description']}}</td>
                  <td>{{$organicProduct['product_availability']}}</td>
              </tr>
             @endforeach
            @endif

          </table>

      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
       Sustainble Practices
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
          <table class="table acd-table">
              <tr>
                  <th>Sustainable Farming Practice</th>
                  <th>Sustainable Details</th>

              </tr>
              <tr>
                  <td>
                      <div class="dt-s-bx">
                        Select Sustainble Farming
                     </div>
                  </td>
                  <td>

                      <div>
                        <p class="m-0 font-size:13px; line-height:25px;">
                         Plant cover crops to prevent soil erosion, suppress weeds, and improve soil health.
                         </p>
                     </div>
                  </td>

              </tr>
              <tr>
                  <td>
                      <div class="dt-s-bx">
                        Select Sustainble Farming
                     </div>
                  </td>
                  <td>

                      <div>
                        <p class="m-0 font-size:13px; line-height:25px;">
                         Plant a diverse range of crops to enhance resilience to climate change and support ecosystem health.
                         </p>
                     </div>
                  </td>

              </tr>


          </table>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
       Irrigation Method Farm Practices
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
          <table class="table acd-table">
              <tr>
                  <th>Irrigation Method </th>
                  <th>Irrigation Details</th>

              </tr>
              <tr>
                  <td>
                      <div class="dt-s-bx">
                       Surface Irrigation
                     </div>
                  </td>
                  <td>

                      <div>
                        <p class="m-0 font-size:13px; line-height:25px;">
                         Furrow Irrigation: Water is directed along furrows, or channels, between crop rows.
                         </p>
                     </div>
                  </td>

              </tr>

              <tr>
                  <td>
                      <div class="dt-s-bx">
                        Sprinkler Irrigation
                     </div>
                  </td>
                  <td>

                      <div>
                        <p class="m-0 font-size:13px ; line-height:25px;">
                         Water is sprayed over the crops like natural rainfall, using pipes and pump systems.
                         </p>
                     </div>
                  </td>

              </tr>


          </table>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefour" aria-expanded="false" aria-controls="flush-collapsefour">
     Soil Health and Fertility Practices
      </button>
    </h2>
    <div id="flush-collapsefour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
          <table class="table acd-table">
              <tr>
                  <th>Soil Health and Fertility Practices</th>
                  <th>Soil Health and Fertility Details</th>

              </tr>
              <tr>
                  <td>
                      <div class="dt-s-bx">
                       Crop Rotation
                     </div>
                  </td>
                  <td>

                      <div>
                        <p class="m-0 font-size:13px; line-height:25px;">
                        Rotate crops to break pest and disease cycles and balance nutrient demands, promoting overall soil health.
                         </p>
                     </div>
                  </td>

              </tr>
              <tr>
                  <td>
                      <div class="dt-s-bx">
                      Agroforestry
                     </div>
                  </td>
                  <td>

                      <div>
                        <p class="m-0 font-size:13px; line-height:25px;">
                        Integrate trees and shrubs to improve soil structure, provide organic matter, and enhance nutrient cycling.
                         </p>
                     </div>
                  </td>

              </tr>


          </table>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefive" aria-expanded="false" aria-controls="flush-collapsefive">
     Pest Disease Farm Practices
      </button>
    </h2>
    <div id="flush-collapsefive" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
          <table class="table acd-table">
              <tr>
                  <th>Pest and Disease Management</th>
                  <th>Pest and Disease Details</th>

              </tr>
              <tr>
                  <td>
                      <div class="dt-s-bx">
                       Companion Planting
                     </div>
                  </td>
                  <td>

                      <div>
                        <p class="m-0 font-size:13px; line-height:25px;">
                       Utilize companion planting to deter pests or attract beneficial insects that act as natural predators.
                         </p>
                     </div>
                  </td>

              </tr>



          </table>
      </div>
    </div>
  </div>
</div>
                  </div>
                  <div class="details-terms-condition mt-4" id="terms">
                    <ul class="list-unstyled">
                      <li>
                        <div
                          class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none"
                          href="#"
                        >
                          <div class="col-lg-5 details-terms-img-bx">
                            <img src="./images/terms.png" alt="" />
                          </div>
                          <div class="col-lg-7">
                            <h6 class="mb-0" style="font-size: 25px">
                              Terms & Conditions
                            </h6>
                            <small
                              class="text-body-secondary mt-2"
                              style="line-height: 0px"
                              >Lorem ipsum dolor sit amet consectetur
                              adipisicing elit. Dolore quasi eum nostrum fugiat,
                              ipsum aut, quibusdam maiores, commodi temporibus
                              explicabo rerum corrupti magnam adipisci
                            </small>
                            <div
                              class="d-flex justify-content-start align-items-center w-100 mt-3"
                            >
                              <button class="terms-btn" role="button">
                                Read All
                              </button>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="col-12 mt-5" style="padding: 0" id="reviews">
                    <h3>256 Reviews</h3>
                    <div class="container mt-4">
                      <div class="row">
                        <div
                          class="col-lg-2 p-0 d-flex justify-content-center align-items-center"
                          style="padding: 0"
                        >
                          <div class="review-img-box">
                            <img src="./images/user/user.png" alt="" />
                          </div>
                        </div>
                        <div class="col-lg-8 p-0" style="padding: 0">
                          <div class="main-review">
                            <small style="color: #7cb342"
                              >HUNTER LAMOUREAUX</small
                            >
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
                        <div class="col-lg-2">
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
                    <div class="container mt-4">
                      <div class="row">
                        <div
                          class="col-lg-2 p-0 d-flex justify-content-center align-items-center"
                          style="padding: 0"
                        >
                          <div class="review-img-box">
                            <img src="./images/user/user.png" alt="" />
                          </div>
                        </div>
                        <div class="col-lg-8 p-0" style="padding: 0">
                          <div class="main-review">
                            <small style="color: #7cb342"
                              >HUNTER LAMOUREAUX</small
                            >
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
                        <div class="col-lg-2">
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
                    <div class="container mt-4">
                      <div class="row">
                        <div
                          class="col-lg-2 p-0 d-flex justify-content-center align-items-center"
                          style="padding: 0"
                        >
                          <div class="review-img-box">
                            <img src="./images/user/user.png" alt="" />
                          </div>
                        </div>
                        <div class="col-lg-8 p-0" style="padding: 0">
                          <div class="main-review">
                            <small style="color: #7cb342"
                              >HUNTER LAMOUREAUX</small
                            >
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
                        <div class="col-lg-2">
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
                    <div class="container mt-4">
                      <div class="row">
                        <div
                          class="col-lg-2 p-0 d-flex justify-content-center align-items-center"
                          style="padding: 0"
                        >
                          <div class="review-img-box">
                            <img src="./images/user/user.png" alt="" />
                          </div>
                        </div>
                        <div class="col-lg-8 p-0" style="padding: 0">
                          <div class="main-review">
                            <small style="color: #7cb342"
                              >HUNTER LAMOUREAUX</small
                            >
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
                        <div class="col-lg-2">
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
                    <div
                      class="d-flex justify-content-center align-items-center w-100 mt-5"
                    >
                      <button class="review-btn" role="button">View All</button>
                    </div>
                  </div>


                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="container">
                <div class="row">
                  <div class="col">
                    <div class="reserv-bx">
                      <div class="reserv-bx-1">
                        <strike>₹{{$property['property_price']->price}}</strike>
                        <p>₹{{$property['property_price']->price}}<span>night</span></p>
                      </div>
                      <div class="reserv-bx-2">
                        <div class="reserv-check">
                          <div
                            class="d-flex justify-content-center align-items-center"
                            style="
                              height: 100%;
                              width: 50%;
                              border-right: 1px solid #aeaeae8b;
                            "
                          >
                            <label id="CheckIn">
                              <span style="font-size: 12px">CHECK IN</span>
                              <span
                                class="fas fa-chevron-down"
                                style="font-size: 12px"
                              ></span>
                              <p style="margin: 0; font-size: 10px">1/2/2024</p>
                            </label>
                          </div>
                          <div
                            class="d-flex justify-content-center align-items-center"
                            style="height: 100%; width: 50%"
                          >
                            <label id="CheckIn">
                              <span style="font-size: 12px">CHECK OUT</span>
                              <span
                                class="fas fa-chevron-down"
                                style="font-size: 12px"
                              ></span>
                              <p style="margin: 0; font-size: 10px">1/2/2024</p>
                            </label>
                          </div>
                        </div>
                        <div class="value_box-2">
                          <select
                            class="form-select form-select-lg w-100"
                            style="border: 0"
                          >
                            <option selected>Guests</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                        </div>

                      </div>
                      <div class="w-100 mt-4 d-flex flex-column justify-content-center align-items-center">
                        <button type="button" class="reserv-btn"> Book Now</button>
                        <!--<span class="mt-4" style="color: #b2b1b1;">You won't be charged yet</span>-->
                    </div>

                    <div class="tax">
                        <p>Total Amount <span style="text-decoration: none;">₹{{$property['property_price']->price}}</span></p>
                    </div>
                    </div>
                  </div>
                  <div class="col-12 mt-3">
                      <div class="reserv-bx px-3">
                        <h4 class="text-center">Attractions Near to Us</h4>
                        <div class="w-100">
                            <table class="table lc-near-table " >
                                <tr>
                                    <th> Graceline Shoping Mall</th>
                                    <td>10 km</td>
                                </tr>
                                <tr>
                                    <th> Rea Men Bar</th>
                                    <td>15 km</td>
                                </tr>
                                <tr>
                                    <th>Asian Food Court</th>
                                    <td>08 km</td>
                                </tr>
                                <tr>
                                    <th> Mia's Pub & Restaurent</th>
                                    <td>11 km</td>
                                </tr>
                                <tr>
                                    <th>Spot Gear & Play Lnd</th>
                                    <td>14 km</td>
                                </tr>
                                <tr>
                                    <th>Barelona Dream Port</th>
                                    <td>09 km</td>
                                </tr>
                            </table>

                        </div>
                      </div>

                  </div>
                  <div class="col-12">
                    <video width="320" height="240" autoplay loop muted style="border-radius: 10px; overflow: hidden;">
                        <source style="border-radius: 20px;" src="./images/video/video.mp4" type="video/mp4">
                      </video>
                  </div>
                  <div class="col-12">
                    <div class="reserv-bx">
                        <h3>Related</h3>
                        <div class="related-bx mt-4">
                            <div class="relate-img-bx">
                                <img src="./images/farmhouse/fh-img-3.webp" alt="">
                            </div>
                            <div class="main-details-2 mt-3">
                                <h3 style="font-size: 20px;">Room in Badowala, India</h3>
                                <p style="margin: 0; font-size: 11px;">1 Double Bed Private Attached Bathroom</p>
                                <p style="margin: 0; font-size: 11px; margin-top: 5px;">
                                  <span class="fas fa-star "></span> No Reviews Yet
                                </p>
                              </div>
                        </div>
                        <div class="related-bx mt-4">
                            <div class="relate-img-bx">
                                <img src="./images/farmhouse/fh-img-4" alt="">
                            </div>
                            <div class="main-details-2 mt-3">
                                <h3 style="font-size: 20px;">Room in Badowala, India</h3>
                                <p style="margin: 0; font-size: 11px;">1 Double Bed Private Attached Bathroom</p>
                                <p style="margin: 0; font-size: 11px; margin-top: 5px;">
                                  <span class="fas fa-star "></span> No Reviews Yet
                                </p>
                              </div>
                        </div>
                        <div class="related-bx mt-4">
                            <div class="relate-img-bx">
                                <img src="./images/farmhouse/fh-img-5" alt="">
                            </div>
                            <div class="main-details-2 mt-3">
                                <h3 style="font-size: 20px;">Room in Badowala, India</h3>
                                <p style="margin: 0; font-size: 11px;">1 Double Bed Private Attached Bathroom</p>
                                <p style="margin: 0; font-size: 11px; margin-top: 5px;">
                                  <span class="fas fa-star "></span> No Reviews Yet
                                </p>
                              </div>
                        </div>
                        <div class="related-bx mt-4">
                            <div class="relate-img-bx">
                                <img src="./images/farmhouse/fh-img-6" alt="">
                            </div>
                            <div class="main-details-2 mt-3">
                                <h3 style="font-size: 20px;">Room in Badowala, India</h3>
                                <p style="margin: 0; font-size: 11px;">1 Double Bed Private Attached Bathroom</p>
                                <p style="margin: 0; font-size: 11px; margin-top: 5px;">
                                  <span class="fas fa-star "></span> No Reviews Yet
                                </p>
                              </div>
                        </div>
                        <div class="related-bx mt-4">
                            <div class="relate-img-bx">
                                <img src="./images/farmhouse/fh-img-7" alt="">
                            </div>
                            <div class="main-details-2 mt-3">
                                <h3 style="font-size: 20px;">Room in Badowala, India</h3>
                                <p style="margin: 0; font-size: 11px;">1 Double Bed Private Attached Bathroom</p>
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



@endsection
