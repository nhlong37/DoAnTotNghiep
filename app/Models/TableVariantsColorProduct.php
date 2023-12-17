<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TableVariantsColorProduct extends Model
{
    use HasFactory;
    
    protected $table='table_variants_color_product';
    protected $primaryKey='id';
    protected  $guarded=[];
}
