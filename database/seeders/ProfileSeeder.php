<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $items = [
        [
            "id" => 1,
            "name"  => 'Shutterbox.id',
            "slug"    => "shutterbox",
            "statusenable"  => true,
            "address"  => "Jl. Ps. Ciawi, Pakemitan, Kec. Ciawi, Kabupaten Tasikmalaya, Jawa Barat 46156",
            "email1"  => "shutterbox.group@gmail.com",
            "email2"  => "",
            "phone"  => "",
            "whatsapp"  => "+62878-4016-4533",
            "youtube"  => "https://www.youtube.com/@shutterboxproject.",
            "tiktok"  => "https://www.tiktok.com/@shutterboxproject",
            "facebook"  => "https://m.facebook.com/p/Shutterboxid-100075908503746/",
            "instagram"  => "https://www.instagram.com/shutterbox.photography",
            "logo"  => null,
        ],
    ];
    public function run()
    {
        // foreach ($this->items as $item) {
        //     \App\Models\Profile::create($item);
        // }
    }
}
