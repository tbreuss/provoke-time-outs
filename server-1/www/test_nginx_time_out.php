<?php

ini_set("log_errors", 1);
ini_set("error_log", __DIR__ . "/error.log");

$handle = fopen("http://web2/nginx_time_out.php", "r");
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        echo $buffer;
    }
    if (!feof($handle)) {
        echo "Fehler: unerwarteter fgets() Fehlschlag\n";
    }
    fclose($handle);
}
