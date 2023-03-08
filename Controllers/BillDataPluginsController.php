<?php

namespace App\Plugins\BillDataPlugins\Controllers;

require __DIR__.'/../vendor/autoload.php';

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

class BillDataPluginsController extends Controller
{
    /**
     * Display a index page.
     */
    public function index()
    {
        //
        if (!Auth::check()) {
            return redirect('/login');
        }
        
        return view('BillDataPlugins::index');
    }

    public function autocompleteSearch(Request $request)
    {
        if($request->get('query')){
            $query = $request->get('query');
            // echo $query;
            $data = DB::table('bills')
                    ->where('bill_name','like','%'.$query.'%')
                    ->limit(10)
                    ->get();
            
            $output = '<ul class="dropdown-menu" style="display:block; position:relative;">';
            foreach($data as $row)
            {
                $output .= '<li style="cursor:pointer;"><a class="dropdown-item showdatalist">'.$row->bill_name.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function showdata(Request $request)
    {
        if($request->get('name')){
            $bill = $request->get('name');
            $datetime1 = $request->get('datetime1') .':00';
            $datetime2 = $request->get('datetime2') .':00';
            
            if (!is_string($bill)) {
                throw new \InvalidArgumentException('Expected string for bill');
            }
            // if (!is_array($datetime) || count($datetime) != 2 || !is_string($datetime[0]) || !is_string($datetime[1])) {
            //     throw new \InvalidArgumentException('Expected array of 2 strings for datetime');
            // }
            $results = DB::table('bills')
                ->join('bill_data', 'bills.bill_id', '=', 'bill_data.bill_id')
                ->where(function($query) use ($bill, $datetime1 , $datetime2) {
                    $query->whereBetween('timestamp', [$datetime1, $datetime2]);
                })
                ->where('bill_name','like',$bill)
                ->get();

            $output = '';
            foreach($results as $row)
            {
                $output .= '<tr><td>' . $row->bill_name . '</td>' . '<td>' . $row->timestamp . '</td>' . '<td>' . $this->data_to_rate($row->in_delta) . '</td>' . '<td>' . $this->data_to_rate($row->out_delta) . '</td></tr>';
            }
            echo $output;
        }
    }

    public function data_to_rate(int $input){
        return round((($input/300)*8)/(10**3),2);
    }

    public function exports(Request $request){

        // if (!Auth::check()) {
        //     return redirect('/login');
        // }

        if($request->get('name')){
            $bill = $request->get('name');
            $datetime1 = $request->get('datetime1') .':00';
            $datetime2 = $request->get('datetime2') .':00';
            $filetype = $request->get('filetype');
            $final_filename = $bill . '.' . $filetype;

            $results = DB::table('bills')
                ->join('bill_data', 'bills.bill_id', '=', 'bill_data.bill_id')
                ->where(function($query) use ($bill, $datetime1 , $datetime2) {
                    $query->whereBetween('timestamp', [$datetime1, $datetime2]);
                })
                ->where('bill_name','like',$bill)
                ->get();
            
            if($results)
            {
                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();

                $sheet->setCellValue('A1', 'Bill Name');
                $sheet->setCellValue('B1', 'TimeStamp');
                $sheet->setCellValue('C1', 'Inbound (kbps)');
                $sheet->setCellValue('D1', 'Outbound (kbps)');
                $rowCount = 2;
                foreach($results as $data)
                {
                    $sheet->setCellValue('A'.$rowCount, $data->bill_name);
                    $sheet->setCellValue('B'.$rowCount, \PhpOffice\PhpSpreadsheet\Shared\Date::PHPToExcel($data->timestamp));
                    $sheet->setCellValue('C'.$rowCount, $this->data_to_rate($data->in_delta));
                    $sheet->setCellValue('D'.$rowCount, $this->data_to_rate($data->out_delta));
                    $rowCount++;
                }

                if($filetype == 'xlsx')
                {
                    $writer = new Xlsx($spreadsheet);
                    $final_filename = $bill.'.xlsx';
                }
                elseif($filetype == 'xls')
                {
                    $writer = new Xls($spreadsheet);
                    $final_filename = $bill.'.xls';
                }
                elseif($filetype == 'csv')
                {
                    $writer = new Csv($spreadsheet);
                    $final_filename = $bill.'.csv';
                }
                // $writer->save($final_filename);
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attactment; filename="'.urlencode($final_filename).'"');
                $writer->save('php://output');

            }

        }

        // return redirect('/billdataPlugins')->with('success','The files has benn download.');
    }

}