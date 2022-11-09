<?php
if (is_array($phong)) {
    extract($phong);
    $prd_id = $id_phong;
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
        <h3>CẬP NHẬT PHÒNG</h3>
    </div>
    <?php
    if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
    ?>
    <div class="row formcontent" style="width:1650px;">
        <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="row mb10 content1">
                    <div class="row mb10">
                        <label for="">MÃ PHÒNG</label><br>
                        <input type="maphong" placeholder="auto number" style="width:120%;" value="<?= $id_phong ?>" name="iddm" disabled>
                    </div>
                    <div class="row mb10">
                        <label for="">TÊN PHÒNG</label><br>
                        <input type="tenphong" name="tenphong" style="width:120%;" value="<?= $name_phong ?>">
                    </div>
                </div>
                <div class="row mb10 content2">
                    <div class="row mb10">
                        <label for="">ĐƠN GIÁ</label><br>
                        <input type="gia" name="gia" style="width:120%;" value="<?= $price ?>">
                    </div>
                    <div class="row mb10">
                        <label for="">GIÁ SALE</label><br>
                        <input type="giasale" placeholder="auto" name="giasale" style="width:120%;" value="<?= $price_sale ?>" disabled>
                    </div>
                </div>
                <div class="row mb10 content3">
                    <div class="row mb10">
                        <label for="">LOẠI PHÒNG</label><br>
                        <select name="idlp" id="">
                            <?php
                            foreach ($listlp as $loaiphong) {
                                extract($loaiphong);
                                if ($idlp == $id) $s = "selected";
                                else $s = "";
                                echo '<option value="' . $id_loaiphong . '" ' . $s . '>' . $name_loaiphong . '</option>';
                            }

                            ?>
                        </select>
                    </div>
                    <div class="row mb10">
                        <label for="">HÌNH ẢNH</label><br>
                        <input type="file" name="img" style="margin-bottom:5px;">
                        <?= $img ?>
                    </div>
                    <div class="row mb10">
                        <label for="">TÌNH TRẠNG</label><br>
                        <input type="text" name="tinhtrang" style="width:120%;" disabled>
                    </div>
                    <div class="row mb10">
                        <label for="">SỐ KHÁCH</label><br>
                        <input type="text" name="sokhach" style="width:120%;" disabled>
                    </div>
                    <input type="hidden" placeholder="auto" name="idloaiphong" style="width:120%;" disabled>
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
                <a href="index.php?act=listp"><input type="button" value="DANH SÁCH"></a>
            </div>
        </form>
    </div>
</div>
</div>