@extends('site.layout.default')

@section('title')
{{ $title = 'Most voted game'}}
@stop

@section('content')

<div class="box">
	<h1>Most voted games</h1>
	<div class="boxgame-container">
		<div class="boxgame-wrapper" id="boxgame-wrapper-1">
			{{ CommonGame::loadGameBox('vote', 'vote_average', getDevice()) }}
		</div>
		<div class="boxgame-pagination">
			<a class="prev" onclick="loadGamePrev(1, 'vote', 'vote_average', {{ getDevice() }})"><i class="fa fa-caret-left"></i> Previous</a>
			<div class="boxgame-pagenumber"><span class="numberPage1">1</span>/<span class="totalNumberPage1">{{ CommonGame::countGameBox('vote', 'vote_average', getDevice()) }}</span></div>
			<a class="next" onclick="loadGameNext(1, 'vote', 'vote_average', {{ getDevice() }})">Next <i class="fa fa-caret-right"></i></a>
		</div>
	</div>
</div>

{{-- quang cao --}}
@if(getDevice() == COMPUTER)
	@include('site.common.ads', array('adPosition' => POSITION_VOTEMANY))
@else
	@include('site.common.ads', array('adPosition' => POSITION_MOBILE_VOTEMANY))
@endif

<div class="box">
	<h3>Best games</h3>
	<div class="boxgame-container">
		<div class="boxgame-wrapper" id="boxgame-wrapper-2">
			{{ CommonGame::loadGameBox('vote', 'count_play', getDevice()) }}
		</div>
		<div class="boxgame-pagination">
			<a class="prev" onclick="loadGamePrev(2, 'vote', 'count_play', {{ getDevice() }})"><i class="fa fa-caret-left"></i> Previous</a>
			<div class="boxgame-pagenumber"><span class="numberPage2">1</span>/<span class="totalNumberPage2">{{ CommonGame::countGameBox('vote', 'count_play', getDevice()) }}</span></div>
			<a class="next" onclick="loadGameNext(2, 'vote', 'count_play', {{ getDevice() }})">Next <i class="fa fa-caret-right"></i></a>
		</div>
	</div>
</div>

@include('site.game.scriptboxgame')

@stop
