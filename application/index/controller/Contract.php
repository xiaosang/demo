<?php
namespace app\index\controller;
use think\Db;
use think\Request;
use think\Log;

class Contract extends BaseController
{
    /**
     * 合同列表，分页
     * @return string
     */
    public function index()
    {
        // if (!Request::instance()->isAjax()) {
        //     return $this->returnJson(1, '请求错误');
        // }
        $pageSize = input('pageSize', 10);
        $list = Db::table('contract')->where('delete_date', 0)->order('create_date desc')->paginate($pageSize);
        return $this->returnJson(0, '请求成功', $list);
    }

    /**
     * 添加合同
     * @return string
     */
    public function add(Request $request) {
        // if (!Request::instance()->isAjax()) {
        //     return $this->returnJson(1, '请求错误');
        // }

        $params['name']         = input('name');
        $params['signing_date'] = strtotime(input('signingDate'));
        $params['pay_method']   = input('payMethod');
        $params['pay_date']     = strtotime(input('payDate'));
        $params['expire_date']  = strtotime(input('expireDate'));
        $params['create_date']  = time();
        foreach ($params as $key => $param) {
            if(empty($param)) {
                return $this->returnJson(1, 'error', '参数不能为空');
            }
        }
        $res = Db::table('contract')->insert($params);

        Log::info('[addData:]' . json_encode($params) . ' result:' . $res);
        
        if (empty($res)) {
            return $this->returnJson(1, 'error', '保存失败');
        } else {
            return $this->returnJson(0, 'success', '保存成功');
        }
    }

    /**
     * 邮件通知
     * @return null
     */
    public function expireMotion() {
        $time = date("Y-m-d",strtotime("+3 day"));
        $infos = Db::table('contract')->where('delete_date', 0)->where('expire_date', '<', $time)->order('create_date desc')->select();
        if (empty($infos)) {
            return ;
        }
        $content = '';
        foreach ($infos as $key => $info) {
            $content .= $info['name'] . ",合同期限不足三天，合同到期时间为:" . $info['expire_date'] . "/r/n";
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