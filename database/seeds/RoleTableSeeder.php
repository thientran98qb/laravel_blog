<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role=[
            [
                'role_name'=>'admin',
                'created_at'=>new DateTime(),
                'updated_at'=>new DateTime()
            ],
            [
                'role_name'=>'guest',
                'created_at'=>new DateTime(),
                'updated_at'=>new DateTime()
            ]
        ];
        return DB::table('roles')->insert($role);
    }
}
