<?php

use Illuminate\Database\Seeder;
use App\User;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name'=>'valencia muthoni',
            'email'=>'valencia@gmail.com',
            'password'=>Hash::make('valencia')
        ));
    }
}
