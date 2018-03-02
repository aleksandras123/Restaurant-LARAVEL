@extends('layouts/app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="{{ route('categories.create') }}" class="btn btn-outline-dark btn-block">ADD NEW!</a>
    </div>
  </div>
    <div class="row justify-content-center">
          {{-- $category->title --}}
          <table class="table table-hover table-dark">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
              </tr>
            </thead>
            @foreach($categories as $category)
            <tbody style="border-color:black;">
              <tr>
                <th scope="row">{{ $category->id }}</th>
                <td><a href="{{ route('categories.show', $category->id) }}">{{ $category->title }}</a></td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
              </tr>
            </tbody>
            @endforeach
            </table>

                </div>
            </div>
@endsection
