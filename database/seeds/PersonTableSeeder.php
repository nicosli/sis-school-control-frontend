<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $gender = ['male', 'female'];
        
        // ADMIN -------
        DB::table('person')->insert([
            'birthdate'       => '1985-05-29',
            'cellphone'       => $faker->phoneNumber,
            'curp'			  => $faker->numerify('CURP-######'),
            'email'			  => 'admin@eduApi.com',
            'firstname'       => 'Admin',
            'fiscal_number'   => $faker->numerify('RFC-########'),
            'fullname'		  => 'Admi Admin',
            'gender'		  => 'male',
            'imgpath'		  => 2,
            'lastname'		  => 'Admin',
            'nationality'	  => 'M',
            'password'		  => '8c3818afbd9338f12350229831de9cf7230b696273919be4371d11b48714feb6',
            'phone' 		  => $faker->phoneNumber,
            'profession' 	  => $faker->sentence(2),                
            'username'		  => 'Admin',
            'address_id'	  => null,
            'marital_status_id' => rand(1,5),
            'person_type_id'	=> 1,
        ]);

        foreach (range(1, 500) as $i => $v) {        	
        	$gender_idx = rand(0,1);

        	DB::table('address')->insert([
        		'street'  => $faker->address,
        		'township_id' => rand(1, 145850)
        	]);

        	$address_id = DB::getPdo()->lastInsertId();

            DB::table('person')->insert([
                'birthdate'       => $faker->dateTimeThisCentury->format('Y-m-d'),
                'cellphone'       => $faker->phoneNumber,
                'curp'			  => $faker->numerify('CURP-######'),
                'email'			  => $faker->email,
                'firstname'       => $faker->firstName($gender[$gender_idx]),
                'fiscal_number'   => $faker->numerify('RFC-########'),
                'fullname'		  => $faker->name($gender[$gender_idx]),
                'gender'		  => $gender[$gender_idx],
                'imgpath'		  => $gender[$gender_idx]=='male'?2:1,
                'lastname'		  => $faker->lastName,
                'nationality'	  => 'M',
                'password'		  => $faker->sha256,
                'phone' 		  => $faker->phoneNumber,
                'profession' 	  => $faker->sentence(2),                
                'username'		  => $faker->unique()->userName,
                'address_id'	  => $address_id,
                'marital_status_id' => rand(1,5),
                'person_type_id'	=> rand(1,9),
            ]);
        }
    }
}
