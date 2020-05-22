<?php 
    $ci =& get_instance();
?>
<script src="<?php echo base_url('assets/js/plugins/tables/datatables/datatables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/tables/datatables/extensions/responsive.min.js') ?>"></script>
<div class="content">
<div class="panel panel-info">
        <div class="panel-heading">
            <h5 class="panel-title">Pengujian Precision Recall Accuracy</h5>
            <div class="heading-elements">
                <ul class="fa fa-desktop fa-3x">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>
       <div class="panel-body"> 
      
                        <center><h4><b>Hasil Pengujian Laplace</b></h4></center>
                        <table class="table datatable-responsive table-sm table-bordered" id="mytable">
                       <tbody>
                       
                        </thead>
                        <tbody>
                        <tr>
                                <td style="background-color: aqua;"><h6><b>Total Data Training</h6></b></td>
                              

                               <td style="background-color: aqua;"><?php echo "<font color='black'><h4>$total_data_training</h4> <br></font>";?>
                                </td>
                            </tr>

                             <tr>
                                <td style="background-color: aqua;"><h6><b>Total Data Testing</h6></b></td>
                              

                               <td style="background-color: aqua;"><?php echo "<font color='black'><h4>$total_data_testing</h4> <br></font>";?>
                                </td>
                            </tr>
                          
                        <tr>
                                <td><h6><b>Yes_Yes (True Negative)</h6></b></td>
                              

                                <td><b><h4><?=$total_pengujian_yes?> 
                                </td>
                               
                                
                                
                            </tr>
                            
                            <tr>
                                <td><h6><b>Yes_No (False Negative)</h6></b></td>
                               
                        
                                <td><b><h4><?=$total_pengujian_yes_no?> 
                                </td>
                               

                               
                            </tr>
                           
                            
                            <tr>
                                <td><h6><b>No_Yes (False Positive)</h6></B></td>
                                

                                <td><b><h4><?=$total_pengujian_no_yes?>
                                </td>
                               
                                
                            </tr>

                            <tr>
                                <td><h6><b>No_No (True Positive)</h6></b></td>
                              
                               <td><b><h4><?=$total_pengujian_no?> 
                                </td>
                        
                        
                            </tr>
                             <tr>
                             <td style="background-color: aqua;"><h6><b>Precision</h6></B></td>
                                <td style="background-color: aqua;"><b><h4><?=($total_pengujian_no)/($total_pengujian_no+$total_pengujian_yes_no)*100?><?php echo ' %'?>
                                </td>
                               
                                
                            </tr>

                            
                            <tr>
                            <td style="background-color: aqua;"><h6><b>Recall</h6></B></td>
                                <td style="background-color: aqua;"><b><h4><?=($total_pengujian_no)/($total_pengujian_no+$total_pengujian_no_yes)*100?><?php echo ' %'?>
                                </td>
                               
                                
                            </tr>
                            
                            <tr>
                            <td style="background-color: aqua;"><h6><b>Accuracy</h6></B></td>
                                <td style="background-color: aqua;"><b><h4><?=($total_pengujian_no+$total_pengujian_yes)/($total_pengujian_no+$total_pengujian_no_yes+$total_pengujian_yes+$total_pengujian_yes_no)*100?><?php echo ' %'?>
                                
                                </td>
                               
                                
                            </tr>
                           
                    </table>
                    <br>
                    <br>
        </div>

    </div>
</div>


<script type="text/javascript">
$(function() {

    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        responsive: true,
        columnDefs: [{ 
            orderable: false,
            width: '100px',
            targets: [ 0 ],
        }],
        dom: '<"datatable-header"fl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
            search: '<span>Cari :</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'Cari' : 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        },
        drawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });


    // Basic responsive configuration
    $('.datatable-responsive').DataTable();


    // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder','Ketik ...');


    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: "-1"
    });
    
});
</script>
