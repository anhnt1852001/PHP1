<?php

session_start();

//Hủy toàn bộ sesion
session_destroy();

//Hủy từng session 1
unset($_SESSION['username']);