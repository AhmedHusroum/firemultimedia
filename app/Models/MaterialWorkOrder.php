<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialWorkOrder extends Model
{
    use HasFactory;

    protected $table = 'material_workorder';

    protected $fillable = [
        'material_id', 'material_amount', 'workorder_id',
    ];

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id', 'id');
    }

    public function workOrder()
    {
        return $this->belongsTo(WorkOrder::class, 'workorder_id', 'id');
    }
}
