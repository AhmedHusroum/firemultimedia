<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory;

    protected $table = 'work_orders';


    public function materials()
    {
        return $this->belongsToMany(Material::class, 'material_workorder', 'workorder_id', 'material_id')
            ->withPivot('material_amount');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function material_amount()
    {
        return $this->hasMany(MaterialWorkOrder::class, 'workorder_id', 'id');
    }
}
