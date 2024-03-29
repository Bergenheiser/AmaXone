<div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
    <!--
      Background backdrop, show/hide based on slide-over state.

      Entering: "ease-in-out duration-500"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in-out duration-500"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity">


        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">

                    <div class="pointer-events-auto w-screen max-w-md">
                        <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                            <div class="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
                                <div class="flex items-start justify-between">
                                    <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Panier
                                        d'achats</h2>
                                    <div class="ml-3 flex h-7 items-center">
                                        <button type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500">
                                            <span class="sr-only">Close panel</span>
                                            <!-- Heroicon name: outline/x-mark -->
                                            <a href="frontController.php?action=catalogue&controller=categorie">
                                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                     viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                     aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                            </a>
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                                    <p>
                                        <a href="frontController.php?action=viderPanier&controller=produit">
                                            <button type="button"
                                                    class="font-medium text-indigo-600 hover:text-indigo-500">
                                                Vider le panier
                                            </button>
                                        </a>
                                    </p>
                                </div>

                                <div class="mt-8">
                                    <div class="flow-root">
                                        <ul role="list" class="-my-6 divide-y divide-gray-200">

                                            <?php
                                            $total = 0;
                                            foreach ($panierProduit

                                            as $produitSerialize => $qte) {
                                            $produit = unserialize($produitSerialize);

                                            ?>

                                            <li class="flex py-6">
                                                <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                    <img src="<?php echo "../assets/images/produits/" . htmlspecialchars($produit->getImgPath()); ?>"
                                                         alt="Front of satchel with blue canvas body, black straps and handle, drawstring top, and front zipper pouch."
                                                         class="h-full w-full object-cover object-center">
                                                </div>

                                                <div class="ml-4 flex flex-1 flex-col">
                                                    <div>
                                                        <div class="flex justify-between text-base font-medium text-gray-900">
                                                            <h3>
                                                                <a href="#"><?php echo htmlspecialchars($produit->getLibelle()) ?> </a>
                                                            </h3>
                                                            <p class="ml-4"><?php echo htmlspecialchars($produit->getPrix()) ?>
                                                                €/p.</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-1 items-end justify-between text-sm">
                                                        <p class="text-gray-500">x <?php echo $qte; ?></p>
                                                        <form action="frontController.php" method="post"
                                                              id="QteForm<?php echo $produit->getId(); ?>">
                                                            <input type="hidden" name="action" value="addAllPanier">
                                                            <input type="hidden" name="controller" value="produit">
                                                            <input type="hidden" name="id"
                                                                   value="<?= htmlspecialchars($produit->getId()); ?>">
                                                            <div class="flex">
                                                                <select name="qte"
                                                                        onchange="let QteForm = document.getElementById('QteForm<?php echo htmlspecialchars($produit->getId());?>'); QteForm.submit();">
                                                                    <?php
                                                                    for ($i = 1; $i <= 10; $i++) {
                                                                        if ($i == $qte) {
                                                                            echo "<option value='$i' selected>$i</option>";
                                                                        } else {
                                                                            echo "<option value='$i'>$i</option>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                        </form>
                                                    </div>

                                                    <div class="flex">

                                                        <a href="frontController.php?action=removeAllPanier&controller=produit&id=<?php echo htmlspecialchars($produit->getId()) ?>">
                                                            <button type="button"
                                                                    class="font-medium text-indigo-600 hover:text-indigo-500">

                                                                Retirer
                                                            </button>
                                                        </a>

                                                    </div>
                                                </div>
                                    </div>
                                    </li>
                                    <?php
                                    $total += $produit->getPrix() * $qte;
                                    } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                            <div class="flex justify-between text-base font-medium text-gray-900">
                                <p>Sous-Total : </p>
                                <p><?php echo $total; ?>€</p>
                            </div>
                            <p class="mt-0.5 text-sm text-gray-500">Frais de ports et taxes incluses.</p>
                            <div class="mt-6">
                                <a href="frontController.php?action=passerCommande&controller=commande"
                                   class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Commander</a>
                            </div>
                            <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                                <p>
                                    ou
                                    <a href="frontController.php?action=catalogue&controller=categorie">
                                        <button type="button"
                                                class="font-medium text-indigo-600 hover:text-indigo-500">
                                            Continuer d'explorer
                                            <span aria-hidden="true"> &rarr;</span>
                                        </button>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
</div>

