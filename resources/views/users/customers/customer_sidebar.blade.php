  <div class="col-lg-4 ">
                        <div class="card" style="overflow:hidden;">
                            <div class="card-body">
                                <div class="user-detail">
                                    <div class="user-left">
                                        <div class="user-img">
                                            <img src="{{asset('public/images/profile/'.@$profile->profile_image)}}" alt="" />
                                            <div class="user-status">
                                                <span class="fas fa-shield-alt"></span>
                                            </div>
                                        </div>
                                        <div class="user-info">
                                            <h5>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h5>

                                        </div>
                                    </div>
                                   {{-- <div class="user-right">
                                        <button class="btn btn-icon-xl profile-btn">
                                            <span class="fas fa-pen"></span>
                                        </button>
                                    </div> --}}
                                </div>
                                <div class="x-nav" >
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link @if(@$check_active_page=="profile") active @endif" href="{{url('customer-profile')}}">
                                                <div class="icon">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                                <span class="link-text">Profile</span>
                                                <div class="active-hr"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link @if(@$check_active_page=="profile-setting") active @endif" href="{{url('customer-profile-setting')}}">
                                                <div class="icon">
                                                    <span class="fas fa-cog"></span>
                                                </div>
                                                <span class="link-text">Profile Setting</span>
                                                <div class="active-hr"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('user/my-bookings') }}">
                                                <div class="icon">
                                                    <span class="fas fa-book"></span>
                                                </div>
                                                <span class="link-text">My Booking</span>
                                                <div class="active-hr"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="./notification.html">
                                                <div class="icon">
                                                    <span class="fas fa-bell"></span>
                                                </div>
                                                <span class="link-text">Notification</span>
                                                <div class="active-hr"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="./payment.html">
                                                <div class="icon">
                                                    <span class="far fa-credit-card"></span>
                                                </div>
                                                <span class="link-text">Payment</span>
                                                <div class="active-hr"></div>
                                            </a>
                                        </li>
                                       <!--  <li class="nav-item">
                                            <a class="nav-link" href="./favorites.html">
                                                <div class="icon">
                                                    <span class="fas fa-heart"></span>
                                                </div>
                                                <span class="link-text">my Favorites</span>
                                                <div class="active-hr"></div>
                                            </a>
                                        </li> -->
                                        <li class="nav-item">
                                            <a class="nav-link" href="./reviews.html">
                                                <div class="icon">
                                                    <span class="fas fa-star"></span>
                                                </div>
                                                <span class="link-text">Reviews</span>
                                                <div class="active-hr"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="./messages.html">
                                                <div class="icon">
                                                    <span class="fab fa-facebook-messenger"></span>
                                                </div>
                                                <span class="link-text">Message</span>
                                                <div class="active-hr"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                <div class="icon">
                                                    <span class="fas fa-sign-out-alt"></span>
                                                </div>
                                                <span class="link-text">Logout</span>
                                                <div class="active-hr"></div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
