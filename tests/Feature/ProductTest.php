<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{

  public function setUp(): void
  {
    parent::setUp();
    $this->login();
  }

  public function test_product_index()
  {
      $response = $this->get(route('product.index'));
      $response->assertStatus(200);
  }

  public function test_product_create()
  {
      $response = $this->get(route('product.create'));
      $response->assertStatus(200);
  }

  public function test_product_store()
  {
    $payload = [
      'name' => 'Test Product',
      'description' => 'Test Product Description',
      'price' => 100,
      'quantity' => 10,
    ];
    
    $response = $this->post(route('product.store'), $payload);
    $response->assertStatus(302);
  }

  public function test_product_show()
  {
    $product = Product::factory()->create();
    $param = ['uuid' => $product->uuid];

    $response = $this->get(route('product.show', $param));
    $response->assertStatus(200);
  }

  public function test_product_edit()
  {
    $product = Product::factory()->create();
    $param = ['uuid' => $product->uuid];
    
    $response = $this->get(route('product.edit', $param));
    $response->assertStatus(200);
  }

  public function test_product_update()
  {
    $payload = [
      'name' => 'Test Product',
      'price' => 100,
      'quantity' => 10,
    ];
      
    $product = Product::factory()->create();
    $param = ['uuid' => $product->uuid];

    $response = $this->put(route('product.update', $param), $payload);
    $response->assertStatus(302);
  }

  public function test_product_destroy()
  {
    $product = Product::factory()->create();
    $param = ['uuid' => $product->uuid];
    $response = $this->delete(route('product.destroy', $param));
    $response->assertStatus(302);
  }
}
