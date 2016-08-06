@extends('site.layout.default', array('page404' => 1))

@section('title')
	{{ $title='404 Not Found' }}
@stop

@section('content')

<div class="box">
    @include('site.common.boxgame', array('inputSearch' => '', 'text' => 'page'))
</div>

@stop
