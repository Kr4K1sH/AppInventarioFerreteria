<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      /*
        $table->string('nombre', 45);
        $table->text('descripcion');
        $table->integer('cantidad_maxima');
        $table->integer('cantidad_minima');
        $table->integer('cantidad_total');
        $table->decimal('costo_unidad', 8, 2);
        $table->unsignedInteger('category_id');
        $table->unsignedInteger('display_id');
        $table->unsignedInteger('user_id');
        $table->decimal('peso', 8, 2);
        $table->string('color', 20);
        $table->string('imagen', 2000);

        $table->timestamps();

        $table->foreign('category_id')->references('id')->on('categories');
        $table->foreign('display_id')->references('id')->on('displays');
        $table->foreign('user_id')->references('id')->on('users');
*/


      $products = new \App\Models\Product();
      $products->descripcion= 'El cemento es el material de construcción más utilizado en el mundo. Aporta propiedades útiles y deseables, tales como, resistencia a la compresión (el material de construcción con la mayor resistencia por costo unitario), durabilidad y estética para una diversidad de aplicaciones de construcción';
      $products->cantidad_maxima='100';
$products->cantidad_minima='20';
$products->cantidad_total='100';
$products->costo_unidad='9995';
$products->category_id='1';
$products->display_id='2';
$products->user_id='1';
$products->peso='40';
$products->color='blanco';
$products->imagen= 'https://cr.epaenlinea.com/pub/media/version20200605/catalog/product/cache/a83b746ef25730b9cb1cc414bac0f04a/3/0/3027010_211.jpg';

$products->save();


    }
}
