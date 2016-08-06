<?php 
	if(isset($device)) {
        $device = getDevice($device);
    } else {
        $device = getDevice();
    }
	if(isset($noCache)) {
		$data = CommonGame::getBoxMiniGame($noCache, $device); 
	} else {
		$data = CommonGame::getBoxMiniGame(); 
	}
?>
@if(count($data) > 0)
<div class="box">
	<h3>Mini Games</h3>
	<div class="row">
		@foreach($data as $value)
			@if(count($value['games']) > 0)
				<div class="col-sm-4">
					<div class="boxmini">
						<div class="boxmini-title">
							<h3><a href="{{ url($value['type_slug'].'-games') }}">{{ $value['type_name'] }} Games</a></h3>
							<a href="{{ url($value['type_slug'].'-games') }}" class="boxmini-seemore">Show all</a>
						</div>
						<div class="row">
							@foreach($value['games'] as $v)
								<?php $url = CommonGame::getUrlGame($v, $value['type_slug']); ?>
								<div class="col-xs-4">
									<div class="item">
									    <div class="item-image">
											<a href="{{ $url }}">
												<img src="{{ url(UPLOAD_GAME_AVATAR . '/' .  $v->image_url) }}" alt="{{ $v->name }}" class="showTip el_{{ $v->id }}" />
											</a>
									    </div>
									    <div class="item-title">
											<a href="{{ $url }}">{{ $v->name }}</a>
										</div>
									</div>
									@if($device == COMPUTER)
										@include('site.game.tooltip', array('game' => $v, 'url' => $url, 'device' => 2))
									@endif
								</div>
							@endforeach
						</div>
					</div>
				</div>
			@endif
		@endforeach
	</div>
</div>
@endif