<?php include 'header.php'; ?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://www.ksia.or.kr/plugin/DataTables-1.10.15/media/js/jquery.dataTables.js"></script>
<!-- page content -->
<div class="right_col" role="main">
   <div class="">
      <div class="col-md-12 col-sm-12  ">
         <div class="x_panel">
            <div class="x_title">
               <h2>Create Your Invoice<small></small></h2>
               <span class="btn btn-secondary" id="addRow" >Add New </span>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <form action="<?php echo base_url(); ?>Invoice/Print" Method="POST" target="_blank" >
                  <table  id="example" class="display" >
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Quantity</th>
                           <th>Unit Price (in $)</th>
                           <th>Tax for the product</th>
                           <th>Total without tax </th>
                           <th>Total with tax </th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr id="trid1">
                           <td><input type="text" required="" name="name[]" id="name1" class="form-control" placeholder="Product Name"></td>
                           <td><input required="" type="number" onchange="addrowdata(1)" name="quantity[]" id="quantity1" class="form-control" placeholder="quantity"></td>
                           <td><input required="" type="text" onchange="addrowdata(1)" name="uprice[]" id="uprice1" class="form-control" placeholder="Unit price"></td>
                           <td>
                              <select onchange="addrowdata(1)" name="tax[]" class="form-control" id="tax1">
                                 <option value="0">0%</option>
                                 <option value="1">1%</option>
                                 <option value="5">5</option>
                                 <option value="10">10%</option>
                              </select>
                           </td>
                           <td><input type="text" readonly="" class="form-control" name="row_sub_tot_tax1" value="0" id="row_sub_tot_tax1"></td>
                           <td><input type="text" readonly class="form-control" name="row_sub_tot_wtax1" value="0" id="row_sub_tot_wtax1"></td>
                        </tr>
                     </tbody>
                     <tfoot>
                        <tr>
                           <td></td>
                           <td></td>
                           <td><span class="form-control">Sub Totals </span></td>
                           <td></td>
                           <td><input type="text" readonly="" name="tot_without_tax" id="tot_without_tax" value="0" class="form-control"></td>
                           <td><input type="text" readonly="" name="tot_with_tax" id="tot_with_tax" value="0" class="form-control"></td>
                        </tr>
                        <tr>
                           <td></td>
                           <td></td>
                           <td>
                              <select class="form-control" onchange="discountchange()"  name="discount" id="discount" >
                                 <option value="1" >Discount in $</option>
                                 <option value="2" >Discount in %</option>
                                 </
                              </select>
                           </td>
                           <td><input type="text" id="discount_amt" value="0" onchange="discountchange()"  name="discount_amt" placeholder="Enter Amount " class="form-control" ></td>
                           <td></td>
                           <td></td>
                        </tr>
                        <tr>
                           <td></td>
                           <td></td>
                           <td><span class="form-control" >Grand Total</span></td>
                           <td></td>
                           <td><input type="text" readonly="" class="form-control" name="grand_tot_without_tax" id="grand_tot_without_tax" ></td>
                           <td><input type="text" readonly="" class="form-control" name="grand_tot_with_tax" id="grand_tot_with_tax" ></td>
                        </tr>
                        <tr>
                           <td></td>
                           <td></td>
                           <td colspan="2" ><input type="submit" name="save" value="Generate Invoice" class="btn btn-success"> </td>
                           <td></td>
                           <td></td>
                        </tr>
                     </tfoot>
                  </table>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   $(document).ready(function() {
      var t = $('#example').DataTable();
      var counter = 2;
   
      $('#addRow').on( 'click', function () {
          t.row.add( [
              '<input type="text" required="" name="name[]" id="name'+counter+'" class="form-control" placeholder="Product Name">',
             '<input required="" type="number" onchange="addrowdata('+counter+')" name="quantity[]" id="quantity'+counter+'" class="form-control" placeholder="quantity">',
             '<input required="" type="text" onchange="addrowdata('+counter+')" name="uprice[]" id="uprice'+counter+'" class="form-control" placeholder="Unit price">',
             '<select onchange="addrowdata('+counter+')" name="tax[]" class="form-control" id="tax'+counter+'"><option value="0">0%</option><option value="1">1%</option><option value="5">5</option><option value="10">10%</option></select>',
             '<input type="text" readonly="" class="form-control" name="row_sub_tot_tax'+counter+'" value="0" id="row_sub_tot_tax'+counter+'">',
             '<td><input type="text" readonly class="form-control" name="row_sub_tot_wtax'+counter+'" value="0" id="row_sub_tot_wtax'+counter+'">'
   
          ] ).draw( false );
   
          counter++;
   
   
   
      } );
   
   } );
