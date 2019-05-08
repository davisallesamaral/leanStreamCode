<?php

namespace leanStreamTest;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    protected $table = 'weathers';
    public $timestamps = false;
}
