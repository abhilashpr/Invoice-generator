<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

function __construct() {
        parent::__construct();
      
		$this->load->helper('cookie');
    }

	public function Create()
	{
		$this->load->view('Create.php');
	}


public function Print()
	{

$name=$this->input->post('name[]');
$quantity=$this->input->post('quantity[]');
$uprice=$this->input->post('uprice[]');
$tax=$this->input->post('tax[]');


if(!empty($name)){
$cnt=count($name);
}

$fnl=array();


for($i=0;$i<$cnt;$i++){
$arr=array(
"name"=>$name[$i],
"quantity"=>$quantity[$i],
"uprice"=>$uprice[$i],
"tax"=>$tax[$i],

);

array_push($fnl, $arr);
}

         $sub_tot_without_tax=$this->input->post('tot_without_tax');

 $tot_with_tax=$this->input->post('tot_with_tax');
  $discount=$this->input->post('discount');
   $discount_amt=$this->input->post('discount_amt');
    $grand_tot_without_tax=$this->input->post('grand_tot_without_tax');
     $grand_tot_with_tax=$this->input->post('grand_tot_with_tax');



$data['items']=$fnl;
$data['tot_without_tax']=$sub_tot_without_tax;
$data['tot_with_tax']=$tot_with_tax;
$data['discount']=$discount;
$data['discount_amt']=$discount_amt;
$data['grand_tot_without_tax']=$grand_tot_without_tax;
$data['grand_tot_with_tax']=$grand_tot_with_tax;







		$this->load->view('print.php',$data);
	}


}
