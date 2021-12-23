<?php
require 'db.php';
$db = new Database();

if(isset($_POST['action']) && $_POST['action']== "view"){
    $output = '';
    $data = $db->select();
    if($db->totalRowCount()>0){
        $output .= '<table class ="table table-striped table-sm table-bordered">
        <thead>
            <tr class="text-center">
            <th>ID</th>
                <th>zvanje</th>
                <th>Predavac</th>
                <th>Cas</th>
                <th>datum</th>
                <th>Predmet</th>
                <th>Akcija</th>
            </tr>
        </thead>
        <tbody>';
        foreach($data as $row){
            $output.='<tr class = "text-center text-secondary">
            <td>'.$row['casID'].'</td>
            <td>'.$row['zvanje'].'</td>
            <td>'.$row['ime'].'</td>
            <td>'.$row['opis'].'</td>
            <td>'.$row['datum'].'</td>
            <td>'.$row['naziv'].'</td>
            <td>
                 <a href="#" title="Vidi" class="text-success infoBtn" id = "'.$row['casID'].'"><i class="fas fa-info-circle fa-lg"></i></a>&nbsp;&nbsp;

                 <a href="#" title="Izmeni" class="text-primary editBtn" data-toggle="modal" data-target="#editModal" id = "'.$row['casID'].'"><i class="fas fa-edit fa-lg"></i></a>&nbsp;&nbsp;

                 <a href="#" title="Obrisi" class="text-danger delBtn" id = "'.$row['casID'].'"><i class="fas fa-trash-alt fa-lg"></i></a>&nbsp;&nbsp;
                        </td></tr> ';

            
            
           
        }
        $output .='<tbody></table>';
        echo $output;
    }
    else{
        echo '<h3 class= "text-center text-secondary mt-5">:(Nema nijednog casa u bazi!</h3>';
    }
}

if(isset($_POST['action']) && $_POST['action']=="insert"){
    $opis = $_POST['opis'];
    $datum = $_POST['datum'];
    $ime = $_POST['ime'];
    $naziv = $_POST['naziv'];

    $db->insert($opis,$datum,$ime,$naziv);
    // echo "Setovana je akcija";
}
else{
    // echo "Nije setovana akcija";
}

if(isset($_POST['edit_id'])){
    $id = $_POST['edit_id'];

    $row = $db->getCasByID($id);
    echo json_encode($row);
}
if(isset($_POST['action'])&& $_POST['action']=="update"){
    $id = $_POST['casID'];
    $opis = $_POST['opis'];
    $datum = $_POST['datum'];
    $ime = $_POST['ime'];
    $naziv = $_POST['naziv'];

    $db->update($id,$opis,$datum,$ime,$naziv);
}
if(isset($_POST['del_id'])){
    $id = $_POST['del_id'];

    $db->delete($id);
}
if(isset($_POST['info_id'])){
    $id = $_POST['info_id'];

    $row = $db->getCasByID($id);
    echo json_encode($row);
}


?>