</script>
<script type="text/javascript">
   function addrowdata(id){
     var quantity=$("#quantity"+id).val();
     var uprice=$("#uprice"+id).val();
     var tax=$("#tax"+id).val();
       var row_sub_tot_tax=$("#row_sub_tot_tax"+id).val();
         var row_sub_tot_wtax=$("#row_sub_tot_wtax"+id).val();
   
   var tot_without_tax=$("#tot_without_tax").val();
         var tot_with_tax=$("#tot_with_tax").val();
   
   
        if(quantity==''){
         quantity=0;
         }
           if(uprice==''){
         uprice=0;
         }
   
   if(tax==''){
         tax=0;
         }
   
   var rowsubtotwithout_tax=parseFloat(quantity)*parseFloat(uprice);
   
   var taxcal=parseFloat(rowsubtotwithout_tax*tax)/100;
   
   var rowsubtotwith_tax=parseFloat(rowsubtotwithout_tax)+parseFloat(taxcal);
   
   rowsubtotwithout_tax=rowsubtotwithout_tax.toFixed(3);
   rowsubtotwith_tax=rowsubtotwith_tax.toFixed(3);
   
   
   var temwt=parseFloat(tot_without_tax)-parseFloat(row_sub_tot_tax);
   var temt=parseFloat(tot_with_tax)-parseFloat(row_sub_tot_wtax);
   
   $("#row_sub_tot_tax"+id).val(rowsubtotwithout_tax);
   $("#row_sub_tot_wtax"+id).val(rowsubtotwith_tax);
   
   
   var otempwt=parseFloat(temwt)+parseFloat(rowsubtotwithout_tax);
   var otempt=parseFloat(temt)+parseFloat(rowsubtotwith_tax);
   $("#tot_without_tax").val(otempwt);
   $("#tot_with_tax").val(otempt);
   
   var discount=$("#discount").val();
   
   var discount_amt=$("#discount_amt").val();
   
   
   if(discount==1){
   var add_discountwithouttax=discount_amt;
   var add_discounttax=discount_amt;
   }else{
   var add_discountwithouttax=parseFloat(otempwt*discount_amt)/100;
   
   var add_discounttax=parseFloat(otempt*discount_amt)/100;
   }
   
   
   var grandamount_withouttax=parseFloat(otempwt)-parseFloat(add_discountwithouttax);
   var grandamount_tax=parseFloat(otempt)-parseFloat(add_discounttax);
   $("#grand_tot_without_tax").val(grandamount_withouttax);
   $("#grand_tot_with_tax").val(grandamount_tax);
   }
   
</script>
<script type="text/javascript">
   function discountchange(){
   var otempwt=$("#tot_without_tax").val();
   var otempt=$("#tot_with_tax").val();
    var discount=$("#discount").val();
   
    var discount_amt=$("#discount_amt").val();
   
   
   if(discount==1){
   var add_discountwithouttax=discount_amt;
   var add_discounttax=discount_amt;
   }else{
   var add_discountwithouttax=parseFloat(otempwt*discount_amt)/100;
   
   var add_discounttax=parseFloat(otempt*discount_amt)/100;
   }
   
   
   var grandamount_withouttax=parseFloat(otempwt)-parseFloat(add_discountwithouttax);
   var grandamount_tax=parseFloat(otempt)-parseFloat(add_discounttax);
   $("#grand_tot_without_tax").val(grandamount_withouttax);
   $("#grand_tot_with_tax").val(grandamount_tax);
     }
   
   
   
</script>
<?php include 'footer.php'; ?>