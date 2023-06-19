<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assents/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    
    <title>Bloc de Notas</title>
</head>
<body>
    
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = $_POST['text'];
    $file = 'notepad.txt';
    
    
    // Abre el archivo en modo escritura
    $handle = fopen($file, 'w');
    
    // Escribe el texto en el archivo
    fwrite($handle, $text);
    
    // Cierra el archivo
    fclose($handle);
} else {
    $file = 'notepad.txt';
    
    $text = '';
    
    // Verifica si el archivo existe antes de leerlo
    if (file_exists($file)) {
        // Abre el archivo en modo lectura
        $handle = fopen($file, 'r');
        
        // Lee el contenido del archivo
        $text = fread($handle, filesize($file));
        
        // Cierra el archivo
        fclose($handle);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bloc de Notas</title>
</head>
<body>
    <center><h1><p style="color:rgb(25,25,112);">Bloc de Notas</p></h1>
    <h4><p style="color:rgb(72,61,139);">Guarda tus datos importantes</p></h4>
    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <textarea name="text" rows="20" cols="70"><?php echo $text; ?></textarea>
        
        <br>
        <input type="submit" class="btn btn-primary" value="Guardar"></button></center>
       
    </form>
</body>
</html>
