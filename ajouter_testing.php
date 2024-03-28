<?php
require("index.php");
$cur_user = "user1";

session_start();

$resultUser = mysqli_query($conn,"SELECT * FROM users where login ='$cur_user'");

while($resUser = mysqli_fetch_array($resultUser)){
    $theName = $resUser['nom'];
}

?>
<!DOCTYPE html>
<html>
<head>
        <!-- Bootstrap -->
<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.3/skins/flat/green.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/scroller/2.0.4/css/scroller.bootstrap.min.css" rel="stylesheet">



    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Vente Articles</title>
    <style>
  #container {
    max-width: 90%;  
  }

  .step-container {
    position: relative;
    text-align: center;
    transform: translateY(-43%);
  }

  .step-button {
    width: auto; /* Adjusted width to fit the text */
    height: auto; /* Adjusted height to fit the text */
    padding: 10px 20px; /* Added padding for better appearance */
    border-radius: 25px; /* Adjusted border radius for button shape */
    background-color: #fff;
    border: 2px solid #007bff;
    font-weight: bold;
    font-size: 14px; /* Reduced font size */
    margin-bottom: 10px;
    cursor: pointer; /* Added cursor pointer */
  }

  .step-line {
    position: absolute;
    top: 26px;
    left: 25px;
    width: calc(100% - 50px);
    height: 2px;
    background-color: #007bff;
    z-index: -1;
  }

  #multi-step-form {
    overflow-x: hidden;
  }

  .reached {
    background-color: #007bff; /* Blue color */
    color: #fff; /* White text color */
  }
  
</style>
</head>
<body>


<div id="container" class="container mt-5">
  <div class="progress px-1" style="height: 3px;">
    <div class="progress-bar" id="progressBar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
  </div>
  <div class="step-container d-flex justify-content-between">
    <button class="btn btn-outline-primary step-button" onclick="if($(this).hasClass('reached')){ window.location.href = 'theOfficial_ajouter_article.php?user='+'<?= $cur_user ?>' } else { displayStep(1); }">select articles</button>
    <button class="btn btn-outline-primary step-button" onclick="if($(this).hasClass('reached')){ window.location.href = 'theOfficial_client_request.php?user='+'<?= $cur_user ?>' } else { displayStep(2); }">confirm articles</button>
    <button class="btn btn-outline-primary step-button" onclick="displayStep(3)">make a report</button>
  </div>
</div>


<!-- Bootstrap JS and dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- Dropdown button -->
<div class="dropdown">
    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-th" style="font-size: 20px;color: bluegray;"></i>
    </button>
    <div class="dropdown-menu">
        <a id="ajoutArticle" class="dropdown-item" href="#">Ajouter article</a>
        <a id="ajoutClient" class="dropdown-item" href="#">Ajouter client</a>
    </div>
</div>

