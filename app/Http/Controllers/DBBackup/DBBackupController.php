<?php

namespace App\Http\Controllers\DBBackup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
class DBBackupController extends Controller
{

   public function __construct()
    {
    }
    public function downloadBackup()
    {

         //ENTER THE RELEVANT INFO BELOW
         $mysqlHostName      = env('DB_HOST');
         $mysqlUserName      = env('DB_USERNAME');
         $mysqlPassword      = env('DB_PASSWORD');
         $DbName             = env('DB_DATABASE');
         $backup_name        = "mybackup.sql";
         $tables             = [];
 
         $connect = new \PDO("mysql:host=$mysqlHostName;dbname=$DbName;charset=utf8", "$mysqlUserName", "$mysqlPassword",array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
         $get_all_table_query = "SHOW TABLES";
        
         $statement = $connect->prepare($get_all_table_query);
         $statement->execute();
         $result = $statement->fetchAll();
         foreach ($result as $row) {
             array_push($tables,$row[0]);
         }
        //  dd($result);
         $output = '';
         foreach($tables as $table)
         {
          $show_table_query = "SHOW CREATE TABLE " . $table . "";
          $statement = $connect->prepare($show_table_query);
          $statement->execute();
          $show_table_result = $statement->fetchAll();
 
          foreach($show_table_result as $show_table_row)
          {
           $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
          }
          $select_query = "SELECT * FROM " . $table . "";
          $statement = $connect->prepare($select_query);
          $statement->execute();
          $total_row = $statement->rowCount();
 
          for($count=0; $count<$total_row; $count++)
          {
           $single_result = $statement->fetch(\PDO::FETCH_ASSOC);
           $table_column_array = array_keys($single_result);
           $table_value_array = array_values($single_result);
           $output .= "\nINSERT INTO $table (";
           $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
           $output .= "'" . implode("','", $table_value_array) . "');\n";
          }
         }
         $file_name = 'database_backup_on_' . date('y-m-d') . '.sql';
         $file_handle = fopen($file_name, 'w+');
         fwrite($file_handle, $output);
         fclose($file_handle);
         header('Content-Description: File Transfer');
         header('Content-Type: application/octet-stream');
         header('Content-Disposition: attachment; filename=' . basename($file_name));
         header('Content-Transfer-Encoding: binary');
         header('Expires: 0');
         header('Cache-Control: must-revalidate');
         header('Pragma: public');
         header('Content-Length: ' . filesize($file_name));
         ob_clean();
         flush();
         readfile($file_name);
         unlink($file_name);

         $pageData = '';
         $toEmail = 'satishaurange@sumagoinfotech.com';
         $fromEmail = 'satish23522352@gmail.com';
         $sendMail = Mail::send('admin.email.emailsend', compact('pageData'), function($message) use ($toEmail, $fromEmail, $pageData) {
                   $message->to($toEmail)->subject
                      ('Thank You !');
                   $message->from($fromEmail,'DM');
                });
 
         if (Mail::failures()){
             return Redirect()->back()->with('error','There is error while sending mail.');
         }else{
             return Redirect()->back()->with('success','Mail Send Successfully.');
         }
 
 

    }

}