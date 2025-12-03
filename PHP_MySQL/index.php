<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8"/>
 <title>Usando Ajax con PHP MySQL: Ejemplos</title>
 <script type="text/javascript" src="js/script.js"></script>
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="js/bootstrap.min.js"></script>
<body style="background-color:#FFFFF0;">
</body>
 <style>

 .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {

    padding-right: 1px;
    padding-left: 2px;
}
 </style>
 </head>
 <body>
 <div class="container">
   <h1 class="main_title">Formulario de Registro</h1>
<p>Alumno: Carlos Francisco Chapa López</p>
   <div class="content">
     <div class="panel panel-default">
       <div class="panel-body">
         <h3> Agregar Usuarios</h3>
         <form>
           <div class="form-group">
             <div class="col-sm-2">

               <input type="text" id="nombres" class="form-control" placeholder="Nombre de usuario">
             </div>
             <div class="col-sm-2">
               <input type="text" id="apellidos" class="form-control" placeholder="Apellidos">
             </div>
             <div class="col-sm-2">
               <input type="text" id="email" class="form-control" placeholder="Correo">
             </div>
             <div class="col-sm-2">
               <input type="text" id="telefono" class="form-control" placeholder="Telefono">
             </div>
             
             <div class="col-sm-2">
               <input type="text" id="edad" class="form-control" placeholder="Edad">
             </div>
             <div class="col-sm-2">
               <input type="text" id="contraseña" class="form-control" placeholder="Contraseña">
             </div>
             <br>
             <br>
             <br>
             <div class="col-sm-1">
               <input type="button" class="btn btn-primary" value="Agregar" onclick="add_member()">
             </div>

           </div>
         </form>
         <div style="clear:both"></div>
       </div>
     </div>
     <hr>
     <div class="panel panel-default">
       <div class="panel-body">
         <h3> Usuarios</h3>
         <div id="list_container">
           <?php 
                        // inlcuimos la conexion con el servidor
                        include('conexion.php');
                        $pdo = connect();
                        // Incluir para ver la totalidad de alumnos
                        include('lista_alumnos.php'); 
                    ?>
         </div>
         <!-- lista_contenedor --> 
       </div>
       <!-- content -->
       <div class="footer"> Creado por: <a href="https://www.univermilenium.edu.mx/">Carlos Francisco Chapa López</a> </div>
       <!-- footer --> 
     </div>
   </div>
   <!-- panel 2 --> 
 </div>
 <!-- container -->
</body>
</html>