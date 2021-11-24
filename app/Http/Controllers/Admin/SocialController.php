<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialRequest;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Social::all();

        return view('admin.social.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.social.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SocialRequest $request)
    {
        //
       
        
           for($i = 0; $i < count($request->url); $i++)
           {
             
            $data = new Social;
          
            $data->url  = str_replace('"','',json_encode($request->url[$i]));
            $data->icon  = str_replace('"','',json_encode($request->icon[$i]));
            $data->save();
        }
        return  redirect(route('social.index'))->with(['success'=>trans('general.social.social_saved')]);
           
      
     
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       $general = Social::findorfail($id);
      
        return view('admin.social.show',compact('general'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $general = Social::findorfail($id);


        
       
        return view('admin.social.edit',compact('general'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SocialRequest $request, $id)
    {
        //
       
         $data = $request->all();
          $general = Social::findorfail($id);
        

          $general->fill($data)->save();
         
        return  redirect(route('social.index'))->with(['success'=>trans('general.social.social_saved')]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       $general = Social::findorfail($id);

       $general->delete();
       return  redirect(route('social.index'))->with(['success'=>trans('general.social.social_deleted')]);

    }
}
