<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\SalesData;

class DatabaseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('salesdata.index');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function import()
    {
        return view('salesdata.import');
    }
    public function importcategories()
    {
        return view('salesdata.importcategories');
    }
    
    public function exportdata()
    {
        $sales = \DB::table('sales_data')->take(4)->get();
        
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        //Set Column width AUto
        foreach(range('A','I') as $columnID) {
            $sheet->getColumnDimension($columnID)
                ->setAutoSize(true);
        }

       
        //Set Column Headings
        $sheet->setCellValue('A1', 'Order ID');
        $sheet->setCellValue('B1', 'Created');
        $sheet->setCellValue('C1', 'Email');
        $sheet->setCellValue('D1', 'Name');
        $sheet->setCellValue('E1', 'Company name');
        $sheet->setCellValue('F1', 'Main Industry');
        $sheet->setCellValue('G1', 'Sub-industry');
        $sheet->setCellValue('H1', 'Type');
        $sheet->setCellValue('I1', 'Link');
        // Set Row Data
        
        $rowno = 2;
        foreach ($sales as $row) {
            $earray = explode('@', $row->email);
            $email = '';
            if(!empty($earray)){
                $email = end($earray);
            }
            $sheet->setCellValue('A' . $rowno, $row->order_id);
            $sheet->setCellValue('B' . $rowno, date('d/m/y',strtotime($row->created)));
            $sheet->setCellValue('C' . $rowno, $email);
            $sheet->setCellValue('D' . $rowno, $row->name);
            $sheet->setCellValue('E' . $rowno, $row->company);
            $sheet->setCellValue('F' . $rowno, '');
            $sheet->setCellValue('G' . $rowno, '');
            $sheet->setCellValue('H' . $rowno, '');
            $sheet->setCellValue('I' . $rowno, '');
            $rowno++;
        }
        $fileName = "sales_import_categories-".date('d-m-Y').".xlsx";
        $writer = new Xlsx($spreadsheet);
        $response =  new StreamedResponse(
            function () use ($writer) {
                $writer->save('php://output');
            }
        );
        $response->headers->set('Content-Type', 'application/vnd.ms-excel');
        $response->headers->set('Content-Disposition', 'attachment;filename="'.$fileName.'"');
        $response->headers->set('Cache-Control','max-age=0');
        return $response;
        
    }
    
    public function importsubmit(Request $request)
    {
        $extension = '';
        if(!empty($request->file)) {
             $extension = $request->file->getClientOriginalExtension();
        }

        $validator = Validator::make(['file'=>$request->file,'extension'=>$extension],['file'=>'required','extension'      => 'required|in:csv,xlsx,xls']);
        if ($validator->fails()) {
            $arr = array("status" => 400, "msg" => $validator->errors()->first(), "result" => array());
        }else{
                if($extension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } else if($extension == 'xls') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else{

                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                }
                // file path
                $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
                $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
                $highestColumn = $spreadsheet->getActiveSheet()->getHighestColumn();
                // array Count
                $arrayCount = count($allDataInSheet);
                if($highestColumn == 'T'){


                    $errors = $finalarr = array();
                    for ($i = 1; $i <= $arrayCount; $i ++) {
                        if($i > 1){
                            $order_id =  $allDataInSheet[$i]['A'];
                            if(empty($order_id)){
                                $errors[$i][] = array('type'=>"Order Id",'error'=>"Order Id field is required.");
                            }else if(strlen($order_id) !== 7){
                                $errors[$i][] = array('type'=>"Order Id",'error'=>"Order Id Should be 7 digits.");
                            }else if(!is_numeric($order_id)){
                                $errors[$i][] = array('type'=>"Order Id",'error'=>"Order Id Should be numeric.");
                            } else if(!empty($order_id)){
                                $count = \DB::table('sales_data')->where('order_id',$order_id)->count();
                                if($count > 0){
                                    $errors[$i][] = array('type'=>"Order Id",'error'=>"Order Id Already Exists.");
                                }
                            }

                            $created =  $allDataInSheet[$i]['B'];
                            if(empty($created)){
                                $errors[$i][] = array('type'=>"Created",'error'=>"Created field is required.");
                            }

                            $status =  $allDataInSheet[$i]['C'];
                            if(!empty($status) && strlen($status) > 30){
                                $errors[$i][] = array('type'=>"Status",'error'=>"Status should not be more than 30 character.");
                            }

                            $name =  $allDataInSheet[$i]['D'];
                            if(!empty($name) && strlen($name) > 50){
                                $errors[$i][] = array('type'=>"Name",'error'=>"Name should not be more than 50 character.");
                            }

                           
                            $email =  $allDataInSheet[$i]['E'];
                            if(!empty($email) && strlen($email) > 100){
                                $errors[$i][] = array('type'=>"Billing Email",'error'=>"Billing Email should not be more than 100 character.");
                            }

                            $payment_method =  $allDataInSheet[$i]['F'];
                            if(!empty($payment_method) && strlen($payment_method) > 50){
                                $errors[$i][] = array('type'=>"Payment Method",'error'=>"Payment Method should not be more than 50 character.");
                            }

                            $payment_status =  $allDataInSheet[$i]['G'];
                            if(!empty($payment_status) && strlen($payment_status) > 30){
                                $errors[$i][] = array('type'=>"Payment Status",'error'=>"Payment Status should not be more than 30 character.");
                            }

                            $total =  $allDataInSheet[$i]['H'];
                            if(!empty($total) && strlen($total) > 30){
                                $errors[$i][] = array('type'=>"Total Status",'error'=>"Total should not be more than 30 character.");
                            }

                            $device =  $allDataInSheet[$i]['I'];
                            if(!empty($device) && !in_array($device,array('Desktop','Mobile'))){
                                $errors[$i][] = array('type'=>"Device",'error'=>"Device should be Desktop or Mobile.");
                            }

                            $sales =  $allDataInSheet[$i]['J'];
                            if(!empty($sales) && strlen($sales) > 30){
                                $errors[$i][] = array('type'=>"Sales",'error'=>"Sales should not be more than 30 character.");
                            }

                            $source =  $allDataInSheet[$i]['K'];
                            if(!empty($source) && strlen($source) > 30){
                                $errors[$i][] = array('type'=>"Source",'error'=>"Source should not be more than 30 character.");
                            }

                            $taken_by =  $allDataInSheet[$i]['L'];
                            if(!empty($taken_by) && strlen($taken_by) > 30){
                                $errors[$i][] = array('type'=>"Taken By",'error'=>"Taken By should not be more than 30 character.");
                            }

                            $postcode =  $allDataInSheet[$i]['M'];
                            if(!empty($postcode) && strlen($postcode) > 10){
                                $errors[$i][] = array('type'=>"B Postcode",'error'=>"B Postcode should not be more than 10 character.");
                            }
                            $spostcode =  $allDataInSheet[$i]['N'];
                            if(!empty($spostcode) && strlen($spostcode) > 10){
                                $errors[$i][] = array('type'=>"S Postcode",'error'=>"S Postcode should not be more than 10 character.");
                            }

                            $company =  $allDataInSheet[$i]['O'];
                            if(!empty($company) && strlen($company) > 100){
                                $errors[$i][] = array('type'=>"Company",'error'=>"Company should not be more than 100 character.");
                            }

                            $shipping =  $allDataInSheet[$i]['P'];
                            if(!empty($shipping) && strlen($shipping) > 50){
                                $errors[$i][] = array('type'=>"Company",'error'=>"Shipping Method should not be more than 50 character.");
                            }

                            $time =  $allDataInSheet[$i]['Q'];
                            if(!empty($time) && strlen($time) > 30){
                                $errors[$i][] = array('type'=>"Time",'error'=>"Time should not be more than 30 character.");
                            }

                            $b_city =  $allDataInSheet[$i]['R'];
                            if(!empty($b_city) && strlen($b_city) > 30){
                                $errors[$i][] = array('type'=>"B City",'error'=>"B City should not be more than 30 character.");
                            }


                            $actions =  $allDataInSheet[$i]['S'];
                            if(!empty($actions) && strlen($actions) > 30){
                                $errors[$i][] = array('type'=>"Actions",'error'=>"Actions should not be more than 30 character.");
                            }

                            $skus =  $allDataInSheet[$i]['T'];
                            if(!empty($skus) && strlen($skus) > 5){
                                $errors[$i][] = array('type'=>"Actions",'error'=>"Skus should not be more than 5 character.");
                            }

                            $finalarr[] = array('order_id'=>$order_id,'created'=>$created,'status'=>$status,'name'=>$name,'email'=>$email,'payment_method'=>$payment_method,'payment_status'=>$payment_status,'total'=>$total,'device'=>$device,'sales'=>$sales,'source'=>$source,'taken_by'=>$taken_by,'postcode'=>$postcode,'spostcode'=>$spostcode,'company'=>$company,'shipping'=>$shipping,'time'=>$time,'b_city'=>$b_city,'actions'=>$actions,'skus'=>$skus);
                        }
                    }
                    $return = '';
                    if(!empty($errors)){
                        $verify = 0;

                        foreach ($errors as $key => $errorarray) {
                            $return .= '<table style="width:100%; margin-top:15px;">';
                            $return .= '<tr>
                                <td style="border:1px solid #000" colspan="2"><b style="color:red;">Validate Row #'.$key.'</b></td>
                            </tr>';
                            $return .= '<tr>
                                <th style="border:1px solid #000; color:#000; text-align:center;" >Field</th>
                                <th style="border:1px solid #000; color:#000; text-align:center;">Error</th></tr>';
                     
                            foreach ($errorarray as $finalerror) {
                                $return .= '<tr>
                                <td style="border:1px solid #000">'.$finalerror['type'].'</td>
                                <td style="border:1px solid #000">'.$finalerror['error'].'</td></tr>';
                       
                            }
                            $return .=  '</table>';
                        }
                        $arr = array("status" => 201, "msg" => "You're having errors in file please check the errors and reupload the file.", "return" => $return);
                        return \Response::json($arr);
                    } else{
                        if(!empty($finalarr)){
                            foreach ($finalarr as $sale) {
                                $createdate = date('Y-m-d',strtotime($sale['created']));
                                
                                $new = new SalesData;
                                $new->order_id = $sale['order_id'] ?? '';
                                $new->created = $createdate;
                                $new->status = $sale['status'] ?? '';
                                $new->name = $sale['name'] ?? '';
                                $new->email = $sale['email'] ?? '';
                                $new->payment_method = $sale['payment_method'] ?? '';
                                $new->payment_status = $sale['payment_status'] ?? '';
                                $new->total = $sale['total'] ?? '';
                                $new->device = $sale['device'] ?? '';
                                $new->sales = $sale['sales'] ?? '';
                                $new->source = $sale['source'] ?? '';
                                $new->taken_by = $sale['taken_by'] ?? '';
                                $new->postcode = $sale['postcode'] ?? '';
                                $new->spostcode = $sale['spostcode'] ?? '';
                                $new->company = $sale['company'] ?? '';
                                $new->shipping = $sale['shipping'] ?? '';
                                $new->time = $sale['time'] ?? '';
                                $new->b_city = $sale['b_city'] ?? '';
                                $new->actions = $sale['actions'] ?? '';
                                $new->skus = $sale['skus'] ?? '';
                                $new->main_industry = $sale['main_industry'] ?? '';
                                $new->sub_industry = $sale['sub_industry'] ?? '';
                                $new->type = $sale['type'] ?? '';
                                $new->reference_link = $sale['reference_link'] ?? '';
                                $new->save();
                            }
                        }
                    }
                    $arr = array("status" => 200, "msg" => "Your Excel import succussfully!");
                }else{
                    $arr = array("status" => 400, "msg" => "Please check your Excel file.");
                }
        }
        return \Response::json($arr);
    }
    public function importcategoriessubmit(Request $request)
    {
        $extension = '';
        if(!empty($request->file)) {
             $extension = $request->file->getClientOriginalExtension();
        }

        $validator = Validator::make(['file'=>$request->file,'extension'=>$extension],['file'=>'required','extension'      => 'required|in:csv,xlsx,xls']);
        if ($validator->fails()) {
            $arr = array("status" => 400, "msg" => $validator->errors()->first(), "result" => array());
        }else{
                if($extension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } else if($extension == 'xls') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else{

                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                }
                // file path
                $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
                $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
                $highestColumn = $spreadsheet->getActiveSheet()->getHighestColumn();
                // array Count
                $arrayCount = count($allDataInSheet);
                if($highestColumn == 'I'){


                    $errors = $finalarr = array();
                    for ($i = 1; $i <= $arrayCount; $i ++) {
                        if($i > 1){
                            $order_id =  $allDataInSheet[$i]['A'];
                            if(empty($order_id)){
                                $errors[$i][] = array('type'=>"Order Id",'error'=>"Order Id field is required.");
                            }else if(strlen($order_id) !== 7){
                                $errors[$i][] = array('type'=>"Order Id",'error'=>"Order Id Should be 7 digits.");
                            }else if(!is_numeric($order_id)){
                                $errors[$i][] = array('type'=>"Order Id",'error'=>"Order Id Should be numeric.");
                            } else if(!empty($order_id)){
                                $count = \DB::table('sales_data')->where('order_id',$order_id)->count();
                                if($count == 0){
                                    $errors[$i][] = array('type'=>"Order Id",'error'=>"Order Id is invalid.");
                                }
                            }

                            $main_industry =  $allDataInSheet[$i]['F'];
                            if(empty($main_industry)){
                                $errors[$i][] = array('type'=>"Main Industry",'error'=>"Company name field is required.");
                            }else if(!empty($main_industry) && strlen($main_industry) > 50){
                                $errors[$i][] = array('type'=>"Name",'error'=>"Main Industry should not be more than 50 character.");
                            }

                            $sub_industry =  $allDataInSheet[$i]['G'];
                            if(empty($sub_industry)){
                                $errors[$i][] = array('type'=>"Sub-industry",'error'=>"Sub-industry field is required.");
                            }else if(!empty($sub_industry) && strlen($sub_industry) > 50){
                                $errors[$i][] = array('type'=>"Name",'error'=>"Sub-industry should not be more than 50 character.");
                            }

                            $type =  $allDataInSheet[$i]['H'];
                            if(empty($type)){
                                $errors[$i][] = array('type'=>"Type",'error'=>"Type field is required.");
                            }else if(!empty($type) && strlen($type) > 50){
                                $errors[$i][] = array('type'=>"Name",'error'=>"Type should not be more than 50 character.");
                            }


                            $reference_link =  $allDataInSheet[$i]['I'];
                            if(!empty($reference_link) && strlen($reference_link) > 300){
                                $errors[$i][] = array('type'=>"Name",'error'=>"Link should not be more than 300 character.");
                            }

                           
                            
                            $finalarr[] = array('order_id'=>$order_id,'main_industry'=>$main_industry,'sub_industry'=>$sub_industry,'type'=>$type,'reference_link'=>$reference_link);
                        }
                    }
                   
                    $return = '';
                    if(!empty($errors)){
                        $verify = 0;

                        foreach ($errors as $key => $errorarray) {
                            $return .= '<table style="width:100%; margin-top:15px;">';
                            $return .= '<tr>
                                <td style="border:1px solid #000" colspan="2"><b style="color:red;">Validate Row #'.$key.'</b></td>
                            </tr>';
                            $return .= '<tr>
                                <th style="border:1px solid #000; color:#000; text-align:center;" >Field</th>
                                <th style="border:1px solid #000; color:#000; text-align:center;">Error</th></tr>';
                     
                            foreach ($errorarray as $finalerror) {
                                $return .= '<tr>
                                <td style="border:1px solid #000">'.$finalerror['type'].'</td>
                                <td style="border:1px solid #000">'.$finalerror['error'].'</td></tr>';
                       
                            }
                            $return .=  '</table>';
                        }
                        $arr = array("status" => 201, "msg" => "You're having errors in file please check the errors and reupload the file.", "return" => $return);
                        return \Response::json($arr);
                    } else{
                        if(!empty($finalarr)){
                            foreach ($finalarr as $sale) {
                                
                                
                                $new = SalesData::where('order_id',$sale['order_id'])->first();
                                if(!empty($new)){
                                    $new->main_industry = $sale['main_industry'];
                                    $new->sub_industry = $sale['sub_industry'];
                                    $new->type = $sale['type'];
                                    $new->reference_link = $sale['reference_link'];
                                    $new->save();
                                }
                            }
                        }
                    }
                    $arr = array("status" => 200, "msg" => "Your Excel import succussfully!");
                }else{
                    $arr = array("status" => 400, "msg" => "Please check your Excel file.");
                }
        }
        return \Response::json($arr);
    }
    
}
