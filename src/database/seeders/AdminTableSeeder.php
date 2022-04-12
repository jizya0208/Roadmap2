<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // DBファサードを使用するためこれを追加
use Illuminate\Support\Facades\Hash;// Hashファサードを使用するためこれを追加
use App\Models\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => '管理者',
            'email' => 'admin@example.com',
            'password' => Hash::make('password')
        ]);
        Admin::create([
            'name' => 'サブ管理者',
            'email' => 'sub@example.com',
            'password' => Hash::make('password')
        ]);
    }
}
