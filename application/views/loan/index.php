		<div class="clearFix"></div>
		<div class="contentBody">
			<div class="contentTitle">View Loan</div>
			<div class="clearFix"></div>
			<div class="leftcontentBody">
				<ul>
					<li><a href="<?php echo base_url(); ?>stats">Home</a></li><li><a href="<?php echo base_url(); ?>loan/view/">Loan</a></li>
					<li class="submenu"><a href="<?php echo base_url(); ?>loan/view_loan_types">Loan Types</a></li>
					<li class="submenu"><a href="<?php echo base_url(); ?>loan/calculator">Loan Calculator</a></li>
					<li><a href="<?php echo base_url(); ?>borrower/">Borrower</a></li>
					<li><a href="<?php echo base_url(); ?>stats/payments">Payments</a></li>
				</ul>
	        </div>
	        <div class="rightcontentBody">
	        	<table class="tablesorter">
	        		<thead>
	        			<tr>
	        				<th>Loan #</th>
	        				<th>Loan Type</th>
	        				<th>Status</th>
	        				<th>Borrower</th>
	        				<th>Total Loan</th>
	        			</tr>
	        		</thead>
	        		<tbody>
	        			<?php 
							$loans = $this->Loan_model->get_borrower_loans();
						?>
						<?php if ($loans) : ?>
	        			<?php foreach ($loans->result() as $loan) :?>
	        			<tr>
	        				<td><a href="<?php echo base_url(); ?>loan/view_info/?id=<?php echo $loan->borrower_loan_id;?>"><?php echo $loan->borrower_loan_id; ?></a></td>
	        				<td><?php echo $loan->loan_name; ?>%</td>
	        				<td><?php echo $loan->status; ?></td>
	        				<td><a href="<?php echo base_url(); ?>borrower/view/?id=<?php echo $loan->borrower_id;?>"><?php echo $loan->lname.', '.$loan->fname; ?></a></td>
	        				<td>&#8369;<?php echo number_format($loan->loan_amount_total, 2, '.', ','); ?></td>
	        			</tr>
	        			<?php endforeach; ?>
	        			<?php endif; ?>
	        		</tbody>
	        	</table>
	        </div>
	        <div class="clearFix"></div>
		</div>