<?php $page="addbrand";?>
@extends('admin.layout.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
			@slot('title') Unit ADD @endslot
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
                                <input type="text" name="name" placeholder="Name">
                            </div>
                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control form-small select">
                                    <option value="" selected>--- Please Select ---</option>
                                    <option value="1">Show</option>
                                    <option value="0">Hide</option>
                                </select>
                            </div>
                            @error('status')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        {{--  <div class="col-lg-12">
                            <div class="form-group">
                                <label>	Product Image</label>
                                <div class="image-upload">
                                    <input type="file">
                                    <div class="image-uploads">
                                        <img src="{{ URL::asset('/assets/img/icons/upload.svg')}}" alt="img">
                                        <h4>Drag and drop a file to upload</h4>
                                    </div>
                                </div>
                            </div>
                        </div>  --}}
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{url('brandlist')}}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <!-- /add -->
    </div>
</div>
@endsection
