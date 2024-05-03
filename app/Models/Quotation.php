<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'companyname',
        'street',
        'number',
        'postalcode',
        'city',
        'phonenumber',
        'email',
        'created_at',
        'amount'
    ];

    public function customer()
    {
        return $this->hasOne(User::class, "id", "customer_id");
    }


    public function product()
    {
        return $this->belongsTo(Product::class, "products_id");
    }

    // Quotation.php model
    //public $timestamps = true;
}
