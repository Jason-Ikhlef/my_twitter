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
        <img src="https://via.placeholder.com/150" alt="avatar" class="w-12 h-12 rounded-full m-4">
        <div class="tweet-header flex flex-col gap-2">
            <p class='font-bold mt-4'><?= $user->nicknameFromId($tweet->aboveCommentsTweet()[0]->user_id())[0]->nickname() ?></p> 
            <p class='text-sm italic'>@<?= $user->nicknameFromId($tweet->aboveCommentsTweet()[0]->user_id())[0]->nickname() ?></p>
        </div>
    </div>
    <div class="tweet-main ml-2">
        <?= $tweet->aboveCommentsTweet()[0]->message()?>
    </div>
    <?php if ($tweet->aboveCommentsTweet()[0]->origin()) :?>
        <div class="tweet-quote">
            <div class="message-quoteTweet w-full mt-2 pl-4 pr-4">
                <?= $tweet->getAllTweetsDataById($tweet->aboveCommentsTweet()[0]->origin(), 'Tweet')[0]->message() ?>
            </div>
        </div>
    <?php endif ?>
    <div class="tweet-footer flex border gap-2 w-full text-center">
        <div class='nb-Retweet flex ml-2 gap-2 hover:underline cursor-pointer'>
            <p class='font-bold no-underline'>Nb de retweet(ce sera un nombre)</p>
            <p class='cursor-pointer hover:underline'>Retweets</p>
        </div>
        <div class='nb-Likes flex hover:underline cursor-pointer gap-2'>
            <p class='font-bold no-underline'>Nb de Likes (ce sera un nombre)</p>
            <p class='hover:underline cursor-pointer'>J'aime</p>
        </div>
    </div>
</div>
<br>

<?php if ($comments): ?>
    <?php foreach ($comments as $data): ?>
            <div class="tweet">
                <div class="tweet-header flex">
                    <img src="https://via.placeholder.com/150" alt="avatar" class="w-12 h-12 rounded-full m-4">
                    <div class='flex flex-col'>
                        <div class='tweet-user-name flex gap-2'>
                            <p class='font-bold mt-4'><?= $user->nicknameFromId($data->user_id())[0]->nickname() ?></p>
                            <p class='text-sm italic mt-[18px]'>@<?= $user->nicknameFromId($data->user_id())[0]->nickname() ?></p>
                        </div>
                        <p class='italic'>En réponse à <span class='text-blue-400'>@Nom du boug</span></p>
                        <div class="tweet-main border w-full">
                            <p>Message du boug</p>                
                            <?= $data->message() ?>
                        </div>
                    </div>
                </div>
                
                <div class="tweet-footer mt-4 flex gap-4">
                    <button class="retweetButton flex hover:text-blue-400" value="<?= $data->id() ?>" name="retweetButton" >
                        <i class="fa-solid fa-retweet mt-1"></i>
                        <p class="ml-1"><?= $tweet->retweetsNumber($data->id()) ?></p>
                    </button>                        
                    <button class="commentButton flex hover:text-green-400" value="<?= $data->id() ?>" name="commentButton" type="button">
                        <i class="fa-regular fa-comment mt-1"></i>
                        <p class="ml-1"><?= $tweet->commentsNumber($data->id()) ?></p>
                    </button>
                    <button class="quoteTweetButton flex" value="<?= $data->id() ?>" name="quoteTweetButton" type="button">Citer</button>
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
            <br>
    <?php endforeach ?>
<?php endif ?>