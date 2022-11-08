<div class="row">
    <div class="row mb headeradmin" style="width:1050px;">
        <h1 style="padding: 15px 0;">ADMIN </h1>
    </div>
    <div class="row mb10 formtittle" style="width:1050px;">
        <h3>THÊM MỚI SẢN PHẨM</h3>
    </div>
    <?php
    if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
    ?>
    <div class="row formcontent" style="width:1650px;">
        <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="row mb10 content1">
                    <div class="row mb10">
                        <label for="">MÃ HÀNG HÓA</label><br>
                        <input type="text" placeholder="auto number" style="width:120%;" disabled>
                    </div>
                    <div class="row mb10">
                        <label for="">TÊN HÀNG HÓA</label><br>
                        <input type="text" name="tensp" style="width:120%;">
                    </div>
                </div>
                <div class="row mb10 content2">
                    <div class="row mb10">
                        <label for="">ĐƠN GIÁ</label><br>
                        <input type="text" name="price" style="width:120%;">
                    </div>
                    <div class="row mb10">
                        <label for="">SỐ LƯỢT XEM</label><br>
                        <input type="text" placeholder="auto" name="luotxem" style="width:120%;" disabled>
                    </div>
                </div>
                <div class="row mb10 content3">
                    <div class="row mb10">
                        <label for="">LOẠI HÀNG</label><br>
                        <select name="iddm" id="" style="border:1px solid #FFCACA;">
                            <?php
                            foreach ($listdm as $danhmuc) {
                                extract($danhmuc);
                                echo '<option value="' . $id . '">' . $name . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="row mb10">
                        <label for="">HÌNH ẢNH</label><br>
                        <input type="file" name="img">
                    </div>

                </div>
            </div>
            <div class="row mb10">
                <label for="">MÔ TẢ</label><br>
                <textarea name="mota" id="" cols="155%" rows="10" style="border:1px solid #FFCACA;"></textarea>
            </div>
            <div class="row mb10">
                <input type="submit" name="themmoi" value="THÊM MỚI">
                <input type="reset" name="nhaplai" value="NHẬP LẠI">
                <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
            </div>
        </form>
    </div>
</div>
</div>