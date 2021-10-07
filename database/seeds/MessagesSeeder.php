<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('messages')->insert([
                'name' => $faker->name,
                'user_id' => $faker->randomElement([1, 2, 3, 4, 5]),
                'email' => $faker->email,
                'homepage' => $faker->url(),
                'message' => $faker->text,
            ]);
        }
    }
}
