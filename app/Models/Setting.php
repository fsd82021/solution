<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Setting extends Model implements TranslatableContract
{
    use HasFactory,Translatable;
    protected $fillable = ['logo','logo_white', 'phone','email','facebook','twitter','linkedin','instagram','website','fax','whatsapp','client','map','start','po_box'];
    public $translatedAttributes = ['name', 'description','address','working_times','copyrights'];
}
