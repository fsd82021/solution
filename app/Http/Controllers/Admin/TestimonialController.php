<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Testimonial::all();
        return view('admin.testimonial.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialRequest $request)
    {
        //
           $data =  $request->all();
            
        if ($request->hasFile('image')) {
            $data['image'] = upload_image($request->file('image'), 'image');
        } else {
            unset($data['image']);
        }
        $general = Testimonial::create($data);
        return $general ? redirect(getRoute('testimonial.index'))->with(['success'=>trans('general.testimonial.testimonial_saved')]) : redirect()->back();
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
        $general = Testimonial::findOrfail($id);
        return view('admin.testimonial.show',compact('general'));
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
        $general = Testimonial::findOrfail($id);
        return view('admin.testimonial.edit',compact('general'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialRequest $request, $id)
    {
        //
        $data = $request->all();
        $general = Testimonial::findorfail($id);
        if ($request->hasFile('image')) {
            $data['image'] = upload_image($request->file('image'), 'image');
        } else {
            unset($data['image']);
        }
        $general->fill($data)->save();
        return $general ? redirect(route('testimonial.index'))->with(['success'=>trans('general.testimonial.testimonial_updated')]) : redirect()->back();
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
     
        $general = Testimonial::findorfail($id);
        $general->translations()->delete();
        $general->delete();
         
        return redirect(route('testimonial.index'))->with(['success'=>trans('general.testimonial.testimonial_deleted')]); 

    }
}
