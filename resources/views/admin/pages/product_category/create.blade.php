<?php $page="editcategory";?>
@extends('admin.layout.master')
@section('title')
<title>Add Product Category</title>
@endsection
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
			@slot('title') Product Edit Category @endslot
			@slot('title_1') Edit a product Category @endslot
		@endcomponent
        <!-- /add -->
        <form method="post" action="{{ route('admin.product_category.store') }}" enctype="multipart/form-data">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" name="name" placeholder="Category Name">
                            </div>
                                @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control form-small select">
                                    <option selected="" value="">--- Please Select ---</option>
                                    <option value="1">Show</option>
                                    <option value="0">Hide</option>
                                </select>
                                @error('status')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{--  <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" placeholder="Category Description"></textarea>
                            </div>
                        </div>  --}}
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>	Product Category Image</label>
                                {{--  <input type="file" name="image" id="image">  --}}
                                <div >
                                    <input type="file" name="image" id="image">
                                    {{--  <div class="image-uploads">
                                        <img src="{{ URL::asset('/assets/img/icons/upload.svg')}}" alt="img">
                                        <h4>Drag and drop a file to upload</h4>
                                    </div>  --}}
                                    @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                        </div>

                        {{--  <div class="col-12">
                            <div class="product-list">
                                <ul class="row">
                                    <li class="ps-0">
                                        <div class="productviews">
                                            <div class="productviewsimg">
                                                <img src="{{ URL::asset('/assets/img/icons/macbook.svg')}}" alt="img">
                                            </div>
                                            <div class="productviewscontent">
                                                <div class="productviewsname">
                                                    <h2>macbookpro.jpg</h2>
                                                    <h3>581kb</h3>
                                                </div>
                                                <a href="javascript:void(0);" class="hideset">x</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>  --}}

                        <div class="col-lg-12">
                            <button class="btn btn-submit me-2" type="submit" >Submit</button>
                            <a href="{{url('categorylist')}}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            @csrf
        </form>

        <!-- /add -->
    </div>
</div>
@endsection
