@extends('layouts.app')
{{-- page title section --}}

@section('page-title')
Task Details
@endsection

{{-- page title section end --}}
{{-- custom css files --}}
@section('css-scripts')
<link rel="stylesheet" href="{{ asset('css/login-page.css') }}">
@endsection
{{-- custom css files ends --}}
{{-- main content section starts here --}}

@section('content')
<div class="container ">
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
    <div class="container card pt-1 pb-5 px-5">
        <div class="row text-center">

            <table class="table table-bordered table-hover" id="">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th> Created At </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td>{{ $task->task_slug }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->created_at->diffForHumans() }}</td>
                        <td><button class="btn btn-outline-info"></button></td>
                        {{-- <td><a href="delete/user/{{ $user->user_id }}" class="btn btn-warning">delete</a></td> --}}
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

{{-- modal section --}}

@section('js-scripts')

@endsection
