<?php include "lib/header.php" ?>
	<div style="margin-left: 20%">
		<article id="box">
            <table class="w3-table-all w3-hoverable">
                  <?php echo "<h1>DANH SÁCH PHIẾU NHẬP</h1> <hr>" ?> 
                  <a style="padding-left: 70% " href="Nhappn.php" ><b>Tạo phiếu nhập hàng<br></b></a>
                  <thead>
                        <br>
                        <tr>
                              <th>Mã phiếu nhập</th>
                              <th>Tên nhân viên</th>
                              <th>Tên nhà cung cấp</th>
                              <th>Địa chỉ</th>
                              <th>Số điện thoại</th>
                              <th>Ngày tạo phiếu</th>
                              <th>Ngày cập nhật phiếu</th>
                              <th>Xem chi tiết</th>
                              <th>Thao tác</th>
                        </tr>
                        <?php 
                        $sql="SELECT * FROM import ";
                        $query = $conn->query($sql);
                        $dis=$query->fetchAll();
                        foreach ($dis as $key => $value) {
                               $id=$value['user_id'];
                                    $query2="SELECT fullname from users where id='$id'";
                                    $stm2=$conn->prepare($query2);
                                    $stm2->execute();
                                    $stm2->setFetchMode(PDO::FETCH_ASSOC); 
                                    $kq=$stm2->fetchAll();
                              ?>
                                    <tr>
                                          <th><?php echo $value['id_im'] ?></th>
                                          <th><?php echo $kq[0]['fullname'] ?></th>
                                          <th><?php echo $value['distributor_name'] ?></th>
                                          <th><?php echo $value['address_im'] ?></th>
                                          <th><?php echo $value['phone_im'] ?></th>
                                          <th><?php echo date_format(new DateTime($value['createdate']),'d-m-Y') ?></th>
                                          <th><?php echo date_format(new DateTime($value['updatedate']),'d-m-Y') ?></th>
                                          <th><a href="thongtinpn.php?id=<?php echo $value['id_im'] ?>">Chi tiết phiếu nhập</a> </th>
                                          <th><a href="xoa.php?idim=<?php echo $value['id_im'] ?>">Xóa</a> </th>
                                    </tr>
                                    <?php
                              }     

                        ?>
                  </thead>
            </table>
            
      </article>
</div>
	</div>
	
	<?php include "lib/footer.php" ?>
</div>
</body>
</html>