<?php $page = 'addproduct'; ?>
@extends('admin.layout.master')
@section('title')
<title>Add Product</title>
@endsection
@section('content')
    <div class="page-wrapper">

        <div class="content">
            @component('components.pageheader')
                @slot('title')
                    Product Add
                @endslot
                @slot('title_1')
                    Create new product
                @endslot
            @endcomponent
            <!-- /add -->
            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-body">

                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" name="name" id="name" placeholder="Name"
                                        value="{{ old('name') }}">

                                </div>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for='slug'>Product Slug</label>
                                    <input type="text" name="slug" id="slug" placeholder="Name-slug"
                                        value="{{ old('slug') }}">
                                </div>
                                @error('slug')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="categoty">Category</label>
                                    <select class="select" name="product_category_id" id="category">
                                        <option selected="" value="">--- Please Select ---</option>
                                        @foreach ($product_categories as $product_category)
                                            <option value="{{ $product_category->id }}">{{ $product_category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('product_category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{--  <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="unit">Unit</label>
                                    <select class="select" name="unit_id" id="unit">
                                        <option value="">--- Please Select ---</option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('unit')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>  --}}

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" name="qty" id="qty" value="{{ old('qty') }}">
                                </div>
                                @error('qty')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" placeholder="Description product..."></textarea>
                                </div>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" value="{{ old('price') }}" id="price">
                                </div>
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="discount_price">Price Discount</label>
                                    <input type="number" name="discount_price" value="{{ old('discount_price') }}"
                                        id="discount_price">
                                </div>
                                @error('discount_price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="status"> Status</label>
                                    <select class="select" name="status" id="status">
                                        <option selected="" value="">--- Please Select ---</option>
                                        <option {{ old('status') === '0' ? 'selected' : '' }} value="0">Hide</option>
                                        <option {{ old('status') === '1' ? 'selected' : '' }} value="1">Show</option>
                                    </select>
                                </div>
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="image"> Product Image</label>
                                    <input type="file" name="image" id="image">
                                    {{--  <div class="image-upload">
                                        <input type="file" name="image" id="image">
                                        <div class="image-uploads">
                                            <img src="{{ URL::asset('/assets/img/icons/upload.svg') }}" alt="img">
                                            <h4>Drag and drop a file to upload</h4>
                                        </div>
                                    </div>  --}}
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                                <a href="{{ route('admin.product.index') }}" class="btn btn-cancel">Cancel</a>
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

@section('js-custom')
    <script>
        ClassicEditor
            .create(document.querySelector('#description'), {
                ckfinder: {
                    // Upload the images to the server using the CKFinder QuickUpload command.
                    uploadUrl: '{{ route('admin.product.ckedit.upload.image') . '?_token=' . csrf_token() }}'
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#name').on('keyup', function() {
                var name = $('#name').val();
                $.ajax({
                    method: "POST", //method of form
                    url: "{{ route('admin.product.create.slug') }}", //action of form
                    data: {
                        'name': name,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#slug').val(response.slug);
                    }
                })
            });
        });
    </script>
@endsection
