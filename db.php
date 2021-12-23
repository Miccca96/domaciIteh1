<?php 

class Database{

public $host ='localhost';
public $user = 'root';
public $password = "";
public $database = 'organizator_casova';
public $con;

public function __construct()
{
    $this->con = mysqli_connect($this->host,$this->user,$this->password,$this->database);
    if($this->con->connect_error){
        echo "Greska".$this->con->connect_error;
        die();
    }
    else{
        // echo "Konekcija uspesna!";
        
    }
}
public function insert($opis,$datum,$ime,$naziv){
    $sql = "INSERT INTO casovi (opis, datum, predmetID, predavacID) 
    SELECT '$opis', '$datum', p.predmetID, pr.predavacID 
    FROM predmeti p, predavaci pr
    WHERE p.naziv = '$naziv' 
    AND pr.ime = '$ime'";
    // $sql = "WITH inputvalues(ime, naziv,opis,datum) AS (
    //     values
    //         ($ime, $naziv,$opis,$datum)
    // )
    // INSERT INTO public.casovi (predavacID, predmetID,opis,datum)
    // SELECT rec.predmetID, ing.predavacID, d.opis, d.datum
    // FROM inputvalues AS d
    // INNER JOIN public.predavaci AS ing
    //     ON d.ime = ing.ime
    // INNER JOIN public.predmeti AS rec
    //     ON d.naziv=rec.naziv";

    // $sql2 = "INSERT INTO casovi (opis,datum)
    // VALUES ($opis,$datum)";

if ($this->con->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $this->con->error;
  }
//   if ($this->con->query($sql2) === TRUE) {
//     echo "New record created successfully";
//   } else {
//     echo "Error: " . $sql2. "<br>" . $this->con->error;
//   }
}
public function select(){
$data = array();
$sql = "SELECT c.casID, pr.zvanje, pr.ime, c.opis, c.datum, p.naziv  FROM casovi AS c INNER JOIN predmeti AS p ON
c.predmetID = p.predmetID INNER JOIN predavaci AS pr on c.predavacID = pr.predavacID";
$result = $this->con->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
  } else {
    echo "0 results";
  }
  return $data;
}

public function getCasByID($id){
    $sql = "SELECT c.casID,pr.zvanje, pr.ime, c.opis, c.datum, p.naziv  FROM casovi AS c INNER JOIN predmeti AS p ON
    c.predmetID = p.predmetID INNER JOIN predavaci AS pr on c.predavacID = pr.predavacID
    WHERE c.casID = $id";
    $result = $this->con->query($sql);
    $row = $result->fetch_object();
    return $row;

}

public function update($id,$opis,$datum,$ime,$naziv){
    $sql = "UPDATE casovi SET opis = '$opis' , datum = '$datum', predavacID = (
        SELECT predavacID
        FROM predavaci WHERE predavaci.ime = '$ime'
    ), predmetID = (SELECT predmetID
    FROM predmeti WHERE predmeti.naziv = '$naziv')
    WHERE casID = $id";
    if ($this->con->query($sql) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . $this->con->error;
      }
}
public function delete($id){
    $sql = "DELETE FROM casovi WHERE casID = $id";
    if ($this->con->query($sql) === TRUE) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . $this->con->error;
      }
}
public function totalRowCount(){
    $sql = "SELECT * from casovi";
    $result = $this->con->query($sql);
    $t_rows = $result->num_rows;
    return $t_rows;
}

    
}






?>

        
   
   





