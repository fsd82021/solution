<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class SettingTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description','address','working_times','copyrights'];
}
