<!-- menu -->
<div id='cssmenu'>

	@if(CommonSite::isLogin() )

	<?php
		if($image_url = Auth::user()->get()->image_url) {
			$avatar = url(UPLOADIMG . UPLOAD_USER_AVATAR . '/' . $image_url);
		} else {
			$avatar = url('/assets/images/avatar.jpg');
		}
	?>

	<div class="menu-account">
          <a href="{{ action('AccountController@account') }}" class="account-name"><img src="{{ $avatar }}" height="32" width="31" /> {{ Auth::user()->get()->user_name.Auth::user()->get()->uname.Auth::user()->get()->google_name }}</a>
          {{-- <a href="#" class="game-favorite"><i class="fa fa-thumbs-o-up"></i> Game bạn yêu thích</a> --}}
          {{-- <a href="#" class="game-played"><i class="fa fa-gamepad"></i> Game bạn đã chơi</a> --}}
          <a href="{{ action('SiteController@logout') }}" class="signout"><i class="fa fa-power-off"></i> Sign out</a>
    </div>
    @else
	<div class="menu-login">
		<a href="{{ action('SiteController@login') }}" class="signin"><i class="fa fa-user"></i> Sign in</a>
		<a href="{{ action('AccountController@create') }}" class="signup"><i class="fa fa-user-plus"></i> Register</a>
	</div>
	@endif

	<div class="search1">
		<form action="{{ action('SearchGameController@index') }}" >
			<input type="text" name="search" value="" title="search" id="searchmenu" placeholder="Search games" />
			<input type="submit" value="search" title="submit" />
		</form>
	</div>
	<ul>
		<li class='active'><a href="{{ url('/') }}" class="color1"><i class="fa fa-home"></i> <span>Home</span></a></li>
		@foreach($menuHeader = CategoryParent::where('status', ACTIVE)->where('position', MENU)->orderBy('weight_number', 'asc')->get() as $key => $value)
			@if($value->position == MENU)
				@if(count($value->parenttypes) == 0)
					@if($value->id == MENU_GAME_ANDROID)
						<li><a href="{{ action('GameController@getListGameAndroid') }}" class="color2"><span>{{ $value->name }}</span></a></li>
					@else
						<?php
						// if($value->id == MENU_GAME_ONLINE) {
						// 	$slug = 'game-online';
						// }
						// else {
						// 	$slug = $value->slug;
						// }
						?>
						<!-- <li><a href="{{-- url('/' . $slug) --}}" class="color2"><span>{{-- $value->name --}}</span></a></li> -->
					@endif
				@else
				<li class='has-sub'><a href= '#' class="color2"><span>{{ $value->name }}</span></a>
					<ul>
					@foreach(SiteIndex::getTypeOfParent($value->id) as $k => $v)
						<li><a href="{{ url(SiteIndex::getFieldByType($v, 'slug').'-games') }}"><span>{{ SiteIndex::getFieldByType($v, 'name') }}</span></a></li>
					@endforeach
					</ul>
				</li>
				@endif
			@endif
		@endforeach
		<!-- <li class="has-sub">
			<a href="#" class="color2"><span>Tin game</span></a>
			<ul>
				@foreach(SiteIndex::getTypeNewMenu() as $kTypeNew => $vTypeNew)
					<li><a href="{{-- url($vTypeNew->slug) }}"><span>{{ $vTypeNew->name --}}</span></a></li>
				@endforeach
			</ul>
		</li> -->
	</ul>
	<div class="menu-hide"><a onclick="menuhide()"><i class="fa fa-times-circle-o"></i> Close</a></div>
</div>