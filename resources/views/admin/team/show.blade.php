@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('general.aside.options'))
@section('index_route', route('team.index'))
@section('page_type', trans('general.modules.show'))
@section('title') @lang('general.aside.options') @endsection

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
            <div class="tab-content">

                @foreach (config('translatable.locales') as $key => $locale)
                    <div class="tab-pane fade show @if ($key == 0) active @endif" id="{{ $locale }}" role="tabpanel">
                        <div class="col form-group">
                            <label>@lang('team.name')<span class="text-danger">*</span></label>

                            <p>{{ $data->translate($locale)->name }}</p>
                        </div>

                        <div class="col form-group">
                            <label>@lang('team.title')<span class="text-danger">*</span></label>

                            <p>{{ strip_tags($data->translate($locale)->title) }}</p>
                        </div>

                    </div>
                @endforeach
            </div>

            <div class="col form-group">
                @if (isset($data->image))
                    <label>@lang('team.image') <span class="text-danger">*</span></label>
                    <br>
                    <img src="{{ asset($data->image) }}" class="w-25">
                @endif
            </div>
        </div>



    </div>
    </div>
@endsection
