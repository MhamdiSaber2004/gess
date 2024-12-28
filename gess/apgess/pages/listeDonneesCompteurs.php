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
                  <h3 class="mb-0">استهلاك العدادات </h3>
               </div>
               <div class="col-4 text-right">
               </div>
            </div>
            </div>
            <div class="row">
            <form  action="controller/controller.php" method="post">
              <div class="col-md-6">
               
                  <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                     <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                           <div class="modal-body p-0">
                              <div class="card bg-secondary border-0 mb-0">
                                 <div class="card-header bg-transparent pb-1">
                                    <h3 class=" text-center mt-2 mb-3">رفع العداد</h3>
                                    <br>
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <div class="form-group">
                                             <label class="form-control-label" for="input-country">رمز العداد</label>
                                             <input type="number" id="numCompteur" list="numeroCompteur" class="form-control form-control-alternative" placeholder="رمز العداد" name="numCompteur" value="588582">
                                             <datalist id="numeroCompteur">
                                                <?php
                                                   $idPompiste=$_SESSION['idPompiste'];
                                                   
                                                    $sql = "SELECT numCompteur FROM benefique INNER JOIN pompiste where pompiste.idGess=benefique.idGess AND idPompiste='$idPompiste' ";
                                                                  $result = $conn->query($sql);
                                                   
                                                                  if ($result->num_rows > 0) {
                                                                   while ($row = $result->fetch_assoc()) {
                                                                   echo "<option>".$row['numCompteur']."</option>";
                                                                  
                                                                   
                                                                 }
                                                                  }
                                                    ?>
                                             </datalist>
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="form-group">
                                             <label class="form-control-label" for="input-country">الرقم المستهلك</label>
                                             <input type="number" id="numConsomme" class="form-control form-control-alternative" placeholder="الرقم المستهلك" name="numConsomme" value="123">
                                          </div>
                                       </div>
                                       <h6 class="heading-small text-muted mb-4 text-red" id="erreur"><br></h6>
                                    </div>
              
              </div>
               
            </div>
               <div class="modal-footer flex-row-reverse">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
               <input type="submit" onclick=" return checkInputsConsommation()" name="ajoutConsommation" class="btn btn-primary" value="تسجيل">
               </div>
               </div>
               </div>
               </div>
               </div>
            </div>
            </form>
          </div>
         <div class="table-responsive col-12">
          <div id="alert" class="alert alert-<?php echo $_SESSION['messageClass'] ?> alert-dismissible fade <?php if($_SESSION['message']!="") echo "show"; else echo "visually-hidden"  ?>" role="alert" >
 <?php echo $_SESSION['message'];  unset($_SESSION['message']); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<table id="listeBenefique" class=" table  align-items-center table-striped table-flush">
               <thead class="thead-light">
                  <tr>
                     <th scope="col">العداد عدد</th>
                     <th scope="col">اسم و لقب صاحب العداد</th>
                     <th scope="col">الرقم الجديد</th>
                     <th scope="col">الرقم القديم</th>
                     <th scope="col">تاريخ التسجيل</th>
                     <th scope="col"></th>
                  </tr>
               </thead>
               <tbody>
                <?php


                                       $sql = "SELECT * FROM consommation inner join pompiste on pompiste.idPompiste=consommation.idPompiste where idGess='$idGess' order by consommation.date desc";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while ($row = $result->fetch_assoc()) {
                                            
                                            $numCompteur=$row["numCompteur"];
                                            $sql1 = "SELECT nom FROM benefique where numCompteur='$numCompteur'";
                                           $result1 = $conn->query($sql1);
                                           
                                           if ($result1->num_rows > 0) {
                                               // output data of each row
                                               $row1 = $result1->fetch_assoc();

                                              
                                               echo '
                                               <tr>
                                               <th scope="row">'
                                               . $row["numCompteur"] .'
                                               </th>
                                               <td>'
                                               .$row1['nom'].'
                    </td>
                    <td>'
                    . $row['numConsomme'] .'
                    </td>
                    <td>'
                    .$row['numConsommePrecedent'] .'
                    </td>
                    <td>'
                    . substr($row['date'], 0,10).'
                    </td>
                    
                    <td class="text-center">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v text-black-50"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="index.php?page=printConsommation&idConsommation='.$row['idConsommation'].'">تفاصيل و طباعة</a>
                          <a class="dropdown-item" data-toggle="modal" data-target="#modifier'.$row['idConsommation'].'" href="index.php?page=modifDonneesCompteur&idConsommation='.$row["idConsommation"].'">تحيين</a>
                          <a class="dropdown-item" data-toggle="modal" data-target="#supprimer'.$row['idConsommation'].'" href="index.php?page=listePompiste&action=supprimer&id=">حذف</a>
                        </div>
                      </div>
                    </td>
                    </tr>

                    
<div class="row">

<div class="col-md-6">
    <div class="modal fade" id="supprimer'.$row['idConsommation'].'" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">
        
          <div class="modal-body p-0">
            
<div class="card bg-secondary border-0 ">
  <div class="card-header bg-transparent pb-2">
      <h3 class=" text-center mt-2">حذف إستهلاك العداد ؟</h3><br>
      <div class="text-center mb-4">هل أنت متأكد أنك تريد حذف إستهلاك العداد ؟ <br><br>  رقم : '.$row['numCompteur'].' <br> صاحب العداد : '.$row1['nom'].' </div>
        
          <!--<div class="btn-wrapper text-center">
              <a href="controller/controller.php?idPompisteSupprimer='.$row['numCompteur'].'" name="supprimerPompiste" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--text">حذف</span>
              </a><br><br>
              <a href="#" class="btn btn-neutral btn-icon" data-dismiss="modal">
                  <span class="btn-inner--text" >إلغاء</span>
              </a>
          </div>-->
          
        
      
  </div>
 
</div>
<div class="modal-footer flex-row-reverse">
<button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
<a href="controller/controller.php?idConsommationSupprimer='.$row['idConsommation'].'" type="submit" onclick=" return checkInputsConsommation()" name="ajoutConsommation" class="btn btn-primary" >حذف</a>
</div>
          </div>
          
      </div>
  </div>
</div>

</div>
</div>


                   
<div class="row">
<form  action="controller/controller.php" method="post">
              <div class="col-md-6">
               
                  <div class="modal fade" id="modifier'.$row['idConsommation'].'" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                     <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                           <div class="modal-body p-0">
                              <div class="card bg-secondary border-0 mb-0">
                                 <div class="card-header bg-transparent pb-1">
                                    <h3 class=" text-center mt-2 mb-3">رفع العداد</h3>
                                    <br>
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <div class="form-group">
                                             <label class="form-control-label" for="input-country">رمز العداد</label>
                                             <input type="number" id="numCompteur" list="numeroCompteur" class="form-control form-control-alternative" placeholder="رمز العداد" name="numCompteur" value="'.$row['numCompteur'].'">
                                             <datalist id="numeroCompteur">
                                                
                                             </datalist>
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="form-group">
                                             <label class="form-control-label" for="input-country">الرقم المستهلك</label>
                                             <input type="number" id="numConsomme" class="form-control form-control-alternative" placeholder="الرقم المستهلك" name="numConsomme" value="'.$row['numConsomme'].'">
                                          </div>
                                       </div>
                                       <div class="col-lg-12 ">
                                          <div class="form-group">
                                             <label class="form-control-label visually-hidden" for="input-country">الرقم aaaa</label>
                                             <input type="number" id="idConsommation" class="form-control form-control-alternative" placeholder="الرقم aaa" name="idConsommation" value="'.$row['idConsommation'].'">
                                          </div>
                                       </div>
                                       <h6 class="heading-small text-muted mb-4 text-red" id="erreur"><br></h6>
                                    </div>
              
              </div>
               
            </div>
               <div class="modal-footer flex-row-reverse">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
               <input type="submit" onclick=" return checkInputsConsommation()" name="modifierConsommation" class="btn btn-primary" value="تسجيل">
               </div>
               </div>
               </div>
               </div>
               </div>
            </div>
            </form>
</div>


                                               ';
                                           }
                                          }
                                       }
                                       
                                       ?>
                
                  
                  
                </tbody>
            </table>
         </div>
      </div>
   </div>
</div>