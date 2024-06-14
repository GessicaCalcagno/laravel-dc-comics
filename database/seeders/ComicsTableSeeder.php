<?php

namespace Database\Seeders;

use App\Models\Comic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = config('comic');
        //dd($data);
        foreach ($data as $item ){
            $newComic = new Comic();
            //le key e le tabelle hanno nomi uguali e quindi posso usare fill
            //e lo collego al comic.php -> protected $fillable = [..];
            $newComic->fill($item);

            // $newComic->title = $item["title"];
            // $newComic->description = $item["description"];
            // $newComic->thumb = $item['thumb'];
            // $newComic->price = $item["price"];
            // $newComic->series = $item['series'];
            // $newComic->sale_date =$item['sale_date'];
            // $newComic->type = $item['type'];
            $newComic->save();
        }
    }
}
