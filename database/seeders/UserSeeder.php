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
            'name' => 'Brian Kolstad',
            'email' => 'bkolstad@wisnet.com'
        ],
        [
            'name' => 'Rick Kolstad',
            'email' => 'rkolstad@wisnet.com'
        ],
        [
            'name' => 'Ashley Puetz',
            'email' => 'apuetz@wisnet.com'
        ],
        [
            'name' => 'David Rosillo',
            'email' => 'drosillo@wisnet.com'
        ],
        [
            'name' => 'Joe Truesdale',
            'email' => 'jtruesdale@wisnet.com'
        ],
        [
            'name' => 'Michael Dahlke',
            'email' => 'mdahlke@wisnet.com'
        ],
        [
            'name' => 'Mark Meier',
            'email' => 'mmeier@wisnet.com'
        ],
        [
            'name' => 'Nick Berens',
            'email' => 'nberens@wisnet.com'
        ],
        [
            'name' => 'Steve Maass',
            'email' => 'smaass@wisnet.com'
        ],
        [
            'name' => 'Tracy Freund',
            'email' => 'tfreund@wisnet.com'
        ],
        [
            'name' => 'Jodi Van Nocker',
            'email' => 'jvannocker@wisnet.com'
        ],
        [
            'name' => 'Jenny Knuth',
            'email' => 'jknuth@wisnet.com'
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
