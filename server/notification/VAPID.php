<?php
    require "../vendor/autoload.php";
    use Minishlink\WebPush\VAPID;
    print_r(VAPID::createVapidKeys());
    // Keys
    // [publicKey] => BMfBGXDKQa_8Ons3OEB5ULVOGJi7q5vmj3AmCHdwX_Var71B18qnT-OK3rGw0Rcos9NguHPmYCQxt2Ft3TlzdxI 
    // [privateKey] => WfaliZ2IUplrUtuuLSmqTtvcem2L2-RYpGRz0tNMH5w