<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Page::all();
        return view('admin.page.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        //
           $data =  $request->all();
          
          $images = [];
           foreach ($request->image as $gallary) {
               # code...
             
             if ($gallary) {
                $images[] =upload_file($gallary, 'image');
            } else {
                unset($data['image']);
            }
           }
          $data['image']=json_encode($images);
        
         $general = Page::create($data);

         
        return $general ? redirect(getRoute('page.index'))->with(['success'=>trans('general.page.page_saved')]) : redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //\
        $general = Page::findOrfail($id);
        return view('admin.page.show',compact('general'));
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
        $general = Page::findOrfail($id);
        return view('admin.page.edit',compact('general'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, $id)
    {
        //
        $data = $request->all();
        $general = Page::findorfail($id);
   
        $oldImages = json_decode($general->image);
         
        
           foreach ($request->image as $gallary) {
               # code...
             
             if ($gallary) {
                $newImages[] =upload_file($gallary, 'image');
            } else {
                unset($data['image']);
            }
           }
           $allImages = array_merge($oldImages,$newImages);
         
           $data['image']=json_encode($allImages);

     
        $general->fill($data)->save();
        return $general ? redirect(route('page.index'))->with(['success'=>trans('general.page.page_updated')]) : redirect()->back();
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
     
        $general = Page::findorfail($id);
        $general->translations()->delete();
        $general->delete();
         
        return redirect(route('page.index'))->with(['success'=>trans('general.page.page_deleted')]); 

    }
}
