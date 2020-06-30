<?php
session_start();
$_SESSION['student'];
session_destroy();
header("Location: ../");