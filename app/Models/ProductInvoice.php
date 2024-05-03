<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInvoice extends Model
{
    use HasFactory;

    protected $table = "custom_invoice_products";

    public function custom_invoice()
    {
        return $this->hasMany(Invoice::class);
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
