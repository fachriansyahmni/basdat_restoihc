@php
    $Menu = [
        "Admin Panel" => [
            "Manage Pengguna" => [
                "has-sub" => false,
                "url" => "user",
                "icon" => 'micon dw dw-user1'
            ],
            "Manage Cabang" => [
                "has-sub" => false,
                "url" => "cabang",
                "icon" => 'micon dw dw-shop'
            ],
        ],
        "Menu" => [
            "Home" => [
                "has-sub" => false,
                "url" => "home",
                "icon" => 'micon dw dw-house-1'
            ],
            "Menu" => [
                "has-sub" => false,
                "url" => 'menu',
                "icon" => 'micon dw dw-notebook'
            ],
            "Pesanan" => [
                "has-sub" => false,
                "url" => "pesanan",
                "icon" => 'micon dw dw dw-notepad-1'
            ],
        ]
    ]
@endphp

<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="{{ asset('/vendors/dash-deskapp/vendors/images/logo-dark.png') }}" alt="" class="dark-logo">
            <img src="{{ asset('/vendors/dash-deskapp/vendors/images/logo-white.png') }}" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                @foreach ($Menu as $index => $submenus)
                @if ($index == "Admin Panel" && Auth::user()->jabatan == "pegawai")
                    @continue
                @endif
                <li>
                    <div class="sidebar-small-cap">{{$index}}</div>
                </li>
                    @foreach ($submenus as $indexSubmenu => $submenu)
                    <li class="dropdown">
                        <a href="{{route($submenu["url"])}}" class="dropdown-toggle {{(!$submenu['has-sub']) ? 'no-arrow':''}}">
                            <span class="{{$submenu["icon"]}}"></span><span class="mtext">{{$indexSubmenu}}</span>
                        </a>
                    </li>
                    @endforeach
                @endforeach
            </ul>
        </div>
    </div>
</div>