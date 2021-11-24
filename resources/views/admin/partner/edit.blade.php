@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('general.modules.partner'))
@section('index_route', route('partner.index'))
@section('store_route', route('partner.update', $data))
@section('page_type', trans('general.modules.edit'))
@section('form_type', 'POST')
@section('title') @lang('general.modules.partner') @endsection

{{-- Fields --}}
@section('fields_content')
    @method('put')
    <div class="card card-custom">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">@lang('general.locales.edit')</h3>
            </div>
            <div class="card-toolbar">
            </div>
        </div>
        <div class="card-body">

            <div class="col form-group">
                @if (isset($data->logo))
                    <label>@lang('partner.logo') <span class="text-danger">*</span></label>
                    <br>
                    <img src="{{ asset($data->logo) }}" class="w-25">
                @endif
            </div>
            <div class="col form-group">
                <label>@lang('partner.logo') <span class="text-danger">*</span></label>
                <input type="file" name="logo" placeholder="@lang('partner.logo')" class="form-control" value="">
            </div>

        </div>

    </div>
    <div class="card card-custom">
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-light-success active">
                <i class="far fa-save fa-sm"></i>
                @lang('general.save')
            </button>
        </div>
    </div>
@endsection
