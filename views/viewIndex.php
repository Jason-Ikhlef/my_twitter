<?php

$this->_t = 'Tweet Academy | Index'; // Normal que le $this soit souligné au jaune, NO PANIC.

$user = new UserManager;
$tweet = new TweetManager;

?>

<div class="feed border">
    <div class="w-full border-t">
        <form id="newTweet">
            <div class="flex mt-4">
                <a href="profil"><img src="https://via.placeholder.com/150" alt="avatar" class="w-12 h-12 rounded-full m-2"></a>
                <textarea name="newTweet" placeholder="Quoi de neuf ?" cols="30" rows="10" class="resize-none w-full h-10 mt-5 mr-2 focus:outline-none"></textarea>
            </div>
            <div class="flex justify-between my-auto">
                <div class="flex ml-12 mt-2 mb-4">
                    <i class="fa-sharp fa-regular fa-image text-blue-500 hover:bg-blue-100 rounded-full p-4"></i>
                </div>
                <button class="ConfirmNewTweet cursor-pointer bg-blue-500 text-white px-4 rounded-3xl my-4 mr-4 hover:bg-blue-200" name="sendNewTweet" type="button">Tweeter</button>
            </div>
        </form>
    </div>

    <?php if ($tweets) : ?>
        <?php foreach ($tweets as $data) : ?>
            <div class="w-full hover:bg-gray-100 border-y">
                <div class="flex p-4">
                    <img src="https://via.placeholder.com/150" alt="avatar" class="w-12 h-12 rounded-full">
                    <p class="font-bold mt-3 ml-2">
                        <?= $user->nicknameFromId($data->user_id())[0]->nickname() ?>
                    </p>
                </div>
                <div class="tweet-main">
                    <p class="ml-20">
                        <?= $data->message() ?>
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
                                    <?= $tweet->getAllTweetsDataById($data->origin(), 'Tweet')[0]->message() ?>
                                </p>
                                <img src="https://via.placeholder.com/150 " alt="tweet content" class="h-[504px] w-[504px] rounded-b-xl">
                            </div>
                        </div>
                    </div>
                <?php endif ?>
                <div class="m-4 border flex gap-8">
                    <div class="flex cursor-pointer hover:text-blue-400 relative">
                            <button value="<?= $data->id() ?>" name="retweetButton" class=" flex retweetButton" >
                                <i class="fa-solid fa-retweet mt-1"></i>
                                <p class="ml-1">12</p>
                            </button>
                        </div>
                        <div class="flex cursor-pointer hover:text-green-400">
                            <button value="<?= $data->id() ?>" name="commentButton" type="button" class="commentButton">
                                <i class="fa-regular fa-comment mt-1"></i>
                            </button>
                            <p class="ml-1">12</p>
                        </div>
                        <div class="flex cursor-pointer hover:text-pink-400">
                            <button value="<?= $data->id() ?>" name="quoteTweetButton" type="button" class="quoteTweetButton">
                                <i class="fa-solid fa-heart mt-1"></i>
                            </button>
                            <p class="ml-1">12</p>
                        </div>
                        <form action="tweet" method="post" id="tweetMainForm">
                            <button class="seeComments" style="cursor: pointer;" value="<?= $data->id() ?>" name="seeComments" type="submit">Voir plus</button>
                        </form>
                </div>
                <div class="hidden absolute bg-gray-200 rounded-xl z-10" id="retweetOverlay">
                    <div class="flex border cursor-pointer hover:bg-gray-100">
                        <i class="fa-solid fa-retweet"></i>
                        <p>Retweeter</p>
                    </div>
                    <div class="flex cursor-pointer hover:bg-gray-100">
                        <i class="fa-solid fa-pen"></i>
                        <p>Citer le tweet</p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
</div>

<!--  -->