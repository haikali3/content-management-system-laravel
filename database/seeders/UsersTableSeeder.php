<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   */
  public function run(): void {
    $user = User::where('email', 'haikaladmin@gmail.com')->first();

    if (!$user) {
      User::create([
        'role'     => 'admin',
        'name'     => 'Haikal T.',
        'email'    => 'haikaladmin@gmail.com',
        'password' => Hash::make('password'),
      ]);
    }
  }
}
