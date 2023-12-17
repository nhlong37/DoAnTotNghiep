<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TableSize extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table='table_size';
    protected $primaryKey='id';
    protected  $guarded=[];
}
