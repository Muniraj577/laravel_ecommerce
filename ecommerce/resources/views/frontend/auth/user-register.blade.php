@extends('frontend.layout')
@section('content')
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <p>Home / Login</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->
    <!--================login_part Area =================-->
    <section class="login_part section_padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Already an user?</h2>
                            <h4>Login Here</h4>
                            <p>There are advances being made in science and technology
                                everyday, and a good example of this is the</p>
                            <a href="{{route('user-login')}}" class="btn_3">Login</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Register</h3>
                            <form class="row contact_form" action="{{route('register')}}" method="post" novalidate="novalidate">
                                @csrf
                                <div class="col-md-12 form-group">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="password-confirm"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit"
                                            class="btn submit_btn">{{ __('Register') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->
@endsection