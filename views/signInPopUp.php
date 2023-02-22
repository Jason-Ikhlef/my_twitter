<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/89d1d88b5e.js" crossorigin="anonymous"></script>
    <script src="../../javascript/script.js" defer></script>
    <title><?= $t ?></title>
</head>

<body>
    <button class="signInButton">Inscription</button>
    <div id="signInOverlay" class="hidden fixed w-full h-auto p-10 bg-gray-500/50 inset-0 z-1">
        <div class="popup bg-white flex flex-col justify-center items-center w-auto m-auto max-w-md h-auto rounded-lg text-black p-1">
            <form class="logInForm flex flex-col justify-center items-center w-full mb-8" method="POST" autocomplete="off">
                <button class="signInClose self-start ml-3 mt-1" href="#">&times;</button>
                <i class="fa-brands fa-twitter fa-2xl self-center mb-17 mt-2 text-blue-500"></i>
                <div class="logInText my-8 w-2/3">
                    <p class="text-2xl font-semibold">Rejoignez Twitter</p>
                </div>
                <div class="username mb-1 w-2/3">
                    <label for="username" class="font-semibold">*Username:</label>
                </div>
                <div class="username mb-3 w-2/3">
                    <input type="text" id="username" name="username" placeholder="Username" class="w-full p-2 bg-gray-200 placeholder:text-blue-500 text-blue-500 border-2 border-blue-500 rounded-md font-semibold" required></input>
                </div>
                <div class="signInEmail mb-1 w-2/3">
                    <label for="signInEmail" class="font-semibold">*Email:</label>
                </div>
                <div class="signInEmail mb-3 w-2/3">
                    <input type="email" id="signInEmail" name="signInEmail" placeholder="example@test.com" class="w-full p-2 bg-gray-200 placeholder:text-blue-500 text-blue-500 border-2 border-blue-500 rounded-md font-semibold" required></input>
                </div>
                <div class="signInPassword mb-1 w-2/3">
                    <label for="signInPassword" class="font-semibold">*Password:</label>
                </div>
                <div class="signInPassword mb-3 w-2/3">
                    <input type="password" id="signInPassword" name="signInPassword" placeholder="******" class="w-full p-2 bg-gray-200 placeholder:text-blue-500 text-blue-500 border-2 border-blue-500 rounded-md font-semibold" required></input>
                </div>
                <div class="signInConfirmPw mb-1 w-2/3">
                    <label for="signInConfirmPw" class="font-semibold">*Confirm Password:</label>
                </div>
                <div class="signInConfirmPw mb-3 w-2/3">
                    <input type="password" id="signInConfirmPw" name="signInConfirmPw" placeholder="******" class="w-full p-2 bg-gray-200 placeholder:text-blue-500 text-blue-500 border-2 border-blue-500 rounded-md font-semibold" required></input>
                </div>
                <button class="bg-blue-500 w-2/3 h-8 rounded-lg text-white my-3 font-semibold">Inscription</button>
            </form>
            <div class="signUp mb-5 w-2/3 flex flex-col justify-center items-center">
                <p>Vous avez déjà un compte ?</p>
                <a href="#" class="text-blue-500">Connectez-vous</a>
            </div>
        </div>
    </div>
</body>

</html>