

<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu empieza -->
    <div class="panel-heading"><!-- panel-title empieza -->
        
        <h3 class="panel-title">Manufacturas

        <div class="pull-right">
            <a href="#" style="color: black">

            <span class="nav toggle hide-show">

            Esconder

            </span>
            </a>
        </h3>

    </div><!-- panel-title termina -->
    <div class="panel-collapse collapse-data">



    <div class="panel-body"><!-- panel-body empieza -->
        <div class="input-group"> 
            <input type="text" class="form-control" id="vic-table-filter" data-filter="#vic-manuf" data-action="filter" placeholder="Filtro de manufacturas">
        
        <a href="" class="input-group-addon">
            
        <i class="fa fa-search"></i>
    
    </a>
        
        </div>
        </div>
        <div class="panel-body scroll-menu">
        <ul class="nav nav-pills nav-stacked category-menu "id="vic-manuf"> <!-- nav nav-pills nav-stacked category-menu empieza -->
        
        <?php
       
       $get_manuf = "SELECT * FROM manufacturerias WHERE manufactureria_top = 'si'";
       $run_manuf = mysqli_query($con, $get_manuf);
       
       while ($row_manuf = mysqli_fetch_array($run_manuf)) {
           $manuf_id = $row_manuf['manufactureria_id'];
           $manuf_title = $row_manuf['manufactureria_titulo'];
           $manuf_top = $row_manuf['manufactureria_top'];
       
           echo "
           <li style='background:#ddd' class='checkbox checkbox-primary'>
               <a>
                   <label>
                       <input value='$manuf_id' type='checkbox' class='get_manufactura' name='manufactura'>
                       <span>
                       $manuf_title
                       </span>
                   </label>
               </a>
           </li>";
       }
       $get_manuf = "SELECT * FROM manufacturerias WHERE manufactureria_top ='no'";
       $run_manuf = mysqli_query($con, $get_manuf);
       
       while ($row_manuf = mysqli_fetch_array($run_manuf)) {
           $manuf_id = $row_manuf['manufactureria_id'];
           $manuf_title = $row_manuf['manufactureria_titulo'];
           $manuf_top = $row_manuf['manufactureria_top'];
       
           echo "
           <li style='background:#dc2424' class='checkbox checkbox-primary'>
               <a>
                   <label>
                       <input value='$manuf_id' type='checkbox' class='get_manufactura' name='manufactura'>
                        <span>
                       $manuf_title
                       </span>
                   </label>
               </a>
           </li>";
       }

       ?>

        </ul>
    </div><!-- panel-body termina -->
    
</div>
</div><!-- panel panel-default sidebar-menu termina -->

<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu empieza -->
    <div class="panel-heading"><!-- panel-title empieza -->
        
        <h3 class="panel-title">Genero

        <div class="pull-right">
            <a href="#" style="color: black">

            <span class="nav toggle hide-show">

            Esconder

            </span>
            </a>
        </h3>

    </div><!-- panel-title termina -->
    <div class="panel-collapse collapse-data">



    <div class="panel-body"><!-- panel-body empieza -->
        <div class="input-group"> 
            <input type="text" class="form-control" id="vic-table-filter" data-filter="#vic-cat" data-action="filter" placeholder="Filtro de genero">
        
        <a href="" class="input-group-addon">
            
        <i class="fa fa-search"></i>
    
    </a>
        
        </div>
        </div>
        <div class="panel-body scroll-menu">
        <ul class="nav nav-pills nav-stacked category-menu "id="vic-cat"> <!-- nav nav-pills nav-stacked category-menu empieza -->
        
        <?php
       
       $get_cat = "SELECT * FROM categorias WHERE cat_top = 'si'";
       $run_cat = mysqli_query($con, $get_cat);
       
       while ($row_cat = mysqli_fetch_array($run_cat)) {
           $cat_id = $row_cat['cat_id'];
           $cat_title = $row_cat['cat_titulo'];
           $cat_top = $row_cat['cat_top'];
       
           echo "
           <li style='background:#ddd' class='checkbox checkbox-primary'>
               <a>
                   <label>
                       <input value='$cat_id' type='checkbox' class='get_cat' name='categoria'>
                        <span>
                       $cat_title
                       </span>
                   </label>
               </a>
           </li>";
       }
       
       $get_cat = "SELECT * FROM categorias WHERE cat_top = 'no'";
       $run_cat = mysqli_query($con, $get_cat);
       
       while ($row_cat = mysqli_fetch_array($run_cat)) {
           $cat_id = $row_cat['cat_id'];
           $cat_title = $row_cat['cat_titulo'];
           $cat_top = $row_cat['cat_top'];
       
           echo "
           <li style='background:#dc2424' class='checkbox checkbox-primary'>
               <a>
                   <label>
                       <input value='$cat_id' type='checkbox' class='get_categoria' name='categoria'>
                        <span>
                       $cat_title
                       </span>
                   </label>
               </a>
           </li>";
       }
       ?>
       
     

        </ul>
    </div><!-- panel-body termina -->
    
