<?php
class data{
    private $servername = "91.216.107.248";
    // Database name
    private $dbname = "gauth1148636_1fzru";
    // Database user
    private $username = "gauth1148636_1fzru";
    // Database user password
    private $password = "n7ttg6wdjq";

    private $tot_entree;
    private $tot_sortie;
    private $tot_actuel;

    public function getServerName(){
        return $this->servername;
    }
    public function getDbName(){
        return $this->dbname;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setEntree($entree){
        $this->tot_entree = $entree;
    }
    public function setSortie($sortie){
        $this->tot_sortie = $sortie;
    }
    public function setActuel($actuel){
        $this->tot_actuel = $actuel;
    }
    public function getEntree(){
        return ($this->tot_entree>0?$this->tot_entree:0);
    }
    public function getSortie(){
        return ($this->tot_sortie>0?$this->tot_sortie:0);
    }
    public function getActuel(){
        return ($this->tot_actuel>0?$this->tot_actuel:0);
    }
    public function supprimerTable(){
        $sql = "DELETE FROM `Nbr_Personne` WHERE `id_stage`= 1";

        /*if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }*/
    }
    public function afficheStat($acces,$idClient){
        // Create connection
        $conn = new mysqli($this->getServerName(), $this->getUsername(), $this->getPassword(), $this->getDbName());
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if($acces == "total"){
            $sqlNbr = "SELECT SUM(nbr_entree), SUM(nbr_sortie) 
                       FROM Nbr_Personne
                       join Stages on Nbr_Personne.id_stage = Stages.id_stage 
                         join Events on Stages.id_event = Events.id_event 
                         where Events.id_client = ". $idClient;
            if ($result = $conn->query($sqlNbr)) {
                while ($row = $result->fetch_assoc()) {
                    $this->setEntree($row["SUM(nbr_entree)"]);
                    $this->setSortie($row["SUM(nbr_sortie)"]);
                    $total = $row["SUM(nbr_entree)"] - $row["SUM(nbr_sortie)"] - 1;
                    $this->setActuel($total);
                }
                $result->free();
            }
            return $this->getActuel();
        }
        elseif($acces == "public"){
            $sqlNbr = "SELECT SUM(nbr_entree), SUM(nbr_sortie) 
                       FROM Nbr_Personne
                       join Stages on Nbr_Personne.id_stage = Stages.id_stage 
                       join Events on Stages.id_event = Events.id_event 
                       where Events.id_client = ". $idClient;

            if ($result = $conn->query($sqlNbr)) {
                while ($row = $result->fetch_assoc()) {
                    $this->setEntree($row["SUM(nbr_entree)"]);
                    $this->setSortie($row["SUM(nbr_sortie)"]);
                    $total = $row["SUM(nbr_entree)"] - $row["SUM(nbr_sortie)"];
                    $this->setActuel($total);
                }
                $result->free();
            }
            echo '<br>Nombre entree : '  . $this->getEntree() .
                '<br>Nombre sortie : '  . $this->getSortie() .
                '<br>Nombre actuel : '  . $this->getActuel();

        }
        elseif($acces == "prive"){

            $sqlTab =   "SELECT Stages.stage_name, id, Nbr_Personne.nbr_entree, Nbr_Personne.nbr_sortie, Nbr_Personne.nbr_actuel, Nbr_Personne.heure 
                         FROM `Nbr_Personne`
                         join Stages on Nbr_Personne.id_stage = Stages.id_stage 
                         join Events on Stages.id_event = Events.id_event 
                         where Events.id_client = ". $idClient . " 
                         order by Nbr_Personne.heure desc limit 10";
            if ($result = $conn->query($sqlTab)) {
                while ($row = $result->fetch_assoc()) {
                    $row_name = $row["stage_name"];
                    $row_id = $row["id"];
                    $row_nbr_entree = $row["nbr_entree"];
                    $row_nbr_sortie = $row["nbr_sortie"];
                    $row_nbr_actuel = $row["nbr_actuel"];
                    $row_heure = $row["heure"];

                    echo '<tr> 
                <td>' . $row_name . '</td> 
                <td>' . $row_id . '</td> 
                <td>' . $row_nbr_entree . '</td> 
                <td>' . $row_nbr_sortie . '</td> 
                <td>' . $row_nbr_actuel . '</td> 
                <td>' . $row_heure . '</td>
              </tr>';
                }
                $result->free();
            }
            $conn->close();
        }
    }
}