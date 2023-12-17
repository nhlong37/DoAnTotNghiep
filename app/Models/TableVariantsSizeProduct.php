<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TableVariantsSizeProduct extends Model
{
    use HasFactory;

    protected $table='table_variants_size_product';
    protected $primaryKey='id';
    protected  $guarded=[];
}
