<nav class="navbar navbar-expand-lg w-100 navbar-light list-bacground  rounded-3 bg-transparent d-flex justify-content-center align-items-center" >
	<ul class="list-inline w-50 d-flex justify-content-center align-items-center p-2" style="flex-wrap:wrap; background:#f5f5f5;  border-radius:15px !important; border:3px solid #7cb342; ">
		<li class="list-inline-item px-4 py-2">
			<a class="text-color2 {{ (request()->is('users/profile')) ? 'font-weight-700' : '' }} " href="{{ url('users/profile') }}">
				{{ __('Edit Profile') }}
			</a>
		</li>

		<li class="list-inline-item px-4 py-2">
			<a class="text-color2 {{ (request()->is('users/profile/media')) ? 'secondary-text-color font-weight-700' : '' }}" href="{{ url('users/profile/media') }}">
				{{ __('Photos') }}
			</a>
		</li>
      @if(Auth::user()->role != "customer")
		<li class="list-inline-item px-4 py-2">
			<a class="text-color2 {{ (request()->is('users/edit-verification')) ? 'secondary-text-color font-weight-700' : '' }} " href="{{ url('users/edit-verification') }}">
				{{ __('Verification') }}
			</a>
		</li>
	  @endif

		<li class="list-inline-item px-4 py-2">
			<a class="text-color2 {{ (request()->is('users/security')) ? 'secondary-text-color font-weight-700' : '' }} " href="{{ url('users/security') }}">
				{{ __('Change Password') }}

			</a>
		</li>
	</ul>
</nav>
