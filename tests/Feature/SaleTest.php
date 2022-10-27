<?php

namespace Tests\Feature;

use App\Facades\SaleRepositoryFacade;
use App\Models\Product;
use App\Services\SaleService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SaleTest extends TestCase
{
  use RefreshDatabase;

  public function setUp(): void
  {
    parent::setUp();
    $this->login();
  }

  public function test_index_sales()
  {
    $response = $this->get(route('sale.index'));
    $response->assertStatus(200);
  }

  public function test_create_sale()
  {
    $response = $this->get(route('sale.create'));
    $response->assertStatus(200);
  }

  public function test_show_sale()
  {
    $response = $this->get(route('sale.show', 1));
    $response->assertStatus(200);
  }

  public function test_store_sale()
  {

    $products = Product::factory(4)->create()->pluck('uuid')->toArray();

    foreach ($products as $product) {
      $data[] = [
        'uuid' => $product,
        'quantity' => rand(1, 3),
      ];
    }

    $payload = [
      'method_payment' => 'credit_card', 
      'products' => $data,
      'due_date' => '2022-11-10',
      'quantity_installments' => '4',
    ];

    $response = $this->post(route('sale.store'), $payload);
    $response->assertStatus(302);
  }

  public function test_when_store_sale_without_quantity_or_date_due()
  {

    $products = Product::factory(4)->create()->pluck('uuid')->toArray();

    foreach ($products as $product) {
      $data[] = [
        'uuid' => $product,
        'quantity' => rand(1, 3),
      ];
    }

    $payload = [
      'method_payment' => 'credit_card', 
      'products' => $data,
      // 'due_date' => '2022-11-10',
      // 'quantity_installments' => '4',
    ];

    $response = $this->post(route('sale.store'), $payload);
    $response->assertStatus(302);
  }

  public function test_sale_service()
  {
    $products = Product::factory(4)->create()->pluck('uuid')->toArray();

    foreach ($products as $product) {
      $data[] = [
        'uuid' => $product,
        'quantity' => rand(1, 3),
      ];
    }

    $payload = [
      'method_payment' => 'credit_card', 
      'products' => $data,
      // 'due_date' => '2022-11-10',
      // 'quantity_installments' => '4',
    ];

    $service = new SaleService();
    $sale = $service->store($payload);
    $this->assertNotNull($sale);
    $this->assertNotNull($sale->products);
    $this->assertEquals($sale->installments->count(), 0);
  }
}
