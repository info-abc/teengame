<?php

class CategoryParentSeeder extends Seeder {

	public function run()
	{
		CategoryParent::create([
			'position'=> 1,
			'name'=> 'Game Android',
			'description' => 'This is game android of menu',
			'weight_number' => 1,
			'status' => ENABLED,
		]);
		CategoryParent::create([
			'position'=> 1,
			'name'=> 'Game Online',
			'description' => 'This is game online of menu',
			'weight_number' => 2,
			'status' => ENABLED,
		]);
		CategoryParent::create([
			'position'=> 2,
			'name'=> 'Hot Games',
			'description' => 'This is game of content',
			'weight_number' => 1,
			'status' => ENABLED,
		]);
		CategoryParent::create([
			'position'=> 2,
			'name'=> 'Best Games',
			'description' => 'This is game of content',
			'weight_number' => 2,
			'status' => ENABLED,
		]);
		CategoryParent::create([
			'position'=> 2,
			'name'=> 'Most Voted Games',
			'description' => 'This is game of content',
			'weight_number' => 3,
			'status' => ENABLED,
		]);

	}

}