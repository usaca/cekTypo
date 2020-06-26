<!-- Header -->
<?php 	include 'header.php'; ?>

<div class="container konten">
  <div class="row">
    <div class="col-sm-6">
      <div class="card input">
        <div class="card-body">
          <h3><b>INPUT</b></h3>
          <p>
            <i style="color: red">*Masukan kata yang ingin di cek</i>
          </p>
          <textarea id="input" name="input" class="form-control" rows="9"></textarea><br>
          <button id="btnproses" type="button" class="btn btn-primary btn-block"><b>LANGSUNG CEK</b></button>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card output">
        <div class="card-body">
          <h3><b>OUTPUT</b></h3>
          <div id="output"></div>
        </div>
      </div>
    </div>
  </div> 
</div>

<!-- Footer -->
<?php 	include 'footer.php'; ?>

<script>
$(document).ready(function(){
  $("#output").keydown(false);
  $('[data-toggle="tooltip"]').tooltip();   
});

  $('#btnproses').on('click', function () {
            
          url = "ajax/proses.php";
          var data=new FormData();
          var input     = document.getElementById("input").value;
          data.append('input',input);

          $.ajax({
            url : url,
            type : "POST",
            data : data,
            processData: false, 
            contentType: false,
            success : function(data){             
              $("#output").html(data);
            },
            error : function(){
                $("#output").html('Something Error !');
            }        
          });
          return false;
      });
</script>
</body>
</html>