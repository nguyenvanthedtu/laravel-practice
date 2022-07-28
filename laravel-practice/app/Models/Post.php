<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $primaryKey ='id';
    protected $fillable = [
        'user_id',
        'title',
        'image',
        'content',
    ];


    public function categories(){
        return $this->belongsToMany(
            Category::class,'category_posts','post_id','category_id'
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function latestComments() {
        return $this->comments()->latest();
    }
}
