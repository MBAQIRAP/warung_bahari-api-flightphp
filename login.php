<?php
    class Login{
        #done
        public static function login(){
            $db = Flight::db(); 
            $nama= Flight::request()->data['nama'];
            $password = Flight::request()->data['password'];
            $sql="SELECT id_user, nama_user, password_user, nama_role
                  FROM tbl_user 
                  INNER JOIN tbl_user_role 
                  ON tbl_user.id_user_role = tbl_user_role.id_user_role 
                  WHERE tbl_user.nama_user = :nama_user AND tbl_user.password_user = :password_user;";
            try{
                $stmt=$db->prepare($sql);
                $stmt->bindParam(":nama_user",$nama);
                $stmt->bindParam(":password_user",$password);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    $dataClass = $stmt->fetchAll(PDO::FETCH_CLASS);
                    $data=[
                        "user" => $dataClass,
                        "message" => "success"
                    ];
                    Flight::json($data);
                }else{
                    Flight::json(['message' =>'username dan password tidak ditemukan']);
                }     
            }catch(Exception $e){
                Flight::json(['message' => $e->getMessage()]);
            }
        }
    }
