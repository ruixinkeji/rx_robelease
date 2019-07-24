<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/23 14:42
 * @desc:  测试类
 */

namespace app\admin\controller;

use Endroid\QrCode\QrCode;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use think\facade\Log;

class Test
{

    //导出Excel文件
    public function export()
    {
        $data = array(
            0 => array(0 => 1, 1 => 'alex1', 2 => 1,),
            1 => array(0 => 2, 1 => 'alex2', 2 => 2,),
            2 => array(0 => 3, 1 => 'alex3', 2 => 1,),
            3 => array(0 => 4, 1 => 'alex4', 2 => 2,),
            4 => array(0 => 5, 1 => 'alex5', 2 => 1,),
            5 => array(0 => 6, 1 => 'alex6', 2 => 2,)
        );
        $title = ['id', 'name', 'sex'];
        $spreadsheet = new Spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();
        //设置工作表标题名称
        $worksheet->setTitle('测试Excel');
        //表头
        //设置单元格内容
        foreach ($title as $key => $value) {
            $worksheet->setCellValueByColumnAndRow($key + 1, 1, $value);
        }
        $row = 2; //第二行开始
        foreach ($data as $item) {
            $column = 1;
            foreach ($item as $value) {
                $worksheet->setCellValueByColumnAndRow($column, $row, $value);
                $column++;
            }
            $row++;
        }
        # 保存为xlsx
        $filename = '测试Excel.xlsx';
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($filename);
        # 浏览器下载
        //header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        //header('Content-Disposition: attachment;filename="'.$filename.'"');
        //header('Cache-Control: max-age=0');
        //$writer->save('php://output');


        # 保存为xls
//        $filename = '测试Excel.xls';
//        $writer = IOFactory::createWriter($spreadsheet, 'xls');
//        $writer->save($filename);
        # 浏览器下载
        //header('Content-Type: application/vnd.ms-excel');
        //header('Content-Disposition: attachment;filename="'.$filename.'"');
        //header('Cache-Control: max-age=0');
        //$writer->save('php://output');
    }

    public function test()
    {
        $code = rand(1,10);
        // Create a basic QR code
        $qrCode = new QrCode("http://ruixinec.natapp1.cc/admin/Test/test2?code=".$code);
        $qrCode->setSize(300);
        // Set advanced options
        $qrCode->setWriterByName('png');
        $qrCode->setMargin(10);
        $qrCode->setEncoding('UTF-8');
        $qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
        $qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
        $qrCode->setRoundBlockSize(true);
        $qrCode->setValidateResult(false);
        $qrCode->setWriterOptions(['exclude_xml_declaration' => true]);
        $qrCode ->writeFile( __DIR__ .'/qrcode.png');
    }

    public function test1(){
        $code = input("code");
        echo "成功";
        Log::info("我是二维码回调 = ".$code);
    }

    public function test2(){
        $code = input("code");
        return view("test2",['code'=>$code]);
    }

}