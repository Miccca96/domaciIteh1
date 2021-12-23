<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizator casova</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>

</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">FON</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Pocetna</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">O nama</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Kontakt</a>
      </li>
    </ul>
  </div>
</nav>
<div class = "container">
    <div class="row">
        <div class="col-lg-12">
            <h4 class = "text-center text-danger font-weight-normal my-3">Organizator casova</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <h4 class = "mt-2 text-primary">Svi casovi u bazi</h4>
        </div>
        <div class="col-lg-6">
            <button type = "button" class = "btn btn-primary m-1 float-right" data-toggle="modal" data-target="#addModal">
                <i class="fas fa-user-plus fa-lg"></i>&nbsp;Dodaj nov cas</button>
            
        </div>
    </div>
    <hr class="my-1">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive" id = "prikaziCas">
                
                    
            </div>
        </div>
    </div>
</div>
<!-- Dodaj novi cas Cas Modal -->
<div class="modal" id="addModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Dodaj novi cas</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="" method="post" id ="form-data">
        <div class="form-group">
                <input type="text" name = "opis" class="form-control" placeholder="Opis" required >
                

            </div>
            <div class="form-group">
            <input type="datetime-local" step="1" name = "datum" class="form-control" placeholder="Datum" required >
            </div>
            <?php
$servername='localhost';
$username='root';
$password='';
$dbname = "organizator_casova";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
die();
}
?>
<div class="Prikazi predavace">

<h6>Predavac</h6>
<select class="form-control" name="ime">
<?php
$sql = "SELECT ime FROM predavaci";
$result = $conn->query($sql);

$i=0;
while($DB_ROW = mysqli_fetch_array($result)) {
?>
<option>
<?php echo $DB_ROW["ime"]; ?></option>
<?php
$i++;
}
?>
</select>
</div>
<br>
<div class="Prikazi predmete">

<h6>Predmet</h6>
<select class="form-control" name = "naziv">
<?php
$sql = "SELECT naziv FROM predmeti";
$result = $conn->query($sql);

$i=0;
while($DB_ROW = mysqli_fetch_array($result)) {
?>
<option>
<?php echo $DB_ROW["naziv"]; ?></option>
<?php
$i++;
}
?>
</select>
</div>
<br>
<div class="form-group">
            <input type="submit" name = "insert" id="insert" value= "Dodaj cas" 
            class="btn btn-danger btn-block" required >
            </div>
        </form>
      </div>

      

    </div>
  </div>
</div>

<!-- Izmeni  Cas Modal -->
<div class="modal" id="editModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Izmeni cas</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="" method="post" id ="edit-form-data">
        <div class="form-group">
            <input type="hidden" name = "casID" id = "casID">
                <input type="text" name = "opis" class="form-control" id ="opis" required >
                

            </div>
            <div class="form-group">
            <input type="datetime-local" step="1" name = "datum" class="form-control" id = "datum" required >
            </div>
            <?php
$servername='localhost';
$username='root';
$password='';
$dbname = "organizator_casova";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
die();
}
?>
<div class="Prikazi predavace">

<h6>Predavac</h6>
<select class="form-control" name="ime" id="ime">
<?php
$sql = "SELECT ime FROM predavaci";
$result = $conn->query($sql);

$i=0;
while($DB_ROW = mysqli_fetch_array($result)) {
?>
<option>
<?php echo $DB_ROW["ime"]; ?></option>
<?php
$i++;
}
?>
</select>
</div>
<br>
<div class="Prikazi predmete">

<h6>Predmet</h6>
<select class="form-control" name = "naziv" id ="naziv">
<?php
$sql = "SELECT naziv FROM predmeti";
$result = $conn->query($sql);

$i=0;
while($DB_ROW = mysqli_fetch_array($result)) {
?>
<option>
<?php echo $DB_ROW["naziv"]; ?></option>
<?php
$i++;
}
?>
</select>
</div>
<br>
<div class="form-group">
            <input type="submit" name = "update" id="update" value= "Izmeni cas" 
            class="btn btn-primary btn-block" required >
            </div>
        </form>
      </div>

      

    </div>
  </div>
</div>







<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(document).ready(function(){
        
        prikaziSveCasove();
        function prikaziSveCasove(){
            $.ajax({
                url:"action.php",
                type:"POST",
                data:{action:"view"},
                success:function(response){
                    $('#prikaziCas').html(response);
                    $("table").DataTable({
                        order:[0,'desc']
                    });
                }


            });
        }
        //insert ajax
        $("#insert").click(function(e){
            if($("#form-data")[0].checkValidity()){
                e.preventDefault();
                $.ajax({
                    url:"action.php",
                    type:"POST",
                    data:$("#form-data").serialize()+"&action=insert",
                    success:function(response){
                        Swal.fire({
                            title: 'Cas je uspesno dodat!',
                            type: 'success'
                        })
                        $("#addModal").modal('hide');
                        $("#form-data")[0].reset();
                        prikaziSveCasove();
                    }
                });
            }
        });
        //Edit Cas
        $("body").on("click",".editBtn",function(e){
            e.preventDefault();
            edit_id = $(this).attr('id');
            $.ajax({
                url:"action.php",
                type:"POST",
                data:{edit_id:edit_id},
                success:function(response){
                   data = JSON.parse(response);
                $("#casID").val(data.casID);
                $("#opis").val(data.opis);
                $("#ime").val(data.ime);
                $("#naziv").val(data.naziv);
                }
            });
        });
    
    //update
    $("#update").click(function(e){
            if($("#edit-form-data")[0].checkValidity()){
                e.preventDefault();
                $.ajax({
                    url:"action.php",
                    type:"POST",
                    data:$("#edit-form-data").serialize()+"&action=update",
                    success:function(response){
                        Swal.fire({
                            title: 'Cas je uspesno izmenjen!',
                            type: 'success'
                        })
                        $("#editModal").modal('hide');
                        $("#edit-form-data")[0].reset();
                        prikaziSveCasove();
                    }
                });
            }
        });
        //Delete 
        $("body").on("click",".delBtn",function(e){
            e.preventDefault();
            var tr = $(this).closest('tr');
            del_id = $(this).attr('id');
            Swal.fire({
  title: 'Da li ste sigurni?',
  text: "Necete moci da vratite ovo!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Da, obrisi!'
}).then((result) => {
  if (result.isConfirmed) {
      $.ajax({
          url:"action.php",
          type:"POST",
          data:{del_id:del_id},
          success:function(response){
              tr.css('background-color','#ff6666');
              Swal.fire(
                  'Obrisan!',
                  'Cas je uspesno obrisan',
                  'success'
              )
              prikaziSveCasove();
          }
      })
  }})
        })
//Cas detalji
$("body").on("click",".infoBtn",function(e){
    e.preventDefault();
    info_id = $(this).attr('id');
    $.ajax({
        url:"action.php",
        type:"POST",
        data:{info_id:info_id},
        success:function(response){
            //console.log(response);
            data = JSON.parse(response);
            Swal.fire({
                title:'<strong>Cas info : ID('+data.casID+')</strong>',
                type:'info',
                html: '<b>Predavac : </b>'+data.ime
                +'<br><b>Cas : </b>'+data.opis + '<br><b>Datum : </b>'+data.datum+
               '<br><b>Predmet : </b>'+ data.naziv,
               showCancelButton : true,
            })
        }
    })
})

    });
    
    </script>
</body>
</html>