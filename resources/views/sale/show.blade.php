@extends('layouts.app')

@section('content')

<!-- show sale data -->
<div class="flex items-center  justify-center  w-full p-6">
  <div class="bg-white p-12 rounded-xl w-full">
    <div class="text-2xl font-bold mb-4">Sale</div>
    <div class="flex flex-col w-full">
      <div class="flex flex-row">
        <div class="flex flex-col w-1/2 mt-4">
          <div class="flex flex-row">
            <div class="w-1/2">
              <div class="text-sm font-bold">Method Payment</div>
              <div class="text-sm">{{ $sale->method_payment }}</div>
            </div>
            <div class="w-1/2">
              <div class="text-sm font-bold">Total</div>
              <div class="text-sm">$ {{ $sale->total }}</div>
            </div>
          </div>
          <div class="flex flex-row mt-4">
            <div class="w-1/2">
              <div class="text-sm font-bold">Sold By</div>
              <div class="text-sm">{{ $sale->user_name }}</div>
            </div>
          </div>
        </div>
        <div class="flex flex-col w-1/2">
          <div class="flex flex-row">
            <div class="w-1/2">
              <div class="text-sm font-bold">Created At</div>
              <div class="text-sm">{{ $sale->created_at }}</div>
            </div>
            <div class="w-1/2">
              <div class="text-sm font-bold">Updated At</div>
              <div class="text-sm">{{ $sale->updated_at }}</div>
            </div>
          </div>
        </div>
      </div>

      <div class="flex justify-around mt-4 w-full">
        <div class="flex flex-col w-1/2">
          <div class="text-sm font-bold">Products</div>
          <table class="table-auto w-full">
            <thead>
              <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Price</th>
                <th class="px-4 py-2">Quantity</th>
                <th class="px-4 py-2">Total</th>
              </tr>
            </thead>
            <tbody id="sale-table">
              @foreach ($sale->products as $product)
                <tr>
                  <td class="border px-4 py-2">{{ $product['name'] }}</td>
                  <td class="border px-4 py-2">{{ $product['price'] }}</td>
                  <td class="border px-4 py-2">{{ $product['quantity'] }}</td>
                  <td class="border px-4 py-2">$ {{ $product['total'] }}</td>
                </tr>
              @endforeach

              <tr>
                <td class="border px-4 py-2"></td>
                <td class="border px-4 py-2"></td>
                <td class="border px-4 py-2 font-bold">Total</td>
                <td class="border px-4 py-2 font-bold">$ {{ $sale->total }}</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="flex flex-col w-1/2 ml-6">
          <div class="text-sm font-bold">Installments</div>
          <table class="table-auto w-full">
            <thead>
              <tr>
                <th class="px-4 py-2">Due Date</th>
                <th class="px-4 py-2">Paid</th>
                <th class="px-4 py-2">Paid In</th>
                <th class="px-4 py-2">Amount</th>
              </tr>
            </thead>
            <tbody id="sale-table">
              @foreach ($sale->installments as $installment)
                <tr>
                  <td class="border px-4 py-2">{{ $installment['due_date'] }}</td>
                  <td class="border px-4 py-2">{{ $installment['paid'] }}</td>
                  <td class="border px-4 py-2">{{ $installment['paid_in'] }}</td>
                  <td class="border px-4 py-2">$ {{ $installment['amount'] }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection