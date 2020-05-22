<?php 
    $ci =& get_instance();
?>
<script src="<?php echo base_url('assets/js/plugins/tables/datatables/datatables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/tables/datatables/extensions/responsive.min.js') ?>"></script>

<div class="content">

    <div class="panel panel-info">
        <div class="panel-heading">
            <h5 class="panel-title">Hasil Klasifikasi Laplace Smoothing</h5>
            <div class="heading-elements">
                 <ul class="fa fa-desktop fa-3x">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 
                    
                      <center><h4><b>Peluang Probabilitas Variable Y</b></h4></center>
                     <table class="table datatable-responsive table-sm table-bordered" id="mytable">
                        <thead>
                            <tr>
                                <th>Variabel Y</th>
                                <th>hasil</th>

                                 <tbody>
                            <tr>
                                <td style="background-color: aqua;">yes</td>

                                
                                <td><?php echo "<font color='black'>$total_yes/$total_data <br></font>";?>
                                </td>


                            </tr>
                            <tr>
                                <td style="background-color: aqua;">no</td>
                                <td><?php echo "<font color='black'>$total_no/$total_data <br></font>";?>
                                
                            </tr>
                                
                            </tr>
                        </thead>

                    </table> 
                     <br>
                    <br>


                        <center><h4><b>Peluang Probabilitas Variable X Terhadap Y</b></h4></center>
                       <table class="table datatable-responsive table-sm table-bordered" id="mytable">
                        <thead>
                            <tr>
                                <th>Parameter</th>
                                <th>Tabel Data Testing</th>
                                <th style="background-color: aqua;">Yes</th>
                                <th style="background-color: aqua;">No</th>

                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>job</td>
                                <td><?= $job ?></td>

                                <td><?=$total_job_yes ?><?php echo "<font color='black'> / $total_yes <br></font>";?>
                                </td>
                                <td><?=$total_job_no?><?php echo "<font color='black'> / $total_no <br></font>";?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td>education</td>
                                <td><?= $education ?></td>

                                <td><?=$total_education_yes?><?php echo "<font color='black'> / $total_yes <br></font>";?>
                                </td>
                                <td><?=$total_education_no?><?php echo "<font color='black'> / $total_no <br></font>";?>
                                </td>
                                
                                
                            </tr>
                            <tr>
                                <td>balance</td>
                                <td><?= $balance?></td>
                        
                             
                                <td><?=$total_balance_yes?><?php echo "<font color='black'> / $total_yes <br></font>";?>
                                </td>
                                <td><?=$total_balance_no?><?php echo "<font color='black'> / $total_no <br></font>";?>
                                </td>

                               
                            </tr>
                            <tr>
                                <td>loan</td>
                                <td><?= $loan?></td>

                                <td><?=$total_loan_yes?><?php echo "<font color='black'> / $total_yes <br></font>";?>
                                <td><?=$total_loan_no?><?php echo "<font color='black'> / $total_no <br></font>";?>
                                </td>

                                
                            </tr>
                            
                            <tr>
                                <td>month</td>
                                <td><?= $month ?></td>

                                
                                <td><?=$total_month_yes?><?php echo "<font color='black'> / $total_yes <br></font>";?>
                                </td>
                                <td><?=$total_month_no?><?php echo "<font color='black'> / $total_no <br></font>";?>
                                </td>

                                
                            </tr>
                            <tr>
                                <td>campaign</td>
                                <td><?= $campaign ?></td>

                                <td><?=$total_campaign_yes?><?php echo "<font color='black'> / $total_yes <br></font>";?>
                                </td>
                                <td><?=$total_campaign_no?><?php echo "<font color='black'> / $total_no <br></font>";?>
                                </td>

                                
                            </tr>
                            <tr>
                                <td>previous</td>
                                <td><?= $previous ?></td>
                                
                                <td><?=$total_previous_yes?><?php echo "<font color='black'> / $total_yes <br></font>";?>
                                </td>
                                <td><?=$total_previous_no?><?php echo "<font color='black'> / $total_no <br></font>";?>
                                </td>
                            </tr>
                    </table> 
                    <br>
                    <br>
                    <center><h4><b>Membandingkan Probabilitas Tiap Kelas</b></h4></font></center>
                    <table class="table datatable-responsive table-sm table-bordered" id="mytable">
                        <thead>
                            <tr>
                                <th>Variabel Y</th>
                                <th><center>Probabilitas Tiap Kelas</center></th>
                               

                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="background-color: aqua;">Yes</td>
                                <td><center><?= $yes?></center></td>
                                
                            </tr>
                            <tr>
                                <td style="background-color: aqua;">No</td>
                                <td><center><?= $no?></center></td>
                                
                            </tr><tr>
                                <td style="background-color: aqua;"><b>Prediksi</td>
                                <td style="background-color: aqua;"><center><?= $prediksi; ?></center></td>
                                
                            </tr>




                        </tbody>
                    </table>
                    <br>
                     
                </div>
                    <form action="<?php echo $action; ?>" method="post">
                        
                       
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