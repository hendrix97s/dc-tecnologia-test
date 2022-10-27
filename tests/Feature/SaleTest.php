<?php

namespace Tests\Feature;

use App\Facades\SaleRepositoryFacade;
use App\Models\Product;
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
      'due_day' => '12',
    ];

    $response = $this->post(route('sale.store'), $payload);
    
    $response->assertStatus(302);
  }
}
