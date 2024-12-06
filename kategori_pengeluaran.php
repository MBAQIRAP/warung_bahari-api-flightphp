<?php 
    class Kategori_pengeluaran{
        #done
        public static function get_kategori_pengeluaran(){
            $db = Flight::db();
            $dataClass=$db->query("SELECT * FROM tbl_kategori_pengeluaran")->fetchAll(PDO::FETCH_CLASS);
            try{
                if(!empty($dataClass)){
                #(message top array) $dataAssoc = array('message' => 'berhasil') + $dataAssoc;
                    $data = [
                        "kategori_pengeluaran" => $dataClass,
                        "message" => "success"
                    ];
                    Flight::json($data);
                }else{
                    $data = [
                        "kategori_pengeluaran" => [],
                        "message" => "kosong"
                    ];
    
                    Flight::json($data);
                }
            }catch(Exception $e){
                Flight::json(['message' => $e->getMessage()]);
            }
        }

        public static function insert_kategori_pengeluaran(){
            $nama_kategori_pengeluaran = Flight::request()->data['nama_kategori_pengeluaran'];
            $db = Flight::db(); 
            $sql = "INSERT INTO tbl_kategori_pengeluaran(nama_kategori_pengeluaran) 
                    VALUES (:nama_kategori_pengeluaran)";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":nama_kategori_pengeluaran", $nama_kategori_pengeluaran);
                $result=$stmt->execute();
                if($result){
                    Flight::json(['message' => 'success']);
                }
            }catch(Exception $e){
                Flight::json(['message' => $e->getMessage()]);
            }
        }

        public static function update_kategori_pengeluaran(){
            $nama_kategori_pengeluaran = Flight::request()->data['nama_kategori_pengeluaran'];
            $id_kategori_pengeluran = Flight::request()->data['id_kategori_pengeluaran'];
            $db = Flight::db(); 
            $sql = "UPDATE tbl_kategori_pengeluaran
                    SET nama_kategori_pengeluaran = :nama_kategori_pengeluaran 
                    WHERE id_kategori_pengeluaran = :id_kategori_pengeluaran";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":nama_kategori_pengeluaran", $nama_kategori_pengeluaran);
                $stmt->bindParam(":id_kategori_pengeluaran", $id_kategori_pengeluran);
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

        public static function delete_kategori_pengeluaran(){
            $id_kategori_pengeluaran = Flight::request()->data['id_kategori_pengeluaran'];
            $db = Flight::db(); 
            $sql = "DELETE FROM tbl_kategori_pengeluaran 
                    WHERE id_kategori_pengeluaran = :id_kategori_pengeluaran";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":id_kategori_pengeluaran", $id_kategori_pengeluaran);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    Flight::json(['message' => "success"]);
                }else{
                    Flight::json(['message' => "target data delete tidak ditemukan"]);
                }
            }catch(Exception $e){
                Flight::json(['message' =>'gagal']);
            }
        }
    }