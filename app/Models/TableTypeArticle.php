<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableTypeArticle extends Model
{
    use HasFactory;
    protected $table='table_article_type';
    protected $primaryKey='id';
    protected  $guarded=[];
}
