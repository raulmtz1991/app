<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Healt && Admin</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">

         <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-submenu.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/doc.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url().'assets/css/plugins/dataTables.bootstrap.css'?>">
        <link rel="stylesheet" type="text/css" href="<?=base_url().'assets/css/plugins/fullcalendar.css'?>">


    </head>
    <body>
        <div class="header row">
            <div class="col-md-4">
                <div class="logo">

                </div>
            </div>
            <div class="col-md-4 col-md-offset-4 ">
                <div class="col-md-4 col-md-offset-4 rigth">
                <?php  
                if ($this->session->userdata['logged_in'] == true) {
                ?>    
                <ul class="nav navbar-nav navbar-right">
                    <li class="">
                      <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user fa-2x" aria-hidden="true"> <?php echo $this->session->userdata['username']; ?> </i>
                        <span class=" fa fa-angle-down"></span>
                      </a>
                      <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li>
                          <a href="<?php echo base_url('user/logout'); ?>"><i class="fa fa-sign-out pull-right"></i>Salir</a>
                        </li>
                      </ul>
                    </li>
                </ul>
                <?php  
                }else{
                    ?>    
                
                      <a href="<?php echo base_url('user/register'); ?>">
                        
                            <i class="fa-2x" aria-hidden="true">
                            Registrar
                            </i>
                            
                       
                        
                      </a>
                   
                <?php  
                }
                ?>
                </div>
            </div>

        </div>
        
