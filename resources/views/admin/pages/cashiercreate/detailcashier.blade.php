<?php $page = 'add'; ?>
@extends('admin.layout.master')
@section('title')
    <title>Detail Cashier</title>
@endsection
@section('content')
    <div class="page-wrapper cardhead">
        <div class="content container-fluid">
            @component('components.pageheader')
                @slot('title')
                    Detail Cashier
                @endslot
            @endcomponent
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.cashier.update', ['cashier' => $cashier->id]) }}" method="POST">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" name="email" class="form-control" value="{{ $cashier->email }}">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="name" class="form-control" value="{{ $cashier->name }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="password" type="password" class="form-control">
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Repeat Password</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Update Cashier</button>
                                </div>
                                @csrf
                                @method('put')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
