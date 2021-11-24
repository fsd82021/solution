<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StatisticRequest;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Statistic::all();
        return view('admin.statistic.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.statistic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatisticRequest $request)
    {

         $data =  $request->all();

         if ($request->hasFile('image')) {
            $data['icon'] = upload_image($request->file('image'), 'image');
        } else {
            unset($data['icon']);
        }
         $general = Statistic::create($data);


        return $general ? redirect(route('statistic.index'))->with(['success'=>trans('general.statistic.statistic_saved')]) : redirect()->back();
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
        $general = Statistic::findOrfail($id);
        return view('admin.statistic.show',compact('general'));
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
        $general = Statistic::findOrfail($id);
        return view('admin.statistic.edit',compact('general'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StatisticRequest $request, $id)
    {
        //
        $data = $request->all();
        $general = Statistic::findorfail($id);

        if ($request->hasFile('image')) {
            $data['icon'] = upload_image($request->file('image'), 'image');
        } else {
            unset($data['icon']);
        }

        $general->fill($data)->save();
        return $general ? redirect(route('statistic.index'))->with(['success'=>trans('general.statistic.statistic_updated')]) : redirect()->back();
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

        $general = Statistic::findorfail($id);
        $general->translations()->delete();
        $general->delete();

        return redirect(route('statistic.index'))->with(['success'=>trans('general.statistic.statistic_deleted')]);

    }
}
