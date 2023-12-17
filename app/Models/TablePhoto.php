<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TablePhoto extends Model
{
    use HasFactory;
    protected $table='table_photo';
    protected $primaryKey='id';
    protected  $guarded=[];
}
