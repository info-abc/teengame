<div class="menu-top">
<div class="container">
		<div class="row">
			<div class="menu-static">
				<ul>
					<li><a href="{{ url('/') }}" {{ checkActive() }}><i class="fa fa-home"></i><span>Home</span></a></li>
					@if(getDevice() == COMPUTER)
						<li><a href="{{ action('GameController@getListGameVote') }}" {{ checkActive('most-voted-games') }}><i class="fa fa-star"></i><span>Most voted games</br></span></a></li>
					@else
						<li><a href="{{ action('GameController@getListGameVote') }}" {{ checkActive('most-voted-games') }}><i class="fa fa-star"></i><span>Most voted</br></span></a></li>
					@endif
						<li><a href="{{ action('GameController@getListGameplay') }}" {{ checkActive('best-games') }}><i class="fa fa-gamepad"></i><span>Best Games</span></a></li>
						<!--<li><a href="{{-- action('SiteNewsController@index') --}}" {{-- checkActive('news') --}}><i class="fa fa-newspaper-o"></i><span>News</span></a></li>-->
					@if(getDevice() == COMPUTER)
						<li><a href="{{ action('GameController@getListGameAndroid') }}" {{ checkActive('game-android') }}><i class="fa fa-android"></i><span>Game android</span></a></li>
					@else
						<li><a href="{{ action('GameController@getListGameAndroid') }}" {{ checkActive('game-android') }}><i class="fa fa-android"></i><span>Android</span></a></li>
					@endif
				</ul>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>