<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Repositories\ContactRepository;

class ContactsController extends Controller
{
    /**
     * @var ContactRepository
     */
    private $repository;

    public function __construct(ContactRepository $repository)
    {
        $this->repository = $repository;
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('public.contact-us');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ContactRequest $request
     * @return mixed
     */
    public function store( ContactRequest $request)
    {
        $to  = 'admin@gmail.com' . ', '; // note the comma
        $to .= 'info@school.com';
        $subject = 'Contact from School Event website';

        $message = '
            <html>
            <head>
              <title>Message from School Event Website</title>
            </head>
            <body>
              <p>You received a message from' .$request->get('name').' Via School Event Website</p>
              <table>
                <tr>
                  <th><strong>Email:</strong></th><th>'.$request->get('email').'</th>
                </tr>
                <tr>
                  <td><strong>Subject: </strong></td><td>'.$request->get('subject').'</td>
                </tr>
                <tr>
                  <td><strong>Message:</strong></td><td>17th</td><td>August</td><td>1973</td>
                </tr>
              </table>
            </body>
            </html>
            ';

        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Additional headers
        $headers .= 'To: Alimul Razi <alimuls@gmail.com>, School Event <alimuls@ymail.com>' . "\r\n";
        $headers .= 'From: School Event Freighters Website <'.$request->get('email').'>' . "\r\n";

        // Mail it
        if(mail($to, $subject, $message, $headers)){

            echo 'Email Sent';
        } else echo 'not sent';

        return \Redirect::route('contact')->with('message', 'Thanks for contacting us!');

    }


}
