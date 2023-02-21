<?php 

$this->_t = 'Tweet Academy | Index'; // Normal que le $this soit souligné au jaune, NO PANIC.

?>
<div class="feed">
    <h2>Tweeter</h2>
    <form id="newTweet">
        <textarea name="newTweet" id="newTweet" cols="30" rows="10"></textarea> <br>
        <button class="ConfirmNewTweet" style="cursor: pointer;" name="sendNewTweet" type="button">Submit</button>
    </form>

    <?php foreach ($tweets as $tweet): ?>
        <div class="tweet"><?= $tweet->message() ?></div>
    <?php endforeach ?>
</div>