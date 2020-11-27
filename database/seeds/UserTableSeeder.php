<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'name'=>'Tran Dinh Thien',
                'email'=>'trandinhthienphp@gmail.com',
                'password'=>bcrypt('123456'),
                'created_at'=>new DateTime(),
                'updated_at'=>new DateTime()
            ],
            [
                'name'=>'Tran Dinh Thien',
                'email'=>'trandinhthien@dtu.edu.vn',
                'password'=>bcrypt('123456'),
                'created_at'=>new DateTime(),
                'updated_at'=>new DateTime()
            ] 
        ];
        DB::table('users')->insert($data);
    }
}
