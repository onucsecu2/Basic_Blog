<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{   
    public $timestamps = true;
    protected $table = 'comments' ;
    protected $guarded = ['id'];

    public function status()
    {
        return $this->hasOne(Status::class);
    }
        //
}
