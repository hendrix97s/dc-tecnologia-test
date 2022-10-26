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
      'total',
      'method_payment',
      'paid',
      'paid_in',
      'quantity',
    ];

    protected $appends = [
      'installments',
      'products',
    ];

    protected $hidden = [
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
      return $this->belongsToMany(Product::class, 'products_has_sales');
    }

    public function getProductsAttribute()
    {
      return $this->products()->get();
    }

    public function getInstallmentsAttribute()
    {
      return $this->installments()->get();
    }
}
