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
        $user = App\User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'admin' => '1',
            'password' => bcrypt('password')
        ]);

        App\Profile::create([
            'avatar' => 'avatars/doctor_image.jpg',
            'about' => 'Hello it is me boukhoulda Salaheddine',
            'user_id' => $user->id,
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
