<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model;
use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find('3');
        $admin = Role::find('1');
        $user->attachRole($admin);

        // $this->call(UsersTableSeeder::class);
       /*$users = array(
                ['id' => 1, 'userId' => 'AA00001', 'fName' => 'Хулангоо','lName' => 'Амарсанаа','email' => 'hulangoo@yahoo.com','password' => \Hash::make('123'),'isNetwork' => 'Y'],
                ['id' => 2, 'userId' => 'AA00002', 'fName' => 'Tuvshoo','lName' => 'Амарсанаа','email' => 'tuvshoo@yahoo.com','password' => \Hash::make('123'),'isNetwork' => 'Y'],
                ['id' => 3, 'userId' => 'AA00003', 'fName' => 'Puujee','lName' => 'Амарсанаа','email' => 'puujee@yahoo.com','password' => \Hash::make('123'),'isNetwork' => 'Y'],
        );
            
        foreach ($users as $user)
        {
            User::create($user);
        }*/

    }
}
