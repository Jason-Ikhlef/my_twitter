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
