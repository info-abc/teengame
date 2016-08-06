@extends('site.layout.default_mobile')

@section('title')
	{{ $title='Download game' }}
@stop

@section('content')

<?php 
	$boxList = CategoryParent::where('status_child', ACTIVE)
					->where('position', CONTENT)
					->orderBy('weight_number', 'asc')
					->get();
?>
@if(count($boxList))
<div class="box">
	@foreach($boxList as $value)
		<h3><a href="{{ CommonGame::getUrlCategoryParent($value->id) }}">{{ $value->name }}</a></h3>
		@if($games = CommonGame::boxGameByCategoryParentIndex2($value))
			<?php $count = ceil(count($games)/PAGINATE_BOXGAME);
				$count = getCount($count);
			 ?>
			<div class="swiper-container">
				<div class="swiper-wrapper">
					@for($i = 0; $i < $count; $i ++)
						<div class="swiper-slide boxgame">
							<div class="row">
							<?php
								//$listGame = $games->take(PAGINATE_BOXGAME)->skip($i * PAGINATE_BOXGAME)->get();
								$listGame = array_slice($games, $i * PAGINATE_BOXGAME, PAGINATE_BOXGAME);
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
		@include('site.common.ad', array('adPosition' => CHILD_PAGE, 'modelName' => 'CategoryParent', 'modelId' => $value->id, 'device' => 1, 'noCache' => 1))
	@endforeach
</div>

@include('site.game.scriptbox')

@endif

@stop

