<?php

namespace App\E_Commerce\Model\DataObject;

class Composant extends AbstractDataObject
{

    private int $id;
    private string $libelle;
    private string $description;
    private int $prix;
    private string $imgPath;

    public function __construct(string $libelle, string $description, int $prix, string $imgPath, int $id = 0) {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->description = $description;
        $this->prix = $prix;
        $this->imgPath = $imgPath;
    }

    public function formatTableau(): array
    {
        return [
            'libelle' => $this->libelle,
            'description' => $this->description,
            'prix' => $this->prix,
            'imgPath' => $this->imgPath,
        ];
    }

    public static function construireDepuisFormulaire(array $tableauFormulaire): Composant
    {
        return new Composant(
            $tableauFormulaire['libelle'],
            $tableauFormulaire['description'],
            $tableauFormulaire['prix'],
            $tableauFormulaire['imgPath'],
        );
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLibelle(): string
    {
        return $this->libelle;
    }

    public function getPrix(): int
    {
        return $this->prix;
    }

    public function getImgPath(): string
    {
        return $this->imgPath;

    }

    public function getDescription() : string {
        return $this->description;
    }

    public function setLibelle(string $libelle): void
    {
        $this->libelle = $libelle;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setPrix(int $prix): void
    {
        $this->prix = $prix;
    }

    public function setImgPath(string $imgPath): void
    {
        $this->imgPath = $imgPath;
    }



}