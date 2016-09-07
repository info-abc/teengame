<?php 
	if(isset($typeNew)) {
		$seoMeta = CommonSite::getMetaSeo('TypeNew', $typeNew->id);
		$typeNewTitle = (isset($seoMeta) && !empty($seoMeta->title_site))?$seoMeta->title_site:$typeNew->name;
		$ogUrl = url($typeNew->slug);
	} else {
		$seoMeta = new stdClass();
		$seoMeta->title_site = 'Free games News|Teengame.net';
		$seoMeta->description_site = 'Check out the latest video game reviews, release dates, trailers and news. Read and watch exclusive content about your favorite video games!';
		$seoMeta->keyword_site = 'free games news';
		$seoMeta->title_fb = 'Free games News|Teengame.net';
		$seoMeta->description_fb = 'Check out the latest video game reviews, release dates, trailers and news. Read and watch exclusive content about your favorite video games!';
		$seoMeta->image_url_fb = '';
		$typeNewTitle = $seoMeta->title_site;
		$ogUrl = url('news');
	}
?>

@extends('site.layout.default_pc', array('ogUrl' => $ogUrl, 'seoMeta' => $seoMeta))

@section('title')
	{{ $title = $typeNewTitle }}
@stop

@section('content')

<div class="box">

	<?php
		$breadcrumb = array(
			['name' => $typeNewTitle, 'link' => '']
		);
	?>
	@include('site.common.breadcrumb', $breadcrumb)

	<!-- <div class="title_center">
		<h1>{{-- $typeNewTitle --}}</h1>
	</div> -->
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-sm-8">
			@if(count($inputListNews) > 0)
				<div class="list">
					@foreach($inputListNews as $value)
					<?php 
						if(!isset($typeNew)) {
							// $typeNew = TypeNew::find($value->type_new_id);
							$url = action('SlugController@detailData', ['news', $value->slug]);
						} else {
							$url = action('SlugController@detailData', [$typeNew->slug, $value->slug]);
						}
					?>
					<div class="row list-item">
						<div class="col-xs-4 list-image">
							<a href="{{ $url }}">
								<img class="image_fb" src="{{ url(UPLOADIMG . '/news'.'/'. $value->id . '/' . $value->image_url) }}" />
							</a>
						</div>
						<div class="col-xs-8 list-text">
							<h2>
								<a href="{{ $url }}">
									{{ $value->title }}
								</a>
							</h2>
							<p>{{ CommonSite::getSapoNews($value) }}</p>
						</div>
					</div>
					@endforeach
				</div>
				@if($inputListNews->getTotal() >= FRONENDPAGINATE)
					@include('site.common.paginate', array('input' => $inputListNews))
				@endif
			@endif
		</div>
		<div class="col-sm-4">
			@include('site.common.ads', array('adPosition' => POSITION_NEWS_LIST_RIGHT))

			@include('site.News.boxGameRandom_cronjob', array('device' => 2))
			@include('site.News.boxGameTop_cronjob', array('device' => 2))
		</div>
	</div>
</div>

@stop