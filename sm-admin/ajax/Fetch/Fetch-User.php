<?php include('../../core/int.php'); 

$ID = $_POST['ID'];
 $get = mysqli_query($con, "select * from users where user_id = '$ID'");
$show = mysqli_fetch_array($get);
?>
<div class="modal fade" data-backdrop="static" id="passwordModal">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              <h4 class="modal-title">Set  Password</h4>
                            </div>
                            <div class="modal-body">
                            <hr />
                              <form class="form-horizontal" id="password-form" action="" method="post">
                                
                                
                                  <div class="form-group" id="result">
                                    <div class="col-md-3"></div>
                                        <div class="col-md-8">
                                            <div class="alert alert-success alert-dismissable" style="margin-bottom:0; padding:10px 30px;">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <strong>Success !</strong> Password Change Successfully ! 
                                              </div>
                                        </div>
                                    </div>
                                

                                    <div class="form-group ">
                                      <label class="control-label col-md-3">New Password</label>
                                        <div class="col-md-8">
                                          <input type="assword" class="form-control" name="password" placeholder="Please Enter The New Password" />
                                            <input type="hidden" id="User_ID<?php echo $show[0]; ?>" value="<?php echo $show[0]; ?>" />
                                            
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                      <label class="control-label col-md-3">Confirm Password</label>
                                        <div class="col-md-8">
                                          <input type="password" class="form-control" name="confirmpassword" placeholder="Please Enter The Confirm Password" />
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
						                 <div class="col-md-4 col-md-offset-3">
						                  <button class="btn btn-primary" type="submit" id="update_button<?php echo $show[0]; ?>"><i class="fa fa-send"></i>Save</button>
						                 </div>
						                </div>
                                </form>
                                  <script type="text/javascript">
				$(document).ready(function(){
					
				$('#result<?php echo $show[0]; ?>').hide();

				$('#password-form<?php echo $show[0]; ?>')
				        .formValidation({
				            framework: 'bootstrap',
							excluded: [':disabled'],
				            icon: {
				                valid: 'glyphicon glyphicon-ok',
				                invalid: 'glyphicon glyphicon-remove',
				                validating: 'glyphicon glyphicon-refresh'
				            },
				            fields: {
				                password: {
				                    validators: {
				                        notEmpty: {
				                            message: 'The password is required'
				                        }
				                    }
				                },
								
				            }
				        })
						.on('success.form.fv', function(e) {
				            // Prevent form submission
				            e.preventDefault();

				            var $form = $(e.target),
				                fv    = $form.data('formValidation');

				            $.ajax({
				                url: $form.attr('action'),
				                type: 'POST',
				                data: $form.serialize(),
				                beforeSend: function() {
												$('#update_button<?php echo $show[0]; ?>').html('<i class="fa fa-spinner fa-spin"></i>');
												},
												success: function(result) {
													$('#result<?php echo $show[0]; ?>').slideDown();
													$('#update_button<?php echo $show[0]; ?>').html('Submit');
													setTimeout(function(){ $('#passwordModal').modal('hide'); }, 800);
													setTimeout(function(){ View_Entry(); }, 1200);
													
												}
											});
									});
					
				});
				</script>
                             <hr />
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal" id="close">Close</button>
                             
                            </div>
                          </div>
                        </div>
                      </div>