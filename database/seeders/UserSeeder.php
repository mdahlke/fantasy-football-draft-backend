<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    //    protected $pw = Hash::make('password');

    const USERS = [
        [
            'name' => 'Michael Dahlke',
            'email' => 'mdahlke@wisnet.com'
        ],
    ];

    const PASSWORD = 'password';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::USERS as $data) {
            User::create(array_merge($data, ['password' => Hash::make(self::PASSWORD)]));
        }
    }
}
