<?php 
    class User{
        public static function get_user(){
            $db = Flight::db();
            $dataClass=$db->query("SELECT * FROM tbl_user")->fetchAll(PDO::FETCH_CLASS);
            try{
                if(!empty($dataClass)){
                    $data = [
                        "user" => $dataClass,
                        "message" => "success"
                    ];
                    Flight::json($data);
                }else{
                    $data = [
                        "user" => [],
                        "message" => "kosong"
                    ];
    
                    Flight::json($data);
                }
            }catch(Exception $e){
                Flight::json(['message' => $e->getMessage()]);
            }
        }

        public static function insert_user(){
            $nama_user = Flight::request()->data['nama_user'];
            $password_user = Flight::request()->data['passoword_user'];
            $id_user_role = Flight::request()->data['id_user_role'];
            $db = Flight::db(); 
            $sql = "INSERT INTO tbl_user(nama_user,password_user,id_user_role) 
                    VALUES (:nama_user,:password_user,:id_user_role)";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":nama_user", $nama_user);
                $stmt->bindParam(":password_user", $password_user);
                $stmt->bindParam(":id_user_role", $id_user_role);
                $result=$stmt->execute();
                if($result){
                    Flight::json(['message' => 'success']);
                }
            }catch(Exception $e){
                Flight::json(['message' => $e->getMessage()]);
            }
        }

        public static function update_user(){
            $nama_user = Flight::request()->data['nama_user'];
            $password_user = Flight::request()->data['passoword_user'];
            $id_user_role = Flight::request()->data['id_user_role'];
            $id_user = Flight::request()->data['id_user'];
            $db = Flight::db(); 
            $sql = "UPDATE tbl_user 
                    SET nama_user = :nama_user, password_user = :password_user, id_user_role = :id_user_role
                    WHERE id_user = :id_user;";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":nama_user", $nama_user);
                $stmt->bindParam(":password_user", $password_user);
                $stmt->bindParam(":id_user_role", $id_user_role);
                $stmt->bindParam(":id_user", $id_user);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    Flight::json(['message' => "success"]);
                }else{
                    Flight::json(['message' =>'target data update tidak ditemukan']);
                }
            }catch(Exception $e){
                Flight::json(['message' => $e->getMessage()]);
            }
        }

        public static function delete_user(){
            $id_user = Flight::request()->data['user'];
            $db = Flight::db(); 
            $sql = "DELETE FROM tbl_user 
                    WHERE id_user = :id_user";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":id_userk", $id_user);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    Flight::json(['message' => "success"]);
                }else{
                    Flight::json(['message' =>'target data delete tidak ditemukan']);
                }
            }catch(Exception $e){
                Flight::json(['message' => $e->getMessage()]);
            }
        }
    }