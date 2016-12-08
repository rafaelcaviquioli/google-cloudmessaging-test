<?php
require_once __DIR__ . '/vendor/autoload.php';

use Sly\NotificationPusher\PushManager,
    Sly\NotificationPusher\Adapter\Gcm as GcmAdapter,
    Sly\NotificationPusher\Collection\DeviceCollection,
    Sly\NotificationPusher\Model\Device,
    Sly\NotificationPusher\Model\Message,
    Sly\NotificationPusher\Model\Push;

try {

    $pushManager = new PushManager(PushManager::ENVIRONMENT_PROD);

    $gcmAdapter = new GcmAdapter(array(
        'apiKey' => 'AAAA1qXdaow:APA91bE8JFVJeraY3Pd70UZEB1qXhSH3cGtaNk6okhGm2OvjvGyA83pNI6yKfg9C0GlyECy-Q6b9CM5JNSguJhyk7BzAiHaU7x-iLCiyaSFqyDByxAu13kI9C696OvF6_-JMjgRb5UYGHRu1r-GWjngzxCeAE3cmcA',
    ));

    //obtem dispotivos cadastrados em um arquivo json
    $json = (array) json_decode(file_get_contents(__DIR__ . '/devices.json'));
    foreach ($json['devices'] as $item) {
        $arrayDevices[] = new Device($item);
    }

    $devices = new DeviceCollection($arrayDevices);

    $message = new Message('Teste de notificação', ['body' => 'Bla bla bla']);

    $push = new Push($gcmAdapter, $devices, $message);
    $pushManager->add($push);
    $pushManager->push();
} catch (Exception $ex) {
    echo $ex->getMessage();
}