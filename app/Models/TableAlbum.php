<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableAlbum extends Model
{
    use HasFactory;
    protected $table='table_album';
    protected $primaryKey='id';
    protected  $guarded=[];


    public function foreignKey_products()
    {
        return $this->hasMany(related:TableProduct::class,foreignKey:'id_product',localKey:'id');
    }
}
