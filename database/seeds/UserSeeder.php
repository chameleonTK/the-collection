<?php namespace App\Seeder;

use Illuminate\Database\Seeder;
use App\Model\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $u = new User;
        $u->first_name = "Pakawat";
        $u->last_name = "Nakwijit";
        $u->username = "chameleontk";
        $u->profile_image = "https://graph.facebook.com/v2.8/10210861989363614/picture?type=normal";
        $u->email = "kramatk@gmail.com";
        $u->password = "#";
        $u->save();
    }
}
