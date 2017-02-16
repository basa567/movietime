<?php include('header.php'); ?>
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
          <div class="container connectgap">
            <div class="row">
                <div class="col-sm-3">                    
                </div>
                <div class="col-sm-6">
                    <div class="recshownow"><a href="<?php echo site_url('home/confirmation') ?>">  <span class="glyphicon glyphicon-backward" aria-hidden="true"></span> BACK</a></div>
                </div>
                <div class="col-sm-3">               
                </div>
            </div>            
         </div>        
    <div class="container connectgap timetable">
       <div class="row cinema">           
           <div class="col-sm-1">                          
            </div>
            <div class="col-sm-3">  
                <a href="#">Price </a>         
            </div>
            <div class="col-sm-3">
                <a href="#">Quantity</a>               
            </div> 
             <div class="col-sm-3">
                <a href="#">Total Price</a>               
            </div>
            <div class="col-sm-2">                         
            </div>           
        </div>  
         <div class="row pricelink">           
           <div class="col-sm-1">                          
            </div>           
            <div class="col-sm-3 price ">  
                <p id="price"  style="color:red;font-weight:bold;"><?php echo $user[0]['price']?></p>         
            </div>
            <div class="col-sm-3">
                <select>
                    <option value="<?php echo $user[0]['qty']?>"><?php echo $user[0]['qty']?></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>              
            </div> 
             <div class="col-sm-2 price">
                <p id="tprice"  style="color:red;font-weight:bold;">$<?php echo $user[0]['total_price']?></p>               
            </div>
            <div class="col-sm-3">  
                 <div class="recproceed"><a href="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> EDIT</a></div>                       
            </div>                     
        </div>  
     </div>     
</body>
</html>
<script>
    $(document).ready(function(){       
            $('select').on('change', function (e) {
                var optionSelected = $("option:selected", this);
                var valueSelected = this.value;
                var price = $("#price").text();                        
                var totalprice = valueSelected * price;
                $("#tprice").text("$" +totalprice);
        });
    });

     $('.recproceed').click(function(){             
            var quantity = $("select").val(); 
            var price = $("#price").text();
            var totalprice = $("#tprice").text(); 
            var id = <?php  echo $user[0]['id']  ?>;
                                  
            $.ajax({
            type: "POST",
            url: "<?php echo site_url('home/editDetail');?>",
            data: {"qty":quantity,"price":price,"totalprice":totalprice,"id":id},           
            success: function(data){                                                                    
              location.href = "<?php echo base_url()?>index.php/home/confirmation?semsg=1";                
            },
            error:function(data){
               location.href = "<?php echo base_url()?>index.php/home/confirmation?femsg=1";
            }                  
       });
    });
</script>