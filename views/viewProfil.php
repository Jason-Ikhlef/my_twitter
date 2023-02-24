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
<div class="w-full flex flex-col top-0">
    <div class="profileTop flex w-1/3 border-b-4">
        <a href="index"><i class="fa-solid fa-arrow-left mx-4 self-center"></i></a>
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
            <img class="mt-[-70px] outline outline-4 outline-white ml-6 rounded-full w-1/5 h-auto" src="https://images.squarespace-cdn.com/content/v1/606d159a953867291018f801/1619987722169-VV6ZASHHZNRBJW9X0PLK/Key_Art_02_layeredjpg.jpg?format=1500w">
        </div>
        <div class="editButton flex justify-end">
            <button class="bg-white border-2 border-gray-200 rounded-xl w-1/4 h-8 mt-[-50px]">Editer le profil</button>
        </div>
        <div class="userInfo ml-8 mt-4">
            <p class="font-bold">Pseudo</p>
            <p>Identifiant</p>
            <div class="joinDate flex mt-4">
                <i class="fa-solid fa-calendar-days"></i>
                <p class="ml-2 leading-5">A rejoint Twitter en</p>
            </div>
            <div class="followers flex mt-4">
                <p class="mr-4">Nb abonnements</p>
                <p class="ml-4">Nb d'abonnés</p>
            </div>
        </div>
    </div>
</div>