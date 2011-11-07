		<?php 
			//$data = $this->Borrower_model->chk_borrower_exist(array('id' => $_GET['id']));
		?>
		<div class="clearFix"></div>
		<div class="contentBody">
			<div class="contentTitle">Loan Details</div>
			<div class="clearFix"></div>
			<div class="leftcontentBody">
				<ul>
					<li><a href="<?php echo base_url(); ?>loan/view">View Loan Types</a></li>
					<li><a href="<?php echo base_url(); ?>loan/calculator">Loan Calculator</a></li>
				</ul>
	        </div>
	        <div class="rightcontentBody">
        		<div class="frm_container">
	        		<div class="frm_heading"><span>Loan Info</span></div>
	        		<div class="frm_inputs">
		        		<table class="info_view">
		        			<tr>
		        				<td>Loan #:</td>
		        				<td></td>
		        			</tr>
		        			<tr>
		        				<td>Loan Type:</td>
		        				<td></td>
		        			</tr>
		        			<tr>
		        				<td>Status:</td>
		        				<td></td>
		        			</tr>
		        			<tr>
		        				<td>Loan Amount:</td>
		        				<td></td>
		        			</tr>
		        			<tr>
		        				<td>Balance:</td>
		        				<td></td>
		        			</tr>
		        		</table>
	        		</div>
        		</div>
        		<div class="frm_container">
	        		<div class="frm_heading"><span>Borrower Info</span></div>
	        		<div class="frm_inputs">
		        		<table class="info_view">
		        			<tr>
		        				<td>Name:</td>
		        				<td></td>
		        			</tr>
		        			<tr>
		        				<td>Active Loans:</td>
		        				<td></td>
		        			</tr>
		        			<tr>
		        				<td>Closed Loans:</td>
		        				<td></td>
		        			</tr>
		        		</table>
	        		</div>
        		</div>
	        </div>
	        <div class="clearFix"></div>
		</div>