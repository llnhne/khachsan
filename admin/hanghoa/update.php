<?php
if (is_array($sanpham)) {
    extract($sanpham);
    $prd_id = $id;
    // var_dump($prd_id);die;
}
$img = "../upload/" . $img;
if (is_file($img)) {
    $img = "<img src='" . $img . "' height='50px'>";
} else {
    $img = "No photo";
}
?>
<div class="row">
    <div class="row mb headeradmin" style="width:1050px;">
        <h1 style="padding: 15px 0;">ADMIN </h1>
    </div>
    <div class="row mb10 formtittle" style="width:1050px;">
        <h3>CẬP NHẬT SẢN PHẨM</h3>
    </div>
    <?php
    if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
    ?>
    <div class="row formcontent" style="width:1650px;">
        <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="row mb10 content1">
                    <div class="row mb10">
                        <label for="">MÃ LOẠI HÀNG</label><br>
                        <input type="text" placeholder="auto number" style="width:120%;" value="<?= $iddm ?>" name="iddm" disabled>
                    </div>
                    <div class="row mb10">
                        <label for="">TÊN HÀNG HÓA</label><br>
                        <input type="text" name="tensp" style="width:120%;" value="<?= $product_name ?>">
                    </div>
                </div>
                <div class="row mb10 content2">
                    <div class="row mb10">
                        <label for="">ĐƠN GIÁ</label><br>
                        <input type="text" name="price" style="width:120%;" value="<?= $price ?>">
                    </div>
                    <div class="row mb10">
                        <label for="">SỐ LƯỢT XEM</label><br>
                        <input type="text" placeholder="auto" name="luotxem" style="width:120%;" value="<?= $luotxem ?>" disabled>
                    </div>
                </div>
                <div class="row mb10 content3">
                    <div class="row mb10">
                        <label for="">LOẠI HÀNG</label><br>
                        <select name="iddm" id="">
                            <?php
                            foreach ($listdm as $danhmuc) {
                                extract($danhmuc);
                                if ($iddm == $id) $s = "selected";
                                else $s = "";
                                echo '<option value="' . $id . '" ' . $s . '>' . $name . '</option>';
                            }

                            ?>
                        </select>
                    </div>
                    <div class="row mb10">
                        <label for="">HÌNH ẢNH</label><br>
                        <input type="file" name="img" style="margin-bottom:5px;">
                        <?= $img ?>
                    </div>
                </div>
            </div>
            <div class="row mb10">
                <label for="">MÔ TẢ</label><br>
                <textarea name="mota" id="" cols="155%" rows="10" style="border:1px solid #FFCACA;"><?= $mota ?></textarea>
            </div>
            <div class="row mb10">
                <input type="hidden" value="<?= $prd_id ?>" name="id">
                <input type="submit" name="capnhat" value="CẬP NHẬT">
                <input type="reset" name="nhaplai" value="NHẬP LẠI">
                <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
            </div>
        </form>
    </div>
</div>
</div>