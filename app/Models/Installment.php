<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory, Uuids;
    
    protected $fillable = [
      'sale_id',
      'amount',
      'paid',
      'paid_in',
      'due_date',
    ];

    protected $hidden = [
      'id',
      'sale_id',
      'created_at',
      'updated_at',
    ];
}
