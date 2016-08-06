<div class="menu-top">
<div class="container">
		<div class="row">
			<div class="menu-static">
				<ul>
					<li><a onclick="menushow()" class="menu_show_list"><i class="fa fa-navicon"></i><span>Menu</span></a></li>
					<li><a href="{{ url('/') }}" {{ checkActive() }}><i class="fa fa-home"></i><span>Home</span></a></li>
					<li><a href="{{ action('GameController@getListGameVote') }}" {{ checkActive('most-voted-games') }}><i class="fa fa-star"></i><span>Most voted</br></span></a></li>
					<li><a href="{{ action('GameController@getListGameplay') }}" {{ checkActive('best-games') }}><i class="fa fa-gamepad"></i><span>Best games</span></a></li>
					<li><a href="{{ action('SiteNewsController@index') }}" {{ checkActive('news') }}><i class="fa fa-newspaper-o"></i><span>News</span></a></li>
					<li><a href="{{ action('GameController@getListGameAndroid') }}" {{ checkActive('game-android') }}><i class="fa fa-android"></i><span>Android</span></a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>