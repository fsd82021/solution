@extends('admin.components.index')
{{-- Preparing page properties --}}

@section('module_name') @lang('general.modules.statistic') @endsection
@section('permission', 'organization')
@section('title') @lang('general.modules.statistic') @endsection
@section('create_route') {{route('statistic.create')}} @endsection


{{-- Table Content --}}

@section('page_content')
    <table class="table table-bordered table-checkable" id="kt_datatable">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">@lang('general.fields.name')</th>
            <th scope="col">@lang('general.fields.counter')</th>

            <th scope="col">@lang('general.fields.icon')</th>

            <th scope="col">@lang('general.fields.created_at')</th>
            <th scope="col">@lang('general.fields.control')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($data as $key => $value)
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                 <td>{{ $value->name }}</td>
                <td>{{ $value->counter }}</td>


                <td><img style="width: 100px;height:100px" src="{{asset( $value->icon )}}"></td>




                <td>{{ $value->created_at }}</td>

                <td>
                    @include('admin.components.table-control', ['permission' => 'organization', 'name'=>'statistic', 'value'=>$value])
                </td>

            </tr>
        @endforeach



        </tbody>
    </table>
    <div>
    </div>
@endsection
