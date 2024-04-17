<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spending extends Model
{
    protected $fillable = ['title', 'date', 'amount'];
}
