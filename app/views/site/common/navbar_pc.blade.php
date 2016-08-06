<div class="menu-top menu-top-pc">
	<div class="menu-static">
		<ul>
			<li>
				<a href="{{ url('/') }}" {{ checkActive() }}>
					<span>Home</span>
				</a>
			</li>
			<li>
				<a href="{{ action('GameController@getListGameVote') }}" {{ checkActive('most-voted-games') }}>
					<span>Most voted games</span>
				</a>
			</li>
			<li>
				<a href="{{ action('GameController@getListGameplay') }}" {{ checkActive('best-games') }}>
					<span>Best Games</span>
				</a>
			</li>
			<li>
				<a href="{{ action('SiteNewsController@index') }}" {{ checkActive('news') }}>
					<span>News</span>
				</a>
			</li>
			<li>
				<a href="{{ action('GameController@getListGameAndroid') }}" {{ checkActive('game-android') }}>
					<span>Game android</span>
				</a>
			</li>
		</ul>
		<div class="clearfix"></div>
	</div>

	<!-- game type has games -->
	<ul class="nav-type">
	@foreach(CommonSearch::searchTypeGame() as $value)
		<li>
			<img src="{{ UPLOADIMG . UPLOAD_GAME_TYPE . '/' . $value->id . '/' . $value->image_url }}" alt="game-{{ $value->slug }}" />
			<a href="{{ url($value->slug.'-games') }}" {{ checkActive($value->slug.'-games') }} >
				{{ ($value->name) }}
			</a>
		</li>
	@endforeach
	</ul>
	<div class="clearfix"></div>

</div>