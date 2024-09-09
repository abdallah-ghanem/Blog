@extends('layouts.app') {{-- take data or code from this file and directions --}} {{-- to make comman page because when i want change anything from html comman --}}

@section('title')Show Articles @endsection

@section('content')

    <div class="mt-5">
    <div class="text-center">


<div>
   {{--  @foreach ($post1 as $p1) --}}
    <div class="card">
        <div class="card-header">
          Post Info
        </div>
        <div class="card-body">
        <h5 class="card-title">Title:{{$post->title}}</h5>
        <p class="card-text">Description:{{$post['description']}}</p>

        </div>
      </div>


      <div class="card">
        <div class="card-header">
        Posted Created Info
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <p>Created by {{$post->user ? $post->user->name : 'Not Found'}}</p>{{-- //to get information from user from function we write it to connect between post and user --}}
            <footer class="blockquote-footer">{{$post->user ? $post->user->email :'Mot Found'}} <cite title="Source Title">Created at:{{$post['created_at']}}</cite></footer>
          </blockquote>
        </div>
      </div>
      {{-- @endforeach --}}



      @endsection
