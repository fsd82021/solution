@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('slider.slider'))
@section('index_route', route('slider.index'))
@section('store_route', route('slider.store'))
@section('page_type', trans('general.locales.add_new'))
@section('form_type', 'POST')
@section('title') @lang('slider.slider') @endsection

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
                            <label>@lang('slider.name') (@lang('general.'.$locale))<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="{{ $locale . '[name]' }}" id="{{ $locale . '[name]' }}"
                                placeholder="@lang('slider.name')"
                                class="form-control @error($locale . '.name') is-invalid @enderror"
                                value="{{ old($locale . '.name') }}">
                        </div>

                        <div class="col form-group">
                            <label>@lang('slider.desc')(@lang('general.'.$locale))<span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control @error($locale . '.description') is-invalid @enderror "
                                type="text" name="{{ $locale . '[description]' }}" rows="4"
                                id="{{ $locale }}.editor1">{{ old($locale . '.description') }}</textarea>
                                <script>
                                    CKEDITOR.replace('{{ $locale }}.editor1', {

                                        // Setting default language direction to right-to-left.
                                        contentsLangDirection: 'rtl',
                                        height: 270,
                                        scayt_customerId: '1:Eebp63-lWHbt2-ASpHy4-AYUpy2-fo3mk4-sKrza1-NsuXy4-I1XZC2-0u2F54-aqYWd1-l3Qf14-umd',
                                        scayt_sLang: 'auto',
                                        removeButtons: 'PasteFromWord'
                                    });
                                </script>

                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col form-group">
                <label>@lang('general.fields.image')</label>
                <input
                    type="file"
                    name="image[]"
                    multiple
                    placeholder="@lang('general.fields.image')"
                    class="form-control">
            </div>


            <input type="hidden" name="type" value="slider" id="">


            {{--  --}}
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
