<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteMeta extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('site_metas')->truncate();
       $data = [
        [
            'key'=>'facebook',
            'value'=>'link',
            'type' => 'input',
        ],
        [
            'key'=>'instagram',
            'value'=>'link',
            'type' => 'input',
        ],
        [
            'key'=>'pintrest',
            'value'=>'link',
            'type' => 'input',
        ],
        [
            'key'=>'linkedin',
            'value'=>'link',
            'type' => 'input',
        ],
    ];
        foreach($data as $d){
            DB::table('site_metas')->insert([
                'key' => $d['key'],
                'value' => $d['value'],
                'type' => $d['type'],
            ]);
        }
    }
}
