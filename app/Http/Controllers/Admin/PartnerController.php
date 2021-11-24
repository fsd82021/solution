<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerRequest;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Partner::all();
        return view('admin.partner.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.partner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartnerRequest $request)
    {
        //
        $data =$request->all();
        if ($request->hasFile('logo')) {
            $data['logo'] = upload_image($request->file('logo'), 'logo');
        } else {
            unset($data['logo']);
        }
        $general = Partner::create($data);
        return $general ? redirect(getRoute('partner.index'))->with(['success'=>trans('general.team.team_saved')]) : redirect()->back();
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
        $data = Partner::findOrfail($id);
        return view('admin.partner.show',compact('data'));
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
        $data = Partner::findOrfail($id);
        return view('admin.partner.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PartnerRequest $request, $id)
    {
        //
        $data = $request->all();
        $general = Partner::findOrfail($id);
        if ($request->hasFile('logo')) {
            $data['logo'] = upload_image($request->file('logo'), 'logo');
        } else {
            unset($data['logo']);
        }

        $general->fill($data)->save();
        return $general ? redirect(getRoute('partner.index'))->with(['success'=>trans('partner.partner_updated')]) : redirect()->back();

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
        $general = Partner::findOrfail($id);

        $general->translations()->delete();
        $general->delete();
        return redirect(getRoute('partner.index'))->with(['success'=>trans('general.partner.partner_deleted')]);
    }
}
