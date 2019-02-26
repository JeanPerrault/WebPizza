<?php include_once "../private/src/views/layout/header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgotten Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    
    
    <form method="post" class="container" novalidate>
        <div class="row">
            <div class="col-4 offset-4">
            
                <!-- Champ Email -->
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Votre adresse email">
                </div>

                <button class="btn btn-success btn-block">Recup le MDP</button>

                <a href="/connexion">C'est bon, je me souviens de mon Mot de passe.....</a><br>

            </div>
        </div>
    </form>
</body>
</html>
<?php include_once "../private/src/views/layout/footer.php"; ?>