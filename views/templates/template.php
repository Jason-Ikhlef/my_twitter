<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <script src="./javascript/script.js" defer></script>
    <title><?= $t ?></title>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="./AJAX/javascript/do.register.js" defer></script>
</head>
<body>
    <h1>COTÉ GAUCHE</h1>
    <form id="register-form">
        <input type="text" name="nickname" id="" placeholder="nickname">
        <input type="text" name="email" id="" placeholder="email">
        <input type="text" name="registerPassword" id="" placeholder="mdp">
        <input type="text" name="registerConfirmPassword" id="" placeholder="confirm">
        <input type="button" id="registerBtn" value="Confirm">
    </form>

    <div class="display-error"></div>
    <h1>COTÉ DROIT</h1>
</body>
</html>