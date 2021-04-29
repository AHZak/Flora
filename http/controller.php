<?php

include_once '../config.php';

$ac=new Account();
$ac->createInitialaizeAccount("09360795096");
$ac->getMessageHandler()->showMessages();