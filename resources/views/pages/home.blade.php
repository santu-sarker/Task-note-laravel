@extends('layouts.app')
{{-- page title section --}}

@section('page-title')
Home Page
@endsection

{{-- page title section end --}}
{{-- custom css files --}}
@section('css-scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('css/login-page.css') }}">
@endsection
{{-- custom css files ends --}}

{{-- main content section starts here --}}

@section('content')
<div class="container">
    <div class="row justify-content-center ">

        @if(session()->has("success"))
        <div class="col-10 justify-content-center alert alert-success alert-dismissible fade show text-center"
            role="alert">
            <strong>{{ session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if ($errors->any())
        <div class="col-10 justify-content-center alert alert-success alert-dismissible fade show text-center"
            role="alert">
            <strong>{{ $errors->first() }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
    {{-- main datatable container --}}
    <div class="container card pt-1 pb-5 px-5">
        <div class="row text-center ml-2">

            <table class="table table-bordered table-hover" id="task-table">
                <thead>
                    <tr>
                        <th style="display: none;"></th>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th> Created At </th>
                        <th> Edit </th>
                        <th> Delete</th>
                    </tr>
                </thead>
                <tbody>

                    @if ($tasks->isNotEmpty())
                    @foreach ($tasks as $id=>$task)
                    <tr>
                        <td style="display: none">{{ $task->slug }}</td>
                        <td>{{ ++$id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->created_at->diffForHumans() }}</td>
                        <td><button class="btn btn-warning edit_modal">Edit</button></td>
                        <td><button class="btn btn-danger delete_modal" data-toggle="modal"
                                data-target="#delete_modal">Delete</button></td>

                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="4">
                            <h2 class="text-center p-5 ">You Don't Have Any Task Yet</h2>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('includes.add_task')
@include('includes.edit_task')
@include('includes.delete_task')
@endsection

{{-- modal section --}}

@section('js-scripts')

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('js/data_table.js') }}" defer> </script>
<script src="{{ asset('js/edit_task.js') }}" defer> </script>
@endsection
