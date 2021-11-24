@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('general.modules.social'))
@section('index_route', route('social.index'))
@section('page_type', trans('general.modules.show'))
@section('title') @lang('general.modules.social') @endsection

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
       
    </div>
    
    <div class="card-body">
 
              
       

        <div class="col form-group">
        
            <label>@lang('general.fields.url') <span class="text-danger">*</span></label>
            <br>
             
             <a href="{{ $general->url }}">@lang('general.fields.url')</a>
        </div>
         
     

        <div class="col form-group">
            @if(isset($general->icon))
            <label>@lang('general.fields.icon') <span class="text-danger">*</span></label>
            <br>
             <i class="{{$general->icon}}"></i>
            @endif

        </div>
</div>



    </div>
</div>
@endsection



 