<!-- Modal for adding article -->
<div class="modal fade" id="addArticleModal" tabindex="-1" role="dialog" aria-labelledby="addArticleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addArticleModalLabel">Ajouter un article</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <!-- Form for adding article -->
                <div>
                    <label for="code_g_article">Code</label>
                    <input type="text" id="code_g_article" class="form-control">
                </div>
                <div>
                    <label for="designation_g_article">Designation</label>
                    <input type="text" id="designation_g_article" class="form-control">
                </div>
                <div>
                    <label for="pth_article">Prix th</label>
                    <input type="text" id="pth_article" class="form-control">
                </div>
                <div>
                    <label for="unite_g_article">Unite</label>
                    <input type="text" id="unite_g_article" class="form-control">
                </div>
                <div>
                    <label for="tva_g_article">%TVA</label>
                    <input type="text" id="tva_g_article" class="form-control">
                </div>
                <div>
                    <label for="categorie_g_article">CATEGORIE</label>
                    <input type="text" id="categorie_g_article" class="form-control">
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="saveArticleBtn">Enregistrer</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addClientModal" tabindex="-1" role="dialog" aria-labelledby="addClientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          
            <div class="modal-header">
                <h5 class="modal-title" id="addClientModalLabel">Ajouter un client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                
                <div>
                    <label for="client_client">Client</label>
                    <select id="client_client" class="form-control">
                    <?php  
        $result = mysqli_query($conn,"SELECT * FROM client");
        while($r = mysqli_fetch_array($result)){ ?>
            <option value="<?= $r["client"] ?>"><?= $r["client"] ?></option>
        <?php } ?>
                    </select>
                </div>
                <div>
                    <label for="categorie_client">Catégorie</label>
                    <select id="categorie_client" class="form-control">
                    <?php  
        $result = mysqli_query($conn,"SELECT * FROM categorie");
        while($r = mysqli_fetch_array($result)){ ?>
            <option value="<?= $r["categorie"] ?>"><?= $r["categorie"] ?></option>
        <?php } ?>
                    </select>
                </div>
                <div>
                    <label for="projet_client">Projet</label>
                    <input type="text" id="projet_client" class="form-control">
                </div>
                <div>
                    <label for="description_client">Description</label>
                    <input type="text" id="description_client" class="form-control">
                </div>
                <div>
                    <label for="num_client">Num</label>
                    <input type="text" id="num_client" class="form-control">
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="saveClientBtn">Enregistrer</button>
            </div>
        </div>
    </div>
</div>

        <br>
        <div class="container">
    <div class="row">
        <div class="col text-center">
            <h1 class="display-4">vent article</h1>
        </div>
        
    </div>
</div>
        <input type="text" id="searchBox" class="form-control" placeholder="Search...">
        <br>
        <table id="myTable" class="table">
            <thead>
                <tr>
                <th data-column="0">Code <span class="ms-1"><i class="fas fa-caret-down"></i></span></th>
            <th data-column="1">Article <span class="ms-1"><i class="fas fa-caret-down"></i></span></th>
            <th data-column="2">Unité <span class="ms-1"><i class="fas fa-caret-down"></i></span></th>
            <th data-column="3">Prix HT <span class="ms-1"><i class="fas fa-caret-down"></i></span></th>
            <th data-column="4">Quantité <span class="ms-1"><i class="fas fa-caret-down"></i></span></th>
            <th data-column="5">Total HT <span class="ms-1"><i class="fas fa-caret-down"></i></span></th>
            <th data-column="6">TVA <span class="ms-1"><i class="fas fa-caret-down"></i></span></th>
            <th data-column="7">Prix TTC <span class="ms-1"><i class="fas fa-caret-down"></i></span></th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
