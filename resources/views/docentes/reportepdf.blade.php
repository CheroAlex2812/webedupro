<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TABLA DE DOCENTES</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        
        @page {
            margin: 0cm 0cm;
            font-size: 1em;
        }

        body {
            margin: 3cm 2cm 2cm;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #3c59d8;
            color: white;
            text-align: center;
            line-height: 30px;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #3c59d8;
            color: white;
            text-align: center;
            line-height: 35px;
        }
    </style>
</head>
<body>
    <header>
        <img src="{{ public_path('images/logo_15397IE.png') }}" alt="Insignia" style="float: right; width: 45px; margin-right:30px; margin-top:6px">
        <p style="margin-top: 20px"><strong>INSTITUCIÓN EDUCATIVA Nº 15397 CHARÁN COPOSO</strong></p>
    </header>
    <main>
        <h5 style="text-align: center"><strong>TABLA DE DOCENTES</strong></h5>
        <table class="table table-striped dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Designación</th>
                    <th scope="col">Fecha Nacimiento</th>
                    <th scope="col">Fecha Ingreso</th>
                    <th scope="col">Correo Electrónico</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Dni</th>
                </tr>
            </thead>
            <tbody>
            @foreach($docentes as $docente)
                <tr>
                    <th scope="row">{{ $docente->id_docente }}</th>
                    <td>{{ $docente->nombre }}</td>
                    <td>{{ $docente->apellidos }}</td>
                    <td>{{ $docente->designacion }}</td>
                    <td>{{ $docente->fecha_nacimiento }}</td>
                    <td>{{ $docente->fecha_ingreso }}</td>
                    <td>{{ $docente->email }}</td>
                    <td>{{ $docente->telefono }}</td>
                    <td>{{ $docente->direccion }}</td>
                    <td>{{ $docente->dni }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </main>
    <footer>
        <p><strong>Reporte Generado desde WebEduPro | Charán Coposo</strong></p>
    </footer>
</body>
</html>