<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Settings::create([
            'site_name' => 'Laravel Complete Blog',
            'site_email'=> 'fs_boukhoulda@esi.dz',
            'site_number' => '+213698162821',
            'site_adress' => 'Cité 43 logements AinElTurk'
        ]);
    }
}
