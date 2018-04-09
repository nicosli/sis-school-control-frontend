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
         DB::insert("REPLACE INTO configuration (name, value) VALUES ('setInitConfig','true')");


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
            'description'       => 'Casado'                       
        ]);
        DB::table('maritalstatus')->insert([
            'description'       => 'Unión Civil'                       
        ]);
        DB::table('maritalstatus')->insert([
            'description'       => 'Divorciado'                       
        ]);
        DB::table('maritalstatus')->insert([
            'description'       => 'Viudo'                       
        ]);
        DB::table('maritalstatus')->insert([
            'description'       => 'Soltero'                       
        ]);
	
		
        	
        //Menu
        DB::insert("REPLACE INTO menu (description, i18n, icon, url, sub_menu_parent_id) VALUES 
					('Home','system.menu.100','system.icon.home','/',NULL),					
					('Académico','system.menu.200','system.icon.academic',NULL,NULL),
					('Usuarios','system.menu.300','system.icon.user',NULL,NULL),
					('Administración','system.menu.400','system.icon.admon',NULL,NULL),					
					('ePublish','system.menu.600','system.icon.pictour','/epublish',NULL),
					('Configuración','system.menu.600','system.icon.settings','/settings',NULL),

					('Curso Escolar','system.submenu.201',NULL,'/Academic/Schoolyear',2),
					('Grados','system.submenu.202',NULL,'/Academic/Grades',2),
					('Grupos','system.submenu.203',NULL,'/Academic/Groups',2),
					('Salones','system.submenu.204',NULL,'/Academic/Classrooms',2),
					('Materias','system.submenu.205',NULL,'/Academic/Assignments',2),
					('Escuela','system.submenu.206',NULL,'/Academic/School',2),
					('Autorizaciones','system.submenu.207',NULL,'/Academic/Authorizations',2),

					('Lista Asistencia','system.submenu.2031',NULL,'/Academic/Groups/Lists',9),

					('Materias Asignadas','system.submenu.2051',NULL,'/Academic/Assignments/Lists',11),
					('Recursos','system.submenu.2052',NULL,'/Academic/Assignments/Resources',11),

					('Personal Administrativo','system.submenu.301',NULL,'/Usuarios/Administrativo',3),
					('Personal Docente','system.submenu.302',NULL,'/Usuarios/Docente',3),
					('Tutores','system.submenu.303',NULL,'/Usuarios/Tutores',3),					
					('Estudiantes','system.submenu.305',NULL,'/Usuarios/Estudiantes',3),
					
					('Contable','system.submenu.401',NULL,'/Administrative/Accounting',4)		
					
					");



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
					(5,2)");


        //persontype
        DB::insert("REPLACE INTO persontype (description,code, i18n, role_id) VALUES 
					('Director','director','person.type.100',1),
					('Secretaria', 'secretary', 'person.type.200',2),					
					('Profesor','teacher','person.type.300',3),					
					('Estudiante','student','person.type.500',4),
					('Tutor','tutor','person.type.600',5),
					('System','system','system.user',1)");



        //publication_type
        DB::insert("REPLACE INTO publication_type (description, i18n) VALUES 
					('Warning','publication.type.warn'),
					('Notice','publication.type.info'),
					('Urgent','publication.type.urgent'),
					('Important','publication.type.important'),
					('Hollyday','publication.type.holliday')");


        //relationship_type
        DB::insert("REPLACE INTO relationship_type (description, i18n) VALUES 
                    ('Padre','person.relationship.father'),
                    ('Madre','person.relationship.mother'),
                    ('Hijo','person.relationship.son'),
                    ('Hija','person.relationship.daughtar'),
                    ('Tia','person.relationship.aunt'),
                    ('Tio','person.relationship.uncle'),
                    ('Abuelo','person.relationship.grandfather'),
                    ('Abuela','person.relationship.grandmother'),
                    ('Mentor','person.relationship.tutor')");


        //persontype_has_menu  Director
        DB::insert("REPLACE INTO persontype_has_menu (menu_id, person_type_id) VALUES 
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

        //persontype_has_menu  System
        DB::insert("REPLACE INTO persontype_has_menu (menu_id, person_type_id) VALUES 
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


         //persontype_has_menu  Secretary
        DB::insert("REPLACE INTO persontype_has_menu (menu_id, person_type_id) VALUES 
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


         //persontype_has_menu  Professor
        DB::insert("REPLACE INTO persontype_has_menu (menu_id, person_type_id) VALUES 
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


        //persontype_has_menu  Student
        DB::insert("REPLACE INTO persontype_has_menu (menu_id, person_type_id) VALUES 
					(1,4),
					(2,4),
					(5,4),
					(6,4),
					(9,4),
					(10,4),
					(11,4),					
					(15,4),
					(16,4)");


         //persontype_has_menu  Tutor
        DB::insert("REPLACE INTO persontype_has_menu (menu_id, person_type_id) VALUES 
					(1,4),
					(2,4),					
					(6,4),										
					(11,4),					
					(13,4),
					(16,4)");
    }
}
