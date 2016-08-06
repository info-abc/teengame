<?php 
	$seoMeta = CommonSite::getMetaSeo('CategoryParent', GAME_ANDROID);
?>
@extends('site.layout.default', array('seoMeta' => $seoMeta, 'seoImage' => FOLDER_SEO_PARENT . '/' . GAME_ANDROID))

@section('title')
	<?php $title = (isset($seoMeta) && !empty($seoMeta->title_site))?$seoMeta->title_site:'Game Android'; ?>
@stop

@section('content')

<?php
	$games = CommonGame::getListGame('android');
	if($games != null){$total = count($games->get());} else {$total = 0;}
?>
<div class="box">
	<h1>Most download Game Android</h1>
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
						$listGame = $games->orderBy('count_download', 'desc')->take(PAGINATE_BOXGAME)->skip($i * PAGINATE_BOXGAME)->get();
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
	@include('site.common.ads', array('adPosition' => POSITION_GAMEANDROID))
@else
	@include('site.common.ads', array('adPosition' => POSITION_MOBILE_GAMEANDROID))
@endif

<?php
	$games = CommonGame::getListGame('android');
	if($games != null){$total = count($games->get());} else {$total = 0;}
?>
<div class="box">
	<h3>Latest Game Android</h3>
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
						$listGame = $games->orderBy('id', 'desc')->take(PAGINATE_BOXGAME)->skip($i * PAGINATE_BOXGAME)->get();
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