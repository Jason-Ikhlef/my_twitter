<?php 

$this->_t = 'Tweet Academy | Index'; // Normal que le $this soit souligné au jaune, NO PANIC.

$user = new UserManager;

?>

<div class="feed">
    <h2>Tweeter</h2>
    <form id="newTweet">
        <textarea name="newTweet" id="newTweet" cols="30" rows="10"></textarea> <br>
        <button class="ConfirmNewTweet" style="cursor: pointer;" name="sendNewTweet" type="button">Submit</button>
    </form>

    <?php if ($tweets): ?>
    <?php foreach ($tweets as $tweet): ?>
        <form method="get">
            <div class="tweet">
                <div class="tweet-header">
                    <?= $user->nicknameFromId($tweet->user_id())[0]->nickname() ?>
                </div>
                <div class="tweet-main">
                    <?= $tweet->message() ?>
                </div>
                <div style="margin-top: 10px;" class="tweet-footer">
                    <button style="cursor: pointer;" value="<?= $tweet->id() ?>" name="retweetButton" type="submit">Retweet</button>
                    <button style="cursor: pointer;" value="<?= $tweet->id() ?>" name="commentButton" type="submit">Commenter</button>
                </div>
            </div>
        </form>
    <?php endforeach ?>
    <?php endif ?>
</div>