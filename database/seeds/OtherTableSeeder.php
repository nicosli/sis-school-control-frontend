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
        // DB::insert("INSERT INTO configuration (name, value) VALUES ('setInitConfig','true')");


         //Tipos de documento:
        /*foreach (range(1, 5) as $i => $v) {
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
            
        } */


        //STATUS
        DB::table('security.status')->insert([
            'id'              => 200,
            'description'     => 'ACTIVE'
        ]);
        DB::table('security.status')->insert([
            'id'              => 201,
            'description'     => 'CREATED'
        ]);
        DB::table('security.status')->insert([
            'id'              => 401,
            'description'     => 'Unauthorized'
        ]);
        DB::table('security.status')->insert([
            'id'              => 403,
            'description'     => 'Forbiden'
        ]);


        // Gender
        DB::table('individual.gender')->insert([
            'id'            => 1,
            'description'   => 'Male'
        ]);
        DB::table('individual.gender')->insert([
            'id'            => 2,
            'description'   => 'Female'
        ]);


        //contact_type
        DB::table('individual.contact_type')->insert([
            'id'            => 1,
            'description'   => 'Address'
        ]);
        DB::table('individual.contact_type')->insert([
            'id'            => 2,
            'description'   => 'Email'
        ]);
        DB::table('individual.contact_type')->insert([
            'id'            => 3,
            'description'   => 'Phone'
        ]);


        //ADDRESS_TYPE
        DB::table('individual.type')->insert([
            'id'            => 1,
            'description'   => 'Home'
        ]);
        DB::table('individual.type')->insert([
            'id'            => 2,
            'description'   => 'Trabajo'
        ]);
        DB::table('individual.type')->insert([
            'id'            => 3,
            'description'   => 'Mail'
        ]);
        DB::table('individual.type')->insert([
            'id'            => 4,
            'description'   => 'Otro'
        ]);        


        //maritalstatus        
		DB::table('individual.maritalstatus')->insert([
			'id' 				=> 1,
            'description'       => 'Casado'                       
        ]);
        DB::table('individual.maritalstatus')->insert([
        	'id' 				=> 2,
            'description'       => 'Unión Civil'                       
        ]);
        DB::table('individual.maritalstatus')->insert([
        	'id' 				=> 3,
            'description'       => 'Divorciado'                       
        ]);
        DB::table('individual.maritalstatus')->insert([
        	'id' 				=> 4,
            'description'       => 'Viudo'                       
        ]);
        DB::table('individual.maritalstatus')->insert([
        	'id' 				=> 5,
            'description'       => 'Soltero'                       
        ]);
	
		
        	
        //Menu
        DB::insert("INSERT INTO security.menu (id, description, icon, path, submenu_parent) VALUES 
					(1,'Home','system.icon.home','/',NULL),					
					(2,'Académico','system.icon.academic',NULL,NULL),
					(3,'Usuarios','system.icon.user',NULL,NULL),
					(4,'Administración','system.icon.admon',NULL,NULL),					
					(5,'ePublish','system.icon.pictour','/epublish',NULL),
					(6,'Configuración','system.icon.settings','/settings',NULL),

					(7,'Curso Escolar',NULL,'/Academic/Schoolyear',2),
					(8,'Grados',NULL,'/Academic/Grades',2),
					(9,'Grupos',NULL,'/Academic/Groups',2),
					(10,'Salones',NULL,'/Academic/Classrooms',2),
					(11,'Materias',NULL,'/Academic/Assignments',2),
					(12,'Escuela',NULL,'/Academic/School',2),
					(13,'Autorizaciones',NULL,'/Academic/Authorizations',2),

					(14,'Lista Asistencia',NULL,'/Academic/Groups/Lists',9),

					(15,'Materias Asignadas',NULL,'/Academic/Assignments/Lists',11),
					(16,'Recursos',NULL,'/Academic/Assignments/Resources',11),

					(17,'Personal Administrativo',NULL,'/Usuarios/Administrativo',3),
					(18,'Personal Docente',NULL,'/Usuarios/Docente',3),
					(19,'Tutores',NULL,'/Usuarios/Tutores',3),					
					(20,'Estudiantes',NULL,'/Usuarios/Estudiantes',3),
					
					(21,'Contable',NULL,'/Administrative/Accounting',4)					
					");



        //permission
        DB::insert("INSERT INTO security.permission (id, description, action) VALUES 
					(1,'READ',1),
					(2,'UPDATE',2),
					(3,'CREATE',3),
					(4,'DELETE',4)");


        //role
        DB::insert("INSERT INTO security.role (id, description, name) VALUES 
        			(1,'ROLE_ADMIN','ADMINISTRATOR'),
					(2,'ROLE_ASSISTANT','ASSISTANT'),
					(3,'ROLE_TEACHER','DEAN'),					
					(4,'ROLE_STUDENT','STUDENT'),
					(5,'ROLE_TUTOR','TUTOR')");



        //role_has_permission
        DB::insert("INSERT INTO security.role_permission (role, permission) VALUES 
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
					(5,2)");


        //persontype
        DB::insert("INSERT INTO individual.person_type (id, description, code, role) VALUES 
					(1,'Director','director',1),
					(2,'Secretaria', 'secretary',2),					
					(3,'Profesor','teacher',3),					
					(4,'Estudiante','student',4),
					(5,'Tutor','tutor',5),
					(6,'System','system',1)");



        //publication_type
        /*DB::insert("INSERT INTO publication_type (description, i18n) VALUES 
					('Warning','publication.type.warn'),
					('Notice','publication.type.info'),
					('Urgent','publication.type.urgent'),
					('Important','publication.type.important'),
					('Hollyday','publication.type.holliday')"); */


        //relationship_type
        DB::insert("INSERT INTO individual.relationship_type (id, description) VALUES 
                    (1,'Padre'),
                    (2,'Madre'),
                    (3,'Hijo'),
                    (4,'Hija'),
                    (5,'Tia'),
                    (6,'Tio'),
                    (7,'Abuelo'),
                    (8,'Abuela'),
                    (9,'Mentor')");


        //security.persontype_menu  Director
        DB::insert("INSERT INTO security.persontype_menu (menu, persontype) VALUES 
					(1,1),
					(2,1),
					(3,1),
					(4,1),
					(5,1),
					(6,1),
					(7,1),
					(8,1),
					(9,1),
					(10,1),
					(11,1),
					(12,1),
					(13,1),
					(14,1),
					(15,1),
					(16,1),
					(17,1),
					(18,1),
					(19,1),
					(20,1),
					(21,1)");

        //security.persontype_menu  System
        DB::insert("INSERT INTO security.persontype_menu (menu, persontype) VALUES 
					(1,6),
					(2,6),
					(3,6),
					(4,6),
					(5,6),
					(6,6),
					(7,6),
					(8,6),
					(9,6),
					(10,6),
					(11,6),
					(12,6),
					(13,6),
					(14,6),
					(15,6),
					(16,6),
					(17,6),
					(18,6),
					(19,6),
					(20,6),
					(21,6)");


         //security.persontype_menu  Secretary
        DB::insert("INSERT INTO security.persontype_menu (menu, persontype) VALUES 
					(1,2),
					(2,2),
					(5,2),
					(6,2),
					(9,2),
					(10,2),
					(11,2),
					(14,2),
					(15,2),
					(16,2)");


         //security.persontype_menu  Professor
        DB::insert("INSERT INTO security.persontype_menu (menu, persontype) VALUES 
					(1,3),
					(2,3),
					(5,3),
					(6,3),
					(9,3),
					(10,3),
					(11,3),
					(14,3),
					(15,3),
					(16,3)");


        //security.persontype_menu  Student
        DB::insert("INSERT INTO security.persontype_menu (menu, persontype) VALUES 
					(1,4),
					(2,4),
					(5,4),
					(6,4),
					(9,4),
					(10,4),
					(11,4),					
					(15,4),
					(16,4)");


         //security.persontype_menu  Tutor
        DB::insert("INSERT INTO security.persontype_menu (menu, persontype) VALUES 
					(1,4),
					(2,4),					
					(6,4),										
					(11,4),					
					(13,4),
					(16,4)");
    }
}
