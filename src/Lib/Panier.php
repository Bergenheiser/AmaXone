<?php

namespace App\E_Commerce\Lib;

use App\E_Commerce\Model\HTTP\Session;
use App\E_Commerce\Model\Repository\ProduitRepository;
use App\E_Commerce\Model\Repository\UserRepository;

class Panier
{

    /*
        Session['_panier'] = [
            "id"  => qte,
        ]


     */
    private static string $clePanier = "_panier";

    public static function ajouter(int $idComposant): void
    {
        if (self::exist()) {
            $panier = self::lirePanier();
            if (self::contient($idComposant)) {
                $panier[$idComposant] = $panier[$idComposant] + 1;
            } else {
                $panier[$idComposant] = 1;
            }
        } else {
            $panier = [];
            $panier[$idComposant] = 1;
        }
        Session::getInstance()->enregistrer(static::$clePanier, $panier);
    }

    public static function ajouterAll(int $idComposant, int $qte): void
    {
        if (self::exist()) {
            $panier = self::lirePanier();
        } else {
            $panier = [];
        }
        $panier[$idComposant] = $qte;
        Session::getInstance()->enregistrer(static::$clePanier, $panier);
    }

    public static function retirer(int $idComposant): void
    {
        if (self::contient($idComposant)) {
            $panier = self::lirePanier();
            if ($panier[$idComposant] == 1) {
                unset($panier[$idComposant]);
            } else {
                $panier[$idComposant] = $panier[$idComposant] - 1;
            }
            Session::getInstance()->enregistrer(static::$clePanier, $panier);
        }
    }

    public static function retirerAll(int $idComposant): void
    {
        if (self::contient($idComposant)) {
            $panier = self::lirePanier();
            unset($panier[$idComposant]);
            Session::getInstance()->enregistrer(static::$clePanier, $panier);
        }
    }

    public static function contient(int $idComposant): bool
    {
        return self::exist() && isset(self::lirePanier()[$idComposant]);
    }

    public static function exist(): bool
    {
        return Session::getInstance()->contient(static::$clePanier);
    }

    public static function lirePanier(): array
    {
        if (self::exist()) {
            return Session::getInstance()->lire(static::$clePanier);
        }
        return [];
    }

    public static function replacePanier(): void
    {
        $panier = [];
        $lastPanier = (new UserRepository)->getLastPanier(ConnexionUtilisateur::getLoginUtilisateurConnecte());
        if (!is_null($lastPanier)) {
            foreach (unserialize($lastPanier) as $id => $qte) {
                if (!is_null((new ProduitRepository())->select($id))) {
                    $panier[$id] = $qte;
                }
            }
        }
        if (self::exist()) {
            foreach (self::lirePanier() as $id => $qte) {
                $panier[$id] = $qte;
            }
        }
        Session::getInstance()->enregistrer(static::$clePanier, $panier);
    }

    public static function viderPanier(): void
    {
        Session::getInstance()->supprimer(static::$clePanier);
    }

    public static function enregistrePanier(array $panier = []): void
    {
        if (!$panier) {
            (new UserRepository())->setLastPanier(ConnexionUtilisateur::getLoginUtilisateurConnecte(), serialize(Panier::lirePanier()));
        } else {
            (new UserRepository())->setLastPanier(ConnexionUtilisateur::getLoginUtilisateurConnecte(), serialize($panier));
        }
    }

    public static function nbPanier(): int
    {
        $res = 0;
        foreach (self::lirePanier() as $qte) {
            $res += $qte;
        }
        return $res;
    }

    public static function filtreQte(array $panier) : array
    {
        $tab = [];
        foreach ($panier as $id => $qte) {
            if ($qte > 0) {
                $tab[$id] = $qte;
            }
        }
        return $tab;
    }

}