@extends('layouts.app')

@section('content')

  <div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
      @if (session('status'))
        <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
          {{ session('status') }}
        </div>
      @endif
      <div class="mb-4">
        <a href="{{ route('product.create') }}" class="bg-blue-500 text-white px-4 py-3 rounded font-medium">Create Product</a>
      </div>
      <table class="table-auto">
        <thead>
          <tr>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Price</th>
            <th class="border px-4 py-2">Description</th>
            <th class="border px-4 py-2">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
            <tr>
              <td class="border px-4 py-2">{{ $product->name }}</td>
              <td class="border px-4 py-2">{{ $product->price }}</td>
              <td class="border px-4 py-2">
                <a href="{{ route('product.show', $product->uuid) }}" class="bg-blue-500 text-white px-4 py-3 rounded font-medium">Show</a>
                <a href="{{ route('product.edit', $product->uuid) }}" class="bg-blue-500 text-white px-4 py-3 rounded font-medium">Edit</a>
                <form action="{{ route('product.destroy', $product->uuid) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-red-500 text-white px-4 py-3 rounded font-medium">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      {{ $products->links() }}
    </div>
  </div>

@endsection