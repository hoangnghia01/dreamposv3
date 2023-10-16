<?php $page = 'list'; ?>
@extends('admin.layout.master')
@section('content')
    <div class="page-wrapper page-wrapper-four">
        <div class="card mb-0">
            <div class="card-body">
                <h4 class="card-title">Staff Lists</h4>
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
                            @foreach ($listsStaff as $listStaff)
                            <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="javascript:void(0);">{{ $listStaff->name }}</a></td>
                                    <td class="productimgname">
                                        
                                        <a href="{{ url('productlist') }}">{{ $listStaff->email }}</a>
                                    </td>
                                    <td>{{ $listStaff->created_at }}</td>
                                    <td>{{ $listStaff->updated_at }}</td>
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
