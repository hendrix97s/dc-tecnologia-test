<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ProductRepositoryFacade extends Facade
{
  protected static function getFacadeAccessor()
  {
    return 'ProductRepository';
  }
}