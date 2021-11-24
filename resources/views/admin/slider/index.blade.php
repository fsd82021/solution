@extends('admin.components.index')
{{-- Preparing page properties --}}
@section('module_name') @lang('slider.slider') @endsection
@section('permission', 'organization')
@section('title') @lang('slider.slider') @endsection
@section('create_route') {{ route('slider.create') }} @endsection

{{-- Table Content --}}
@section('page_content')
    <table class="table table-bordered table-checkable" id="kt_datatable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('slider.name')</th>
                <th scope="col">@lang('slider.desc')</th>
                <th scope="col">@lang('slider.created_at')</th>
                <th scope="col">@lang('slider.control')</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($data as $key => $value)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $value->name }}</td>
                    <td>{!! $value->description !!}</td>
                    <td>{{ $value->created_at }}</td>

                    <td>
                        @include('admin.components.table-control', ['permission' => 'organization', 'name'=>'slider',
                        'value'=>$value])
                    </td>

                </tr>
            @endforeach



        </tbody>
    </table>
    <div>
        {{-- {{ $data->links('vendor.pagination.custom') }} --}}
    </div>
@endsection
