<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    public $timestamps = true;
    protected $table = 'statuses' ;
    protected $guarded = ['id'];
    
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
