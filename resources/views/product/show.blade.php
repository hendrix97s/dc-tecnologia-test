@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3>Product</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->price }}</td>
                      <td>{{ $product->quantity }}</td>
                      <td>
                        <a href="{{ route('product.show', ['uuid' => $product->uuid]) }}" class="btn btn-primary">Show</a>
                        <a href="{{ route('product.edit', ['uuid' => $product->uuid]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('product.destroy', ['uuid' => $product->uuid]) }}" method="POST" style="display: inline-block;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection