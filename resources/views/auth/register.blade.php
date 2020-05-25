@extends('auth.layouts.app')

@section('content')


    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->
    <div id="login-page" class="row">
        <div class="col s12 z-depth-4 card-panel">
            <form class="login-form" method="POST" action="{{ route('register') }}">
                @csrf
                <input type="hidden" name="user_type" value="1" id="user_type">
                <div class="row">
                    <div class="input-field col s12 center">
                        <h4>{{__('messages.register')}}</h4>
                        <p class="center"></p>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-5">email</i>
                        <input id="email" type="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                        <label for="email" class="center-align">{{ __('messages.email') }}</label>
                    </div>
                </div>


                @foreach($users as $user)
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="material-icons prefix pt-5">email</i>
                            <input id="email" type="text"
                                   class="form-control{{ $errors->has($user->title) ? ' is-invalid' : '' }}"
                                   name="{{$user->title}}" value="{{ old($user->title) }}" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first($user->title) }}</strong>
                                    </span>
                            @endif
                            <label for="email" class="center-align">{{ __('messages.input_titles')[$user->title]}}</label>
                        </div>
                    </div>
                @endforeach


                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-5">lock_outline</i>

                        <input id="password" type="password"
                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                               name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif

                        <label for="password">{{ __('messages.password') }}</label>
                    </div>
                </div>


                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-5">lock_outline</i>
                        <input id="password-confirm" type="password" class="form-control"
                               name="password_confirmation" required>
                        <label for="password-again">{{ __('messages.password') }}</label>
                    </div>
                </div>


                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit" class="btn waves-effect waves-light col s12">
                            {{ __('messages.register') }}
                        </button>
                    </div>
                    <div class="input-field col s12">
                        <p class="margin center medium-small sign-up">{{__('messages.have_account')}} <a
                                    href="{{route("login")}}">{{__('messages.login')}}</a>
                        </p>
                    </div>
                </div>


            </form>
        </div>
    </div>





    {{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
    {{--<div class="col-md-8">--}}
    {{--<div class="card">--}}
    {{--<div class="card-header">{{ __('Register') }}</div>--}}

    {{--<div class="card-body">--}}
    {{--<form method="POST" action="{{ route('register') }}">--}}
    {{--@csrf--}}
    {{--<input type="hidden" name="user_type" value="1" id="user_type">--}}
    {{--<div class="form-group row">--}}
    {{--<label for="email"--}}
    {{--class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

    {{--<div class="col-md-6">--}}
    {{--<input id="email" type="email"--}}
    {{--class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"--}}
    {{--name="email" value="{{ old('email') }}" required>--}}

    {{--@if ($errors->has('email'))--}}
    {{--<span class="invalid-feedback" role="alert">--}}
    {{--<strong>{{ $errors->first('email') }}</strong>--}}
    {{--</span>--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group row">--}}
    {{--<label for="password"--}}
    {{--class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

    {{--<div class="col-md-6">--}}
    {{--<input id="password" type="password"--}}
    {{--class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"--}}
    {{--name="password" required>--}}

    {{--@if ($errors->has('password'))--}}
    {{--<span class="invalid-feedback" role="alert">--}}
    {{--<strong>{{ $errors->first('password') }}</strong>--}}
    {{--</span>--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group row">--}}
    {{--<label for="password-confirm"--}}
    {{--class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

    {{--<div class="col-md-6">--}}
    {{--<input id="password-confirm" type="password" class="form-control"--}}
    {{--name="password_confirmation" required>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group row mb-0">--}}
    {{--<div class="col-md-6 offset-md-4">--}}
    {{--<button type="submit" class="btn btn-primary">--}}
    {{--{{ __('Register') }}--}}
    {{--</button>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
@endsection
