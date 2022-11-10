<?php
if (is_array($lp)) {
    extract($lp);
}
?>

<div class="row">
    <div class="row mb headeradmin" style="width:1050px;">
        <h1 style="padding: 15px 0;">ADMIN </h1>
    </div>
    <div class="row mb10 formtittle" style="width:1050px;">
        <h3>CẬP NHẬT LOẠI HÀNG</h3>
    </div>
    <?php
    if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
    ?>
    <div class="row formcontent" style="width:1500px;">
        <form action="index.php?act=updatelp" method="post">
            <div class="row mb10">
                <label for="">Mã loại</label><br>
                <input type="text" placeholder="auto number" name="maloai" disabled>
            </div>
            <div class="row mb10">
                <label for="">Tên loại</label><br>
                <input type="text" name="tenloai" value="<?php if (isset($name_loaiphong) && ($name_loaiphong != "")) echo $name_loaiphong; ?>">
            </div>
            <div class="row mb10">
                <input type="hidden" name="id" value="<?php if (isset($id_loaiphong) && ($id_loaiphong > 0)) echo $id_loaiphong; ?>">
                <input type="submit" name="capnhat" value="CẬP NHẬT">
                <input type="reset" name="nhaplai" value="NHẬP LẠI">
                <a href="index.php?act=listdm"><input type="button" value="DANH SÁCH"></a>
            </div>
        </form>
    </div>
</div>
</div>