<?php include("header.php");  ?>
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
          <?php if($this->session->flashdata('msg')){ ?>
                 <div class="alert alert-success"><?php echo $this->session->flashdata('msg') ?></div>
            <?php } ?> 
          <div class="container connectgap">
            <div class="row">
                <div class="col-sm-3">               
                </div>
                <div class="col-sm-6">
                    <div class="recshownow"><a href="#">SELECT QUANTIY & PRICE</a></div>
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
                <?php foreach($price as $prices){?>
                <p id="price"  style="color:red;font-weight:bold;"><?php echo $prices['price']; ?></p>
                <?php } ?>        
            </div>
            <div class="col-sm-3">
                <select>
                    <option value="">Quantity</option>
                    <option value="1" class="qty">1</option>
                    <option value="2" class="qty">2</option>
                    <option value="3" class="qty">3</option>
                </select>              
            </div> 
             <div class="col-sm-2 ">
                <p id="tprice" style="color:red;font-weight:bold;">$0</p>    
                           
            </div>
            <div class="col-sm-3">  
                 <div class="recproceed"><a>PROCEED</a></div>                       
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

       $('.recproceed').click(function(){             
            var quantity = $("select").val(); 
            var price = $("#price").text();
            var totalprice = $("#tprice").text(); 
            var userid = <?php  echo $this->session->userdata('userid') ?>;
            var hallname = "<?php  echo $this->session->userdata('hall') ?>";
            var time = "<?php  echo $this->session->userdata('time') ?>";
                            
            $.ajax({
            type: "POST",
            url: "<?php echo site_url('home/saveDetail');?>",
            data: {"userid":userid,"qty":quantity,"price":price,"totalprice":totalprice,"hall":hallname,"time":time},           
            success: function(data){                                                                      
             location.href = "<?php echo base_url()?>index.php/home/confirmation";                
            },
            error:function(data){
                console.log("error");
            }                  
       });
    });
});

</script>