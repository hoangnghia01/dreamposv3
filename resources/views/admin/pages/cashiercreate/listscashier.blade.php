<?php $page = 'list'; ?>
@extends('admin.layout.master')
@section('title')
    <title>Admin Cashier</title>
@endsection
@section('content')
    <div class="page-wrapper page-wrapper-four">
        <div class="card mb-0">
            <div class="card-body">
                <h4 class="card-title">Cashier Lists</h4>
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
                                <th>Expiry Date</th>
                                <th>Delete</th>
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
                                        <a href="{{ route('admin.cashier.show', ['cashier' => $user->id]) }}">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        @if (!is_null($user->deleted_at))
                                            <a href="{{ route('admin.cashier.restore', ['cashier' => $user->id]) }}"
                                                class="btn btn-outline-primary mr-1 mb-1"
                                                style="display: flex; justify-content: space-between; align-items: center;">
                                                <img src="{{ URL::asset('/assets/img/icons/return1.svg') }}" alt="img">
                                            </a>
                                        @else
                                            <form
                                                action="{{ route('admin.cashier.destroy', ['cashier' => $user->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-primary mr-1 mb-1"
                                                    style="display: flex; justify-content: space-between; align-items: center;"
                                                    onclick="return confirm('Are you sure?')">
                                                    <img src="{{ URL::asset('/assets/img/icons/delete.svg') }}"
                                                        alt="img">
                                                </button>
                                            </form>
                                        @endif
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
