<?php 

$this->_t = 'Tweet Academy | Tweet'; // Normal que le $this soit souligné au jaune, NO PANIC.

$user = new UserManager;
$tweet = new TweetManager;

?>


<div class='flex'>
    <a href="index"><i class="fa-solid fa-arrow-left mx-4 self-center"></i></a>
    <p class="text-xl font-bold pl-3 pt-3">Tweet</p>
</div>

<div class="tweet border">
    <div class='flex'>
        <img src="<?= "../../img/" . $user->nicknameFromId($tweet->aboveCommentsTweet()[0]->user_id())[0]->picture() ?>" alt="avatar" class="w-12 h-12 rounded-full m-4">
        <div class="tweet-header flex flex-col gap-2">
            <p class='font-bold mt-4'><?= $user->nicknameFromId($tweet->aboveCommentsTweet()[0]->user_id())[0]->nickname() ?></p> 
            <p class='text-sm italic'>@<?= $user->nicknameFromId($tweet->aboveCommentsTweet()[0]->user_id())[0]->nickname() ?></p>
            <p class='text-sm italic'><?= $tweet->aboveCommentsTweet()[0]->message() ?></p>
        </div>
    </div>
        <?php if ($tweet->aboveCommentsTweet()[0]->origin()) :?>
        <div class="tweet-quote">
            <div class="message-quoteTweet w-full mt-2 pl-4 pr-4">
                <?= $tweet->getAllTweetsDataById($tweet->aboveCommentsTweet()[0]->origin(), 'Tweet')[0]->message() ?>
            </div>
        </div>
    <?php endif ?>
    <div class="tweet-footer mt-4 flex gap-4">
                    <button class="retweetButtonPopup flex hover:text-blue-400" value="<?= $tweet->aboveCommentsTweet()[0]->id() ?>" name="retweetButton" >
                        <i class="fa-solid fa-retweet mt-1"></i>
                        <p class="ml-1"><?= $tweet->retweetsNumber($tweet->aboveCommentsTweet()[0]->id()) ?></p>
                    </button>  
                    <div class="retweetOverlay hidden absolute bg-gray-200 rounded-xl z-10 p-4 w-[170px]">
                                <div class="flex cursor-pointer hover:text-gray-500 mb-1 hover:text-black">
                                    <button value="<?= $tweet->aboveCommentsTweet()[0]->id() ?>" name="retweetButton" type="button" class="retweetButton flex">
                                        <i class="fa-solid fa-pen mr-3"></i>
                                        <p>Retweet</p>
                                    </button>
                                </div>
                                <div class="flex cursor-pointer hover:text-gray-500">
                                    <button value="<?= $tweet->aboveCommentsTweet()[0]->id() ?>" name="displayQuoteTweet" type="button" class="displayQuoteTweet flex">
                                        <i class="fa-solid fa-pen mr-3"></i>
                                        <p>Citer le tweet</p>
                                    </button>                      

                                    <div class="hidden popupRT fixed cursor-auto w-full h-auto p-10 bg-gray-500/50 inset-0 z-1">
                                        <div class="popup bg-white flex flex-col m-auto max-w-md h-auto rounded-lg text-black p-1">
                                            <button class="closeQuote self-start ml-3 mt-1 cursor-pointer hover:bg-gray-100 px-4 py-2 rounded-full">&times;</button>
                                            <div class='flex mt-2'>
                                                <img src="<?= "../../img/" . $_SESSION["user_data"]["picture"] ?>" alt="avatar" class="w-12 h-12 rounded-full m-2">
                                                <div id="quoteRetweetMsg" contenteditable="true" name="newQuoteRetweet" placeholder="Quoi de neuf ?" cols="30" rows="10" class="newQuoteRetweet resize-none w-full h-10 mt-5 mr-2 focus:outline-none cursor-text"></div>
                                            </div>
                                            <div class='border rounded-xl text-sm ml-16'>
                                                <div class='flex gap-2'>
                                                    <img src="https://via.placeholder.com/150" alt="avatar" class="w-8 h-8 rounded-full m-2">
                                                    <p class="font-bold mt-2">
                                                        <?= $user->nicknameFromId($tweet->aboveCommentsTweet()[0]->user_id())[0]->nickname() ?>
                                                    </p>
                                                    <p class='italic text-gray-400 mt-2'>
                                                    <?= "@" . $user->nicknameFromId($tweet->aboveCommentsTweet()[0]->user_id())[0]->nickname() ?>
                                                    </p>
                                                </div>
                                                <p class="w-full mt-2 pl-4 pr-4">
                                                    <?= $tweet->spanMessage($tweet->aboveCommentsTweet()[0]->message()) ?>
                                                </p>
                                            </div>                                
                                            <button value="<?= $tweet->aboveCommentsTweet()[0]->id() ?>" name="quoteTweetButton" type="button" class="quoteTweetButton bg-blue-600 hover:bg-blue-200 w-fit p-2 rounded-3xl mt-6 self-end mb-2 mr-2">
                                                <p class='text-white'>Tweeter</p>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>                      
                    <button class="commentButton flex hover:text-green-400" value="<?= $tweet->aboveCommentsTweet()[0]->id() ?>" name="commentButton" type="button">
                        <i class="fa-regular fa-comment mt-1"></i>
                        <p class="ml-1"><?= $tweet->commentsNumber($tweet->aboveCommentsTweet()[0]->id()) ?></p>
                    </button>
                    <div class="<?= $tweet->isLiked($tweet->aboveCommentsTweet()[0]->id()) ? "flex cursor-pointer hover:text-pink-500 text-pink-400" : "flex cursor-pointer hover:text-pink-400" ?>">
                        <button value=<?= implode("-", ["tweet_id" => $tweet->aboveCommentsTweet()[0]->id(), "user_id" => $tweet->aboveCommentsTweet()[0]->user_id()]) ?> name="likeButton" type="button" class="likeButton">
                            <i class="<?= $tweet->isLiked($tweet->aboveCommentsTweet()[0]->id()) ? "fa-heart mt-1 fa-solid" : "fa-heart mt-1 fa-regular" ?>"></i>
                        </button>
                        <p class="ml-1"><?= $tweet->likesNumber($tweet->aboveCommentsTweet()[0]->id()) ?></p>
                    </div>
                    <form action="tweet" method="post" id="tweetMainForm">
                        <button class="seeComments" value="<?= $tweet->aboveCommentsTweet()[0]->id() ?>" name="seeComments" type="submit">Voir plus</button>
                    </form>
                </div>
