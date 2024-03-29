@extends('errors.layouts')

@section('code', '404')
@section('title', __('Unauthorized'))

@section('image')
    <div style="background-image: url({{ asset('/svg/403.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

@section('message', __('Oops! Page not found!'))
@section('message1', __('The page you requested was not found.'))
