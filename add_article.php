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
<h1> Ajouter un nouveau article </h1>
<br>
<form id="articleForm">
    <div class="form-group">
        <label for="code_g_article">Code</label>
        <input type="text" id="code_g_article" class="form-control" name="code">
    </div>
    <div class="form-group">
        <label for="designation_g_article">Designation</label>
        <input type="text" id="designation_g_article" class="form-control" name="designation">
    </div>
    <div class="form-group">
        <label for="pth_article">Prix th</label>
        <input type="text" id="pth_article" class="form-control" name="prix_th">
    </div>
    <div class="form-group">
        <label for="unite_g_article">Unite</label>
        <input type="text" id="unite_g_article" class="form-control" name="unite">
    </div>
    <div class="form-group">
        <label for="tva_g_article">TVA</label>
        <input type="text" id="tva_g_article" class="form-control" name="tva">
    </div>
    <div class="form-group">
        <label for="categorie_g_article">CATEGORIE</label>
        <input type="text" id="categorie_g_article" class="form-control" name="categorie">
    </div>
</form>

<!-- Modal for messages -->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel">Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="messageText"></p>
            </div>
        </div>
    </div>
</div>

<!-- Modal footer -->
<div class="modal-footer">
    <button type="button" class="btn btn-primary" id="saveArticleBtn">Enregistrer</button>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $("#saveArticleBtn").click(function(){
            $.ajax({
                url: "add_new_article.php",
                type: "POST",
                data: {
                    code: $('#code_g_article').val(),
                    designation: $('#designation_g_article').val(), 
                    prix_th: $('#pth_article').val(),
                    unite: $('#unite_g_article').val(),
                    tva: $('#tva_g_article').val(),
                    categorie: $('#categorie_g_article').val()
                },
                success: function(data){
                    alert(data)
                     location.reload();
                },
                error: function(xhr, status, error){
                    $("#messageText").text("Error: " + error);
                    
                    console.log(error);
                }
            });
        });
    });
</script>
</body>
</html>
