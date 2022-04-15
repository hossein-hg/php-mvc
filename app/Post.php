<?php

namespace App;

use System\Database\ORM\Model;
use System\Database\Traits\HasSoftDelete;

class Post extends Model
{
    use HasSoftDelete;
    protected $deletedAt = 'deleted_at';
    protected $table = "posts";
    protected $fillable = ['title', 'body','image','user_id','published_at','status', 'cat_id'];
    protected $casts = ['image'=>'array'];

    public function category(){
        return $this->belongsTo('\App\Category', 'cat_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('\App\User','user_id','id');
    }


}