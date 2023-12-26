<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableComment extends Model
{
    use HasFactory;
    protected $table='table_comment';
    protected $primaryKey='id';
    protected  $fillable=[
        'id_user','id_product','content_parent_comment','content','avatar','comment_name','score','status'
    ];
}
