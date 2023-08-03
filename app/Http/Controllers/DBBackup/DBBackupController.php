<?php

namespace App\Http\Controllers\DBBackup;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Config;
use File;
class DBBackupController extends Controller
{

    public function __construct()
    {
    }
    public function downloadBackup()
    {

        //ENTER THE RELEVANT INFO BELOW
        $mysqlHostName = env('DB_HOST');
        $mysqlUserName = env('DB_USERNAME');
        $mysqlPassword = env('DB_PASSWORD');
        $DbName = env('DB_DATABASE');
        $backup_name = "mybackup.sql";
        $tables = [];

        $connect = new \PDO("mysql:host=$mysqlHostName;dbname=$DbName;charset=utf8", "$mysqlUserName", "$mysqlPassword", array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $get_all_table_query = "SHOW TABLES";

        $statement = $connect->prepare($get_all_table_query);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            array_push($tables, $row[0]);
        }
        $output = '';
        foreach ($tables as $table) {
            if($table !='tbl_area') {
            $show_table_query = "SHOW CREATE TABLE " . $table . "";
            $statement = $connect->prepare($show_table_query);
            $statement->execute();
            $show_table_result = $statement->fetchAll();

            foreach ($show_table_result as $show_table_row) {
                $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
            }
            $select_query = "SELECT * FROM " . $table . "";
            $statement = $connect->prepare($select_query);
            $statement->execute();
            $total_row = $statement->rowCount();

            for ($count = 0; $count < $total_row; $count++) {
                $single_result = $statement->fetch(\PDO::FETCH_ASSOC);
                $table_column_array = array_keys($single_result);
                $table_value_array = array_values($single_result);
                $output .= "\nINSERT INTO $table (";
                $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
                $output .= "'" . implode("','", $table_value_array) . "');\n";
            }
        }
        }
        //s3 bucket
        // $path = '/'.Config::get('DocumentConstant.DB_BACKUP');
        // if (!file_exists_s3($path)) {
        //     File::makeDirectory($path,0777,true);
        // }

        $path = storage_path().'/'.Config::get('DocumentConstant.DB_BACKUP');
        if (!file_exists($path)) {
            File::makeDirectory($path,0777,true);
        }

        //storage folder
        date_default_timezone_set("Asia/Kolkata");

        $file_name = $path."/".'database_backup_on_' . date('d-m-Y H-i-s') . '.sql';
        $file_handle = fopen($file_name, 'w+');
        fwrite($file_handle, $output);
        fclose($file_handle);

        $aws_file_name = Config::get('DocumentConstant.DB_BACKUP')."/".'database_backup_on_' . date('d-m-Y H-i-s') . '.sql';
        $data = file_get_contents($file_name);
        $base64 = 'data:@file/octet-stream;base64,' . base64_encode($data);
        $path = Storage::disk('s3')->put($aws_file_name, $base64);
        $path = Storage::disk('s3')->url($aws_file_name);
   
        unlink($file_name);
        // try {

        //     $email_data['msg'] = '';
        //     $data = array();
        //     $toEmail = env('MAIL_ID_DB_BACKUP');
        //     $nameOfSender = "Disater Management Administrator";
        //     $senderSubject = 'Database Backup - Disaster Management Web Portal Dated '.date('d-m-Y');
        //     $fromEmail = env('MAIL_USERNAME');

        //     Mail::send('admin.email.emailsend', ['email_data' => $email_data], function ($message) use ($toEmail, $fromEmail, $data, $senderSubject,$file_name) {
        //         $message->to($toEmail)->subject
        //             ($senderSubject);
        //         $message->from($fromEmail, 'Disaster Management Database Backup');
        //         $message->attach($file_name);
                
        //     });
        //     unlink($file_name);

        // } catch (\Exception $e) {
        //     info($e);
        // }

        // if (Mail::failures()) {
        //     return Redirect()->back()->with('error', 'There is error while sending mail.');
        // } else {
            // return Redirect()->back()->with('success', 'Database backup created Successfully.');
        // }
        $return_data = array();
        $status = 'sucess';
        $return_data['status'] =  $status;
        $msg = 'Database backup created Successfully.';
        $return_data['msg'] =  $msg;

        return view('admin.pages.dbbackupsuccess',compact('return_data'));
        //return redirect('/dbbackupsuccess')->with(compact('msg', 'status','return_data'));

    }

}
