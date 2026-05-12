<?php

require "authenticator.php";

$auth = new Authenticator();

$auth->logout();

header("Location: login.php");
exit();