$result = mysqli_query($conn, "SELECT * FROM vente_article where statut = 'selection' and user = '$cur_user' ");
?>
                <tr>
                    <td>
                        <select id="id_code" onchange="find(this.value)" class="form-control" required>
                            <?php 
                            $result_for_code = mysqli_query($conn, "SELECT * FROM article");
                            while($res = mysqli_fetch_array($result_for_code)){ 
                                echo "<option value='". $res['code'] ."'>". $res['code'] ."</option>";
                            } 
                            ?>
                        </select>
                    </td>
                    <td>
                        <input list="browsers" id="id_article" onchange="find1(this.value)" class="form-control" required>
                        <datalist id="browsers">
                            <?php 
                            $result_for_article = mysqli_query($conn, "SELECT * FROM article ");
                            while($res = mysqli_fetch_array($result_for_article)){ 
                                echo "<option value='". $res['article'] ."'>";
                            } 
                            ?>
                        </datalist>
                    </td>
                    <input type="hidden" id="id">
                    <td><input type="text" id="id_Unité" class="form-control" disabled required></td>
                    <td><input onchange="calcul(this.value)" type="number" class="Prix_HT form-control" required></td>
                    <td><input onchange="calcul1(this.value)" type="number" class="quantity form-control" required ></td>
                    <td><input type="number" id="Prix_Total_HT" class="form-control" disabled required ></td>
                    <td><input type="number" id="TVA" class="form-control" required></td>
                    <td><input type="number" id="Prix_TTC" class="form-control" disabled required></td>
                    <td><input type="button" id="add_to_sells" class="form-control" value="Ajouter" required>   </td>
                </tr>
                <?php 
                while($row = mysqli_fetch_array($result)){ 
                    $total_ht = $row["prix_ht"] * $row["quantite"];
                    $prix_ttc = $total_ht + $total_ht * $row["tva"];
                ?>
<tr id="<?= $row["id"] ?>">
    <td><?= $row["code"] ?></td>
    <td><?= $row["article"] ?></td>
    <td><?= $row["unite"] ?></td>
    <td><?= $row["prix_ht"] ?></td>
    <td><?= $row["quantite"] ?></td>
    <td id="total_ht_<?= $row["id"] ?>"><?= $total_ht ?></td>
    <td><?= $row["tva"] ?></td>
    <td id="prix_ttc_<?= $row["id"] ?>"><?= $prix_ttc ?></td>
    <td>
        <a class="edit" data-toggle="modal" data-target=".bs-example-modal-lg1">
            <i class="fa fa-edit update" style="font-size: 20px;color: bluegray;" 
                data-toggle="tooltip" 
                data-id="<?php echo $row["id"]; ?>"
                data-code="<?php echo $row["code"]; ?>"
                data-article="<?php echo $row["article"]; ?>"
                data-unite="<?php echo $row["unite"]; ?>"
                data-prix_ht="<?php echo $row["prix_ht"]; ?>"
                data-tva="<?php echo $row["tva"]; ?>"
                data-quantite="<?php echo $row["quantite"]; ?>"
                title="Edit"
            ></i>
        </a>
    
        &nbsp;&nbsp;

        <a class="delete" data-toggle="modal" data-target=".bs-example-modal-lg2">
    <i class="fa fa-trash-o sup" style="font-size: 20px;color: bluegray;" 
       data-toggle="tooltip" 
       data-id-del="<?= $row["id"]; ?>"
       title="Supprimer"
    ></i>
</a>
    </td> 
</tr>

                <?php }?>
            </tbody>
        </table><br>
    <br><br><br><br>

 
