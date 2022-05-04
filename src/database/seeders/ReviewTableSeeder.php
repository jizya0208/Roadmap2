<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $names = array('ジモン寺門','渡部健','高橋一生','おとといの二日後','犬','サムライ','菊','ジャイアント敦彦','賀屋');
        $email ='sample@1';
        foreach ($names as $name) {
            Review::create([
                'restaurant_id' => mt_rand(1,5),
                'name' => $name,
                'email' => $email,
                'gender' => mt_rand(1,3),
                'age' => mt_rand(1,4),
                'comment' => 'お客さんに教えてもらいました。鯛茶漬けがおいしいときいていたので迷わず鯛茶漬を注文しました。気の利いたたべかたをしておりお味はおいしかったですクリームコロッケもおいしいとお店の人に来たので追加注文しておいしくいただきました。',
                'star' => mt_rand(1,5),
                'is_receivable' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
