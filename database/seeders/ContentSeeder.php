<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $model = new Content();
        $model->name = "Wedding";
        $model->content = json_encode("Wedding");
        $model->image = "wedding.webp";
        $model->category = "category-image";
        $model->save();

        $model = new Content();
        $model->name = "Prewedding";
        $model->content = json_encode("Prewedding");
        $model->image = "preweddding.png";
        $model->category = "category-image";
        $model->save();

        $model = new Content();
        $model->name = "Engagement";
        $model->content = json_encode("Engagement");
        $model->image = "600x400.png";
        $model->category = "category-image";
        $model->save();

        $model = new Content();
        $model->name = "Pengajian";
        $model->content = json_encode("Pengajian");
        $model->image = "600x400.png";
        $model->category = "category-image";
        $model->save();
    }
}
