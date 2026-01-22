<!DOCTYPE html>
<html>  
<head>
        <title>Contact - SB Express Cargo LLp Courier </title>
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

         <div class="page-title-style01 page-title-negative-top pt-bkg08">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Contact us</h1>

                        <div class="breadcrumb-container">
                            <ul class="breadcrumb clearfix">
                                <!--<li>You are here:</li>-->
                                <li>
                                    <a href="index.php">Home /</a>
                               
                                    <a href="#">Contact </a>
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
                    <div class="col-md-6">
                        <div class="custom-heading">
                            <h3>your inquiry</h3>
                        </div><!-- .custom-heading.left end -->


                        <br />

                        <!-- .contact form start -->
                        <form class="wpcf7 clearfix" id="contact-form" method="post" action="sm-admin/ajax/query/contact-query.php">
                            

                            <fieldset>
                            <div class="form-group">
                                <label>
                                    <span class="required">*</span> Full Name:
                                </label>
                                
                                <input type="text" class="wpcf7-text" name="name">
                            </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                <label>
                                    <span class="required">*</span> Mobile:
                                </label>

                                <input type="text" class="wpcf7-text" name="mobile">
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                <label>
                                    <span class="required">*</span> Email:
                                </label>

                                <input type="email" class="wpcf7-text" name="email">
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                <label>
                                    <span class="required">*</span> Message:
                                </label>

                                <textarea rows="8" class="wpcf7-textarea" name="message"></textarea>
                                </div>
                            </fieldset>

                            <button type="submit" class="wpcf7-submit" >Send</button>
                        </form><!-- .wpcf7 end -->
                    </div><!-- .col-md-6 end -->

                    <div class="col-md-6">
                        <div class="custom-heading">
                            <h3>SB Express Cargo Head Office</h3>
                        </div><!-- .custom-heading end -->

                        <div id="">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d666.9635799060052!2d72.83183462202119!3d18.97932734364573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7ce5ced10dc41%3A0xc4d04cd5660cf2f1!2sMakba+Chawl%2C+N+M+Joshi+Marg%2C+Byculla+West%2C+Jacob+Circle%2C+Mumbai%2C+Maharashtra+400011!5e0!3m2!1sen!2sin!4v1478848433585" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>

                        <div class="custom-heading">
                            <h4>Company Information</h4>
                        </div><!-- .custom-heading end -->

                        <address>
                        A4, Mitul Industrial Estate, Sativali Road,<br>
                        Next to Nikolus Sai Service, Agarwal Naka,<br>
                        Vasai East - 401208
                        </address>

                        <span class="">+91 8422930436</span>
                        <br />

                        <a href="mailto:">info@sbexpresscargo.com
</a>
                    </div><!-- .col-md-6 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </div><!-- .page-content end -->
<?php include'footer.php'; ?>
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

  
  

   $('#contact-form')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
       name: {
          validators: {
            notEmpty: {
              message: 'The full name is required' 
            }
          }
        },
       
          mobile: {
               
                validators: {
                    phone: {
                  country: 'IN',
                  message: 'The value is not valid %s phone number'
                },
                notEmpty: {
                  message: 'The mobile number is required'
                },
                }
            },
     
      email: {
              validators: {
                notEmpty: {
                  message: 'The email address is required'
                },
                emailAddress: {
                  message: 'The value is not a valid email address'
                },
                regexp: {
                  regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                  message: 'The value is not a valid email address'
                },
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
          var $button = $('#contact-form button');
          $button.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Sending...');
        },
        success: function(result) {
          var $button = $('#contact-form button');
          $button.prop('disabled', false).html('Send');
          notr();
          setTimeout(function(){ window.location.href = 'contact.php' }, 1200);
        },
        error: function() {
          var $button = $('#contact-form button');
          $button.prop('disabled', false).html('Send');
          new PNotify({
            title: 'Error',
            text: 'Failed to send message. Please try again.',
            type: 'error',
          });
        }
    });
  });

     

});
</script>
        
    </body>


</html>
