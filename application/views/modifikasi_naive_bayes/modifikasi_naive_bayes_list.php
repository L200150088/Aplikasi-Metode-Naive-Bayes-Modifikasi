<?php 
    $ci =& get_instance();
?>

<script src="<?php echo base_url('assets/js/plugins/tables/datatables/datatables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/tables/datatables/extensions/responsive.min.js') ?>"></script>

<div class="content">

    <div class="panel panel-info">
        <div class="panel-heading">
            <h5 class="panel-title"><center><b>Modifikasi Naive Bayes</b></center></h5>
            <div class="heading-elements">
                 <ul class="fa fa-desktop fa-3x">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div> <div class="panel-body"> 
            <div class="row">
                <div class="col-md-45 text-left">
                <center> <?php echo anchor(site_url('modifikasi_naive_bayes/'), '<i class="fa fa-dashboard fa-1x"></i> Prediksi Naive Bayes Modifikasi', 'class="btn btn-info" data-popup="tooltip-custom" title="tambah data"'); ?>
                    <?php echo anchor(site_url('pengujian/pengujian_naive_bayes_modifikasi'), '<i class="fa fa-dashboard fa-1x"></i> Lakukan Pengujian', 'class="btn btn-success" data-popup="tooltip-custom" title="tambah data"'); ?>
                    </center></div>
               
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
                        
                        <th>Variabel Y</th>

                        <td style="background-color: aqua;">Prediksi Naive Bayes Modifikasi</th>
                        <th>Detail Perhitungan</th>
						
                    </tr>
                </thead>
				<tbody>
                <?php
                
                foreach ($naive_bayes_data as $naive_bayes)
                
                {
                   
                    
                    $hasil = $this->CI->hasil_modifikasi($naive_bayes->id);
            ?>
                    <tr>
                        <td><?php echo $naive_bayes->id ?></td>
                        <td><?php echo $naive_bayes->job ?></td>
                        
                        <td><?php echo $naive_bayes->education ?></td>
                        
                        <td><?php echo $naive_bayes->balance ?></td>
                        
                        <td><?php echo $naive_bayes->loan ?></td>
                        
                        <td><?php echo $naive_bayes->month ?></td>
                        
                        <td><?php echo $naive_bayes->campaign ?></td>
                        
                        <td><?php echo $naive_bayes->previous ?></td>

                        <td><?php echo $naive_bayes->y ?></td>
                        
                        <!---<?php echo $hasil; ?>-->
                        
                        <td style="background-color: aqua;"><?php echo $naive_bayes->prediksi ?></td>
                        <td style="text-align:center" width="50px">
                        <?php 
                           
                            echo anchor(site_url('modifikasi_naive_bayes/modifikasi_algoritma_naive_bayes/'. $naive_bayes->id), '<i class="fa fa-eye fa-1x"></i> Lihat Perhitungan', 'class="btn btn-info" data-popup="tooltip-custom" title="Analisa Prediksi"');
                            
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