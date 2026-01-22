<style>
.navbar-nav li a:hover{
color:#006db7
}
.navbar-default .navbar-nav>li>a {
    color: #006db7;
    border-bottom: 3px solid transparent;
}
</style>
<div class="header-wrapper header-transparent">
            <!-- .header.header-style01 start -->
            <header id="header"  class="header-style01">
                

                <div class="header-inner" style="background-color: rgba(255, 255, 255, 0.8)">
                    <!-- .container start -->
                    <div class="container-fluid">
                        <!-- .main-nav start -->
                        <div class="main-nav" style="margin-top: 0 !important;background:transparent">
                            <!-- .row start -->
                            <div class="row">
                                <div class="col-md-10">
                                    <nav class="navbar navbar-default nav-left" role="navigation">

                                        <!-- .navbar-header start -->
                                        <div class="navbar-header">
                                            <div class="logo">
                                                <a href="index.php">
                                                    <img src="img/logo.png" width="180" alt="SB Cargo Transportation and Logistics "/> 
                                                </a>
                                            </div><!-- .logo end -->
                                        </div><!-- .navbar-header start -->

                                        <!-- MAIN NAVIGATION -->
                                        <div class="collapse navbar-collapse">
                                            <ul class="nav navbar-nav">
                                                <li class=""><a href="index.php">Home</a></li>
                                                <li><a href="about.php">About</a></li>
                                                <li><a href="service.php">Services</a></li>
                                                  <li>
                                                    <a href="https://verificationbazaar.com/" target="_blank" style="padding-top:28px;">
                                                        <div style="display: flex; align-items: center;">
                                                            <img src="img/vblogo.jpg" width="20" alt="Verificationbazaar">
                                                            <span style="color:#006db7;">Verification Bazaar</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li><a href="domestic-documentation.php">Domestic Docs</a></li>
                                                <li><a href="international.php">International</a></li>
                                                <li><a href="service-destination.php">Service Dest</a></li>
                                                <li><a href="pickup.php">Pick Up Req.</a></li> 
                                                 <li><a href="contact.php">Contact Us</a></li>
                                                 <!--<li><a href="pickup.php">Verification Bazaar</a></li> -->
                                              
                                                </ul><!-- .nav.navbar-nav end -->

                                            <!-- RESPONSIVE MENU -->
                                            <div id="dl-menu" class="dl-menuwrapper">
                                                <button class="dl-trigger">Open Menu</button>
                                                <ul class="dl-menu">
                                                    <li><a href="index.php">Home</a></li>
                                                    <li><a href="about.php">About Us</a></li>
                                                    <li><a href="service.php">Services</a></li>
                                                     <li>
                                                    <a href="https://verificationbazaar.com/" target="_blank" style="padding-top:28px;">
                                                        <div style="display: flex; align-items: center;">
                                                            <img src="img/vblogo.jpg" width="20" alt="Verificationbazaar">
                                                            <span>Verification Bazaar</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                    <li><a href="domestic-documentation.php">Domestic Documentation</a></li>
                                                      <li><a href="international.php">International</a></li>
                                                     <li><a href="service-destination.php">Service Destination</a></li>
                                                     <li><a href="pickup.php">Pick Up Request</a></li>
                                                   <li><a href="contact.php">Contact Us</a></li>
                                                    
                                                </ul><!-- .dl-menu end -->
                                            </div><!-- #dl-menu end -->

                                            
                                        </div><!-- MAIN NAVIGATION END -->
                                    </nav><!-- .navbar.navbar-default end -->
                                </div><!-- .col-md-10 end -->
                                <div class="col-md-2" style="padding:0; margin-top: 20px;">
                                	 <!-- .contact form start -->
                                   <div class="col-md-10  col-xs-8"> 
                                       
                                        <div class="form-group">
                                              
                                            <input type="text" style="border-radius:0px" class="form-control"  id="awb_search"  placeholder="Track AWB No" >
                                        </div>
                                       
                                       
                                     </div><!-- .col-md-6 end -->   
                                    <div class="col-md-2  col-xs-3" style="padding:0px"> 
                                         
                                        <div class="form-group" style="margin-top:5px;">
                                            <!-- <a style="padding:5px 10px;background:#006db7;color:#fff;border:0px solid #fff" class=""   id="target" href="tracking-order.php" ><i class="fa fa-search"></i></a> -->
                                            <a style="padding:5px 10px;background:#006db7;color:#fff;border:0px solid #fff"  id="target"  ><i class="fa fa-search"></i></a>
                                        </div>
                                       
                                    </div><!-- .col-md-6 end -->   
                                </div>
                                <!--col-md-2-->
                                </div><!--row-->
                                 <div class="row">
                           

                            
                               </div><!-- .row end -->
                            </div><!-- .row end -->
                        </div><!-- .main-nav end -->
                    </div><!-- .container end -->
                </div><!-- .header-inner end -->

              

            </header><!-- .header.header-style01 -->
        </div>
<script src="js/jquery-2.1.4.min.js"></script>
<script>
jQuery(document).ready(function() {
    $("#target").click(function() {
        var id = $('#awb_search').val();
       window.location.href = 'tracking-order.php?id='+id;
    });
    $('#awb_search').bind("enterKey",function(e){
        var id = $('#awb_search').val();
        window.location.href = 'tracking-order.php?id='+id;
    });
    $('#awb_search').keyup(function(e){
    if(e.keyCode == 13)
    {
      $(this).trigger("enterKey");
    }
    });
});

</script>