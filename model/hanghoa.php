<?php
    function insert_hanghoa($tensp,$price,$img,$mota,$iddm){
        $sql="INSERT INTO sanpham(product_name,price,img,mota,iddm) values('$tensp','$price','$img','$mota','$iddm')";
        pdo_execute($sql);
    }
    function delete_hanghoa($id){
        $sql="delete from sanpham where id=".$id;
        pdo_execute($sql);
    }
    function loadall_hanghoa_home(){
        $sql="SELECT * FROM sanpham where 1 order by id desc limit 0,9";
        $listsp=pdo_query($sql);
        return $listsp;
    }
    function loadall_hanghoa_top10(){
        $sql="SELECT * FROM sanpham where 1 order by luotxem desc limit 0,10";
        $listsp=pdo_query($sql);
        return $listsp;
    }
    function loadall_hanghoa($kyw="",$iddm=0){
        $sql="SELECT * FROM sanpham where 1";
        if($kyw!=""){
            $sql.=" and product_name like '%".$kyw."%'";
        }
        if($iddm>0){
            $sql.=" and iddm like '".$iddm."'";
        }
        $sql.=" order by id desc";
        $listsp=pdo_query($sql);
        return $listsp;
    }
    function loadone_hanghoa($id){
        $sql="select * from sanpham where id=".$id;
        $sp=pdo_query_one($sql);
        return $sp;
    }
    function load_sanpham_cungloai($id,$iddm){
        $sql="select * from sanpham where iddm=".$iddm." AND id <> ".$id;
        $listsp=pdo_query($sql);
        return $listsp;
    }
    function load_tendm($iddm){
        if($iddm>0){
            $sql="select * from danhmuc where id=".$iddm;
            $dm=pdo_query_one($sql);
            extract($dm);
            return $name;
        }else{
            return "";
        }
        
    }
    function update_hanghoa($id,$tensp,$price,$img,$mota,$iddm){
        if($img!=""){
            $sql="UPDATE sanpham
            SET product_name = '$tensp', price = $price, img = '$img', mota = '$mota',luotxem = '' , iddm = $iddm
            WHERE id = $id ";
        }else{
            $sql="UPDATE sanpham
            SET product_name = '$tensp', price = $price, mota = '$mota',luotxem = '' , iddm = $iddm
            WHERE id=$id";
        }
        pdo_execute($sql);
    }
?>