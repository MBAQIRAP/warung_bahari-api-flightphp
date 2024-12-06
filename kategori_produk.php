<?php
    class Kategori_produk{
        #done
        public static function get_kategori_produk(){
            $db = Flight::db();
            $dataClass=$db->query("SELECT * FROM tbl_kategori_produk")->fetchAll(PDO::FETCH_CLASS);
            try{
                if(!empty($dataClass)){
                    $data = [
                        "kategori_produk" => $dataClass,
                        "message" => "success"
                    ];
                    Flight::json($data);
                }else{
                    $data = [
                        "kategori_produk" => [],
                        "message" => "kosong"
                    ];
    
                    Flight::json($data);
                }
            }catch(Exception $e){
                Flight::json(['message' =>$e->getMessage()]);
            }
        }
        #done
        public static function insert_kategori_produk(){
            $nama_kategori_produk = Flight::request()->data['nama_kategori_produk'];
            $db = Flight::db(); 
            $sql = "INSERT INTO tbl_kategori_produk(nama_kategori_produk) 
                    VALUES (:nama_kategori_produk)";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":nama_kategori_produk", $nama_kategori_produk);
                $result=$stmt->execute();
                if($result){
                    Flight::json(['message' => 'success']);
                }
            }catch(Exception $e){
                Flight::json(['message' =>$e->getMessage()]);
            }
        }
        #done
        public static function update_kategori_produk(){
            $nama_kategori_produk = Flight::request()->data['nama_kategori_produk'];
            $id_kategori_produk = Flight::request()->data['id_kategori_produk'];
            $db = Flight::db(); 
            $sql = "UPDATE tbl_kategori_produk 
                    SET nama_kategori_produk = :nama_kategori_produk 
                    WHERE id_kategori_produk = :id_kategori_produk";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":nama_kategori_produk", $nama_kategori_produk);
                $stmt->bindParam(":id_kategori_produk", $id_kategori_produk);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    Flight::json(['message' => "success"]);
                }else{
                    Flight::json(['message' => "target data update tidak ditemukan"]);
                }
            }catch(Exception $e){
                Flight::json(['message' => $e->getMessage()]);
            }
        }
        #done
        public static function delete_kategori_produk(){
            $id_kategori_produk = Flight::request()->data['id_kategori_produk'];
            $db = Flight::db(); 
            $sql = "DELETE FROM tbl_kategori_produk 
                    WHERE id_kategori_produk = :id_kategori_produk";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":id_kategori_produk", $id_kategori_produk);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    Flight::json(['message' => "berhasil delete"]);
                }else{
                    Flight::json(['message' => "target data delete tidak ditemukan"]);
                }
            }catch(Exception $e){
                Flight::json(['message' =>$e->getMessage()]);
            }
        }
    }