@extends('layouts/app')

@section('content')

<div class="container">
      <form action="{{ route('products.store') }}" method="POST" class="needs-validation">
        @csrf
        <div class="form-group">
          <label>Title</label>
          <input class="form-control @if( $errors->has('title')) is-invalid @endif" name="title" value="{{ old('title') }}" placeholder="Enter title">
          @if( $errors->has('title'))
          <div class="invalid-feedback">
            {{ $errors->first('title') }}
          </div>
          @endif
        </div>
        <div class="row">
          {{--dd($errors)--}}
          <div class="col-md-6">
            <label for="">Price</label>
            <div class="form-group">
              <input name="price" value="{{ old('price') }}" class="form-control @if( $errors->has('price')) is-invalid @endif" placeholder="0.00$">
              @if( $errors->has('price'))
              <div class="invalid-feedback">
                {{ $errors->first('price') }}
              </div>
              @endif
            </div>
          </div>
          <div class="col-md-6">
            <label for="">Quantity</label>
            <div class="form-group">
              <input name="quantity" value="{{ old('quantity') }}" class="form-control @if( $errors->has('price')) is-invalid @endif" placeholder="Quantity :">
              @if($errors->has('quantity'))
              <div class="invalid-feedback">
                {{ $errors->first('quantity') }}
              </div>
              @endif
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>Description</label>
          <textarea class="form-control @if( $errors->has('description')) is-invalid @endif" name="description" placeholder="Description">{{ old('description') }}</textarea>
          @if($errors->has('description'))
          <div class="invalid-feedback">
            {{ $errors->first('description')}}
          </div>
          @endif
        </div>
        <div class="form-group">
          <label>Category :</label>
          <select name="category" class="form-control @if( $errors->has('category')) is-invalid @endif">
            <option value="">Choose..</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" @if($category->id == old('category')) selected @endif>
              {{ $category->title }}
            </option>
            @endforeach
          </select>
        </div>
        @if( $errors->has('category'))
        <div class="invalid-feedback">
          {{ $errors->first('category')}}
        </div>
        @endif
        <div class="form-group">
          <label>Manufacturer :</label>
          <select name="manufacturer" class="form-control @if( $errors->has('manufacturer')) is-invalid @endif">
            <option value="">Choose..</option>
            @foreach($manufacturers as $manufacturer)
            <option value="{{ $manufacturer->id }}" @if($manufacturer->id == old('manufacturer')) selected @endif>
              {{ $manufacturer->title }}
            </option>
            @endforeach
          </select>
          @if( $errors->has('manufacturer'))
          <div class="invalid-feedback">
            {{ $errors->first('manufacturer')}}
          </div>
          @endif
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
      </form>
</div>
@endsection
