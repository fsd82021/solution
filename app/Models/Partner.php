<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Partner extends Model implements TranslatableContract
{
    use HasFactory,Translatable;

    protected $fillable = ['logo'];
    public $translatedAttributes = ['name'];
}
