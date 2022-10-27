<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(ProductRepository $repository)
    {
      $products = $repository->paginate();
      return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
      return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  StoreProductRequest  $request
     * @param  ProductRepository $repository
     * @return Response
     */
    public function store(StoreProductRequest $request, ProductRepository $repository)
    {
      $data = $request->validated();
      $repository->create($data);
      return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     * 
     * @param Request $request
     * @param  ProductRepository $repository
     * @return Response
     */
    public function show(Request $request, ProductRepository $repository)
    {
      $product = $repository->findByUuid($request->uuid);
      return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ProductRepository $repository
     * @return Response
     */
    public function edit(Request $request, ProductRepository $repository)
    {
      $product = $repository->findByUuid($request->uuid);
      return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProductRequest $request
     * @param  ProductRepository $repository
     * @return Response
     */
    public function update(UpdateProductRequest $request, ProductRepository $repository)
    {
      $data = $request->validated();
      $repository->updateByUuid($request->uuid, $data);
      return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ProductRepository $repository
     * @return Response
     */
    public function destroy(Request $request, ProductRepository $repository)
    {
      $repository->deleteByUuid($request->uuid);
      return redirect()->route('product.index');
    }
}
