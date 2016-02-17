<h1>Registro :</h1>
<?php echo validation_errors(); ?>
<form action="" method="POST" >
        <HR width=100% align="left">
            <div class="col-sm-8 col-lg-8 col-md-8">
            <div class="bootstrap-iso">
             <div class="container-fluid">
              <div class="row">
               <div class="col-md-6 col-sm-6 col-xs-12">
                <form method="post">
                 <div class="form-group ">
                  <label class="control-label requiredField" for="user">
                   Login
                   <span class="asteriskField">
                    *
                   </span>
                  </label>
                  <input class="form-control" id="name" name="user" type="text"/>
                 </div>
                 <div class="form-group ">
                  <label class="control-label requiredField" for="contrasena">
                   Contrase&ntilde;a
                   <span class="asteriskField">
                    *
                   </span>
                  </label>
                     <input class="form-control" id="contrasena" name="contrasena" type="password"/>
                 </div>
                 <div class="form-group ">
                  <label class="control-label requiredField" for="email">
                   Email
                   <span class="asteriskField">
                    *
                   </span>
                  </label>
                  <input class="form-control" id="email" name="email" type="text"/>
                 </div>
                 <div class="form-group ">
                  <label class="control-label requiredField" for="DNI">
                   DNI
                   <span class="asteriskField">
                    *
                   </span>
                  </label>
                  <input class="form-control" id="DNI" name="DNI" type="text"/>
                 </div>
                 <div class="form-group ">
                  <label class="control-label requiredField" for="nombre">
                   Nombre
                   <span class="asteriskField">
                    *
                   </span>
                  </label>
                  <input class="form-control" id="name3" name="nombre" type="text"/>
                 </div>
                 <div class="form-group ">
                  <label class="control-label requiredField" for="direccion">
                   Direccion
                   <span class="asteriskField">
                    *
                   </span>
                  </label>
                  <input class="form-control" id="direccion" name="direccion" placeholder="C/ -N&ordm;" type="text"/>
                 </div>
                 <div class="form-group ">
                  <label class="control-label requiredField" for="CP">
                   Codigo Postal
                   <span class="asteriskField">
                    *
                   </span>
                  </label>
                  <input class="form-control" id="CP" name="CP" type="text"/>
                 </div>
                 <div class="form-group ">
                   <label class="control-label requiredField" for="provincia">
                    Provincia
                    <span class="asteriskField">
                     *
                    </span>
                   </label>
                   <input class="form-control" id="direccion" name="provincia" placeholder="C/ -N&ordm;" type="text"/>
                 </div>
                 <div class="form-group">
                  <div>
                   <button class="btn btn-primary " name="guardar" type="submit">
                    Guardar
                   </button>
                  </div>
                 </div>
                </form>
               </div>
              </div>
             </div>
            </div>
        </div>
        </HR>
</form>