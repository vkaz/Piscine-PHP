<?php
    if ($_POST['submit'] === "OK" && $_POST['login'] && $_POST['newpw'] && $_POST['oldpw']) {

        $acc = unserialize(file_get_contents('../private/passwd'));
        if (!$acc) {
        	echo "ERROR\n";
        } else {
            $vr = 0;
            foreach ($acc as $k => $v) {
                if ($v['login'] === $_POST['login'] && $v['passwd'] === hash(whirlpool, $_POST['oldpw'])) {
                    $vr = 1;
                    $acc[$k]['passwd'] =  hash(whirlpool, $_POST['newpw']);
                }
            }
            if (!$vr) {
            	echo "ERROR\n";
            } else {
                file_put_contents('../private/passwd', serialize($acc));
                echo "OK\n";
            }
        }
    } else {
        echo "ERROR\n";
    }
?>
