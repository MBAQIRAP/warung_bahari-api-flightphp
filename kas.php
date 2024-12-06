<?php 
    class Kas{
        public static function get_kas(){
            $db = Flight::db();
            $dataClass=$db->query("SELECT * FROM tbl_kas")->fetchAll(PDO::FETCH_CLASS);
            try{
                if(!empty($dataClass)){
                    $data = [
                        "kas" => $dataClass,
                        "message" => "success"
                    ];
                    Flight::json($data);
                }else{
                    $data = [
                        "kas" => [],
                        "message" => "kosong"
                    ];
    
                    Flight::json($data);
                }
            }catch(Exception $e){
                Flight::json(['message' =>$e->getMessage()]);
            }
        }

        public static function insert_kas(){
            $tgl_kas=Flight::request()->data['tgl_kas'];
            $total_harga_kas=Flight::request()->data['total_harga_kas'];
            $db = Flight::db();
            $sql = "INSERT INTO tbl_kas(tgl_kas,total_harga_kas) 
                    VALUES (:tgl_kas,:total_harga_kas)";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":tgl_kas", $tgl_kas);
                $stmt->bindParam(":total_haraga_kas", $total_harga_kas);
                $result=$stmt->execute();
                if($result){
                    Flight::json(['message' => 'success']);
                }
            }catch(Exception $e){
                Flight::json(['message' =>$e->getMessage()]);
            }
        }

        public static function update_kas(){
            $id_kas=Flight::request()->data['kas'];
            $tgl_kas=Flight::request()->data['tgl_kas'];
            $total_harga_kas=Flight::request()->data['total_harga_kas'];
            $db = Flight::db();
            $sql = "UPDATE tbl_kas 
                    SET tgl_kas=:tgl_kas,total_harga_kas=:total_harga_kas 
                    WHERE id_kas = :id_kas";
            try{
                $stmt = $db->prepare($sql);        
                $stmt->bindParam(":tgl_kas", $tgl_kas);
                $stmt->bindParam(":total_harga_kas", $total_harga_kas);
                $stmt->bindParam(":id_kas",$id_kas);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    Flight::json(['message' => "berhasil update"]);
                }else{
                    Flight::json(['message' => "target data update tidak ditemukan"]);
                }
            }catch(Exception $e){
                Flight::json(['message' => $e->getMessage()]);
            }
        }

        public static function delete_kas(){
            $id_kas = Flight::request()->data['id_kas'];
            $db = Flight::db(); 
            $sql = "DELETE FROM tbl_kas
                    WHERE id_kas = :id_kas";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":id_kas", $id_kas);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    Flight::json(['message' => "berhasil delete"]);
                }else{
                    Flight::json(['message' =>'target data delete tidak ditemukan']);
                }
            }catch(Exception $e){
                Flight::json(['message' =>$e->getMessage()]);
            }
        }
    }