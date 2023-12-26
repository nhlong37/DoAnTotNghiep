<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableRating extends Model
{
    use HasFactory;

    protected $table='table_rating';
    protected $primaryKey='id';
    protected  $fillable=[
        'id_product','rating'
    ];
}
