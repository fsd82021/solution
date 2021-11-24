<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Brand::all();
        return view('admin.brand.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $data =$request->all();
        if ($request->hasFile('image')) {
            $data['logo'] = upload_image($request->file('image'), 'image');
        } else {
            unset($data['logo']);
        }
        $general = Brand::create($data);
        return $general ? redirect(getRoute('brands.index'))->with(['success'=>trans('general.team.team_saved')]) : redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Brand::findOrfail($id);
        return view('admin.brand.show',compact('data'));    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Brand::findOrfail($id);
        return view('admin.brand.edit',compact('data'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $id)
    {
        $data = $request->all();
        $general = Brand::findOrfail($id);
        if ($request->hasFile('image')) {
            $data['logo'] = upload_image($request->file('image'), 'image');
        } else {
            unset($data['logo']);
        }
        $general->fill($data)->save();
        return $general ? redirect(getRoute('brands.index'))->with(['success'=>trans('partner.partner_updated')]) : redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $general = Brand::findOrfail($id);
        $general->translations()->delete();
        $general->delete();
        return redirect(getRoute('brands.index'))->with(['success'=>trans('general.partner.partner_deleted')]);
    }
}
