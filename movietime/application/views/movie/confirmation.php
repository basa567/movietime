<?php include("header.php") ?>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 titlename">
                  <img src="<?php echo base_url() ?>assets/img/logo.png" width="100" height="100"/>
                  <a href="<?php echo site_url('home/index') ?>">MOVIE TIME</a>
                </div>                
            </div>            
         </div>  
  <?php if(!empty($_GET['semsg'])){ ?>
    <div class="alert alert-success">
        <strong>Successfully!</strong> edit done 
    </div>
    <?php } ?>
    <?php if(!empty($_GET['femsg'])){?>
        <div class="alert alert-danger">
        <strong>Failed to!</strong> Edit 
        </div>
    <?php } ?> 
    <?php if(!empty($_GET['sdmsg'])){ ?>
    <div class="alert alert-success">
        <strong>Successfully!</strong> Delete done 
    </div>
    <?php } ?>
    <?php if(!empty($_GET['fdmsg'])){?>
        <div class="alert alert-danger">
        <strong>Failed to!</strong> Delete 
        </div>
    <?php } ?> 
     <?php if(!empty($_GET['fcmsg'])){?>
        <div class="alert alert-danger">
        <strong>Failed to!</strong> Confirm 
        </div>
    <?php } ?>    
    <div class="container connectgap timetable">
       <div class="row cinema">           
           <div class="col-sm-1">                          
            </div>
            <div class="col-sm-1">  
                <a href="#">Price </a>         
            </div>
            <div class="col-sm-2">
                <a href="#">Qty</a>               
            </div> 
             <div class="col-sm-1">
                <a href="#">Total</a>               
            </div>
            <div class="col-sm-5"> 

            </div>           
        </div> 
        <?php foreach($user as $value){ ?> 
         <div class="row pricelink">           
           <div class="col-sm-1">                          
            </div>
            <div class="col-sm-1 price ">  
                <a href="#"><?php echo $value['price']?></a>         
            </div>
            <div class="col-sm-2 price">
               <a href="#"><?php echo $value['qty']?></a>            
            </div> 
             <div class="col-sm-2 price">
                <a href="#">$<?php echo $value['total_price']?></a>               
            </div>
            <div class="col-sm-1 button">  
                 <div class="btn btn-primary"><a href="<?php echo site_url("home/editConfirmation/".$value['id']); ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a></div>                       
            </div>  
             <div class="col-sm-2 button">  
                 <div class="btn btn-danger"><a href="<?php echo site_url("home/deleteConfirmation/".$value['id']);?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a></div>                       
            </div>  
             <div class="col-sm-1 button">  
                 <div class="btn btn-success"><a href="<?php echo site_url("home/doneConfirmation/".$value['id']);?>"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a></div>                       
            </div>        
        </div>
        <?php } ?>  
     </div>     
   </div>           
</body>
</html>