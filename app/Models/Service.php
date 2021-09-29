<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'description',
      'price',
      'slug',
      'servicecategory_id',
      'archived',
    ];

    public function servicecategory()
    {
        return $this->belongsTo(ServiceCategory::class);
    }
}
