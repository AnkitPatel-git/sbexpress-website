<!DOCTYPE html>
<html>
<head>
        <title>Pick Up Request- SB Carogo LLP </title>
        <link rel="icon" type="image/x-icon" href="SB logo.ico">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keywords" content="">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php include 'link.php'; ?>    
    </head>
    
    <body>
      
    <?php include'header.php' ?>
       <!-- .header-wrapper end -->
 <!-- .page-title start -->
        <div class="page-title-style01 page-title-negative-top pt-bkg09">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                    <h1>Pickup Request</h1>

<div class="breadcrumb-container">
    <ul class="breadcrumb clearfix">
        <!--<li>You are here:</li>-->
        <li>
            <a href="index.php">Home /</a>
        
            <a href="#">Pickup Request </a>
        </li>
    </ul><!-- .breadcrumb end -->
</div><!-- .breadcrumb-container end -->
                    </div><!-- .col-md-12 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </div><!-- .page-title-style01.page-title-negative-top end -->

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="custom-heading">
                            <h3>your request</h3>
                        </div><!-- .custom-heading.left end -->
                    
                        
                        <br />

                        <!-- .contact form start -->
                        <form role="form" class="wpcf7 clearfix" id="pickup-form" method="post" action="sm-admin/ajax/query/pickup-query.php">
                           <div class="col-md-6"> 
                                <h5>Consignor Detail </h5>
                                <hr>
                                <fieldset>
                                <div class="form-group">
                                    <label>
                                        <span class="required">*</span> Requester Name:
                                    </label>
                                    
                                    <input type="text" class="wpcf7-text" name="requester_name">
                                </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group">
                                    <label>
                                        <span class="required">*</span>Requester Company:
                                    </label>

                                    <input type="text" class="wpcf7-text" name="requester_company">
                                    </div>
                                </fieldset>

                                

                                <fieldset>
                                    <div class="form-group">
                                    <label>
                                        <span class="required">*</span>Requester Phone No:
                                    </label>

                                    <input type="text" class="wpcf7-text" name="requester_mobile">
                                    </div>
                                </fieldset>

                                 


                                
                                 <fieldset>
                                    <div class="form-group">
                                    <label>
                                        <span class="required">*</span>Requester City / State:
                                    </label>

                                    <input type="text" class="wpcf7-text" name="requester_city" >
                                    </div>
                                </fieldset>
                                <div class="form-group">
                             <!-- <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1UO6jguKqqvGSf6t5a5qgIeMUSTIaV11y" width="550" height="350"></iframe> -->
                             </div>
                             </div><!-- .col-md-6 end -->  
                             
 
                            <div class="col-md-6"> 
                                 <h5>Shipment Detail </h5>
                                <hr>
                             <fieldset>
                            <div class="form-group">
                                <label>
                                    <span class="required">*</span> Pickup Company Name 
:
                                </label>
                                <input type="text" class="wpcf7-text" name="pickup_company">
                              
                            </div>
                            </fieldset>
 <fieldset>
                                <div class="form-group">
                                <label>
                                    <span class="required">*</span> Pickup Address1
                                </label>

                                <textarea rows="1" class="wpcf7-textarea" name="pickup_address1"></textarea>
                                </div>
                            </fieldset>

                             <fieldset>
                                <div class="form-group">
                                <label>
                                    <span class="required">*</span> pickup Address2
                                </label>

                                <textarea rows="1" class="wpcf7-textarea" name="pickup_address2"></textarea>
                                </div>
                            </fieldset>
                            <fieldset>
                            <div class="form-group">
                                <label>
                                    <span class="required">*</span> Pickup City / State 
