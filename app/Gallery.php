<?php


namespace App;


use System\Database\ORM\Model;

class Gallery extends Model
{
    protected $table = 'galleries';
    protected $fillable = ['image','advertise_id'];

    public function advertise()
    {
        return $this->belongsTo('App\Ads','advertise_id','id');
    }
}