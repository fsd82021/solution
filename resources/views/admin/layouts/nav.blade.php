<div class="container-fluid d-flex align-items-stretch justify-content-between">
  <!--begin::Header Menu Wrapper-->
  <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
    <!--begin::Header Menu-->
    <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">

      <!--end::Header Nav-->
    </div>
    <!--end::Header Menu-->
  </div>
  <!--end::Header Menu Wrapper-->
  <!--begin::Topbar-->
  <div class="topbar">
    <!--begin::Languages-->
    <div class="dropdown">
      <!--begin::Toggle-->
      <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
        <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
          <span class="font-weight-bolder"> <img class="h-20px w-20px pr-2 rounded-sm" src="{{ asset('admin/assets/media/svg/flags/ar.svg') }}" alt="">{{app()->getLocale()}}</span>
        </div>
      </div>
      <!--end::Toggle-->
      <!--begin::Dropdown-->
      <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
        <!--begin::Nav-->
        <ul class="navi navi-hover py-4">
            @foreach (config('app.supportedLocales') as $locale)
            
                @if (app()->getLocale() != $locale)
                    @php
                    $text  = "$_SERVER[REQUEST_URI]";
                    $text  = substr($text, 25);
                    @endphp
                    <a class="dropdown-item"
                        href="{{ url( $locale . $text .'/admin') }}">  <img class="h-20px w-20px rounded-sm" src="{{ asset('admin/assets/media/svg/flags/226-united-states.svg') }}" alt="">
                        @lang('general.'.$locale)</a>
                @endif
            @endforeach
        </ul>
        
        <!--end::Nav-->
      </div>
      <!--end::Dropdown-->
    </div>
    <!--end::Languages-->

    <!--begin::Languages-->
    <div class="dropdown">
      <!--begin::Toggle-->
       
      <!--end::Dropdown-->
    </div>
    <!--end::Languages-->
    <!--begin::User-->
    <div class="topbar-item">
      <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
        <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">@lang('general.hi'),</span>
        <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{auth()->user()->name}}</span>
        <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
          <span class="symbol-label font-size-h5 font-weight-bold"></span>
        </span>
      </div>
    </div>
    <!--end::User-->
  </div>
  <!--end::Topbar-->
</div>
