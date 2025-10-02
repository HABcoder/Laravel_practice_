<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['category_name'];

    public $timestamps = false; 

       protected $primaryKey = 'category_id';
       

    public function sub_categroy(){
       return $this->hasMany(Sub_categories::class, 'category_id', 'category_id');
    }

    
}


