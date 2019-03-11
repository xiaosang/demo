<?php
namespace app\index\controller;
use DB;
class Contract extends BaseController
{
    public function index()
    {
        if (!Request::instance()->isAjax()) {
            $this->returnJson(1, '请求错误');
        }
        $list = Db::table('contract')->where('delete_date', 0)->orderby('create_date','desc')->paginate(10);
        $this->returnJson(0, '请求成功', $list);
    }

    public function add(Request $request) {
        if (!Request::instance()->isAjax()) {
            $this->returnJson(1, '请求错误');
        }
        $params['name']         = strtotime($request->name);
        $params['signing_date'] = strtotime($request->signingDate);
        $params['pay_method']   = $request->payMethod;
        $params['pay_date']     = strtotime($request->payDate);
        $params['expire_date']  = strtotime($request->expireDate);
        $params['create_date']  = time();

        foreach ($params as $key => $param) {
            if(empty($param)) {
                $this->returnJson(1, '参数不能为空');
            }
        }
        $res = Db::table('contract')->insert($params);
        if (empty($res)) {
            $this->returnJson(1, '保存失败');
        } else {
            $this->returnJson(0, '保存成功');
        }
    }

    public function expireMotion() {
        $time = date("Y-m-d",strtotime("+3 day"));
        $infos = Db::table('contract')->where('delete_date', 0)->where('expire_date', '<', $time)->orderby('create_date','desc')->select();
        if (empty($infos)) {
            return ;
        }
        foreach ($infos as $key => $info) {
            $content = $content . $info['name'] . ",合同期限不足三天，合同到期时间为:" . $info . "/r/n";
        }
        
        $email = [
            'zgqny@126.com',
        ];
        $title = "合同到期提醒";
        $data['content']     = $content;
        $data['create_date'] = time();
        foreach ($email as $key => $mail) {
            $res = $this->sendMail($mail, $content, $title);
            $data['send_email'] = $mail;
            if ($res) {
                $data['status'] = 0;
            } else {
                $data['status'] = 1;
            }
            Db::table('contract')->insert($data);
        }
    }
}