@extends('site.layout.default')

@section('title')
{{ $title='Search games' }}
@stop

@section('content')

@include('site.common.ad', array('adPosition' => CHILD_PAGE, 'modelName' => 'CategoryParent', 'modelId' => 1))
<div class="box">
	@if(count($inputsearchGame) > 0)
		<div class="title_left">
			<h1>Search result for keyword "<span style='color:red;'>{{ isset($input['search'])?$input['search']:'' }}</span>"</h1>
		</div>
		@foreach($inputsearchGame as $value)
			<div class="row list-item">
				<div class="col-xs-2 list-image">
					<a href="{{ CommonGame::getUrlGame($value) }}">
						<img class="image_avata_game" src="{{ url(UPLOADIMG . '/game_avatar'. '/' . $value->image_url) }}" alt="{{ $value->slug }}" />
					</a>
				</div>
				<div class="col-xs-10 list-text">
					<h3>
						<a href="{{ CommonGame::getUrlGame($value) }}">
							{{ limit_text($value->name, TEXTLENGH) }}
						</a>
					</h3>
					@if($value->parent_id == GAMEOFFLINE)
						<span>{{ getZero($value->count_download) }} play</span>
					@else
						<span>{{ getZero($value->count_play) }} play</span>
					@endif
					<p>{{ limit_text(strip_tags($value->description), TEXTLENGH_DESCRIPTION) }}</p>
				</div>
			</div>
		@endforeach
	@else
		@include('site.common.boxgame', array('inputSearch' => isset($input['search'])?$input['search']:'', 'text' => 'result for keyword'))
	@endif
</div>

@include('site.common.paginate', array('input' => $inputsearchGame))

@stop
