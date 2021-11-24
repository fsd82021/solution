<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('settings')->insert(
            [
                'logo'=>'logo',
                'logo_white'=>'logo',
                'phone'=>'01026829690',
                'email'=>'thabet@gmail.com',
                'facebook'=> 'ahmed@facebook.com' ,
                'twitter' =>  'ahmed@facebook.com',
                'linkedin' => 'ahmed@facebook.com',
                'instagram' =>  'ahmed@facebook.com',
                'website' => 'ahmed@facebook.com',
                'fax'=>'966666',
                'whatsapp'=>'01026829690',
                'client'=>'125',
                'map'=>'seetings',
                'start'=>'sadasd',
                'po_box'=>'122345'
            ]);
    }
}
