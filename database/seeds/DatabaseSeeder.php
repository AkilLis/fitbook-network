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
        $user = User::find('38');
        $admin = Role::find('1');
        $user->attachRole($admin);
        // $this->call(UsersTableSeeder::class);
       /* $roles = array(
                ['name' => 'Admin', 'display_name' => 'Админ', 'description' => 'Системийн админ'],
                ['name' => 'Ceo', 'display_name' => 'Захирал', 'description' => 'Системийн захирал'],
                ['name' => 'Registration', 'display_name' => 'Шивэгч', 'description' => 'Системийн шивэгч']
        );*/
            
        /*foreach ($roles as $role)
        {
            Role::create($role);
        }*/

    }
}
