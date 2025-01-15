
  <?php 

  $year = date("Y");

  $sql="SELECT * FROM `rapport_financier` where idGess='$idGess' and annee='$year'";
  $result = $conn->query($sql);
    
  if ($result->num_rows == 0) {

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
                  <h3 class="mb-0">عناصر التقرير المالي   </h3>
                </div>

                <div class="col-4 text-right">
                  <a href="#" class="btn btn-sm btn-primary" onclick="printPompiste('printDiv')">طباعة </a>
                </div>
              </div>
            </div>





            <div class="table-responsive col-12">
            <div id="alert" class="alert alert-<?php echo $_SESSION['messageClass'] ?> alert-dismissible fade <?php if($_SESSION['message']!="") echo "show"; else echo "visually-hidden"  ?>" role="alert" >
  <?php echo $_SESSION['message'];  unset($_SESSION['message']); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

  <div class="no-print bg-secondary"  id="printDiv">


  <form>
  <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">مقدمة </label>
                        <div id="inputArea1" ><textarea name="introduction" id="introduction" cols="100" rows="4" style="border: 0;" placeholder="........................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................"></textarea></div>
                      </div>
                    </div>


                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">مقارنة الوضعية المالية الحالية مع وضعية السنة الفارطة </label>
                      </div>
                    </div>



                    <table style="border: 1px solid; width:70%">
                    <tr>
                      <td class="text-center" style="border: 1px solid;"></td>
                      <td class="text-center" style="border: 1px solid;">السنة السابقة</td>
                      <td class="text-center" style="border: 1px solid;">السنة الحالية</td>
                      <td class="text-center" style="border: 1px solid;">الفارق</td>
                      <td class="text-center" style="border: 1px solid;">%</td>
                    </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">الرصيد الجملي في أول سنة</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp01" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp02" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp03" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp04" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" colspan="5">المداخيل</td>
                      </tr>




                      <tr>
                        <td class="text-center" style="border: 1px solid;">انخراطات</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp11" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp12" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp13" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp14" style="width: 100px;border: 0;"></td>
                      </tr>


                      <tr>
                        <td class="text-center" style="border: 1px solid;">اشتراكات</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp21" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp22" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp23" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp24" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">بيع ماء</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp31" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp32" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp33" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp34" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مداخيل أنشطة أخرى</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp41" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp42" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp43" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp44" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مداخيل مختلفة</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp51" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp52" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp53" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp54" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مداخيل قروض</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp61" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp62" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp63" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp64" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">جملة المداخيل</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp71" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp72" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp73" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp74" style="width: 100px;border: 0;"></td>
                      </tr>


                      <tr>
                        <td class="text-center" colspan="5">المداخيل</td>
                      </tr>

                      <tr>
                        <td class="text-center" style="border: 1px solid;">اشتراكات</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp81" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp82" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp83" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp84" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">شراء الماء</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp91" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp92" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp93" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp94" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">الطاقة</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp101" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp102" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp103" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp104" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مصاريف استغلال أخرى</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp111" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp112" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp113" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp114" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">صيانة و اصلاح</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp121" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp122" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp123" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp124" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">أجور</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp131" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp132" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp133" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp134" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">ادارة و تصرف</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp141" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp142" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp143" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp144" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مصاريف مختلفة</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp151" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp152" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp153" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp154" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مصاريف الأنشطة الأخرى</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp161" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp162" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp163" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp164" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">استثمار و تجهيز</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp171" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp172" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp173" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp174" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">جملة المصاريف</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp181" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp182" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp183" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp184" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">الرصيد في آخر سنة</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp191" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp192" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp193" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="inp194" style="width: 100px;border: 0;"></td>
                      </tr>


                    </table>






                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">	التعليق على البيانات</label>
                        <div id="inputArea1" ><textarea name="commentairesSurDonnees1" id="commentairesSurDonnees1" cols="100" rows="4" style="border: 0;" placeholder="........................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................"></textarea></div>
                      </div>
                    </div>






                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">	مقارنة بين توقعات الميزانية و تنفيذها   </label>
                      </div>
                    </div>



                    <table style="border: 1px solid; width:70%">
                    <tr>
                      <td class="text-center" style="border: 1px solid;"></td>
                      <td class="text-center" style="border: 1px solid;">السنة السابقة</td>
                      <td class="text-center" style="border: 1px solid;">السنة الحالية</td>
                      <td class="text-center" style="border: 1px solid;">الفارق</td>
                      <td class="text-center" style="border: 1px solid;">%</td>
                    </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">الرصيد الجملي في أول سنة</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" colspan="5">المداخيل</td>
                      </tr>




                      <tr>
                        <td class="text-center" style="border: 1px solid;">انخراطات</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                      </tr>


                      <tr>
                        <td class="text-center" style="border: 1px solid;">اشتراكات</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">بيع ماء</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مداخيل أنشطة أخرى</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مداخيل مختلفة</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مداخيل قروض</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">جملة المداخيل</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                      </tr>


                      <tr>
                        <td class="text-center" colspan="5">المداخيل</td>
                      </tr>

                      <tr>
                        <td class="text-center" style="border: 1px solid;">اشتراكات</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">شراء الماء</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">الطاقة</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مصاريف استغلال أخرى</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">صيانة و اصلاح</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">أجور</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">ادارة و تصرف</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مصاريف مختلفة</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مصاريف الأنشطة الأخرى</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">استثمار و تجهيز</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">جملة المصاريف</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">الرصيد في آخر سنة</td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                        <td class="text-center" style="border: 1px solid;"><input type="text"  id="" style="width: 100px;border: 0;"></td>
                      </tr>


                    </table>






                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">	التعليق على البيانات</label>
                        <div id="inputArea1" ><textarea name="commentairesSurDonnees2" id="commentairesSurDonnees2" cols="100" rows="4" style="border: 0;" placeholder="........................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................"></textarea></div>
                      </div>
                    </div>




                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">	نسبة استخلاص الديون</label>
                        <div id="inputArea1" ><textarea name="pourcentagePayementDette" id="pourcentagePayementDette" cols="100" rows="4" style="border: 0;" placeholder="........................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................"></textarea></div>
                      </div>
                    </div>




                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">	اقتراحات مجلس الادارة</label>
                        <div id="inputArea1" ><textarea name="suggestionsGess" id="suggestionsGess" cols="100" rows="4" style="border: 0;" placeholder="........................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................"></textarea></div>
                      </div>
                    </div>




                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">	مسائل مالية مختلفة</label>
                        <div id="inputArea1" ><textarea name="suggestionsAutreFinance" id="suggestionsAutreFinance" cols="100" rows="4" style="border: 0;" placeholder="........................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................"></textarea></div>
                      </div>
                    </div>

  </div>



              
            </div>
            
          </div>
        </div>
      </div>
</form> 

<script>
  <?php
    for($i=0 ; $i<20 ; $i++){
      ?>
        document.getElementById('inp<?php echo $i ?>2').addEventListener("keyup", function(){
          var deff<?php echo $i ?>=document.getElementById('inp<?php echo $i ?>2').value - document.getElementById('inp<?php echo $i ?>1').value;
          document.getElementById("inp<?php echo $i ?>3").value = deff<?php echo $i ?>;

          var moy<?php echo $i ?>=(parseFloat(deff<?php echo $i ?>) / parseFloat(document.getElementById('inp<?php echo $i ?>1').value))*100;
          document.getElementById("inp<?php echo $i ?>4").value = moy<?php echo $i ?>;

        })
      <?php
    }
  ?>
</script>









