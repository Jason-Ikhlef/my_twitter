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
            <button class="bg-white border-2 border-gray-200 rounded-xl w-40 h-8 mt-[-50px] max-sm:mt-[-30px] max-sm:w-32 max-sm:mr-2">Editer le profil</button>
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