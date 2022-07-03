@extends('layouts.app')

@section('content')
<?php

use Illuminate\Support\Facades\Auth;

if (Auth::check()) :
?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Notes</h1>
                    <div class="float-end">
                        <a href="{{ route('notes.add') }}" class="btn btn-sm btn-success">Create</a>
                    </div>
                </div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Updated at</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notes as $note)
                        <tr>
                            <th scope="row">{{ $note->id }}</th>
                            <td>{{ $note->title }}</td>
                            <td>{{ $note->created_at }}</td>
                            <td>{{ $note->updated_at }}</td>
                            <td>
                                <a class="btn btn-sm btn-secondary" href="{{ route('notes.note', ['id' => $note->id]) }}">View</a>
                                <a class="btn btn-sm btn-primary" href="{{ route('notes.edit', ['id' => $note->id]) }}">Edit</a>
                                <a class="btn btn-sm btn-danger" href="{{ route('notes.delete', ['id' => $note->id]) }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $notes->links() }}
            </div>
        </div>
    </div>
<?php
else :
?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="d-flex mb-2 text-center">
                <div class="alert alert-danger">
                    <strong>Error!</strong>
                    You're not using an account! Please login or register.
                </div>
            </div>
        </div>
    </div>
<?php
endif;
?>
@endsection