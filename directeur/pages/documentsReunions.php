<?php

if(isset($_GET['type'])){
    $typeR=$_GET['type'];
}else{
    header('location : index.php');
}
if($typeR==1){
    $urlfile='<a href="index.php?page=printReuinionPublique" class="btn btn-sm btn-primary"> الاعلان عن جلسة العامة  </a>';
}else if($typeR==2){
    $urlfile='<a href="https://gda2.ness.com.tn/assets/fichier/direct/استدعاء-للجلسة-العامة.pdf" target="_blank" class="btn btn-sm btn-primary"> الاستدعاء للجلسة العامة  </a>';
}else if($typeR==3){
    $urlfile='<a href="index.php?page=rapportLitteraire" class="btn btn-sm btn-primary"> التقرير الأدبي</a>';
}else if($typeR==4){
    $urlfile='<a href="index.php?page=rapportFinancier" class="btn btn-sm btn-primary"> التقرير المالي  </a>';
}else if($typeR==5){
    $urlfile='<a href="https://gda2.ness.com.tn/assets/fichier/direct/طلب-ترشح-لعضوية-مجلس-الادارة (1).pdf" target="_blank" class="btn btn-sm btn-primary">    طلب ترشح لعضوية مجلس الادارة  </a>';
}else if($typeR==6){
    $urlfile='<a href="https://gda2.ness.com.tn/assets/fichier/direct/طلب-ترشح-لعضوية-اللجنة-الداخلية-لمراقبة-الحسابات.pdf" target="_blank" class="btn btn-sm btn-primary"> طلب ترشح لعضوية اللجنة الداخلية لمراقبة الحسابات  </a>';
}else if($typeR==7){
    $urlfile='<a href="https://gda2.ness.com.tn/assets/fichier/direct/قائمة-المرشحين.pdf" target="_blank" class="btn btn-sm btn-primary">    قائمة المرشحين  </a>';
}else if($typeR==8){
    $urlfile='<a href="https://gda2.ness.com.tn/assets/fichier/direct/قائمة-الحضور-في-الجلسة-العامة.pdf" target="_blank" class="btn btn-sm btn-primary"> قائمة الحضور في الجلسة العامة  </a>';
}else if($typeR==9){
    $urlfile='<a href="https://gda2.ness.com.tn/assets/fichier/direct/محضر-جلسة-عامة.pdf" target="_blank" class="btn btn-sm btn-primary">محضر جلسة عامة</a>';
}else{
    $urlfile='<a href="https://gda2.ness.com.tn/assets/fichier/direct/محضر-جلسة-أول-اجتماع-مجلس-الادارة.pdf" target="_blank" class="btn btn-sm btn-primary">محضر جلسة أول اجتماع لمجلس الادارة  </a>';
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
            <?php echo $urlfile ?>
            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ajouterReunionPublique">إضافة</button>
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
            <th scope="col">التفاصيل</th>
            <th scope="col">تاريخ</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT * FROM reunionpublique where idGess='$idGess' and `active`='1' and numtype='$typeR'";
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
                    . $row['type'] .'
                    </td>
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
                                <a class="dropdown-item" href="controller/controller.php?idReunionDesacive='.$row["idReun"].'&type='.$typeR.'">حذف</a>
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


<div class="col-md-6">
  <div class="modal fade" id="ajouterReunionPublique" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card bg-secondary border-0 mb-0">
                <div class="card-header bg-transparent pb-5">
                    <div class="btn-wrapper text-center" id="newReunFrom">
                      <form action="controller/controller.php" method="post" class="text-center" enctype="multipart/form-data">
                        <input type="text" name="numtype" class="d-none" value="<?php echo $typeR ; ?>">
                        <div class="mb-3">
                            <label for="type" class="form-label">تفاصيل</label>
                            <input type="text" class="form-control" name="type" id="type">
                        </div>
                        <div class="mb-3">
                            <label for="newReun" class="form-label">ملف</label><br>
                            <input type="file" name="newReun" accept="image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf" id="newReunFile">
                        </div>
                        <br><br>
                        <button type="submit" class="btn btn-primary">اضافة</button>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
