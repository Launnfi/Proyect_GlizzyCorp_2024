<h1 aling= "center">Editar cuenta</h1>

<form action="" method="post" enctype="multipart/form-data"><!--form empieza -->

    <div class="form-group"><!--form-group empieza -->
    <label>Nombre</label>
    <input type="text" name="c_name" class="form-control" required>
    </div><!--form-group termina -->

    <div class="form-group"><!--form-group empieza -->
    <label>Mail</label>
    <input type="text" name="c_mail" class="form-control" required>
    </div><!--form-group termina -->

    <div class="form-group"><!--form-group empieza -->
    <label>departamento</label>
    <input type="text" name="c_departamento" class="form-control" required>
    </div><!--form-group termina -->

    <div class="form-group"><!--form-group empieza -->
    <label>Direccion</label>
    <input type="text" name="c_direc" class="form-control" required>
    </div><!--form-group termina -->

    <div class="form-group "><!--form-group empieza -->
    <label>Contacto</label>
    <input type="text" name="c_contacto" class="form-control" required>
    </div><!--form-group termina -->

    <div class="form-group form-height-custom"><!--form-group empieza -->
    <label>Foto de perfil</label>
    <input type="file" name="c_image" class="form-control form-height-custom" required>

    <img src="customer_images/Foto_Perfil.jpg" alt="Foto actual" class="perf">
    </div><!--form-group termina -->

    <div class="text-center"><!--text-center termina -->

        <button name="update" class="btn btn-primary">

            <i class="fa fa-user-md"></i> Cambiar informacion

        </button>
    
    </div><!--text-center termina -->

        
    

</form><!--form termina -->