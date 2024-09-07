@extends('layouts.app') {{-- take data or code from this file and directions --}} {{-- to make comman page because when i want change anything from html comman --}}

@section('title')Create @endsection
@section('content')

<form method="POST" action="{{route('posts.store')}}">
    @csrf {{-- this protect from varnalbility and make secure so any form must contain csrf --}}
<div class="container mt-5">
    <div
 class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">

            <h3>Title</h3>
          </div>
          <div class="card-body">
            <textarea class="form-control" name="title" id="textInput" rows="1" style="border-width: 1px;"></textarea>
          </div>
          <div class="card-footer">
            {{-- <button class="btn btn-primary" onclick="displayText()">CREATE</button> --}}
          </div>
        </div>
      </div>
    </div>
  </div>



<div class="container mt-5">
    <div
 class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">
            <h3>Description</h3>
          </div>
          <div class="card-body">
            <textarea class="form-control" name="description" id="textInput" rows="5"></textarea>
          </div>
          </div>
          <div class="card-footer">
            {{-- <button class="btn btn-primary" onclick="displayText()">CREATE</button> --}}

        </div>
        </div>
      </div>
    </div>
  </div>



<div class="container mt-3">
    <div
 class="row justify-content-center">
      <div class="col-md-4">
        <h6>Post Creator</h6>
        <select class="form-select" name="creator_id" aria-label="Default select example">
            <option selected>Open to select</option>
            @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach



        </select>
        <button type="submit" class="btn btn-success mt-4">Submit</button>
      </div>
    </div>
</form>
  </div>


@endsection
