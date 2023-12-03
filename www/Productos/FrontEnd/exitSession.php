<?php

session_start();
$res = session_destroy();
header("Location: ../../");
