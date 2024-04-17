<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $fillable = ['title', 'amount', 'date', 'rest_amount', 'day_amount'];
}
