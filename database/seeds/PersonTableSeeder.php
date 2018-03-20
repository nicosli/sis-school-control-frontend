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


    	DB::insert("REPLACE INTO person (birthdate, cellphone, curp, email, firstname, fiscal_number, fullname, gender, imgpath, lastname, nationality, password, phone, profession, register, secondlastname, username, address_id, group_id, marital_status_id, person_type_id, resume_id, school_id) 
VALUES ('2018-01-01', '0000000000', 'eeeeeeeeee', 'admin@eduApi.com', 'Admin', 'ffffffffffff', 'Administrator', 'M', NULL, 'Admin', 'M', '8c3818afbd9338f12350229831de9cf7230b696273919be4371d11b48714feb6', '0000000000', 'pppppppp', NULL, 'Admin', 'admin', NULL, NULL, NULL, 1, NULL, NULL)");


		$gender = ['male', 'female'];

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
                'imgpath'		  => $gender[$gender_idx]=='male'?1:2,
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
