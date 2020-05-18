<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
     protected $fillable = ['naziv', 'kolicina', 'cena', 'konobarid', 'racunid', 'stoid'];
}
