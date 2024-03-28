<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un client devis</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        /* Adjustments to form elements */
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: 400;
        }
        h1 {
            font-weight: 300;
        }
        /* Add more custom styles as needed */
    </style>
</head>
<body>

<div>
    <h1 class="text-left ml-3">Ajouter un client devis</h1>
    <div class="ml-3">
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="client_client">Client</label>
                    <select id="client_client" class="form-control">
                    <?php  
                            include("index.php");
                            $result = mysqli_query($conn,"SELECT * FROM client");
                            while($r = mysqli_fetch_array($result)){ 
                                echo '<option value="'.$r["client"].'">'.$r["client"].'</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="categorie_client">Catégorie</label>
                    <select id="categorie_client" class="form-control">
                    <?php  
                            $result = mysqli_query($conn,"SELECT * FROM categorie");
                            while($r = mysqli_fetch_array($result)){ 
                                echo '<option value="'.$r["categorie"].'">'.$r["categorie"].'</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="projet_client">Projet</label>
                    <input type="text" id="projet_client" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="description_client">Description</label>
                    <input type="text" id="description_client" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="num_client">Num</label>
                    <input type="text" id="num_client" class="form-control">
                </div>
            </div>
        </div>
        <div>
            <button type="button" class="btn btn-primary ml-3" id="saveClientBtn">Enregistrer</button>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
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
                    location.reload();
                },
                error: function(xhr, status, error){
                    alert("Error: " + error);
                }
            });
        });
    });
</script>

</body>
</html>
