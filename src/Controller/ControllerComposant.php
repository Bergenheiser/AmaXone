<?php

namespace App\E_Commerce\Controller;

use App\E_Commerce\Model\Repository\ComposantRepository;

class ControllerComposant {

    private static function afficheVue(array $parametres = []): void {
        extract($parametres); // Crée des variables à partir du tableau $parametres
        require "../src/View/view.php"; // Charge la vue
    }

    public static function welcome() {
        self::afficheVue([
            "pagetitle" => "Bienvenue",
            "cheminVueBody" => "composants/welcome.php",
        ]);
    }

    public static function readAll() {
        $composants = (new ComposantRepository())->selectAll();
        self::afficheVue([
            'inventaire' => $composants,
            "pagetitle" => "Catalogue",
            "cheminVueBody" => "composants/list.php",
        ]);
    }

    public static function error($errorMsg = "") {
        self::afficheVue([
            "pagetitle" => "Error",
            "msg" => $errorMsg,
            "cheminVueBody" => "composants/error.php",
        ]);
    }


}