<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuperAdminSeeder extends Seeder
{
    /**
     * Seed a predictable superadmin account for local access.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        DB::table('roles')->updateOrInsert(
            ['role_id' => 1],
            [
                'role_name' => 'Super Admin',
                'created_at' => $now,
            ]
        );

        $existingUser = DB::table('users')
            ->where('email', 'superadmin@testmaker.com')
            ->orWhere('role', 1)
            ->first();

        $userId = $existingUser->id ?? 56349;

        DB::table('users')->updateOrInsert(
            ['id' => $userId],
            [
                'name' => 'Super Admin',
                'phone' => '03000000000',
                'gender' => 'male',
                'email' => 'superadmin@testmaker.com',
                'password' => '12345678',
                'role' => 1,
                'status' => 1,
                'photo' => null,
                'created_at' => $existingUser->created_at ?? $now,
            ]
        );
    }
}
