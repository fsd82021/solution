@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('general.modules.social'))
@section('index_route', route('social.index'))
@section('store_route', route('social.update', $general))
@section('page_type', trans('general.modules.edit'))
@section('form_type', 'POST')
@section('title') @lang('general.modules.social') @endsection

 

{{-- Fields --}}
@section('fields_content')
@method('put')
<div class="card card-custom">
    <div class="card-header card-header-tabs-line">
        <div class="card-title">
            <h3 class="card-label">@lang('general.locales.update')</h3>
        </div>
        <div class="card-toolbar">
        
        </div>
    </div>
    <div class="card-body">
        
           
        <div class="tab-pane fade show " role="tabpanel">
             
            
            <div class="col form-group">
                <label>@lang('general.fields.url')  <span class="text-danger">*</span></label>
                <input
                    type="text"
                    name="url"
                    id="url"
                    placeholder="@lang('general.fields.url')"
                    class="form-control"
                    value="{{ $general->url }}" >
            </div>
            <div class="col form-group">
                <label>@lang('general.fields.icon')  <span class="text-danger"></span></label>
               
                <select class="form-control" name="icon" id="exampleSelectd">
              
                 

                    <option value="fab fa-facebook-f" {{ $general->icon == "fab fa-facebook-f" ? 'selected' : '' }}>@lang('general.fields.facebook')</option>
                    <option value="fab fa-twitter" {{ $general->icon == "fab fa-twitter" ? 'selected' : '' }}>@lang('general.fields.twitter')</option>
                    <option value="fab fa-linkedin" {{ $general->icon == "fab fa-linkedin" ? 'selected' : '' }}>@lang('general.fields.linkedin')</option>
                    <option value="fab fa-instagram" {{ $general->icon == "fab fa-instagram" ? 'selected' : '' }}>@lang('general.fields.instagram')</option>
                    <option value="fab fa-youtube" {{ $general->icon == "fab fa-youtube" ? 'selected' : '' }}>@lang('general.fields.youtube')</option>
                    <option value="fab fa-whatsapp" {{ $general->icon == "fab fa-whatsapp" ? 'selected' : '' }}>@lang('general.fields.whatsapp')</option>
                    <option value="fab fa-google-plus" {{ $general->icon == "fab fa-google-plus" ? 'selected' : '' }}>@lang('general.fields.gmail')</option>
                    <option value="fab fa-snapchat" {{ $general->icon == "fab fa-snapchat" ? 'selected' : '' }}>@lang('general.fields.snapchat')</option>
                </select>
            </div>
        </div>
   





{{--  --}}
 
    
      
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

