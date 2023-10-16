<?php $page = 'list'; ?>
@extends('admin.layout.master')
@section('content')
    <div class="page-wrapper page-wrapper-four">
        <div class="card mb-0">
            <div class="card-body">
                <h4 class="card-title">User Lists</h4>
                <div class="table-responsive dataview">
                    <table class="table datatable ">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Admin Name</th>
                                <th>Email</th>
                                <th>Created_at</th>
                                <th>Update_at</th>
                                <th>Expiry Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listsUser as $listUser)
                            <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="javascript:void(0);">{{ $listUser->name }}</a></td>
                                    <td class="productimgname">
                                        
                                        <a href="{{ url('productlist') }}">{{ $listUser->email }}</a>
                                    </td>
                                    <td>{{ $listUser->created_at }}</td>
                                    <td>{{ $listUser->updated_at }}</td>
                                    <td>12-12-2022</td>
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
