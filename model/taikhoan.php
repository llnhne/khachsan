<?php
    function loadall_taikhoan(){
        $sql="select * from taikhoan order by id desc ";
        $listtaikhoan=pdo_query($sql);
        return $listtaikhoan;
    }
    function insert_taikhoan($user,$email,$password,$tel,$address){
        $sql="INSERT INTO taikhoan(user,email,password,tel,address) values('$user','$email','$password','$tel','$address')";
        pdo_execute($sql);
    }
    function checkuser($user,$password){
        $sql="select * from taikhoan where user='".$user."' and password='".$password."' ";
        $tk=pdo_query_one($sql);
        return $tk;
    }
    function delete_taikhoan($id){
        $sql="delete from taikhoan where id=".$id;
        pdo_execute($sql);
    }
    function loadone_taikhoan($id){
        $sql="select * from taikhoan where id=".$id;
        $tk=pdo_query_one($sql);
        return $tk;
    }
    function checkemail($email){
        $sql="select * from taikhoan where email='".$email."' ";
        $tk=pdo_query_one($sql);
        return $tk;
    }
    function update_taikhoan($id,$user,$password,$email,$address,$tel){
        $sql="UPDATE taikhoan
            SET user = '$user', password = $password,email = '$email',address = '$address',tel = $tel
            WHERE id=$id";
        pdo_execute($sql);
    }
?>