<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    Use HasFactory;
    protected $fillable = ['title', 'author', 'desc', 'series', 'avaliable'];
}
