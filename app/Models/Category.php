<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory; // it is  used for factory data and seeding data into Database.


    protected $guarded = [];

    public function product(){

        return $this->hasMany(Product::class);
    }
}
