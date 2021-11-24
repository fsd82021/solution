@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('general.modules.statistic'))
@section('index_route', route('statistic.index'))
@section('store_route', route('statistic.update', $general))
@section('page_type', trans('general.modules.edit'))
@section('form_type', 'POST')
@section('title') @lang('general.modules.statistic') @endsection



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
            <div class="tab-content">
            </div>
            <div class="tab-content">
                @foreach (config('translatable.locales') as $key => $locale)
                    <div class="tab-pane fade show @if ($key == 0) active @endif" id="{{ $locale }}" role="tabpanel">
                        <div class="col form-group">
                            <label>@lang('statistic.name') (@lang('general.'.$locale))<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="{{ $locale . '[name]' }}" id="{{ $locale . '[name]' }}"
                                placeholder="@lang('statistic.name')"
                                class="form-control @error($locale . '.name') is-invalid @enderror"
                                value="{{ old($locale . '.name', $general->translate($locale)->name) }}">
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="tab-pane fade show " role="tabpanel">
                <div class="col form-group">
                    <label>@lang('general.fields.counter') <span class="text-danger">*</span></label>
                    <input type="text" name="counter" id="counter" placeholder="@lang('general.fields.counter')"
                        class="form-control" value="{{ $general->counter }}">
                </div>
                <div class="col form-group">
                    @if (isset($general->icon))
                        <label>@lang('team.image') <span class="text-danger">*</span></label>
                        <br>
                        <img src="{{ asset($general->icon) }}" class="w-25">
                    @endif
                </div>
                <div class="col form-group">
                    <label>@lang('team.image') <span class="text-danger">*</span></label>
                    <input type="file" name="image" placeholder="@lang('team.image')" class="form-control" value="">
                </div>
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
