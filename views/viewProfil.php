<?php

$user = new UserManager;
$this->_t = 'Tweet Academy | Profil';

(!isset($_SESSION["profil_id"])) ? ($_SESSION["profil_id"] = $_SESSION["user_id"]) : null;

$data = $user->getUserById($_SESSION["profil_id"]);
$followInfos = $user->getFollowInfo($_SESSION["user_id"], $_SESSION["profil_id"], $data[0]->follows());
$followers = $user->getFollowers($_SESSION["profil_id"]);

$currendID = $_SESSION["profil_id"];

?>

<div class="w-full flex flex-col top-0">
    <div class="profileTop flex w-1/3 max-sm:w-auto">
        <a href="index"><i class="fa-solid fa-arrow-left mx-4 self-center"></i></a>
        <div>
            <p><?= $data[0]->nickname() ?></p>
            <p class="text-xs italic">Nb d'abonnés</p>
        </div>
    </div>
    <div class="profile w-full">
        <div class="banner">
            <img class="w-full h-48" src="<?= "../../img/" . $data[0]->banner() ?>">
        </div>
        <div class="profilePicture">
            <img class="mt-[-70px] outline outline-4 outline-white ml-6 rounded-full w-40 h-full max-sm:w-24 max-sm:mt-[-50px] max-sm:ml-3" src="<?= "../../img/" . $data[0]->picture() ?>">
        </div>
        <div class="flex justify-end">
        <?php if (!isset($currendID) || $_SESSION["user_id"] == $currendID) { ?>
            <button class="editButton bg-white border-2 border-gray-200 rounded-full w-40 h-8 mt-[-50px] max-sm:mt-[-30px] max-sm:w-32 max-sm:mr-2">Editer le profil</button>
        <?php } else { ?>
            <?php if(!$followInfos[0]) {?>
            <form id="followForm">
                <button class="followButton bg-black text-white border-2 border-gray-200 rounded-full w-40 h-8 mt-[-50px] max-sm:mt-[-30px] max-sm:w-32 max-sm:mr-2" id="<?= $currendID ?>">Suivre</button>
            </form>
            <?php } else { ?>
            <form id="unfollowForm">
                <button class="followButton bg-black text-white border-2 border-gray-200 rounded-full w-40 h-8 mt-[-50px] max-sm:mt-[-30px] max-sm:w-32 max-sm:mr-2" id="<?= $currendID ?>">Ne plus suivre</button>
            </form>
            <?php } ?>
        <?php } ?>
        </div>
        <div class="userInfo ml-8 mt-4">
            <p class="font-bold"><?= $data[0]->nickname() ?></p>
            <p>@<?= $data[0]->nickname() ?></p>
            <div class="joinDate flex mt-4">
                <i class="fa-solid fa-calendar-days"></i>
                <?php
                $monthArray = ["01" => "janvier", "02" => "fevrier", "03" => "mars", "04" => "avril", "05" => "mai", "06" => "juin", "07" => "juillet", "08" => "aout", "09" => "septembre", "10" => "octobre", "11" => "novembre", "12" => "decembre"];
                $joinMonth = date_format(date_create($data[0]->date()), "m");
                $displayMonth = $monthArray[$joinMonth];
                $joinYear = date_format(date_create($data[0]->date()), "Y");
                $joinDate = $displayMonth . " " . $joinYear;
                ?>
                <p class="ml-2 leading-5">A rejoint Twitter en <?= $joinDate ?></p>
            </div>
            <div class="followers flex mt-4 max-sm:flex-col">
                <p class="follows mr-4"><span><?= $followInfos[1] ?></span> abonnement(s) </p>
                <p class="followed ml-4 max-sm:ml-0"> <span><?= $followers ?></span> abonné(s) </p>
            </div>
        </div>
    </div>
