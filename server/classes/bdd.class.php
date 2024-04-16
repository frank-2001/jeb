<?php
            class bdd{
                var $host="localhost";
                var $dbname="u698416815_jeb_db";
                var $user="u698416815_jeb_db";
                var $pass="Code@2001";

                
                function connect(){
                    if ($_SERVER['SERVER_NAME']=="localhost") {  
                        $this->dbname='jeb_easy';
                        $this->user='root';
                        $this->pass='';
                    }
                    try { 
                        $bdd = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->user, $this->pass);
                        return $bdd;
                    }
                    catch   (PDOException $pe){
                        die ("I cannot connect to the database " . $pe->getMessage());
                        return null;
                    }
                }
                function listTable(){
                    $sql="SHOW TABLES";
                    $req= $this->connect()->prepare($sql);
                    $req->execute();
                    return $req->fetchAll();
                }
            }
            $bdd=new bdd();

            class tables extends bdd{
                var $table;
                var $state=false;
                var $data=[];
                function return(String $sql,String $fun,Array $values=[]):array {
                    // echo $sql;
                    $req= $this->connect()->prepare($sql);

                    return ["message"=>$fun." ".$this->table,"state"=>$req->execute($values),"data"=>$req->fetchAll()];
                }
                function all($col="*",$param=""):array{
                    $sql="SELECT ".$col." FROM ".$this->table." ".$param;
                    return $this->return($sql,__FUNCTION__);
                }

                function new($data){
                    $keys=implode(",",array_keys($data));
                    $values=array_values($data);
                    $sign="";
                    for ($i=0; $i < count($data)-1 ; $i++) { 
                        $sign=$sign."?,";
                    }
                    $sign=$sign."?";
                    $sql = "INSERT INTO ".$this->table." (".$keys.") VALUES (".$sign.")";
                    return $this->return($sql,__FUNCTION__,$values);
                }
                function byId($id){
                    $sql="SELECT * FROM ".$this->table." where id=".$id;
                    return $this->return($sql,__FUNCTION__);
                }
                function update($id,$data){
                    $struc="";
                    foreach ($data as $key=>$value) { 
                        $struc=$struc."".$key."='".$value."',";
                    }
                    $struc=substr($struc,0,-1);
                    $sql="UPDATE ".$this->table." set ".$struc." where id=".$id;
                    return $this->return($sql,__FUNCTION__);      
                }
                function delete($id){
                    $sql="DELETE FROM ".$this->table." where id=".$id;
                    return $this->return($sql,__FUNCTION__); 
                }
                // Search in any table
                function search($data){
                    $demand="";
                    foreach ($data as $key => $value1) {
                        $demand.=" ".$key." LIKE '%".$value1."%' OR";
                        if ($key=="all_column") {
                            $demand="";
                            $sql="DESCRIBE ".$this->table;
                            foreach ($this->return($sql,"")["data"] as $key => $value2) {
                                $demand.=" ".$value2["0"]." LIKE '%".$value1."%' OR";
                            }
                            break;
                        }
                    }
                    $demand=substr($demand,0,-2);
                    $sql="SELECT * FROM ".$this->table." where ".$demand;
                    return $this->return($sql,__FUNCTION__);
                }

                // Search by any thing
                function by($data,$param1="*",$param2=""){
                    // print_r($data);
                    $demand="";
                    foreach ($data as $key => $value1) {
                        $demand.=" ".$key." = '".$value1."' AND";
                    }
                    $demand=substr($demand,0,-3);
                    $sql="SELECT ".$param1." FROM ".$this->table." ".$param2." where ".$demand;
                    return $this->return($sql,__FUNCTION__);
                }
            }

            function webp($image,$level,$prefix="",$dir='webp_compressed/'){
                // Image
                $newName = $prefix.".webp";
                if(!is_dir($dir)){
                    mkdir($dir);
                }
        
                // Create and save
                $imgInfo=getimagesize($image);
                $mime=$imgInfo['mime'];
                #Create a new image from file
                switch ($mime) {
                    case 'image/jpeg':
                        $img =imagecreatefromjpeg($image);
                        break;
                    case 'image/png':
                        $img =imagecreatefrompng($image);
                        break;
                    case 'image/gif':
                        $img =imagecreatefromgif($image);
                        break;
                    default:
                        return "Echec! image non reconue";
                        $img =imagecreatefromjpeg($image);
                        break;
                }
        
                imagepalettetotruecolor($img);
                imagealphablending($img, true);
                imagesavealpha($img, true);
                imagewebp($img, $dir . $newName, $level);
                imagedestroy($img);
                $origin=round(filesize($image)/(1024*1024),2);
                $final=round(filesize($dir.$newName)/(1024*1024),2);
                $red=$origin-$final;
                $rate=($red*100)/$origin;
        
                $output = [
                    "origin"=>[
                        "path"=>$image,
                        "size"=> $origin. " Mb"
                    ],
                    "final"=>[
                        "path"=>$dir.$newName,
                        "size"=>$final. " Mb",
                        "name"=>$newName
                    ],
                    "result"=>$red." Mb Reduced or ".$rate."%"
                ];
                return $output;
            }
    ?>