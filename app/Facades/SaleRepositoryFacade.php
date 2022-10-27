<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class SaleRepositoryFacade extends Facade
{
  protected static function getFacadeAccessor()
  {
    return 'SaleRepository';
  }
}