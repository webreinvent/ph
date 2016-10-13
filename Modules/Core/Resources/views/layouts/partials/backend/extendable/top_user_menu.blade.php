<li class="nav-item dropdown">
    <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
       data-animation="scale-up" role="button">

              <span class="avatar avatar-online">

                  @if(Gravatar::exists(Auth::user()->email))
                      <img src="{{Gravatar::get(Auth::user()->email)}}"/>
                  @else
                      <i class="icon wb-bell" aria-hidden="true"></i>
                  @endif




              </span>
    </a>
    <div class="dropdown-menu" role="menu">
        <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-user"
                                                                              aria-hidden="true"></i> Profile</a>
        <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-payment"
                                                                              aria-hidden="true"></i> Billing</a>
        <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-settings"
                                                                              aria-hidden="true"></i> Settings</a>
        <div class="dropdown-divider" role="presentation"></div>
        <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-power"
                                                                              aria-hidden="true"></i> Logout</a>
    </div>
</li>