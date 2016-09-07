<?php 
$seoMeta = new stdClass();
$seoMeta->title_site = 'Most Popular Free Flash Games - Play Most Popular Game Online Right Now!';
$seoMeta->description_site = 'Play Most Popular Flash Games at Teengame.net. Choose Popular Free Flash Game and Play Online NOW!';
$seoMeta->keyword_site = 'most popular flash games, most popular free flash games, most popular online games, play most popular game';
$seoMeta->title_fb = 'Most Popular Free Flash Games - Play Most Popular Game Online Right Now!';
$seoMeta->description_fb = 'Play Most Popular Flash Games at Teengame.net. Choose Popular Free Flash Game and Play Online NOW!';
$seoMeta->image_url_fb = '';
?>

@extends('site.layout.default_mobile', array('seoMeta' => $seoMeta))

@section('title')
	<?php $title = (isset($seoMeta) && !empty($seoMeta->title_site))?$seoMeta->title_site:'Most voted games'; ?>
	{{ $title }}
@stop

@section('content')

<?php
	$games = CommonGame::getListGame('vote', 1);
	if($games != null){$total = count($games->get());} else {$total = 0;}
?>
<div class="box">
	<h1>Most voted games</h1>
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
							@include('site.game.gameitem_cronjob', array('game' => $game, 'slug' => null, 'device' => 1))
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
@include('site.common.ads', array('adPosition' => POSITION_MOBILE_VOTEMANY))

<?php
	$games = CommonGame::getListGame('vote', 1);
	if($games != null){$total = count($games->get());} else {$total = 0;}
?>
<div class="box">
	<h3>Best games</h3>
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
							@include('site.game.gameitem_cronjob', array('game' => $game, 'slug' => null, 'device' => 1))
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
