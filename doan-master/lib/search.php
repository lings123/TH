<table class="w3-table-all w3-hoverable">
					<thead>
<?php
					$tk=addslashes(isset($_GET['tt'])?$_GET['tt']:'');
					$bd=getIndex('bd');
					$kt=getIndex('kt');

					echo $bd.$kt;
					// exit;
					echo "<h1>KẾT QUẢ TÌM KIẾM </h1> <hr>";
					

						if($bd!=''&& $kt==''){
						$query1 = "SELECT * FROM import where createdate > '$bd'";
						$query2 = "SELECT * FROM export where createdate > '$bd'";
						}
						if($kt!=''&& $bd==''){
							$query1 = "SELECT * FROM import where createdate < '$kt'";
							$query2 = "SELECT * FROM export where createdate < '$kt'";
						}
						if($kt!=''&& $bd!=''){
							$query1 = "SELECT * FROM import where createdate < '$kt' and createdate > '$bd'";
							$query2 = "SELECT * FROM export where createdate < '$kt' and createdate > '$bd'";
						}
						if($kt==''&& $bd=='' && $tk==''){
							$query1 = "SELECT * FROM import";
							$query2 = "SELECT * FROM export";
						}
						if($kt=='' && $bd=='' && $tk!=''){
							$query1 = "SELECT * FROM import  WHERE user_id like '%$tk%' or id_im like '%$tk%' or user_id like '%$tk%' or distributor_name like '%$tk%'";
					 		$query2="SELECT * FROM export WHERE user_id like '%$tk%' or id_ex like '%$tk%' or retailer_id like '%$tk%' or retailer_name like '%$tk%'";
						}
						if($kt==''&& $bd!='' && $tk!=''){
							$query1 = "SELECT * FROM import  WHERE (user_id like '%$tk%' or id_im like '%$tk%' or user_id like '%$tk%' or distributor_name like '%$tk%') and createdate > '$bd'";
					 		$query2="SELECT * FROM export WHERE (user_id like '%$tk%' or id_ex like '%$tk%' or retailer_id like '%$tk%' or retailer_name like '%$tk%')and createdate > '$bd'";
						}
						if($kt!=''&& $bd=='' && $tk!=''){
							$query1 = "SELECT * FROM import  WHERE (user_id like '%$tk%' or id_im like '%$tk%' or user_id like '%$tk%' or distributor_name like '%$tk%') and createdate < '$kt'";
					 		$query2="SELECT * FROM export WHERE (user_id like '%$tk%' or id_ex like '%$tk%' or retailer_id like '%$tk%' or retailer_name like '%$tk%') and createdate < '$kt'";
						}
						if($kt!=''&& $bd!='' && $tk!=''){
							$query1 = "SELECT * FROM import  WHERE (user_id like '%$tk%' or id_im like '%$tk%' or user_id like '%$tk%' or distributor_name like '%$tk%') and createdate < '$kt' and createdate > '$bd'";
					 		$query2="SELECT * FROM export WHERE (user_id like '%$tk%' or id_ex like '%$tk%' or retailer_id like '%$tk%' or retailer_name like '%$tk%') and createdate < '$kt' and createdate > '$bd'";
						}
						?>
					 	<tr>
							<th>Mã phiếu </th>
							<th>Tên nhân viên</th>
							<th>Tên nhà cung cấp</th>
							<th>Ngày tạo phiếu</th>
							<th>Ngày cập nhật phiếu</th>
							<th>Thông tin chi tiết</th>
							
						</tr>
						<?php
						$stm=$conn->prepare($query1);
						$stm->execute();
					   $rows=$stm->fetchAll(PDO::FETCH_ASSOC);
					   foreach ($rows as $key => $value) {
						$id=$value['user_id'];
						$query="SELECT fullname from users where id='$id'";
						$stm2=$conn->prepare($query);
						$stm2->execute();
						$stm2->setFetchMode(PDO::FETCH_ASSOC); 
						$kq=$stm2->fetchAll();
						?>
						<tr>
							
							<th><?php echo $value['id_im'] ?></th>

							<th><?php echo $kq[0]['fullname']?> </th>
							
							<th><?php echo $value['distributor_name'] ?></th>
							
							<th><?php echo date_format(new DateTime($value['createdate']),'d-m-Y') ?></th>
							<th><?php echo date_format(new DateTime($value['updatedate']),'d-m-Y') ?></th>
					   	<th><a href="thongtinpn.php?id=<?php echo $value['id_im'] ?>">Chi tiết phiếu nhập</a> </th>
						</tr>
					   
							
							
						
						<?php
					  }
 					$stmt=$conn->prepare($query2);
						$stmt->execute();
					   $row=$stmt->fetchAll(PDO::FETCH_ASSOC);
					   foreach ($row as $key => $value) {
						$id=$value['user_id'];
						$query="SELECT fullname from users where id='$id'";
						$stm2=$conn->prepare($query);
						$stm2->execute();
						$stm2->setFetchMode(PDO::FETCH_ASSOC); 
						$kq=$stm2->fetchAll();
						?>
							<tr>
							<th><?php echo $value['id_ex'] ?></th>
							<th><?php echo $kq[0]['fullname']?> </th>
							<th><?php echo $value['retailer_name'] ?></th>
							<th><?php echo date_format(new DateTime($value['createdate']),'d-m-Y') ?></th>
							<th><?php echo date_format(new DateTime($value['updatedate']),'d-m-Y') ?></th>
							<th><a href="thongtin.php?<?php echo $value['id_ex'] ?>">Chi tiết phiếu xuất</a> </th>
						</tr>
					   
							
							
						
						<?php
					  }

					   			
					 
				// 	   				
				
					
		