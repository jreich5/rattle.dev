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

    public static function search($search, $per, $sort)
    {
        $order = self::siftSort($sort);
        $pagination = self::siftPer($per);

        return Post::whereHas('user', function($query) use ($search){
                $query->where('name', 'LIKE', "%$search%");
            })
            ->orWhere('title', 'LIKE', "%$search%")
            ->orWhere('content', 'LIKE', "%$search%")
            ->orderBy($order[0], $order[1])
            ->paginate($pagination);
    }

    protected static function siftSort($sort)
    {
        switch($sort) {
            case "alpha":
                return ['title', 'asc'];
                break;
            // This will be changed when votes are added
            case "votehl":
                return ['title', 'asc'];
                break;
            // This will be changed when votes are added
            case "votelh":
                return ['title', 'asc'];
                break;
            case "recent":
                return ["created_at", "desc"];
                break;
        }
    }

    protected static function siftPer($per)
    {
        switch($per) {
            case "five":
                return 5;
                break;
            case "ten":
                return 10;
                break;
            case "twenty":
                return 20;
                break;
            case "thirty":
                return 30;
                break;
        }
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'created_by');
    }
}
