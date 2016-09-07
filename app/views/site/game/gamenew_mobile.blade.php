<?php 
	$seoMeta = CommonSite::getMetaSeo('CategoryParent', GAME_NEW);
?>
@extends('site.layout.default_mobile', array('seoMeta' => $seoMeta, 'seoImage' => FOLDER_SEO_PARENT . '/' . GAME_NEW, 'ogUrl' => action('GameController@getListGamenew')))

@section('title')
	<?php $title = (isset($seoMeta) && !empty($seoMeta->title_site))?$seoMeta->title_site:'Latest games'; ?>
	{{ $title }}
@stop

@section('content')

<?php
	$games = CommonGame::getListGame('play', 1);
	if($games != null){$total = count($games->get());} else {$total = 0;}
?>
<div class="box">
	<h1>Latest games</h1>
	@if($total > 0)
	<?php
		$count = ceil($total/PAGINATE_BOXGAME);
	?>
	<div class="swiper-container">
		<div class="swiper-wrapper">
			@for($i = 0; $i < $count ; $i ++)
				<div class="swiper-slide boxgame">
					<div class="row">
					<?php
						$listGame = $games->orderBy('start_date', 'desc')->take(PAGINATE_BOXGAME)->skip($i * PAGINATE_BOXGAME)->get();
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

<?php
	$games = CommonGame::getListGame('play', 1);
	if($games != null){$total = count($games->get());} else {$total = 0;}
?>
<div class="box">
	<h3>Best games</h3>
	@if($total > 0)
	<?php
		$count = ceil($total/PAGINATE_BOXGAME);
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
