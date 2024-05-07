



<div class="box box-info box_info">
    <div class="panel-body">
    <h4 class="all_settings f-18 mt-1">Farm Houses</h4>
        <?php
        $requestUri = request()->segment(4);
        ?>
        <ul class="nav navbar-pills nav-tabs nav-stacked no-margin d-flex flex-column f-14" role="tablist">
            <li class="{{ ($requestUri == 'basics') ? 'active' : ''  }}">
                <a href='{{ url("admin/listing/$result->id/basics") }}' data-group="profile">Basics</a>
            </li>

            <li class="lst-btn {{ ($requestUri == 'description' || $requestUri == 'details') ? 'active' : ''  }}">
                <a href='{{ url("admin/listing/$result->id/description") }}' data-group="profile">Description</a>
            </li>

            <li class="{{ ($requestUri == 'location') ? 'active' : ''  }}">
                <a href='{{ url("admin/listing/$result->id/location") }}' data-group="profile">Location</a>
            </li>

            <li class="{{ ($requestUri == 'amenities') ? 'active' : ''  }}">
                <a href='{{ url("admin/listing/$result->id/amenities") }}' data-group="profile">Amenities</a>
            </li>

            <li class="{{ ($requestUri == 'photos') ? 'active' : ''  }}">
                <a href='{{ url("admin/listing/$result->id/photos") }}' data-group="profile">Photos</a>
            </li>

            <li class="{{ ($requestUri == 'pricing') ? 'active' : ''  }}">
                <a href='{{ url("admin/listing/$result->id/pricing") }}' data-group="profile">Pricing</a>
            </li>

            <li class="{{ ($requestUri == 'booking') ? 'active' : ''  }}">
                <a href='{{ url("admin/listing/$result->id/booking") }}' data-group="profile">Booking</a>
            </li>

          {{--  <li class="{{ ($requestUri == 'calender') ? 'active' : ''  }}">
                <a href='{{ url("admin/listing/$result->id/calender") }}' data-group="profile">Calendar</a>
            </li> --}}
             
             <li class="{{ ($requestUri == 'products') ? 'active' : ''  }}">
                  <a href='{{ url("admin/listing/$result->id/products") }}' data-group="profile">Products</a>
             
             </li>
        
             <li class="{{ ($requestUri == 'type_of_organic_products') ? 'active' : ''  }}">
                  <a href='{{ url("admin/listing/$result->id/type_of_organic_products") }}' data-group="profile"> Type Of Organic Products</a>
             
             </li>
             
              <li class="{{ ($requestUri == 'sustainable_farm_practices') ? 'active' : ''  }}">
                  <a href='{{ url("admin/listing/$result->id/sustainable_farm_practices") }}' data-group="profile"> Sustainable Farm Practices</a>
             
             </li>
             
              <li class="{{ ($requestUri == 'irrigation_method_farm_practices') ? 'active' : ''  }}">
                  <a href='{{ url("admin/listing/$result->id/irrigation_method_farm_practices") }}' data-group="profile">Irrigation Method Farm Practices </a>
             
             </li>
              <li class="{{ ($requestUri == 'soil_health_and_fertility_practices') ? 'active' : ''  }}">
                  <a href='{{ url("admin/listing/$result->id/soil_health_and_fertility_practices") }}' data-group="profile">Soil Health and Fertility Practices</a>
             
             </li>
              <li class="{{ ($requestUri == 'pest_and_disease_farm_practices') ? 'active' : ''  }}">
                  <a href='{{ url("admin/listing/$result->id/pest_and_disease_farm_practices") }}' data-group="profile">Pest and Disease Farm Practices</a>
             
             </li>
              <li class="{{ ($requestUri == 'location_near_me') ? 'active' : ''  }}">
                  <a href='{{ url("admin/listing/$result->id/location_near_me") }}' data-group="profile">Location Near Me</a>
             
             </li>
             <li class="{{ ($requestUri == 'facilities') ? 'active' : ''  }}">
                  <a href='{{ url("admin/listing/$result->id/facilities") }}' data-group="profile">Facilities</a>
             
             </li>
             <li class="{{ ($requestUri == 'activities') ? 'active' : ''  }}">
                  <a href='{{ url("admin/listing/$result->id/activities") }}' data-group="profile">Activities</a>
             
             </li>
              <li class="{{ ($requestUri == 'term_conditions') ? 'active' : ''  }}">
                  <a href='{{ url("admin/listing/$result->id/term_conditions") }}' data-group="pofile">Term and Conditions</a>
             
             </li>
             <li class="{{ ($requestUri == 'general_informations') ? 'active' : ''  }}">
                  <a href='{{ url("admin/listing/$result->id/general_informations") }}' data-group="profile">General Informations</a>
             
             </li>
             

        </ul>
    </div>
</div>
