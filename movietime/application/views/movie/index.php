<?php include("header.php");
 ?>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 titlename">
                  <img src="<?php echo base_url()?>assets/img/logo.png" width="100" height="100"/>
                  <a href="<?php echo site_url('home/index') ?>">MOVIE TIME</a>
                </div>                
            </div>            
         </div>
            <?php if(!empty($_GET['scmsg'])){ ?>
                <div class="alert alert-success">
                    <strong>Thank you for booking!</strong> 
                </div>
             <?php } ?>
          <div class="container connectgap">
            <div class="row">
                <div class="col-sm-3">               
                </div>
                <div class="col-sm-6">
                    <div class="recshownow"><a href="#">NOW SHOWING</a></div>
                </div>
                <div class="col-sm-3">               
                </div>
            </div>            
         </div>
        <div class="container connectgap">
            <div class="row">
                <div class="col-sm-4">
                    <img src="<?php echo base_url(); ?>assets/img/movie1.jpg" width="240" height="350">
                    <div class="recbooknow"><a href="<?php echo site_url('home/timetable') ?>">BOOK NOW</a></div>
                </div>
                <div class="col-sm-4">
                   <img src="<?php echo base_url(); ?>assets/img/movie2.jpg" width="240" height="350">
                   <div class="recbooknow"><a href="<?php echo site_url('home/timetable') ?>">BOOK NOW</a></div>
                </div>
                <div class="col-sm-4">
                  <img src="<?php echo base_url(); ?>assets/img/movie3.jpg" width="240" height="350">
                  <div class="recbooknow"><a href="<?php echo site_url('home/timetable') ?>">BOOK NOW</a></div>
                </div>
            </div>            
         </div>         
    </div>  
    <div class="container connectgap">
       <div class="row">
         <div class="col-sm-5">
             <hr class="hline"></hr>
          </div>
          <div class="col-sm-2">
                Movie Time
           </div>
            <div class="col-sm-5">
                <hr class="hline"></hr>
            </div>
          </div>            
     </div> 
</body>
</html>