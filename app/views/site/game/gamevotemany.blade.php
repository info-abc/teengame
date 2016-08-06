@extends('site.layout.default')

@section('title')
{{ $title = 'Most voted games'}}
@stop

@section('content')

<?php
	$games = CommonGame::getListGame('vote');
	if($games != null){$total = count($games->get());} else {$total = 0;}
?>
<div class="box">
	<h1>Most voted games</h1>
	@if($total > 0)
	<?php
		$count = ceil(count($games->get())/PAGINATE_BOXGAME);
	?>
	<div class="swiper-container">
		<div class="swiper-wrapper">
			@for($i = 0; $i < $count ; $i ++)
				<div class="swiper-slide boxgame">
					<div class="row">
					<?php
						$listGame = $games->orderBy('vote_average', 'desc')->take(PAGINATE_BOXGAME)->skip($i * PAGINATE_BOXGAME)->get();
					?>
						@foreach($listGame as $game)
							@include('site.game.gameitem', array('game' => $game, 'slug' => null))
						@endforeach
					</div>
				</div>
			@endfor
		</div>
		<div class="swiper-pagination"></div>
		<div class="boxgame-pagination">
			<a class="prev"><i class="fa fa-caret-left"></i> Previous</a>
			<div class="boxgame-pagenumber"><span class="numberPage">1</span>/{{ $count }}</div>
			<a class="next">Next <i class="fa fa-caret-right"></i></a>
		</div>
	</div>
	@endif
</div>

{{-- quang cao --}}
@if(getDevice() == COMPUTER)
	@include('site.common.ads', array('adPosition' => POSITION_VOTEMANY))
@else
	@include('site.common.ads', array('adPosition' => POSITION_MOBILE_VOTEMANY))
@endif

<?php
	$games = CommonGame::getListGame('vote');
	if($games != null){$total = count($games->get());} else {$total = 0;}
?>
<div class="box">
	<h3>Best games</h3>
	@if($total > 0)
	<?php
		$count = ceil(count($games->get())/PAGINATE_BOXGAME);
	?>
	<div class="swiper-container">
		<div class="swiper-wrapper">
			@for($i = 0; $i < $count ; $i ++)
				<div class="swiper-slide boxgame">
					<div class="row">
					<?php
						$listGame = $games->orderBy('count_play', 'desc')->take(PAGINATE_BOXGAME)->skip($i * PAGINATE_BOXGAME)->get();
					?>
						@foreach($listGame as $game)
							@include('site.game.gameitem', array('game' => $game, 'slug' => null))
						@endforeach
					</div>
				</div>
			@endfor
		</div>
		<div class="swiper-pagination"></div>
		<div class="boxgame-pagination">
			<a class="prev"><i class="fa fa-caret-left"></i> Previous</a>
			<div class="boxgame-pagenumber"><span class="numberPage">1</span>/{{ $count }}</div>
			<a class="next">Next <i class="fa fa-caret-right"></i></a>
		</div>
	</div>
	@endif
</div>

@include('site.game.scriptbox')

@stop
