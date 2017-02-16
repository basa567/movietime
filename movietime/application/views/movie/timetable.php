<?php include("header.php"); ?>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 titlename">
                  <img src="<?php echo base_url();?>assets/img/logo.png" width="100" height="100"/>
                  <a href="<?php echo site_url('home/index') ?>">MOVIE TIME</a>
                </div>                
            </div>            
         </div>
          <div class="container connectgap">
            <div class="row">
                <div class="col-sm-3">               
                </div>
                <div class="col-sm-6">
                    <div class="recshownow"><a href="#">SHOW TIME</a></div>
                </div>
                <div class="col-sm-3">               
                </div>
            </div>            
         </div>     
    <?php foreach($time as $times){ $timeex = explode(',',$times['m_time']); ?>     
    <div class="container connectgap timetable">  
       <div class="row cinema">           
           <div class="col-sm-1">                          
            </div>
            <div class="col-sm-3">  
                <a href="#"><?php echo $times['name'];?> </a>         
            </div>
            
            <div class="col-sm-6">
                <?php foreach($timeex as $timeexs){ ?>
                 <a href="<?php echo site_url("home/login/$timeexs/".$times['name']) ?>"><?php echo $timeexs;?> </a> 
                <?php } ?>
            </div>            
            <div class="col-sm-2">                         
            </div>           
        </div>                     
     </div> 
    <?php } ?>
</body>
</html>