<?php
session_start();
$_SESSION['department'];
session_destroy();
header("Location: ../");