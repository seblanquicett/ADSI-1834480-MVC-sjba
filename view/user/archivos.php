<?php
$dir = scandir("archivos/".$id);
$result = null;

foreach ($dir as $key => $value) {
    if (!in_array($value, array(".",".."))) {
        $result[] = $value;
    }
}

if ($result  != null) {
    foreach ($result as $value) {
        if (substr($value, -3) == 'pdf') {
            echo "<embed src='archivos/$id/$value' type='application/pdf' width='100%' height='500px'>";
        } else {
            echo "<img src='archivos/$id/$value' width='100%' height='500px'>";
        }
    }
} else {
    $this->listar();
}