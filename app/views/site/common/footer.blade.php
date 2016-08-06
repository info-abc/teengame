<div class="tags">
	<ul>
	@foreach(CommonSite::listTag() as $value)
		<li><a href="{{ url($value['slug'].'-games') }}">{{ $value['title'] }}</a><span>|</span></li>
	@endforeach
	</ul>
	<div class="clearfix"></div>
</div>
<div class="footer">
	<ul>
	  <li><a href="{{ url('/') }}" {{ checkActive() }}>Home</a></li>
	  <li><a href="{{ action('SiteFeedbackController@create') }}" {{ checkActive('feedback') }}>Feedback</a></li>
	  <li><a href="{{ action('SiteFeedbackController@policy') }}" {{ checkActive('policy') }}>Policy</a></li>
	</ul>
	<div class="copyright">
	  	<p>Copyright 2016 by Teengame.net</p>
		{{-- <p>Cơ quan chủ quản: Công ty Cổ phần truyền thông ABC</p>
		<p>Địa chỉ: P501, Tầng 5, Tòa nhà văn phòng, Số 5B/55, Huỳnh Thúc Kháng, Phường Láng Hạ, Quận Đống Đa, Hà Nội</p>
		<p>Tel: (84-4) 3.775.4334 - Fax: (84-4) 3512 1804</p> --}}
	</div>
</div>
