@extends('admin.components.index')
{{-- Preparing page properties --}}

@section('module_name') @lang('general.modules.social') @endsection
@section('permission', 'organization')
@section('title') @lang('general.modules.social') @endsection
@section('create_route') {{route('social.create')}} @endsection


{{-- Table Content --}}
 
@section('page_content')
    <table class="table table-bordered table-checkable" id="kt_datatable">
        <thead>
        <tr>
            <th scope="col">#</th>
           
            <th scope="col">@lang('general.fields.url')</th>
            
          
            <th scope="col">@lang('general.fields.icon')</th>

            <th scope="col">@lang('general.fields.created_at')</th>
            <th scope="col">@lang('general.fields.control')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($data as $key => $value) 
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                 <td>{{ $value->url }}</td>
                <td><i  class="{{ $value->icon }}"></i></td>



               
                <td>{{ $value->created_at }}</td>

                <td>
                    @include('admin.components.table-control', ['permission' => 'organization', 'name'=>'social', 'value'=>$value])
                </td>

            </tr>
        @endforeach



        </tbody>
    </table>
    <div>
    </div>
@endsection
