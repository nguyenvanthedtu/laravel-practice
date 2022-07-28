<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey ='id';
    protected $fillable = [
        'name',
    ];


    public function posts(){
        return $this->belongsToMany(
            Post::class,'category_posts','category_id','post_id'
        );
    } 
    public function latestPosts() {
        return $this->posts()->latest();
    }
}
