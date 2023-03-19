<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <link rel="icon" href="./style/assets/icone-twitter-ronde.png">
    <link rel="stylesheet" href="./style/darkTheme.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/176eaa1f6f.js" crossorigin="anonymous"></script>
    <script src="./AJAX/javascript/do.newTweet.js" defer></script>
    <script src="./AJAX/javascript/do.retweet.js" defer></script>
    <script src="./AJAX/javascript/do.quoteTweet.js" defer></script>
    <script src="./AJAX/javascript/do.login.js" defer></script>
    <script src="./AJAX/javascript/do.register.js" defer></script>
    <script src="./AJAX/javascript/do.editUser.js" defer></script>
    <script src="./AJAX/javascript/do.comment.js" defer></script>
    <script src="./AJAX/javascript/do.newLike.js" defer></script>
    <script src="./AJAX/javascript/do.dislike.js" defer></script>
    <script src="./AJAX/javascript/do.linkToAt.js" defer></script>
    <script src="./javascript/script.js" defer></script>
    <script src="./AJAX/javascript/do.displayProfil.js" defer></script>
    <script src="./AJAX/javascript/do.follow.js" defer></script>
    <script src="./AJAX/javascript/do.clickOnAt.js"></script>
    <title><?= $t ?></title>
</head>

<body>
    <div class="grid grid-cols-5 lg:grid-cols-10 xl:grid-cols-12 gap-2">

        <div class="hidden xl:col-span-1 xl:block">

        </div>
        <div>

            <div class="col-span-1 h-screen fixed flex flex-col justify-between ">

                <div class='leftMenu'>

                    <i class="fa-brands fa-twitter w-fit hover:bg-blue-100 px-3 py-2 text-blue-500 rounded-full mx-auto text-2xl cursor-pointer xl:ml-1.5"></i>
                    <a href="index">
                        <div class="w-fit flex text-xl xl:hover:bg-gray-200 rounded-3xl pr-2 cursor-pointer ">
                            <i class="fa-solid fa-house p-4 mx-auto rounded-full hover:bg-gray-100"></i>
                            <p class="hidden xl:block font-bold text-xl mt-3">Accueil</p>
                        </div>
                    </a>
                    <div class="w-fit flex text-xl xl:hover:bg-gray-200 rounded-3xl pr-2 cursor-pointer ">
                        <i class="fa-regular fa-hashtag p-4 mx-auto rounded-full hover:bg-gray-100"></i>
                        <p class="hidden xl:block text-xl mt-3 ">Explorer</p>
                    </div>
                    <div class="w-fit flex text-xl xl:hover:bg-gray-200 rounded-3xl pr-2 cursor-pointer ">
                        <i class="fa-regular fa-bell p-4 mx-auto rounded-full hover:bg-gray-100"></i>
                        <p class="hidden xl:block text-xl mt-3 ">Notifications</p>
                    </div>
                    <div class="w-fit flex text-xl xl:hover:bg-gray-200 rounded-3xl pr-2 cursor-pointer ">
                        <i class="fa-regular fa-envelope p-4 mx-auto rounded-full hover:bg-gray-100"></i>
                        <p class="hidden xl:block text-xl mt-3 ">Messages</p>
                    </div>
                    <a href="profil">
                        <div class="w-fit flex text-xl xl:hover:bg-gray-200 rounded-3xl pr-2 cursor-pointer ">
                            <i class="fa-regular fa-user p-4 mx-auto rounded-full hover:bg-gray-100"></i>
                            <p class="hidden xl:block text-xl mt-3 ">Profil</p>
                        </div>
                    </a>
                    <div class="w-fit flex text-xl xl:hover:bg-gray-200 rounded-3xl pr-2 cursor-pointer lightTheme">
                        <i class="fa-solid fa-images p-4 mx-auto rounded-full hover:bg-gray-100"></i>
                        <p class="hidden xl:block text-xl mt-3 ">Thèmes</p>
                    </div>
                    <div>
                        <button class="hidden xl:block cursor-pointer bg-blue-500 text-white w-full py-2 px-6 rounded-3xl my-4 mr-4 hover:bg-blue-600 tweetWithSubmenu" name="sendNewTweet" type="button">Tweeter</button>
                        <i class="fa-solid fa-feather-pointed block xl:hidden p-4 rounded-full bg-blue-500 text-white w-fit cursor-pointer hover:bg-blue-600 ml-1 tweetWithSubmenu"></i>
                    </div>
                    <div class="block xl:hidden w-fit flex text-xl xl:hover:bg-gray-200 rounded-3xl pr-2 cursor-pointer logoutDisplayOverlay">
                        <form method="post">
                            <button name="logout" class="my-2">
                                <i class="fa-solid fa-right-from-bracket p-4 mx-auto rounded-full hover:bg-gray-100"></i>
                            </button>
                        </form>
                    </div>

                </div>


                <div class="mb-4 logoutDisplayOverlay">
                    <div class="hidden shadow cursor-pointer hover:bg-gray-200 rounded-3xl text-center mb-4" id="logoutPopup">
                        <form method="post">
                            <button name="logout" class="my-2">Se déconnecter</button>
                        </form>
                    </div>
                    <div class="hidden xl:flex hover:bg-gray-200 rounded-3xl cursor-pointer shadow">
                        <img src="<?= "../../img/" . $_SESSION["user_data"]["picture"] ?>" alt="avatar" class="w-12 h-12 rounded-full m-2">
                        <div class="mr-10">
                            <p class="font-bold mt-1"><?= $_SESSION["user_data"]['nickname'] ?></p>
                            <p class="italic text-gray-500 text-sm mt-2 mb-2">@<?= $_SESSION["user_data"]['nickname'] ?></p>
                        </div>
                        <i class="fa-solid fa-ellipsis my-auto mr-2"></i>
                    </div>
                </div>

            </div>

        </div>

        <div class="h-fit col-span-3 lg:col-span-6 rounded-3xl mt-2 xl:pl-[150px] xl:ml-12">

            <?= $content ?>

        </div>

        <div class="hidden lg:flex col-span-3">
            <div class="h-fit mr-4 ml-4 p-4 rounded-lg fixed lg:w-[290px] xl:w-[350px] mx-auto">
                <label for="searchTweets">
                    <i class="fa-solid fa-magnifying-glass p-4 mx-auto text-left hover:bg-gray-100 rounded-full m-2.5 p-2 cursor-pointer"></i>
                </label>
                <input type="text" class="bg-gray-200 p-5 rounded-3xl text-left focus:bg-white focus:text-blue-200 w-5/6 h-7" name="searchTweets" placeholder="Recherche Twitter" id="searchTweets">
            </div>
        </div>

        <div class="hidden xl:col-span-1 xl:block">

        </div>

    </div>

    <!-- Tweet Submenu Popup -->

    <div id="tweetSubmenuOverlay" class="fixed w-full h-auto p-10 bg-gray-500/50 inset-0 z-1 hidden">
        <div class="popup bg-white w-auto m-auto max-w-md h-auto rounded-lg text-black p-1">
            <button class="tweetSubmenuClose self-start ml-3 mt-1 cursor-pointer hover:bg-gray-100 px-4 py-2 rounded-full">&times;</button>
            <form id="newTweet">
                <div class="flex mt-2">
                    <img src="<?= "../../img/" . $_SESSION["user_data"]["picture"] ?>" alt="avatar" class="w-12 h-12 rounded-full m-2">

                    <div contenteditable="true" name="newSubmenuTweet" placeholder="Quoi de neuf ?" class="newSubmenuTweet tweetArea w-full h-10 mt-5 mr-2 focus:outline-none"></div>

                </div>
                <div class="flex justify-between my-auto">
                    <div class="flex ml-12 mt-2 mb-4">
                        <label for="imgInSubmenuTweet" class="text-blue-500 hover:bg-blue-100 rounded-full p-2 cursor-pointer">
                            <i class="fa-sharp fa-regular fa-image text-blue-500 hover:bg-blue-100 rounded-full p-2 cursor-pointer"></i>
                        </label>
                        <form id="putImginSubmenuTweet">
                            <input title="" class="absolute w-2 h-2 bg-inherit file:bg-inherit text-transparent file:text-transparent file:border-0 file:text-inherit" accept="image/png,image/jpeg,image/webp,image/jpg" type="file" id="imgInSubmenuTweet">
                        </form>
                    </div>
                    <div class='hidden w-[140px] bg-gray-200 h-2 checkNbOfCaracters self-center'>
                        <div class="subMenuCountCaracters w-[0px] h-2"></div>
                    </div>
                    <button class="ConfirmNewTweet cursor-pointer bg-blue-500 text-white px-4 rounded-3xl my-4 mr-4 hover:bg-blue-200" name="sendNewTweet" type="button">Tweeter</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>

</html>