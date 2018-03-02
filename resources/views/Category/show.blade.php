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
                <th scope="col">Title</th>
                <th scope="col" style="text-align:center;">+</th>
                <th scope="col" style="text-align:center;">x</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $category->title }}</td>
                <td style="text-align:center;"><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-outline-success btn-block">Edit</a></td>
                <td>
                  <form class="" action="{{ route('categories.destroy', $category->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-block" name="button">Delete</button>
                  </form>
                </td>
              </tr>
            </tbody>
            </table>
                </div>
                <div class="float-right">
                  <a href="{{ route('categories.index') }}" class="btn btn-outline-dark">Back</a>
                </div>

            </div>
@endsection
