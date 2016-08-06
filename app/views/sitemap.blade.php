<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{url()}}</loc>
        <lastmod>{{ Carbon\Carbon::now()->format('Y-m-d') }}</lastmod>
        <changefreq>always</changefreq>
        <priority>1</priority>
    </url>

    @foreach(SiteMap::getTypeUrlSiteMap() as $type)
    <url>
    	<loc>{{ url().'/game-'.$type->slug }}</loc>
		<changefreq>weekly</changefreq>
		<priority>0.8</priority>
    </url>
    @endforeach

    @foreach(SiteMap::getGameUrlSiteMap() as $game)
	    <url>
	    	<loc>{{ CommonGame::getUrlGame($game) }}</loc>
	    	<lastmod>{{ date('Y-m-d', strtotime($game->start_date)) }}</lastmod>
			<changefreq>weekly</changefreq>
			<priority>0.8</priority>
	    </url>
	@endforeach

	@foreach(SiteMap::getNewUrlSiteMap() as $new)
	    <url>
	    	<loc>{{ url().'/'.$new->type_slug.'/'.$new->slug }}</loc>
	    	<lastmod>{{ date('Y-m-d', strtotime($new->start_date)) }}</lastmod>
			<changefreq>weekly</changefreq>
			<priority>0.7</priority>
	    </url>
	@endforeach

	<url>
		<loc>http://choinhanh.vn/most-voted-games</loc>
		<changefreq>weekly</changefreq>
		<priority>0.8</priority>
	</url>

	<url>
		<loc>http://choinhanh.vn/best-games</loc>
		<changefreq>weekly</changefreq>
		<priority>0.8</priority>
	</url>

	<url>
		<loc>http://choinhanh.vn/game-android</loc>
		<changefreq>weekly</changefreq>
		<priority>0.8</priority>
	</url>

</urlset>
