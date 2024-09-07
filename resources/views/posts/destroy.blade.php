 @extends('layouts.app') {{-- take data or code from this file and directions --}} {{-- to make comman page because when i want change anything from html comman --}}

@section('title')Show New Articles @endsection

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
        <h5 class="card-title">Title:{{$post['Title']}}</h5>
        <p class="card-text">Description:{{$post['Description']}}</p>

        </div>
      </div>


      <div class="card">
        <div class="card-header">
        Posted Created Info
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <p>Created by {{$post['Posted by']}}</p>
            <footer class="blockquote-footer">Email:abdallah21basemen@gmail.com <cite title="Source Title">Created at:{{$post['Created at']}}</cite></footer>
          </blockquote>
        </div>
      </div>
      {{-- @endforeach --}}





 <script>
    // Paste the JavaScript code here

 const deletePostButtons = document.querySelectorAll('.delete-post-btn');

 deletePostButtons.forEach(button => {
   button.addEventListener('click', event => {
     event.preventDefault(); // Prevent default link behavior

     const postId = button.getAttribute('data-post-id');

     if (confirm('Are you sure you want to delete this post?')) {
       // Send a DELETE request to the server to delete the post
       fetch(`/posts/${postId}`, {
         method: 'DELETE'
       })
       .then(response => {
         if (response.ok) {
           // Post deleted successfully, update the UI (e.g., remove the post from the list)
           button.parentElement.remove();
         } else {
           // Handle error (e.g., display an error message)
           console.error('Error deleting post:', response.statusText);
         }
       })
       .catch(error => {
         // Handle network errors
         console.error('Network error:', error);
       });
     }
   });
 });
</script>




    @endsection










