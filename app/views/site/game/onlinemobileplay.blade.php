<?php 
	$checkHttp = strpos($game->link_url, 'http://');
	$checkHttps = strpos($game->link_url, 'https://');
	if($checkHttp !== false || $checkHttps !== false) {
?>
@if(isset($script))
	{{ $script->header_script }}
@endif
<iframe id='game_frame' webkitallowfullscreen='true' mozallowfullscreen='true' allowfullscreen='true' webkit-playsinline='true' scrolling='no' seamless frameborder='0' style='display:block;overflow:hidden;width:100%;height:100%' src='{{ CommonGame::getLinkGameDirect($game) }}'></iframe>
<?php } else { ?>
<!DOCTYPE html>
<html>
<head>
	<?php
		@header("Cache-Control: no-cache, must-revalidate");
		// $offset = 60 * 60 * 24 * 3;
		$offset = 60 * CACHETIME;
		$ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
		@header($ExpStr);
	?>
	<title>{{ $game->name }}</title>
	<meta charset="utf-8">
	<meta http-equiv="content-language" content="vi" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noodp,index,follow" />

    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=medium-dpi" name="viewport">
    
    <script type="text/javascript" src="{{ url('/assets/js/jquery-2.1.4.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('/assets/css/mobileplay.css') }}">
    <script type="text/javascript" src="{{ url('/assets/js/game.js') }}"></script>

    @if(isset($seoMeta))
		<meta name="description" content="{{ html_entity_decode($seoMeta->description_site) }}">
		<meta name="keywords" content="{{ $seoMeta->keyword_site }}">
		<meta name="title" content="{{ $seoMeta->title_site }}">

		<meta property="og:url" content="{{ Request::url() }}" />
		<meta property="og:title" content="{{ $seoMeta->title_fb }}" />
		<meta property="og:description" content="{{ html_entity_decode($seoMeta->description_fb) }}" />
		@if(isset($seoImage))
			@if($seoMeta->image_url_fb)
				<meta property="og:image" content="{{ url(UPLOADIMG . '/' . $seoImage . '/' . $seoMeta->image_url_fb) }}" />
			@else
				<meta property="og:image" content="{{ url(UPLOADIMG . '/avatar-game.jpg') }}" />
			@endif
		@else
			<meta property="og:image" content="{{ url(UPLOADIMG . '/avatar-game.jpg') }}" />
		@endif
	@endif

    @if(isset($script))
		{{ $script->header_script }}
	@endif
	
</head>
<body>

<script>
var apptype="";
var thegame_width=0;
var thegame_height=0;
var thegame_minwidth=0;
var thegame_minheight=0;
</script>
<img src='{{ url("/assets/images/menu/setting.png") }}' id="settingImg" style="display: block;">
<div id="TheGameDiv" style="width:100%; height:100%;">
	<iframe id='game_frame' webkitallowfullscreen='true' mozallowfullscreen='true' allowfullscreen='true' webkit-playsinline='true' scrolling='no' seamless frameborder='0' style='display:block;overflow:hidden;width:100%;height:100%' src='{{ CommonGame::getLinkGameDirect($game) }}'></iframe>
</div>
<div id="similargames_container" style="width: 300px; height: 300px; display: none;">
	<div id="similargames">
		<div class="similargames_title">
			<div class="similargames_title_home left"><a href="/"><img src='{{ url("/assets/images/menu/home_w.png") }}'></a></div>
			<div class="similargames_title_icons right"><img src='{{ url("/assets/images/menu/close.png") }}' id='CloseSimilarGamesImg'></div>
			<div class="similargames_title_logo" id='similargames_title_logo'><a href="/"><img src='{{ url("/assets/images/logo.png") }}'></a></div>
		</div>
		<div id="similargames_content">

				<div id="div_scroll" class="enable_scroll">
					<ul class="mnRight" id="mnRight" style="overflow-x:hidden;">
						<li>
							<a class="orange" title="Back" href="javascript:void(0);" onclick="javascript:history.go(-1);return false;" style="display:inline-block !important;font-size:16px !important;"><img alt="Back" src="{{ url('/assets/images/menu/mnBack.png') }}"/>Quay lại</a>
							<a class="green" title="Home" href="/" style="display:inline-block !important;font-size:16px !important;"><img alt="Home" src="{{ url('/assets/images/menu/mnHome.png') }}"/>Home</a>
						</li>
						<li>
							<div class="searchBox">
								<form action="/search-game" method="get" id="frm_search_box_menu" name="frm_search_box_menu">
									<input type="text" name="search" class="searchTextBox" placeholder="Search" /><a href="javascript:void(0)" onclick="document.frm_search_box_menu.submit()" title="Search" class="searchBtn"><img alt="" src="{{ url('/assets/images/menu/search-icon.png') }}"/></a>
								</form>
								<div class="clear"></div>
							</div>
						</li>
						<li>
							<ul>
								<li style="border-bottom: 1px solid #d5d5d5 !important;font-size:16px !important;">
									<a href="/girl-games" title="Girls" style="font-size:16px !important;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAMAAAANIilAAAAB3VBMVEV9fX3///99fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX3m7/u4AAAAnnRSTlMAAAECAwQFBgcICQoMDg8QERIUFRYXGBkgISIjJCYnKSo0NTk6Oz0+REVGR0hKS09QUVNVVlpbXF5gYWJjZWZnaXBxcnN0dXl6e31+gIKDhIuMjZWWl5iam5ydn6Chpaaqra6wsbK0tba4u8PEx8nKy83Oz9HS1NXW19jZ2tvc3d7g4eLj5OXm5+jp6uvs7e7v8PHy8/X29/j6+/z9/lvtkogAAANQSURBVEjH7ZbpW1JBFMbf48XAyDSjzbKszNTKVtFssX0PW6Q0SyutqGzRJG0xabFMLApSk+T9W/swcy+QXMKnp2+eT+85c36zPTNzBvIPhnl4Hs4BRkbz1Pv7wonJD0/99Z7MGX/AzuIFWm3s+kXLfnVV6PCCYmdmeM2lFzNMvGmt2Vm/vjPBNEt0rq/fWdP6JsGZF5fWzIIdzdPM0aabHemwM8A5WMCZBneq2bXWeqfsmSlvbataT0cq3KhaTwAYtIcHAZxQcm8SXhwmSfYbgDtkDw+7AaOfJBlebMGnVeMBAGeyrfUsgINKnjZhx4gKrAAWfbMyf84S/FIAeGZIkiOGhqv1rADssxK73prqbZcV9AJ4rmS1hi/T2sK7ZtpYRXK2FWNWjwBuKHlZw6+tFRk/zLTGuiRc12iq8TzgpJKvFezRLQ1AqZk1YPiSsM8YMOVKYI+WHhGIbNHeZqCSVkfXknA7Gky5Adik5RYRiBzX3lqgVsuvTtxMwnfh+qrlVmCtlsdFINKivWVJ+CpwPwk/BK5qWQss07JFBCLmnXBpOBqJbAcCEcsCwPZIJKphl3k7RCDSq5wJaHhp5odjqYYxqfJ7RSCiT8N3DY/BxsY0/F2fHRGIaOcj4LxNstcO7iV52wl80oOJQCSqnHeAjyTPq9Rdw0/KAKDsSWiXipzXre9SYb0Br+COkfcr89SzFCVvAcAtMqqenbzKe2TMbR5IikDkYowkGUQVOV6g5+iaJLsBoJuccJnBcbIKQZJk7II620WnPpMMoo7ssVbofd+3DgDK+957rWAPWYcgyc8ni6xnqKBpiEFsI0fzkcXyR8ltCHKoqSDt6TV2t2NJnDyWDT5CThWjfbeRqWK0kYkztmPnN8+QbbblZkmI5FCjKxO68NAQyeESWxirX5LkowyD5z8myZel9oUOKPTHSR6eDR8mGfcXIhsMlAbIWNmfbFmMDJRmLbEAgJIw2edOj7mfkeES/B3GjgT5IG3TXA/IxA7kAsNHsiflO+DpIelDbrBxnWS4QV0HOBrCJK8bOcJw+Eky1FxTXl51LkSSVxzIFQb2TaQWuMn9OXxoUmxVh/XNmO5YhbnBwPKj3SPx+MidoyuQ5Ss1/3Gdh/8j/BvjtX4qXGpvuQAAAABJRU5ErkJggg==" alt="">Girls</a>
								</li>
							</ul>
							<ul>
								<li style="border-bottom: 1px solid #d5d5d5 !important;font-size:16px !important;">
									<a href="/cooking-games" title="Cooking" style="font-size:16px !important;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAMAAAANIilAAAAB2lBMVEV9fX3///99fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX0owmCAAAAAnXRSTlMAAAECAwUGBwkKDA0OEBQVFhcaHR4gIiMkJSgpKiwuLzAxMjQ1Njc4OTs8P0BBQkRFRkdISUpLTE1OUFFVVldYWVpbXV9gYWJjZGVmaGlrbW5wcXJzdHZ3ent8fn+AgoSFh4uMkJOUlpibnqKlqq2vsbO3uLq7vb6/wsXGx8jMztDT1tfa3d7h4uXn6Onq6+zt7/Dz9PX29/n6+/z+vehuCQAAAitJREFUSMft1+lbTGEYx/GvSSNrlpIlIoQZGZE92UlRjaUhwoiyhuzJWoYwypg0pvP7X70YriszZ+vMO/xennN9rus5zzn3c9+HKXmEfxRjkYXHCwHwnyjNXKitmXjbFk97qwYAonoIwKp0ep5b3CTVABSP6QYAD/R5ulvco34A6qUSgMK0Iq6X3avHAByRZgIUScdc40tKlQIsl8IADKjP5xaXpdTrA+hTogSgVTrkFnNF2gdQNa67AP4BjRS7xUUxvQLgmozFAAGpwy2mUZoPMDeltl97+CIH1z/tWWSGl0prAXijLgDaNZSNVxvSx3ITHJLKAAriOg9Al15n4zOSFK/IxVF9KABYKa0DYFDXs3HAkKThyhxc/aUFgBkvn2Ve8OXhZTnP3C5J+lrFpPJ7tyOSpMR6T5jThiR9C3rCNBuSNLrJE6bRkKTvWzxhDo9LUmqnJ8z+jD5Z98hVGv78tut+aBKJZhXGrlQemK1jeWA2j+aBqU46qnhT84g5JpB2wm3QaoFJOOEw7PaML8A2z7gTglZ4Q8gBd0PACoMDvgWV+eCgZ9wNOzzji3DAMz4I57xiYwHcscb2ZX0fpo5IOmuOY3b2fSlsl6Qmc3zbxl6dA77nkrTCHNda23sApyRpyGfRn59Y4pvgyzSIDqvmvsSyOJJ79/RLkmKzLCeDjU6nUbLSZqyoGLS1n9bYziT+lneWNNE523GgKT8aMUs45J/Ybv7/Y/z9+CfVorQCOpmg4gAAAABJRU5ErkJggg==" alt="">Cooking</a>
								</li>
							</ul>
							<ul>
								<li style="border-bottom: 1px solid #d5d5d5 !important;font-size:16px !important;">
									<a href="/action-games" title="Action" style="font-size:16px !important;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAMAAAANIilAAAAB2lBMVEV9fX3///99fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX0owmCAAAAAnXRSTlMAAAECAwQFBgcICQoMDQ8QERIVFhgZGhscHR4fISMlJicoKSosLTE0Nzo9Pj9AQkNFRkdITE5PU1ZZWlteYGNmaGlqa29xdXh6e3yCg4SGh4iJi42PkZOXmJmdn6Gio6Slpqmqq6yvsLGytru9v8DDxMbHyMrLzM3P0NLT1NjZ2tvc3uDh4uPo6err7O3u7/Dx8vP19vf4+fr7/P3+Fr1XZAAAAnxJREFUSMfF19lX00AUBvDPVCjIjogFERdwLe4gCipL1YJbcV9Qq2hVEBUVRYoILiCCLFIUaPv9rz6EtEkay2364DzNSc/vzM2dO3dSrEljID0Mm+NwGrhixj5Wumkfn+GSbVwf5qRd3LpMvreHywIk2WkHl16aJ0l6UsWOqpbny1THFhneePt6h7et41qgf46xMQgZPkeL4ZFh5bOF/VUgw0etFr4AGX5nYX8WynCd1cJNEOGsEQvbp8iw18LOVkCEK+Yt8DGIsPJSvz3+1yGS9EGGPfoFo5uQcehx9Ikiw9tDhnC9AFCdAxFeFzS+67BD/+sq+KY5U8fl+GRCmocUKd61kIA7pbh4zEwjXiQJu7Rv7Ig2d/aZ7UwtkuHL5JBWHX6z/bAZSXGAHF6ZXjSHfDULyfEr8o06a4wa7fiBxKSY8AjZo57hJaPtKsSqeI68DwC7jVU52WC5HUacTbIbQPUPg71XDAEuCKnFf8JQzwf/VQimsOvCZLQR8MXovNcJIUYLycX9sU2O3NmQ5NgklKeP5OwOOHtJ8sXOpI3CjNfeIMlxF/KDDNau0hpNOOepGm4wH64GB1LC699qeep1Cu5bA67UXWh3U8R7pjQZJnkqJVz/W2uw3rowOZUrxXlNtx5EVuyfBqCNZLMQuyfiLzu9D0D2FBmQ4a26M/S1CgDwjByQ4a64HShRnz8iP8nwbMz2aFn6SPaKsDPep7Ra3kvyvGzlb/FOtQ0AUP6FjFbKsE935Z8tU0o80yT9wiLJHVTloq5/jBZJK6zoYZhcuFLeH2/wrhRqu6TGnQdktH4nSU60ZyPVUwUgs6a5/bQ7U/YJnPb/qv+F/wKm++K77lXdGAAAAABJRU5ErkJggg==" alt="">Action</a>
								</li>
							</ul>
							<ul>
								<li style="border-bottom: 1px solid #d5d5d5 !important;font-size:16px !important;">
									<a href="/fashion-games" title="Fashion" style="font-size:16px !important;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAMAAAANIilAAAABrVBMVEV9fX3///99fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX1bEdiQAAAAjnRSTlMAAAECAwYHCAkKDA0PERIUFRYXGBkaGx8iJCkqLi8wNDg8P0FCRUZHSExNTlJTVVZXWVpbXl9gYmRlZmlqbW9wcnN0dnd4eXp8f4GChYeIjY+Sk5SVlpqfoaKlqKqssbe6u7y9wcLFxsfIysvMzc7U1dbY2dvc3d/g4ePl5+nr7O3u7/D09fb3+fr7/P3+wlw55gAAAeVJREFUSMft1/s3FGEYwPHHsmorLCrpoqXShZLupduKQtlSbdtQVqSrZLsIhcK226bv39wPiWHemXkcP3ROx/e358z5nHnPzDvvOSN5a0jW8b/AYq8TuheHOMSXXf0fccnZ13b8EN5f3qLDgetpgOnGP2N5LwCTNSpcy0IDO0UKLs0sTG9VeD+Q7P4BZGP7hgFS7Z9gUIXzx+COVD3/u4BMe7AoA+d1D+wGfNso+eemAEhWilyEuc06vDUHp0Wk5ME840dFRN5AQvuqHsMzERGpOrlJRGQPUK3FB4DdtrkL3gW0OPAR7i+NhV+hRb89r0F2dLEJyJXrcTjL8oZW8WFUZFZgjujxo5WWz0VaXIczS4nLJg3YvnAPXPDEZO0L98AdmEso8MF5F8xhX1w562b5UuyDQyO41+OD43h1zBMf+uWJp7d74A2jeNcfcMc38euqKy6d88WZXW74Nv71ueDwdwUmYsZRjcUy45QKzwZNOIKuWhPuVOKYCQ8r8YABh3JKPGPAe9EWduIGNY44cZMa1ztxixpfcOIratzsxGfUuNWJa9Zy56B2k0ztMOywUFdWQX/2VJgPg21tyaGn8RO3el/2x+rupdLpkbvWiw+vEo1Rq2/QOnU82tZcX2o8DNZ/UHT9Bt1IvSh8LwHtAAAAAElFTkSuQmCC" alt="">Fashion</a>
								</li>
							</ul>
							<ul>
								<li style="border-bottom: 1px solid #d5d5d5 !important;font-size:16px !important;">
									<a href="/puzzle-games" title="Puzzle" style="font-size:16px !important;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAMAAAANIilAAAABTVBMVEV9fX3///99fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX1Zgj9lAAAAbnRSTlMAAAECAwQGBwgLDA4PFBUWISMsLi8xMzY3ODk7PD0+P0BBREVGR0hJSktOUFFWV15fY252d3h6hIiJjqGlpqusra+xsrS1trm6w8XGyczN0tPU1dfa29zd3+Hj5Obn6ert7/Dx8vP19/j5+/z9/l86aIoAAAHYSURBVEjH7ddXV8IwGAbgKopMcaKI4AABFffeA9wTFRRRlFEEwfz/S1tKC22/NCme4xW5Sk/ynEK+N23KtP2hMS3cFGbAFky/++ARMp4uIfQ11RzmLU6TsGAbdbvDTIlDNStp69YHQrfzNLhua7r7QbjYJuNGK+gT8SJMwn6Z5fTskNS/IuEowrdyBwFbl7N43UVcsD6sfqIo1QIOr1JgQxq2l0aahJ1C9HvHQhXPCGR7NOLpO7NJOAndOYTHwZKwHNWcgP+44MPhYBEhdkAYdSSQllZh3iKUWerk+oEErlKCVuJAsTb8eR591YhnVSuwZImtMKnE9LaqZViP5fS4DKeQrhaX4aQ+/CjDnoIem3PJF8yrQ+fcylLRa86qQqKp73ePUg1WHU+8jjn598VcRrLAxhjD6Fhtn/bnEcq7cVsSo0fEbboiWvhhABZVej7YDl0aTxJnGcD7VK9Ye+QHuvMxDbbcweuVNlDgDVylFinwGw5nB4nYjM8Xu2YnYGNFmlxS8QPSz74WZ1Z6/Yq0sMMkHBan7jHMhEyzo+Q6bwpTb/goN2q1hRI2c1FG8XVTtV/XrIfyEGcwSeOihiz5+Cho0FIcXHkNWwrMeF+e3RRH5tYHyr/gXxLDEHUCG7oFAAAAAElFTkSuQmCC" alt="">Puzzle</a>
								</li>
							</ul>
							<ul>
								<li style="border-bottom: 1px solid #d5d5d5 !important;font-size:16px !important;">
									<a href="/funny-games" title="Funny" style="font-size:16px !important;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAMAAAANIilAAAABaFBMVEV9fX3///99fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX3eW2XZAAAAd3RSTlMAAAEDBAYHCREUFRcYGRobHCEpKisuLzEyMzQ1Nzg5Ozw+P0NERUZHSk9QU1VWW1xdX2BhYmNmaGprbHJ2eHp7fYSFh4mPkJicn6SlpqerrrCxtsTFxsnKy8zT1tfc3uDh5OXm6uvs7u/w8fLz9PX2+Pn6+/z9/t83e6IAAAHFSURBVEjHxZdnU8JAEIZjQ7FExIJdQMUG9t6wlyAgNsAOAoKioEHu7wsmzDi4V+INw37Kzs4Dyd3eu+8JFRwhlBcWtAYN1lk2Jf9TGsnRG++2vUEDrLP7Uuh3ZAPrIhtctxVDf+PzxEiHq9cSCA75SKTApmuEj+cpIryaRsRw12LhqkMIyOz3GhdDauIXMXCNF/y3mXxNDKvZQwsIV0oge6VUlwv5nQGCd+HPPFCqXYU80gbA41kYdillm5rGOoDXbo5jFjih/6mr3xTvhBbMg92e86Zc6zjVX+qBtmqYsLmpM/ej8vTSDzbJBWKINzPYYYMs7LsV7u1TFnYIPlV6mc6mRzBHco7OfozixECis2NYJQnTWHkCq2H1NDbjwAugmcZOEtRzmsx+zZJ0e4XIZheIor9BZJeE0sFcr821YFxbxdUkXO3JdzDmeY4klxgIPg4ZYhRAC2a4X7LQyQEYtrHAKNEHOwMPG90NwthBV2RLTKAzwI3Yooi2g85gjwlGkVYNtqI47g2woWGZWBhDkxvhx1Q2KJbExHHax7xxff23ceWzzLBZD7KadYW3Ol2BUBwlw7feHUejtjsG1wWFGS7LpewbOFwJvlsHCcQAAAAASUVORK5CYII=" alt="">Funny</a>
								</li>
							</ul>
							<ul>
								<li style="border-bottom: 1px solid #d5d5d5 !important;font-size:16px !important;">
									<a href="/racing-games" title="Racing" style="font-size:16px !important;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8AgMAAABHkjHhAAAACVBMVEX///99fX38/PzhJnFPAAAAAXRSTlMAQObYZgAAAJJJREFUKM/t0iEOwkAQRuE/deA5AKKit0HwJm3VmjbQU+whGI+p2VMiutssmgTV575sZpJJVjr6Q40zxsorYO+dJwAsat3sADB2SOeojpJJLVU3NTXp1bLkaUanlxvPbB/ohWF5F0YQQ5kdwIOY4FI8bfZioqCyx+/3WdU+4CXpyj2llNK8YFGSPOSr28fxMX7tA7nlTw2QORwjAAAAAElFTkSuQmCC" alt="">Racing</a>
								</li>
							</ul>
							<ul>
								<li style="border-bottom: 1px solid #d5d5d5 !important;font-size:16px !important;">
									<a href="/sport-games" title="Sport" style="font-size:16px !important;"><img src="data:image/png;base64,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" alt="">Sport</a>
								</li>
							</ul>
							<ul>
								<li style="border-bottom: 1px solid #d5d5d5 !important;font-size:16px !important;">
									<a href="/strategy-games" title="Strategy" style="font-size:16px !important;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAMAAAANIilAAAACB1BMVEV9fX3///99fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX1osDmIAAAArHRSTlMAAAECAwQFBgcICQoLDg8QERITFBYXGBkbHB0fICQnKCosLi8xMzQ2Nzg5Pj9AQUNERUZISUtOUFFSU1RVVldZW11gYWRlZmdpamtsb3FydXZ3eHp8fX+AgYKEhoeIiYqMjY6QkZKTlZmanJ2en6Cio6Slpqeoqaqrra6ztLq7vL2+v8HCxMbJyszN09TV1tnb3N3e4+Xm5+jp6uvs7u/w8fP09fb3+Pn6/P3+NauexQAAAnhJREFUSMfl1/lfTFEYx/FjqmlTbkkp2bdKthiEsmWXEtmyZYlChQiZolAoa9mSmkjNzOeP9MO9defe6d45N37x8vx4Xt/3a8595jx3EdP+oMQ/jIXDWqsIYYfzmt6+vphigTs9tvhYEOBD5qQ2frTMDucGAaAtlKTPyyko2lNeddVLX/tja3xOtYzMcpWcv9bs7Xzz+RcT1Vi6qzDXGtdqsaWuWsw10B4jhN22j2vBHVdCVNmGFYvnzBiPWONVYb9H4G6UIWKJU/YGNNL7tKWx5nQzo+UZpowFTmzSm9OaLIRw9/AlS8jhitDdfj+piKOARxI/NF7sUPUItLgkcUd4t3wzhSS+HY5rhCxeEtDV8IlXwGC2NBb3dHxTRG28780T8niljj2WMz05zi/bre872xmuNHSqyBGO6Y/UZhtcYPyPrjvCdUb8xAl2fzMN4iIHeJ35bHXFyuMSMx7Ll8exh7wjBnzA2SFJvBSKfyx0hEWV8aJdjnCjerZ2ajf+TY7wc4CxJFHiB6AvywF2+wBahRCFwwC8my2NF6jTvFkIIXIGAWiQxGl31HF8pLbJ4wfolcPpvWqTXiRrCzcAyJTCxartTxtfWG051eE4wQdA6cRCKgD1Unib9mTVjxsAP+MkcOpH9VDpz8MkP0BHVGSc0QW83F+phGTmNwBxEbc9vdoH1MWbQvuA5Eg44RnAhbDQYWB9JDx3FBhwh4XqgU8H1yxLt9329iAMpZpt9FdtNIOVtg2rALofdC83ZLImBrvHvtu3ADhlyMR2v9fqsj2OVhRFUeLlXl6n/Nb79/DWIw5qiwkHcFB+Ey4+K19nikz4f/w0mmr9BhcD9gbnB3hAAAAAAElFTkSuQmCC" alt="">Strategy</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clear"></div>

		</div>

		</div>
		<div style="clear:both;"></div>
	</div>
</div>

@if(isset($script))
	{{ $script->footer_script }}
@endif

</body>
</html>

<?php } ?>