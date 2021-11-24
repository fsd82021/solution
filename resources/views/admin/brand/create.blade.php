@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('general.aside.brands'))
@section('index_route', route('brands.index'))
@section('store_route', route('brands.store'))
@section('page_type', trans('general.locales.add_new'))
@section('form_type', 'POST')
@section('title') @lang('general.aside.brands') @endsection

{{-- Fields --}}
@section('fields_content')
    <div class="card card-custom">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">@lang('general.locales.add_new')</h3>
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
                            <label>@lang('brands.name') (@lang('general.'.$locale))<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="{{ $locale . '[name]' }}" id="{{ $locale . '[name]' }}"
                                placeholder="@lang('brands.name')"
                                class="form-control @error($locale . '.name') is-invalid @enderror"
                                value="{{ old($locale . '.name') }}">
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col form-group">
                <label>@lang('brands.image')</label>
                <input type="file" name="image" placeholder="@lang('brands.image')" class="form-control">
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
