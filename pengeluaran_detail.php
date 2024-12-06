<?php 
    class Pengeluaran_detail{
        public static function get_pengeluaran_detail(){
            $db = Flight::db();
            $data=$db->query("SELECT * FROM tbl_pengeluaran_detail");
            try{
                if(!empty($dataClass)){
                #(message top array) $dataAssoc = array('message' => 'berhasil') + $dataAssoc;
                    $data = [
                        "pengeluaran_detail" => $dataClass,
                        "message" => "success"
                    ];
                    Flight::json($data);
                }else{
                    $data = [
                        "pengeluaran_detail" => [],
                        "message" => "kosong"
                    ];
    
                    Flight::json($data);
                }
            }catch(Exception $e){
                Flight::json(['message' => $e->getMessage()]);
            }
        }

        public static function insert_pengeluaran_detail(){
            $nama_pengeluaran = Flight::request()->data['nama_pengeluaran'];
            $satuan_pengeluaran = Flight::request()->data['satuan_pengeluaran'];
            $harga_pengeluaran = Flight::request()->data['harga_pengeluaran'];
            $id_pengeluaran = Flight::request()->data['id_pengeluaran'];
            $db = Flight::db(); 
            $sql = "INSERT INTO tbl_pengeluaran_detail(nama_pengeluaran,satuan_pengeluaran,harga_pengeluaran,id_pengeluaran) 
                    VALUES (:nama_pengeluaran,:satuan_pengeluaran,:harga_pengeluaran,:id_pengeluaran)";
            try{
                $stmt = $db->prepare($sql);
                for($key = 0, $size = count($nama_pengeluaran); $key < $size; $key++) {
                    $stmt->bindParam(":nama_pengeluaran", $nama_pengeluaran[$key]);
                    $stmt->bindParam(":satuan_pengeluaran", $satuan_pengeluaran[$key]);
                    $stmt->bindParam(":harga_pengeluaran", $harga_pengeluaran[$key]);
                    $stmt->bindParam(":id_pengeluaran", $id_pengeluaran[$key]);
                    $result=$stmt->execute();
                }
                if($result){
                    Flight::json(['message' => 'success']);
                }
            }catch(Exception $e){
                Flight::json(['message' => $e->getMessage()]);
            }
        }

        public static function update_pengeluaran_detail(){
            $nama_pengeluaran = Flight::request()->data['nama_pengeluaran'];
            $satuan_pengeluaran = Flight::request()->data['satuan_pengeluaran'];
            $harga_pengeluaran = Flight::request()->data['harga_pengeluaran'];
            $id_pengeluaran = Flight::request()->data['id_pengeluaran'];
            $id_pengeluaran_detail = Flight::request()->data['id_pengeluaran_detail'];
            $db = Flight::db(); 
            $sql = "UPDATE tbl_pengeluaran_detail
                    SET nama_pengeluaran=:nama_pengeluaran, satuan_pengeluaran=:satuan_pengeluaran, harga_pengeluaran=:harga_pengeluaran, id_pengeluaran=:id_pengeluaran
                    WHERE id_pengeluaran_detail = :id_pengeluaran_detail";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":nama_pengeluaran", $nama_pengeluaran);
                $stmt->bindParam(":satuan_pengeluaran", $satuan_pengeluaran);
                $stmt->bindParam(":harga_pengeluaran", $harga_pengeluaran);
                $stmt->bindParam(":id_pengeluaran", $id_pengeluaran);
                $stmt->bindParam(":id_pengeluaran_detail", $id_pengeluaran_detail);
                $result=$stmt->execute();
                if($result){
                    Flight::json(['message' => 'success']);
                }else{
                    Flight::json(['message' =>'target data update tidak ditemukan']);
                }
            }catch(Exception $e){
                Flight::json(['message' => $e->getMessage()]);
            }
        }

        public static function delete_pengeluaran(){
            $id_pengeluaran_detail = Flight::request()->data['id_pengeluaran_detail'];
            $db = Flight::db(); 
            $sql = "DELETE FROM tbl_pengeluaran_detail 
                    WHERE idpemasukan_detail = :id_pemasukan_detail";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":id_pengeluaran_detail", $id_pengeluaran_detail);
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