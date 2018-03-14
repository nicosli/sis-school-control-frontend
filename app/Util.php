<?php
namespace App;

class Util{
    public static function buildMenu($res){
        $html = "";
        foreach ($res as $key => $menu) {
            if($menu->url == null){
                $html .= '<li class="nav-item dropdown">';
                    $html .= '<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">'.$menu->description.'</a>';
                    $html .= '<div class="dropdown-menu">';
                        foreach ($menu->subMenus as $keySub => $subMenu) {
                            $html .= '<a class="dropdown-item" href="'.$subMenu->url.'">'.$subMenu->description.'</a>';                            
                        }
                    $html .= '</div>';
                $html .= '</li>';
            }else{
                $html .= '<li class="nav-item">';
                    $html .= '<a class="nav-link" href="'.asset($menu->url).'">'.$menu->description.'</a>';
                $html .= '</li>';
            }
        }
        /*
        |--------------------------------------------------------------------------
        | Temporal
        |--------------------------------------------------------------------------
        | Esta parte del menú es temporal, mientras se termina el servicio en la API
        |
        */
        $html .= '<li class="nav-item dropdown">';
            $html .= '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                $html .= 'Usuarios';
            $html .= '</a>';
            $html .= '<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">';
                $html .= '<a class="dropdown-item" href="'.asset('/Usuarios/Administrativo').'">Personal Administrativo</a>';
                $html .= '<a class="dropdown-item" href="'.asset('/Usuarios/Docente').'">Personal Docente</a>';
                $html .= '<a class="dropdown-item" href="'.asset('/Usuarios/Tutores').'">Tutores</a>';
                $html .= '<a class="dropdown-item" href="'.asset('/Usuarios/Padres').'">Padres de familia</a>';
                $html .= '<a class="dropdown-item" href="'.asset('/Usuarios/Estudiante').'">Estudiantes</a>';
                $html .= '<div class="dropdown-divider"></div>';
                $html .= '<a class="dropdown-item" href="'.asset('/Usuarios/Sistema').'">Sistema</a>';
            $html .= '</div>';
        $html .= '</li>';

        return $html;
    }
}