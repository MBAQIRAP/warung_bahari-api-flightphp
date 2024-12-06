<?php 
    class Kategori_pemasukan{
        #done
        public static function get_kategori_pemasukan(){
            $db = Flight::db();
            $dataClass=$db->query("SELECT * FROM tbl_kategori_pemasukan")->fetchAll(PDO::FETCH_CLASS);
            #$dataAssoc = [];
            //Flight::json(!empty($dataAssoc));
            try{
                if(!empty($dataClass)){
                    //$dataAssoc = $data->fetchAll(PDO::FETCH_CLASS);
                    // $dataAssoc['mesage']="berhasil";#(message top array) $dataAssoc = array('message' => 'berhasil') + $dataAssoc;
                    #(json echo struktur) header('Content-Type: application/json');$resultJson=json_encode($dataAssoc,JSON_PRETTY_PRINT); echo $resultJson;
                    #Flight::json($resultJson);

                    $data = [
                        "kategori_pemasukan" => $dataClass,
                        "message" => "success"
                    ];

                    Flight::json($data);
                }else{
                    $data = [
                        "kategori_pemasukan" => [],
                        "message" => "kosong"
                    ];
                    Flight::json($data);
                }
            }catch(Exception $e){
                Flight::json(['message' =>$e->getMessage()]);
            }
        }

        public static function insert_kategori_pemasukan(){
            $nama_kategori_pemasukan = Flight::request()->data['nama_kategori_pemasukan'];
            $db = Flight::db(); 
            $sql = "INSERT INTO tbl_kategori_pemasukan(nama_kategori_pemasukan) 
                    VALUES (:nama_kategori_pemasukan)";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":nama_kategori_pemasukan", $nama_kategori_pemasukan);
                $result=$stmt->execute();
                if($result){
                    Flight::json(['message' => 'success']);
                }
            }catch(Exception $e){
                Flight::json(['message' =>$e->getMessage()]);
            }
        }

        public static function update_kategori_pemasukan(){
            $nama_kategori_pemasukan = Flight::request()->data['nama_kategori_pemasukan'];
            $id_kategori_pemasukan = Flight::request()->data['id_kategori_pemasukan'];
            $db = Flight::db(); 
            $sql = "UPDATE tbl_kategori_pemasukan
                    SET nama_kategori_pemasukan = :nama_kategori_pemasukan 
                    WHERE id_kategori_pemasukan = :id_kategori_pemasukan";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":nama_kategori_pemasukan", $nama_kategori_pemasukan);
                $stmt->bindParam(":id_kategori_pemasukan", $id_kategori_pemasukan);
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

        public static function delete_kategori_pemasukan(){
            $id_kategori_pemasukan = Flight::request()->data['id_kategori_pemasukan'];
            $db = Flight::db(); 
            $sql = "DELETE FROM tbl_kategori_pemasukan 
                    WHERE id_kategori_pemasukan = :id_kategori_pemasukan";
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":id_kategori_pemasukan", $id_kategori_pemasukan);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    Flight::json(['message' => "success"]);
                }else{
                    Flight::json(['message' => "target data delete tidak ditemukan"]);
                }
            }catch(Exception $e){
                Flight::json(['message' =>  $e->getMessage()]);
            }
        }
    }