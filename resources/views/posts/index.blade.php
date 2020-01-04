@extends('layouts.app')

@section('content')
<button type="button" class="btn">
  <a href="/posts/create" class="list-group-item list-group-item-action ">
    Create Post</a></button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Content</th>
      <th scope="col">Created at</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $index => $value)
    <tr>
      <th scope="row">{{$value['id']}}</th>
      <td>{{$value['title']}}</td>
      <td>{{$value['content']}}</td>
      <td>{{$value['created_at']}}</td>
      <td><a href="{{route('posts.show',['post' => $value['id'] ])}}" class="btn btn-info">View</a>
        <form action="{{route('posts.destroy',['post' => $value['id'] ])}}" method="post">
          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
          @method("delete")
          @csrf
        </form>
        <a href="{{route('posts.edit',['post' => $value['id'] ])}}" class="btn btn-secondary">Edit</a>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
@endsection