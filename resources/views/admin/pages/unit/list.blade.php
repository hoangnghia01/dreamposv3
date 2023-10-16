<?php $page = 'brandlist'; ?>
@extends('admin.layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-title"
                style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h4 style="display: inline-block;">Unit List</h4>
                <a href="{{ route('admin.unit.create') }}" style="display: inline-block;" type="button"
                    class="btn btn-outline-primary mr-1 mb-1">
                    + Add Unit
                </a>
            </div>
            @if (session('message'))
                        <div class="col-sm-12 alert alert-success">
                            {{ session('message') }}
                        </div>
            @endif
            <!-- /product list -->
            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-path">
                                <a class="btn btn-filter" id="filter_search">
                                    <img src="{{ URL::asset('/assets/img/icons/filter.svg') }}" alt="img">
                                    <span><img src="{{ URL::asset('/assets/img/icons/closes.svg') }}" alt="img"></span>
                                </a>
                            </div>
                            <div class="search-input">
                                <a class="btn btn-searchset"><img
                                        src="{{ URL::asset('/assets/img/icons/search-white.svg') }}" alt="img"></a>
                            </div>
                        </div>
                        <div class="wordset">
                            <ul>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                            src="{{ URL::asset('/assets/img/icons/pdf.svg') }}" alt="img"></a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                            src="{{ URL::asset('/assets/img/icons/excel.svg') }}" alt="img"></a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                            src="{{ URL::asset('/assets/img/icons/printer.svg') }}" alt="img"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /Filter -->
                    <div class="card" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Brand Name">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Brand Description">
                                    </div>
                                </div>
                                <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                    <div class="form-group">
                                        <a class="btn btn-filters ms-auto"><img
                                                src="{{ URL::asset('/assets/img/icons/search-whites.svg') }}"
                                                alt="img"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Filter -->
                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="checkboxs">
                                            <input type="checkbox" id="select-all">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </th>
                                    <th>No</th>
                                    <th>Unit Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach($units as $unit)
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $unit->name }}</td>
                                    <td>{{ $unit->status == 1 ? 'Show' : 'Hide' }}</td>
                                    <td>
                                        <div style="display: flex; justify-content: space-around; align-items: center;">
                                            <a class="me-3" href="{{ route('admin.unit.show',['unit' => $unit->id]) }}">
                                                <img src="{{ URL::asset('/assets/img/icons/edit.svg') }}" alt="img">
                                            </a>
                                            <form method="POST" action="{{ route('admin.unit.destroy', ['unit' => $unit->id]) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-primary mr-1 mb-1"
                                                style="display: flex; justify-content: space-between; align-items: center;"
                                                    onclick="return confirm('Are you sure ?')">
                                                    <img src="{{ URL::asset('/assets/img/icons/delete.svg') }}" alt="img">
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /product list -->
        </div>
    </div>
@endsection
