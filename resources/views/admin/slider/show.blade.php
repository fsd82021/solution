@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('slider.slider'))
@section('index_route', route('slider.index'))
@section('page_type', trans('general.show'))
@section('title') @lang('slider.slider') @endsection

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
            <div class="tab-content">

                @foreach (config('translatable.locales') as $key => $locale)
                    <div class="tab-pane fade show @if ($key == 0) active @endif" id="{{ $locale }}" role="tabpanel">
                        <div class="col form-group">
                            <label>@lang('slider.name')<span class="text-danger">*</span></label>

                            <p>{{ $data->translate($locale)->name }}</p>
                        </div>

                        <div class="col form-group">
                            <label>@lang('slider.desc')<span class="text-danger">*</span></label>

                            <p>{!! $data->translate($locale)->description !!}</p>
                        </div>

                    </div>
                @endforeach
            </div>

            <div class="col form-group">
                @if (isset($data->image))
                    <label>@lang('general.fields.image') <span class="text-danger">*</span></label>
                    <br>
                    @php
                        $images = json_decode($data->image);
                    @endphp
                    @foreach ($images as $image)
                        <img class="w-25" src="{{ asset($image) }}" />
                    @endforeach
                @endif

            </div>
        </div>



    </div>
    </div>
@endsection
