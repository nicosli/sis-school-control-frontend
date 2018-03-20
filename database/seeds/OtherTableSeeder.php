<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OtherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$faker = Faker::create();

        // Configuracion:
         DB::insert("REPLACE INTO configuration (id, created_at, created_by, status, updated_at, updated_by, name, value) VALUES (1,NULL,'eduApi','A',NULL,'eduApi','setInitConfig','true')");


         //Tipos de documento:
        foreach (range(1, 5) as $i => $v) {
            DB::table('document_type')->insert([
                'description'       => $faker->sentence(10)                
            ]);
        }
         

        //Grados
        foreach (range(1, 12) as $i => $v) {
        	if($v<=6){
        		DB::table('grade')->insert([
	                'name'       => 'Grado '. $v,
	                'shift'      => 'Matutino'                
	            ]);
        	}else{
        		DB::table('grade')->insert([
	                'name'       => 'Grado '. ($v -6),
	                'shift'      => 'Vespertino'                
	            ]);
        	}
            
        }


        //maritalstatus        
		DB::table('maritalstatus')->insert([
            'description'       => 'Married'                       
        ]);
        DB::table('maritalstatus')->insert([
            'description'       => 'Civil Union'                       
        ]);
        DB::table('maritalstatus')->insert([
            'description'       => 'Divorced'                       
        ]);
        DB::table('maritalstatus')->insert([
            'description'       => 'Widower'                       
        ]);
        DB::table('maritalstatus')->insert([
            'description'       => 'Single'                       
        ]);
	
		
        	
        //Menu
        DB::insert("REPLACE INTO menu (description, i18n, icon, url, sub_menu_parent_id) VALUES 
					('Home','system.menu.100','system.icon.home','../home/home.htm',NULL),
					('General','system.menu.200','system.icon.general',NULL,NULL),
					('Academic','system.menu.300','system.icon.academic',NULL,NULL),
					('Administrative','system.menu.400','system.icon.admon',NULL,NULL),
					('Settings','system.menu.500','system.icon.settings',NULL,NULL),
					('Pictour','system.menu.600','system.icon.pictour','.../ey/pictour.htm',NULL),
					('Student','system.submenu.201',NULL,'../general/student.htm',2),
					('Employee','system.submenu.202',NULL,'../general/employee.htm',2),
					('Registration','system.submenu.203',NULL,'../general/enrollment.htm',2),
					('Courses','system.submenu.301',NULL,NULL,3),
					('Assignments','system.submenu.302',NULL,NULL,3),
					('Grades/Transcript','system.submenu.303',NULL,NULL,3),
					('School','system.submenu.304',NULL,'../administration/school.htm',3),
					('Accounting','system.submenu.401',NULL,NULL,4),
					('Academic Year','system.submenu.501',NULL,'../settings/schoolYear.htm',5),
					('Groups','system.submenu.502',NULL,'../settings/group.htm',5),
					('Classrooms','system.submenu.503',NULL,'../settings/classroom.htm',5)");



        //permission
        DB::insert("REPLACE INTO permission (description, permission) VALUES 
					('READ',1),
					('UPDATE',2),
					('CREATE',3),
					('DELETE',4)");


        //role
        DB::insert("REPLACE INTO role (description, name) VALUES 
        			('ROLADMIN','ADMINISTRATOR'),
					('ROLASSISTANT','ASSISTANT'),
					('ROLTEACHER','DEAN'),
					('ROLPARENT','PARENT'),
					('ROLSTUDENT','STUDENT'),
					('ROLTUTOR','TUTOR')");



        //role_has_permission
        DB::insert("REPLACE INTO role_has_permission (role_id, permissions_id) VALUES 
					(1,1),
					(1,2),
					(1,3),
					(1,4),
					(2,1),
					(2,2),
					(2,3),
					(3,1),
					(3,2),
					(3,3),
					(3,4),
					(4,1),
					(4,2),
					(5,1),
					(5,2),
					(6,1),
					(6,2)");


        //persontype
        DB::insert("REPLACE INTO persontype (description, i18n, role_id) VALUES 
					('Director','person.type.100',1),
					('Secretaria Academica','person.type.200',2),
					('Secretaria Administrativa','person.type.201',2),
					('Secretaria General','person.type.202',2),
					('Profesor','person.type.300',3),
					('Padre','person.type.400',4),
					('Estudiante','person.type.500',5),
					('Tutor','person.type.600',6),
					('System','system.user',1)");



        //publication_type
        DB::insert("REPLACE INTO publication_type (description, i18n) VALUES 
					('Warning','publication.type.warn'),
					('Notice','publication.type.info'),
					('Urgent','publication.type.urgent'),
					('Important','publication.type.important'),
					('Hollyday','publication.type.holliday')");


        //relationship_type
        DB::insert("REPLACE INTO relationship_type (description, i18n) VALUES 
					('Father','person.relationship.father'),
					('Mother','person.relationship.mother'),
					('Son','person.relationship.son'),
					('Daugthar','person.relationship.daughtar'),
					('Aunt','person.relationship.aunt'),
					('Oncle','person.relationship.oncle'),
					('Grandfather','person.relationship.grandfather'),
					('Grandmother','person.relationship.grandmother'),
					('Mentor','person.relationship.tutor')");


        //persontype_has_menu
        DB::insert("REPLACE INTO persontype_has_menu (menu_id, person_type_id) VALUES 
					(1,1),
					(2,1),
					(3,1),
					(4,1),
					(5,1),
					(6,1),
					(1,9),
					(8,9)");
    }
}