</div>
</div><!-- panel panel-default sidebar-menu termina -->


<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu empieza -->
    <div class="panel-heading"><!-- panel-title empieza -->
        
        <h3 class="panel-title">Categorias

        <div class="pull-right">
            <a href="#" style="color: black">

            <span class="nav toggle hide-show">

            Esconder

            </span>
            </a>
        </h3>

    </div><!-- panel-title termina -->
    <div class="panel-collapse collapse-data">



    <div class="panel-body"><!-- panel-body empieza -->
        <div class="input-group"> 
            <input type="text" class="form-control" id="vic-table-filter" data-filter="#vic-p-cat" data-action="filter" placeholder="Filtro de categorias">
        
        <a href="" class="input-group-addon">
            
        <i class="fa fa-search"></i>
    
    </a>
        
        </div>
        </div>
        <div class="panel-body scroll-menu">
        <ul class="nav nav-pills nav-stacked category-menu "id="vic-p-cat"> <!-- nav nav-pills nav-stacked category-menu empieza -->
        
        <?php
       
       $get_p_cat = "SELECT * FROM productos_categorias WHERE p_cat_top = 'si'";
       $run_p_cat= mysqli_query($con, $get_p_cat);
       
       while ($row_p_cat = mysqli_fetch_array($run_p_cat)) {
           $p_cat_id = $row_p_cat['p_cat_id'];
           $p_cat_title = $row_p_cat['p_cat_titulo'];
           $p_cat_top = $row_p_cat['p_cat_top'];
       
           echo "
           <li style='background:#ddd' class='checkbox checkbox-primary'>
               <a>
                   <label>
                       <input value='$p_cat_id' type='checkbox' class='get_p_cat' name='producto_cat'>
                        <span>
                       $p_cat_title
                       </span>
                   </label>
               </a>
           </li>";
       }
       $get_p_cat = "SELECT * FROM categorias WHERE cat_top = 'no'";
       $run_p_cat = mysqli_query($con, $get_p_cat);
       
       while ($row_p_cat = mysqli_fetch_array($run_p_cat)) {
           $p_cat_id = $row_p_cat['cat_id']; // Asegúrate de que este sea el nombre correcto de la columna
           $p_cat_title = $row_p_cat['cat_titulo']; // Asegúrate de que este sea el nombre correcto de la columna
           $p_cat_top = $row_p_cat['cat_top']; // Asegúrate de que este sea el nombre correcto de la columna
       
           echo "
           <li style='background:#dc2424' class='checkbox checkbox-primary'>
               <a>
                   <label>
                       <input value='$p_cat_id' type='checkbox' class='get_p_cat' name='producto_cat'>
                        <span>
                       $p_cat_title
                       </span>
                   </label>
               </a>
           </li>";
       }
       ?>
       
     

        </ul>
    </div><!-- panel-body termina -->
    
</div>
</div><!-- panel panel-default sidebar-menu termina -->


