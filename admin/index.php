<?php
include "../model/pdo.php";
include "../model/loaiphong.php";
include "../model/phong.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/giophong.php";
include "header.php";
// controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'addlp':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                insert_loaiphong($tenloai);
                $thongbao = "Thêm mới thành công!";
            }

            include "loaiphong/add.php";
            break;
        case 'listlp':
            $listlp = loadall_loaiphong();
            include "loaiphong/list.php";
            break;
        case 'xoalp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_loaiphong($_GET['id']);
            }
            $listlp = loadall_loaiphong();
            include "loaiphong/list.php";
            break;
        case 'sualp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $lp = loadone_loaiphong($_GET['id']);
            }
            include "loaiphong/update.php";
            break;
        case 'updatelp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                update_loaiphong($id, $tenloai);
                $thongbao = "Cập nhật thành công!";
            }
            $listdm = loadall_loaiphong();
            include "loaiphong/list.php";
            break;
            // phong
        case 'addp':
            //kiem tra xem ng dung co click vao nut add k
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $maphong = $_POST['maphong'];
                $tenphong = $_POST['tenphong'];
                $gia = $_POST['gia'];
                $giasale = $_POST['giasale'];
                $mota = $_POST['mota'];
                $iddm = $_POST['iddm'];
                $tinhtrang = $_POST['tinhtrang'];
                $sokhach = $_POST['sokhach'];
                $img = $_FILES['img']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                insert_phong($maphong,$tenphong,$gia,$giasale,$sokhach,$img,$mota,$tinhtrang,$idlp);
                $thongbao = "Thêm mới thành công!";
            }
            $listlp = loadall_loaiphong();
            include "phong/add.php";
            break;
        case 'listp':
            if (isset($_POST['gui']) && ($_POST['gui'])) {
                $kyw = $_POST['kyw'];
                $idlp = $_POST['idlp'];
            } else {
                $kyw = '';
                $idlp = 0;
            }
            $listlp = loadall_loaiphong();
            $listsp = loadall_phong($kyw, $idlp);
            include "phong/list.php";
            break;
        case 'xoap':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_phong($_GET['id']);
            }
            $listp = loadall_phong("", 0);
            include "phong/list.php";
            break;
        case 'suap':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $phong = loadone_phong($_GET['id']);
            }
            $listlp = loadall_loaiphong();
            include "phong/update.php";
            break;
        case 'updatep':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $tensp = $_POST['tensp'];
                $price = $_POST['price'];
                $mota = $_POST['mota'];
                $idlp = $_POST['idlp'];
                $img = $_FILES['img']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                update_phong($maphong,$tenphong,$gia,$giasale,$sokhach,$img,$mota,$tinhtrang,$idlp);
                $thongbao = "Cập nhật thành công!";
            }

            $listlp = loadall_loaiphong();
            $listp = loadall_phong($kyw = "", $idlp = 0);
            include "phong/list.php";
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
            if (isset($_GET['iddonphong']) && ($_GET['iddonphong'] > 0)) {
                delete_donhang($_GET['iddonphong']);
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
        case 'chitietdonphong':
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
            include "../view/cart/chitietdonphong.php";
            break;
        default:
            include "home.php";
            break;
    }
}
include "home.php";

include "footer.php";
