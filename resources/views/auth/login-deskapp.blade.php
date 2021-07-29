@extends('deskapp.auth.base')

@section('main-content')
    
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="{{asset('vendors/dash-deskapp/vendors/images/login-page-img.png')}}" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Login</h2>
							@if ($errors->any())
                		<div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
						</div>
						<form method="POST" action="{{ route('login') }}">
                            @csrf
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" placeholder="Username" name="username" value="{{ old('username') }}"  autocomplete="username" autofocus>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" placeholder="**********" name="password"  autocomplete="current-password">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
@endsection