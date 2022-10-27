<?php

namespace Tests\Feature;

use App\Facades\SaleRepositoryFacade;
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
    $response = $this->post(route('sale.store'), [
      'product_id' => 1,
      'quantity' => 1,
      'price' => 1,
      'total' => 1,
    ]);
    
    $response->assertStatus(302);
  }
}
