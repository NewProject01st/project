<?php

namespace App\Exceptions;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\Models\ {
    ErrorLogs
};

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        // $email_data = [
        //     'exception' => $exception,
        // ];

        // $toEmail = env('MAIL_ID_ERROR_REPORTING');
        // // $nameOfSender = "Disater Management Administrator";
        // $senderSubject = 'Disaster Management Page Error '.date('d-m-Y H:i:s');
        // $fromEmail = env('MAIL_USERNAME');

        // Mail::send('admin.email.exception', ['email_data' => $email_data], function ($message) use ($toEmail, $fromEmail, $senderSubject) {
        //     $message->to($toEmail)->subject
        //         ($senderSubject);
        //     $message->from($fromEmail, 'Disaster Management Page Error');
        // });
        date_default_timezone_set("Asia/Kolkata");
        $subject = 'Disaster Management Page Error '.date('d-m-Y H:i:s');
        try {
            $data_insert = array();
            $data_insert['subject'] =  $subject ;
            $data_insert['messege'] = $exception ;

            ErrorLogs::insert($data_insert);
            // return redirect()->route('error-handling');
            return parent::render($request, $exception);
        } catch (\Exception $e) {
            return $e;
        }
    }
}
