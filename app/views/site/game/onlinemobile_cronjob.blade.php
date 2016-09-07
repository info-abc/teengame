<?php 
	if(isset($game)) {
		$gameUrl = CommonGame::getUrlGame($game);
	} else {
		$gameUrl = null;
	}
	$seoMeta = CommonSite::getMetaSeo('Game', $game->id);
?>
@extends('site.layout.default_mobile', array('seoMeta' => $seoMeta, 'seoImage' => FOLDER_SEO_GAME . '/' . $game->id, 'gameUrl' => $gameUrl))

@section('title')
	@if(isset($seoMeta))
		{{ $title = $seoMeta->title_site }}
	@else
		{{ $title = $game->name }}
	@endif
@stop

@section('content')

<div class="box">

	<?php echo '@include("site.game.breadcrumbgame_cronjob", array("game" => $game))'; ?>

	<!-- MOBILE <= 500px -->
	<div class="row mobile">

		<div class="mobile_avatar">
			<img alt="{{ $game->slug }}" src="{{ url(UPLOAD_GAME_AVATAR . '/' . $game->image_url) }}" />
		</div>
		<div class="mobile_title">

			<h1 class="title mobile-title">{{ $game->name }}</h1>

			<?php echo '@include("site.common.rate", array("vote_average" => $game->vote_average))'; ?>

			<p><?php echo '{{ getZero($game->count_play) }}'; ?> plays</p>

		</div>

	  	<div class="col-xs-12">

	  		@if($game->parent_id != GAMEFLASH)
	  			<div class="btn-block-center">
					<a onclick="countplay()" class="download"><i class="fa fa-play-circle-o"></i> Play now</a>
				</div>
			@else
				<div class="btn-block-center">
					<p class="no-for-mobile">Game only play in computer</p>
				</div>
			@endif

			<div class="slideGame">
				@include('site.game.slide', array('slideId' => $game->slide_id))
			</div>

			<div class="detail">{{ $game->description }}</div>

			@include('site.common.ads', array('adPosition' => POSITION_MOBILE_PLAYBUTTON2))

			@if($game->parent_id != GAMEFLASH)
	  			<div class="btn-block-center">
					<a onclick="countplay()" class="download"><i class="fa fa-play-circle-o"></i> Play now</a>
				</div>
			@else
				<div class="btn-block-center">
					<p class="no-for-mobile">Game only play in computer</p>
				</div>
			@endif

			{{-- @include('site.game.scriptcountplay', array('id' => $game->id, 'url' => Request::url() . '?play=true')) --}}

			@if($game->parent_id != GAMEFLASH)
				@include('site.game.scriptcountplay', array('id' => $game->id, 'url' => CommonGame::getLinkPlayGameHtml5($game, $gameUrl, 1)))
			@endif

			@include('site.game.vote', array('id' => $game->id))

			@include('site.game.social', array('id' => $game->id))

	  	</div>

	</div>

	<?php echo '@include("site.game.comment")'; ?>

</div>

@include('site.game.related_mobile', array('game' => $game))

@stop