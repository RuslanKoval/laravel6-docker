<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Авор не известен',
                'email' => 'test@test.ru',
                'password' => bcrypt(str_random(16))
            ],
            [
                'name' => 'Rus',
                'email' => 'test2@test.ru',
                'password' => bcrypt(123123)
            ]
        ];
        DB::table('users')->insert($data);
    }
}
