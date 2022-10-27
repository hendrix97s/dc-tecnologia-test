@extends('layouts.app')

@section('content')

<!-- Create page to show a sale -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Venda</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Produto</th>
                                <td>{{ $sale->product->name }}</td>
                            </tr>
                            <tr>
                                <th>Quantidade</th>
                                <td>{{ $sale->quantity }}</td>
                            </tr>
                            <tr>
                                <th>Preço</th>
                                <td>{{ $sale->price }}</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td>{{ $sale->total }}</td>
                            </tr>
                            <tr>
                                <th>Data</th>
                                <td>{{ $sale->created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection