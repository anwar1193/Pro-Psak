<?php  

	// Script Excel (Tanpa Tambahan Library) Apapun
	header("Cache-Control: no-cache, must-revalidate");
	header("Pragma: no-cache");
	header("Content-type: application/x-msexcel");
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=data_fidding_accrue.xls");

	date_default_timezone_set("Asia/Jakarta");
    
    include 'koneksi.php';
    include 'fungsi.php';

    $status_penyusutan = $_POST['status_penyusutan'];

?>

<style>
	table,th,td{
		border-collapse: collapse;
		padding: 15px;
		margin: 10px;
		color: #000;
	}

	.str{ mso-number-format:\@; }
</style>

<div>
	<span style="margin-left: 20px; font-size: 20px"><b>Data Fidding Accrue <?php echo $status_penyusutan ?></b></span><br>
</div>

<table border="1">
    <thead>
    <tr>
        <th>NO</th>
        <th>No Pin</th>
        <th>No Rek</th>
        <th>Account Sts</th>
        <th>Cabang</th>
        <th>Account Name</th>
        <th>Restru Date</th>
        <th>Tenor Penyusutan</th>
        <th>Fincat</th>
        <th>Sts Generate</th>
        <th>Tanggal Upload</th>
        <th>Status Penyusutan</th>
    </tr>
    </thead>

    <tbody>
    <?php  
        $no=0;

        if($status_penyusutan == 'all'){
            $result = tampil_accrue();
        }elseif($status_penyusutan == 'amortize'){
            $query = "SELECT * FROM tbl_accrue WHERE status_generate='generated' AND paid_status=''";
            $result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
        }elseif($status_penyusutan == 'done'){
            $query = "SELECT * FROM tbl_accrue WHERE status_generate='generated' AND paid_status='Done'";
            $result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
        }
        
        while($row = mysqli_fetch_array($result)){
        $no++;
    ?>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $row['no_pin'] ?></td>
        <td style="mso-number-format:\@;"><?php echo $row['no_rek'] ?></td>
        <td><?php echo $row['account_sts'] ?></td>
        <td><?php echo $row['cabang'] ?></td>
        <td><?php echo $row['account_name'] ?></td>
        <td><?php echo date('d-m-Y', strtotime($row['restru_date'])) ?></td>
        <td style="text-align:center"><?php echo $row['sisa_tenor'] ?></td>
        <td><?php echo $row['fincat'] ?></td>
        <td><?php echo $row['status_generate'] ?></td>
        <td><?php echo date('d-m-Y',strtotime($row['tanggal_upload'])) ?></td>
        
        <?php if($row['paid_status'] == 'Done'){ ?>
        <td style="text-align:center"><?php echo $row['paid_status'] ?></td>
        <?php }else{ ?>
        <td style="text-align:center">Amortize</td>
        <?php } ?>
    </tr>
    <?php } ?>
    </tbody>
</table>