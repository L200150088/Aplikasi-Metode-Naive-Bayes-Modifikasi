<?php 
    $ci =& get_instance();
?>

<script src="<?php echo base_url('assets/js/plugins/tables/datatables/datatables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/tables/datatables/extensions/responsive.min.js') ?>"></script>

<div class="content">

    <div class="panel panel-info">
        <div class="panel-heading">
            <h5 class="panel-title"><center><b>Data Training</center></b></h5>
            <div class="heading-elements">
                 <ul class="fa fa-desktop fa-3x">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div> <!--
       <div class="panel-body"> 
            <div class="row">
                <div class="col-md-5 text-left">
                   
                     <?php echo anchor(site_url('klasifikasi_coba_dataset'), '<i class="fa fa-dashboard fa-1x"></i> Analisa Prediksi', 'class="btn btn-info" data-popup="tooltip-custom" title="Analisa Prediksi"'); ?>
                </div>
            -->
            <br>
            <table class="table datatable-responsive table-sm table-striped" id="mytable">
                <thead>
                    <tr>

                        <th>Id</th>
						<th>Job</th>
						
						<th>Education</th>
						
						<th>balance</th>
						
						<th>Loan</th>
						
						<th>month</th>
						
						<th>campaign</th>
                        
						<th>Previous</th>
						
						<th>Perpanjang</th>
                      
                       
                      
                    </tr>
                </thead>
				<tbody>
            <?php
                
                foreach ($coba_dataset_data as $coba_dataset)
                {
            ?>
                    <tr>
                        <td><?php echo $coba_dataset->id ?></td>
						<td><?php echo $coba_dataset->job ?></td>
						
						<td><?php echo $coba_dataset->education ?></td>
						
						<td><?php echo $coba_dataset->balance ?></td>
						
						<td><?php echo $coba_dataset->loan ?></td>
						
						<td><?php echo $coba_dataset->month ?></td>
						
						<td><?php echo $coba_dataset->campaign ?></td>
						
						<td><?php echo $coba_dataset->previous ?></td>
                        
						<td><?php echo $coba_dataset->y ?></td>

						
					</tr>
            <?php
                }
            ?>
                </tbody>
            </table>







               <div class="panel panel-info">
        <div class="panel-heading">
            <h5 class="panel-title"><center><b>Data Testing</center></b></h5>
            <div class="heading-elements">
                <ul class="fa fa-desktop fa-3x">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>
     
            <table class="table datatable-responsive table-sm table-striped" id="mytable">
                <thead>
                    <tr>

                        <th>Id</th>
                        <th>Job</th>
                        
                        <th>Education</th>
                        
                        <th>balance</th>
                        
                        <th>Loan</th>
                        
                        <th>month</th>
                        
                        <th>campaign</th>
                        
                        <th>Previous</th>
                        
                        <th style="background-color: aqua;">Naive Bayes</th>
                        <th style="background-color: red;"><font color="white">Modifikasi Naive Bayes</font></th>
                        <th style="background-color: green;"><font color="white">Laplace Smoothing</font></th>

                       
                        
                    </tr>
                </thead>
                <tbody>
            <?php
                
                foreach ($data_tes as $coba_data_tes)
                {
            ?>
                    <tr>
                        <td><?php echo $coba_data_tes->id ?></td>
                        <td><?php echo $coba_data_tes->job ?></td>
                        
                        <td><?php echo $coba_data_tes->education ?></td>
                        
                        <td><?php echo $coba_data_tes->balance ?></td>
                        
                        <td><?php echo $coba_data_tes->loan ?></td>
                        
                        <td><?php echo $coba_data_tes->month ?></td>
                        
                        <td><?php echo $coba_data_tes->campaign ?></td>
                        
                        <td><?php echo $coba_data_tes->previous ?></td>
                        
                        
                        <td style="text-align:center" width="50px">
                        <?php 
                         
                          echo anchor(site_url('coba_data_tes/klasifikasi_naive_bayes/'. $coba_data_tes->id), '<i class="fa fa-dashboard fa-1x"></i> Naive Bayes', 'class="btn btn-info" data-popup="tooltip-custom" title="Analisa Prediksi"');

                          ?>
                        </td>
                        <td style="text-align:center" width="50px">
                        <?php 



                         echo anchor(site_url('coba_data_tes/modifikasi_naive_bayes/'. $coba_data_tes->id), '<i class="fa fa-dashboard fa-1x"></i> Modifikasi Naive bayes', 'class="btn btn-md btn-danger" data-popup="tooltip-custom" title="Analisa Prediksi"');
                         ?>
                        </td>
                        <td style="text-align:center" width="50px">
                        <?php 


                        echo anchor(site_url('coba_data_tes/laplace_smoothing/'. $coba_data_tes->id), '<i class="fa fa-dashboard fa-1x"></i> Laplace Smoothing', 'class="btn btn-success" data-popup="tooltip-custom" title="Analisa Prediksi"');
                        ?>
                        </td>
                    </tr>
            <?php
                }
            ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
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
            targets: [ 5 ]
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