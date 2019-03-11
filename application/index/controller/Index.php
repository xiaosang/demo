<?php
namespace app\index\controller;
use think\Db;

class Index
{
    /**
     * 首页
     * @return mixed
     */
    public function index()
    {
        return view('pdf/dist/index');
    }

    /**
     * 合同详情
     * @return mixed
     */
    public function show($id)
    {
        $data = Db::table('contract')->where(['delete_date' => 0, 'id' => $id ])->find();
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $mpdf->WriteHTML(
            htmlTemplate($data['name'], 
            $data['pay_method'], 
            date('Y-m-d', $data['pay_date']), 
            date('Y-m-d', $data['signing_date']), 
            date('Y-m-d', $data['expire_date'])
        ));
        // $mpdf->Image("https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1552222226106&di=68a72c2e2be324d08ff690cfe928b3cf&imgtype=0&src=http%3A%2F%2Fwww.lgkezhang.com%2Fuploads%2Fallimg%2F150322%2F1-15032210254I56.jpg", 10, 20);
        $mpdf->Output();
    }
}
