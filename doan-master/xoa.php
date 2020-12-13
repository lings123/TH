<?php 
	include('lib\server.php');
	$ma=isset($_GET['idim'])?$_GET['idim']:'';
	$idex=isset($_GET['idex'])?$_GET['idex']:'';
	if($ma!=''){
	$query=$conn->query("SELECT * from importdetails where import_id='$ma'");
	$stmt=$query->fetchAll(PDO::FETCH_ASSOC);
	if(!empty($stmt)){
		echo '<script language="javascript">alert("Không được xóa!"); window.location="phieunhap.php";</script>';
	}
	$sql="DELETE from import where id_im='$ma'";
	$stm=$conn->query($sql);
	echo '<script language="javascript">alert("Xóa thành công!"); window.location="phieunhap.php";</script>';
}
if($idex!=''){
	$query=$conn->query("SELECT * from exportdetails where export_id='$idex'");
	$stmt=$query->fetchAll(PDO::FETCH_ASSOC);
	if(!empty($stmt)){
		echo '<script language="javascript">alert("Không được xóa!"); window.location="phieuxuat.php";</script>';
	}
	$sql="DELETE from export where id_ex='$idex'";
	$stm=$conn->query($sql);
	echo '<script language="javascript">alert("Xóa thành công!"); window.location="phieuxuat.php";</script>';
}
 ?>