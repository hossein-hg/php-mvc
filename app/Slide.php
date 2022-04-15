<?php


namespace App;


use System\Database\ORM\Model;
use System\Database\Traits\HasSoftDelete;

class Slide extends Model
{
    protected $table = 'slides';
    protected $deletedAt = 'deleted_at';
    use HasSoftDelete;
    protected $fillable = ['title','url','address','amount','body','image'];
}