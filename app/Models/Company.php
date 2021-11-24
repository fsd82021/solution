<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Company extends Model implements TranslatableContract
{
    use HasFactory,Translatable;

    protected $fillable = ['logo', 'type','main_image','certificate','time'];
    public $translatedAttributes = ['name', 'description'];




}
