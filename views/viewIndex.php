<?php

$this->_t = 'Tweet Academy | Index'; // Normal que le $this soit souligné au jaune, NO PANIC.

$user = new UserManager;
$tweet = new TweetManager;

?>

<div class="feed border">

    <?php if (isset($_SESSION["user_id"]) && !isset($_POST["disconnect"])) : ?>

        <div class="w-full border-t">
            <form id="newTweet">
                <div id="tweetMessage" class="flex mt-4">
                    <a href="profil"><img src="https://via.placeholder.com/150" alt="avatar" class="w-12 h-12 rounded-full m-2"></a>
                    <div contenteditable="true" name="newTweet" placeholder="Quoi de neuf ?" cols="30" rows="10" class="newTweetArea resize-none w-full h-10 mt-5 mr-2 focus:outline-none"></div>
                </div>
                <div class="absolute flex flex-col w-1/5 bg-white max-h-48 ml-10 border border-1 border-gray-400 overflow-auto"></div>
                <div class="flex justify-between my-auto">
                    <div class="flex ml-12 mt-2 mb-4">
                        <i class="fa-sharp fa-regular fa-image text-blue-500 hover:bg-blue-100 rounded-full p-4 cursor-pointer"></i>
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
                        <?php if ($_SESSION['user_id'] == $data->user_id()) { ?>
                            <p cl>Tu as retweeté</p>
                        <?php } else { ?>
                            <p><?= $user->nicknameFromId($data->user_id())[0]->nickname() ?> a retweeté</p>
                        <?php } ?>
                        <div class="flex p-4">
                            <img src="https://via.placeholder.com/150" alt="avatar" class="w-12 h-12 rounded-full">
                            <p class="font-bold mt-3 ml-2">
                                <?= $user->nicknameFromId($tweet->idUserFromOrigin($data->origin())[0]->user_id())[0]->nickname() ?>
                            </p>
                        </div>
                        <div class="tweet-main">
                            <p class="ml-20">
                                <?= $tweet->spanMessage($tweet->getAllTweetsDataById($data->origin(), 'Tweet')[0]->message()) ?>
                                <img src="https://via.placeholder.com/150 " alt="tweet content" class="h-[504px] w-[504px] rounded-xl mt-2">
                            </p>
                        </div>
                        <div class="m-4 border flex gap-8">
                            <div class="flex cursor-pointer hover:text-blue-400 relative">
                                <div class="retweet">
                                    <button value="<?= $data->origin() ?>" name="retweetButton" class=" flex retweetButton">
                                        <i class="fa-solid fa-retweet mt-1"></i>
                                        <p class="ml-1"><?= $tweet->retweetsNumber($data->origin()) ?></p>
                                    </button>
                                    <div class="retweetOverlay hidden absolute bg-gray-200 rounded-xl z-10">
                                        <div class="flex cursor-pointer hover:bg-gray-100">
                                            <button value="<?= $data->origin() ?>" name="retweetButton" type="button" class="retweetButton">
                                                <i class="fa-solid fa-pen"></i>
                                                Retweeter
                                            </button>
                                        </div>
                                        <div class="flex cursor-pointer hover:bg-gray-100">
                                            <button value="<?= $data->origin() ?>" name="quoteTweetButton" type="button" class="quoteTweetButton">
                                                <i class="fa-solid fa-pen"></i>
                                                Citer le Tweet
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex cursor-pointer hover:text-green-400">
                                <button value="<?= $data->origin() ?>" name="commentButton" type="button" class="commentButton">
                                    <i class="fa-regular fa-comment mt-1"></i>
                                </button>
                                <p class="ml-1"><?= $tweet->commentsNumber($data->origin()) ?></p>
                            </div>
                            <div class="<?= $tweet->isLiked($data->origin()) ? "flex cursor-pointer hover:text-pink-500 text-pink-400" : "flex cursor-pointer hover:text-pink-400" ?>">
                                <button value=<?= implode("-", ["tweet_id" => $data->origin(), "user_id" => $data->user_id()]) ?> name="likeButton" type="button" class="likeButton">
                                    <i class="<?= $tweet->isLiked($data->origin()) ? "fa-heart mt-1 fa-solid" : "fa-heart mt-1 fa-regular" ?>"></i>
                                </button>
                                <p class="ml-1"><?= $tweet->likesNumber($data->origin()) ?></p>
                            </div>
                            <form action="tweet" method="post" class="tweetMainForm">
                                <button class="seeComments" style="cursor: pointer;" value="<?= $data->id() ?>" name="seeComments" type="submit">Voir plus</button>
                            </form>
                        </div>
                </div>
            <?php } else { ?>
                <div class="flex p-4">
                    <img src="https://via.placeholder.com/150" alt="avatar" class="w-12 h-12 rounded-full">
                    <p class="font-bold mt-3 ml-2">
                        <?= $user->nicknameFromId($data->user_id())[0]->nickname(); ?>
                    </p>
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
                                    <button class="seeComments" style="cursor: pointer;" value="<?= $data->origin() ?>" name="seeComments" type="submit">Voir ce tweet</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
                <div class="m-4 border flex gap-8">
                    <div class="flex cursor-pointer hover:text-blue-400 relative">
                        <div class="retweet">
                            <button value="<?= $data->id() ?>" name="retweetButton" class=" flex retweetButton">
                                <i class="fa-solid fa-retweet mt-1"></i>
                                <p class="ml-1"><?= $tweet->retweetsNumber($data->id()) ?></p>
                            </button>
                            <div class="retweetOverlay hidden absolute bg-gray-200 rounded-xl z-10">
                                <div class="flex cursor-pointer hover:bg-gray-100">
                                    <button value="<?= $data->id() ?>" name="retweetButton" type="button" class="retweetButton">
                                        <i class="fa-solid fa-pen"></i>
                                        Retweeter
                                    </button>
                                </div>
                                <div class="flex cursor-pointer hover:bg-gray-100">
                                    <button value="<?= $data->id() ?>" name="quoteTweetButton" type="button" class="quoteTweetButton">
                                        <i class="fa-solid fa-pen"></i>
                                        Citer le Tweet
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex cursor-pointer hover:text-green-400">
                        <button value="<?= $data->id() ?>" name="commentButton" type="button" class="commentButton">
                            <i class="fa-regular fa-comment mt-1"></i>
                        </button>
                        <p class="ml-1"><?= $tweet->commentsNumber($data->id()) ?></p>
                    </div>
                    <div class="<?= $tweet->isLiked($data->id()) ? "flex cursor-pointer hover:text-pink-500 text-pink-400" : "flex cursor-pointer hover:text-pink-400" ?>">
                        <button value=<?= implode("-", ["tweet_id" => $data->id(), "user_id" => $data->user_id()]) ?> name="likeButton" type="button" class="likeButton">
                            <i class="<?= $tweet->isLiked($data->id()) ? "fa-heart mt-1 fa-solid" : "fa-heart mt-1 fa-regular" ?>"></i>
                        </button>
                        <p class="ml-1"><?= $tweet->likesNumber($data->id()) ?></p>
                    </div>
                    <form action="tweet" method="post" class="tweetMainForm">
                        <button class="seeComments" style="cursor: pointer;" value="<?= $data->id() ?>" name="seeComments" type="submit">Voir plus</button>
                    </form>
                </div>
            </div>
            <?php } ?>
        <?php endforeach ?>
    <?php endif ?>
<?php endif ?>
</div>