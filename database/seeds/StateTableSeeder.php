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
        DB::insert("INSERT INTO state_province (code, name, country) VALUES 
					('AGS', 'Aguascalientes', 170),
					('BC', 'Baja California', 170),
					('BCS', 'Baja California Sur', 170),
					('CAMP', 'Campeche', 170),
					('COAH', 'Coahuila de Zaragoza', 170),
					('COL', 'Colima', 170),
					('CHIS', 'Chiapas', 170),
					('CHIH', 'Chihuahua', 170),
					('DF', 'Distrito Federal', 170),
					('DGO', 'Durango', 170),
					('GTO', 'Guanajuato', 170),
					('GRO', 'Guerrero', 170),
					('HGO', 'Hidalgo', 170),
					('JAL', 'Jalisco', 170),
					('MEX', 'México', 170),
					('MICH', 'Michoacán de Ocampo', 170),
					('MOR', 'Morelos', 170),
					('NAY', 'Nayarit', 170),
					('NL', 'Nuevo León', 170),
					('OAX', 'Oaxaca', 170),
					('PUE', 'Puebla', 170),
					('QRO', 'Querétaro', 170),
					('Q ROO', 'Quintana Roo', 170),
					('SLP', 'San Luis Potosí', 170),
					('SIN', 'Sinaloa', 170),
					('SON', 'Sonora', 170),
					('TAB', 'Tabasco', 170),
					('TAMPS', 'Tamaulipas', 170),
					('TLAX', 'Tlaxcala', 170),
					('VER', 'Veracruz de Ignacio de la Llave', 170),
					('YUC', 'Yucatán', 170),
					('ZAC', 'Zacatecas', 170)");
    }
}
