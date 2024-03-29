<?php

namespace App\E_Commerce\Model\Repository;

use App\E_Commerce\Model\Repository\AbstractRepository;
use App\E_Commerce\Model\DataObject\User;
use PDOException;

class UserRepository extends AbstractRepository
{
    protected function getNomTable(): string {
        return 'projet_user';
    }

    protected function getNomClePrimaire(): string {
        return 'login';
    }

    protected function getNomsColonnes(): array {
        return ['login', 'nom', 'prenom', 'mdpHache', 'estAdmin', 'email', 'emailAValider', 'nonce'];
    }

    protected function construire(array $userFormatTableau) : User {
        $login = $userFormatTableau['login'];
        $nom = $userFormatTableau['nom'];
        $prenom = $userFormatTableau['prenom'];
        $mdpHache = $userFormatTableau['mdpHache'];
        $estAdmin = $userFormatTableau['estAdmin'];
        $email = $userFormatTableau['email'];
        $emailAValider = $userFormatTableau['emailAValider'];
        $nonce = $userFormatTableau['nonce'];
        return new User($login, $nom, $prenom, $mdpHache, $estAdmin, $email, $emailAValider, $nonce);
    }

    public function getLastPanier(string $login) : ?string {
        try {
            $pdo = DatabaseConnection::getPdo();
            $sql = "SELECT dernierPanier FROM " . self::getNomTable() . " WHERE login = :login ;";
            $statement = $pdo->prepare($sql);
            $statement->execute(["login" => $login]);
            $res = $statement->fetch();
            return !$res ? null : $res["dernierPanier"];
        } catch (PDOException) {
            return null;
        }
    }

    public function setLastPanier(string $login, string $panier) : void {
        try {
            $pdo = DatabaseConnection::getPdo();
            $sql = "UPDATE " . self::getNomTable() . " SET dernierPanier = :panier WHERE login = :login ;";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                "login" => $login,
                "panier" => $panier
            ]);
        } catch (PDOException) {}
    }

}