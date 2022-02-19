<?php
session_start();
if(isset($_SESSION['validUser'])){
    session_destroy();
    header("Location:../");
}
