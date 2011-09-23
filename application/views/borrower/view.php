		<?php 
			$data = $this->Borrower_model->chk_borrower_exist(array('id' => $_GET['id']));
		?>
		<div class="clearFix"></div>
		<div class="contentBody">
			<div class="contentTitle">View Borrower Info</div>
			<div class="clearFix"></div>
			<div class="leftcontentBody">
				<ul>
					<li><a href="<?php echo base_url(); ?>borrower/add">Add New Borrower</a></li>
					<li><a href="<?php echo base_url(); ?>borrower/viewall">View Borrowers</a></li>
					<?php if ($data): ?>
					<li><a href="<?php echo base_url(); ?>borrower/edit/?id=<?php echo $_GET['id']; ?>">Edit Info</a></li>
					<?php endif;?>
					
				</ul>
	        </div>
	        <div class="rightcontentBody">
	        	<?php if ($data): ?>
	        	<div class="manage_menu"><span></span></div>
        		<div class="frm_container">
	        		<div class="frm_heading"><span>Personal Info</span></div>
	        		<div class="frm_inputs">
		        		<table class="info_view">
		        			<tr>
		        				<td>First Name:</td>
		        				<td><?php echo $data->fname; ?></td>
		        			</tr>
		        			<tr>
		        				<td>Last Name:</td>
		        				<td><?php echo $data->lname; ?></td>
		        			</tr>
		        			<tr>
		        				<td>Middle Name:</td>
		        				<td><?php echo $data->mi; ?></td>
		        			</tr>
		        			<tr>
		        				<td>Age:</td>
		        				<td><?php echo $data->age; ?></td>
		        			</tr>
		        			<tr>
		        				<td>Date of Birth:</td>
		        				<td><?php echo $data->birth_date; ?></td>
		        			</tr>
		        			<tr>
		        				<td>Civil Status:</td>
		        				<td><?php echo $data->civil_status; ?></td>
		        			</tr>
		        		</table>
	        		</div>
        		</div>
        		<div class="frm_container">
	        		<div class="frm_heading"><span>Contact Info</span></div>
	        		<div class="frm_inputs">
		        		<table class="info_view">
		        			<tr>
		        				<td>Address:</td>
		        				<td><?php echo $data->address; ?></td>
		        			</tr>
		        			<tr>
		        				<td>Phone / Cellphone:</td>
		        				<td><?php echo $data->phone_cell; ?></td>
		        			</tr>
		        			<tr>
		        				<td>Email:</td>
		        				<td><?php echo $data->email; ?></td>
		        			</tr>
		        		</table>
	        		</div>
        		</div>
        		<div class="frm_container">
	        		<div class="frm_heading"><span>Current Employment Info</span></div>
	        		<div class="frm_inputs">
		        		<table class="info_view">
		        			<tr>
		        				<td>Employment Status:</td>
		        				<td><?php echo $data->employment_status; ?></td>
		        			</tr>
		        			<tr>
		        				<td>Company:</td>
		        				<td><?php echo $data->company; ?></td>
		        			</tr>
		        			<tr>
		        				<td>Job Title:</td>
		        				<td><?php echo $data->job_title; ?></td>
		        			</tr>
		        			<tr>
		        				<td>Monthly Income:</td>
		        				<td><?php echo $data->income; ?></td>
		        			</tr>
		        		</table>
	        		</div>
        		</div>
	        	<?php else: ?>
	        	<br>Sorry, borrower doesn't exist.<br><br>
	        	<?php endif; ?>
	        </div>
	        <div class="clearFix"></div>
		</div>