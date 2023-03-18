<?php 

$this->_t = 'Hashtags | Tweet academy'; // Normal que le $this soit souligné au jaune, NO PANIC.

$user = new UserManager;
$tweet = new TweetManager;

?>

<?php if ($tweets) : ?>
    <?php foreach ($tweets as $data) : ?>
        <?php if (str_contains($data->message(), "#" . explode("=", $_SERVER['REQUEST_URI'])[1])) :?>
            <!-- DESIGN OF THE VIEW HERE -->
        <?php endif ?>
    <?php endforeach ?>
<?php endif ?>