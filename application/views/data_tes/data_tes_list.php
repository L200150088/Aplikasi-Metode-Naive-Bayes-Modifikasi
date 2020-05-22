<?php 
    $ci =& get_instance();
?>

<script src="<?php echo base_url('assets/js/plugins/tables/datatables/datatables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/tables/datatables/extensions/responsive.min.js') ?>"></script>

<div class="content">

    <div class="panel panel-info">
        <div class="panel-heading">
            <h5 class="panel-title"><center><b>Kelola Data Testing</b></center></h5>  
            <div class="heading-elements">
                 <ul class="fa fa-desktop fa-3x">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>
       <div class="panel-body"> 
            <div class="row">
                <div class="col-md-5 text-left">
                    <?php echo anchor(site_url('data_tes/create'), '<i class="fa fa-plus-square"></i> Tambah Data Testing', 'class="btn btn-success" data-popup="tooltip-custom" title="tambah data"'); ?>
                    
                </div>

                  <div class="row">
                <div class="col-md-5 text-left">
                <form method="post" action="<?php echo base_url("Upload_Csv/import"); ?>" enctype="multipart/form-data">
		<i class="btn badge-left"><input type="file" class="btn btn-success" name="csv_file" /></i>
                <input type="submit" name="csv_file" id="csv_file" required accept=".csv" value="Import" class="btn btn-success">
            </form>
               </div>

            
            <br>
            <table class="table datatable-responsive table-sm table-striped" id="mytable">
                <thead>

                 <tr>

</tr>


<tr>
<th colspan='15'><div class="row">
<div class="col-md-15 text-center">
<?php echo anchor(site_url('data_tes/delete_all'), '<i class="fa fa-trash"></i><b> Hapus Semua Data Testing</b>', 'class="btn btn-danger" data-popup="tooltip-custom" title="hapus semua data"'); ?>
</div>
</th>
</tr>
                    <tr>

                        <th><center>No</center></th>
						<th><center>Job</center></th>
						
						<th><center>Education</center></th>
						
						<th><center>balance</center></th>
						
						<th><center>Loan</center></th>
						
						<th><center>month</center></th>
						
						<th><center>campaign</center></th>
                        
						<th><center>Previous</center></th>
						
                        <th><center>Perpanjang</center></th>
                        <th><center>Lihat</center></th>
                        <th><center>Update</center></th>
                        <th><center>Hapus</center></th>
						
                    </tr>
                </thead>
				<tbody>
            <?php
                
                foreach ($data_tes_data as $data_tes)
                {
            ?>
                    <tr>
                        <td><center><?php echo $data_tes->id ?></center></td>
						<td><center><?php echo $data_tes->job ?></center></td>
						
						<td><center><?php echo $data_tes->education ?></center></td>
						
						<td><center><?php echo $data_tes->balance ?></center></td>
						
						<td><center><?php echo $data_tes->loan ?></center></td>
						
						<td><center><?php echo $data_tes->month ?></center></td>
						
						<td><center><?php echo $data_tes->campaign ?></center></td>
						
						<td><center><?php echo $data_tes->previous ?></center></td>
                        
						<td><center><?php echo $data_tes->y ?></center></td>
						
                        <td style="text-align:center" width="65px">
						<?php 
							echo anchor(site_url('data_tes/read/'.$data_tes->id),'<button class="btn btn-primary"><font color="white"><i class="fa fa-eye"> Lihat </i>'); 
                            
							?>
						</td>
                        <td style="text-align:center" width="65px">
                        <?php
                            echo anchor(site_url('data_tes/update/'.$data_tes->id),'<button class="btn btn-info"> <font color="white"> <i class="fa fa-edit"> Update </i>','onclick="javasciprt: return confirm(\'Update Data ?\')"</button>'); 
                          
                           ?>

                        </td>
                        <td style="text-align:center" width="65px">
                        <?php
                             echo anchor(site_url('data_tes/delete/'.$data_tes->id),'<button class="btn btn-danger"><font color="white"><i class="fa fa-trash"> Hapus</i>','onclick="javasciprt: return confirm(\'Data Akan Di Hapus ?\')"'); 

                        
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