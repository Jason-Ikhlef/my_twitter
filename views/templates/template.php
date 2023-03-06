<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/176eaa1f6f.js" crossorigin="anonymous"></script>
    <script src="./javascript/script.js" defer></script>
    <script src="./AJAX/javascript/do.newTweet.js" defer></script>
    <script src="./AJAX/javascript/do.retweet.js" defer></script>
    <script src="./AJAX/javascript/do.quoteTweet.js" defer></script>
    <script src="./AJAX/javascript/do.login.js" defer></script>
    <script src="./AJAX/javascript/do.register.js" defer></script>
    <script src="./AJAX/javascript/do.editUser.js" defer></script>
    <title><?= $t ?></title>
</head>

<body>
    <div class="grid grid-cols-5 lg:grid-cols-10 xl:grid-cols-12 gap-2">
        <div class="hidden xl:col-span-1 xl:block">

        </div>
        <div class="block">
            <div class="col-span-1 xl:col-span-2 h-screen flex flex-col pt-2 fixed xl:mr-4">
                <i class="fa-brands fa-twitter w-fit hover:bg-blue-100 px-3 py-2 text-blue-500 rounded-full mx-auto text-2xl cursor-pointer xl:ml-1.5"></i>
                <div class="w-fit mx-auto text-xl cursor-pointer">
                    <i class="fa-solid fa-magnifying-glass p-4 mx-auto rounded-full hover:bg-gray-100 lg:hidden"></i>
                </div>
                <div class="w-fit flex text-xl xl:hover:bg-gray-200 rounded-3xl pr-2 cursor-pointer xl:mr-[100px]">
                    <i class="fa-regular fa-hashtag hidden lg:block p-4 mx-auto rounded-full hover:bg-gray-100"></i>
                    <p class="hidden xl:block font-bold text-xl mt-3 mr-6">Explorer</p>
                </div>
                <div class="w-fit mx-auto flex text-xl xl:hover:bg-gray-200 rounded-3xl pr-2 cursor-pointer xl:mr-[100px]">
                    <i class="fa-solid fa-gear p-4 mx-auto rounded-full hover:bg-gray-100 "></i>
                    <p class="hidden xl:block text-xl mt-3 mr-6">Paramètres</p>
                </div>
            </div>
        </div>
        <div class="h-fit col-span-3 lg:col-span-6 rounded-3xl mt-2 xl:pl-[150px] xl:ml-12">
            <div class="flex">
                <label for="searchTweets">
                    <i class="fa-solid fa-magnifying-glass p-4 mx-auto text-left hover:bg-gray-100 rounded-tl-lg rounded-bl-lg m-2.5 p-2"></i>
                </label> 
                <input type="text" class="bg-gray-200 p-5 rounded-3xl text-left focus:bg-white focus:text-blue-200 w-5/6 h-7 mt-5 " name="searchTweets" placeholder="Recherche Twitter"  id="searchTweets">
                <i class="fa-solid fa-gear hover:bg-gray-200 m-2.5 rounded-full p-4 button cursor-pointer"></i>
            </div>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur ea nostrum debitis mollitia, ratione nulla molestias voluptatem animi consequatur? Cupiditate, corrupti rem? Itaque, officia ex a ipsa autem sed saepe.

            <?= $content ?>

            <div class="border w-full hover:bg-gray-100">
                <div class="flex m-2">
                    <img src="https://picsum.photos/id/237/200/300" alt="avatar" class="w-12 h-12 rounded-full">
                    <p class="ml-2 font-bold">Nickname</p>
                    <p class="italic ml-2">@bg</p>
                </div>
                <p class="ml-16 mt-[-30px] text-sm mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo nam illo veniam voluptatem vel minus eaque, doloribus accusamus fugit sequi sunt qui reprehenderit ullam ratione eveniet perspiciatis error laudantium dicta.</p>
                <img src="https://media.discordapp.net/attachments/1045751662767247433/1077655495965413466/Snapchat-362771284.jpg?width=328&height=584" alt="" class="w-[504px] h-[504px] mx-auto rounded-3xl">
                <div class="flex w-full gap-2 pl-4 flex-col sm:flex-row mx-auto text-center sm:gap-8 mt-2 mb-2">
                    <div class="flex gap-4 text-gray-500 hover:text-blue-400 cursor-pointer">
                        <i class="fa-regular fa-comment mt-1"></i>
                        <p>Comments</p>
                    </div>
                    <div class="flex gap-4 text-gray-500 hover:text-green-400 cursor-pointer">
                        <i class="fa-solid fa-retweet mt-1"></i>
                        <p>Retweets</p>
                    </div>
                    <div class="flex gap-4 text-gray-500 hover:text-pink-400 cursor-pointer">
                        <i class="fa-solid fa-heart mt-1"></i>
                        <p>Likes</p>
                    </div>
                </div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate ratione vitae pariatur, nemo velit similique quam tempora ducimus architecto porro perspiciatis adipisci animi neque iure inventore recusandae, optio dignissimos voluptatibus.
            </div>
        </div> 
        <div class="hidden lg:flex col-span-3 w-full mx-auto">
            <div class="border h-fit mt-4 mr-4 ml-4 p-4 rounded-lg fixed lg:w-[290px] xl:w-[350px] justify-center">
               <h1 class="font-bold">Nouveau sur Twitter ?</h1>
                <p class="italic text-gray-500">Inscrivez-vous pour profiter de votre propre fil personnalisé !</p>
                <div class="my-2">
                    <button class="bg-white rounded-3xl hover:bg-gray-100 text-center p-2 border w-full signInButton">Créer un compte</button>
                </div>
                <p>En vous inscrivant, vous acceptez les <a href="" class="text-blue-400">Conditions d'utilisation</a> et la <a href="" class="text-blue-400">Politique de confidentialité,</a> notamment l'<a href="" class="text-blue-400">Utilisation des cookies</a></p>
                <div class="ml-4 mt-4 italic text-gray-500 text-sm">
                    <p>Conditions d'utilisation</p>
                    <p>Politique de Confidentialité</p>
                    <p>Politique relative aux cookies</p>
                    <p>Accessibilité</p>
                    <p>Informations sur les publicités</p>
                    <p>© Twitter, Inc</p>
                </div>
            </div>
        </div>
        <div class="hidden xl:col-span-1 xl:block">

        </div>
        <div class="fixed bottom-0 w-full bg-blue-500">
            <div class="flex justify-evenly mx-auto h-fit gap-8">
                <div class="hidden lg:block w-4/6 ml-8 text-white font-xl">
                    <p class="font-bold text-xl">Ne manquez pas ce qui se passe.</p>
                    <p class="italic">Les utilisateurs de Twitter sont les premiers à savoir.</p>
                </div>
                <button class="rounded-3xl text-white border w-1/2 lg:1/6 mt-4 mb-4 ml-4 md:w-3/12 xl:w-2/12 button">Se connecter</button>
                <form method="post">
                    <button name="logout">Logout</button>
                </form>
                <button class="text-block bg-white rounded-3xl mr-4 w-1/2 lg:1/6 mt-4 mb-4 md:w-3/12 xl:w-2/12 signInButton">S'inscrire</button>
            </div>
        </div>
    </div>

    <!-- Login Popup -->

    <div id="loginOverlay" class="fixed w-full h-auto p-10 bg-gray-500/50 inset-0 z-1 hidden">
        <div class="popup bg-white flex flex-col justify-center items-center w-auto m-auto max-w-md h-auto rounded-lg text-black p-1">
            <button class="close self-start ml-3 mt-1 cursor-pointer hover:bg-gray-100 px-4 py-2 rounded-full">&times;</button>
            <form class="logInForm flex flex-col justify-center items-center w-full mb-8" autocomplete="off" id="login-form">
                <i class="fa-brands fa-twitter fa-2xl self-center mb-17 mt-2 text-blue-500"></i>
                <div class="logInText my-8 w-2/3">
                    <p class="text-xl text-center font-semibold">Connectez-vous à Twitter</p>
                </div>
                <div class="email mb-1 w-2/3">
                    <label for="email" class="font-semibold">*Email:</label>
                </div>
                <div class="email mb-3 w-2/3">
                    <input type="email" id="email" name="email" placeholder="example@test.com" class="w-full p-2 bg-gray-200 placeholder:text-blue-500 text-blue-500 border-2 border-blue-500 rounded-md font-semibold" required></input>
                </div>
                <div class="password mb-1 w-2/3">
                    <label for="password" class="font-semibold">*Password:</label>
                </div>
                <div class="password mb-3 w-2/3">
                    <input type="password" id="password" name="password" placeholder="******" class="w-full p-2 bg-gray-200 placeholder:text-blue-500 text-blue-500 border-2 border-blue-500 rounded-md font-semibold" required></input>
                </div>
                <button class="bg-blue-500 w-2/3 h-8 rounded-lg text-white my-3 font-semibold" id="login-btn">Connexion</button>
            </form>
            <div class="signUp mb-5 w-2/3 flex flex-col justify-center items-center">
                <p>Vous n'avez pas de compte ?</p>
                <a class="text-blue-500 cursor-pointer ">Inscrivez-vous</a>
            </div>
        </div>
    </div>

    <!-- Sign In Popup -->

    <div id="signInOverlay" class="hidden fixed w-full h-auto p-10 bg-gray-500/50 inset-0 z-1">
        <div class="popup bg-white flex flex-col justify-center items-center w-auto m-auto max-w-md h-auto rounded-lg text-black p-1">
            <button class="signInClose self-start ml-3 mt-1 cursor-pointer hover:bg-gray-100 px-4 py-2 rounded-full">&times;</button>
            <form class="logInForm flex flex-col justify-center items-center w-full mb-8" id="register-form" autocomplete="off">
                <i class="fa-brands fa-twitter fa-2xl self-center mb-17 mt-2 text-blue-500"></i>
                <div class="logInText my-8 w-2/3">
                    <p class="text-xl text-center font-semibold">Rejoignez Twitter</p>
                </div>
                <div class="username mb-1 w-2/3">
                    <label for="nickname" class="font-semibold">*Username:</label>
                </div>
                <div class="username mb-3 w-2/3">
                    <input type="text" id="signInUsername" name="nickname" placeholder="Username" class="w-full p-2 bg-gray-200 placeholder:text-blue-500 text-blue-500 border-2 border-blue-500 rounded-md font-semibold"></input>
                </div>
                <div class="signInEmail mb-1 w-2/3">
                    <label for="email" class="font-semibold">*Email:</label>
                </div>
                <div class="signInEmail mb-3 w-2/3">
                    <input type="email" id="signInEmail" name="email" placeholder="example@test.com" class="w-full p-2 bg-gray-200 placeholder:text-blue-500 text-blue-500 border-2 border-blue-500 rounded-md font-semibold"></input>
                </div>
                <div class="signInPassword mb-1 w-2/3">
                    <label for="registerPassword" class="font-semibold">*Password:</label>
                </div>
                <div class="signInPassword mb-3 w-2/3">
                    <input type="password" id="signInPassword" name="registerPassword" placeholder="******" class="w-full p-2 bg-gray-200 placeholder:text-blue-500 text-blue-500 border-2 border-blue-500 rounded-md font-semibold"></input>
                </div>
                <div class="signInConfirmPw mb-1 w-2/3">
                    <label for="registerConfirmPassword" class="font-semibold">*Confirm Password:</label>
                </div>
                <div class="signInConfirmPw mb-3 w-2/3">
                    <input type="password" id="signInConfirmPw" name="registerConfirmPassword" placeholder="******" class="w-full p-2 bg-gray-200 placeholder:text-blue-500 text-blue-500 border-2 border-blue-500 rounded-md font-semibold"></input>
                </div>
                <button class="bg-blue-500 w-2/3 h-8 rounded-lg text-white my-3 font-semibold" id="register-btn">Inscription</button>
            </form>
            <div class="signUp mb-5 w-2/3 flex flex-col justify-center items-center">
                <p>Vous avez déjà un compte ?</p>
                <a href="#" class="text-blue-500">Connectez-vous</a>
            </div>
        </div>
    </div>
</body>

</html>