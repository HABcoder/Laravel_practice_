<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sub_categories extends Model
{
    protected $fillable = ['sub_category_name', 'category_id'];

     protected $primaryKey = 'sub_category_id';
    public $timestamps = false;


}
