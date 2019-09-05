{{-- Extending the master layout  --}}
@extends('admin::layouts.master') 

@section('content-wrapper')
{{-- this is the use of translation. --}}
{{ __('helloworld::app.jambo.name')}}    
{{ __('helloworld::app.hello-world.name')}}
@endsection
