<?php

ini_set("log_errors", 1);
ini_set("error_log", __DIR__ . "/error.log");

if (ob_get_level() == 0) ob_start();

echo "Script started on server 2 at ";
echo date('H:i:s') . "<br>";

$seconds = 1;

while(true) {

    sleep(1);
    echo "- {$seconds} seconds";
    echo str_pad('', 4096) . "\n<br>";

    ob_flush();
    flush();
    $seconds++;
}

echo "Done";

ob_end_flush();