</div>

    <?php if ($comments): ?>
        <?php foreach ($comments as $data): ?>
            <div class="tweet">
                <div class="tweet-header flex">
                    <img src="<?= "../../img/" . $user->nicknameFromId($data->user_id())[0]->picture() ?>" alt="avatar" class="w-12 h-12 rounded-full m-4">
                    <div class='flex flex-col'>
                        <div class='tweet-user-name flex gap-2'>
                            <p class='font-bold mt-4'><?= $user->nicknameFromId($data->user_id())[0]->nickname() ?></p>
                            <p class='text-sm italic mt-[18px]'>@<?= $user->nicknameFromId($data->user_id())[0]->nickname() ?></p>
                        </div>
                        <p class='italic'>En réponse à <span class='text-blue-400'><?= "@" . $user->nicknameFromId($tweet->aboveCommentsTweet()[0]->user_id())[0]->nickname() ?></span></p>
                        <div class="tweet-main border w-full">               
                            <?= $data->message()  ?>
                        </div>
                    </div>
                </div>
                
                <div class="tweet-footer mt-4 flex gap-4">
                    <button class="retweetButtonPopup flex hover:text-blue-400" value="<?= $data->id() ?>" name="retweetButton" >
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
                                                <div id="quoteRetweetMsg" contenteditable="true" name="newQuoteRetweet" placeholder="Quoi de neuf ?" cols="30" rows="10" class="newQuoteRetweet resize-none w-full h-10 mt-5 mr-2 focus:outline-none cursor-text"></div>
                                            </div>
                                            <div class='border rounded-xl text-sm ml-16'>
                                                <div class='flex gap-2'>
                                                    <img src="https://via.placeholder.com/150" alt="avatar" class="w-8 h-8 rounded-full m-2">
                                                    <p class="font-bold mt-2">
                                                        <?= $user->nicknameFromId($data->user_id())[0]->nickname() ?>
                                                    </p>
                                                    <p class='italic text-gray-400 mt-2'>
                                                    <?= "@" . $user->nicknameFromId($data->user_id())[0]->nickname() ?>
                                                    </p>
                                                </div>
                                                <p class="w-full mt-2 pl-4 pr-4">
                                                    <?= $tweet->spanMessage($data->message()) ?>
                                                </p>
                                            </div>                                
                                            <button value="<?= $data->id() ?>" name="quoteTweetButton" type="button" class="quoteTweetButton bg-blue-600 hover:bg-blue-200 w-fit p-2 rounded-3xl mt-6 self-end mb-2 mr-2">
                                                <p class='text-white'>Tweeter</p>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>                      
                    <button class="commentBtnOverlay flex hover:text-green-400" value="<?= $data->id() ?>" name="commentButton" type="button">
                        <i class="fa-regular fa-comment mt-1"></i>
                        <p class="ml-1"><?= $tweet->commentsNumber($data->id()) ?></p>
                    </button>
                    <div class="hidden commentTweet fixed w-full cursor-auto h-auto p-10 bg-gray-500/50 inset-0 z-1">
                            <div class="popup bg-white flex flex-col m-auto max-w-md h-auto rounded-lg text-black p-1">
                                <button class="commentClose self-start ml-3 mt-1 cursor-pointer hover:bg-gray-100 px-4 py-2 rounded-full">&times;</button>
                                <div class='flex'>
                                    <img src="https://via.placeholder.com/150" alt="avatar" class="w-12 h-12 rounded-full">
                                    <div class='flex flex-col'>
                                        <p class="font-bold mt-3 ml-2">
                                            <?= $user->nicknameFromId($data->user_id())[0]->nickname() ?>
                                        </p>
                                        <p class="w-full mt-2 pl-4 pr-4 rounded-xl border">
                                            <?= $tweet->spanMessage($data->message()) ?>
                                        </p>
                                        <p class='text-gray-400 italic'>En réponse à 
                                            <span class='text-blue-400'>
                                                <?= $user->nicknameFromId($data->user_id())[0]->nickname() ?>
                                            </span> 
                                        </p>
                                    </div>
                                </div>

                                <!-- Possibilité d'écrire au mec  -->

                                <div class='flex'>
                                    <img src="<?= "../../img/" . $_SESSION["user_data"]["picture"] ?>" alt="avatar" class="w-12 h-12 rounded-full m-2">
                                    <div contenteditable="true" name="newComment" placeholder="Quoi de neuf ?" cols="30" rows="10" class="newCommentArea resize-none w-full h-10 mt-5 mr-2 focus:outline-none cursor-text" id='newCommentArea'></div>
                                </div>
                                <button value="<?= $data->id() ?>" name="commentButton" type="button" class="commentButton cursor-pointer bg-blue-500 text-white w-fit px-4 rounded-3xl my-4 mr-4 hover:bg-blue-200 self-end mb-2 mr-2">
                                    Répondre
                                </button>
                            </div>
                        </div>
                    <div class="<?= $tweet->isLiked($data->id()) ? "flex cursor-pointer hover:text-pink-500 text-pink-400" : "flex cursor-pointer hover:text-pink-400" ?>">
                        <button value=<?= implode("-", ["tweet_id" => $data->id(), "user_id" => $data->user_id()]) ?> name="likeButton" type="button" class="likeButton">
                            <i class="<?= $tweet->isLiked($data->id()) ? "fa-heart mt-1 fa-solid" : "fa-heart mt-1 fa-regular" ?>"></i>
                        </button>
                        <p class="ml-1"><?= $tweet->likesNumber($data->id()) ?></p>
                    </div>
                    <form action="tweet" method="post" id="tweetMainForm">
                        <button class="seeComments" value="<?= $data->id() ?>" name="seeComments" type="submit">Voir plus</button>
                    </form>
                </div>
            </div>
    <?php endforeach ?>
<?php endif ?>