<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Festival\Entities\Users\User::class, function (Faker\Generator $faker)
{
	return [
		'fname'          => $faker->firstName,
		'lname'          => $faker->lastName,
		'email'          => $faker->safeEmail,
		'password'       => bcrypt(str_random(10)),
		'secret'         => md5(uniqid()),
		'remember_token' => str_random(10),
	];
});

$factory->define(\Festival\Entities\NewsItems\NewsItem::class, function (Faker\Generator $faker)
{
	return [
		'identifier' => md5(uniqid()),
		'title'   => $faker->text,
		'content' => $faker->realText(),
		'user_id' => function() { return factory(\Festival\Entities\Users\User::class)->create()->id; }
	];
});