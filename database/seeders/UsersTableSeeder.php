<?php

namespace Database\Seeders;
use App\Models\User;
use Carbon\Carbon;
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
        $user = new User;
        $user->username = "admin123";
        $user->name = "admin123";
        $user->email = "admin123@gmail.com";
        $user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->password = bcrypt('admin123'); 
        $user->save();
    }
}
