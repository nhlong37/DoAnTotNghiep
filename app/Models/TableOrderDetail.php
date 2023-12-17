<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableOrderDetail extends Model
{
    use HasFactory;
    protected $table='table_order_detail';
    protected $primaryKey='id';
    protected  $guarded=[];


    public function foreignKey_products()
    {
        return $this->hasMany(related:Product::class,foreignKey:'id_product',localKey:'id');
    }

    public function foreignKey_color()
    {
        return $this->hasMany(related:TableColor::class,foreignKey:'id_color',localKey:'id');
    }

    public function foreignKey_size()
    {
        return $this->hasMany(related:TableSize::class,foreignKey:'id_size',localKey:'id');
    }
}
