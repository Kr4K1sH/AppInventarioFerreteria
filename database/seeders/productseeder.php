<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Seeder;

class productseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        #//Precios y demas fueron sacados de EPA COSTA RICA https://cr.epaenlinea.com/


        // 1 herramientas de contruccion todo tipo
        $products = new \App\Models\Product();
        $products->nombre='Cemex';
        $products->descripcion = 'El cemento es el material de construcción más utilizado en el mundo. Aporta propiedades útiles y deseables, tales como, resistencia a la compresión (el material de construcción con la mayor resistencia por costo unitario), durabilidad y estética para una diversidad de aplicaciones de construcción';
        $products->cantidad_maxima = '100';
        $products->cantidad_minima = '20';
        $products->cantidad_total = '100';
        $products->costo_unidad = '9995';
        $products->category_id = '1';
        $products->display_id = '2';
        $products->user_id = '1';
        $products->peso = '40';
        $products->color = 'blanco';
        $products->imagen = 'https://cr.epaenlinea.com/pub/media/version20200605/catalog/product/cache/a83b746ef25730b9cb1cc414bac0f04a/3/0/3027010_211.jpg';

        $products->save();
        

        // 2 herramientas de iluminacion
        $products = new \App\Models\Product();
        $products->nombre = 'General Electric';
        $products->descripcion = 'Barra Led, enchufable 46 cm luz blanca suave';
        $products->cantidad_maxima = '100';
        $products->cantidad_minima = '10';
        $products->cantidad_total = '100';
        $products->costo_unidad = '14950';
        $products->category_id = '2';
        $products->display_id = '1';
        $products->user_id = '1';
        $products->peso = '10';
        $products->color = 'blanco';
        $products->imagen = 'https://cr.epaenlinea.com/pub/media/version20200605/catalog/product/cache/f0b46f36c41ddcfe5166fd88e24e9484/1/5/1535052.jpg';

        $products->save();

        //3 productos para el hogar

        $products = new \App\Models\Product();
        $products->nombre = 'Ceramica';
        $products->descripcion = 'Cerámica pared beige 30x60cm 1,08m2 (Precio por caja). Revista las paredes de su hogar usando la cerámica pared beige, 30x 60 cm, 1,08m2 (precio por caja). Su estilo, detalles y color se adaptan a cualquier espacio de su hogar combinando con distintas decoraciones';
        $products->cantidad_maxima = '1500';
        $products->cantidad_minima = '150';
        $products->cantidad_total = '1500';
        $products->costo_unidad = '9995';
        $products->category_id = '4';
        $products->display_id = '1';
        $products->user_id = '1';
        $products->peso = '1';
        $products->color = 'Beige';
        $products->imagen = 'https://cr.epaenlinea.com/pub/media/version20200605/catalog/product/cache/a83b746ef25730b9cb1cc414bac0f04a/2/2/2246018_7.jpg';

        $products->save();

        //4 productos para jardineria

        $products = new \App\Models\Product();
        $products->nombre = 'Terra Nova';
        $products->descripcion = 'Tierra abonada 17 L. Para sus labores de jardinería, esta es una compra de mucha utilidad y grandes beneficios. Gracias a que contiene abono orgánico, su calidad repercute en el crecimiento y la salud de sus plantas.';
        $products->cantidad_maxima = '350';
        $products->cantidad_minima = '90';
        $products->cantidad_total = '270';
        $products->costo_unidad = '1500';
        $products->category_id = '6';
        $products->display_id = '1';
        $products->user_id = '1';
        $products->peso = '3.7';
        $products->color = 'Café';
        $products->imagen = 'https://cr.epaenlinea.com/pub/media/version20200605/catalog/product/cache/a83b746ef25730b9cb1cc414bac0f04a/0/8/0823046_21.jpg';

        $products->save();

        //5 productos plomeria

        $products = new \App\Models\Product();
        $products->nombre = 'Cobra';
        $products->descripcion = 'Destapador de cañería 25 pies por 1/4". El destapador de cañería 25 pies por 1/4" es un cable sólido en forma de resorte que posee un agarradero fijo para dar torsión y así liberar cualquier tipo de obstrucción. Por su diseño y tamaño es ideal para cualquier tubería...';
        $products->cantidad_maxima = '100';
        $products->cantidad_minima = '15';
        $products->cantidad_total = '75';
        $products->costo_unidad = '6950';
        $products->category_id = '8';
        $products->display_id = '1';
        $products->user_id = '1';
        $products->peso = '4.5';
        $products->color = 'Gris';
        $products->imagen = 'https://cr.epaenlinea.com/pub/media/version20200605/catalog/product/cache/a83b746ef25730b9cb1cc414bac0f04a/1/2/1270034_7.jpg';

        $products->save();

        //6 productos Pintura

        $products = new \App\Models\Product();
        $products->nombre = 'Lanco';
        $products->descripcion = 'Pintura Seal Coat satín blanco 5 gal. Seal-Coat 3 en 1 es ideal para usar en superficies expuestas a la intemperie que necesitan flexibilidad. Es capaz de sellar grietas sobre estuco, cemento, mampostería y ladrillo...';
        $products->cantidad_maxima = '50';
        $products->cantidad_minima = '10';
        $products->cantidad_total = '35';
        $products->costo_unidad = '87950';
        $products->category_id = '7';
        $products->display_id = '1';
        $products->user_id = '1';
        $products->peso = '45';
        $products->color = 'Blanco';
        $products->imagen = 'https://cr.epaenlinea.com/pub/media/version20200605/catalog/product/cache/a83b746ef25730b9cb1cc414bac0f04a/0/2/0281077.jpg';

        $products->save();

    }
}
