<?php
$factureRecettes=$_GET['factureRecettes'];

if(isset($_GET['delete'])){
    $idRevenusDepenses=$_GET['delete'];

    $sqld = "UPDATE `revenusdepenses` SET `activ`='0' where idRevenusDepenses=$idRevenusDepenses ";
    $conn->query($sqld);
   
}

?>

<!-- Main content -->
<div class="main-content">

<!-- Header -->
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
    <div class="header-body">
        
    </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--7">
    <!-- table -->
    <div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header bg-secondary border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><?php
                            if($_GET['factureRecettes']==1 ){
                                echo 'فواتير بيع الماء';
                            }else if($_GET['factureRecettes']==2){
                                echo 'فواتير اخرى';
                            }else if($_GET['factureRecettes']==3){
                                echo 'وصولات بيع الماء';
                            }else{
                                echo 'وصولات اخرى';
                            }
                        ?>  </h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#AjoutRevenusDepenses">إضافة عملة</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive col-12">
                <div id="alert" class="alert alert-<?php echo $_SESSION['messageClass'] ?> alert-dismissible fade <?php if($_SESSION['message']!="") echo "show"; else echo "visually-hidden"  ?>" role="alert" >
                    <?php echo $_SESSION['message'];  unset($_SESSION['message']); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <table id="listeBenefique" class=" table  align-items-center table-striped table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">الرمز</th>
                            <th scope="col">شهر/تاريخ</th>
                            <th scope="col">رقم الفاتورة</th>
                            <th scope="col"><?php
                                if($_GET['factureRecettes']==1 or $_GET['factureRecettes']==3){
                                    echo 'إسم ولقب المنتفع';
                                }else{
                                    echo 'البيان';
                                }
                            ?></th>
                            <th scope="col">المبلغ المطلوب</th>
                            <th scope="col">Piece-jointe</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT * FROM revenusdepenses where idGess='$idGess' and activ=1 and factureRecettes=$factureRecettes";
                        $result = $conn->query($sql);
                        $nb=0;
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                $nb=$nb+1;
                            ?>
                                <tr>
                                    <th scope="col"><?php echo $nb ; ?></th>
                                    <th scope="col"><?php echo $row['date'] ; ?></th>
                                    <th scope="col"><?php echo $row['facture']  ; ?></th>
                                    <th scope="col"><?php
                                        if($_GET['factureRecettes']==1 or $_GET['factureRecettes']==3){
                                            echo $row['nomBayan'] ;
                                        }else{
                                            echo '<a href="uploads/'.$row['doc'].'" download="'.$row['facture'].'" >تحميل ملف</a></th>';
                                        }
                                    ?></th>
                                    <th scope="col"><?php echo $row['montant']  ; ?></th>
                                    <th scope="col"><a href="uploads/<?php echo $row['doc']  ; ?>" download="<?php echo $row['facture']  ; ?>" >تحميل ملف</a></th>
                                    <th scope="col"><a href="index.php?page=revenusDepenses&factureRecettes=<?php echo $factureRecettes ?>&delete=<?php echo $row['idRevenusDepenses'] ?>" >حذف</a></th>
                                </tr>
                            <?php
                            }
                        }
                    
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="AjoutRevenusDepenses" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="controller/controller.php" method="post" enctype="multipart/form-data">
        <input type="text" name="factureRecettes" class="d-none" value="<?php echo $factureRecettes; ?>">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">اضافة عمالية</h1>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <labe class="form-label">الشهر/التاريخ</label>
                <input type="date" name="date" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">رقم الفاتورة</label>
                <input type="text" name="facture" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">
                <?php
                    if($_GET['factureRecettes']==1 or $_GET['factureRecettes']==3){
                        echo 'إسم ولقب المنتفع';
                    }else{
                        echo 'البيان';
                    }
                ?>
                </label>
                <?php
                    if($_GET['factureRecettes']==1 or $_GET['factureRecettes']==3){
                        echo '<select class="form-select" name="nomBayan" aria-label="Default select example">';
                           $sql3 = "SELECT * FROM benefique_pi where idGess='$idGess' and active=1 ";
                           $result3 = $conn->query($sql3);
                           if ($result3->num_rows > 0) {
                              // output data of each row
                              while ($row = $result3->fetch_assoc()) {
                                    echo '<option value="'.$row['nom'].'">'.$row['nom'].'</option>';
                              }
                           }
                        echo '</select>';
                    }else{
                        echo '<input type="file" name="nomBayanf" class="form-control">';
                    }
                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">المبلغ المطلوب</label>
                <input type="number" name="montant" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Piece-jointe</label>
                <input type="file" name="doc" class="form-control" >
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
            <button type="submit" class="btn btn-primary">اضافة</button>
        </div>
        </div>
    </form>
  </div>
</div>