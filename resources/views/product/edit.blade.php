@extends('layouts.app')

@section('content')
<div class="flex items-center  justify-center  w-full">
  <div class="flex">
  <div class="bg-white p-6 rounded-lg">
    <form action="{{ route('product.update', $product->uuid) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-4">
        <label for="name" class="sr-only">Name</label>
        <input type="text" name="name" id="name" placeholder="Your name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ $product->name }}">
        @error('name')
          <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-4">
        <label for="price" class="sr-only">Price</label>
        <input type="number" name="price" id="price" placeholder="Your price" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('price') border-red-500 @enderror" value="{{ $product->price }}">
        @error('price')
          <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-4">
        <label for="quantity" class="sr-only">Quantity</label>
        <input type="number" name="quantity" id="quantity" placeholder="Your quantity" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('quantity') border-red-500 @enderror" value="{{ $product->quantity }}">
        @error('quantity')
          <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Update</button>
      </div>
    </form>
  </div>
</div>
</div>
@endsection