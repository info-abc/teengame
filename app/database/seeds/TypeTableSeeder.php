<?php

class TypeTableSeeder extends Seeder {

	public function run()
	{
		Type::create([
			'name'=> 'Action',
		]);
		Type::create([
			'name'=> 'Racing',
		]);
		Type::create([
			'name'=> 'Girl',
		]);
		Type::create([
			'name'=> 'Sport',
		]);
		Type::create([
			'name'=> 'Cooking',
		]);
		Type::create([
			'name'=> 'Funny',
		]);
		Type::create([
			'name'=> 'Fashion',
		]);
		Type::create([
			'name'=> 'Strategy',
		]);
		Type::create([
			'name'=> 'Brain',
		]);

	}

}