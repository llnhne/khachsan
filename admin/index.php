<?php
include "../model/pdo.php";
include "../model/loaihang.php";
include "../model/hanghoa.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/giohang.php";
include "header.php";
// controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                insert_loaihang($tenloai);
                $thongbao = "Thêm mới thành công!";
            }

            include "loaihang/add.php";
            break;
        case 'listdm':
            $listdm = loadall_loaihang();
            include "loaihang/list.php";
            break;
        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_loaihang($_GET['id']);
            }
            $listdm = loadall_loaihang();
            include "loaihang/list.php";
            break;
        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loadone_loaihang($_GET['id']);
            }
            include "loaihang/update.php";
            break;
        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                update_loaihang($id, $tenloai);
                $thongbao = "Cập nhật thành công!";
            }
            $listdm = loadall_loaihang();
            include "loaihang/list.php";
            break;
            // hang hoa
        case 'addsp':
            //kiem tra xem ng dung co click vao nut add k
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tensp = $_POST['tensp'];
                $price = $_POST['price'];
                $mota = $_POST['mota'];
                $iddm = $_POST['iddm'];
                $filename = $_FILES['img']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                insert_hanghoa($tensp, $price, $filename, $mota, $iddm);
                $thongbao = "Thêm mới thành công!";
            }
            $listdm = loadall_loaihang();
            include "hanghoa/add.php";
            break;
        case 'listsp':
            if (isset($_POST['gui']) && ($_POST['gui'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            $listdm = loadall_loaihang();
            $listsp = loadall_hanghoa($kyw, $iddm);
            include "hanghoa/list.php";
            break;
        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_hanghoa($_GET['id']);
            }
            $listsp = loadall_hanghoa("", 0);
            include "hanghoa/list.php";
            break;
        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_hanghoa($_GET['id']);
            }
            $listdm = loadall_loaihang();
            include "hanghoa/update.php";
            break;
        case 'updatesp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $tensp = $_POST['tensp'];
                $price = $_POST['price'];
                $mota = $_POST['mota'];
                $iddm = $_POST['iddm'];
                $img = $_FILES['img']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                update_hanghoa($id, $tensp, $price, $img, $mota, $iddm);
                $thongbao = "Cập nhật thành công!";
            }

            $listdm = loadall_loaihang();
            $listsp = loadall_hanghoa($kyw = "", $iddm = 0);
            include "hanghoa/list.php";
            break;
        case 'dskh':
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case 'xoatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_taikhoan($_GET['id']);
            }
            $listtaikhoan = loadall_taikhoan("", 0);
            include "taikhoan/list.php";
            break;
        case 'suatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $tk = loadone_taikhoan($_GET['id']);
            }
            include "taikhoan/update.php";
            break;
        case 'updatetk':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $user = $_POST['user'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];

                update_taikhoan($id, $user, $password, $email, $address, $tel);
                $thongbao = "Cập nhật thành công!";
            }
            $listtaikhoan = loadall_taikhoan("", 0);
            include "taikhoan/list.php";
            break;
        case 'dsbl':
            $listbl = loadall_binhluan(0);
            include "../view/binhluan/list.php";
            break;
        case 'xoabl':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_binhluan($_GET['id']);
            }
            $listbl = loadall_binhluan("", 0);
            include "../view/binhluan/list.php";
            break;
        case 'suabl':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $bl = loadone_binhluan($_GET['id']);
            }
            include "../view/binhluan/update.php";
            break;
        case 'updatebl':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $noidung = $_POST['noidung'];
                $id = $_POST['id'];
                update_binhluan($id, $noidung);
                $thongbao = "Cập nhật thành công!";
            }
            $listbl = loadall_binhluan("", 0);
            include "../view/binhluan/list.php";
            break;
        case 'dsdh':
            $date=date("Y-m-d h:i:sa");
            if(isset($date)){
                $date='Phòng còn trống';
            }else{
                $date='phòng đã hết';  
            }
            $listdh = loadall_donhang();
            include "../view/cart/list.php";
            break;
        case 'xoadh':
            if (isset($_GET['iddonhang']) && ($_GET['iddonhang'] > 0)) {
                delete_donhang($_GET['iddonhang']);
            }
            $listdh = loadall_donhang("", 0);
            include "../view/cart/list.php";
            break;
        case 'thongke':
            $listthongke = loadall_thongke();
            include "thongke/list.php";
            break;
        case 'bieudo':
            $listthongke = loadall_thongke();
            include "thongke/bieudo.php";
            break;
        case 'chitietdonhang':
            // if(isset($_POST['xemct'])&&($_POST['xemct'])){
            //     $id=$_POST['id'];
            //     $product_name=$_POST['product_name'];
            //     $price=$_POST['price'];
            //     $img=$_POST['img'];
            //     $soluong=1;
            //     $thanhtien=$soluong * $price;
            //     $spadd=[$id,$product_name,$img,$price,$soluong,$thanhtien];
            //     array_push($_SESSION['mycart'],$spadd);
                
            // }
            include "../view/cart/chitietdonhang.php";
            break;
        default:
            include "home.php";
            break;
    }
}
include "home.php";

include "footer.php";
