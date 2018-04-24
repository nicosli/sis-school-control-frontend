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
        $networkid = DB::table('individual.person')->insertGetId([
            'first_name'      => 'Admin',
            'middle_name'     => 'Admin',
            'last_name'       => 'Admin',
            'second_last_name'=> 'Admin',
            'dob'             => '1985-05-29',
            'gender'          => 1,            
            'curp'            => $faker->numerify('CURP-######'),
            'tin'             => $faker->numerify('RFC-########'),
            'citizenship'     => 'M',
            'occupation'       => $faker->sentence(2),
            'image_path'      => 2,
            'maritalstatus'   => rand(1,5),
            'type'	          => 1,
            'created_at'      => 'NOW()',
            'created_by'      => 'admin'
        ], 'networkid');


        //SAM
        DB::table('security.sam')->insert([
            'networkid'     => $networkid,
            'keyword'       => '8c3818afbd9338f12350229831de9cf7230b696273919be4371d11b48714feb6',
            'status'        => 200,
            'created_at'      => 'NOW()',
            'created_by'      => 'admin'
        ]);

        //CONTACT address
        $contact_address_id = DB::table('individual.contact')->insertGetId([            
            'networkid'     => $networkid,
            'type'          => 1
        ]); 
        //ADDRESS
        DB::table('individual.address')->insert([            
            'line1'         => 'line 1 no 1',
            'type'          => 1,
            'contact'       => $contact_address_id,
            'primary'       => 1,
            'township'      => 654,
            'created_at'      => 'NOW()',
            'created_by'      => 'admin'
        ]); 


        //CONTACT EMAIL
        $contact_email_id = DB::table('individual.contact')->insertGetId([            
            'networkid'     => $networkid,
            'type'          => 2
        ]);
        //EMAIL
        DB::table('individual.email')->insert([            
            'address'         => 'admin@emile.com',
            'type'          => 1,
            'contact'       => $contact_email_id,
            'primary'       => 1,
            'created_at'      => 'NOW()',
            'created_by'      => 'admin'
        ]); 


        //CONTACT PHONE
        $contact_phone_id = DB::table('individual.contact')->insertGetId([            
            'networkid'     => $networkid,
            'type'          => 3
        ]);
        //PHONE
        DB::table('individual.phone')->insert([            
            'number'         => $faker->phoneNumber,
            'type'          => 1,
            'contact'       => $contact_phone_id,
            'primary'       => 1,
            'created_at'      => 'NOW()',
            'created_by'      => 'admin'
        ]);


        
        
        

        foreach (range(1, 700) as $i => $v) {   

        	$gender_idx = rand(0,1);

            $networkid = DB::table('individual.person')->insertGetId([                
                'first_name'      => $faker->firstName(),
                'middle_name'     => '',
                'last_name'       => $faker->lastName,
                'second_last_name'=> '',
                'dob'             => $faker->dateTimeThisCentury->format('Y-m-d'),
                'gender'          => $gender_idx+1,                
                'curp'            => $faker->numerify('CURP-######'),
                'tin'             => $faker->numerify('RFC-########'),
                'citizenship'     => 'M',
                'occupation'       => $faker->sentence(2),
                'image_path'      => $gender[$gender_idx]=='male'?2:1,
                'maritalstatus'   => rand(1,5),
                'type'            => rand(1,6),
                'created_at'      => 'NOW()',
                'created_by'      => 'admin'
            ], 'networkid');


            //SAM
            DB::table('security.sam')->insert([
                'networkid'     => $networkid,
                'keyword'       => $faker->sha256,
                'status'        => 200,
                'created_at'      => 'NOW()',
                'created_by'      => 'admin'
            ]);

            //CONTACT address
            $contact_address_id = DB::table('individual.contact')->insertGetId([            
                'networkid'     => $networkid,
                'type'          => 1
            ]); 
            //ADDRESS
            DB::table('individual.address')->insert([            
                'line1'         => $faker->address,
                'type'          => rand(1,3),
                'contact'       => $contact_address_id,
                'primary'       => 1,
                'township'      => rand(1, 145850),
                'created_at'      => 'NOW()',
                'created_by'      => 'admin'
            ]); 


            //CONTACT EMAIL
            $contact_email_id = DB::table('individual.contact')->insertGetId([            
                'networkid'     => $networkid,
                'type'          => 2
            ]);
            //EMAIL
            DB::table('individual.email')->insert([            
                'address'       => $faker->email,
                'type'          => rand(1,3),
                'contact'       => $contact_email_id,
                'primary'       => 1,
                'created_at'      => 'NOW()',
                'created_by'      => 'admin'
            ]); 


            //CONTACT PHONE
            $contact_phone_id = DB::table('individual.contact')->insertGetId([            
                'networkid'     => $networkid,
                'type'          => 3
            ]);
            //PHONE
            DB::table('individual.phone')->insert([            
                'number'        => $faker->phoneNumber,
                'type'          => rand(1,3),
                'contact'       => $contact_phone_id,
                'primary'       => 1,
                'created_at'      => 'NOW()',
                'created_by'      => 'admin'
            ]);


            
        } 
    }
}
