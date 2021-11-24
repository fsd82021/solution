@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('general.modules.setting'))
@section('index_route', route('setting.index'))
@section('store_route', route('setting.update', $general))
@section('page_type', trans('general.modules.edit'))
@section('form_type', 'POST')
@section('title') @lang('general.modules.setting') @endsection

{{-- Fields --}}
@section('fields_content')
    @method('put')
    <div class="card card-custom">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">@lang('general.locales.settings')</h3>
            </div>

        </div>



        <div class="card-body">

            <div class="col form-group">
                <label>@lang('general.fields.name') <span class="text-danger">*</span></label>
                <input type="text" name="name" placeholder="@lang('general.fields.name')" class="form-control"
                    value="{{ $general->name }}">
            </div>

        </div>
        <div class="card-body">


            <div class="col form-group">
                <label>@lang('general.fields.description') <span class="text-danger">*</span></label>
                <input type="text" name="description" placeholder="@lang('general.fields.description')"
                    class="form-control"  value="{{ $general->description }}"> 
            </div>

        </div>

        <div class="card-body">


            <div class="col form-group">
                <label>@lang('general.fields.email') <span class="text-danger">*</span></label>
                <input type="email" name="email" placeholder="@lang('general.fields.email')"
                    class="form-control"  value="{{ $general->email }}"> 
            </div>

        </div>

        <div class="card-body">


            <div class="col form-group">
                <label>@lang('general.fields.phone') <span class="text-danger">*</span></label>
                <input type="number" name="phone" placeholder="@lang('general.fields.phone')"
                    class="form-control"  value="{{ $general->phone }}"> 
            </div>

        </div>


        

        <div class="card-body">


            <div class="col form-group">
                <label>@lang('general.fields.map') <span class="text-danger">*</span></label>
              
                    <input
                     type="text"        
                    name="map"
                    id="map"
                    placeholder="@lang('general.fields.map')"
                    class="form-control"
                    value="{{ $general->map }}" />
            </div>

        </div>

        <div class="card-body">


            <div class="col form-group">
                <label>@lang('general.fields.address') <span class="text-danger">*</span></label>
              
                    <input
                           
                    name="address"
                    id="address"
                    placeholder="@lang('general.fields.address')"
                    class="form-control"
                     value="{{ $general->address }}"
                    />
            </div>

        </div>

        <div class="card-body">


            <div class="col form-group">
                <label>@lang('general.fields.working_hours') <span class="text-danger">*</span></label>
              
                <input
                type="text"        
               name="working_hours"
               id="working_hours"
               placeholder="@lang('general.fields.working_hours')"
               class="form-control"
               value="{{ $general->working_hours  }}" />
            </div>

        </div>

        <div class="card-body">


            <div class="col form-group">
                <label>@lang('general.fields.video') <span class="text-danger">*</span></label>
              
                <input
                type="url"        
               name="video"
               id="video"
               placeholder="@lang('general.fields.video')"
               class="form-control"
               value="{{ $general->video  }}" />
            </div>

        </div>


        
        <div class="card-body">


            <div class="col form-group">
                <label>@lang('general.fields.facebook') <span class="text-danger">*</span></label>
              
                <input
                type="text"        
               name="facebook"
               id="facebook"
               placeholder="@lang('general.fields.facebook')"
               class="form-control"
               value="{{  $general->facebook  }}" />
            </div>

        </div>
        <div class="card-body">


            <div class="col form-group">
                <label>@lang('general.fields.twitter') <span class="text-danger">*</span></label>
              
                <input
                type="text"        
               name="twitter"
               id="twitter"
               placeholder="@lang('general.fields.twitter')"
               class="form-control"
               value="{{  $general->twitter  }}" />
            </div>

        </div>

        <div class="card-body">


            <div class="col form-group">
                <label>@lang('general.fields.instagram') <span class="text-danger">*</span></label>
              
                <input
                type="text"        
               name="instagram"
               id="instagram"
               placeholder="@lang('general.fields.instagram')"
               class="form-control"
               value="{{ $general->instagram  }}" />
            </div>

        </div>
        <div class="card-body">


            <div class="col form-group">
                <label>@lang('general.fields.linkedin') <span class="text-danger">*</span></label>
              
                <input
                type="text"        
               name="linkedin"
               id="linkedin"
               placeholder="@lang('general.fields.linkedin')"
               class="form-control"
               value="{{  $general->linkedin  }}" />
            </div>

        </div>





        <div class="card-body">



            <div class="col form-group">
                @if (isset($general->logo))
                    <label>@lang('general.fields.logo') <span class="text-danger">*</span></label>
                    <br>
                    <img src="{{ asset($general->logo) }}" class="w-25">
                @endif
            </div>
            <div class="col form-group">
                <label>@lang('general.fields.logo') <span class="text-danger">*</span></label>
                <input type="file" name="logo" placeholder="@lang('general.fields.logo')" class="form-control" value="">
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
