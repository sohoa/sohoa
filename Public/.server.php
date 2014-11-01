<?php
if (is_file($_SERVER["REQUEST_URI"])) {
    return false;
} else {
    require 'index.php';
}