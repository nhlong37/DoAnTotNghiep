<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableVariantsPCS extends Model
{
    use HasFactory;
    protected $table='table_variants_pcs';
    protected $primaryKey='id';
    protected  $guarded=[];

    public function foreignKey_products()
    {
        return $this->hasMany(related:TableProduct::class,foreignKey:'id_product',localKey:'id');
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
