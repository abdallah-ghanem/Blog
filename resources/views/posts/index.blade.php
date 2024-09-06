@extends('layouts.app') {{-- take data or code from this file and directions --}} {{-- to make comman page because when i want change anything from html comman --}}

@section('title')Main @endsection

@section('content')
    <div class="mt-5">
    <div class="text-center">
<a href="{{ route('posts.create') }}" type="button" class="btn btn-primary btn-lg">Creat Post</a>
{{-- @dd($posts) for test that read the array--}}
<div>
    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted by</th>
            <th scope="col">Created at</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($posts as $p){{-- p hier is a variable i made it to store data from postes --}}
            <tr>
                <td>{{$p['id']}}</td>
                <td>{{$p['Title']}}</td>
                <td>{{$p['Posted by']}}</td>
                <td>{{$p['Created at']}}</td>
                <td>
                    <a href="{{ route('posts.show', $p['id']) }}"  class="btn btn-primary">View</a>
                    <a href="{{ route('posts.edit', $p['id']) }}"  class="btn btn-secondary">Edit</a>
                    <a href="#"  class="btn btn-success">Delete</a>
                </td>
            </tr>
            @endforeach



        </tbody>
    </table>

    @endsection
