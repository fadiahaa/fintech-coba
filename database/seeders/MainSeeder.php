<?php

namespace Database\Seeders;

use App\Models\Balance;
use App\Models\Item;
use App\Models\Role;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin      = Role::create([ "name"     =>  "Administrator" ]);
        $bank       = Role::create([ "name"     =>  "Bank" ]);
        $canteen    = Role::create([ "name"     =>  "Canteen" ]);
        $student    = Role::create([ "name"     =>  "Student" ]);

        $bella  = User::create([
            "name"      => "Bella",
            "email"     => "bella@gmail.com",
            "password"  => Hash::make("bella"),
            "role_id"   => $admin->id
        ]);

        $ira    = User::create([
            "name"      => "Ira",
            "email"     => "ira@gmail.com",
            "password"  => Hash::make("bella"),
            "role_id"   => $bank->id
        ]);

        $fadiah    = User::create([
            "name"      => "Fadiah",
            "email"     => "fadiah@gmail.com",
            "password"  => Hash::make("fadiah"),
            "role_id"   => $canteen->id
        ]);

        $keren    = User::create([
            "name"      => "Keren",
            "email"     => "keren@gmail.com",
            "password"  => Hash::make("keren"),
            "role_id"   => $student->id
        ]);

        $bakso  = Item::create([
            "name"          => "Bakso",
            "image"         => "img-bakso.jpg",
            "price"         => 10000,
            "stock"         => 10,
            "description"   => "Bakso daging dan urat"
        ]);

        $risol  = Item::create([
            "name"          => "Risol Mayo",
            "image"         => "img-risol.jpg",
            "price"         => 2500,
            "stock"         => 20,
            "description"   => "Risol dan mayonaise"
        ]);

        $pucuk  = Item::create([
            "name"          => "Teh Pucuk",
            "image"         => "img-pucuk.jpg",
            "price"         => 3000,
            "stock"         => 15,
            "description"   => "Minuman teh pucuk"
        ]);

        Balance::create([
            "user_id"   => $keren->id,
            "balance"   => 30000
        ]);

        Transaction::create([
            "user_id"   => $keren->id,
            "item_id"   => $pucuk->id,
            "quantity"  => 2,
            "invoice_id"   => "NV_001",
            "type"      => 2,
            "status"    => 1
        ]);
    }
}
