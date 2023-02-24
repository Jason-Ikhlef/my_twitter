<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/176eaa1f6f.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="w-full flex flex-col items-center top-0">
        <div class="profileTop flex w-1/3 border-b-4">
            <i class="fa-solid fa-arrow-left mx-4 self-center"></i>
            <div>
                <p>Pseudo</p>
                <p class="text-xs italic">Nb d'abonnés</p>
            </div>
        </div>
        <div class="profile w-1/3">
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
</body>