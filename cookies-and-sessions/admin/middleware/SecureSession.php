<?php

@session_start();
if(!isset($_SESSION['validUser'])){
    header("Location:../");
}

