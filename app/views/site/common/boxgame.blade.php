<div class="box">
	<div class="title_left">
		<h1>Not found {{ $text }} "<span style="color: red;">{{ $inputSearch }}</span>"</h1>
	</div>
	<div class="title_left"><strong>List of game you should play</strong></div>
	@foreach(CommonGame::getGameMost() as $value)
		<div class="row list-item">
			<div class="col-xs-2 list-image">
				<a href="{{ CommonGame::getUrlGame($value) }}">
					<img class="image_avata_game" src="{{ url(UPLOADIMG . '/game_avatar'. '/' . $value->image_url) }}" />
				</a>
			</div>
			<div class="col-xs-10 list-text">
				<h3>
					<a href="{{ CommonGame::getUrlGame($value) }}">
						{{ limit_text($value->name, TEXTLENGH) }}
					</a>
				</h3>
				@if($value->parent_id == GAMEOFFLINE)
					<span>{{ getZero($value->count_download) }} plays</span>
				@else
					<span>{{ getZero($value->count_play) }} plays</span>
				@endif
				<p>{{ limit_text(strip_tags($value->description), TEXTLENGH_DESCRIPTION) }}</p>
			</div>
		</div>
	@endforeach
</div>