@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('social.social'))
@section('index_route', route('social.index'))
@section('store_route', route('social.store'))
@section('page_type', trans('general.locales.add_new'))
@section('form_type','POST')
@section('title') @lang('general.modules.social') @endsection


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
        
           
                <div class="tab-pane fade show d-flex" id="tabpanel" role="tabpanel">
                    
                    
                    <div class="col form-group">
                        <label>@lang('general.fields.url')  <span class="text-danger">*</span></label>
                        <input
                            type="text"
                            name="url[]"
                            id="url"
                            placeholder="@lang('general.fields.url')"
                            class="form-control"
                            value="" >
                    </div>
                    <div class="col form-group">
                        <label>@lang('general.fields.icon')  <span class="text-danger"></span></label>
                        
                        <select class="form-control" name="icon[]" id="exampleSelectd">
                            <option value="fab fa-facebook-f">@lang('general.fields.facebook')</option>
                            <option value="fab fa-twitter">@lang('general.fields.twitter')</option>
                            <option value="fab fa-linkedin">@lang('general.fields.linkedin')</option>
                            <option value="fab fa-instagram">@lang('general.fields.instagram')</option>
                            <option value="fab fa-youtube">@lang('general.fields.youtube')</option>
                            <option value="fab fa-whatsapp">@lang('general.fields.whatsapp')</option>
                            <option value="fab fa-google-plus">@lang('general.fields.gmail')</option>
                            <option value="fab fa-snapchat">@lang('general.fields.snapchat')</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <a class="btn btn-light-success font-weight-bold btn-sm ml-5 copy_section text-center"
                        style="height: 35px"><i class="fa fa-plus fa-sm p-0"></i></a>
                   
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

@section('script')
<script type="text/javascript">

var x = 0;

   
 
    $(document).on('click', '.copy_section', function() {
        var max_input_3 = 9;
        var content = `
        <div class="tab-pane fade show d-flex" id="tabpanel" role="tabpanel">
                     
                    
                    <div class="col form-group">
                        <label>@lang('general.fields.url')  <span class="text-danger">*</span></label>
                        <input
                            type="text"
                            name="url[]"
                            id="url"
                            placeholder="@lang('general.fields.url')"
                            class="form-control"
                            value="" >
                    </div>
                    <div class="col form-group">
                        <label>@lang('general.fields.icon')  <span class="text-danger"></span></label>
                        <select class="form-control" name="icon[]" id="exampleSelectd">
                            <option value="fab fa-facebook-f">@lang('general.fields.facebook')</option>
                            <option value="fab fa-twitter">@lang('general.fields.twitter')</option>
                            <option value="fab fa-linkedin">@lang('general.fields.linkedin')</option>
                            <option value="fab fa-instagram">@lang('general.fields.instagram')</option>
                            <option value="fab fa-youtube">@lang('general.fields.youtube')</option>
                            <option value="fab fa-whatsapp">@lang('general.fields.whatsapp')</option>
                            <option value="fab fa-google-plus">@lang('general.fields.gmail')</option>
                            <option value="fab fa-snapchat">@lang('general.fields.snapchat')</option>
                        </select>
                    </div>
                   
                        <a class="btn btn-light-danger font-weight-bold remove_copy_section mr-1  mt-8" style="height: 35px"><i class="fa fa-trash fa-sm p-0"></i></a>
                   
                    
                </div>
               `;
        if (x < max_input_3) {
            $('#tabpanel').parent().append(content);
                                 
               
            x++;
        }
    });
            

    $(document).on('click', '.remove_copy_section', function() {
      
        $(this).parent().remove();
       
        x--;
    })
    


  
    
</script>
@endsection
@endsection

