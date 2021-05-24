<?php

$user = posix_getpwuid(posix_geteuid());

var_dump($user);

