<?php

namespace App\Services;


class SaleService
{
  public function attachProduct($sale, $product)
  {
    
    $sale->products()->attach($product);
  }
}