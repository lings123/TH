<?php include "lib\header.php" ?>
	<div style="margin-left: 20%">
		<article id="box">
            <table class="w3-table-all w3-hoverable">
                  <?php echo "<h1>DANH SÁCH PHIẾU XUẤT</h1> <hr>" ?> 
                  <a style="padding-left: 70% " href="nhappx.php" ><b>Tạo phiếu nhập xuất<br></b></a>
                  <thead>
                        <br>
                        <tr>
                              <th>Mã phiếu xuất</th>
                              <th>Tên nhân viên</th>
                              <th>Tên cửa hàng</th>
                              <th>Địa chỉ</th>
                              <th>Số điện thoại</th>
                              <th>Ngày tạo phiếu</th>
                              <th>Ngày cập nhật phiếu</th>
                              <th>Xem chi tiết</th>
                              <th>Thao tác</th>
                        </tr>
                        <?php 
                        $sql="SELECT * FROM export ";
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
                                          <th><?php echo $value['id_ex'] ?></th>
                                          <th><?php echo $kq[0]['fullname'] ?></th>
                                          <th><?php echo $value['retailer_name'] ?></th>
                                          <th><?php echo $value['address_ex'] ?></th>
                                          <th><?php echo $value['phone_ex'] ?></th>
                                          <th><?php echo date_format(new DateTime($value['createdate']),'d-m-Y') ?></th>
                                          <th><?php echo date_format(new DateTime($value['updatedate']),'d-m-Y') ?></th>
                                          <th><a href="thongtinpx.php?id=<?php echo $value['id_ex'] ?>">Chi tiết phiếu xuất</a> </th>
                                          <th><a href="xoa.php?idex=<?php echo $value['id_ex'] ?>">Xóa</a> </th>
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

</body>
</html>