<?php 


namespace App\Traits;

trait Audit
{
    public static function boot()
    {
      parent::boot();
      static::creating(function ($model) {
        $model->sold_by = auth()->user()->id;
      });
    }
}