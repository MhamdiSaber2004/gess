
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
  <!-- 
                    <td class="text-center" style="border: 1px solid;"><div id="inputArea20"style="width:100%"  onclick="makeEditable(this);" contenteditable="true">إضغط مرتين لإضافة معطيات</div></td>
  -->
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" colspan="5">المداخيل</td>
                      </tr>




                      <tr>
                        <td class="text-center" style="border: 1px solid;">انخراطات</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>


                      <tr>
                        <td class="text-center" style="border: 1px solid;">اشتراكات</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">بيع ماء</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مداخيل أنشطة أخرى</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مداخيل مختلفة</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مداخيل قروض</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">جملة المداخيل</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>


                      <tr>
                        <td class="text-center" colspan="5">المداخيل</td>
                      </tr>

                      <tr>
                        <td class="text-center" style="border: 1px solid;">اشتراكات</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">شراء الماء</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">الطاقة</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مصاريف استغلال أخرى</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">صيانة و اصلاح</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">أجور</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">ادارة و تصرف</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مصاريف مختلفة</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مصاريف الأنشطة الأخرى</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">استثمار و تجهيز</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">جملة المصاريف</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">الرصيد في آخر سنة</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
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
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" colspan="5">المداخيل</td>
                      </tr>




                      <tr>
                        <td class="text-center" style="border: 1px solid;">انخراطات</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>


                      <tr>
                        <td class="text-center" style="border: 1px solid;">اشتراكات</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">بيع ماء</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مداخيل أنشطة أخرى</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مداخيل مختلفة</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مداخيل قروض</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">جملة المداخيل</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>


                      <tr>
                        <td class="text-center" colspan="5">المداخيل</td>
                      </tr>

                      <tr>
                        <td class="text-center" style="border: 1px solid;">اشتراكات</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">شراء الماء</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">الطاقة</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مصاريف استغلال أخرى</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">صيانة و اصلاح</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">أجور</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">ادارة و تصرف</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مصاريف مختلفة</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مصاريف الأنشطة الأخرى</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">استثمار و تجهيز</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">جملة المصاريف</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">الرصيد في آخر سنة</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>


                    </table>






                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">	التعليق على البيانات</label>
                        <div id="inputArea1" >....................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................</div>
                      </div>
                    </div>




                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">	نسبة استخلاص الديون</label>
                        <div id="inputArea1" >....................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................</div>
                      </div>
                    </div>




                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">	اقتراحات مجلس الادارة</label>
                        <div id="inputArea1" >....................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................</div>
                      </div>
                    </div>




                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">	مسائل مالية مختلفة</label>
                        <div id="inputArea1" >....................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................</div>
                      </div>
                    </div>

  </div>



              
            </div>
            
          </div>
        </div>
      </div>
</form>  









