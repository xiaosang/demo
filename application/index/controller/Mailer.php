<?php
namespace app\index\controller;
use think\facade\Log;

require_once(__DIR__.'../vendor/phpmailer/phpmailer.php');
require_once(__DIR__.'../vendor/phpmailer/class.smtp.php');

class Mailer
{
    //存放实例
    private static $mail = null;

    //私有化构造方法、
    private function __construct(){
         
    }
    //私有化克隆方法
    private function __clone(){

    }

    public function sendMail($user_mail, $content, $title) {
        if (!(self::$mail instanceof PHPMailer)){
            self::$mail = new PHPMailer();
        }
        if (empty($user_mail) || empty($content) || empty($title)) {
            return false;
        }
        self::$mail->IsSMTP(); // 启用SMTP
        self::$mail->Host       = 'smtp.126.com'; //SMTP服务器 以126邮箱为例子 
        self::$mail->Port       = 465;  //邮件发送端口
        self::$mail->SMTPAuth   = true;  //启用SMTP认证
        self::$mail->SMTPSecure = "ssl";   // 设置安全验证方式为ssl
        self::$mail->CharSet    = "UTF-8"; //字符集
        self::$mail->Encoding   = "base64"; //编码方式
        self::$mail->Username   = 'zgqnxy@126.com';  //你的邮箱 
        self::$mail->Password   = 'CAONIMA@0';  //你的密码 
        self::$mail->Subject    = '测试邮件'; //邮件标题  
        self::$mail->From       = 'zgqnxy@126.com';  //发件人地址（也就是你的邮箱）
        self::$mail->FromName   = 'admin';  //发件人姓名
        self::$mail->Subject    = $title;
        self::$mail->AddAddress($user_mail,'您好'); //添加收件人（地址，昵称）
        self::$mail->IsHTML(true); //支持html格式内容
        self::$mail->Body = $content; //邮件主体内容
        //发送成功就删除
        if (self::$mail->Send()) {
            $data = ["user_mail" => $user_mail, 'success'=>'success'];
            Log::info($data);
            return true;
        }else{
            $data = ['msg' => 'send mail error', "error" => self::$mail->ErrorInfo, "user_mail" => $user_mail];
            Log::error($data);
            return false;
        }
                  
    }
}