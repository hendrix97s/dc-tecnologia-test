<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Sale;
use App\Repositories\SaleRepository;
use App\Services\SaleService;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(SaleRepository $repostory)
    {
      $sales = $repostory->paginate();
      return view('sale.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
      return view('sale.create');
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
      return redirect()->route('sale.show', $sale->uuid);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return Response
     */
    public function show(Sale $sale)
    {
        //
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
