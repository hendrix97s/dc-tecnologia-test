<?php 

namespace App\Repositories;

use App\Models\Sale;

class SaleRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(Sale::class);
    }
}