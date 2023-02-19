<?php

    $s = new SplObjectStorage();
    $o1 = new stdClass;
    $s[$o1] = "ali";
    var_dump($s);

    $s = new WeakMap();
    $o1 = new stdClass;
    $s[$o1] = "ali";
    var_dump($s);

    $std = new stdClass;
    var_dump(serialize($std));
    $std = serialize($std);
    var_dump(unserialize($std));

?>