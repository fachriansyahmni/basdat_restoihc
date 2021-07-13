<div class="header" style="width: 100%">
    <div class="header-left" style="width: 25%"> 
        <div class="menu-icon dw dw-menu"></div>
        <div class="menu-icon dw dw-shopping-basket" data-toggle="header_menu"></div>
    </div>
    <div class="header-center" style="width: 50%">
        <div class="menu-item header-home">
            <button class="btn btn-outline-info border-0 btn-lg active" type="button">
                <div class=" d-flex flex-column justify-content-center">
                    <i class="dw dw-home"></i>
                    <span class="small">HOME</span>
                </div>
            </button>
        </div>
        <div class="menu-item header-menu">
            <button class="btn btn-outline-info border-0 btn-lg" type="button">
                <div class=" d-flex flex-column justify-content-center">
                    <i class="dw dw-shopping-basket"></i>
                    <span class="small">MENU</span>
                </div>
            </button>
        </div>
    </div>
    <div class="header-right" style="width: 25%">
        @auth
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="vendors/images/photo1.jpg" alt="">
                    </span>
                    <span class="user-name">Ross C. Lopez</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
                    <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="dw dw-logout"></i> Log Out</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <div class="github-link">
            <a href="https://github.com/dropways/deskapp" target="_blank"><img src="vendors/images/github.svg" alt=""></a>
        </div>
        @endauth
    </div>
</div>