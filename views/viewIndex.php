<?php 

$this->_t = 'Tweet Academy | Index'; // Normal que le $this soit souligné au jaune, NO PANIC.

$user = new UserManager;
$tweet = new TweetManager;

?>

<div class="feed">
    <div class="w-full">
        <form id="newTweet">
            <div class="flex">
                <img src="https://via.placeholder.com/150" alt="avatar" class="w-12 h-12 rounded-full">
                <textarea name="newTweet" placeholder="Quoi de neuf ?" cols="30" rows="10" class="border bg-blue-100 resize-none w-full h-20"></textarea> <br>
            </div>
            <button class="ConfirmNewTweet" style="cursor: pointer;" name="sendNewTweet" type="button">Submit</button>
        </form>
    </div>

    <?php if ($tweets): ?>
    <?php foreach ($tweets as $data): ?>
        <div class="w-full border hover:bg-gray-100">
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
                <?php if ($data->origin()) :?>
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
                                    <?= $tweet->getAllById($data->origin(), 'Tweet')[0]->message() ?>
                                </p>
                                <img src="https://via.placeholder.com/150 " alt="tweet content" class="h-[504px] w-[504px] rounded-b-xl">
                            </div>
                        </div>
                    </div>
                <?php endif ?>
                <div class="m-4 border">
                    <form id="tweetMainForm" class="flex gap-8 ">
                        <div class="flex cursor-pointer hover:text-blue-400 relative">
                            <button value="<?= $data->id() ?>" name="retweetButton" class="retweetButton" >
                                <i class="fa-solid fa-retweet mt-1"></i>
                            </button>
                            <p class="ml-1">12</p>
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
                    </form>
                </div>
                <div class="hidden relative bg-gray-200 rounded-xl" id="retweetOverlay">
                    <div class="flex border">
                        <i class="fa-solid fa-retweet"></i>
                        <p>Retweeter</p>
                    </div>
                    <div class="flex">
                        <i class="fa-solid fa-pen"></i>
                        <p>Citer le tweet</p>
                    </div>
                </div>
            </div>
    <?php endforeach ?>
    <?php endif ?>
</div>