<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
 
use App\Http\Requests\SettingRequest;
use Illuminate\Http\Request;
use App\Models\Setting;
 

class SettingController extends Controller
{
    public function index (){
        $setting = Setting::first();
        
        return view("admin.setting.index")->with(compact('setting'));
    }

    public function update(SettingRequest $request){
        $setting = Setting::first();
        $data =  $request->all();
        if ($request->hasFile('logo')) {
            $data['logo'] = upload_image($request->file('logo'), 'logo');
        } else {
            unset($data['logo']);
        } 
        if ($request->hasFile('logo_white')) {
            $data['logo_white'] = upload_image($request->file('logo_white'), 'logo_white');
        } else {
            unset($data['logo_white']);
        }
        $setting->fill($data)->save();
 
        return $setting ? redirect(route('setting'))->with(['success'=>trans('general.setting.setting_updated')]) : redirect()->back();
    }
}
