<?php include("header.php"); ?>
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
        
        
        <div class="formwidth">       
         <form action="<?= site_url('home/checkLogin') ?>" method="post">
            <?php if($this->session->flashdata('msg')){ ?>
                 <div class="alert alert-danger"><?php echo $this->session->flashdata('msg') ?></div>
            <?php } ?> 
            <div class="container">
                <label><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="txtUser" required>

                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="txtPassword" required>

                <input type="submit"  class="btn-danger">Login</input>                
            </div>            
        </form>
    </div>
        
     
</body>
</html>