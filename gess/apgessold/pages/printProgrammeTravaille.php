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
     
            <div class="col-xl-12 order-xl-1">
          <div class="card bg-white shadow">
            <div class="card-header bg-secondary border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0"><button onclick="printPompiste('printDiv')" class="btn btn-sm btn-primary">طباعة</button> </h3>
                </div>
                <div class="col-4 text-right">
                  <a href="index.php?page=listePompiste" class="btn btn-sm btn-primary">رجوع</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              




<div class="no-print" id="printDiv">
    <br><br>
    <div class="container text-center text-black">
        <div class="row">
          <div class="col-3">
          التاريخ :............................   
          </div>
          <div class="col-3">
          </div>
          <strong class="col">
          الزيارة عدد : ..................
          </strong>
        </div>
      </div>
<br>
      <div class="container text-center text-black">
        <div class="row">
          <div class="col-3">
          </div>
          <div class="col-3">
          <small class="d-flex justify-content-start text-black"> <img src="assets/img/reunion/programmeTravail.png" alt="" style="width:90%;">  &nbsp;<br></small>

          </div>
          <strong class="col">
          </strong>
        </div>
      </div>

    <small class="d-flex justify-content-start text-black">تم الاتفاق على  ما يلي :   &nbsp;<br></small>
    <br><table style="border: 1px solid;width:70%">
      <tr style="border: 1px solid;">
      <td style="border: 1px solid;"><small>ع/ر </small></td>
      <td style="border: 1px solid;"><small>النشاط </small></td>
        <td style="border: 1px solid;"><small>المشرفون  </small></td>
        <td style="border: 1px solid;"><small>اخر اجل للانجاز </small>    </td>
      </tr>
      <tr style="border: 1px solid;">
        <td style="border: 1px solid;">1</td>
        <td  style="border: 1px solid;"></td>
        <td  style="border: 1px solid;"></td>
        <td  style="border: 1px solid;"></td>
      </tr>
      <tr style="border: 1px solid;">
        <td style="border: 1px solid;">2</td>
        <td  style="border: 1px solid;"></td>
        <td  style="border: 1px solid;"></td>
        <td  style="border: 1px solid;"></td>
      </tr>
      <tr style="border: 1px solid;">
        <td style="border: 1px solid;">3</td>
        <td  style="border: 1px solid;"></td>
        <td  style="border: 1px solid;"></td>
        <td  style="border: 1px solid;"></td>
      </tr>
      <tr style="border: 1px solid;">
        <td style="border: 1px solid;">4</td>
        <td  style="border: 1px solid;"></td>
        <td  style="border: 1px solid;"></td>
        <td  style="border: 1px solid;"></td>
      </tr>
      <tr style="border: 1px solid;">
        <td style="border: 1px solid;">5</td>
        <td  style="border: 1px solid;"></td>
        <td  style="border: 1px solid;"></td>
        <td  style="border: 1px solid;"></td>
      </tr>
      <tr style="border: 1px solid;">
        <td style="border: 1px solid;">6</td>
        <td  style="border: 1px solid;"></td>
        <td  style="border: 1px solid;"></td>
        <td  style="border: 1px solid;"></td>
      </tr>
      <tr style="border: 1px solid;">
        <td style="border: 1px solid;">7</td>
        <td  style="border: 1px solid;"></td>
        <td  style="border: 1px solid;"></td>
        <td  style="border: 1px solid;"></td>
      </tr>
      <tr style="border: 1px solid;">
        <td style="border: 1px solid;">8</td>
        <td  style="border: 1px solid;"></td>
        <td  style="border: 1px solid;"></td>
        <td  style="border: 1px solid;"></td>
      </tr>
      <tr style="border: 1px solid;">
        <td style="border: 1px solid;">9</td>
        <td  style="border: 1px solid;"></td>
        <td  style="border: 1px solid;"></td>
        <td  style="border: 1px solid;"></td>
      </tr>
      <tr style="border: 1px solid;">
        <td style="border: 1px solid;">10</td>
        <td  style="border: 1px solid;"></td>
        <td  style="border: 1px solid;"></td>
        <td  style="border: 1px solid;"></td>
      </tr>
      <tr><td><br><br><br><br><br></td></tr>
    
    </table>

<br>
    <div class="container text-center text-black">
        <div class="row">
          <div class="col-3">
          الفريق : <br>
          ......................................................<br>
          ......................................................<br>
          ......................................................<br>
          ......................................................<br>
          ......................................................<br>
          </div>
          <div class="col-3">
          </div>
          <div class="col-3">
          أعضاء مجلس الإدارة : <br>
          ......................................................<br>
          ......................................................<br>
          ......................................................<br>
          ......................................................<br>
          ......................................................<br>
          </div>
        </div>
      </div>


    
</div>






        </div>
 
           
          </div>


          <script>
function printPompiste(areaID){
    var printContent = document.getElementById(areaID).innerHTML;
    var originalContent = document.body.innerHTML;
    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
}
</script>

   