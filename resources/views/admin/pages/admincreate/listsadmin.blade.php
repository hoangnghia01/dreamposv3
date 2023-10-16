<?php $page = 'list'; ?>
@extends('admin.layout.master')
@section('title')
<title>Admin Lists</title>
@endsection
@section('content')
    <div class="page-wrapper page-wrapper-four">
        <div class="card mb-0">
            <div class="card-body">
                <h4 class="card-title">Admin Lists</h4>
                @if (session('message'))
                <div class="col-sm-12 alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
                <div class="table-responsive dataview">
                    <table class="table datatable ">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Admin Name</th>
                                <th>Email</th>
                                <th>Created_at</th>
                                <th>Update_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="javascript:void(0);">{{ $user->name }}</a></td>
                                    <td class="productimgname">

                                        <a href="{{ url('productlist') }}">{{ $user->email }}</a>
                                    </td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.admin.show', ['admin' => $user->id]) }}">Edit</a>
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