:
                                </label>
                                <input type="text" class="wpcf7-text" name="pickup_city">
                              
                            </div>
                            </fieldset>
                              <fieldset>
                                <div class="form-group">
                                <label>
                                    <span class="required">*</span> Pickup Pincode

                                </label>

                                <input type="text" class="wpcf7-text" name="pickup_pincode">
                                </div>
                            </fieldset>


                            <fieldset>
                                <div class="form-group">
                                <label>
                                    <span class="required">*</span> Pickup Contact Person 

                                </label>

                                <input type="text" class="wpcf7-text" name="pickup_person">
                                </div>
                            </fieldset>

                             <fieldset>
                                <div class="form-group">
                                <label>
                                    <span class="required">*</span> Pickup Mobile 

                                </label>

                                <input type="text" class="wpcf7-text" name="pickup_mobile">
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                <label>
                                    <span class="required">*</span> Pickup Landline No. 

                                </label>

                                <input type="text" class="wpcf7-text" name="pickup_landline">
                                </div>
                            </fieldset>

                           

                           <fieldset>
                                <div class="form-group">
                                <label>
                                    <span class="required">*</span> Contents
                                </label>

                                <textarea rows="2" class="wpcf7-textarea" name="content"></textarea>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                <label>
                                    <span class="required">*</span> Quantity

                                </label>

                                <input type="text" class="wpcf7-text" name="quantity">
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                <label>
                                    <span class="required">*</span> Value

                                </label>

                                <input type="text" class="wpcf7-text" name="value">
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                <label>
                                    <span class="required">*</span> No. Of Boxes

                                </label>

                                <input type="text" class="wpcf7-text" name="pickup_boxes">
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                <label>
                                    <span class="required">*</span> Weight

                                </label>

                                <input type="text" class="wpcf7-text" name="weight">
                                </div>
                            </fieldset>
                              <fieldset>
                                <div class="form-group">
                                <label>
                                    <span class="required">*</span> Dimensions

                                </label>

                                <input type="text" class="wpcf7-text" name="dimensions">
                                </div>
                            </fieldset>



                            
                            <fieldset>
                                <div class="form-group">
                                <label>
                                    <span class="required">*</span> Pickup Date

                                </label>

                                <input type="text" class="wpcf7-text" value="<?php echo date('d-m-Y'); ?>" name="pickup_date">
                                </div>
                            </fieldset>

                              <fieldset>
                                <div class="form-group">
                                <label>
                                    <span class="required">*</span> Pickup Time

                                </label>

                                <input type="text" class="wpcf7-text"  name="pickup_time">
                                </div>
                            </fieldset>

                           
                            <button type="submit" class="wpcf7-submit"  >send</button>
                             </div><!-- .col-md-6 end -->   
                            
                        </form><!-- .wpcf7 end -->
                    

                   
                </div><!-- .row end -->
            </div><!-- .container end -->
        </div><!-- .page-content end -->

        <?php include'footer.php'; ?><!-- #footer-wrapper end -->
<!-- #footer-wrapper end -->

        <script src="js/jquery-2.1.4.min.js"></script><!-- jQuery library -->
        <script src="js/bootstrap.min.js"></script><!-- .bootstrap script -->
        <script src="js/jquery.srcipts.min.js"></script><!-- modernizr, retina, stellar for parallax -->  
        <script src="owl-carousel/owl.carousel.min.js"></script><!-- Carousels script -->
        <script src="masterslider/masterslider.min.js"></script><!-- Master slider main js -->
        <script src="js/jquery.matchHeight-min.js"></script><!-- for columns with background image -->
        <script src="js/jquery.dlmenu.min.js"></script><!-- for responsive menu -->
        <script src="style-switcher/styleSwitcher.js"></script><!-- styleswitcher script -->
        <script src="js/include.js"></script><!-- custom js functions -->
        <script src="sm-admin/formvalidation/vendor/formvalidation/js/formValidation.min.js"></script>
<script src="sm-admin/formvalidation/vendor/formvalidation/js/framework\bootstrap.min.js"></script>
<script src="sm-admin/dist/js/pnotify.custom.min.js"></script>
<script src="sm-admin/dist/js/jquery-ui.min.js"></script>
<script>
$(document).ready(function(){

  var notr = function(){
    new PNotify({
        title: 'Success',
    text: 'Data Successfully Saved',
    type: 'success',
    });
  }

  $('#pickup-form')
  .find('[name="pickupdate"]')
  .datepicker({
    changeMonth: true,
      changeYear: true,
      dateFormat: 'dd-mm-yy',
     
      onSelect: function(date, inst) {
          /* Revalidate the field when choosing it from the datepicker */
          $('#pickup-form').formValidation('revalidateField', 'pickupdate');
      }
  });

  

   $('#pickup-form')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
       requester_name: {
          validators: {
            notEmpty: {
              message: 'The requester name is required' 
            }
          }
        },
      }
    }).on('success.form.fv', function(e) {
            // Prevent form submission
    e.preventDefault();

    var $form = $(e.target),
        fv    = $form.data('formValidation');

    $.ajax({
        url: $form.attr('action'),
        type: 'POST',
        data: $form.serialize(),
        beforeSend: function() {
          $('#pickup-form button').html('red');
        },
        success: function(result) {
          $('#pickup-form button').html('Save');
          notr();
          setTimeout(function(){ window.location.href = 'pickup.php' }, 1200);
        }
    });
  });

     

});
</script>
        
    </body>


</html>
