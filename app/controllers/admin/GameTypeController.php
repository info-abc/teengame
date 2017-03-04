<?php

class GameTypeController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$input = Input::all();
		if(!isset($input['type_id']) || !isset($input['parent_id'])) {
			$input['type_id'] = '';
			$input['parent_id'] = '';
		}
		$data = CommonSearch::searchTypeGame($input);
		return View::make('admin.gametype.index')->with(compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.gametype.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name' => 'required',
		);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('GameTypeController@create')
	            ->withErrors($validator);
        } else {
			$id = CommonNormal::create($input);

			//upload image new
			$input['image_url'] = CommonSeo::uploadImage($id, UPLOADIMG, 'image_url', UPLOAD_GAME_TYPE);
			CommonNormal::update($id, ['image_url' => $input['image_url']] );

			CommonSeo::createSeo('Type', $id, FOLDER_SEO_GAMETYPE);

			// CREATE HTMLPAGE
			$type = Type::find($id);
			$this->createHtmlPage($type);

			return Redirect::action('GameTypeController@index') ;
        }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$inputType = Type::find($id);
		$inputSeo = AdminSeo::where('model_id', $id)->where('model_name', 'Type')->first();
		return View::make('admin.gametype.edit')->with(compact('inputType', 'inputSeo'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if(!Admin::isSeo()) {
			$rules = array(
	            'name'   => 'required'
	        );
        } else {
        	$rules = array();
        }
        $input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('GameTypeController@edit', $id)
	            ->withErrors($validator);
        } else {
        	$type = Type::find($id);
        	//SEO cant update
        	if(!Admin::isSeo()) {
				$inputCategory = Input::only('name', 'status');
				CommonNormal::update($id,$inputCategory);
				$input['image_url'] = CommonSeo::uploadImage($id, UPLOADIMG, 'image_url', UPLOAD_GAME_TYPE, $type->image_url);
				CommonNormal::update($id, ['image_url' => $input['image_url']] );
			}

			CommonSeo::updateSeo('Type', $id, FOLDER_SEO_GAMETYPE);

			// CREATE HTMLPAGE
			$this->createHtmlPage($type);

			return Redirect::action('GameTypeController@index') ;
        }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$count = Type::find($id)->gametypes()->count();
		if($count > 0)
		{
			return Redirect::action('GameTypeController@index')->with('message', 'Thể loại này tồn tại game không xóa được!');
		}
		// $parent = Type::find($id->games()->detach());
		CommonNormal::delete($id);
        return Redirect::action('GameTypeController@index');
	}

	/**
	* Search type game
	*
	*
	*/
	public function search()
	{
		$input  = Input::except('_token');
		$data = CommonSearch::searchTypeGame($input);
		return View::make('admin.gametype.index')->with(compact('data'));
	}

	public function createHtmlPage($type)
	{
		// CREATE HTMLPAGE
		$viewPath = app_path().'/views/site/htmlpage';
		$html = View::make('site.game.type_mobile')->with(compact('type'))->render();
    	$filePath = $viewPath.'/'.'typeGame_game-'.$type->slug.'_mobile.blade.php';
    	if(file_exists($filePath)) {
    		@chmod($filePath, 0777);
    	}
    	file_put_contents($filePath, $html);
    	$html = View::make('site.game.type_pc')->with(compact('type'))->render();
    	$filePath = $viewPath.'/'.'typeGame_game-'.$type->slug.'_pc.blade.php';
    	if(file_exists($filePath)) {
    		@chmod($filePath, 0777);
    	}
    	file_put_contents($filePath, $html);

    	// trang chu
		$this->runFile('site.index_mobile', 'site.index_pc', 'index_mobile.blade.php', 'index_pc.blade.php');
    	return;
	}

	public function runFile($viewMobile, $viewPc, $fileMobile, $filePc)
	{
		$viewPath = app_path().'/views/site/htmlpage';

    	$html = View::make($viewMobile)->render();
    	$filePath = $viewPath.'/'.$fileMobile;
    	file_put_contents($filePath, $html);

    	$html = View::make($viewPc)->render();
    	$filePath = $viewPath.'/'.$filePc;
    	file_put_contents($filePath, $html);
	}

}
