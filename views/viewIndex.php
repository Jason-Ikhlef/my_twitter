<?php 

$this->_t = 'Tweet Academy | Index'; // Normal que le $this soit souligné au jaune, NO PANIC.

$user = new UserManager;
$tweet = new TweetManager;

?>

<div class="feed">
    <h2>Tweeter</h2>
    <form id="newTweet">
        <textarea name="newTweet" cols="30" rows="10"></textarea> <br>
        <button class="ConfirmNewTweet" style="cursor: pointer;" name="sendNewTweet" type="button">Submit</button>
    </form>

    <?php if ($tweets): ?>
    <?php foreach ($tweets as $data): ?>
            <div class="tweet">
                <div class="tweet-header">
                    <?= $user->nicknameFromId($data->user_id())[0]->nickname() ?>
                </div>
                <div class="tweet-main">
                    <?= $data->message() ?>
                </div>
                <?php if ($data->origin()) :?>
                    <div class="tweet-quote">
                        <div class="nickname-quoteTweet">
                            <?= $user->nicknameFromId($tweet->idUserFromOrigin($data->origin())[0]->user_id())[0]->nickname() ?>
                        </div>
                        <div class="message-quoteTweet">
                            <?= $tweet->getAllById($data->origin(), 'Tweet')[0]->message() ?>
                        </div>
                    </div>
                <?php endif ?>
                <div style="margin-top: 10px;" class="tweet-footer">
                    <form id="tweetMainForm">
                        <button class="retweetButton" style="cursor: pointer;" value="<?= $data->id() ?>" name="retweetButton" >Retweet</button>
                        <button style="cursor: pointer;" value="<?= $data->id() ?>" name="commentButton" type="button">Commenter</button>
                        <button class="quoteTweetButton" style="cursor: pointer;" value="<?= $data->id() ?>" name="quoteTweetButton" type="button">Citer</button>
                    </form>
                </div>
            </div>
    <?php endforeach ?>
    <?php endif ?>
</div>