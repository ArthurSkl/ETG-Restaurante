<?php

session_start();

// unset na session 
unset($_SESSION['id_user']);

header("Location: ../"); 