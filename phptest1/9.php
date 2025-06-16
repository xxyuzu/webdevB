
<?php

require_once 'functions2.php';
if (function_exists('greet')) {
    greet('John');
} else {
    die('Error: greet function not found.');
}
