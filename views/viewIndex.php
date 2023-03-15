<?php 

$this->_t = 'Tweet Academy | Index'; // Normal que le $this soit souligné au jaune, NO PANIC.

$user = new UserManager;
$tweet = new TweetManager;

?>

<div class="feed border">

    <?php if (isset($_SESSION["user_id"]) && !isset($_POST["disconnect"])) : ?> 

    <div class="w-full border-t">
        <form id="newTweet">
            <div class="flex mt-4 select-none">
                <img src="https://via.placeholder.com/150" alt="avatar" class="w-12 h-12 rounded-full m-2">
                <textarea name="newTweet" placeholder="Quoi de neuf ?" cols="30" rows="10" class="postTweet resize-none w-full h-10 mt-5 mr-2 focus:outline-none" ></textarea>
            </div>
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

    <?php if ($tweets): ?>
    <?php foreach ($tweets as $data): ?>
        <div class="w-full hover:bg-gray-100 border-y pb-4 last:mb-14">
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

            <?php if (isset($_SESSION["user_id"]) && !isset($_POST["disconnect"])) : ?> 

            <div class="m-4 flex gap-8">
                <div class="flex cursor-pointer hover:text-blue-400 relative">
                    <div class="retweet">
                        <button value="<?= $data->id() ?>" name="retweetButton" class="flex retweetButton" >
                            <i class="fa-solid fa-retweet mt-1"></i>
                            <p class="ml-1">12</p>
                        </button>
                        <div class="retweetOverlay hidden absolute bg-gray-200 rounded-xl z-10 text-black w-[150px]">
                            <div class="flex border cursor-pointer hover:bg-gray-100 w-full p-2 rounded-t-xl">
                                <i class="fa-solid fa-retweet my-1 mx-2"></i>
                                <p>Retweeter</p>
                            </div>
                            <div class="flex cursor-pointer hover:bg-gray-100 w-full p-2 rounded-b-xl">
                                <i class="fa-solid fa-pen my-1 mx-2"></i>
                                <p>Citer le tweet</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex cursor-pointer hover:text-green-400 relative">
                    <div class="comment">
                        <button value="<?= $data->id() ?>" name="commentButton" type="button" class="flex commentButton">
                            <i class="fa-regular fa-comment mt-1"></i>
                            <p class="ml-1">12</p>
                        </button>
                        <div class="commentOverlay hidden absolute bg-white rounded-xl z-10 w-[600px] mx-auto text-black cursor-default">
                        <button class="commentClose text-xl ml-3 mt-1 cursor-pointer hover:bg-gray-100 px-4 py-2 rounded-full">&times;</button>
                            <div class='flex z-10'>
                                <img src="https://via.placeholder.com/150" alt="avatar" class="w-12 h-12 rounded-full m-2">
                                <div>
                                    <div class="flex mt-2">
                                        <p class="font-bold">De bg</p>
                                        <p class="italic">@deBg</p>
                                    </div>
                                    <p class="text-sm">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Provident earum eius aliquid culpa doloribus incidunt perferendis quae eos consectetur! Ipsam, sint? Perferendis, dicta in cumque quis recusandae dolores et dolor!</p>
                                    <p class="italic mt-2">En réponse à <span class="text-blue-400 cursor-pointer">@leBg</span></p>
                                </div>
                            </div>
                            <div class="flex mt-4">
                                <img src="https://via.placeholder.com/150" alt="avatar" class="w-12 h-12 rounded-full m-2">
                                <div>
                                    <div class="flex mt-2 mb-6">
                                        <input type="text" placeholder="Tweetez votre réponse." class="outline-none mt-2.5 postRetweet">
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-around">
                                <div>
                                    <i class="fa-sharp fa-regular fa-image text-blue-500 hover:bg-blue-100 rounded-full p-4 cursor-pointer"></i>
                                </div>
                                <button class="bg-blue-500 rounded-3xl text-white px-4 my-2">Répondre</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex cursor-pointer hover:text-pink-400">
                    <button value="<?= $data->id() ?>" name="quoteTweetButton" type="button" class="flex quoteTweetButton">
                        <i class="fa-solid fa-heart mt-1"></i>
                        <p class="ml-1">12</p>
                    </button>
                </div>
            </div>

            <?php endif ?>

        </div>
    <?php endforeach ?>
    <?php endif ?>
</div>

<!--  -->