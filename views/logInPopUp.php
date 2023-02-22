<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/89d1d88b5e.js" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery-3.6.3.min.js" defer></script>
    <script src="../javascript/script.js" defer></script>
    <title><?= $t ?></title>
    <style>
        #overlay {
            display: none;
        }
    </style>
</head>

<body>
    <i class="fa-brands fa-twitter fa-2xl fa-color" style="color:dodgerblue"></i>
    <button class="button">Connexion</button>
    <div id="overlay" class="fixed w-full h-auto p-10 bg-gray-500/50 inset-0 z-1">
        <div class="popup bg-white flex flex-col justify-center items-center w-auto m-auto max-w-md h-auto rounded-lg text-black p-1">
            <form class="logInForm flex flex-col justify-center items-center w-full mb-8" autocomplete="off">
                <button class="close self-start ml-3 mt-1" href="#">&times;</button>
                <i class="fa-brands fa-twitter fa-2xl self-center mb-17 mt-2" style="color:dodgerblue"></i>
                <div class="logInText my-8 w-2/3">
                    <p class="text-2xl font-semibold">Connectez-vous à Twitter</p>
                </div>
                <div class="email mb-1 w-2/3">
                    <label for="email" class="font-semibold">*Email:</label>
                </div>
                <div class="email mb-3 w-2/3">
                    <input type="email" id="email" name="email" placeholder="example@test.com" class="w-full p-2 bg-[#E7E7E7] placeholder:text-[#1e90ff] text-[#1e90ff] border-2 border-[#1e90ff] rounded-md font-semibold"></input>
                </div>
                <div class="password mb-1 w-2/3">
                    <label for="password" class="font-semibold">*Password:</label>
                </div>
                <div class="password mb-3 w-2/3">
                    <input type="password" id="password" name="password" placeholder="******" class="w-full p-2 bg-[#E7E7E7] placeholder:text-[#1e90ff] text-[#1e90ff] border-2 border-[#1e90ff] rounded-md font-semibold"></input>
                </div>
                <button class="bg-[#1e90ff] w-2/3 h-8 rounded-lg text-white my-3 font-semibold">Connexion</button>
            </form>
            <div class="signUp mb-5 w-2/3 flex flex-col justify-center items-center">
                <p>Vous n'avez pas de compte ?</p>
                <a href="#" class="text-[#1e90ff]">Inscrivez-vous</a>
            </div>
        </div>
    </div>
</body>

</html>