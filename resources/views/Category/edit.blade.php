@extends('layouts/app')

@section('content')
<div class="container">
  <form class="" action="{{ route('categories.update', $category->id) }}" method="post" class="needs-validation">
    @csrf
   @METHOD('PUT')
<div class="form-group">
  <label>Title</label>
  <input class="form-control @if( $errors->has('title')) is-invalid @endif" name="title" value="{{ old('title', $category->title) }}" placeholder="Enter title">
  @if( $errors->has('title'))
  <div class="invalid-feedback">
    {{ $errors->first('title') }}
  </div>
  @endif
  <div class="float-left">
    <button type="submit" class="btn btn-success" name="button">Edit</button>
  </div>
  <a href="{{ route('categories.index') }}" class="btn btn-outline-dark">Back</a>
</div>
</form>
</div>
@endsection
