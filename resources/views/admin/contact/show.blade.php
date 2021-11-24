@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('general.modules.contact'))
@section('index_route', route('contact.index'))
@section('page_type', trans('general.modules.show'))
@section('title') @lang('general.modules.contact') @endsection

@push('css')
    <style>
        p {
            border: none !important;
        }

    </style>
@endpush
{{-- Fields --}}
@section('fields_content')
    <div class="card card-custom">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">@lang('general.locales.show')</h3>
            </div>
            <div class="card-toolbar">

            </div>
        </div>
        <div class="card-body">


            <div class="col form-group">

                <label>@lang('general.fields.name') <span class="text-danger">*</span></label>
                <br>
                <p> {{ $general->name }}</p>
            </div>

            <div class="col form-group">

                <label>@lang('general.fields.email') <span class="text-danger">*</span></label>
                <br>
                <p> {{ $general->email }}</p>
            </div>
            <div class="col form-group">

                <label>@lang('general.fields.phone') <span class="text-danger">*</span></label>
                <br>
                <p> {{ $general->phone }}</p>
            </div>

            <div class="col form-group">

                <label>@lang('general.fields.message') <span class="text-danger">*</span></label>
                <br>
                <p> {{ $general->message }}</p>
            </div>


        </div>



    </div>
    </div>
@endsection
