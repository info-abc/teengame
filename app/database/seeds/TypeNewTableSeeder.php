<?php

class TypeNewTableSeeder extends Seeder {

	public function run()
	{
		TypeNew::create([
			'name'=> 'Share',
		]);
		TypeNew::create([
			'name'=> 'News',
		]);
		TypeNew::create([
			'name'=> 'View',
		]);
	}

}