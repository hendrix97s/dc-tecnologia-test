@extends('layouts.app')

@section('content')
<div class="flex items-center  justify-center  w-full">
  <div class="flex">
    <div class="bg-white p-6 rounded-lg">
      <form action="{{ route('product.store') }}" method="POST">
        @csrf
        <div class="mb-4">
          <label for="name" class="sr-only">Name</label>
          <input type="text" name="name" id="name" placeholder="Your name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}">
          @error('name')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-4">
          <label for="price" class="sr-only">Price</label>
          <input  type="number" step="0.01"  name="price" id="price" placeholder="Your price" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('price') border-red-500 @enderror" value="{{ old('price') }}">
          @error('price')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-4">
          <label for="quantity" class="sr-only">Quantity</label>
          <input type="number" name="quantity" id="quantity" placeholder="Your quantity" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('quantity') border-red-500 @enderror" value="{{ old('quantity') }}">
          @error('quantity')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="description" class="sr-only">Description</label>
          <textarea name="description" id="description" cols="30" rows="4" placeholder="Description" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
          @error('description')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div>
          <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Create</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection