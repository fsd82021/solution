@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('general.modules.testimonial'))
@section('index_route', route('testimonial.index'))
@section('page_type', trans('general.modules.show'))
@section('title') @lang('general.modules.testimonial') @endsection

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
                        
                            <label>@lang('general.fields.title') <span class="text-danger">*</span></label>
                            <br>
                            <p> {{ $general->translate($locale)->name }}</p>
                        </div>

                       
                        <div class="col form-group">
                        
                            <label>@lang('general.fields.detail') <span class="text-danger">*</span></label>
                            <br>
                            <p> {!! $general->translate($locale)->description !!}</p>
                        </div>
                

                </div>
            @endforeach
              
        </div>
                
                 
             

                

                <div class="col form-group">
                    @if(isset($general->image))
                    <label>@lang('general.fields.image') <span class="text-danger">*</span></label>
                    <br>
                    <img src="{{asset($general->image)}}" class="w-25">
                    @endif

                </div>
    </div>



    </div>
</div>
@endsection
