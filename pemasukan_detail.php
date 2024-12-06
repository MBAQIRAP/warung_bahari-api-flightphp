<?php 
    class Pemasukan_detail{
        public static function get_pemasukan_detail(){
            $db = Flight::db();
            $dataClass=$db->query("SELECT * FROM tbl_pemasukan_detail")->fetchAll(PDO::FETCH_CLASS);
            try{
                if(!empty($dataClass)){
                    $data = [
                        "pemasukan_detail" => $dataClass,
                        "message" => "success"
                    ];
                    Flight::json($data);
                }else{
                    $data = [
                        "pemasukan_detail" => [],
                        "message" => "kosong"
                    ];
    
                    Flight::json($data);
                }
            }catch(Exception $e){
                Flight::json(['message' =>$e->getMessage()]);
            }
        }
        #done
        public static function insert_pemasukan_detail(){
            $id_produk = Flight::request()->data['id_produk'];
            $jml_produk = Flight::request()->data['jml_produk'];
            $id_pemasukan = Flight::request()->data['id_pemasukan'];
            $db = Flight::db(); 
            $sql = "INSERT INTO tbl_pemasukan_detail(id_produk,jml_produk,id_pemasukan) 
                    VALUES (:id_produk,:jml_produk,:id_pemasukan)";
            try{
                $stmt = $db->prepare($sql);
                for($key = 0, $size = count($id_produk); $key < $size; $key++) {
                    $stmt->bindParam(":id_produk", $id_produk[$key]);
                    $stmt->bindParam(":jml_produk", $jml_produk[$key]);
                    $stmt->bindParam(":id_pemasukan", $id_pemasukan[$key]);
                    $result=$stmt->execute();
                    if($result){
                        Flight::json(['message' => 'success']);
                    }
                }
            }catch(Exception $e){
                Flight::json(['message' =>$e->getMessage()]);
            }
        }

        public static function update_pemasukan_detail(){
            $id_pemasukan_detail = Flight::request()->data['pemasukan_detail'];
            $id_produk = Flight::request()->data['id_produk'];
            $jml_produk = Flight::request()->data['jml_produk'];
            $id_pemasukan = Flight::request()->data['id_pemasukan'];
            $db = Flight::db(); 
            $sql = "UPDATE tbl_pemasukan_detail
                    SET id_produk=:id_produk, jml_produk=:jml_produk, id_pemasukan=:id_pemasukan
                    WHERE id_pemasukan_detail = :id_pemasukan_detail";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":id_produk", $id_produk);
                $stmt->bindParam(":jml_produk", $jml_produk);
                $stmt->bindParam(":id_pemasukan", $id_pemasukan);
                $stmt->bindParam(":id_pemasukan_detail", $id_pemasukan_detail);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    Flight::json(['message' => 'success']);
                }else{
                    Flight::json(['message' =>'target data update tidak ditemukan']);
                }
            }catch(Exception $e){
                Flight::json(['message' =>$e->getMessage()]);
            }
        }

        public static function delete_pemasukan_detail(){
            $id_pemasukan_detail = Flight::request()->data['id_pemasukan_detail'];
            $db = Flight::db(); 
            $sql = "DELETE FROM tbl_pemasukan_detail 
                    WHERE id_pemasukan_detail = :id_pemasukan_detail";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":id_pemasukan_detail", $id_pemasukan_detail);
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