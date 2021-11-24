@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('general.aside.setting'))
@section('index_route', route('setting'))
@section('store_route', route('setting_update'))
 
@section('form_type', 'POST')
@section('title') @lang('general.aside.setting') @endsection

{{-- Fields --}}
@section('fields_content')
    @method('put')
    <div class="card card-custom">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">@lang('general.locales.settings')</h3>
            </div>
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                    @foreach (config('translatable.locales') as $key => $locale)
                        <li class="nav-item">
                            <a class="nav-link  @if ($key == 0) active @endif" data-toggle="tab"
                                href="{{ '#' . $locale }}">@lang('general.'.$locale)</a>
                        </li>
                    @endforeach


                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">

                @foreach (config('translatable.locales') as $key => $locale)
                   <div class="tab-pane fade show @if ($key == 0) active @endif" id="{{ $locale }}" role="tabpanel">

                        <div class="col form-group">
                            <label>@lang('setting.name') (@lang('general.'.$locale))<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="{{ $locale . '[name]' }}" id="{{ $locale . '[name]' }}"
                                placeholder="@lang('setting.name')" class="form-control @error(" $locale.name") is-invalid
                            @enderror" value="{{ old($locale . '.name', $setting->translate($locale)->name) }}">
                       </div>


                        <div class="col form-group">
                            <label>@lang('setting.working_times') (@lang('general.'.$locale))<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="{{ $locale . '[working_times]' }}" id="{{ $locale . '[working_times]' }}"
                                placeholder="@lang('setting.working_times')" class="form-control @error(" $locale.working_times") is-invalid
                            @enderror" value="{{ old($locale . '.working_times', $setting->translate($locale)->working_times) }}">
                       </div>


                       <div class="col form-group">
                            <label>@lang('setting.address') (@lang('general.'.$locale))<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="{{ $locale . '[address]' }}" id="{{ $locale . '[address]' }}"
                                placeholder="@lang('setting.address')" class="form-control @error(" $locale.address") is-invalid
                            @enderror" value="{{ old($locale . '.address', $setting->translate($locale)->address) }}">
                      </div>

                       <div class="col form-group">
                            <label>@lang('setting.copyrights') (@lang('general.'.$locale))<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="{{ $locale . '[copyrights]' }}" id="{{ $locale . '[copyrights]' }}"
                                placeholder="@lang('setting.copyrights')" class="form-control @error(" $locale.copyrights") is-invalid
                            @enderror" value="{{ old($locale . '.copyrights', $setting->translate($locale)->copyrights) }}">
                      </div>


                    <div class="col form-group">
                        <label>@lang('setting.desc') (@lang('general.'.$locale))<span
                                class="text-danger">*</span></label>
                        <textarea name="{{ $locale . '[description]' }}" placeholder="@lang('setting.desc')"
                        class="form-control @error(" $locale.description") is-invalid @enderror"
                        id="{{ $locale }}.editor1">
                        {{ old($locale . '.description', strip_tags($setting->translate($locale)->description)) }}
                    </textarea>
                    <script>
                        CKEDITOR.replace('{{ $locale }}.editor1', {
                          
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
        <label>@lang('setting.phone')</label>
        <input type="text" name="phone" placeholder="@lang('setting.phone')" value="{{$setting->phone}}" class="form-control">
    </div>

    <div class="col form-group">
        <label>@lang('setting.email')</label>
        <input type="text" name="email" placeholder="@lang('setting.email')" value="{{$setting->email}}" class="form-control">
    </div>

    <div class="col form-group">
        <label>@lang('setting.facebook')</label>
        <input type="text" name="facebook" placeholder="@lang('setting.facebook')" value="{{$setting->facebook}}" class="form-control">
    </div>

    <div class="col form-group">
        <label>@lang('setting.twitter')</label>
        <input type="text" name="twitter" placeholder="@lang('setting.twitter')" value="{{$setting->twitter}}" class="form-control">
    </div>

    <div class="col form-group">
        <label>@lang('setting.linkedin')</label>
        <input type="text" name="linkedin" placeholder="@lang('setting.linkedin')" value="{{$setting->linkedin}}" class="form-control">
    </div>

    <div class="col form-group">
        <label>@lang('setting.instagram')</label>
        <input type="text" name="instagram" placeholder="@lang('setting.instagram')" value="{{$setting->instagram}}" class="form-control">
    </div>

    <div class="col form-group">
        <label>@lang('setting.website')</label>
        <input type="text" name="website" placeholder="@lang('setting.website')" value="{{$setting->website}}" class="form-control">
    </div>

    <div class="col form-group">
        <label>@lang('setting.fax')</label>
        <input type="text" name="fax" placeholder="@lang('setting.fax')" value="{{$setting->fax}}" class="form-control">
    </div>

    <div class="col form-group">
        <label>@lang('setting.whatsapp')</label>
        <input type="text" name="whatsapp" placeholder="@lang('setting.whatsapp')" value="{{$setting->whatsapp}}" class="form-control">
    </div>

    <div class="col form-group">
        <label>@lang('setting.start')</label>
        <input type="text" name="start" placeholder="@lang('setting.start')" value="{{$setting->start}}" class="form-control">
    </div>

    <div class="col form-group">
        <label>@lang('setting.client')</label>
        <input type="text" name="client" placeholder="@lang('setting.client')" value="{{$setting->client}}" class="form-control">
    </div>

    <div class="col form-group">
        <label>@lang('setting.po_box')</label>
        <input type="text" name="po_box" placeholder="@lang('setting.po_box')" value="{{$setting->po_box}}" class="form-control">
    </div>


    <div class="col form-group">
        @if (isset($setting->logo))
            <label>@lang('setting.logo') <span class="text-danger">*</span></label>
            <br>
            <img src="{{ asset($setting->logo) }}" class="w-25">
        @endif
    </div>

    <div class="col form-group">
        <label>@lang('setting.logo') <span class="text-danger">*</span></label>
        <input type="file" name="logo" placeholder="@lang('setting.logo')" class="form-control" value="">
    </div>

   <div class="col form-group">
        @if (isset($setting->logo_white))
            <label>@lang('setting.logo_white') <span class="text-danger">*</span></label>
            <br>
            <img src="{{ asset($setting->logo_white) }}" class="w-25">
        @endif
    </div>

    <div class="col form-group">
        <label>@lang('setting.logo_white') <span class="text-danger">*</span></label>
        <input type="file" name="logo_white" placeholder="@lang('setting.logo_white')" class="form-control" value="">
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
