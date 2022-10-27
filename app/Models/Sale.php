<?php

namespace App\Models;

use App\Traits\Audit;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory, Uuids, Audit;

    protected $fillable = [
      'method_payment',
      'paid',
      'paid_in',
    ];

    protected $appends = [
      'user_name',
      'total',
      'installments',
      'products',
    ];

    protected $hidden = [
      'id',
      'sold_by',
      'created_at',
      'updated_at',
    ];

    public function installments()
    {
      return $this->hasMany(Installment::class);
    }

    public function products()
    {
      return $this->belongsToMany(Product::class, 'products_has_sales')->withPivot('quantity','total');
    }

    public function users()
    {
      return $this->hasOne(User::class, 'id', 'sold_by');
    }

    public function getProductsAttribute()
    {
      return $this->products()->get()->map(function ($product) {
        $data = [
          'uuid' => $product->uuid,
          'name' => $product->name,
          'price' => $product->price,
          'quantity' => $product->pivot->quantity,
          'total' => $product->pivot->total,
        ];

        return $data;
      });
    }

    public function getTotalAttribute()
    {      
      return $this->products()->get()->map(function ($product) {
        return $product->pivot->total;
      })->sum();
    }

    public function getInstallmentsAttribute()
    {
      return $this->installments()->get();
    }

    public function getUserNameAttribute()
    {
      return $this->users()->first()->name;
    }
}
