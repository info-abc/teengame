<link media="all" type="text/css" rel="stylesheet" href="/assets/css/font-awesome.min.css">
<link media="all" type="text/css" rel="stylesheet" href="/assets/css/style-import-menu.css">
<style type="text/css">
	div {
	    -webkit-transform: none !important;
	}
</style>
<div class="menu-import">
	<div class="menu-button">
		<a onclick="javascript:document.getElementById('cssmenu').style.display = 'block';" class="menu_show_list"><i class="fa fa-navicon"></i></a>
	</div>
	<div id="cssmenu">
		<div class="menu-button-close" onclick="javascript:document.getElementById('cssmenu').style.display = 'none';"><i class="fa fa-times"></i></div>
		<div class="search1">
			<form action="/search-game">
				<input type="text" name="search" value="" title="search" placeholder="Search games">
				<input type="submit" value="search" title="submit">
			</form>
		</div>
		<ul>
			<li>
				<a class="menu-button-home" href="/"><i class="fa fa-home"></i> <span>Home</span></a>
				<a class="menu-button-back" href="javascript:window.history.back();"><i class="fa fa-arrow-left"></i> Back</a>
			</li>
			<li><a href="/girl-games"><span>Girls</span></a></li>
			<li><a href="/racing-games"><span>Racing</span></a></li>
			<li><a href="/action-games"><span>Action</span></a></li>
			<li><a href="/puzzle-games"><span>Puzzle</span></a></li>
			<li><a href="/cooking-games"><span>Cooking</span></a></li>
		</ul>
		<div class="menu-hide"><a onclick="javascript:document.getElementById('cssmenu').style.display = 'none';"><i class="fa fa-times-circle-o"></i> Close</a></div>
	</div>
</div>
{{-- GA --}}
<?php
	if (Cache::has('script'.SEO_SCRIPT))
	{
	    $script = Cache::get('script'.SEO_SCRIPT);
	} else {
        $script = AdminSeo::where('model_name', SEO_SCRIPT)->first();
	    Cache::put('script'.SEO_SCRIPT, $script, CACHETIME);
	}
	if(isset($script)) {
        echo $script->header_script;
	}
?>
