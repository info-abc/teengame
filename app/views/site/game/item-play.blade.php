<div class="item-play">
	<a href="{{ CommonGame::getUrlGame($game->slug) }}">
	@if($game->parent_id == GAMEOFFLINE)
		<span>{{ getZero($game->count_download) }} play</span><i class="play">
		<img src="{{ url('/assets/images/tai.png') }}"></i>
	@else
		<span>{{ getZero($game->count_play) }} play</span><i class="play">
		<img src="{{ url('/assets/images/play.png') }}"></i>
	@endif
	</a>
</div>