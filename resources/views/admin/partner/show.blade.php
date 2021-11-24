@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('general.modules.partner'))
@section('index_route', route('partner.index'))
@section('page_type', trans('general.modules.show'))
@section('title') @lang('general.modules.partner') @endsection

@push('css')
<style>
 p
 {
     border:none !important;
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
                @if (isset($data->logo))
                    <label>@lang('partner.logo') <span class="text-danger">*</span></label>
                    <br>
                    <img src="{{ asset($data->logo) }}" class="w-25">
                @endif
            </div>
        </div>



    </div>
    </div>
@endsection
