<?php

if(isset($_GET['type'])){
    $typeR=$_GET['type'];
}else{
    header('location : index.php');
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
            <h3 class="mb-0">قائمة الجلسات العامة  </h3>
        </div>

        <div class="col-4 text-right">
            <a href="assets/file/الاستدعاء-للجلسة-العامة.pdf" download="الاستدعاء-للجلسة-العامة" class="btn btn-sm btn-primary" >استدعاء الجلسات العامة</a>
            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ajouterReunionPublique">إضافة الجلسات العامة</button>
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
            <th scope="col">تاريخ</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT * FROM reunionpublique where idGess='$idGess' and `active`='1'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // output data of each row
                $i=0;
                while ($row = $result->fetch_assoc()) {
                $i++;
                echo '
                <tr>
                    <th scope="row">'
                    . $i .'
                    </th>
                    <td>'
                    . $row['date'] .'
                    </td>
                    <td class="text-center">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v text-black-50"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="uploads/'.$row['doc'].'" download="reunion le '.$row['date'].'" >تفاصيل و طباعة</a>
                                <a class="dropdown-item" href="controller/controller.php?idReunionDesacive='.$row["idReun"].'">حذف</a>
                            </div>
                        </div>
                    </td>
                </tr>';
                }
            }
            
            ?>
        
            
            
        </tbody>
        </table>
    </div>
    
    </div>
</div>
</div>
