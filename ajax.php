<?php
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'btn_rin':
            insert();
            break;
        case 'select':
            select();
            break;
    }
}

function select() {
    echo '<body onLoad="alert(\'The select function is called.\')">';
    echo "The select function is called.";
    exit;
}

function insert() {
    echo '<body onLoad="alert(\'The insert function is called.\')">';
    echo "The insert function is called.";
    exit;
}
?>