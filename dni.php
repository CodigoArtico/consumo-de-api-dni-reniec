<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar dni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/16454e4b22.js" crossorigin="anonymous"></script>

</head>

<body>
    <center>
        <h3>Consulta por DNI</h3>
        <div class="btn-group">
            <input type="text" class="form-control" id="documento">
            <button type="button" class="btn btn-dark" id="buscar">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>

        <br>
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <input type="text" class="form-control" id="numeroDocumento" placeholder="Número de Documento" disabled>
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col-sm-6">
                <input type="text" class="form-control" id="nombres" placeholder="Nombre" disabled>
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col-sm-6">
                <input type="text" class="form-control" id="apellidoPaterno" placeholder="apellido parterno" disabled>
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col-sm-6">
                <input type="text" class="form-control" id="apellidoMaterno" placeholder="apellido materno" disabled>
            </div>
        </div>

    </center>

</body>

<script>
    $('#buscar').click(function() {
        var dni = $('#documento').val();
        var data = {
            dato: dni
        };
        $.ajax({
            url: 'http://localhost/api/ejemplo', //aqui debes colocar la direccion de tu api dni
            type: 'post',
            data: JSON.stringify(data),
            contentType: 'application/json',
            dataType: 'json',
            success: function(r) {
                if (r.numeroDocumento === dni) {
                    $('#numeroDocumento').val(r.numeroDocumento);
                    $('#nombres').val(r.nombres);
                    $('#apellidoPaterno').val(r.apellidoPaterno);
                    $('#apellidoMaterno').val(r.apellidoMaterno);
                } else {
                    alert(r.error);
                }
                console.log(r);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
</script>


</html>