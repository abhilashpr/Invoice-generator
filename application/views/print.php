<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<style type="text/css">
   body{margin-top:20px;
   background:#eee;
   }
   /*Invoice*/
   .invoice .top-left {
   font-size:65px;
   color:#3ba0ff;
   }
   .invoice .top-right {
   text-align:right;
   padding-right:20px;
   }
   .invoice .table-row {
   margin-left:-15px;
   margin-right:-15px;
   margin-top:25px;
   }
   .invoice .payment-info {
   font-weight:500;
   }
   .invoice .table-row .table>thead {
   border-top:1px solid #ddd;
   }
   .invoice .table-row .table>thead>tr>th {
   border-bottom:none;
   }
   .invoice .table>tbody>tr>td {
   padding:8px 20px;
   }
   .invoice .invoice-total {
   margin-right:-10px;
   font-size:16px;
   }
   .invoice .last-row {
   border-bottom:1px solid #ddd;
   }
   .invoice-ribbon {
   width:85px;
   height:88px;
   overflow:hidden;
   position:absolute;
   top:-1px;
   right:14px;
   }
   .ribbon-inner {
   text-align:center;
   -webkit-transform:rotate(45deg);
   -moz-transform:rotate(45deg);
   -ms-transform:rotate(45deg);
   -o-transform:rotate(45deg);
   position:relative;
   padding:7px 0;
   left:-5px;
   top:11px;
   width:120px;
   background-color:#66c591;
   font-size:15px;
   color:#fff;
   }
   .ribbon-inner:before,.ribbon-inner:after {
   content:"";
   position:absolute;
   }
   .ribbon-inner:before {
   left:0;
   }
   .ribbon-inner:after {
   right:0;
   }
   @media(max-width:575px) {
   .invoice .top-left,.invoice .top-right,.invoice .payment-details {
   text-align:center;
   }
   .invoice .from,.invoice .to,.invoice .payment-details {
   float:none;
   width:100%;
   text-align:center;
   margin-bottom:25px;
   }
   .invoice p.lead,.invoice .from p.lead,.invoice .to p.lead,.invoice .payment-details p.lead {
   font-size:22px;
   }
   .invoice .btn {
   margin-top:10px;
   }
   }
   @media print {
   .invoice {
   width:900px;
   height:800px;
   }
   }
</style>
<title>Print Data</title>
<div class="container bootstrap snippets bootdeys">
<div class="row">
   <div class="col-sm-12">
      <div class="panel panel-default invoice" id="invoice">
         <div class="panel-body">
            <div class="invoice-ribbon">
               <div class="ribbon-inner">PAID</div>
            </div>
            <div class="row">
               <div class="col-sm-6 top-left">
               </div>
               <div class="col-sm-6 top-right">
                  <h3 class="marginright">INVOICE-<?php echo rand(1111,99999); ?></h3>
                  <span class="marginright"><?php echo date("d-M-Y ") ?></span>
               </div>
            </div>
            <hr>
            <div class="row">
               <div class="col-lg-12 text-left payment-details">
                  <p class="lead marginbottom payment-info">Payment details</p>
                  <p>Date: <?php echo date("d-M-Y ") ?></p>
                  <p>Total Amount: $<?php echo $grand_tot_with_tax; ?></p>
               </div>
            </div>
            <div class="row table-row">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th class="text-center" >#</th>
                        <th class="text-center" >Item</th>
                        <th class="text-center" >Quantity</th>
                        <th class="text-center" >Unit Price</th>
                        <th class="text-center" >Tax</th>
                        <th class="text-center" >Total Amount</th>
                        <th class="text-center" >Total Amount With Tax</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($items)){
                        $i=1;
                        foreach($items as $res){
                            $quantity=$res['quantity'];
                             $uprice=$res['uprice'];
                              $tax=$res['tax'];
                        
                        ?>
                     <tr>
                        <td class="text-center"  ><?php echo $i ?></td>
                        <td class="text-center"  ><?php echo $res['name']; ?></td>
                        <td class="text-center"  ><?php echo $quantity; ?></td>
                        <td class="text-center"  > $<?php echo $uprice; ?></td>
                        <td class="text-center"><?php echo $tax; ?>%</td>
                        <td class="text-center"  ><?php 
                           if(empty($quantity)){
                           $quantity=0;
                           }
                           if(empty($tax)){
                           $tax=0;
                           }
                           
                           echo "$".$quantity*$uprice;
                           
                           ?></td>
                        <td class="text-center"  ><?php 
                           $withoutax= $quantity*$uprice;
                           $tempdata=$withoutax*$tax/100;
                           echo "$".$with_tax=$withoutax+$tempdata;
                           ?></td>
                     </tr>
                     <?php 
                        $i++;
                        
                                                }
                        
                                              } ?>
                  </tbody>
               </table>
            </div>
            <div class="row">
               <div class="col-lg-12 invoice-total text-right">
                  <p  >Subtotal : $<?php echo $tot_with_tax; ?></p>
                  <p>Discount (<?php if($discount==1){ echo  "$"; }else{ echo "%"; } ?>) : <?php  echo $discount_amt; ?> </p>
                  <p>Total : $<?php  echo $grand_tot_with_tax; ?> </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   $( document ).ready(function() {
   window.print();
   });
</script>