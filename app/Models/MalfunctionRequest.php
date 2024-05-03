<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MalfunctionRequest extends Model
{
    use HasFactory;

    protected $table = "malfunction_requests";

    protected $fillable = ['title', 'description', 'comments', 'product_id', 'customer_id','company_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'malfunction_requests_products');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
