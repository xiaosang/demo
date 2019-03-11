<?php
namespace app\index\controller;
class BaseController
{
    /**
     * 返回Json数据
     */
    public function returnJson($code, $msg, $info=null) {
        $arr = array(
            'code' => $code,
            'msg'  => $msg,
            'info' => $info
        );
        $this->ajaxReturn(json_encode($arr),'JSON');
    }

    public function sendMail($mail, $content, $title) {
        return Mailer::sendMail($mail, $content, $title);   
    }
}