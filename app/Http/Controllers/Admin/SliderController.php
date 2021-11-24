<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Slider::all();
        return view('admin.slider.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        //
        $data = $request->all();
        $images = [];
        foreach ($request->image as $gallary) {
            if ($gallary) {
                $images[] = upload_file($gallary, 'image');
            } else {
                unset($data['image']);
            }
        }
        $data['image'] = json_encode($images);
        $general = Slider::create($data);

        return $general ? redirect(getRoute('slider.index'))->with(['success' => trans('general.slider.slider_saved')]) : redirect()->back();
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

        $data = Slider::findorfail($id);

        return view('admin.slider.show', compact('data'));
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
        $data = Slider::findOrfail($id);
        return view('admin.slider.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $id)
    {
        //
        $data =  $request->all();

        $general = Slider::findOrfail($id);
        $oldImages = json_decode($general->image);
        if($request->image){
            foreach ($request->image as $gallary) {
                if ($gallary) {
                    $newImages[] = upload_file($gallary, 'image');
                } else {
                    unset($data['image']);
                }
            }
            if($oldImages){
                $allImages = array_merge($oldImages, $newImages);
                $data['image'] = json_encode($allImages);
            }else{
                $data['image'] = json_encode($newImages);
            }

        }

        $general->fill($data)->save();
        return $general ? redirect(getRoute('slider.index'))->with(['success' => trans('general.slider.slider_updated')]) : redirect()->back();
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
        $general = Slider::findOrfail($id);
        $general->translations()->delete();
        $general->delete();


        return redirect(getRoute('slider.index'))->with(['success' => trans('general.slider.slider_deleted')]);
    }
}
