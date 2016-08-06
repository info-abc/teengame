<?php 
	if(isset($typeNew)) {
		$typeNewName = $typeNew->name;
		$typeNewSlug = $typeNew->slug;
		$typeUrl = action('SlugController@listData', [$typeNew->slug]);
		$canonical = null;
		$ogUrl = url($typeNewSlug.'/'.$inputNew->slug);
	} else {
		$typeNewName = 'News';
		$typeNewSlug = 'news';
		$typeUrl = url('news');
		$typeNew = TypeNew::find($inputNew->type_new_id);
		$canonical = action('SlugController@detailData', [$typeNew->slug, $inputNew->slug]);
		$ogUrl = url('news/'.$inputNew->slug);
	}
	$now = date('Y-m-d');
	$inputRelated = AdminNew::where('type_new_id', $inputNew->type_new_id)
		->where('start_date', '<=', $now)
		->where('start_date', '<=', $inputNew->start_date)
		->where('id', '!=', $inputNew->id)
		->orderBy(DB::raw('RAND()'))
		->limit(PAGINATE_RELATED)
		->get();
	$inputHot = AdminNew::where('start_date', '<=', $now)
		->where('id', '!=', $inputNew->id)
		->orderBy('start_date', 'desc')
		->limit(PAGINATE_RELATED)
		->get();

?>
@extends('site.layout.default_pc', array('seoMeta' => CommonSite::getMetaSeo('AdminNew', $inputNew->id), 'seoImage' => FOLDER_SEO_NEWS . '/' . $inputNew->id, 'canonical' => $canonical, 'ogUrl' => $ogUrl))

@section('title')
	@if($title = CommonSite::getMetaSeo('AdminNew', $inputNew->id)->title_site)
		{{ $title = $title }}
	@else
		{{ $title = $inputNew->title }}
	@endif
@stop

@section('content')

<div class="box">
	<?php
		$breadcrumb = array(
			['name' => $typeNewName, 'link' => $typeUrl],
			['name' => $inputNew->title, 'link' => '']
		);
	?>
	@include('site.common.breadcrumb', $breadcrumb)

	<div class="title_left">
		<h1>{{ $inputNew->title }}</h1>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-sm-8">

			@if($inputNew->sapo != '')
				<p class="sapo">{{ $inputNew->sapo }}</p>
			@endif

			@include('site.common.ads', array('adPosition' => POSITION_NEWS_SAPO))

			<div class="detail">
				{{ $inputNew->description }}
			</div>
			<div class="clearfix"></div>
			@if($inputHot)
			<div class="related">
				<h3>Latest News</h3>
				<ul>
					@foreach($inputHot as $value)
					<?php 
						$inputHot_typeNew = TypeNew::find($value->type_new_id);
						if(count($inputHot_typeNew) > 0) {
							$inputHot_typeNew_slug = $inputHot_typeNew->slug;
						} else {
							$inputHot_typeNew_slug = 'news';
						}
					?>
					<li><a href="{{ action('SlugController@detailData', [$inputHot_typeNew_slug, $value->slug]) }}" title=""><i class="fa fa-caret-right"></i> {{ $value->title }}</a></li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
		<div class="col-sm-4">
			@if($inputRelated)
			<div class="related">
				<h3>Related News</h3>
				<ul>
					@foreach($inputRelated as $value)
					<?php 
						$inputRelated_typeNew = TypeNew::find($value->type_new_id);
						if(count($inputRelated_typeNew) > 0) {
							$inputRelated_typeNew_slug = $inputRelated_typeNew->slug;
						} else {
							$inputRelated_typeNew_slug = 'news';
						}
					?>
					<li><a href="{{ action('SlugController@detailData', [$inputRelated_typeNew_slug, $value->slug]) }}" title=""><i class="fa fa-caret-right"></i> {{ $value->title }}</a></li>
					@endforeach
				</ul>
			</div>
			@endif
			@include('site.common.ads', array('adPosition' => POSITION_NEWS_RIGHT))
		</div>
	</div>

</div>

@stop