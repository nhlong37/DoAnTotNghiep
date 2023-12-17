<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableRole extends Model
{
    use HasFactory;
    protected $table='table_role';
    protected $primaryKey='id';
    protected  $guarded=[];
}
