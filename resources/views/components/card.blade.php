          <div class="card" style="width: 20rem;">
                <img class="card-img-top" src="https://loremflickr.com/320/240?lock=1" alt="Card image cap">
                <div class="card-block">
                  <h4 class="card-title">{{ $product->title }}</h4>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Price : <span class="badge badge-success">{{ $product->price }}</span></li>
                      <li class="list-group-item">Quantity : <span class="badge badge-secondary">{{ $product->quantity }}</span></li>
                      @if(isset($product->categories))
                      <li class="list-group-item">Category : <span class="badge badge-primary">{{ $product->categories->title }}</span></li>
                      @endif
                      <li class="list-group-item">Manufacturer : <span class="badge badge-danger">{{ $product->manufacturers->title }}</span></li>
                      <li class="list-group-item">Description : <p class="card-text">{{ str_limit($product->description, 100)}}</p></li>
                   </ul>
                   <div class="row">
                     <div class="col-12">
                       @if($admin == FALSE)
                       <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-info btn-block">Read more</a>
                       @else
                       <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-success btn-block">Edit</a>
                       <form class="" action="{{ route('products.destroy', $product->id) }}" method="post">
                         @csrf
                         @method('DELETE')
                         <button type="submit" class="btn btn-outline-danger btn-block" name="button">Delete</button>
                       </form>
                       @endif
                     </div>
                   </div>
                </div>
            </div>
