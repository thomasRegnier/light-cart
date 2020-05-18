<?php

use Illuminate\Database\Seeder;

use App\Product;

class productsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $array = [
            [
                "name" => "Air Jordan 5 Retro Off-White Black",
                "description" => "Après plusieurs sorties très attendues résultant de la collaboration entre Off-White mené par Virgil Abloh et Air Jordan, place maintenant à un modèle qui vient célébrer le 30ème anniversaire du design de Tinker Hatfield : la Air Jordan 5 Retro Off-White Black.",
                "price" =>   660,
                "image" => "https://cdn.shopify.com/s/files/1/2358/2817/products/Wethenew-Sneakers-France-Air-Jordan-5-Retro-Off-White-Black-CT8480-001-1_2000x.png?v=1582216646"
            ],

            [
                "name" => "Dunk Low Off-White University Red",
                "description" => "La collaboration la plus attendue de chez Nike est de retour ! Nike et le créateur de Off-White proposent cette nouvelle itération qui vient compléter le pack Dunk Low, accompagnée des colorways Michigan et Pine Green.",
                "price" =>   420,
                "image" => "https://cdn.shopify.com/s/files/1/2358/2817/products/Wethenew-Sneakers-France-Nike-Dunk-Low-Off-White-Red-University-1_2000x.png?v=1571230791"
            ],


            [
                "name" => "Air Force 1 Low Off-White Black",
                "description" => "Nike et Off-White continuent leur association en cette fin d’année 2018. Après la populaire Nike Air Force 1 Off-White « The Ten », Virgil Abloh revisite la silhouette mythique de la Air Force 1 pour deux édition uniques ; Black et Volt.",
                "price" =>   1100,
                "image" => "https://cdn.shopify.com/s/files/1/2358/2817/products/Wethenew-Sneakers-France-Nike-Air-Force-1-Off-White-Black-1_2000x.png?v=1545301456"
            ],

            [
                "name" => "Air Presto Off-White Black",
                "description" => "Considérée par beaucoup comme l’une des meilleures silhouettes de la collection « The Ten », la Nike Air Presto x Off-White fait son retour en 2018 sous un tout nouvel aspect.",
                "price" =>   720,
                "image" => "https://cdn.shopify.com/s/files/1/2358/2817/products/Wethenew-Sneakers-France-Nike-Air-Presto-Off-White-The-Ten-Black-1_2000x.png?v=1540823882"
            ],

            [
                "name" => "Air Force 1 Low Fossil Travis Scott",
                "description" => "La collaboration la plus chaude de l’année est de retour ! Peu de temps après la sortie de la Air Jordan 6 Travis Scott, La Flame et Nike reviennent avec la Nike Air Force 1 Low « Fossil ».",
                "price" =>   550,
                "image" => "https://cdn.shopify.com/s/files/1/2358/2817/products/Wethenew-sneakers-france-nike-air-force-1-Travis-scott-fossil-1_2000x.png?v=1573229080"
            ],

            [
                "name" => "Air Force 1 Drop Type Triple White",
                "description" => "Après le succès des premières versions, la Nike Air Force 1 Drop Type se pare d’un coloris Triple White.",
                "price" =>   210,
                "image" => "https://cdn.shopify.com/s/files/1/2358/2817/products/Nike-Air-Force-1-Drop-Type-Triple-White-CQ2344-101-1_2000x.png?v=1581939652"
            ],

        ];


        $posts = new Product;
        $posts->insert($array);
        $posts->save();
    }
}
