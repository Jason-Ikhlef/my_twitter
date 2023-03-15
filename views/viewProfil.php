<br>

<?php

if ($_SESSION["user_data"]): ?>

<?php foreach ($_SESSION["user_data"] as $value):
    if ($value == ""){
        $value = "NULL";
    }
    echo $value ?> <br> 
    
    
<?php
endforeach;
endif

?>
    <div class="w-full flex flex-col items-center top-0">
        <div class="profileTop flex w-1/3 border-b-4">
            <i class="fa-solid fa-arrow-left mx-4 self-center"></i>
            <div>
                <p>Pseudo</p>
                <p class="text-xs italic">Nb d'abonnés</p>
            </div>
        </div>
        <div class="profile w-full">
            <div class="banner">
                <img class="w-full h-48" src="https://img.redbull.com/images/c_limit,w_1500,h_1000,f_auto,q_auto/redbullcom/2021/7/7/bkivw5ycyl9xmcsuysn4/the-binding-of-isaac-jeu-succes">
            </div>
            <div class="profilePicture">
                <img class="mt-[-60] outline outline-4 outline-white ml-6 rounded-full w-1/5 h-auto" src="https://images.squarespace-cdn.com/content/v1/606d159a953867291018f801/1619987722169-VV6ZASHHZNRBJW9X0PLK/Key_Art_02_layeredjpg.jpg?format=1500w">
            </div>
            <div class="editButton flex justify-end bg-blue-500">
                <button class="bg-white border-2 border-gray-200 rounded-xl w-1/4 h-8 mt-[-50]">Editer le profil</button>
            </div>
            <div class="profilePseudo">
                <p>Pseudo</p>
                <p>Identifiant</p>
            </div>
        </div>
        <form method="post">
            <button name="logout">Logout</button>
        </form>
    </div>
=======
<div class="w-full flex flex-col top-0">
    <div class="profileTop flex w-1/3 border-b-4 max-sm:w-auto">
        <a href="index"><i class="fa-solid fa-arrow-left mx-4 self-center"></i></a>
        <div>
            <p><?= $_SESSION["user_data"]["nickname"] ?></p>
            <p class="text-xs italic">Nb d'abonnés</p>
        </div>
    </div>
    <div class="profile w-full">
        <div class="banner">
            <img class="w-full h-48" src="https://img.redbull.com/images/c_limit,w_1500,h_1000,f_auto,q_auto/redbullcom/2021/7/7/bkivw5ycyl9xmcsuysn4/the-binding-of-isaac-jeu-succes">
        </div>
        <div class="profilePicture">
            <img class="mt-[-70px] outline outline-4 outline-white ml-6 rounded-full w-40 h-full max-sm:w-24 max-sm:mt-[-50px] max-sm:ml-3" src="https://images.squarespace-cdn.com/content/v1/606d159a953867291018f801/1619987722169-VV6ZASHHZNRBJW9X0PLK/Key_Art_02_layeredjpg.jpg?format=1500w">
        </div>
        <div class="editButton flex justify-end">
            <button class="editButton bg-white border-2 border-gray-200 rounded-full w-40 h-8 mt-[-50px] max-sm:mt-[-30px] max-sm:w-32 max-sm:mr-2">Editer le profil</button>
            <!-- Bouton follow -->
            <!-- <button class="editButton bg-black text-white border-2 border-gray-200 rounded-full w-40 h-8 mt-[-50px] max-sm:mt-[-30px] max-sm:w-32 max-sm:mr-2">Suivre</button> -->
        </div>
        <div class="userInfo ml-8 mt-4">
            <p class="font-bold"><?= $_SESSION["user_data"]["nickname"] ?></p>
            <p>@<?= $_SESSION["user_data"]["nickname"] ?></p>
            <div class="joinDate flex mt-4">
                <i class="fa-solid fa-calendar-days"></i>
                <?php
                $monthArray = ["01" => "janvier", "02" => "fevrier", "03" => "mars", "04" => "avril", "05" => "mai", "06" => "juin", "07" => "juillet", "08" => "aout", "09" => "septembre", "10" => "octobre", "11" => "novembre", "12" => "decembre"];
                $joinMonth = date_format(date_create($_SESSION["user_data"]["date"]), "m");
                $displayMonth = $monthArray[$joinMonth];
                $joinYear = date_format(date_create($_SESSION["user_data"]["date"]), "Y");
                $joinDate = $displayMonth . " " . $joinYear;
                ?>
                <p class="ml-2 leading-5">A rejoint Twitter en <?= $joinDate ?></p>
            </div>
            <div class="followers flex mt-4 max-sm:flex-col">
                <p class="mr-4"><?= $_SESSION["user_data"]["follows"] ?>Nb abonnement</p>
                <p class="ml-4 max-sm:ml-0">Nb followers</p>
            </div>
        </div>
    </div>
