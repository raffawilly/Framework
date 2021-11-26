<?php

namespace Database\Seeders;

use App\Models\admin;
use Illuminate\Database\Seeder;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        admin::factory()->count(10)->create();
    }
}
