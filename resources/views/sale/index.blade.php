@extends('layouts.app')

@section('content')
<div class="flex items-center  justify-center  w-full ">
  <!--  sales table -->
  <div class="bg-white p-12 rounded-xl w-full">
    <div class="text-2xl font-bold mb-4">Sales</div>
    <table class="table-auto w-full">
      <thead>
        <tr>
          <th class="px-4 py-2">Method Payment</th>
          <th class="px-4 py-2">Uuid</th>
          <th class="px-4 py-2">Sold By</th>
          <th class="px-4 py-2">Total</th>
        </tr>
      </thead>
      <tbody id="sale-table">
        @foreach ($sales as $sale)
          <tr>
            <td class="border px-4 py-2">{{ $sale->method_payment }}</td>
            <td class="border px-4 py-2">{{ $sale->uuid }}</td>
            <td class="border px-4 py-2">{{ $sale->user_name }}</td>
            <td class="border px-4 py-2">{{ $sale->total }}</td>
            <td class="border px-4 py-2">
            <a href="{{ route('sale.show', $sale->uuid) }}" class="ml-2"><i class="fa-solid fa-eye"></i> </a>
            </td>
          </tr>
          
        @endforeach
      </tbody>
    </table>


</div>

@endsection