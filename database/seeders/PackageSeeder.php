<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert(array([

            'id' =>1,
            'package_name'=> 'Silver Member',
            'package_price'=>50,
            'main_page_logo'=> 0,
            'website_link'=>0,
            'directory_logo'=>1,
            'full_info'=>1,
            'branches'=>0,
            'branch_discount'=>'15%',
            'meeting_pirority'=>0,
            'conference_discount'=>0,
            'news_priority'=>0,
            'youtube_videos'=>0,
            'networking'=>1,
            'businiess_relation'=>1,
            'annual_conference'=>1,
            'direct_access'=>1,
        ],
        [

            'id' =>2,
            'package_name'=> 'Gold Member ',
            'package_price'=>100,
            'main_page_logo'=> 1,
            'website_link'=>0,
            'directory_logo'=>1,
            'full_info'=>1,
            'branches'=>0,
            'branch_discount'=>'25%',
            'meeting_pirority'=>1,
            'conference_discount'=>'20%',
            'news_priority'=>0,
            'youtube_videos'=>1,
            'networking'=>1,
            'businiess_relation'=>1,
            'annual_conference'=>1,
            'direct_access'=>1,
        ],
        [

            'id' =>3,
            'package_name'=> 'Platinum Member',
            'package_price'=>200,
            'main_page_logo'=> 1,
            'website_link'=>1,
            'directory_logo'=>1,
            'full_info'=>1,
            'branches'=>1,
            'branch_discount'=>'25%',
            'meeting_pirority'=>1,
            'conference_discount'=>'50%',
            'news_priority'=>1,
            'youtube_videos'=>2,
            'networking'=>1,
            'businiess_relation'=>1,
            'annual_conference'=>1,
            'direct_access'=>1,
        ]
        ));
    }
}
