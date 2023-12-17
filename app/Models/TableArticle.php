<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableArticle extends Model
{
    use HasFactory;

    protected $table='table_article';
    protected $primaryKey='id';
    protected  $guarded=[];

    public function foreignKey_article_type()
    {
        return $this->hasMany(related:TableTypeArticle::class,foreignKey:'id_type',localKey:'id');
    }
}
