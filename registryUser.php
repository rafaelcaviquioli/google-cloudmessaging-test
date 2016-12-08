<?php
if(isset($_GET['token'])){
    $json = (array) json_decode(file_get_contents(__DIR__ . '/devices.json'));
    if(!in_array($_GET['token'], $json['devices'])) {
        $json['devices'][] = $_GET['token'];
    }

    file_put_contents(__DIR__ . '/devices.json', json_encode($json));
}