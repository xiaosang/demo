<?php
namespace app\index\controller;

class Index
{
    public function index()
    {
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $mpdf->WriteHTML(htmlTemplate());
        // $mpdf->Image("https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1552222226106&di=68a72c2e2be324d08ff690cfe928b3cf&imgtype=0&src=http%3A%2F%2Fwww.lgkezhang.com%2Fuploads%2Fallimg%2F150322%2F1-15032210254I56.jpg", 10, 20);
        $mpdf->Output();
        return view('index');
    }
}
