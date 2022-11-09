<?php
    function insert_loaihang($tenloai){
        $sql="INSERT INTO danhmuc(name) values('$tenloai')";
        pdo_execute($sql);
    }
    function delete_loaihang($id){
        $query="update sanpham set iddm = 40 where iddm=".$id;
        pdo_execute($query);
        $sql="delete from danhmuc where id=".$id;
        pdo_execute($sql);
    }
    function loadall_loaihang(){
        $sql="SELECT * FROM danhmuc order by id desc";
        $listdm=pdo_query($sql);
        return $listdm;
    }
    function loadone_loaihang($id){
        $sql="select * from danhmuc where id=".$id;
        $dm=pdo_query_one($sql);
        return $dm;
    }
    function update_loaihang($id,$tenloai){
        $sql="update danhmuc set name='".$tenloai."' where id=".$id;
        pdo_execute($sql);
    }
?>