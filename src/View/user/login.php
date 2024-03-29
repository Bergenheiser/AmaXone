<section class="h-screen">
    <div class="px-6 h-full text-gray-800">
        <div class="flex justify-center items-center flex-wrap h-4/6 ">
            <div class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 mb-12 md:mb-0">
                <form action="frontController.php" method="<?php echo $debug ? "get" : "post" ?>">

                    <!-- Login input -->
                    <div class="mb-6">
                        <input
                                required
                                type="text"
                                class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Login"
                                name="login"
                        />
                    </div>

                    <!-- Password input -->
                    <div class="mb-6">
                        <input
                                required
                                type="password"
                                class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Password"
                                name="mdp"
                        />
                    </div>

                    <div class="flex justify-between items-center mb-6">
                        <div class="form-group form-check">
                        </div>
                        <a href="frontController.php?action=passwordForget&controller=user" class="text-gray-800">Mot de
                            passe oublié ?</a>
                    </div>

                    <div class="text-center lg:text-left">
                        <button
                                type="submit"
                                class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                        >
                            Se Connecter
                        </button>
                        <p class="text-sm font-semibold mt-2 pt-1 mb-0">
                            Vous n'avez pas de compte ?
                            <a
                                    href="frontController.php?action=create&controller=user"
                                    class="text-red-600 hover:text-red-700 focus:text-red-700 transition duration-200 ease-in-out"
                            >Créer un compte</a
                            >
                        </p>
                    </div>

                    <input type="hidden" name="action" value="logined"/>
                    <input type="hidden" name="controller" value="user"/>

                </form>
            </div>
        </div>
    </div>
</section>