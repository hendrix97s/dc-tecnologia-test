<?php

namespace App\Services;

use App\Facades\ProductRepositoryFacade;
use App\Facades\SaleRepositoryFacade;
use App\Repositories\ProductRepository;

class SaleService
{
  /**
   * Undocumented function
   *
   * @param [type] $data
   * @return Sale
   */
  public function store($data)
  {
    $sale = SaleRepositoryFacade::create($data);
    $this->saleAttachProducts($sale, $data['products']);
   dd($sale->fresh()->toArray());

    // $sale = Sale::create($data);
    // $sale->products()->attach($data['products']);
    // return $sale;
  }

  public function saleAttachProducts($sale, $products)
  {
    
    foreach ($products as $value) {
      $product = ProductRepositoryFacade::findByUuid($value['uuid']);
      $total = $product->price * $value['quantity'];
      
      $data = [
        'quantity' => $value['quantity'],
        'total' => $total,
      ];

      $sale->products()->attach($product, $data);
    }
    
  }


}