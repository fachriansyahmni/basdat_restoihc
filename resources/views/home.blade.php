@extends('deskapp.dashboard')

@section('main-content')
<div class="min-height-200px">
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="{{asset('vendors/dash-deskapp/vendors/images/banner-img.png')}}" alt="">
                </div>
                <div class="col-md-8">
                    <h4 class="font-20 weight-500 mb-10 text-capitalize">
                        Welcome back <div class="weight-600 font-30 text-blue">{{Auth::user()->name}}!</div>
                    </h4>
                    <p class="font-18 max-width-600">Jabatan saat ini : <strong>{{Auth::user()->jabatan}}</strong></p>
                </div>
            </div>
    </div>
    <div class="row">
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data">
                        <div id="chart"></div>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0">{{count(App\Menu::get())}}</div>
                        <div class="weight-600 font-14">Total Menu</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data">
                        <div id="chart2"></div>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0">{{count(App\Receipt::get())}}</div>
                        <div class="weight-600 font-14">Total Pesanan</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data">
                        <div id="chart3"></div>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0">{{count(App\Pesanan::get())}}</div>
                        <div class="weight-600 font-14">Menu Terjual</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data">
                        <div id="chart4"></div>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0">{{date('D')}}</div>
                        <div class="weight-600 font-14">Hari</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection