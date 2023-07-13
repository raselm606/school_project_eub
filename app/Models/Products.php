<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = [];

    //relationship. connecting to other table
    public function category(){
        return $this->belongsTo(Categories::class, 'cate_id','id');
    }
}
