<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MalfunctionRequestProduct extends Model
{
    use HasFactory;

    protected $table = "malfunction_requests_products";

    protected $fillable = [
        'malfunction_request_id', 'product_id',
    ];

}
