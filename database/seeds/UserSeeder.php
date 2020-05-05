<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'email' => 'admin@gmail.com',
                'username'=>'tran_trung',
                'lever'=>0,
                'password' => bcrypt('123456'),
            ],

        ];
        DB::table('users')->insert($data);
    }
}
