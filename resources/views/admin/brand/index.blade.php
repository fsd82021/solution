@extends('admin.components.index')
{{-- Preparing page properties --}}

@section('module_name') @lang('general.aside.brands') @endsection
@section('permission', 'organization')
@section('title') @lang('general.aside.brands') @endsection
@section('create_route') {{ route('brands.create') }} @endsection


{{-- Table Content --}}
@section('page_content')
    <table class="table table-bordered table-checkable" id="kt_datatable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('general.fields.name')</th>
                <th scope="col">@lang('general.fields.image')</th>
                <th scope="col">@lang('general.fields.created_at')</th>
                <th scope="col">@lang('general.fields.control')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $value)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $value->name }}</td>
                    <td><img src="{{ asset($value->logo) }}" style="width:140px;"></td>
                    <td>{{ $value->created_at }}</td>
                    <td>
                        @include('admin.components.table-control', ['permission' => 'organization', 'name'=>'brands',
                        'value'=>$value])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
    </div>
@endsection
