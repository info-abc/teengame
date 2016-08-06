<?php

class TestController extends BaseController {

	public function index()
	{
		exit();
		$path = public_path();
		dd($path);
	}
	public function ajax()
	{
		$parent = CategoryParent::where('position',2)->lists('name','id');
		// dd(Response::json($parent));
		// Response::json(['data' => $categories], 200);
		return Response::json(['data' => $parent], 200);
	}



}
