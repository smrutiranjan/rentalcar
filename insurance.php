<?php
require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php' );
echo stripslashes_deep(get_option("car_insurance",true));
?>