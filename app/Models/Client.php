<?php

namespace App\Models;

use App\Http\Controllers\AdminAddressesController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'remarks',
        'testimonial_send',
        'loyal_id',
        'address_id',
        'source_id',
        'archived',
    ];

    public function loyal()
    {
        return $this->belongsTo(Loyal::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

}
