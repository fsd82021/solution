<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerRequest;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Sponsor::all();
        return view('admin.sponser.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sponser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartnerRequest $request)
    {
        $data =$request->all();
        if ($request->hasFile('logo')) {
            $data['logo'] = upload_image($request->file('logo'), 'logo');
        } else {
            unset($data['logo']);
        }
        $general = Sponsor::create($data);
        return $general ? redirect(getRoute('sponsers.index'))->with(['success'=>trans('general.team.team_saved')]) : redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Sponsor::findOrfail($id);
        return view('admin.sponser.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Sponsor::findOrfail($id);
        return view('admin.sponser.edit',compact('data'));
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
        $data = $request->all();
        $general = Sponsor::findOrfail($id);
        if ($request->hasFile('logo')) {
            $data['logo'] = upload_image($request->file('logo'), 'logo');
        } else {
            unset($data['logo']);
        }

        $general->fill($data)->save();
        return $general ? redirect(getRoute('sponsers.index'))->with(['success'=>trans('partner.partner_updated')]) : redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $general = Sponsor::findOrfail($id);
        $general->delete();
        return redirect(getRoute('sponsers.index'))->with(['success'=>trans('general.partner.partner_deleted')]);
    }
}
