<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;

    protected $table = 'category_post';
    protected $fillable = ['category_id', 'post_id'];
    // The fillable array -->it's called the "mass assignment"
    // because, when we are going to insert data into 'category_post' table
    // the data that insert is of type array.

    public $timestamps = false;

    /**
     *  Use this method to get the name of the category
     */
    public function category(){
        return $this->belongsTo(Category::class);
    }

    /**
     * 
     */
}
