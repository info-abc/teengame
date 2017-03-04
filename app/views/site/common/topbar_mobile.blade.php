<div class="top">
	<div class="container">
		<div class="row">
			<div class="menu-show"><a onclick="menushow()"><i class="fa fa-navicon"></i></a></div>
			<div class="logo">
				<a href="{{ url('/') }}"><img src="{{ url('/assets/images/logo.png') }}" alt="{{ CHOINHANH_LOGO_ALT }}" /></a>
			</div>
			
			<div class="search">
				<a class="iconfacebook" href="https://www.facebook.com/choinhanhvnn/"><i class="fa fa-facebook"></i></a>
				<a class="icongoogleplus" href="https://plus.google.com/113571525283953455277/" ><i class="fa fa-google-plus"></i></a>
				<form action="{{ action('SearchGameController@index') }}">
					<input type="text" name="search" value="" title="search" placeholder="Search games" />
					<input type="submit" value="search" title="submit" />
				</form>
				<a id="iconseach" onclick="menushow()" class="menu_show_list"><i class="fa fa-search"></i></a>
			</div>
	 	</div>
	</div>
</div>