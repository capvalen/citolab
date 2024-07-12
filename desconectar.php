<?php
setcookie('ckNombre', "", time() - 3600, "/");
setcookie('ckPoder', "", time() - 3600, "/");

header("Location: index.html");
?>
