<?php

namespace App\Services;

use App\Facades\ProductRepositoryFacade;
use App\Facades\SaleRepositoryFacade;
use App\Models\Sale;
use App\Repositories\ProductRepository;

class SaleService
{
  /**
   *
   * @param array $data
   * @return Sale
   */
  public function store(array $data)
  {
    $sale = SaleRepositoryFacade::create($data);
    $this->saleAttachProducts($sale, $data['products']);
    $this->saleAttachInstallments($sale, $data);
    return $sale->fresh();
  }

  public function saleAttachProducts(Sale &$sale, array &$products): void
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

  public function saleAttachInstallments(Sale &$sale, array &$data)
  {
    if(!$this->validateDataToInstallments($data)) return;
    $quantityInstallment = $data['quantity_installments'];
    $total = $sale->total;
    $valueInstallment = $total / $quantityInstallment;
    $dueDates = $this->getDueDates($sale, $quantityInstallment, $data['due_date'], $valueInstallment);
    return $sale->installments()->createMany($dueDates);
  }

  public function getDueDates(Sale &$sale, int $quantityInstallment, $dueDate, $valueInstallment)
  {
    $dueDates = [];
    for ($i = 0; $i < $quantityInstallment; $i++) {
      $dueDates[] = [
        'due_date' => date('Y-m-d', strtotime("$i month", strtotime($dueDate))),
        'amount' => $valueInstallment,
        'sale_id' => $sale->id,
      ];
    }

    return $dueDates;
  }

  public function validateDataToInstallments(&$data)
  {
    if($data['method_payment'] == 'credit_card') {
      if(!isset($data['quantity_installments']) || !isset($data['due_date'])) {
        return false;
      }
    }

    return true;
  }
}