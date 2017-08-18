<?php namespace App\Seeder;

use Illuminate\Database\Seeder;
use App\Model\Item;

class BoardGameSeeder extends Seeder
{
    public function run()
    {
        $string = file_get_contents(public_path()."/../database/seeds/resources/c1v1-p1.json");
        $json = json_decode($string, true);

        foreach ($json as $item) {
            if ($item["category"]!="BoardGame") {
                continue;
            }

            $i = new Item;
            foreach ($item as $key => $value) {
                $i->$key = $value;
            }
            try {
                $i->save();
            } catch (\Exception $e) {
                //
            }
        }
    }
}
