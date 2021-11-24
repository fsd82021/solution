@extends('admin.layouts.app')
{{-- Preparing page properties --}}
 


{{-- Table Content --}}
@section('content')
        <div class="row justify-content-center" style="text-align: center;margin: 0 auto;">
	      <div class="page-content m-atuo text-center" style="">
		       <img style="width: 50%" src="{{ asset(settings()->logo) }}" class="img-fluid">
			   <h1 style="font-size: 50px">@lang('general.hi') {{ settings()->name }}</h1>
		   </div>
		</div>
@endsection