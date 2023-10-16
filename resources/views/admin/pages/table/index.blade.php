<?php $page = 'list'; ?>
@extends('admin.layout.master')
@section('title')
    <title>Table list</title>
@endsection
@section('content')
    <div class="page-wrapper page-wrapper-four">
        <div class="card mb-0">
            <div class="card-body">
                <h4 class="card-title">Table lists</h4>
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
                                <th>Name</th>
                                <th>Area</th>
                                <th>Status</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tables as $table)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $table->name }}</td>
                                    <td>{{ $table->area }}</td>
                                    <td>{{ $table->status }}</td>
                                    <td>{{ $table->created_at }}</td>
                                    <td>{{ $table->updated_at }}</td>
                                    <td>
                                        <div style="display: flex; justify-content: space-around; align-items: center;">
                                            <a class="me-3" href="{{ route('admin.table.show', ['table' => $table->id]) }}">
                                                <img src="{{ URL::asset('/assets/img/icons/edit.svg') }}" alt="img">
                                            </a>
                                            @if (!is_null($table->deleted_at))
                                                <a href="{{ route('admin.table.restore', ['table' => $table->id]) }}"
                                                    class="btn btn-outline-primary mr-1 mb-1"
                                                    style="display: flex; justify-content: space-between; align-items: center;">
                                                    <img src="{{ URL::asset('/assets/img/icons/return1.svg') }}"
                                                        alt="img">
                                                </a>
                                            @else
                                                <form action="{{ route('admin.table.destroy', ['table' => $table->id]) }}"
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
                                        </div>
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
