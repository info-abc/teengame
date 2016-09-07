<?php 
	$seoMeta = CommonSite::getMetaSeo('CategoryParent', GAME_PLAY_MANY);
?>
@extends('site.layout.default_pc', array('seoMeta' => $seoMeta, 'seoImage' => FOLDER_SEO_PARENT . '/' . GAME_PLAY_MANY, 'ogUrl' => action('GameController@getListGameplay')))

@section('title')
	<?php $title = (isset($seoMeta) && !empty($seoMeta->title_site))?$seoMeta->title_site:'Best games'; ?>
	{{ $title }}
@stop

@section('content')

<?php
	$games = CommonGame::getListGame('play', 2);
	if($games != null){$total = count($games->get());} else {$total = 0;}
?>
<div class="box">
	<h1>Best games</h1>
	@if($total > 0)
	<?php
		// $count = ceil(count($games->get())/PAGINATE_BOXGAME);
		$count = 5;
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
							@include('site.game.gameitem_cronjob', array('game' => $game, 'slug' => null, 'device' => 2))
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
@include('site.common.ads', array('adPosition' => POSITION_PLAYMANY))

<?php
	$games = CommonGame::getListGame('play', 2);
	if($games != null){$total = count($games->get());} else {$total = 0;}
?>
<div class="box">
	<h3>Most voted games</h3>
	@if($total > 0)
	<?php
		// $count = ceil(count($games->get())/PAGINATE_BOXGAME);
		$count = 5;
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
							@include('site.game.gameitem_cronjob', array('game' => $game, 'slug' => null, 'device' => 2))
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
