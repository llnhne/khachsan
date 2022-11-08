<div class="row">
    <div class="row mb headeradmin" style="width:1050px;">
        <h1 style="padding: 15px 0;">ADMIN </h1>
    </div>
    <div class="row formtittle" style="width:1050px;">
        <h3>QUẢN LÝ HÀNG HÓA</h3>
    </div>

    <div class="row formcontent">
        <form action="index.php?act=listsp" method="post">
            <input type="text" name="kyw" placeholder="Tìm kiếm sản phẩm" style="width:50%;">
            <select name="iddm" style="padding:10px;width:30%;margin-bottom:20px;border-radius:5px;border: 1px solid #FFCACA;color:#372948;">
                <option value="0" selected>Tất cả</option>
                <?php
                foreach ($listdm as $danhmuc) {
                    extract($danhmuc);
                    echo '<option value="' . $id . '">' . $name . '</option>';
                }
                ?>
            </select>
            <input type="submit" name="gui" value="Tìm Kiếm" style="padding:10px;">
            <div class="row mb10 formdshanghoa" style="width:1050px;">
                <table>
                    <tr>
                        <th></th>
                        <th>MÃ LOẠI</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>ẢNH</th>
                        <th>ĐƠN GIÁ</th>
                        <th>LƯỢT XEM</th>
                        <th>MÔ TẢ</th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($listsp as $sanpham) {
                        extract($sanpham);
                        $suasp = "index.php?act=suasp&id=" . $id;
                        $xoasp = "index.php?act=xoasp&id=" . $id;
                        $img = "../upload/" . $img;
                        if (is_file($img)) {
                            $img = "<img src='" . $img . "' height='80px'>";
                        } else {
                            $img = "No photo";
                        }
                        echo '<tr>
                                        <td><input type="checkbox" name="name"></td>
                                        <td>' . $iddm . '</td>
                                        <td>' . $product_name . '</td>
                                        <td>' . $img . '</td>
                                        <td>' . $price . '</td>
                                        <td>' . $luotxem . '</td>
                                        <td>' . $mota . '</td>
                                        <td><a href="' . $suasp . '"><input type="button" value="Sửa"></a>  <a onclick="return DELETE()" href="' . $xoasp . '"><input type="button" value="Xóa"></a></td>
                                    </tr>';
                    }
                    ?>
                </table>
            </div>
            <div class="row mb10" style="display:flex;">
                <input type="button" id="btn1" value="Chọn tất cả">
                <input type="button" id="btn2" value="Bỏ chọn tất cả" style="margin-left:10px;">
                <input type="button" value="Xóa các mục đã chọn" style="margin-left:10px;">
                <a href="index.php?act=addsp"><input type="button" value="Nhập thêm" style="margin-left:10px;"></a>
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