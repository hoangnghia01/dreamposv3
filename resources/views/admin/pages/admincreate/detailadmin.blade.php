<?php $page = 'add'; ?>
@extends('admin.layout.master')
@section('title')
    <title>Add New Admin</title>
@endsection
@section('content')
    <div class="page-wrapper cardhead">
        <div class="content container-fluid">
            @component('components.pageheader')
                @slot('title')
                    Detail Admin
                @endslot
            @endcomponent
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.admin.update', ['admin' => $admin->id]) }}" method="POST" class="account-content">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="name" class="form-control" value="{{ $admin->name }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="email" class="form-control" value="{{ $admin->email }}">
                                    @error('email')
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
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
