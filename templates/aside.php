<?php
// Left menu
?>
    	  <div class="aside">
        	<h3>Registration</h3>

          <!-- .box -->
          <div class="box">
          	<div class="inner">
            	<ul class="list1">
              	<li><a href="search_member.php">Search a Member</a></li>
                <li><a href="add_member.php">Add a Member</a></li>

                <li><a href="registered_members.php">Registered Members</a></li>
                <li><a href="confirmed_members.php">Confirmed Members</a></li>
                
                <!--<li><a href="add_visitor.php">Add Visitor</a></li>  -->              
                <li><a href="visitor.php">Visitors</a></li>                
                <li><a href="final_list.php">My Final List</a></li>
				<li><a href="final_list_all.php">Final List(All)</a></li>
                <!--<li><a href="webcam.php">Take a Picture</a></li>-->
              </ul>
            </div>
          	<div class="right-bot-corner">
            	<div class="left-bot-corner">

              	<div class="border-bot"></div>
              </div>
            </div>
          </div>
          <!-- /.box -->
          <h3>Counter</h3>
          <!-- .box -->
          <div class="box">

          	<div class="inner">
            	<ul class="list1">
              	<li><a href="counter.php">
              	My Count: <?php echo Member::count("confirmed",$_SESSION['user_id'])."/".Member::count("registered",$_SESSION['user_id']);?>
              	</a></li>
                <li><a href="counter.php">
                Total: <?php echo Member::count("confirmed")."/".Member::count("registered");?>
                </a></li>
				</ul>
            </div>
          	<div class="right-bot-corner">
            	<div class="left-bot-corner">
              	<div class="border-bot"></div>
              </div>
            </div>

          </div>
          <!-- /.box -->
        </div>