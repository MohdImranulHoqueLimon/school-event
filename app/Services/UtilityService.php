<?php

namespace App\Services;

class UtilityService
{
    public static $numberOfMonthYear = '-5 month';
    public static $displayRecordPerPage = 20;
    public static $working_days = [
        '' => 'Select a Working Day',
        'monday' => 'Monday',
        'tuesday' => 'Tuesday',
        'wednesday' => 'Wednesday',
        'thursday' => 'Thursday',
        'friday' => 'Friday',
        'saturday' => 'Saturday',
        'sunday' => 'Sunday'
    ];
    public static $months = [
        '' => 'Select a Month',
        '1' => 'January',
        '2' => 'February',
        '3' => 'March',
        '4' => 'April',
        '5' => 'May',
        '6' => 'June',
        '7' => 'July',
        '8' => 'August',
        '9' => 'September',
        '10' => 'October',
        '11' => 'November',
        '12' => 'December'
    ];
    public static $shortMonths = [
        '' => 'Select a Month',
        1 => 'Jan',
        2 => 'Feb',
        3 => 'Mar',
        4 => 'Apr',
        5 => 'May',
        6 => 'Jun',
        7 => 'Jul',
        8 => 'Aug',
        9 => 'Sep',
        10 => 'Oct',
        11 => 'Nov',
        12 => 'Dec'
    ];
    public static $working_status = [
        '' => 'Select Status',
        '1' => 'Full Time',
        '2' => 'Part Time',
        '3' => 'Casual'
    ];
    public static $displayRecordPerPageSelect=[
        '10'=>10,
        '20'=>20,
        '50'=>50,
        '100'=>100,
        'all'=>'All'
    ];


    public static $AdminRoleID = 1;
    public static $UserRoleID = 2;

    /**
     * @return array
     */
    public static function getWorkingDays()
    {
        return self::$working_days;
    }

    /**
     * @param array $working_days
     */
    public static function setWorkingDays( $working_days )
    {
        self::$working_days = $working_days;
    }

    /**
     * @return array
     */
    public static function getWorkingStatus()
    {
        return self::$working_status;
    }

    /**
     * @param array $working_status
     */
    public static function setWorkingStatus( $working_status )
    {
        self::$working_status = $working_status;
    }

    /**
     * @return int
     */
    public static function getAdminRoleID()
    {
        return self::$AdminRoleID;
    }

    /**
     * @param int $AdminRoleID
     */
    public static function setAdminRoleID( $AdminRoleID )
    {
        self::$AdminRoleID = $AdminRoleID;
    }

    /**
     * @return int
     */
    public static function getUserRoleID()
    {
        return self::$UserRoleID;
    }

    /**
     * @param int $UserRoleID
     */
    public static function setUserRoleID( $UserRoleID )
    {
        self::$UserRoleID = $UserRoleID;
    }
}
