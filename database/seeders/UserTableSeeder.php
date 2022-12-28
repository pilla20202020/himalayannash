<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'username' => 'SuperAdmin',
            'email' => 'admin@himalayannash.com',
            'contact_no' => null,
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'password' => bcrypt('admin@himalayannash'),
            'is_admin' => 1
        ]);
    }
}
