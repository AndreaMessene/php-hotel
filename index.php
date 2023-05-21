<!-- Stampare tutti i nostri hotel con tutti i dati disponibili.
Iniziate in modo graduale.

Prima stampate in pagina i dati, senza preoccuparvi dello stile.
Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.
Bonus:
1 - Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
2 - Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)
NOTA: deve essere possibile utilizzare entrambi i filtri contemporaneamente (es. ottenere una lista con hotel che dispongono di parcheggio e che hanno un voto di tre stelle o superiore)
Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel. -->





<!-- arrey associativo multidimensionale -->
<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];


?>

<!---------------------  ----------------------->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body>
<form action="index.php" method="GET">

    <div>
        <select name="filtro">
            <option value="T">hotels</option>
            <option value=1>con parcheggio</option>
            <option value=0>senza parcheggio</option>
        </select>

        <button type="submit" >Invio</button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome Hotel</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Voto</th>
                    <th scope="col">Distanza</th>
                </tr>
            </thead>
            <tbody>            
                <?php

                    for($i=0; $i<count($hotels); $i++){
                        if($_GET["filtro"]=="T"){
                            echo('
                                <tr>
                                    <th scope="row">'.$i.'</th>
                                    <td>'.$hotels[$i]['name'].'</td>
                                    <td>'.$hotels[$i]['description'].'</td>                                    
                                    <td>'.$hotels[$i]['vote'].'</td>
                                    <td>'.$hotels[$i]['distance_to_center'].' </td>
                                </tr>'
                            );
                        }else if($_GET["filtro"]=="1"){
                            if($hotels[$i]['parking'] == true){
                                echo('
                                    <tr>
                                        <th scope="row">'.$i.'</th>
                                        <td>'.$hotels[$i]['name'].'</td>
                                        <td>'.$hotels[$i]['description'].'</td>                                    
                                        <td>'.$hotels[$i]['vote'].'</td>
                                        <td>'.$hotels[$i]['distance_to_center'].' </td>
                                    </tr>'
                                );
                            }
                        }else if($_GET["filtro"]=="0"){
                            if($hotels[$i]['parking'] == false){
                                echo('
                                    <tr>
                                        <th scope="row">'.$i.'</th>
                                        <td>'.$hotels[$i]['name'].'</td>
                                        <td>'.$hotels[$i]['description'].'</td>                                    
                                        <td>'.$hotels[$i]['vote'].'</td>
                                        <td>'.$hotels[$i]['distance_to_center'].' </td>
                                    </tr>'
                                );
                            }
                        }
                    }
                ?>
            </tbody>
        </table>    
    </div>


    </form>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>

