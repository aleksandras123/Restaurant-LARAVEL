@extends('layouts/app')

@section('content')
<div class="container">
  <div class="card-block">
    <div class="row">
      <div class="col-12">
        @component('components/card', ['product' => $product,
                                       'admin' => TRUE])
        @endcomponent
      </div>
    </div>
  </div>

</div>
@endsection
