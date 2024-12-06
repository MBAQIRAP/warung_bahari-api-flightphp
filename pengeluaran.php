<?php 
    class Pengeluaran{
        public static function get_pengeluaran(){
            $db = Flight::db();
            $dataClass=$db->query("SELECT * FROM tbl_pengeluaran")->fetchAll(PDO::FETCH_CLASS);
            try{
                if(!empty($dataClass)){
                #(message top array) $dataAssoc = array('message' => 'berhasil') + $dataAssoc;
                    $data = [
                        "pengeluaran" => $dataClass,
                        "message" => "success"
                    ];
                    Flight::json($data);
                }else{
                    $data = [
                        "pengeluaran" => [],
                        "message" => "kosong"
                    ];
    
                    Flight::json($data);
                }
            }catch(Exception $e){
                Flight::json(['message' => $e->getMessage()]);
            }
        }

        public static function insert_pengeluaran(){
            $total_pengeluaran=Flight::request()->data['total_pengeluaran'];
            $tgl_pengeluaran=Flight::request()->data['tgl_pengeluaran'];
            $id_kategori_pengeluaran=Flight::request()->data['id_kategori_pengeluaran'];
            $db = Flight::db(); 
            $sql = "INSERT INTO tbl_pengeluaran(total_pengeluaran,tgl_pengeluaran,id_kategori_pengeluaran) 
                    VALUES (:total_pengeluaran,:tgl_pengeluaran,:id_kategori_pengeluaran)";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":total_pengeluaran", $total_pengeluaran);
                $stmt->bindParam(":tgl_pegneluaran", $tgl_pengeluaran);
                $stmt->bindParam(":id_kategori_pemasukan", $id_kategori_pengeluaran);
                $result=$stmt->execute();
                if($result){
                    Flight::json(['message' => 'success']);
                }
            }catch(Exception $e){
                Flight::json(['message' => $e->getMessage()]);
            }
        }

        public static function update_pengeluaran(){
            $total_pengeluaran=Flight::request()->data['total_pengeluaran'];
            $tgl_pengeluaran=Flight::request()->data['tgl_pengeluaran'];
            $id_kategori_pengeluaran=Flight::request()->data['id_kategori_pengeluaran'];
            $id_pengeluaran = Flight::request()->data['id_pengeluaran'];
            $db = Flight::db(); 
            $sql = "UPDATE tbl_pegeluaran
                    SET total_pengeluaran = :total_pengeluaran, tgl_pengeluaran = :tgl_pengeluaran, id_kategori_pengeluaran = :id_kategori_pengeluaran
                    WHERE id_pemasukan = :id_pemasukan";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":total_pengeluaran", $total_pengeluaran);
                $stmt->bindParam(":tgl_pegneluaran", $tgl_pengeluaran);
                $stmt->bindParam(":id_kategori_pengeluaran", $id_kategori_pengeluaran);
                $stmt->bindParam(":id_pengeluaran", $id_pengeluaran);
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

        public static function delete_pengeluaran(){
            $id_pengeluaran = Flight::request()->data['id_pengeluaran'];
            $db = Flight::db(); 
            $sql = "DELETE FROM tbl_pengeluaran
                    WHERE id_pengeluaran = :id_pengeluaran";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":id_pengeluaran", $id_pengeluaran);
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