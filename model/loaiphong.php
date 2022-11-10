<?php
    function insert_loaiphong($tenloai){
        $sql="INSERT INTO loaiphong(name_loaiphong) values('$tenloai')";
        pdo_execute($sql);
    }
    function delete_loaiphong($id){
        $query="update phong set id_loaiphong = 40 where id_loaiphong=".$id;
        pdo_execute($query);
        $sql="delete from loaiphong where id_loaiphong=".$id;
        pdo_execute($sql);
    }
    function loadall_loaiphong(){
        $sql="SELECT * FROM loaiphong order by id_loaiphong desc";
        $listdm=pdo_query($sql);
        return $listdm;
    }
    function loadone_loaiphong($id){
        $sql="select * from loaiphong where id_loaiphong =".$id;
        $dm=pdo_query_one($sql);
        return $dm;
    }
    function update_loaiphong($id,$tenloai){
        $sql="update loaiphong set name_loaiphong='".$tenloai."' where id_loaiphong =".$id;
        pdo_execute($sql);
    }
?>