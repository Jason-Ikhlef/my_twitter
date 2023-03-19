<?php

$this->_t = 'Tweet Academy | Index'; // Normal que le $this soit souligné au jaune, NO PANIC.

$user = new UserManager;
$tweet = new TweetManager;

?>

<p class="text-xl font-bold pl-3 pt-3">Accueil</p>

<div class="feed border">

    <?php if (isset($_SESSION["user_id"]) && !isset($_POST["disconnect"])) : ?>
        <div class="w-full border-t">
            <form id="newTweet">
                <div id="tweetMessage" class="flex mt-4">
                    <a href="profil"><img src="<?= "../../img/" . $_SESSION["user_data"]["picture"] ?>" alt="avatar" class="w-12 h-12 rounded-full m-2"></a>
                    <div contenteditable="true" name="newTweet" placeholder="Quoi de neuf ?" cols="30" rows="10" class="newTweetArea tweetArea resize-none w-full h-10 mt-5 mr-2 focus:outline-none cursor-text"></div>
                </div>
                <div class="atPopup hidden relative bg-gray-200 rounded-xl z-10">
                    *
                </div>
                <div class="absolute flex flex-col w-1/5 bg-white max-h-48 ml-10 border border-1 border-gray-400 overflow-auto"></div>

                <div class="flex justify-between my-auto">
                    <div class="flex ml-12 mt-2 mb-4">
                        <label for="imgInTweet" class="text-blue-500 hover:bg-blue-100 rounded-full p-2 cursor-pointer">
                            <i class="fa-sharp fa-regular fa-image text-blue-500 hover:bg-blue-100 rounded-full p-2 cursor-pointer"></i>
                        </label>
                        <form id="putImgInTweet">
                            <input title="" class="absolute bg-inherit w-2 h-2 file:bg-inherit text-transparent file:text-transparent file:border-0 file:text-inherit" accept="image/png,image/jpeg,image/webp,image/jpg" type="file" name="imgInTweet" id="imgInTweet">
                        </form>
                    </div>
                    <div class='hidden w-[140px] bg-gray-200 h-2 checkNbOfCaracters self-center'>
                        <div class="countCaracters w-[0px] h-2"></div>
                    </div>
                    <button class="ConfirmNewTweet cursor-pointer bg-blue-500 text-white px-4 rounded-3xl my-4 mr-4 hover:bg-blue-200" name="sendNewTweet" type="button">Tweeter</button>
                </div>
            </form>
        </div>


    <?php endif ?>

    <?php if (isset($_SESSION["user_id"]) && !isset($_POST["disconnect"])) : ?>
        <?php if ($tweets) : ?>
            <?php foreach ($tweets as $data) : ?>
                <div class="w-full hover:bg-gray-100 border-y">
                    <?php if (empty($data->message()) && $data->origin()) { ?>

                        <!-- message si l'utilisateur co ou un utilisateur à retweeté  -->

                        <?php if ($_SESSION['user_id'] == $data->user_id()) { ?>

                            <p class='text-blue-400 italic ml-4 mt-2'>Vous avez retweeté</p>

                        <?php } else { ?>
                            <p class='text-blue-400 italic ml-4 mt-2'><?= $user->nicknameFromId($data->user_id())[0]->nickname() ?> a retweeté</p>
                        <?php } ?>

                        <!-- Partie Tweet (affichée directement sur l'index) -->


                            <!-- Pseudo + image (en placeholder pour l'instant) de l'utilisateur -->
                        <div class="flex p-4">
                            <img src="<?= "../../img/" . $user->nicknameFromId($data->user_id())[0]->picture() ?>" alt="avatar" class="w-12 h-12 rounded-full">
                            
                            <form class="displayProfil" method="get" action="profil">
                                <input class="displayProfilHidden" type="hidden" name="id" value="<?= $data->user_id() ?>">
                                <button class="displayProfilBtn" class="font-bold mt-3 ml-2">
                                    <?= $user->nicknameFromId($tweet->idUserFromOrigin($data->origin())[0]->user_id())[0]->nickname() ?>
                                </button>
                            </form>
                                
                        </div>

                            <!-- Tweet de l'utilisateur -->

                        <div class="tweet-main">
                            <p class="ml-20">
                                <?= $tweet->spanMessage($tweet->getAllTweetsDataById($data->origin(), 'Tweet')[0]->message()) ?>
                                <img src="https://via.placeholder.com/150 " alt="tweet content" class="h-[504px] w-[504px] rounded-xl mt-2">
                            </p>
                        </div>

                            <!-- Partie 'fonctionnalitées' du tweet -->

                                <!-- Retweet -->

                        <div class="m-4 border flex gap-8">
                            <div class="flex cursor-pointer relative">
                                <div class="retweet">
                                    <button value="<?= $data->origin() ?>" name="retweetButton" class=" flex retweetButton hover:text-blue-400">
                                        <i class="fa-solid fa-retweet mt-1"></i>
                                        <p class="ml-1 "><?= $tweet->retweetsNumber($data->origin()) ?></p>
                                    </button>

                                    <!-- Premier popup (qui affiche la possibilité de retweet simple ou citer ) -->

                                    <div class="retweetOverlay hidden flex flex-col absolute bg-gray-200 rounded-xl z-10 p-4 w-[170px]">
                                        <div class="flex cursor-pointer hover:text-gray-500 w-full mb-1">
                                            <button value="<?= $data->origin() ?>" name="retweetButton" type="button" class="retweetButton flex">
                                            <i class="fa-solid fa-retweet mr-3"></i>
                                                <p>Retweeter</p>
                                            </button>
                                        </div>
                                        <div class="flex cursor-pointer hover:text-gray-500">
                                            <button value="<?= $data->origin() ?>" name="displayQuoteTweet" type="button" class="displayQuoteTweet flex">
                                                <i class="fa-solid fa-pen mr-3"></i>
                                                <p>Citer le tweet</p>
                                            </button>
                                            
                                    <!-- Deuxième popup (qui affiche le tweet de l'utilisateur + la possiblité d'écrire) -->

                                            <div class="hidden popupRT fixed cursor-auto w-full h-auto p-10 bg-gray-500/50 inset-0 z-1">
                                                <div class="popup bg-white flex flex-col m-auto max-w-md h-auto rounded-lg text-black p-1">
                                                    <button class="closeQuote self-start ml-3 mt-1 cursor-pointer hover:bg-gray-100 px-4 py-2 rounded-full">&times;</button>

                                                        <!-- Partie retweet (utilisateur connecté) -->

                                                    <div class='flex mt-2'>
                                                        <img src="<?= "../../img/" . $_SESSION["user_data"]["picture"] ?>" alt="avatar" class="w-12 h-12 rounded-full m-2">
                                                        <div contenteditable="true" name="newQuoteRetweet" placeholder="Quoi de neuf ?" cols="30" rows="10" class="newQuoteRetweet resize-none w-full h-10 mt-5 mr-2 focus:outline-none cursor-text"></div>
                                                    </div>

                                                        <!-- Affichage du tweet qui va être cité -->

                                                    <div class='border rounded-xl text-sm ml-16'>
                                                        <div class='flex gap-2'>
                                                            <img src="https://via.placeholder.com/150" alt="avatar" class="w-8 h-8 rounded-full m-2">
                                                            <p class="font-bold mt-2">
                                                                <?= $user->nicknameFromId($tweet->idUserFromOrigin($data->origin())[0]->user_id())[0]->nickname() ?>
                                                            </p>
                                                            <p class='italic text-gray-400 mt-2'>
                                                                @<?= $user->nicknameFromId($tweet->idUserFromOrigin($data->origin())[0]->user_id())[0]->nickname() ?>
                                                            </p>
                                                        </div>
                                                        <p class="w-full mt-2 pl-4 pr-4">
                                                            <?= $tweet->getAllTweetsDataById($data->origin(), 'Tweet')[0]->message() ?>
                                                        </p>
                                                    </div>
                                                    
                                                        <!-- Boutton qui va envoyer le retweet -->

                                                    <button value="<?= $data->origin() ?>" name="quoteTweetButton" type="button" class="quoteTweetButton bg-blue-500 hover:bg-blue-200 w-fit p-2 rounded-3xl mt-6 self-end mb-2 mr-2">
                                                        <p class='text-white'>Tweeter</p>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                                <!-- Partie commentaire -->          

                            <div class="flex cursor-pointer relative hover:text-green-400">
                                
                                <button value="<?= $data->origin() ?>" name="commentBtnOverlay" type="button" class="commentBtnOverlay relative flex">
                                    <i class="fa-regular fa-comment mt-1"></i>
                                    <p class="ml-1"><?= $tweet->commentsNumber($data->origin()) ?></p>
                                </button>

                                    <!-- Popup qui va afficher le tweet de base, + la possiblité d'écrire un commentaire -->

                                <div class="hidden commentTweet fixed w-full cursor-auto h-auto p-10 bg-gray-500/50 inset-0 z-1">
                                    <div class="popup bg-white flex flex-col m-auto max-w-md h-auto rounded-lg text-black p-1">
                                        <button class="commentClose self-start ml-3 mt-1 cursor-pointer hover:bg-gray-100 px-4 py-2 rounded-full">&times;</button>

                                        <!-- Affichage du tweet de base -->

                                        <div class='flex'>
                                            <img src="https://via.placeholder.com/150" alt="avatar" class="w-12 h-12 rounded-full">
                                            <div class='flex flex-col'>
                                                <p class="font-bold mt-3 ml-2">
                                                    <?= $user->nicknameFromId($tweet->idUserFromOrigin($data->origin())[0]->user_id())[0]->nickname() ?>
                                                </p>
                                                <p class="w-full mt-2 pl-4 pr-4 rounded-xl border">
                                                    <?= $tweet->getAllTweetsDataById($data->origin(), 'Tweet')[0]->message() ?>
                                                </p>
                                                <p class='text-gray-400 italic'>En réponse à 
                                                    <span class='text-blue-400'>
                                                        <?= $user->nicknameFromId($tweet->idUserFromOrigin($data->origin())[0]->user_id())[0]->nickname() ?>
                                                    </span> 
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Possibilité d'écrire un commentaire -->

                                        <div class='flex'>
                                            <img src="<?= "../../img/" . $_SESSION["user_data"]["picture"] ?>" alt="avatar" class="w-12 h-12 rounded-full m-2">
                                            <div contenteditable="true" name="newCommentArea" placeholder="Quoi de neuf ?" cols="30" rows="10" class="newCommentArea resize-none w-full h-10 mt-5 mr-2 focus:outline-none cursor-text"></div>
                                        </div>
                                        <button value="<?= $data->origin() ?>" name="commentButton" type="button" class="commentButton cursor-pointer bg-blue-500 text-white w-fit px-4 rounded-3xl my-4 mr-4 hover:bg-blue-200 self-end mb-2 mr-2">
                                            Répondre
                                        </button>
                                    </div>
                                </div>                                
                            </div>
                            
                                <!-- Partie like -->

                            <div class="<?= $tweet->isLiked($data->origin()) ? "flex cursor-pointer hover:text-pink-500 text-pink-400" : "flex cursor-pointer hover:text-pink-400" ?>">
                                <button value=<?= implode("-", ["tweet_id" => $data->origin(), "user_id" => $data->user_id()]) ?> name="likeButton" type="button" class="likeButton flex">
                                    <i class="<?= $tweet->isLiked($data->origin()) ? "fa-heart mt-1 fa-solid" : "fa-heart mt-1 fa-regular" ?>"></i>
                                </button>
                                <p class="ml-1"><?= $tweet->likesNumber($data->origin()) ?></p>
                            </div>

                                <!-- Partie Voir plus -->

                            <form action="tweet" method="post" class="tweetMainForm">
                                <button class="seeComments cursor-pointer" value="<?= $data->id() ?>" name="seeComments" type="submit">Voir plus</button>
                            </form>
                        </div>
                    </div>
            <?php } else { ?>

                <!-- Partie 2 des tweets -->

                <div class="flex p-4">
                    <img src="<?= "../../img/" . $user->getPictureFromId($data->user_id())[0]->picture() ?>" alt="avatar" class="w-12 h-12 rounded-full">
                    <form class="displayProfil" method="get" action="profil">
                        <input class="displayProfilHidden" type="hidden" name="id" value="<?= $data->user_id() ?>">
                        <button class="displayProfilBtn" class="font-bold mt-3 ml-2">
                            <?= $user->nicknameFromId($data->user_id())[0]->nickname(); ?>
                        </button>
                    </form>
                </div>
                <div class="tweet-main">
                    <p class="ml-20">
                        <?= $tweet->spanMessage($data->message()) ?>
                        <img src="https://via.placeholder.com/150 " alt="tweet content" class="h-[504px] w-[504px] rounded-xl mt-2">
                    </p>
                </div>
                <?php if ($data->origin()) : ?>

                    <div class="border w-fit mt-4 rounded-xl mx-auto">
                        <div class="flex flex-col w-full">
                            <div class="flex p-4 w-full">
                                <img src="https://via.placeholder.com/150" alt="avatar" class="w-12 h-12 rounded-full">
                                <p class="font-bold mt-3 ml-2">
                                    <?= $user->nicknameFromId($tweet->idUserFromOrigin($data->origin())[0]->user_id())[0]->nickname() ?>
                                </p>
                            </div>
                            <div>
                                <p class="ml-2 mb-2">
                                    <?= $tweet->spanMessage($tweet->getAllTweetsDataById($data->origin(), 'Tweet')[0]->message()) ?>
                                </p>
                                <img src="https://via.placeholder.com/150 " alt="tweet content" class="h-[504px] w-[504px] rounded-b-xl">
                                <form action="tweet" method="post" class="tweetMainForm">
                                    <button class="seeComments cursor-pointer" value="<?= $data->origin() ?>" name="seeComments" type="submit">Voir ce tweet</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endif ?>                

                <div class="m-4 border flex gap-8">
                    <div class="flex cursor-pointer  relative">
                        <div class="retweet">

                            <!-- Partie des retweets -->

                            <button value="<?= $data->id() ?>" name="retweetButton" class="flex retweetButton hover:text-blue-400">
                                <i class="fa-solid fa-retweet mt-1"></i>
                                <p class="ml-1"><?= $tweet->retweetsNumber($data->id()) ?></p>
                            </button>

                                <!-- Premier popup (possiblité de retweet ou citer) -->

                            <div class="retweetOverlay hidden absolute bg-gray-200 rounded-xl z-10 p-4 w-[170px]">
                                <div class="flex cursor-pointer hover:text-gray-500 mb-1 hover:text-black">
                                    <button value="<?= $data->id() ?>" name="retweetButton" type="button" class="retweetButton flex">
                                        <i class="fa-solid fa-pen mr-3"></i>
                                        <p>Retweet</p>
                                    </button>
                                </div>
                                <div class="flex cursor-pointer hover:text-gray-500">
                                    <button value="<?= $data->id() ?>" name="displayQuoteTweet" type="button" class="displayQuoteTweet flex">
                                        <i class="fa-solid fa-pen mr-3"></i>
                                        <p>Citer le tweet</p>
                                    </button>                      

                                <!-- Deuxième popup (possibilité d'écrire au tweet de base) -->

                                    <div class="hidden popupRT fixed cursor-auto w-full h-auto p-10 bg-gray-500/50 inset-0 z-1">
                                        <div class="popup bg-white flex flex-col m-auto max-w-md h-auto rounded-lg text-black p-1">
                                            <button class="closeQuote self-start ml-3 mt-1 cursor-pointer hover:bg-gray-100 px-4 py-2 rounded-full">&times;</button>
                                            <div class='flex mt-2'>
                                                <img src="<?= "../../img/" . $_SESSION["user_data"]["picture"] ?>" alt="avatar" class="w-12 h-12 rounded-full m-2">
                                                <div contenteditable="true" name="newQuoteRetweet" placeholder="Quoi de neuf ?" cols="30" rows="10" class="newQuoteRetweet resize-none w-full h-10 mt-5 mr-2 focus:outline-none cursor-text"></div>
                                            </div>
                                            <div class='border rounded-xl text-sm ml-16'>
                                                <div class='flex gap-2'>
                                                    <img src="https://via.placeholder.com/150" alt="avatar" class="w-8 h-8 rounded-full m-2">
                                                    <p class="font-bold mt-2">
                                                        nom du boug (tweet de base)
                                                    </p>
                                                    <p class='italic text-gray-400 mt-2'>
                                                        @nom du boug (tweet de base)
                                                    </p>
                                                </div>
                                                <p class="w-full mt-2 pl-4 pr-4">
                                                    tweet du boug (tweet de base)
                                                </p>
                                            </div>                                
                                            <button value="<?= $data->origin() ?>" name="quoteTweetButton" type="button" class="quoteTweetButton bg-blue-600 hover:bg-red-200 w-fit p-2 rounded-3xl mt-6 self-end mb-2 mr-2">
                                                <p class='text-white'>Tweeter</p>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Partie commentaire -->

                    <div class="flex cursor-pointer hover:text-green-400">
                        <button value="<?= $data->id() ?>" name="commentBtnOverlay" type="button" class="commentBtnOverlay flex">
                            <i class="fa-regular fa-comment mt-1"></i>
                            <p class="ml-1"><?= $tweet->commentsNumber($data->id()) ?></p>
                        </button>

                        <!-- Popup des commentaires (avec le message de base affiché) -->

                        <div class="hidden commentTweet fixed w-full cursor-auto h-auto p-10 bg-gray-500/50 inset-0 z-1">
                            <div class="popup bg-white flex flex-col m-auto max-w-md h-auto rounded-lg text-black p-1">
                                <button class="commentClose self-start ml-3 mt-1 cursor-pointer hover:bg-gray-100 px-4 py-2 rounded-full">&times;</button>
                                <div class='flex'>
                                    <img src="https://via.placeholder.com/150" alt="avatar" class="w-12 h-12 rounded-full">
                                    <div class='flex flex-col'>
                                        <p class="font-bold mt-3 ml-2">
                                            nom du boug (tweet de base)
                                        </p>
                                        <p class="w-full mt-2 pl-4 pr-4 rounded-xl border">
                                            tweet du mec (tweet de base)
                                        </p>
                                        <p class='text-gray-400 italic'>En réponse à 
                                            <span class='text-blue-400'>
                                                nom du boug (tweet de base)
                                            </span> 
                                        </p>
                                    </div>
                                </div>

                                <!-- Possibilité d'écrire au mec  -->

                                <div class='flex'>
                                    <img src="<?= "../../img/" . $_SESSION["user_data"]["picture"] ?>" alt="avatar" class="w-12 h-12 rounded-full m-2">
                                    <div contenteditable="true" name="newComment" placeholder="Quoi de neuf ?" cols="30" rows="10" class="newCommentArea resize-none w-full h-10 mt-5 mr-2 focus:outline-none cursor-text" id='newCommentArea'></div>
                                </div>
                                <button value="<?= $data->origin() ?>" name="commentButton" type="button" class="commentButton cursor-pointer bg-blue-500 text-white w-fit px-4 rounded-3xl my-4 mr-4 hover:bg-blue-200 self-end mb-2 mr-2">
                                    Répondre
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Partie likes -->

                    <div class="<?= $tweet->isLiked($data->id()) ? "flex cursor-pointer hover:text-pink-500 text-pink-400" : "flex cursor-pointer hover:text-pink-400" ?>">
                        <button value=<?= implode("-", ["tweet_id" => $data->id(), "user_id" => $data->user_id()]) ?> name="likeButton" type="button" class="likeButton">
                            <i class="<?= $tweet->isLiked($data->id()) ? "fa-heart mt-1 fa-solid" : "fa-heart mt-1 fa-regular" ?>"></i>
                        </button>
                        <p class="ml-1"><?= $tweet->likesNumber($data->id()) ?></p>
                    </div>

                    <!-- Partie voir plus -->

                    <form action="tweet" method="post" class="tweetMainForm">
                        <button class="seeComments cursor-pointer" value="<?= $data->id() ?>" name="seeComments" type="submit">Voir plus</button>
                    </form>

                </div>
            <?php } ?>
        <?php endforeach ?>
    <?php endif ?>
<?php endif ?>
</div>
                </div>