<?php $page = 'signin'; ?>
@extends('admin.layout.master')
@section('content')
    <Form action="{{ route('login') }}" method="POST" class="account-content">
        @csrf
        <div class="login-wrapper">
            <div class="login-content">
                <div class="login-userset">
                    <div class="login-logo logo-normal">
                        <img src="{{ URL::asset('/assets/img/logo.png') }}" alt="img">
                    </div>
                    <a href="{{ url('index') }}" class="login-logo logo-white">
                        <img src="{{ URL::asset('/assets/img/logo-white.png') }}" alt="">
                    </a>

                    <div class="login-userheading">
                        <h3>Sign In</h3>
                        <h4>Please login to your account</h4>
                    </div>
                    <div class="form-login">
                        <label>Email</label>
                        <div class="form-addons">
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="username" />
                            <img src="{{ URL::asset('/assets/img/icons/mail.svg') }}" alt="img">
                        </div>
                        <div class="text-danger pt-2">
                            @error('0')
                                {{ $message }}
                            @enderror
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-login">
                        <label>Password</label>
                        <div class="pass-group">
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                autocomplete="current-password" />
                            <span class="fas toggle-password fa-eye-slash"></span>
                        </div>
                        <div class="text-danger pt-2">
                            @error('0')
                                {{ $message }}
                            @enderror
                            @error('password')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    @if (session('message'))
                        <div class="col-sm-12 alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="form-login">
                        <button class="btn btn-login" type="submit">Sign In</button>
                    </div>


                </div>
            </div>
            <div class="login-img">
                <img src="{{ URL::asset('/assets/img/login.jpg') }}" alt="img">
            </div>
        </div>
    </Form>
@endsection
