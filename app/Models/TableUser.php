<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TableUser extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='table_user';
    protected $primaryKey='id';
    protected  $guarded=[];
}