<!-- Bootstrap and other JS libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <script>



        // calculate part start
        function calcul(prix) {
            var qnt = $(".quantity").val();
            var tva = $("#TVA").val();
            if (isNaN(prix) || isNaN(qnt) || isNaN(tva)) {
                alert("Please enter valid numbers");
            } else {
                var discount = prix * qnt;
                document.getElementById("Prix_Total_HT").value = discount;
                document.getElementById("Prix_TTC").value = discount + discount * tva;
            }
        }
        function calcul1(qnt) {
            var prxH = $(".Prix_HT").val();
            var tva = $("#TVA").val();
            if (isNaN(prxH) || isNaN(qnt) || isNaN(tva)) {
                alert("Please enter valid numbers");
            } else {
                var discount = qnt * prxH;
                document.getElementById("Prix_Total_HT").value = discount;
                document.getElementById("Prix_TTC").value = discount + discount * tva;
            }
        }
        // finish

        // search part start
        function find(code) {
            $.ajax({
                url: "chercher_code.php",
                type: "GET",
                data: {
                    code: code,
                },
                cache: false,
                success: function(data) {
                    var dat = JSON.parse(data);


                    $("#id_Unité").val(dat.unite)
                    $(".Prix_HT").val(dat.prix)
                    $("#id_article").val(dat.article)
                    $("#TVA").val(dat.tva)
                    $("#id_Unité").val(dat.unite)

                 
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
        function find1(article) {
            $.ajax({
                url: "chercher_article.php",
                type: "GET",
                data: {
                    article: article,
                },
                cache: false,
                success: function(data) {
                    var dat = JSON.parse(data);

 
                    $("#id_Unité").val(dat.unite)
                    $(".Prix_HT").val(dat.prix)
                    $("#id_code").val(dat.code)
                    $("#TVA").val(dat.tva)
                    $("#id_Unité").val(dat.unite)
                    

                 
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
            
        }
        // finish

        // ajouter operation
$("#add_to_sells").on("click", function() {
 


    $.ajax({
        url: "add_to_sells.php",
        type: "POST",
        data: {
            code: $('#id_code').val(),          
            article: $('#id_article').val(),   
            unite: $('#id_Unité').val(),      
            Prix_HT: $('.Prix_HT').val(),    
            quantity: $('.quantity').val(),    
            TVA: $('#TVA').val(),              
            Prix_Total_HT: $('#Prix_Total_HT').val(),   
            Prix_TTC: $('#Prix_TTC').val(),
            id :  $("#id").val(),
            user : "<?= $cur_user ?>"
        },
        cache: false,
        success: function(data) {
            alert(data);
        },

    });
    location.reload()
});
        // finish

        // update start here 
 $(".update").on("click", function(e) {
   
    var id = $(this).attr("data-id");
    var code = $(this).attr("data-code");
    var article = $(this).attr("data-article");
    var unite = $(this).attr("data-unite");
    var prix_ht = $(this).attr("data-prix_ht");
    var quantite = $(this).attr("data-quantite");
    var tva = $(this).attr("data-tva");



    $("#id_code").val(code);
    $("#id_article").val(article);
    $("#id_Unité").val(unite);
    $(".Prix_HT").val(prix_ht);
    $(".quantity").val(quantite);
    $("#Prix_Total_HT").val(prix_ht * quantite);
    $("#TVA").val(tva);
    $('#id').val(id);

});
        // finish

        //delete part start 
$(".delete").on("click", function(){
    var id = $(this).find("i").attr("data-id-del"); 
    var really = confirm("Are you sure?");
    if (really) {
        $.ajax({
            url: "del_op.php",
            type: "POST",
            data: {
                id: id
            },
            cache: false,
            success: function(response){
                alert(response);
            }
        });
    } else {
        alert("Operation canceled.");
       
    }
    location.reload()
    
});

        //finish

        // ADD client devis
        $("#ajoutClient").click(function(){
          
            $("#addClientModal").modal("show");
        });

       
        $("#saveClientBtn").click(function(){
            
            $.ajax({
                url: "add_client_devis.php",
                type: "POST",
                data: {
                   
                    client: $("#client_client").val(),
                    categorie: $("#categorie_client").val(),
                    projet: $("#projet_client").val(),
                    description: $("#description_client").val(),
                    num: $("#num_client").val(),
                    user : "<?= $cur_user ?>"
                },
                success: function(data){
                    alert(data);
                   
                    $("#addClientModal").modal("hide");
                },
                error: function(xhr, status, error){
                    alert("Error: " + error);
                }
            });
            location.reload()
        });
    

// finish client devis

$(document).ready(function(){
        
        $("#ajoutArticle").click(function(){
            $("#addArticleModal").modal("show");
        });

   
        $("#saveArticleBtn").click(function(){
          
            $.ajax({
                url: "add_new_article.php",
                type: "POST",
                data: {
                    code: $('#code_g_article').val(),
                    article: $('#designation_g_article').val(), 
                    prix_ht: $('#pth_article').val(),
                    unite: $('#unite_g_article').val(),
                    tva: $('#tva_g_article').val(),
                    categorie: $('#categorie_g_article').val()
                },
                success: function(data){
                    alert(data);
                    $("#addArticleModal").modal("hide");
                },
                error: function(xhr, status, error){
                    console.log(error);
                }
            });
            location.reload()
        });})

// filtering mechanism
    var searchBox = document.getElementById("searchBox");
        var table = document.getElementById("myTable");
        
        searchBox.addEventListener("keyup", function() {
            var keyword = this.value.toUpperCase();
            var allRows = table.getElementsByTagName("tr");
            
            for (var i = 0; i < allRows.length; i++) {
                var allColumns = allRows[i].getElementsByTagName("td");
                var found = false;
                
                for (var j = 0; j < allColumns.length; j++) {
                    var columnValue = allColumns[j].textContent || allColumns[j].innerText;
                    columnValue = columnValue.toUpperCase();
                    
                    
                    if (columnValue.indexOf(keyword) > -1) {
                        found = true;
                        break;
                    }
                }
                
                if (found) {
                    allRows[i].style.display = "";
                } else {
                    allRows[i].style.display = "none";
                }
            }
        });

        // sorting mechanism

        $(document).ready(function(){
    $('th').on('click', function(){
        var column = $(this).data('column');
        var rows = $('tbody > tr').get();
        var sortOrder = $(this).data('order') || 'asc';
        
        rows.sort(function(a, b) {
            var A = $(a).children('td').eq(column).text().toUpperCase();
            var B = $(b).children('td').eq(column).text().toUpperCase();
            return $.isNumeric(A) && $.isNumeric(B) ? A - B : A.localeCompare(B);
        });

        if (sortOrder === 'asc') {
            $(this).data('order', 'desc');
            $(this).find('i').removeClass('fa-caret-down').addClass('fa-caret-up');
            rows.reverse();
        } else {
            $(this).data('order', 'asc');
            $(this).find('i').removeClass('fa-caret-up').addClass('fa-caret-down');
        }

        $.each(rows, function(index, row) {
            // Exclude inputs from sorting
            var $inputs = $(row).find('input');
            if ($inputs.length === 0) {
                $('tbody').append(row);
            }
        });
    });
});

function NumRows() {
    $.ajax({
        url: "NumRows.php",
        type: "POST",
        data: {
            theUser: "<?php echo $cur_user; ?>"
        },
        success: function(data) {
            var rowCount = parseInt(data);
            if (rowCount > 0) {
                $('.step-button:eq(1)').addClass('active');
                nextStep(); // Automatically trigger next step
            } else {
                $('.step-button:eq(1)').removeClass('active');
            }
        }
    });
}

$(document).ready(function() {
    NumRows(); // Call the function when the page loads
    
    // Event delegation for dynamically added elements
    $('.step-container').on('click', '.step-button', function() {
        if ($(this).hasClass('reached')) {
            var stepNumber = $(this).index() + 1;
            displayStep(stepNumber);
        } else {
            // Handle the case when the button is not reached
            alert("Please complete the previous steps.");
        }
    });
});

var currentStep = 1;
var totalSteps = 3;

function updateProgressBar() {
    var progressPercentage = ((currentStep - 1) / (totalSteps - 1)) * 100;
    $(".progress-bar").css("width", progressPercentage + "%");

    if (currentStep === totalSteps) {
        $(".step-button").addClass("reached");
    } else {
        $(".step-button").removeClass("reached");
        for (var i = 1; i <= currentStep; i++) {
            $(".step-button:nth-child(" + i + ")").addClass("reached");
        }
    }
}

function displayStep(stepNumber) {
    if (stepNumber >= 1 && stepNumber <= totalSteps && stepNumber <= currentStep) {
        if (stepNumber > 1 && !$(".step-button").hasClass("reached")) {
            currentStep = stepNumber;
            updateProgressBar();
        }
        alert("Step " + stepNumber);
    }
}


<?php if(isset($_SESSION['procced_id']) && $_SESSION['procced_id'] >= 2) { ?>
    currentStep = 2;
    updateProgressBar();
<?php } ?>


function nextStep() {
    if (currentStep < totalSteps) {
        currentStep = 2
        updateProgressBar();
    }
}

</script>
</body>
</html>
