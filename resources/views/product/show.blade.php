@extends('layouts.app')

@section('content')
 
<!-- show product -->
<div class="flex items-center  justify-center  w-full">
  <div class="flex">
    <div class="bg-white p-6 rounded-lg">
      <div class="mb-4">
        <label for="name" class="sr-only">Name</label>
        <input type="text" name="name" id="name" placeholder="Your name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ $product->name }}" disabled>
        @error('name')
          <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-4">
        <label for="price" class="sr-only">Price</label>
        <input  type="number" step="0.01"  name="price" id="price" placeholder="Your price" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('price') border-red-500 @enderror" value="{{ $product->price }}" disabled>
        @error('price')
          <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-4">
        <label for="quantity" class="sr-only">Quantity</label>
        <input type="number" name="quantity" id="quantity" placeholder="Your quantity" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('quantity') border-red-500 @enderror" value="{{ $product->quantity }}" disabled>
        @error('quantity')
          <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-4">
        <label for="description" class="sr-only">Description</label>
        <textarea name="description" id="description" cols="30" rows="4" placeholder="Description" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror" disabled>{{ $product->description }}</textarea>
        @error('description')
          <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div>
        <a href="{{ route('product.index') }}" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Back</a>
      </div>
    </div>
  </div>
</div>

@endsection