<?php $page="addbrand";?>
@extends('admin.layout.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
			@slot('title') Unit Detail @endslot
			{{--  @slot('title_1') Create new Brand @endslot  --}}
		@endcomponent
        <!-- /add -->
        <div class="card">
            <form method="POST" action="{{ route('admin.unit.store') }}">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Unit Name</label>
                                <input type="text" name="name" placeholder="Name" value="{{ $unit->name }}">
                            </div>
                            @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control form-small select">
                                    <option value="" >--- Please Select ---</option>
                                    <option {{ $unit->status == 1 ? 'selected' : '' }} value="1">Show</option>
                                    <option {{ $unit->status == 0 ? 'selected' : '' }} value="0">Hide</option>
                                </select>
                            </div>
                            @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Update</button>
                            <a href="{{ route('admin.unit.index') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <!-- /add -->
    </div>
</div>
@endsection
