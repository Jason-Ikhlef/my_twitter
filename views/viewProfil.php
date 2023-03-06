<br>

<?php

if ($_SESSION["user_data"]) : ?>

    <?php foreach ($_SESSION["user_data"] as $value) :
        if ($value == "") {
            $value = "NULL";
        }
        echo $value ?> <br>

<?php
    endforeach;
endif

?>

<br>

<form action="#" method="post" id="editForm">

    <label for="nickname">Pseudo : </label>
    <input type="text" name="nickname" id="nickname" value="<?= $_SESSION["user_data"][1]?>">

    <br>

    <label for="email">Email :</label>
    <input type="text" name="email" id="email" value="<?= $_SESSION["user_data"][2] ?>">

    <br>

    <label for="avatar">Profil picture</label>
    <input type="text" name="avatar" id="avatar" value="<?= $_SESSION["user_data"][4] ?>">

    <br>

    <label for="password">Mot de passe :</label>
    <input type="password" name="password" id="password">

    <br>

    <label for="newPassword">Confirmation du mot de passe ce label est super long :</label>
    <input type="password" name="newPassword" id="newPassword">

    <br>

    <button id="editBtn" type="submit">Modifier</button>
</form>