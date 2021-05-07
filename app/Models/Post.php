<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{

    protected $fillable = ['title', 'content'];

    public function likes()
    {
//        return $this->hasMany('App\Models\Like');
        return $this->hasMany(Like::class);
    }
}
