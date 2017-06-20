<?php

namespace App\Support\Configs;

class Constants
{
    public static $user_default_status = 0;
    public static $user_active_status = 1;

    public static $user_status = [0, 1, 2];
    public static $user_status_name = [
        0 => 'Pending',
        1 => 'Active',
        2 => 'Suspend'];
    public static $student_status = [0, 1, 2];

    public static $PAYMENT_PENDING = 0;
    public static $PAYMENT_ACTIVE = 1;
    public static $PAYMENT_CANCEL = 2;
}
