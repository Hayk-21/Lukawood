@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-md-center mt-5">
        <div class="col-md-12">
            <div class="panel">
                <h1 class="title">Регистрация</h1>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-form-label text-lg-right">Никнейм</label>

                            <div class="col-lg-10 col-md-9">
                                <input
                                        type="text"
                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        name="name"
                                        value="{{ old('name') }}"
                                        required
                                >
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-form-label text-lg-right col-md-3">Email</label>

                            <div class="col-lg-10 col-md-9">
                                <input
                                        type="email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required
                                >

                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-form-label text-lg-right col-md-3">Пароль</label>

                            <div class="col-lg-10 col-md-9">
                                <input
                                        type="password"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password"
                                        required
                                >
                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-form-label text-lg-right col-md-3">Подвердите пароль</label>

                            <div class="col-lg-10 col-md-9">
                                <input
                                        type="password"
                                        class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                        name="password_confirmation"
                                        required
                                >
                                @if ($errors->has('password_confirmation'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6 offset-lg-2">
                                <button type="submit" class="btn vc_btn-success">
                                    Регистрация
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
