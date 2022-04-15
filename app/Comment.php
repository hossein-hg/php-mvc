<?php


namespace App;


use System\Database\ORM\Model;
use System\Database\Traits\HasSoftDelete;

class Comment extends Model
{
    protected $deletedAt = 'deleted_at';
    use HasSoftDelete;
    protected $fillable = ['comment','parent_id','status','approved','post_id','user_id'];
    protected $table = 'comments';
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function child()
    {
        return $this->hasOne('App\Comment','parent_id','id');
    }

}