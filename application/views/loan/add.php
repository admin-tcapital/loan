		<div class="clearFix"></div>
		<div class="contentBody">
			<div class="contentTitle">Add Loan Type</div>
			<div class="clearFix"></div>
			<div class="leftcontentBody">
				<ul>
					<li><a href="<?php echo base_url(); ?>loan/view/">Loan</a></li>
					<li class="submenu"><a href="<?php echo base_url(); ?>loan/add">Add New Loan</a></li>
					<li class="submenu"><a href="<?php echo base_url(); ?>loan/calculator">Loan Calculator</a></li>
					<li><a href="<?php echo base_url(); ?>borrower/">Borrower</a></li>
					<li><a href="<?php echo base_url(); ?>stats/payments">Payments</a></li>
					<li><a href="<?php echo base_url(); ?>stats/transactions">Transactions</a></li>
				</ul>
	        </div>
	        <div class="rightcontentBody">
	        	<form action="" method="post">
	        		<table class="form_tbl">
	        			<tr>
	        				<td>Name:</td>
	        				<td><input type="text" name="lname" value="<?php echo set_value('lname'); ?>" /></td>
	        			</tr>
	        			<tr>
	        				<td>Interest Rate (%):</td>
	        				<td><input type="text" name="interest" value="<?php echo set_value('interest'); ?>" /></td>
	        			</tr>
	        			<tr>
	        				<td>Terms:</td>
	        				<td><input type="text" name="terms" value="<?php echo set_value('terms'); ?>" /></td>
	        			</tr>
	        			<tr>
	        				<td>Frequency (days):</td>
	        				<td><input type="text" name="frequency" value="<?php echo set_value('frequency'); ?>" /></td>
	        			</tr>
	        			<tr>
	        				<td></td>
	        				<td><input type="submit" name="submit_loan" value="Submit" /></td>
	        			</tr>
	        			<?php if (validation_errors()) : ?>
						<tr>
							<td>
								
							</td>
							<td>
								<?php echo validation_errors(); ?>
							</td>
						</tr>
						<?php endif;?>
						<?php if (isset($error)) : ?>
						<tr>
							<td>
								
							</td>
							<td>
								<?php echo $error; ?>
							</td>
						</tr>
						<?php endif;?>
	        		</table>
	        	</form>
	        </div>
	        <div class="clearFix"></div>
		</div>