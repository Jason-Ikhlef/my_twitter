<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/style.css">
    <script src="./javascript/script.js" defer></script>
    <script src="./AJAX/javascript/do.newTweet.js" defer></script>
    <title><?= $t ?></title>
</head>
<body>
    <h1>COTÉ GAUCHE</h1>
    <?= $content ?> <!-- CURRENT VIEW HERE -->
    <h1>COTÉ DROIT</h1>
</body>
</html>