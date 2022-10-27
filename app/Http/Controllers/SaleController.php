<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Sale;
use App\Repositories\ProductRepository;
use App\Repositories\SaleRepository;
use App\Services\SaleService;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(SaleRepository $repostory)
    {
      $sales = $repostory->all();
      return view('sale.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(ProductRepository $repostory)
    {

      $products = $repostory->all();
      return view('sale.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSaleRequest  $request
     * @return Response
     */
    public function store(StoreSaleRequest $request, SaleService $service)
    {
      $data = $request->validated();
      $sale = $service->store($data);
      return response()->json($sale);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return Response
     */
    public function show($uuid, SaleRepository $repostory)
    {
      $sale = $repostory->findByUuid($uuid);
      return view('sale.show', compact('sale'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
