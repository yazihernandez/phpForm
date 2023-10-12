<?php
function validateData($value){
    $value = trim($value); #Removes unnecessary characters (spaces, tab, newline)
    $value = stripslashes($value); #Removes backslahses (\) from the user input data
    $value = htmlspecialchars($value); #replace HTML characters like < and > with &lt; and &gt;
    return $value;
}
?>