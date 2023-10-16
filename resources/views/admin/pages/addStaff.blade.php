<?php $page="add";?>
@extends('admin.layout.master')
@section('content')
<Form action="{{ route('admin.addStaff') }}" method="POST" class="account-content">
@csrf
<div class="page-wrapper cardhead">
    <div class="content container-fluid">
        @component('components.pageheader')                
			@slot('title') Add Staff @endslot	
		@endcomponent
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.addStaff') }}" method="POST">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email"  name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Repeat Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
        

    </div>	
</div>
</Form>
@endsection