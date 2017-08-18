<?php namespace App\Seeder;

use Illuminate\Database\Seeder;
use App\Model\Collection;
use App\Model\User;


class CollectionSeeder extends Seeder
{
    public function run()
    {
        $u = User::first();

        $c = new Collection;
        $c->category = "played";
        $c->label = "";
        $c->user_id = $u->id;
        $c->user = [
            "first_name" => "Pakawat",
            "last_name" => "Nakwijit",
            "username" => "chameleontk",
            "profile_image" => "https://graph.facebook.com/v2.8/10210861989363614/picture?type=normal",
        ];
        $c->save();
    }
}
