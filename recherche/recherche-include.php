<?php

$_SESSION['dejaafiche'] = 0;

?>
<style type="text/css">
  .centrer{
    float: none;
    margin: 0 auto;
  }
</style>
<div class="col-lg-8 col-xs-12 col-md-9 col-sm-10 centrer">


<form id="searchForm" name="moteurSubmit"  method="GET" action="">
  <fieldset>

<!-- Form Name -->
<b><img width="25"  src="../ressources/images_site/loupe.png">Effectuez Une Recherche:</b><br>
  <div class="form-group">


    <input type="search" autocomplete="off" class="form-control" placeholder="Les resultats apparaitrons automatiquement"  value="<?php if(isset($_POST['recherche'])) { echo htmlspecialchars($_POST['recherche']); } ?>" name="recherche" id="recherche" />


</div>
</fieldset>

<span style="display:none;" class="resultat_rech" ><center><b>Resultat De La Recherche Sur: <span class="result_proprely"></span></b></center></span>
<br>
<div id="global_result" style="display:none;">
  <style type="text/css">
    #result_search{

overflow: auto;
    }

  .cach:hover{
    background-color: #fff;

  }
  .cach:focus{
    background-color: #fff;

  }


  </style>
  <div id="result_search" style="display:none; background:#673ab73b;">
  </div>
  <center><span class=" btn btn-warning" id="close_result_search">Masquer Les Resultat</span></center></div>
</form>



    </div>


<script type="text/javascript">
  $("#recherche").on("keydown",
  function(e) {

$('#result_search').show();
  var val_recherche = $("#recherche").val();
  var tmp = parseInt(val_recherche
    );
  if (val_recherche == "") {
         $('#result_search').html("");
         $('#result_search').hide();
         $('.resultat_rech').hide();
          $('#global_result').hide();
          $('#close_result_search').hide();



  }
  $('#global_result').show();
  $('.result_proprely').html(val_recherche);
                 $.ajax({

                            url:"../recherche/search_result_is.php?recherche="+val_recherche,
            success:function(html){
                              if( html){
                            $('#result_search').show();

                            $('.resultat_rech').show();
                            $('#close_result_search').show();
                                $('#result_search').html(html);







                              }




                            }


                          });

    // body...
  });
  $('#close_result_search').on("click", function(e) {
    $('#global_result').hide();
$('#result_search').hide();
$('.resultat_rech').hide();
    // body...
  });
    $('.cach').on("click", function(e) {
e.preventDefault();
    // body...
  });

</script>

