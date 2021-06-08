<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{

    protected $fillable = ['title', 'content'];

    public function likes()
    {
        //return $this->hasMany('App\Models\Like');
        return $this->hasMany(Like::class);
    }

    public function tags()
    {
        //return $this->belongsToMany('App\Models\Tag','post_tag','post_id','tag_id');
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtolower($value);
    }

    public function getTitleAttribute($value)
    {
        return ucwords($value);
    }
}
