<?php namespace App\Seeder;

use Illuminate\Database\Seeder;
use App\Model\Preference;
use App\Model\Collection;
use App\Model\User;
use App\Model\Item;

class PreferenceSeeder extends Seeder
{
    public function run()
    {
        $u = User::first();
        $c = Collection::first();

        $items = Item::limit(10)->get();
        foreach ($items as $item) {
            $p = new Preference;
            $p->user_id = $u->id;
            $p->collection_id = $c->id;
            $p->item_id = $item->id;
            
            $p->comment = "It's fun.";
            $p->vote = 10;
            $p->item = $item->toArray();
            $p->save();
        }
    }
}
