<?php  include 'database.php';

function level_matrix($id) {
  global $con;
  $id = $id;
  $total = 0;
  $row1 = array();
  $row2 = array();
  $row3 = array();
  $row4 = array();
  $row5 = array();
  $row6 = array();
  $row7 = array();
  
  // Level 1
  $get1 = mysqli_query($con, "select * from position_details where User_ID = '$id'");
  while ($show1 = mysqli_fetch_array($get1)) {
      if(empty($show1['Assign_User_ID']) === false) {
        $row1[] = $show1['Assign_User_ID'];
      }
  }
  $first = sizeof($row1);
  $getlevel1 = mysqli_query($con, "select * from level_income where Name = 'Level 1'");
  $showlevel1 = mysqli_fetch_array($getlevel1);
    if($showlevel1['Sales'] >= $first) {
      $level1 = round($showlevel1['Comission']*$first);
    }

  // Level 2
  $get2 = mysqli_query($con, "select * from position_details where User_ID = '$id'");
  while ($show2 = mysqli_fetch_array($get2)) {
      if(empty($show2['Assign_User_ID']) === false) {
        $row2[] = $show2['Assign_User_ID'];
        $id2 = $show2['Assign_User_ID'];
        $getl2 = mysqli_query($con, "select * from position_details where User_ID = '$id2'");
        while ($showl2 = mysqli_fetch_array($getl2)) {
          if(empty($showl2['Assign_User_ID']) === false) {
            $row2[] = $show2['Assign_User_ID'];
          }
        }

      }
  }
  $second = sizeof($row2);
  $second1 = round($second - $first);
  $getlevel2 = mysqli_query($con, "select * from level_income where Name = 'Level 2'");
  $showlevel2 = mysqli_fetch_array($getlevel2);
    if($showlevel2['Sales'] >= $second1) {
      $level2 = round($showlevel2['Comission']*$second1);
    }

  // Level 3

  $get3 = mysqli_query($con, "select * from position_details where User_ID = '$id'");
  while ($show3 = mysqli_fetch_array($get3)) {
      if(empty($show3['Assign_User_ID']) === false) {
        $row3[] = $show3['Assign_User_ID'];
        $id3 = $show3['Assign_User_ID'];
        $getl3 = mysqli_query($con, "select * from position_details where User_ID = '$id3'");
        while ($showl3 = mysqli_fetch_array($getl3)) {
          if(empty($showl3['Assign_User_ID']) === false) {
            $row3[] = $showl3['Assign_User_ID'];
            $id3x2 = $showl3['Assign_User_ID'];
            $getl3x2 = mysqli_query($con, "select * from position_details where User_ID = '$id3x2'");
            while ($showl3x2 = mysqli_fetch_array($getl3x2)) {
              if(empty($showl3x2['Assign_User_ID']) === false) {
                $row3[] = $showl3x2['Assign_User_ID'];
              }
            }
          }
        }

      }
  }
  
  $third = sizeof($row3);
  $third1 = round($third - $second1 - $first);
  $getlevel3 = mysqli_query($con, "select * from level_income where Name = 'Level 3'");
  $showlevel3 = mysqli_fetch_array($getlevel3);
    if($showlevel3['Sales'] >= $third1) {
      $level3 = round($showlevel3['Comission']*$third1);
    }

  // Level 4 

  $get4 = mysqli_query($con, "select * from position_details where User_ID = '$id'");
  while ($show4 = mysqli_fetch_array($get4)) {
      if(empty($show4['Assign_User_ID']) === false) {
        $row4[] = $show4['Assign_User_ID'];
        $id4 = $show4['Assign_User_ID'];
        $getl4 = mysqli_query($con, "select * from position_details where User_ID = '$id4'");
        while ($showl4 = mysqli_fetch_array($getl4)) {
          if(empty($showl4['Assign_User_ID']) === false) {
            $row4[] = $showl4['Assign_User_ID'];
            $id4x2 = $showl4['Assign_User_ID'];
            $getl4x2 = mysqli_query($con, "select * from position_details where User_ID = '$id4x2'");
            while ($showl4x2 = mysqli_fetch_array($getl4x2)) {
              if(empty($showl4x2['Assign_User_ID']) === false) {
                $row4[] = $showl4x2['Assign_User_ID'];
                $id4x3 = $showl4x2['Assign_User_ID'];
                $getl4x3 = mysqli_query($con, "select * from position_details where User_ID = '$id4x3'");
                while ($showl4x3 = mysqli_fetch_array($getl4x3)) {
                  if(empty($showl4x3['Assign_User_ID']) === false) {
                    $row4[] = $showl4x3['Assign_User_ID'];
                  }
                }
              }
            }
          }
        }

      }
  }

  $forth = sizeof($row4);
  $forth1 = round($forth - $third1 - $second1 - $first);
  $getlevel4 = mysqli_query($con, "select * from level_income where Name = 'Level 4'");
  $showlevel4 = mysqli_fetch_array($getlevel4);
    if($showlevel4['Sales'] >= $forth1) {
      $level4 = round($showlevel4['Comission']*$forth1);
    }

  // Level 5 

  $get5 = mysqli_query($con, "select * from position_details where User_ID = '$id'");
  while ($show5 = mysqli_fetch_array($get5)) {
      if(empty($show5['Assign_User_ID']) === false) {
        $row5[] = $show5['Assign_User_ID'];
        $id5 = $show5['Assign_User_ID'];
        $getl5 = mysqli_query($con, "select * from position_details where User_ID = '$id5'");
        while ($showl5 = mysqli_fetch_array($getl5)) {
          if(empty($showl5['Assign_User_ID']) === false) {
            $row5[] = $showl5['Assign_User_ID'];
            $id5x2 = $showl5['Assign_User_ID'];
            $getl5x2 = mysqli_query($con, "select * from position_details where User_ID = '$id5x2'");
            while ($showl5x2 = mysqli_fetch_array($getl5x2)) {
              if(empty($showl5x2['Assign_User_ID']) === false) {
                $row5[] = $showl5x2['Assign_User_ID'];
                $id5x3 = $showl5x2['Assign_User_ID'];
                $getl5x3 = mysqli_query($con, "select * from position_details where User_ID = '$id5x3'");
                while ($showl5x3 = mysqli_fetch_array($getl5x3)) {
                  if(empty($showl5x3['Assign_User_ID']) === false) {
                    $row5[] = $showl5x3['Assign_User_ID'];
                    $id6x4 = $showl5x3['Assign_User_ID']; 
                    $getl5x4 = mysqli_query($con, "select * from position_details where User_ID = '$id6x4'");
                    while ($showl5x4 = mysqli_fetch_array($getl5x4)) {
                      if(empty($showl5x4['Assign_User_ID']) === false) {
                        $row5[] = $showl5x4['Assign_User_ID'];
                      }
                    }
                  }
                }
              }
            }
          }
        }

      }
  }

  $fifth = sizeof($row5);
  $fifth1 = round($fifth - $forth1 - $third1 - $second1 - $first);
  $getlevel5 = mysqli_query($con, "select * from level_income where Name = 'Level 5'");
  $showlevel5 = mysqli_fetch_array($getlevel5);
    if($showlevel5['Sales'] >= $fifth1) {
      $level5 = round($showlevel5['Comission']*$fifth1);
    }

  // Level 6 

  $get6 = mysqli_query($con, "select * from position_details where User_ID = '$id'");
  while ($show6 = mysqli_fetch_array($get6)) {
      if(empty($show6['Assign_User_ID']) === false) {
        $row6[] = $show6['Assign_User_ID'];
        $id6 = $show6['Assign_User_ID'];
        $getl6 = mysqli_query($con, "select * from position_details where User_ID = '$id6'");
        while ($showl6 = mysqli_fetch_array($getl6)) {
          if(empty($showl6['Assign_User_ID']) === false) {
            $row6[] = $showl6['Assign_User_ID'];
            $id6x2 = $showl6['Assign_User_ID'];
            $getl6x2 = mysqli_query($con, "select * from position_details where User_ID = '$id6x2'");
            while ($showl6x2 = mysqli_fetch_array($getl6x2)) {
              if(empty($showl6x2['Assign_User_ID']) === false) {
                $row6[] = $showl6x2['Assign_User_ID'];
                $id6x3 = $showl6x2['Assign_User_ID'];
                $getl6x3 = mysqli_query($con, "select * from position_details where User_ID = '$id6x3'");
                while ($showl6x3 = mysqli_fetch_array($getl6x3)) {
                  if(empty($showl6x3['Assign_User_ID']) === false) {
                    $row6[] = $showl6x3['Assign_User_ID'];
                    $id6x4 = $showl6x3['Assign_User_ID']; 
                    $getl6x4 = mysqli_query($con, "select * from position_details where User_ID = '$id6x4'");
                    while ($showl6x4 = mysqli_fetch_array($getl6x4)) {
                      if(empty($showl6x4['Assign_User_ID']) === false) {
                        $row6[] = $showl6x4['Assign_User_ID'];
                        $id6x5 = $showl6x4['Assign_User_ID'];
                        $getl6x5 = mysqli_query($con, "select * from position_details where User_ID = '$id6x5'");
                        while ($showl6x5 = mysqli_fetch_array($getl6x5)) {
                          if(empty($showl6x5['Assign_User_ID']) === false) {
                            $row6[] = $showl6x5['Assign_User_ID'];
                          }
                        } 
                      }
                    }
                  }
                }
              }
            }
          }
        }

      }
  }

  $sixth = sizeof($row6);
  $sixth1 = round($sixth - $fifth1 - $forth1 - $third1 - $second1 - $first);
  $getlevel6 = mysqli_query($con, "select * from level_income where Name = 'Level 6'");
  $showlevel6 = mysqli_fetch_array($getlevel6);
    if($showlevel6['Sales'] >= $sixth1) {
      $level6 = round($showlevel6['Comission']*$sixth1);
    }

  // Level 7 

  $get7 = mysqli_query($con, "select * from position_details where User_ID = '$id'");
  while ($show7 = mysqli_fetch_array($get7)) {
      if(empty($show7['Assign_User_ID']) === false) {
        $row7[] = $show7['Assign_User_ID'];
        $id7 = $show7['Assign_User_ID'];
        $getl7 = mysqli_query($con, "select * from position_details where User_ID = '$id7'");
        while ($showl7 = mysqli_fetch_array($getl7)) {
          if(empty($showl7['Assign_User_ID']) === false) {
            $row7[] = $showl7['Assign_User_ID'];
            $id7x2 = $showl7['Assign_User_ID'];
            $getl7x2 = mysqli_query($con, "select * from position_details where User_ID = '$id7x2'");
            while ($showl7x2 = mysqli_fetch_array($getl7x2)) {
              if(empty($showl7x2['Assign_User_ID']) === false) {
                $row7[] = $showl7x2['Assign_User_ID'];
                $id7x3 = $showl7x2['Assign_User_ID'];
                $getl7x3 = mysqli_query($con, "select * from position_details where User_ID = '$id7x3'");
                while ($showl7x3 = mysqli_fetch_array($getl7x3)) {
                  if(empty($showl7x3['Assign_User_ID']) === false) {
                    $row7[] = $showl7x3['Assign_User_ID'];
                    $id7x4 = $showl7x3['Assign_User_ID']; 
                    $getl7x4 = mysqli_query($con, "select * from position_details where User_ID = '$id7x4'");
                    while ($showl7x4 = mysqli_fetch_array($getl7x4)) {
                      if(empty($showl7x4['Assign_User_ID']) === false) {
                        $row7[] = $showl7x4['Assign_User_ID'];
                        $id7x5 = $showl7x4['Assign_User_ID'];
                        $getl7x5 = mysqli_query($con, "select * from position_details where User_ID = '$id7x5'");
                        while ($showl7x5 = mysqli_fetch_array($getl7x5)) {
                          if(empty($showl7x5['Assign_User_ID']) === false) {
                            $row7[] = $showl7x5['Assign_User_ID'];
                            $id7x6 = $showl7x5['Assign_User_ID'];
                            $getl7x6 = mysqli_query($con, "select * from position_details where User_ID = '$id7x6'");
                            while ($showl7x6 = mysqli_fetch_array($getl7x6)) {
                              if(empty($showl7x6['Assign_User_ID']) === false)  {
                                $row7[] = $showl7x6['Assign_User_ID'];
                              }
                            }
                          }
                        } 
                      }
                    }
                  }
                }
              }
            }
          }
        }

      }
  }

  $seven = sizeof($row7);
  $seven1 = round($seven - $sixth1 - $fifth1 - $forth1 - $third1 - $second1 - $first);
  $getlevel7 = mysqli_query($con, "select * from level_income where Name = 'Level 7'");
  $showlevel7 = mysqli_fetch_array($getlevel7);
    if($showlevel7['Sales'] >= $seven1) {
      $level7 = round($showlevel6['Comission']*$seven1);
    }
  echo $total = $level1 + $level2 + $level3 + $level4 + $level5 + $level6 + $level7;
}

function sanitize($data)
{
   
   global $con;

   $secureString = mysqli_real_escape_string($con, $data);

   return $secureString;
}

function mysqli_result($result, $row, $field = 0) {
    // Adjust the result pointer to that specific row
    $result->data_seek($row);
    // Fetch result array
    $data = $result->fetch_array();
 
    return $data[$field];
}

function output_errors($errors) {
	$output = array();
	return '<ul style="list-style-type:none; font-size:90%; text-align:center; color:red;"><li>' . implode('</li></li>', $errors) . '</li></ul>';
}

function protect_page() {
	if(logged_in() === false) {
		header('Location: index.php');	
		exit();
	}
}

function logged_in_redirect() {
	if(logged_in() === true) {
		header('Location: index.php');
		exit();	
	}
}

function protect_page1() {
	if(logged_in() === false) {
		header('Location: ../login.php');	
		exit();
	}
}

function admin_protect() {
	global $user_data;
	if($user_data['Type'] == 0) {
		header('Location: user/dashboard.php');
		exit();	
	}
}

?>