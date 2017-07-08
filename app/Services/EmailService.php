<?php
/**
 * Created by PhpStorm.
 * User: vivacom
 * Date: 1/3/17
 * Time: 1:25 PM
 */

namespace App\Services;

use App\Models\Users;
use App\Services\BaseService;
use App\User;
use Illuminate\Support\Facades\Mail;

class EmailService extends BaseService
{

    /**
     * OptService constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function sendEmail($userObj, $message)
    {
        Mail::send($message, ['user' => $userObj], function ($m) use ($userObj) {
            $m->from('limon1036@hotmail.com', 'School');
            $m->to($userObj->email)->subject('Number changed');
        });
    }

    /**
     * Filter data based on user input
     * @param array $filter
     * @param $query
     */
    public function filterData(array $filter, $query)
    {
        // TODO: Implement filterData() method.
    }

    public function mailSendProcess($to, $subject , $message )
   { 
         
         $header = "From:admin@member.exstudentsbghs.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to, $subject, $message,$header);
         
         if( $retval == true ) {
            echo 0;
         }else {
            echo 0;
         }
   }
}