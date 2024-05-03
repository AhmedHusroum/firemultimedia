<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallInvoice extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class, 'custom_invoice_products', 'custom_invoice_id')->withPivot('subtotal');
    }

    public function customer()
    {
        return $this->hasOne(User::class, "id", "customer_id");
    }

    public function finance()
    {
        return $this->hasOne(User::class, "id", "finance_id");
    }

    public function quotation()
    {
        return $this->hasOne(Quotation::class, "id", "quotation_id");
    }

    public function company()
    {
        return $this->hasOne(Company::class, "id", "company_id");
    }
}
