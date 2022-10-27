<?php 

namespace App\Traits;

use Illuminate\Support\Str;

trait Audit
{
    protected static function bootAudit()
    {
      static::creating(function ($model) {
        $model->sold_by = auth()->user()->id;
      });
    }
}