<?php 

class AdminTagController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = AdminTag::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.tags.index')->with(compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.tags.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name'   => 'required|unique:tags|check_slug'            
		);
		$input = Input::except('_token');
		$validator = Validator::make($input, $rules);
		if($validator->fails()) {
			return Redirect::action('AdminTagController@create')
	            ->withErrors($validator);
        } else {
        	$input['weight_number'] = 0;
			$id = CommonNormal::create($input);

			// insert seo
			CommonSeo::createSeo('AdminTag', $id, FOLDER_SEO_TAG);

			// CREATE HTMLPAGE
        	$tag = AdminTag::find($id);
			$this->createHtmlPage($tag);

			return Redirect::action('AdminTagController@index');
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
		$inputTag = AdminTag::find($id);
		$inputSeo = AdminSeo::where('model_id', $id)->where('model_name', 'AdminTag')->first();
		return View::make('admin.tags.edit')->with(compact('inputTag', 'inputSeo'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
            'name'   => 'required|check_slug'
        );
        $input = Input::except('_token');
		$validator = Validator::make($input, $rules);
		if($validator->fails()) {
			return Redirect::action('AdminTagController@edit', $id)
	            ->withErrors($validator);
        } else {
        	CommonNormal::update($id, $input);

        	CommonSeo::updateSeo('AdminTag', $id, FOLDER_SEO_TAG);

        	// CREATE HTMLPAGE
        	$tag = AdminTag::find($id);
			$this->createHtmlPage($tag);

			return Redirect::action('AdminTagController@index');
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
		$data = AdminTag::find($id);
		RelationBox::deleteRelationship($data, 'games');
		CommonNormal::delete($id);
		return Redirect::action('AdminTagController@index');
	}

	public function gametags($tagId)
	{
		$tagName = AdminTag::find($tagId)->name;
		$data = AdminTag::join('game_tags', 'game_tags.tag_id', '=', 'tags.id')
					->join('games', 'games.id', '=', 'game_tags.game_id')
					->select('games.id', 'games.name', 'games.parent_id', 'games.type_main')
					->where('game_tags.tag_id', $tagId)
					->orderBy('games.id', 'desc')
					->paginate(PAGINATE);
		return View::make('admin.tags.gametags')->with(compact('data', 'tagName'));
	}

	public function createHtmlPage($tag)
	{
		// CREATE HTMLPAGE
		$viewPath = app_path().'/views/site/htmlpage';
		$html = View::make('site.tag.tag_mobile')->with(compact('tag'))->render();
    	$filePath = $viewPath.'/'.'tagGame_game-'.$tag->slug.'_mobile.blade.php';
    	file_put_contents($filePath, $html);
    	$html = View::make('site.tag.tag_pc')->with(compact('tag'))->render();
    	$filePath = $viewPath.'/'.'tagGame_game-'.$tag->slug.'_pc.blade.php';
    	file_put_contents($filePath, $html);

    	// trang chu
		$this->runFile('site.index_mobile', 'site.index_pc', 'index_mobile.blade.php', 'index_pc.blade.php');
    	return;
	}

	public function runFile($viewMobile, $viewPc, $fileMobile, $filePc)
	{
		$viewPath = app_path().'/views/site/htmlpage';

    	$html = View::make($viewMobile)->render();
    	// $filePath = public_path().FOLDER_HTML_CODE.'/index_mobile.php';
    	$filePath = $viewPath.'/'.$fileMobile;
    	file_put_contents($filePath, $html);

    	$html = View::make($viewPc)->render();
    	// $filePath = public_path().FOLDER_HTML_CODE.'/index_pc.php';
    	$filePath = $viewPath.'/'.$filePc;
    	file_put_contents($filePath, $html);
	}

}
