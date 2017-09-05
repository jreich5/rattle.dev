<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends BaseModel
{ 
    protected $table = 'posts';
    protected $guarded = [];
    public static $rules = [
        'title' => 'required|max:100',
        'url' => 'required|url',
        'content' => 'required|unique:posts,content'
    ];

    // // Accessor
    // public function getTitleAttribute($value)
    // {
    //     return "Super Mega " . strtoupper($value);
    // }

    // // Mutator
    // public function setTitleAttribute($value)
    // {
    //     $this->attributes['title'] = strtolower($value);
    // }

    public function search($query, $search)
    {
        return $query->where('title', 'LIKE', '%search%');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'created_by');
    }
}
