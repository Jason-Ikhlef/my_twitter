<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/176eaa1f6f.js" crossorigin="anonymous"></script>
    <script src="./javascript/script.js" defer></script>
    <script src="//code.jquery.com/jquery-3.6.3.min.js" defer></script>
    <title><?= $t ?></title>
</head>
<body>
    <div class="grid grid-cols-5 lg:grid-cols-9 xl:grid-cols-10 gap-4">
        <div class="block">
            <div class="col-span-1 xl:col-span-2 h-screen flex flex-col pt-2 border-r fixed">
                <i class="fa-brands fa-twitter w-fit hover:bg-blue-100 px-3 py-2 text-blue-600 rounded-full mx-auto text-2xl cursor-pointer xl:ml-1.5"></i>
                <div class="w-fit mx-auto text-xl cursor-pointer">
                    <i class="fa-solid fa-magnifying-glass p-4 mx-auto rounded-full hover:bg-gray-100 lg:hidden"></i>
                </div>
                <div class="w-fit mx-auto flex text-xl xl:hover:bg-gray-200 rounded-3xl pr-2 cursor-pointer xl:mr-6">
                    <i class="fa-regular fa-hashtag hidden lg:block p-4 mx-auto rounded-full hover:bg-gray-100"></i>
                    <p class="hidden xl:block font-bold text-xl mt-3">Explorer</p>
                </div>
                <div class="w-fit mx-auto flex text-xl xl:hover:bg-gray-200 rounded-3xl pr-2 cursor-pointer">
                    <i class="fa-solid fa-gear p-4 mx-auto rounded-full hover:bg-gray-100"></i>
                    <p class="hidden xl:block text-xl mt-3">Paramètres</p>
                </div>
            </div>
        </div>
        <div class="h-fit col-span-3 lg:col-span-5 rounded-3xl mt-2 xl:ml-12">
            <div class="flex">
                <label for="searchTweets">
                    <i class="fa-solid fa-magnifying-glass p-4 mx-auto text-left hover:bg-gray-100 rounded-tl-lg rounded-bl-lg m-2.5 p-2"></i>
                </label> 
                <input type="text" class="bg-gray-200 p-2 rounded-3xl text-left focus:bg-white focus:text-blue-200 w-5/6 h-7 mt-5" name="searchTweets" placeholder="Recherche Twitter"  id="searchTweets">
                <i class="fa-solid fa-gear hover:bg-gray-200 m-2.5 rounded-full p-4"></i>
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
                <div class="flex w-full mx-auto text-center gap-8 mt-2 mb-2">
                    <div class="flex gap-4 text-gray-500 hover:text-blue-400">
                        <i class="fa-regular fa-comment mt-1"></i>
                        <p>Comments</p>
                    </div>
                    <div class="flex gap-4 text-gray-500 hover:text-green-400">
                        <i class="fa-solid fa-retweet mt-1"></i>
                        <p>Retweets</p>
                    </div>
                    <div class="flex gap-4
                    text-gray-500  hover:text-pink-400">
                        <i class="fa-solid fa-heart mt-1"></i>
                        <p>Likes</p>
                    </div>
                </div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate ratione vitae pariatur, nemo velit similique quam tempora ducimus architecto porro perspiciatis adipisci animi neque iure inventore recusandae, optio dignissimos voluptatibus.
            </div>
        </div> 
        <div class="hidden lg:block col-span-3">
            <div class="border h-fit mt-4 mr-4 ml-4 p-4 rounded-lg fixed lg:w-[290px] xl:w-[350px]">
               <h1 class="font-bold">Nouveau sur Twitter ?</h1>
                <p class="italic text-gray-500">Inscrivez-vous pour profiter de votre propre fil personnalisé !</p>
                <div class="my-2">
                    <button class="bg-white rounded-3xl hover:bg-gray-100 text-center p-2 border w-full">Créer un compte</button>
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
        <div class="fixed bottom-0 w-full bg-blue-500">
            <div class="flex justify-evenly mx-auto h-fit gap-8">
                <div class="hidden lg:block w-4/6 ml-8 text-white font-xl">
                    <p class="font-bold text-xl">Ne manquez pas ce qui se passe.</p>
                    <p class="italic">Les utilisateurs de Twitter sont les premiers à savoir.</p>
                </div>
                <button class="rounded-3xl text-white border w-1/2 lg:1/6 mt-4 mb-4 ml-4">Se connecter</button>
                <button class="text-white w-1/2 lg:1/6 mt-4 mb-4">Utiliser l'application</button>
            </div>
        </div>
    </div>
</body>
</html>