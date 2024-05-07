<div class="box">
	<div class="panel-body">
		<div class="nav-tabs-custom">
			<ul class="cus nav nav-tabs f-14" role="tablist">
				<li  class="{{ isset($customer_edit_tab) ? $customer_edit_tab : '' }}">
					<a href='{{ url("admin/edit-farm-house-owner/" . $user?->id) }}' >Edit Customer</a>
				</li>
			    <li  class="{{ isset($customer_profile_tab) ? $customer_profile_tab : '' }}">
					<a href='{{ url("admin/farm-house-owner/profile/" . $user?->id) }}' >Profile Photo</a>
				</li>
				 <li  class="{{ isset($customer_verification_tab) ? $customer_verification_tab : '' }}">
					<a href='{{ url("admin/farm-house-owner/verification/" . $user?->id) }}' >Verification</a>
				</li>
				<li  class="{{ isset($properties_tab) ? $properties_tab : '' }}">
					<a href='{{ url("admin/farm-house-owner/properties/" . $user?->id) }}' >Properties</a>
				</li>
				<li class="{{ isset($bookings_tab) ? $bookings_tab : '' }}">
					<a href='{{ url("admin/farm-house-owner/bookings/" . $user?->id) }}'>Bookings</a>
				</li>
				<li class="{{ isset($payouts_tab) ? $payouts_tab : '' }}">
					<a href='{{ url("admin/farm-house-owner/payouts/" . $user?->id) }}'>Payouts</a>
				</li>
				<li class="{{ isset($payment_methods_tab) ? $payment_methods_tab : '' }}">
					<a href='{{ url("admin/farm-house-owner/payment-methods/" . $user?->id) }}' >Payment Methods</a>
				</li>
				<li class="{{ isset($wallet) ? $wallet : '' }}">
					<a href='{{ url("admin/farm-house-owner/wallet/" . $user?->id) }}' >Wallet</a>
				</li>
			</ul>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<h4>{{ $user?->first_name . " " . $user?->last_name }}</h4>
