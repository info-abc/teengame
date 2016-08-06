@if(getDevice() == COMPUTER)
	<?php 
		$games = CommonGame::getBoxGameRight();
	?>
	<div class="topgame boxgamenews">
		<h3>GAME NOMINEES</h3>
		<ul>
			@foreach($games as $value)
				<?php $url = CommonGame::getUrlGame($value); ?>
				<li>
					<div class="topgame-image">
						<img src="{{ url(UPLOAD_GAME_AVATAR . '/' .  $value->image_url) }}" alt="{{ $value->slug }}" />
					</div>
					<div class="topgame-text">
						<a href="{{ $url }}">{{ limit_text($value->name, TEXTLENGH) }}</a>
						<span>{{ getZero($value->count_play) }} plays</span>
					</div>
					<div class="clearfix"></div>
				</li>
			@endforeach
		</ul>
	</div>
@endif