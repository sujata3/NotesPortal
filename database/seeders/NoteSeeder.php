<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
    DB::table('notes_and_resources')->insert([
        //id auto increment huncha database ma so no need to seed it
        'title'=>Str::random(225),
        'file'=>Str::random(10)
    ]);
    }
}
