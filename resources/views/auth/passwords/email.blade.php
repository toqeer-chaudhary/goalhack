@extends("layouts.frontend-layout")

@section('container')

<section class="lesun-login-area section_t_100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="login-box">
                    {{--<div class="login-heading">--}}
                    {{--<h3>sign in</h3>--}}
                    {{--</div>--}}
                    <div class="social-account-login">
                        <a href="#" class="twitter-login">
                            <span><i class="fa fa-refresh"></i></span>
                           Reset
                        </a>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{--<div class="login-heading">--}}
                    {{--<h3>or</h3>--}}
                    {{--</div>--}}
                    @if(Session::has('success'))
                        <div class="alert  alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(count($errors) > 0)
                        @foreach($errors->all() as $error)
                            <p class="alert alert-danger">{{$error}}</p>
                        @endforeach
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="account-form-group">
                            <input id="email" type="email" placeholder="E-Mail Address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            <i class="fa fa-user"></i>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <p>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
