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

        return $html;
    }
}