<?php
$idProduitCommande = [];
if (isset($produitsCommande)) {
    foreach ($produitsCommande as $produitSerialize => $qte) {
        $produit = unserialize($produitSerialize);
        $idProduitCommande[$produit->getId()] = $qte;
    }
} else if (isset($lastProduit)) {
    $idProduitCommande = $lastProduit;
}

?>

<article>
    <form method="<?php echo $debug ? "get" : "post" ?>" action="frontController.php">
        <fieldset>
            <legend><?php echo $action == "create" ? "Création" : "Modification" ?> d'une commande :</legend>
            <?php
            if ($action == "update") {
                ?>
                <p>
                    <label for="id_id">ID</label> :
                    <input type="text" value='<?php echo htmlspecialchars($commande->getId()) ?>' name="id" id="id_id"
                           readonly/>
                </p>
                <?php
            } else {
                echo "<input type='hidden' name='id' value='-1' />";
            }
            ?>
            <p>
                <label for="date_id">Date</label> :
                <input type="date" <?php echo !isset($commande) ? 'placeholder="09/12/2022"' : "value='" . htmlspecialchars($commande->getDate()) . "'" ?>
                       name="date" id="date_id"
                       required/>
            </p>
            <p>
                <label for="statut_id">Statut</label> :
                <input type="text" <?php echo !isset($commande) ? 'placeholder="en cours"' : "value='" . htmlspecialchars($commande->getStatut()) . "'" ?>
                       name="statut"
                       id="statut_id"
                       required/>
            </p>
            <p>
                <label for="login_id">Login</label> :
                <select name="userLogin" id="login_id">
                    <?php
                    foreach ($users as $user) {
                        echo "<option value='" . htmlspecialchars($user->get('login')) . "' " . (isset($commande) && $commande->getUserLogin() == $user->get('login') ? "selected" : "") . " >" . htmlspecialchars($user->get('login')) . "</option>";
                    }
                    ?>
                </select>
            </p>
            <div class="my-5" >
            <?php
            foreach ($produits as $produit) {
                echo "<p>\n";
                echo "<label for='" . $produit->getId() . "_id'> " . $produit->getLibelle() . " </label>\n";
                echo "<select id='" . $produit->getId() . "_id' name='produit[" . $produit->getId() . "]'>\n";
                for ($i = 0; $i < 20; $i++) {
                    echo "<option value='$i' " . ((array_key_exists($produit->getId(), $idProduitCommande) && $i == $idProduitCommande[$produit->getId()]) ? "selected" : "") . " > $i </option>\n";
                }
                echo "</select>\n";
                echo "</p>\n";
            }
            ?>
            </div>
            <p>
                <input type="hidden" name="controller" value="commande"/>
                <input type="hidden" name="action" value="<?php echo $action == "create" ? "created" : "updated" ?>"/>
                <input type="submit" value="Envoyer"/>
            </p>
        </fieldset>
    </form>
</article>
