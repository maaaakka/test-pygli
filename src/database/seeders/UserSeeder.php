<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create();
        WeightLog::factory()->count(35)->create([
            'user_id' => $user->id,
        ]);
        WeightTarget::factory()->create([
            'user_id' => $user->id,
        ]);
    }
}
