<ul class="list-group customlisting">
	<li>
		<a class="btn  text-16 font-weight-700 pl-5 pr-5 pt-3 pb-3 rounded-3 {{ Request::segment(3) == 'basics'?'vbtn-outline-success active-side':'btn-outline-secondary' }} {{ $missed['basics'] == 1 ? '' : 'step-inactive'  }}" href="{{ $result->status != ""? url("listing/" . $result->id . "/basics"):"#" }}">{{ __('Basics') }}</a>
	</li>

	<li>
		<a class="btn text-16 font-weight-700 pl-5 pr-5 pt-3 pb-3 rounded-3 {{ Request::segment(3) == 'description'?'vbtn-outline-success active-side':' btn-outline-secondary' }} {{ $missed['description'] == 1 ? '' : 'step-inactive'  }}" href="{{ $result->status != ""? url("listing/" . $result->id . "/description"):"#" }}">{{ __('Description') }}</a>
	</li>

	<li>
		<a class="btn text-16 font-weight-700 pl-5 pr-5 pt-3 pb-3 rounded-3 {{ Request::segment(3) == 'location'?'vbtn-outline-success active-side':' btn-outline-secondary' }} {{ $missed['location'] == 1 ? '' : 'step-inactive'  }}" href="{{ $result->status != ""? url("listing/" . $result->id . "/location"):"#" }}"> {{ __('Location') }}</a>
	</li>

	<li>
		<a class="btn text-16 font-weight-700 pl-5 pr-5 pt-3 pb-3 rounded-3 {{ Request::segment(3) == 'amenities'?'vbtn-outline-success active-side':' btn-outline-secondary' }} {{ $result->amenities == null ? 'step-inactive' : ''  }}" href="{{ $result->status != ""? url("listing/" . $result->id . "/amenities"):"#" }}"> {{ __('Amenities') }}</a>
	</li>

	<li>
		<a class="btn text-16 font-weight-700 pl-5 pr-5 pt-3 pb-3 rounded-3 {{ Request::segment(3) == 'photos'?'vbtn-outline-success active-side':' btn-outline-secondary' }} {{ $missed['photos'] == 1 ? '' : 'step-inactive'  }}" href="{{ $result->status != ""? url("listing/" . $result->id . "/photos"):"#" }}"> {{ __('Photos') }}</a>
	</li>

	<li>
		<a class="btn text-16 font-weight-700 pl-5 pr-5 pt-3 pb-3 rounded-3 {{ Request::segment(3) == 'pricing'?'vbtn-outline-success active-side':' btn-outline-secondary' }} {{ $missed['pricing'] == 1 ? '' : 'step-inactive'  }}" href="{{ $result->status != ""? url("listing/" . $result->id . "/pricing"):"#" }}"> {{ __('Pricing') }}</a>
	</li>

	<li>
		<a class="btn text-16 font-weight-700 pl-5 pr-5 pt-3 pb-3 rounded-3 {{ Request::segment(3) == 'booking'?'vbtn-outline-success active-side':' btn-outline-secondary' }} {{ $missed['booking'] == 1 ? '' : 'step-inactive'  }}" href="{{ $result->status != ""? url("listing/" . $result->id . "/booking"):"#" }}"> {{ __('Booking') }}</a>
		
		
	</li>
	<li>
	   <a class="btn text-16 font-weight-700 pl-5 pr-5 pt-3 pb-3 rounded-3 {{ Request::segment(3) == 'products'?'vbtn-outline-success active-side':' btn-outline-secondary' }} {{ $missed['products'] == 1 ? '' : 'step-inactive'  }}" href="{{ $result->status != ""? url("listing/" . $result->id . "/products"):"#" }}">Products</a>
	</li>
	
	<li>
		<a class="btn text-16 font-weight-700 pl-5 pr-5 pt-3 pb-3 rounded-3 {{ Request::segment(3) == 'type_of_organic_products'?'vbtn-outline-success active-side':' btn-outline-secondary' }} {{ $missed['type_of_organic_products'] == 1 ? '' : 'step-inactive'  }}" href="{{ $result->status != ""? url("listing/" . $result->id . "/type_of_organic_products"):"#" }}">Type Of Organic Products</a>
	</li>
	
	<li>
		<a class="btn text-16 font-weight-700 pl-5 pr-5 pt-3 pb-3 rounded-3 {{ Request::segment(3) == 'sustainable_farm_practices'?'vbtn-outline-success active-side':' btn-outline-secondary' }} {{ $missed['sustainable_farm_practices'] == 1 ? '' : 'step-inactive'  }}" href="{{ $result->status != ""? url("listing/" . $result->id . "/sustainable_farm_practices"):"#" }}"> Sustainable Farm Practices</a>
	</li>
	
	<li>
		<a class="btn text-16 font-weight-700 pl-5 pr-5 pt-3 pb-3 rounded-3 {{ Request::segment(3) == 'irrigation_method_farm_practices'?'vbtn-outline-success active-side':' btn-outline-secondary' }} {{ $missed['irrigation_method_farm_practices'] == 1 ? '' : 'step-inactive'  }}" href="{{ $result->status != ""? url("listing/" . $result->id . "/irrigation_method_farm_practices"):"#" }}">Irrigation Method Farm Practices </a>
	</li>
	
	<li>
		<a class="btn text-16 font-weight-700 pl-5 pr-5 pt-3 pb-3 rounded-3 {{ Request::segment(3) == 'soil_health_and_fertility_practices'?'vbtn-outline-success active-side':' btn-outline-secondary' }} {{ $missed['soil_health_and_fertility_practices'] == 1 ? '' : 'step-inactive'  }}" href="{{ $result->status != ""? url("listing/" . $result->id . "/soil_health_and_fertility_practices"):"#" }}">Soil Health and Fertility Practices</a>
	</li>
	
	<li>
		<a class="btn text-16 font-weight-700 pl-5 pr-5 pt-3 pb-3 rounded-3 {{ Request::segment(3) == 'pest_and_disease_farm_practices'?'vbtn-outline-success active-side':' btn-outline-secondary' }} {{ $missed['pest_and_disease_farm_practices'] == 1 ? '' : 'step-inactive'  }}" href="{{ $result->status != ""? url("listing/" . $result->id . "/pest_and_disease_farm_practices"):"#" }}">Pest and Disease Farm Practices</a>
	</li>

 	<li>
		<a class="btn text-16 font-weight-700 pl-5 pr-5 pt-3 pb-3 rounded-3 {{ Request::segment(3) == 'location_near_me'?'vbtn-outline-success active-side':' btn-outline-secondary' }} {{ $missed['location_near_me'] == 1 ? '' : 'step-inactive'  }}" href="{{ $result->status != ""? url("listing/" . $result->id . "/location_near_me"):"#" }}">Location Near Me</a>
	</li>
	
	<li>
		<a class="btn text-16 font-weight-700 pl-5 pr-5 pt-3 pb-3 rounded-3 {{ Request::segment(3) == 'facilities'?'vbtn-outline-success active-side':' btn-outline-secondary' }} {{ $missed['facilities'] == 1 ? '' : 'step-inactive'  }}" href="{{ $result->status != ""? url("listing/" . $result->id . "/facilities"):"#" }}">Facilities</a>
	</li>
	
	<li>
		<a class="btn text-16 font-weight-700 pl-5 pr-5 pt-3 pb-3 rounded-3 {{ Request::segment(3) == 'activities'?'vbtn-outline-success active-side':' btn-outline-secondary' }} {{ $missed['activities'] == 1 ? '' : 'step-inactive'  }}" href="{{ $result->status != ""? url("listing/" . $result->id . "/activities"):"#" }}">Activities</a>
	</li>
	
	<li>
		<a class="btn text-16 font-weight-700 pl-5 pr-5 pt-3 pb-3 rounded-3 {{ Request::segment(3) == 'general_informations'?'vbtn-outline-success active-side':' btn-outline-secondary' }} {{ $missed['general_informations'] == 1 ? '' : 'step-inactive'  }}" href="{{ $result->status != ""? url("listing/" . $result->id . "/general_informations"):"#" }}">General Informations</a>
	</li>
{{--
	<li>
		<a class="btn text-16 font-weight-700 pl-5 pr-5 pt-3 pb-3 rounded-3 {{ Request::segment(3) == 'calendar'?'vbtn-outline-success active-side':' btn-outline-secondary' }}" href="{{ $result->status != ""? url("listing/" . $result->id . "/calendar"):"#" }}"> {{ __('Calender') }}</a>
	</li>--}}
</ul>
