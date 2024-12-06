<?php
    class User_role{
        #done
        public static function get_user_role(){
            $db = Flight::db();
            $dataClass=$db->query("SELECT * FROM tbl_user_role")->fetchAll(PDO::FETCH_CLASS);
            try{
                if(!empty($dataClass)){
                #(message top array) $dataAssoc = array('message' => 'berhasil') + $dataAssoc;
                    $data = [
                        "user_role" => $dataClass,
                        "message" => "success"
                    ];
                    Flight::json($data);
                }else{
                    $data = [
                        "user_role" => [],
                        "message" => "kosong"
                    ];
    
                    Flight::json($data);
                }
            }catch(Exception $e){
                Flight::json(['message' => $e->getMessage()]);
            }
        }
        #done
        public static function insert_user_role(){
            $nama_role = Flight::request()->data['nama_role'];
            $db = Flight::db(); 
            $sql = "INSERT INTO tbl_user_role(nama_role) 
                    VALUES (:nama_role)";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":nama_role", $nama_role);
                $result=$stmt->execute();
                if($result){
                    Flight::json(['message' => 'success']);
                }
            }catch(Exception $e){
                Flight::json(['message' => $e->getMessage()]);
            }
        }
        #done
        public static function update_user_role(){
            $nama_role = Flight::request()->data['nama_role'];
            $id_user_role = Flight::request()->data['id_user_role'];
            $db = Flight::db(); 
            $sql = "UPDATE tbl_user_role 
                    SET nama_role = :nama_role 
                    WHERE id_user_role = :id_user_role";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":nama_role", $nama_role);
                $stmt->bindParam(":id_user_role", $id_user_role);
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
        #done
        public static function delete_user_role(){
            $id_user_role = Flight::request()->data['id_user_role'];
            $db = Flight::db(); 
            $sql = "DELETE FROM tbl_user_role 
                    WHERE id_user_role = :id_user_role";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":id_user_role", $id_user_role);
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
