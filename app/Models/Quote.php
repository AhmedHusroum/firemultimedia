<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_firstName',
        'customer_lastName',
        'customer_company',
        'customer_phoneNumber',
        'customer_zipCode',
    ];
}
