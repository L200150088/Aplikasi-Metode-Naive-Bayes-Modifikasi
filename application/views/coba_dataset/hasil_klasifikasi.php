<?php 
    $ci =& get_instance();
?>
<script src="<?php echo base_url('assets/js/plugins/tables/datatables/datatables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/tables/datatables/extensions/responsive.min.js') ?>"></script>

<div class="content">

    <div class="panel panel-info">
        <div class="panel-heading">
            <h5 class="panel-title">Hasil Klasifikasi</h5>
            <div class="heading-elements">
                <ul class="fa fa-desktop fa-3x">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 
                <div class="col-md-6">
                    
                        <center><b>Peluang Probabilitas Variable X Terhadap Y</center>
                       <table class="table datatable-responsive table-sm table-bordered" id="mytable">
                        <thead>
                            <tr>
                                <th>Parameter</th>
                                <th>Testing</th>
                                <th>Yes</th>
                                <th>No</th>

                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>job</td>
                                <td><?= $job ?></td>

                                <td><?= $joby ?></td>

                                <td><?= $jobN ?></td>
                                
                            </tr>
                            <tr>
                                <td>education</td>
                                <td><?= $education ?></td>
                                 <td><?= $educationy ?></td>
                                 <td><?= $educationN ?></td>
                                
                            </tr>
                            <tr>
                                <td>balance</td>
                                <td><?= $balance?></td>
                                <td><?= $balancey ?></td> 
                                 <td><?= $balanceN ?></td> 
                            </tr>
                            <tr>
                                <td>loan</td>
                                <td><?= $loan?></td>
                                <td><?= $loany?></td>
                                <td><?= $loanN?></td>
                                
                            </tr>
                            
                            <tr>
                                <td>month</td>
                                <td><?= $month ?></td>

                                <td><?= $monthy?></td>
                                <td><?= $monthN?></td>
                                
                            </tr>
                            <tr>
                                <td>campaign</td>
                                <td><?= $campaign ?></td>

                                <td><?= $campaigny ?></td>
                                <td><?= $campaignN ?></td>
                                
                            </tr>
                            <tr>
                                <td>previous</td>
                                <td><?= $previous ?></td>
                                <td><?= $previousy ?></td>
                                <td><?= $previousN ?></td>
                                
                            </tr>
                       
                        
                    </table> 
                    <br>
                    <br>

                    <center><b>Prediksi Probabilitas Tiap Kelas</font></center>
                    <table class="table datatable-responsive table-sm table-bordered" id="mytable">
                        <thead>
                            <tr>
                                <th>Probabilitas</th>
                                <th><center>Probabilitas Tiap Kelas</center></th>
                               

                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Yes</td>
                                <td><center><?= $prob_yes?></center></td>
                                
                            </tr>
                            <tr>
                                <td>No</td>
                                <td><center><?= $prob_no?></center></td>
                                
                            </tr><tr>
                                <td><b>Prediksi</td>
                                <td><center><?= $prediksi; ?></center></td>
                                
                            </tr>




                        </tbody>
                    </table>
                    <br>
                   
                    
                </div>
                    <form action="<?php echo $action; ?>" method="post">
                        
                        <input type="hidden" name="tanggal" value="<?php echo $tanggal; ?>" />

                        <input type="hidden" name="job" value="<?php echo $job; ?>" />
                        <input type="hidden" name="education" value="<?php echo $education; ?>" />
                        <input type="hidden" name="balance" value="<?php echo $balance; ?>" />
                        <input type="hidden" name="loan" value="<?php echo $loan; ?>" />
                        <input type="hidden" name="month" value="<?php echo $month; ?>" />
                        <input type="hidden" name="campaign" value="<?php echo $campaign; ?>" />
                        <input type="hidden" name="previous" value="<?php echo $previous; ?>" />
                        <input type="hidden" name="hasil" value="<?php echo $prediksi; ?>" />
                        <br>
                    </form>
                    </center>
                </div>            
        </div>

    </div>
</div>