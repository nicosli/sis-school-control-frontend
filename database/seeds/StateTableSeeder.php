<?php

use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("REPLACE INTO state (id, created_at, created_by, status, updated_at, updated_by, code, name, country_id) VALUES 
					(1, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'AGS', 'Aguascalientes', 170),
					(2, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'BC', 'Baja California', 170),
					(3, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'BCS', 'Baja California Sur', 170),
					(4, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'CAMP', 'Campeche', 170),
					(5, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'COAH', 'Coahuila de Zaragoza', 170),
					(6, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'COL', 'Colima', 170),
					(7, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'CHIS', 'Chiapas', 170),
					(8, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'CHIH', 'Chihuahua', 170),
					(9, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'DF', 'Distrito Federal', 170),
					(10, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'DGO', 'Durango', 170),
					(11, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'GTO', 'Guanajuato', 170),
					(12, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'GRO', 'Guerrero', 170),
					(13, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'HGO', 'Hidalgo', 170),
					(14, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'JAL', 'Jalisco', 170),
					(15, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'MEX', 'México', 170),
					(16, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'MICH', 'Michoacán de Ocampo', 170),
					(17, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'MOR', 'Morelos', 170),
					(18, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'NAY', 'Nayarit', 170),
					(19, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'NL', 'Nuevo León', 170),
					(20, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'OAX', 'Oaxaca', 170),
					(21, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'PUE', 'Puebla', 170),
					(22, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'QRO', 'Querétaro', 170),
					(23, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'Q ROO', 'Quintana Roo', 170),
					(24, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'SLP', 'San Luis Potosí', 170),
					(25, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'SIN', 'Sinaloa', 170),
					(26, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'SON', 'Sonora', 170),
					(27, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'TAB', 'Tabasco', 170),
					(28, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'TAMPS', 'Tamaulipas', 170),
					(29, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'TLAX', 'Tlaxcala', 170),
					(30, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'VER', 'Veracruz de Ignacio de la Llave', 170),
					(31, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'YUC', 'Yucatán', 170),
					(32, '2015-06-26 16:06:03', 'eduApi', 'A', '2015-06-26 16:06:03', 'eduApi', 'ZAC', 'Zacatecas', 170);");
    }
}
