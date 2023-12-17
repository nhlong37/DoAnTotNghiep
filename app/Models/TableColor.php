<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TableColor extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table='table_color';
    protected $primaryKey='id';
    protected  $guarded=[];
}
