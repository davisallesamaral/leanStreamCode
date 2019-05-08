<?php

namespace leanStreamTest;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $table = 'sources';
    public $timestamps = false;
    protected $fillable = ['name'];

    public function articles(){
        return $this->hasMany('leanStreamTest\Article');
    }
}
