<?php 
    class Pemasukan{
        public static function get_pemasukan(){
            $db = Flight::db();
            $dataClass=$db->query("SELECT * FROM tbl_pemasukan")->fetchAll(PDO::FETCH_CLASS);
            try{
                if(!empty($dataClass)){
                    $data = [
                        "pemasukan" => $dataClass,
                        "message" => "success"
                    ];
                    Flight::json($data);
                }else{
                    $data = [
                        "pemasukan" => [],
                        "message" => "kosong"
                    ];
    
                    Flight::json($data);
                }
            }catch(Exception $e){
                Flight::json(['message' =>$e->getMessage()]);
            }
        }

        public static function insert_pemasukan(){
            $total_pemasukan=Flight::request()->data['total_pemasukan'];
            $tgl_pemasukan=Flight::request()->data['tgl_pemasukan'];
            $id_kategori_pemasukan=Flight::request()->data['id_kategori_pemasukan'];
            $db = Flight::db(); 
            $sql = "INSERT INTO tbl_pemasukan(total_pemasukan,tgl_pemasukan,id_kategori_pemasukan) 
                    VALUES (:total_pemasukan,:tgl_pemasukan,:id_kategori_pemasukan)";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":total_pemasukan", $total_pemasukan);
                $stmt->bindParam(":tgl_pemasukan", $tgl_pemasukan);
                $stmt->bindParam(":id_kategori_pemasukan", $id_kategori_pemasukan);
                $result=$stmt->execute();
                if($result){
                    Flight::json(['message' => 'success']);
                }
            }catch(Exception $e){
                Flight::json(['message' =>$e->getMessage()]);
            }

        }

        public static function update_pemasukan(){
            $total_pemasukan=Flight::request()->data['total_pemasukan'];
            $tgl_pemasukan=Flight::request()->data['tgl_pemasukan'];
            $id_kategori_pemasukan=Flight::request()->data['id_kategori_pemasukan'];
            $id_pemasukan = Flight::request()->data['id_pemasukan'];
            $db = Flight::db(); 
            $sql = "UPDATE tbl_pemasukan
                    SET total_pemasukan = :total_pemasukan, tgl_pemasukan = :tgl_pemasukan, id_kategori_pemasukan = :id_kategori_pemasukan 
                    WHERE id_pemasukan = :id_pemasukan";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":total_pemasukan", $total_pemasukan);
                $stmt->bindParam(":tgl_pemasukan", $tgl_pemasukan);
                $stmt->bindParam(":id_kategori_pemasukan", $id_kategori_pemasukan);
                $stmt->bindParam(":id_pemasukan", $id_pemasukan);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    Flight::json(['message' => "success"]);
                }else{
                    Flight::json(['message' =>'target data update tidak ditemukan']);
                }
            }catch(Exception $e){
                Flight::json(['message' =>$e->getMessage()]);
            }
        }

        public static function delete_pemasukan(){
            $id_pemasukan = Flight::request()->data['id_pemasukan'];
            $db = Flight::db(); 
            $sql = "DELETE FROM tbl_pemasukan 
                    WHERE id_pemasukan = :id_pemasukan";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":id_pemasukan", $id_pemasukan);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    Flight::json(['message' => "success"]);
                }else{
                    Flight::json(['message' =>'target data delete tidak ditemukan']);
                }
            }catch(Exception $e){
                Flight::json(['message' =>$e->getMessage()]);
            }
        }
    }