<?php

session_start();

var_dump($_SESSION);

$_SESSION['id'] = 'test';

print session_name();

