<?php

namespace App\Services;


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
    $sale = Sale::create($data);
    $sale->products()->attach($data['products']);
    return $sale;
  }
}