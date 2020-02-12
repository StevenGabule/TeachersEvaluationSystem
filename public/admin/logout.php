<?php
include '../../include/init.php';
$session->logout();
redirect_to('../login.php');
