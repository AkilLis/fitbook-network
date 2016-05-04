<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $users = array(
                ['fName' => 'Түвшинбат', 'lName' => 'Гансүх', 'userId' => 'АА00001', 'email' => 'g.tuvshinbat@yahoo.com', 'password' => Hash::make('123')]
        );
            
        // Loop through each user above and create the record for them in the database
        foreach ($users as $user)
        {
            User::create($user);
        }
    }
}
