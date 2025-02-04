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
                    <div contenteditable="true" name="newTweet" placeholder="Quoi de neuf ?" cols="30" rows="10" class="newTweetArea tweetArea resize-none w-5/6 h-10 mt-5 mr-2 focus:outline-none cursor-text overflow-auto"></div>
                </div>


                <div class="atPopup hidden absolute ml-2 h-[100px] overflow-y-hidden bg-gray-200 rounded-xl z-10 w-fit">
                  
                </div>

                <div class="flex justify-between my-auto">
                    <div class="flex ml-12 mt-2 mb-4">
                        <label for="imgInTweet" class="text-blue-500 hover:bg-blue-100 rounded-full p-2 cursor-pointer">
                            <i class="fa-sharp fa-regular fa-image text-blue-500 hover:bg-blue-100 rounded-full p-2 cursor-pointer"></i>
                        </label>
                        <form id="putImgInTweet">
                            <input title="" class="absolute bg-inherit w-2 h-2 file:bg-inherit text-transparent file:text-transparent file:border-0 file:text-inherit" accept="image/png,image/jpeg,image/webp,image/jpg" type="file" name="imgInTweet" id="imgInTweet">
                            <span id="imgInTweetName" class="m-auto"></span>
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
                <div class="w-full hover:bg-gray-100 border-y tweetForDark">
                    <?php if (empty($data->message()) && $data->origin()) { ?>


                        <?php if ($_SESSION['user_id'] != $data->user_id()) { ?>

                            <form class="displayProfil flex cursor-pointer" method="get" action="profil">
                                <input type="hidden" name="id" value="<?= $data->user_id() ?>">
                                <p class='text-blue-400 italic hover:underline cursor-pointer ml-2 mt-2'><?= $user->nicknameFromId($data->user_id())[0]->nickname() ?> a retweeté
                                </p>
                            </form>



                        <div class="flex p-4">
                            <form class="displayProfil flex cursor-pointer" method="get" action="profil">
                                <input type="hidden" name="id" value="<?= $tweet->idUserFromOrigin($data->origin())[0]->user_id() ?>">
                                <img src="<?= "../../img/" . $user->nicknameFromId($tweet->idUserFromOrigin($data->origin())[0]->user_id())[0]->picture() ?>" alt="avatar" class="w-12 h-12 rounded-full">
                                <p class="font-bold mt-3 ml-2">
                                    <?= $user->nicknameFromId($tweet->idUserFromOrigin($data->origin())[0]->user_id())[0]->nickname() ?>
                                </p>
                            </form>
                                
                        </div>


                        <div class="tweet-main ml-20">
                            <span>
                                <?= $tweet->spanMessage($tweet->getAllTweetsDataById($data->origin(), 'Tweet')[0]->message()) ?>
                                <?php if ($tweet->spanMessage($tweet->getAllTweetsDataById($data->origin(), 'Tweet')[0]->images()) !== "") { ?>
                                    <img src="<?= "../../img/" . $tweet->spanMessage($tweet->getAllTweetsDataById($data->origin(), 'Tweet')[0]->images()) ?>" alt="tweet content" class="h-[504px] w-[504px] rounded-xl mt-2">
                                <?php } ?>
                            </p>
                        </div>



                        <div class="m-4 border flex gap-8">
                            <div class="flex cursor-pointer relative">
                                <div class="retweet">
                                    <button value="<?= $data->origin() ?>" name="retweetButtonPopup" class=" flex retweetButtonPopup hover:text-blue-400">
                                        <i class="fa-solid fa-retweet mt-1"></i>
                                        <p class="ml-1 "><?= $tweet->retweetsNumber($data->origin()) ?></p>
                                    </button>


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
                                            

                                            <div class="hidden popupRT fixed cursor-auto w-full h-auto p-10 bg-gray-500/50 inset-0 z-1">
                                                <div class="popup bg-white flex flex-col m-auto max-w-md h-auto rounded-lg text-black p-1">
                                                    <button class="closeQuote self-start ml-3 mt-1 cursor-pointer hover:bg-gray-100 px-4 py-2 rounded-full">&times;</button>


                                                    <div class='flex mt-2'>
                                                        <img src="<?= "../../img/" . $_SESSION["user_data"]["picture"] ?>" alt="avatar" class="w-12 h-12 rounded-full m-2">
                                                        <div contenteditable="true" name="newQuoteRetweet" placeholder="Quoi de neuf ?" cols="30" rows="10" class="newQuoteRetweet resize-none w-5/6 h-10 mt-5 mr-2 focus:outline-none cursor-text overflow-auto"></div>
                                                    </div>


                                                    <div class='border rounded-xl text-sm ml-16'>
                                                        <div class='flex gap-2'>
                                                            <img src="<?= "../../img/" . $user->nicknameFromId($tweet->idUserFromOrigin($data->origin())[0]->user_id())[0]->picture()  ?>" alt="avatar" class="w-8 h-8 rounded-full m-2">
                                                            <p class="font-bold mt-2 ml-2">
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
                                                    

                                                    <button value="<?= $data->origin() ?>" name="quoteTweetButton" type="button" class="quoteTweetButton bg-blue-500 hover:bg-blue-200 w-fit p-2 rounded-3xl mt-6 self-end mb-2 mr-2">
                                                        <p class='text-white'>Tweeter</p>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="flex cursor-pointer relative hover:text-green-400">
                                
                                <button value="<?= $data->origin() ?>" name="commentBtnOverlay" type="button" class="commentBtnOverlay relative flex">
                                    <i class="fa-regular fa-comment mt-1"></i>
                                    <p class="ml-1"><?= $tweet->commentsNumber($data->origin()) ?></p>
                                </button>


                                <div class="hidden commentTweet fixed w-full cursor-auto h-auto p-10 bg-gray-500/50 inset-0 z-1">
                                    <div class="popup bg-white flex flex-col m-auto max-w-md h-auto rounded-lg text-black p-1">
                                        <button class="commentClose self-start ml-3 mt-1 cursor-pointer hover:bg-gray-100 px-4 py-2 rounded-full">&times;</button>


                                        <div class='flex'>
                                            <img src="https://via.placeholder.com/150" alt="avatar" class="w-12 h-12 rounded-full m-2">
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
                                    </div>
                                </div>                                
                            </div>
                            

                            <div class="<?= $tweet->isLiked($data->origin()) ? "flex cursor-pointer hover:text-pink-500 text-pink-400" : "flex cursor-pointer hover:text-pink-400" ?>">
                                <button value=<?= implode("-", ["tweet_id" => $data->origin(), "user_id" => $data->user_id()]) ?> name="likeButton" type="button" class="likeButton flex">
                                    <i class="<?= $tweet->isLiked($data->origin()) ? "fa-heart mt-1 fa-solid" : "fa-heart mt-1 fa-regular" ?>"></i>
                                </button>
                                <p class="ml-1"><?= $tweet->likesNumber($data->origin()) ?></p>
                            </div>


                            <form action="tweet" method="post" class="tweetMainForm">
                                <button class="seeComments cursor-pointer" value="<?= $data->id() ?>" name="seeComments" type="submit">Voir plus</button>
                            </form>
                        </div>
                <?php } ?>
                </div>
            <?php } else { ?>

        
                <div class="flex p-4">
                    <form class="displayProfil flex cursor-pointer" method="get" action="profil">
                        <img src="<?= "../../img/" . $user->getPictureFromId($data->user_id())[0]->picture() ?>" alt="avatar" class="w-12 h-12 rounded-full">
                        <input type="hidden" name="id" value="<?= $data->user_id() ?>">
                        <p class="font-bold mt-3 ml-2">
                            <?= $user->nicknameFromId($data->user_id())[0]->nickname(); ?>
                        </p>
                    </form>
                </div>
                <div class="tweet-main ml-20">
                    <span>
                        <?= $tweet->spanMessage($data->message()) ?>
                        <?php if ($data->images() !== "") {?>
                            <img src="<?= "../../img/" . $data->images() ?>" alt="tweet content" class="h-[504px] w-[504px] rounded-xl mt-2">
                        <?php } ?>
                    </p>
                </div>
                <?php if ($data->origin()) : ?>

                    <div class="border w-[504px] mt-4 rounded-xl mx-auto">
                        <div class="flex flex-col w-full">
                            <div class="flex p-4 w-full">
                                <img src="<?= "../../img/" . $user->nicknameFromId($tweet->idUserFromOrigin($data->origin())[0]->user_id())[0]->picture()  ?>" alt="avatar" class="w-12 h-12 rounded-full">
                                <p class="font-bold mt-3 ml-2">
                                    <?= $user->nicknameFromId($tweet->idUserFromOrigin($data->origin())[0]->user_id())[0]->nickname() ?>
                                </p>
                            </div>
                            <div>
                                <p class="ml-2 mb-2">
                                    <?= $tweet->spanMessage($tweet->getAllTweetsDataById($data->origin(), 'Tweet')[0]->message()) ?>
                                    <?php if ($tweet->getImageFromOrigin($data->origin()) !== "") {?>
                                        <img src="<?= "../../img/" . $tweet->getImageFromOrigin($data->origin()) ?>" alt="tweet content" class="h-[504px] w-[504px] rounded-xl mt-2">
                                    <?php } ?>
                                </p>
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


                            <button value="<?= $data->id() ?>" name="retweetButtonPopup" class="<?= $tweet->isRetweeted($data->id()) ? "flex retweetButtonPopup text-blue-400" : "flex retweetButtonPopup hover:text-blue-400"  ?>">
                                <i class="fa-solid fa-retweet mt-1"></i>
                                <p class="ml-1"><?= $tweet->retweetsNumber($data->id()) ?></p>
                            </button>

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


                                    <div class="hidden popupRT fixed cursor-auto w-full h-auto p-10 bg-gray-500/50 inset-0 z-1">
                                        <div class="popup bg-white flex flex-col m-auto max-w-md h-auto rounded-lg text-black p-1">
                                            <button class="closeQuote self-start ml-3 mt-1 cursor-pointer hover:bg-gray-100 px-4 py-2 rounded-full">&times;</button>
                                            <div class='flex mt-2'>
                                                <img src="<?= "../../img/" . $_SESSION["user_data"]["picture"] ?>" alt="avatar" class="w-12 h-12 rounded-full m-2">
                                                <div id="quoteRetweetMsg" contenteditable="true" name="newQuoteRetweet" placeholder="Quoi de neuf ?" cols="30" rows="10" class="newQuoteRetweet resize-none w-5/6 h-10 mt-5 mr-2 focus:outline-none cursor-text overflow-auto"></div>
                                            </div>
                                            <div class='border rounded-xl text-sm ml-16'>
                                                <div class='flex gap-2'>
                                                    <img src="<?= "../../img/" . $user->getPictureFromId($data->user_id())[0]->picture() ?>" alt="avatar" class="w-8 h-8 rounded-full m-2 mt-1">
                                                    <p class="font-bold mt-2">
                                                        <?= $user->nicknameFromId($data->user_id())[0]->nickname() ?>
                                                    </p>
                                                    <p class='italic text-gray-400 mt-2'>
                                                    <?= $tweet->spanMessage("@" . $user->nicknameFromId($data->user_id())[0]->nickname()) ?>
                                                    </p>
                                                </div>
                                                <p class="w-full mt-2 pl-4 pr-4">
                                                    <?= $tweet->spanMessage($data->message()) ?>
                                                    
                                                    <?php if ($data->images() !== "") {?>
                                                        <img src="<?= "../../img/" . $data->images() ?>" alt="tweet content" class="h-[504px] w-[504px] rounded-xl mt-2">
                                                    <?php } ?>
                                                </p>
                                            </div>                                
                                            <button value="<?= $data->id() ?>" name="quoteTweetButton" type="button" class="quoteTweetButton bg-blue-600 hover:bg-blue-200 w-fit p-2 rounded-3xl mt-6 self-end mb-2 mr-2">
                                                <p class='text-white'>Tweeter</p>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="flex cursor-pointer hover:text-green-400">
                        <button value="<?= $data->id() ?>" name="commentBtnOverlay" type="button" class="commentBtnOverlay flex">
                            <i class="fa-regular fa-comment mt-1"></i>
                            <p class="ml-1"><?= $tweet->commentsNumber($data->id()) ?></p>
                        </button>

                        <div class="hidden commentTweet fixed w-full cursor-auto h-auto p-10 bg-gray-500/50 inset-0 z-1">
                            <div class="popup bg-white flex flex-col m-auto max-w-md h-auto rounded-lg text-black p-1">
                                <button class="commentClose self-start ml-3 mt-1 cursor-pointer hover:bg-gray-100 px-4 py-2 rounded-full">&times;</button>
                                <div class='flex'>
                                    <img src="<?= "../../img/" . $user->getPictureFromId($data->user_id())[0]->picture() ?>" alt="avatar" class="w-12 h-12 rounded-full">
                                    <div class='flex flex-col'>
                                        <p class="font-bold mt-3 ml-2">
                                            <?= $user->nicknameFromId($data->user_id())[0]->nickname() ?>
                                        </p>
                                        <div class="w-full mt-2 pl-4 pr-4 rounded-xl border">
                                            <?= $tweet->spanMessage($data->message()) ?>
                                                    </div>
                                        <p class='text-gray-400 italic'>En réponse à 
                                            <span class='text-blue-400'>
                                                <?= $tweet->spanMessage("@". $user->nicknameFromId($data->user_id())[0]->nickname()) ?>
                                            </span> 
                                        </p>
                                    </div>
                                </div>


                                <div class='flex'>
                                    <img src="<?= "../../img/" . $_SESSION["user_data"]["picture"] ?>" alt="avatar" class="w-12 h-12 rounded-full m-2">
                                    <div contenteditable="true" name="newComment" placeholder="Quoi de neuf ?" cols="30" rows="10" class="newCommentArea resize-none w-5/6 h-10 mt-5 mr-2 focus:outline-none cursor-text overflow-auto" id='newCommentArea'></div>
                                </div>
                                <button value="<?= $data->id() ?>" name="commentButton" type="button" class="commentButton cursor-pointer bg-blue-500 text-white w-fit px-4 rounded-3xl my-4 mr-4 hover:bg-blue-200 self-end mb-2 mr-2">
                                    Répondre
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="<?= $tweet->isLiked($data->id()) ? "flex cursor-pointer hover:text-pink-500 text-pink-400" : "flex cursor-pointer hover:text-pink-400" ?>">
                        <button value=<?= implode("-", ["tweet_id" => $data->id(), "user_id" => $data->user_id()]) ?> name="likeButton" type="button" class="likeButton">
                            <i class="<?= $tweet->isLiked($data->id()) ? "fa-heart mt-1 fa-solid" : "fa-heart mt-1 fa-regular" ?>"></i>
                        </button>
                        <p class="ml-1"><?= $tweet->likesNumber($data->id()) ?></p>
                    </div>

                    <form action="tweet" method="post" class="tweetMainForm">
                        <button class="seeComments cursor-pointer" value="<?= $data->id() ?>" name="seeComments" type="submit">Voir plus</button>
                    </form>
                </div>
            </div>
            <?php } ?>
        <?php endforeach ?>
    <?php endif ?>
<?php endif ?>
</div>