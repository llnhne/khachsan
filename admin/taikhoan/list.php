<div class="row">
    <div class="row mb headeradmin" style="width:148%;">
        <h1 style="padding: 15px 0;">ADMIN </h1>
    </div>
    <div class="row formtittle" style="width:148%;">
        <h3>DANH SÁCH TÀI KHOẢN</h3>
    </div>
    <div class="row formcontent" style="width:1050px;">
        <form action="" method="post">
            <div class="row mb10 formdshanghoa">
                <table>
                    <tr>
                        <th></th>
                        <th>MÃ TK</th>
                        <th>TÊN ĐĂNG NHẬP</th>
                        <th>MẬT KHẨU</th>
                        <th>EMAIL</th>
                        <th>ĐỊA CHỈ</th>
                        <th>ĐIỆN THOẠI</th>
                        <th>ROLE</th>
                        <th style="background-color: #FFCACA;"></th>
                    </tr>
                    <?php
                    foreach ($listtaikhoan as $taikhoan) {
                        extract($taikhoan);
                        $suatk = "index.php?act=suatk&id=" . $id_loaiphong;
                        $xoatk = "index.php?act=xoatk&id=" . $id_loaiphong;

                        echo '<tr>
                                        <td><input type="checkbox" name="name"></td>
                                        <td>' . $id_loaiphong . '</td>
                                        <td>' . $username . '</td>
                                        <td>' . $password . '</td>
                                        <td>' . $email . '</td>
                                        <td>' . $address . '</td>
                                        <td>' . $tel . '</td>
                                        <td>' . $role . '</td>
                                        <td><a href="' . $suatk . '"><input type="button" value="Sửa"></a>  <a onclick="return DELETE()" href="' . $xoatk . '"><input type="button" value="Xóa"></a></td>
                                    </tr>';
                    }
                    ?>
                </table>
            </div>
            <div class="row mb10">
                <input type="button" id="btn1" value="Chọn tất cả">
                <input type="button" id="btn2" value="Bỏ chọn tất cả">
                <input type="button" value="Xóa các mục đã chọn">
            </div>
        </form>
        <script>
            document.getElementById("btn1").onclick = function() {

                var checkboxes = document.getElementsByName('name');


                for (var i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = true;
                }
            }
            document.getElementById("btn2").onclick = function() {

                var checkboxes = document.getElementsByName('name');


                for (var i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = false;
                }
            }
        </script>
        <script>
            function DELETE() {
                return confirm("Bạn có chắc muốn xóa " + "?");
            }
        </script>
    </div>
</div>
</div>