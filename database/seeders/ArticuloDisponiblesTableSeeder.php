<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArticuloDisponiblesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('articulo_disponibles')->delete();
        
        \DB::table('articulo_disponibles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'articulo_id' => 1,
                'stock_total' => 82,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            1 => 
            array (
                'id' => 2,
                'articulo_id' => 2,
                'stock_total' => 5336,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            2 => 
            array (
                'id' => 3,
                'articulo_id' => 3,
                'stock_total' => 1032,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            3 => 
            array (
                'id' => 4,
                'articulo_id' => 4,
                'stock_total' => 264,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            4 => 
            array (
                'id' => 5,
                'articulo_id' => 5,
                'stock_total' => 996,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            5 => 
            array (
                'id' => 6,
                'articulo_id' => 6,
                'stock_total' => 204,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            6 => 
            array (
                'id' => 7,
                'articulo_id' => 7,
                'stock_total' => 36,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            7 => 
            array (
                'id' => 8,
                'articulo_id' => 8,
                'stock_total' => 59,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            8 => 
            array (
                'id' => 9,
                'articulo_id' => 10,
                'stock_total' => 136,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            9 => 
            array (
                'id' => 10,
                'articulo_id' => 11,
                'stock_total' => 285,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            10 => 
            array (
                'id' => 11,
                'articulo_id' => 17,
                'stock_total' => 32,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            11 => 
            array (
                'id' => 12,
                'articulo_id' => 18,
                'stock_total' => 25,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            12 => 
            array (
                'id' => 13,
                'articulo_id' => 21,
                'stock_total' => 3,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            13 => 
            array (
                'id' => 14,
                'articulo_id' => 22,
                'stock_total' => 9,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            14 => 
            array (
                'id' => 15,
                'articulo_id' => 23,
                'stock_total' => 2,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            15 => 
            array (
                'id' => 16,
                'articulo_id' => 24,
                'stock_total' => 1,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            16 => 
            array (
                'id' => 17,
                'articulo_id' => 26,
                'stock_total' => 6,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            17 => 
            array (
                'id' => 18,
                'articulo_id' => 27,
                'stock_total' => 3,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            18 => 
            array (
                'id' => 19,
                'articulo_id' => 29,
                'stock_total' => 6,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            19 => 
            array (
                'id' => 20,
                'articulo_id' => 30,
                'stock_total' => 158,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            20 => 
            array (
                'id' => 21,
                'articulo_id' => 31,
                'stock_total' => 27,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            21 => 
            array (
                'id' => 22,
                'articulo_id' => 33,
                'stock_total' => 100,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            22 => 
            array (
                'id' => 23,
                'articulo_id' => 34,
                'stock_total' => 43,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            23 => 
            array (
                'id' => 24,
                'articulo_id' => 35,
                'stock_total' => 66,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            24 => 
            array (
                'id' => 25,
                'articulo_id' => 36,
                'stock_total' => 3,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            25 => 
            array (
                'id' => 26,
                'articulo_id' => 37,
                'stock_total' => 58,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            26 => 
            array (
                'id' => 27,
                'articulo_id' => 38,
                'stock_total' => 271,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            27 => 
            array (
                'id' => 28,
                'articulo_id' => 39,
                'stock_total' => 70,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            28 => 
            array (
                'id' => 29,
                'articulo_id' => 40,
                'stock_total' => 87,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            29 => 
            array (
                'id' => 30,
                'articulo_id' => 41,
                'stock_total' => 63,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            30 => 
            array (
                'id' => 31,
                'articulo_id' => 42,
                'stock_total' => 32,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            31 => 
            array (
                'id' => 32,
                'articulo_id' => 43,
                'stock_total' => 147,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            32 => 
            array (
                'id' => 33,
                'articulo_id' => 44,
                'stock_total' => 919,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            33 => 
            array (
                'id' => 34,
                'articulo_id' => 45,
                'stock_total' => 100,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            34 => 
            array (
                'id' => 35,
                'articulo_id' => 48,
                'stock_total' => 329,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            35 => 
            array (
                'id' => 36,
                'articulo_id' => 49,
                'stock_total' => 103,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            36 => 
            array (
                'id' => 37,
                'articulo_id' => 50,
                'stock_total' => 675,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            37 => 
            array (
                'id' => 38,
                'articulo_id' => 51,
                'stock_total' => 54,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            38 => 
            array (
                'id' => 39,
                'articulo_id' => 52,
                'stock_total' => 3,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            39 => 
            array (
                'id' => 40,
                'articulo_id' => 53,
                'stock_total' => 53,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            40 => 
            array (
                'id' => 41,
                'articulo_id' => 54,
                'stock_total' => 49,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            41 => 
            array (
                'id' => 42,
                'articulo_id' => 56,
                'stock_total' => 546,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            42 => 
            array (
                'id' => 43,
                'articulo_id' => 58,
                'stock_total' => 382,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            43 => 
            array (
                'id' => 44,
                'articulo_id' => 60,
                'stock_total' => 82,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            44 => 
            array (
                'id' => 45,
                'articulo_id' => 61,
                'stock_total' => 5,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            45 => 
            array (
                'id' => 46,
                'articulo_id' => 63,
                'stock_total' => 152,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            46 => 
            array (
                'id' => 47,
                'articulo_id' => 64,
                'stock_total' => 882,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            47 => 
            array (
                'id' => 48,
                'articulo_id' => 65,
                'stock_total' => 1000,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            48 => 
            array (
                'id' => 49,
                'articulo_id' => 66,
                'stock_total' => 69,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            49 => 
            array (
                'id' => 50,
                'articulo_id' => 68,
                'stock_total' => 76,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            50 => 
            array (
                'id' => 51,
                'articulo_id' => 69,
                'stock_total' => 116,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            51 => 
            array (
                'id' => 52,
                'articulo_id' => 70,
                'stock_total' => 49,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            52 => 
            array (
                'id' => 53,
                'articulo_id' => 71,
                'stock_total' => 123,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            53 => 
            array (
                'id' => 54,
                'articulo_id' => 72,
                'stock_total' => 64,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            54 => 
            array (
                'id' => 55,
                'articulo_id' => 73,
                'stock_total' => 130,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            55 => 
            array (
                'id' => 56,
                'articulo_id' => 74,
                'stock_total' => 120,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            56 => 
            array (
                'id' => 57,
                'articulo_id' => 75,
                'stock_total' => 2,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            57 => 
            array (
                'id' => 58,
                'articulo_id' => 76,
                'stock_total' => 15,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            58 => 
            array (
                'id' => 59,
                'articulo_id' => 77,
                'stock_total' => 13,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            59 => 
            array (
                'id' => 60,
                'articulo_id' => 78,
                'stock_total' => 16,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            60 => 
            array (
                'id' => 61,
                'articulo_id' => 79,
                'stock_total' => 3730,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            61 => 
            array (
                'id' => 62,
                'articulo_id' => 80,
                'stock_total' => 1770,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            62 => 
            array (
                'id' => 63,
                'articulo_id' => 81,
                'stock_total' => 12,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            63 => 
            array (
                'id' => 64,
                'articulo_id' => 82,
                'stock_total' => 16,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            64 => 
            array (
                'id' => 65,
                'articulo_id' => 84,
                'stock_total' => 283,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            65 => 
            array (
                'id' => 66,
                'articulo_id' => 85,
                'stock_total' => 623,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            66 => 
            array (
                'id' => 67,
                'articulo_id' => 86,
                'stock_total' => 168,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            67 => 
            array (
                'id' => 68,
                'articulo_id' => 87,
                'stock_total' => 370,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            68 => 
            array (
                'id' => 69,
                'articulo_id' => 88,
                'stock_total' => 193,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            69 => 
            array (
                'id' => 70,
                'articulo_id' => 89,
                'stock_total' => 19,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            70 => 
            array (
                'id' => 71,
                'articulo_id' => 90,
                'stock_total' => 142,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            71 => 
            array (
                'id' => 72,
                'articulo_id' => 91,
                'stock_total' => 83,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            72 => 
            array (
                'id' => 73,
                'articulo_id' => 92,
                'stock_total' => 89,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            73 => 
            array (
                'id' => 74,
                'articulo_id' => 93,
                'stock_total' => 80,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            74 => 
            array (
                'id' => 75,
                'articulo_id' => 94,
                'stock_total' => 5400,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            75 => 
            array (
                'id' => 76,
                'articulo_id' => 95,
                'stock_total' => 330,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            76 => 
            array (
                'id' => 77,
                'articulo_id' => 96,
                'stock_total' => 15,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            77 => 
            array (
                'id' => 78,
                'articulo_id' => 97,
                'stock_total' => 2,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            78 => 
            array (
                'id' => 79,
                'articulo_id' => 99,
                'stock_total' => 57,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            79 => 
            array (
                'id' => 80,
                'articulo_id' => 100,
                'stock_total' => 71,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            80 => 
            array (
                'id' => 81,
                'articulo_id' => 101,
                'stock_total' => 12,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            81 => 
            array (
                'id' => 82,
                'articulo_id' => 102,
                'stock_total' => 72,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            82 => 
            array (
                'id' => 83,
                'articulo_id' => 103,
                'stock_total' => 274,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            83 => 
            array (
                'id' => 84,
                'articulo_id' => 104,
                'stock_total' => 6,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            84 => 
            array (
                'id' => 85,
                'articulo_id' => 106,
                'stock_total' => 91,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            85 => 
            array (
                'id' => 86,
                'articulo_id' => 107,
                'stock_total' => 118,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            86 => 
            array (
                'id' => 87,
                'articulo_id' => 108,
                'stock_total' => 2,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            87 => 
            array (
                'id' => 88,
                'articulo_id' => 119,
                'stock_total' => 703,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            88 => 
            array (
                'id' => 89,
                'articulo_id' => 120,
                'stock_total' => 281,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            89 => 
            array (
                'id' => 90,
                'articulo_id' => 152,
                'stock_total' => 18,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            90 => 
            array (
                'id' => 91,
                'articulo_id' => 158,
                'stock_total' => 4,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            91 => 
            array (
                'id' => 92,
                'articulo_id' => 159,
                'stock_total' => 4,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            92 => 
            array (
                'id' => 93,
                'articulo_id' => 160,
                'stock_total' => 2,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            93 => 
            array (
                'id' => 94,
                'articulo_id' => 161,
                'stock_total' => 2,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            94 => 
            array (
                'id' => 95,
                'articulo_id' => 163,
                'stock_total' => 1,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            95 => 
            array (
                'id' => 96,
                'articulo_id' => 176,
                'stock_total' => 15,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            96 => 
            array (
                'id' => 97,
                'articulo_id' => 189,
                'stock_total' => 1,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            97 => 
            array (
                'id' => 98,
                'articulo_id' => 196,
                'stock_total' => 23,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            98 => 
            array (
                'id' => 99,
                'articulo_id' => 198,
                'stock_total' => 2,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            99 => 
            array (
                'id' => 100,
                'articulo_id' => 199,
                'stock_total' => 5,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            100 => 
            array (
                'id' => 101,
                'articulo_id' => 261,
                'stock_total' => 7,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:06',
                'updated_at' => '2025-04-03 11:01:06',
            ),
            101 => 
            array (
                'id' => 102,
                'articulo_id' => 262,
                'stock_total' => 1,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            102 => 
            array (
                'id' => 103,
                'articulo_id' => 263,
                'stock_total' => 3,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            103 => 
            array (
                'id' => 104,
                'articulo_id' => 264,
                'stock_total' => 2,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            104 => 
            array (
                'id' => 105,
                'articulo_id' => 265,
                'stock_total' => 4,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            105 => 
            array (
                'id' => 106,
                'articulo_id' => 351,
                'stock_total' => 1,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            106 => 
            array (
                'id' => 107,
                'articulo_id' => 352,
                'stock_total' => 1,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            107 => 
            array (
                'id' => 108,
                'articulo_id' => 354,
                'stock_total' => 1,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            108 => 
            array (
                'id' => 109,
                'articulo_id' => 361,
                'stock_total' => 2,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            109 => 
            array (
                'id' => 110,
                'articulo_id' => 439,
                'stock_total' => 3,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            110 => 
            array (
                'id' => 111,
                'articulo_id' => 440,
                'stock_total' => 15,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            111 => 
            array (
                'id' => 112,
                'articulo_id' => 441,
                'stock_total' => 32,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            112 => 
            array (
                'id' => 113,
                'articulo_id' => 442,
                'stock_total' => 41,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            113 => 
            array (
                'id' => 114,
                'articulo_id' => 443,
                'stock_total' => 30,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            114 => 
            array (
                'id' => 115,
                'articulo_id' => 444,
                'stock_total' => 68,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            115 => 
            array (
                'id' => 116,
                'articulo_id' => 445,
                'stock_total' => 31,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            116 => 
            array (
                'id' => 117,
                'articulo_id' => 446,
                'stock_total' => 10,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            117 => 
            array (
                'id' => 118,
                'articulo_id' => 447,
                'stock_total' => 20,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            118 => 
            array (
                'id' => 119,
                'articulo_id' => 448,
                'stock_total' => 10,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            119 => 
            array (
                'id' => 120,
                'articulo_id' => 449,
                'stock_total' => 33,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            120 => 
            array (
                'id' => 121,
                'articulo_id' => 450,
                'stock_total' => 331,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            121 => 
            array (
                'id' => 122,
                'articulo_id' => 451,
                'stock_total' => 22,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            122 => 
            array (
                'id' => 123,
                'articulo_id' => 453,
                'stock_total' => 2,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            123 => 
            array (
                'id' => 124,
                'articulo_id' => 455,
                'stock_total' => 22,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            124 => 
            array (
                'id' => 125,
                'articulo_id' => 456,
                'stock_total' => 12,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            125 => 
            array (
                'id' => 126,
                'articulo_id' => 457,
                'stock_total' => 5,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            126 => 
            array (
                'id' => 127,
                'articulo_id' => 458,
                'stock_total' => 79,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            127 => 
            array (
                'id' => 128,
                'articulo_id' => 459,
                'stock_total' => 6,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            128 => 
            array (
                'id' => 129,
                'articulo_id' => 460,
                'stock_total' => 344,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            129 => 
            array (
                'id' => 130,
                'articulo_id' => 461,
                'stock_total' => 152,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            130 => 
            array (
                'id' => 131,
                'articulo_id' => 462,
                'stock_total' => 59,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            131 => 
            array (
                'id' => 132,
                'articulo_id' => 463,
                'stock_total' => 82,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            132 => 
            array (
                'id' => 133,
                'articulo_id' => 464,
                'stock_total' => 360,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            133 => 
            array (
                'id' => 134,
                'articulo_id' => 465,
                'stock_total' => 300,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            134 => 
            array (
                'id' => 135,
                'articulo_id' => 466,
                'stock_total' => 46,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            135 => 
            array (
                'id' => 136,
                'articulo_id' => 468,
                'stock_total' => 160,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            136 => 
            array (
                'id' => 137,
                'articulo_id' => 469,
                'stock_total' => 11,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            137 => 
            array (
                'id' => 138,
                'articulo_id' => 470,
                'stock_total' => 360,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            138 => 
            array (
                'id' => 139,
                'articulo_id' => 471,
                'stock_total' => 380,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            139 => 
            array (
                'id' => 140,
                'articulo_id' => 472,
                'stock_total' => 173,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            140 => 
            array (
                'id' => 141,
                'articulo_id' => 473,
                'stock_total' => 11,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            141 => 
            array (
                'id' => 142,
                'articulo_id' => 474,
                'stock_total' => 20,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            142 => 
            array (
                'id' => 143,
                'articulo_id' => 475,
                'stock_total' => 20,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            143 => 
            array (
                'id' => 144,
                'articulo_id' => 476,
                'stock_total' => 27,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            144 => 
            array (
                'id' => 145,
                'articulo_id' => 477,
                'stock_total' => 199,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            145 => 
            array (
                'id' => 146,
                'articulo_id' => 479,
                'stock_total' => 500,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            146 => 
            array (
                'id' => 147,
                'articulo_id' => 480,
                'stock_total' => 383,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            147 => 
            array (
                'id' => 148,
                'articulo_id' => 481,
                'stock_total' => 1,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            148 => 
            array (
                'id' => 149,
                'articulo_id' => 483,
                'stock_total' => 52,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            149 => 
            array (
                'id' => 150,
                'articulo_id' => 484,
                'stock_total' => 5,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            150 => 
            array (
                'id' => 151,
                'articulo_id' => 485,
                'stock_total' => 175,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            151 => 
            array (
                'id' => 152,
                'articulo_id' => 486,
                'stock_total' => 62,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            152 => 
            array (
                'id' => 153,
                'articulo_id' => 487,
                'stock_total' => 103,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            153 => 
            array (
                'id' => 154,
                'articulo_id' => 488,
                'stock_total' => 622,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            154 => 
            array (
                'id' => 155,
                'articulo_id' => 490,
                'stock_total' => 27,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            155 => 
            array (
                'id' => 156,
                'articulo_id' => 491,
                'stock_total' => 68,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:01:07',
                'updated_at' => '2025-04-03 11:01:07',
            ),
            156 => 
            array (
                'id' => 157,
                'articulo_id' => 492,
                'stock_total' => 252,
                'alerta' => NULL,
                'ubicacion' => 'general',
                'created_at' => '2025-04-03 11:05:28',
                'updated_at' => '2025-04-03 11:05:28',
            ),
        ));
        
        
    }
}