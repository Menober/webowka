<?php

if(count($_GET) == 1){
$fp = fopen("sterowanie.json", "r");
echo fread($fp,15);
}
if(count($_GET) == 2){
$fp = fopen("sterowanie.json","w");
fputs($fp, $_GET['name']);
}
?>