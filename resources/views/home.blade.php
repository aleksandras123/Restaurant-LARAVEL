@extends('layouts/app')

@section('content')
<div class="container">
  <form class="" action="" method="post">
    <div class="row">
      <div class="col-md-8">
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle w-100" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categories
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Action</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <button type="submit" name="button" class="btn btn-outline-info w-100">Filter</button>
      </div>
    </div>
  </form>
  @auth
  <div class="row">
    <div class="col-md-12">
      <a href="{{ route('products.create') }}" class="btn btn-outline-dark btn-block">ADD NEW!</a>
    </div>
  </div>
  @else
    Not connected
  @endif
    <div class="row justify-content-center">
      @foreach($products as $product)
        <div class="col-md-4">
            @component('components/card', ['product' => $product,
                                           'admin' => FALSE])
            @endcomponent
        </div>
        @endforeach
    </div>
</div>
@endsection
