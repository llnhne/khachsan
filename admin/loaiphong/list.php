<div class="row">
    <div class="row mb headeradmin" style="width:1050px;">
        <h1 style="padding: 15px 0;">ADMIN </h1>
    </div>
    <div class="row formtittle" style="width:1050px;">
        <h3>DANH SÁCH LOẠI HÀNG </h3>
    </div>
    <div class="row formcontent" style="width:1500px;">
        <form action="index.php?act=listdm" method="post">
            <div class="row mb10 formdsloaihang">
                <table>
                    <tr>
                        <th></th>
                        <th>MÃ LOẠI</th>
                        <th>TÊN LOẠI</th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($listlp as $danhmuc) {
                        extract($danhmuc);
                        $suadm = "index.php?act=sualp&id=" . $id_loaiphong;
                        $xoadm = "index.php?act=xoalp&id=" . $id_loaiphong;
                        echo '<tr>
                                        <td><input type="checkbox" name="name"></td>
                                        <td>' . $id_loaiphong . '</td>
                                        <td>' . $name_loaiphong . '</td>
                                        <td><a href="' . $suadm . '"><input type="button" value="Sửa"></a>  <a onclick="return DELETE()" href="' . $xoadm . '"><input type="button" value="Xóa" name="delete"></a></td>
                                    </tr>';
                    }
                    ?>
                </table>
            </div>
            <div class="row mb10">
                <input type="button" id="btn1" value="Chọn tất cả">
                <input type="button" id="btn2" value="Bỏ chọn tất cả">
                <input type="button" value="Xóa các mục đã chọn">
                <a href="index.php?act=addlp"><input type="button" value="Nhập thêm"></a>
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
            function DELETE(name) {
                return confirm("Bạn có chắc muốn xóa " + "?");
            }
        </script>
    </div>
</div>
</div>