<?php 
	$seoMeta = CommonSite::getMetaSeo('Type', $type->id);
?>
@extends('site.layout.default_pc', array('seoMeta' => $seoMeta, 'seoImage' => FOLDER_SEO_GAMETYPE . '/' . $type->id, 'ogUrl' => url($type->slug.'-games')))

@section('title')
	<?php $title = (isset($seoMeta) && !empty($seoMeta->title_site))?$seoMeta->title_site:$type->name; ?>
	{{ $title }}
@stop

@section('content')

<?php
	$games = CommonGame::boxGameByType($type, 2);
	if($games != null){$total = count($games->get());} else {$total = 0;}
?>
<div class="box">
	<h1>Best {{ $type->name }} games</h1>
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
						$listGame = $games->orderBy('count_play', 'desc')->orderBy('start_date', 'desc')->take(PAGINATE_BOXGAME)->skip($i * PAGINATE_BOXGAME)->get();
					?>
						@foreach($listGame as $game)
							@include('site.game.gameitem_cronjob', array('game' => $game, 'slug' => $type->slug, 'device' => 2))
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
@include('site.common.ads', array('adPosition' => POSITION_TYPE))

<?php
	$games = CommonGame::boxGameByType($type, 2);
	if($games != null){$total = count($games->get());} else {$total = 0;}
?>
<div class="box">
	<h3>Latest {{ $type->name }} games</h3>
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
							@include('site.game.gameitem_cronjob', array('game' => $game, 'slug' => $type->slug, 'device' => 2))
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