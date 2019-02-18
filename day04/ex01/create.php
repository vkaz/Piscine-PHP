<?php
    if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] === "OK") {
        if (!file_exists('../private')) {
            mkdir("../private");
        }
        if (!file_exists('../private/passwd')) {
            file_put_contents('../private/passwd', null);
        }
        $acc = unserialize(file_get_contents('../private/passwd'));
        if ($acc) {
            $l = 0;
            foreach ($acc as $k => $v) {
                if ($v['login'] === $_POST['login'])
                    $l = 1;
            }
        }
        if ($l) {
            echo "ERROR\n";
        } else {
            $vr['login'] = $_POST['login'];
            $vr['passwd'] = hash(whirlpool, $_POST['passwd']);
            $acc[] = $vr;
            file_put_contents('../private/passwd', serialize($acc));
            echo "OK\n";
        }
    } else {
        echo "ERROR\n";
    }
?>