<?php 
    class Produk{
        public static function get_produk(){
            $db = Flight::db();
            $dataClass=$db->query("SELECT * FROM tbl_produk")->fetchAll(PDO::FETCH_CLASS);
            try{
                if(!empty($dataClass)){
                    $data = [
                        "produk" => $dataClass,
                        "message" => "success"
                    ];
                    Flight::json($data);
                }else{
                    $data = [
                        "produk" => [],
                        "message" => "kosong"
                    ];
    
                    Flight::json($data);
                }
            }catch(Exception $e){
                Flight::json(['message' => $e->getMessage()]);
            }
        }

        public static function insert_produk(){
            $nama_produk=Flight::request()->data['nama_produk'];
            $id_kategori_produk=Flight::request()->data['id_kategori_produk'];
            $gambar_produk=Flight::request()->data['gambar_produk'];
            $harga_jual=Flight::request()->data['harga_jual'];
            $harga_beli=Flight::request()->data['harga_beli'];
            $status_produk=Flight::request()->data['status_produk'];
            $db = Flight::db();
            $sql = "INSERT INTO tbl_produk(nama_produk,gambar_produk,status_produk,harga_jual,harga_beli,id_kategori_produk) 
                    VALUES (:nama_produk,:gambar_produk,:status_produk,:harga_jual,:harga_beli,id_kategori_produk)";
            try{
                $stmt = $db->prepare($sql);
            $stmt->bindParam(":nama_produk", $nama_produk);
            $stmt->bindParam(":gambar_produk", $gambar_produk);
            $stmt->bindParam(":status_produk", $status_produk);
            $stmt->bindParam(":harga_jual", $harga_jual);
            $stmt->bindParam(":harga_beli", $harga_beli);
            $stmt->bindParam(":id_kategori_produk", $id_kategori_produk);
            $result=$stmt->execute();
            if($result){
                Flight::json(['message' => 'success']);
            }
            }catch(Exception $e){
                Flight::json(['message' => $e->getMessage()]);
            }
        }

        public static function update_produk(){
            $id_produk = Flight::request()->data['id_produk'];
            $nama_produk=Flight::request()->data['nama_produk'];
            $id_kategori_produk=Flight::request()->data['id_kategori_produk'];
            $gambar_produk=Flight::request()->data['gambar_produk'];
            $harga_jual=Flight::request()->data['harga_jual'];
            $harga_beli=Flight::request()->data['harga_beli'];
            $status_produk=Flight::request()->data['status_produk'];
            $db = Flight::db(); 
            $sql = "UPDATE tbl_produk 
                    SET nama_produk = :nama_produk, id_kategori_produk=:id_kategori_produk, gambar_produk=:gambar_produk, harga_jual=:harga_jual, harga_beli=:harga_beli, status_produk=:status_produk
                    WHERE id_produk = :id_produk";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":id_produk", $id_produk);
                $stmt->bindParam(":nama_produk", $nama_produk);
                $stmt->bindParam(":id_kategori_produk", $id_kategori_produk);
                $stmt->bindParam(":gambar_produk", $gambar_produk);
                $stmt->bindParam(":harga_jual", $harga_jual);
                $stmt->bindParam(":harga_beli", $harga_beli);
                $stmt->bindParam(":status_produk", $status_produk);
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

        public static function delete_produk(){
            $id_produk = Flight::request()->data['id_produk'];
            $db = Flight::db(); 
            $sql = "DELETE FROM tbl_produk
                    WHERE id_produk = :id_produk";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":id_produk", $id_produk);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    Flight::json(['message' => "berhasil delete"]);
                }else{
                    Flight::json(['message' =>'gagal']);
                }
            }catch(Exception $e){
                Flight::json(['message' => $e->getMessage()]);
            }
           
        }
    }