</div>
<div id="editOverlay" class="hidden fixed w-full h-auto p-10 bg-gray-500/50 inset-0 z-1">
    <div class="popup bg-white flex flex-col justify-center items-center m-auto max-w-md h-auto rounded-lg text-black p-1">
        <button class="editClose self-start ml-3 mt-1 cursor-pointer hover:bg-gray-100 px-4 py-2 rounded-full">&times;</button>
        <form class="editForm flex flex-col justify-center items-center w-full mb-8" id="edit-form" autocomplete="off">
            <i class="fa-brands fa-twitter fa-2xl self-center mb-7 mt-2 text-blue-500"></i>
            <div class="banner w-full flex flex-col relative">
                <img class="w-full h-40" src="https://img.redbull.com/images/c_limit,w_1500,h_1000,f_auto,q_auto/redbullcom/2021/7/7/bkivw5ycyl9xmcsuysn4/the-binding-of-isaac-jeu-succes">
                <div class="absolute flex justify-center items-center inset-0 w-full h-full rounded-full opacity-0 ease duration-300 bg-gray-200 hover:opacity-50">
                    <input title="" class="absolute w-full h-full bg-inherit file:bg-inherit text-transparent file:text-transparent file:border-0 file:text-inherit" accept="image/png,image/jpeg,image/webp,image/jpg" type="file" id="profilPicture" name="profilPicture">
                    <i class="fa-regular fa-pen-to-square absolute text-4xl text-center"></i>
                </div>
            </div>
            <div class="profilePicture w-32 self-start flex flex-col relative left-0 outline outline-4 outline-white ml-3 rounded-full mt-[-70px] mb-4">
                <img class="outline outline-4 outline-white rounded-full w-32 h-full" src="https://images.squarespace-cdn.com/content/v1/606d159a953867291018f801/1619987722169-VV6ZASHHZNRBJW9X0PLK/Key_Art_02_layeredjpg.jpg?format=1500w">
                <div class="absolute flex justify-center items-center inset-0 w-full h-full rounded-full opacity-0 ease duration-300 bg-gray-200 hover:opacity-50">
                    <input title="" class="absolute w-full h-full rounded-full bg-inherit file:bg-inherit text-transparent file:text-transparent file:border-0 file:text-inherit" accept="image/png,image/jpeg,image/webp,image/jpg" type="file" id="profilPicture" name="profilPicture">
                    <i class="fa-regular fa-pen-to-square absolute text-4xl text-center"></i>
                </div>
            </div>
            <div class="username mb-1 w-2/3">
                <label for="nickname" class="font-semibold">*Username:</label>
            </div>
            <div class="username mb-3 w-2/3">
                <input type="text" id="editUsername" name="nickname" placeholder="Username" value=<?= $_SESSION["user_data"]["nickname"] ?> class="w-full p-2 bg-gray-200 placeholder:text-blue-500 text-blue-500 border-2 border-blue-500 rounded-md font-semibold"></input>
            </div>
            <div class="editEmail mb-1 w-2/3">
                <label for="email" class="font-semibold">*Email:</label>
            </div>
            <div class="editEmail mb-3 w-2/3">
                <input type="email" id="editEmail" name="email" placeholder="example@test.com" value=<?= $_SESSION["user_data"]["email"] ?> class="w-full p-2 bg-gray-200 placeholder:text-blue-500 text-blue-500 border-2 border-blue-500 rounded-md font-semibold"></input>
            </div>
            <div class="editPassword mb-1 w-2/3">
                <label for="editPassword" class="font-semibold">*Password:</label>
            </div>
            <div class="editPassword mb-3 w-2/3">
                <input type="password" id="editPassword" name="editPassword" placeholder="******" class="w-full p-2 bg-gray-200 placeholder:text-blue-500 text-blue-500 border-2 border-blue-500 rounded-md font-semibold"></input>
            </div>
            <div class="editConfirmPw mb-1 w-2/3">
                <label for="editConfirmPassword" class="font-semibold">*Confirm Password:</label>
            </div>
            <div class="editConfirmPw mb-3 w-2/3">
                <input type="password" id="editConfirmPw" name="editConfirmPassword" placeholder="******" class="w-full p-2 bg-gray-200 placeholder:text-blue-500 text-blue-500 border-2 border-blue-500 rounded-md font-semibold"></input>
            </div>
            <button class="bg-blue-500 w-2/3 h-8 rounded-lg text-white my-3 font-semibold" id="register-btn">Enregistrer</button>
        </form>
    </div>
</div>