</div>
<div id="editOverlay" class="hidden fixed w-full h-auto p-10 bg-gray-500/50 inset-0 z-1">
    <div class="popup bg-white flex flex-col justify-center items-center m-auto max-w-md h-auto rounded-lg text-black p-1">
        <button class="editClose self-start ml-3 mt-1 cursor-pointer hover:bg-gray-100 px-4 py-2 rounded-full">&times;</button>
        <form class="editForm flex flex-col justify-center items-center w-full mb-8" id="editForm" autocomplete="off">
            <i class="fa-brands fa-twitter fa-2xl self-center mb-7 mt-2 text-blue-500"></i>
            <div class="banner w-full flex flex-col relative">
                <img class="w-full h-40" src="<?= "../../img/" . $data[0]->banner() ?>">
                <div class="absolute flex justify-center items-center inset-0 w-full h-full rounded-full opacity-0 ease duration-300 bg-gray-200 hover:opacity-50">
                    <input title="" class="absolute w-full h-full bg-inherit file:bg-inherit text-transparent file:text-transparent file:border-0 file:text-inherit" accept="image/png,image/jpeg,image/webp,image/jpg" type="file" id="banner" name="banner">
                    <i class="fa-regular fa-pen-to-square absolute text-4xl text-center"></i>
                </div>
            </div>
            <div class="profilePicture w-32 self-start flex flex-col relative left-0 outline outline-4 outline-white ml-3 rounded-full mt-[-70px] mb-4">
                <img class="outline outline-4 outline-white rounded-full w-32 h-full" src="<?= "../../img/" . $data[0]->picture() ?>">
                <div class="absolute flex justify-center items-center inset-0 w-full h-full rounded-full opacity-0 ease duration-300 bg-gray-200 hover:opacity-50">
                    <input title="" class="absolute w-full h-full rounded-full bg-inherit file:bg-inherit text-transparent file:text-transparent file:border-0 file:text-inherit" accept="image/png,image/jpeg,image/webp,image/jpg" type="file" id="avatar" name="avatar">
                    <i class="fa-regular fa-pen-to-square absolute text-4xl text-center"></i>
                </div>
            </div>
            <div class="username mb-1 w-2/3">
                <label for="nickname" class="font-semibold">*Username:</label>
            </div>
            <div class="username mb-3 w-2/3">
                <input type="text" id="nickname" name="nickname" placeholder="Username" value=<?= $data[0]->nickname() ?> class="w-full p-2 bg-gray-200 placeholder:text-blue-500 text-blue-500 border-2 border-blue-500 rounded-md font-semibold"></input>
            </div>
            <div class="editEmail mb-1 w-2/3">
                <label for="email" class="font-semibold">*Email:</label>
            </div>
            <div class="editEmail mb-3 w-2/3">
                <input type="email" id="email" name="email" placeholder="example@test.com" value=<?= $data[0]->email() ?> class="w-full p-2 bg-gray-200 placeholder:text-blue-500 text-blue-500 border-2 border-blue-500 rounded-md font-semibold"></input>
            </div>
            <div class="editPassword mb-1 w-2/3">
                <label for="password" class="font-semibold">*Password:</label>
            </div>
            <div class="editPassword mb-3 w-2/3">
                <input type="password" id="password" name="password" placeholder="******" class="w-full p-2 bg-gray-200 placeholder:text-blue-500 text-blue-500 border-2 border-blue-500 rounded-md font-semibold"></input>
            </div>
            <div class="editConfirmPw mb-1 w-2/3">
                <label for="newPassword" class="font-semibold">*Confirm Password:</label>
            </div>
            <div class="editConfirmPw mb-3 w-2/3">
                <input type="password" id="newPassword" name="newPassword" placeholder="******" class="w-full p-2 bg-gray-200 placeholder:text-blue-500 text-blue-500 border-2 border-blue-500 rounded-md font-semibold"></input>
            </div>
            <button class="bg-blue-500 w-2/3 h-8 rounded-lg text-white my-3 font-semibold" id="editBtn">Enregistrer</button>
        </form>
    </div>
</div>