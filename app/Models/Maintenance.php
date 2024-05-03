<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $table = "maintenance_appointments";

    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'remark',
        'company_id',
        'date_added',
        'product_category_id',
        'maintenance_type',
        'assigned',
    ];

    public function product_category()
    {
        return $this->belongsTo(Category::class, 'product_category_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function ticket()
    {
        return $this->belongsTo(User::class, 'assigned');
    }
}
