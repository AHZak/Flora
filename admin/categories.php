<?php

include_once '../config.php';

Category::create(['name'=>'کاکتوس','creator_id'=>1],$message);
$message->showMessages();
SubCategory::create(['name'=>'خیار'],$message);
$message->showMessages();