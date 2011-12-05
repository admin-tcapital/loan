		<div class="clearFix"></div>
		<div class="contentBody">
			<div class="contentTitle">Main Page</div>
			<div class="clearFix"></div>
			<div class="leftcontentBody">
				<ul>
					<li><a href="<?php echo base_url(); ?>stats">Home</a></li><li><a href="<?php echo base_url(); ?>loan/view/">Loan</a></li>
					<li><a href="<?php echo base_url(); ?>borrower/">Borrower</a></li>
					<li><a href="<?php echo base_url(); ?>stats/payments">Payments</a></li>
				</ul>
	        </div>
	        <div class="rightcontentBody">
	        	<div class="frm_container">
	        		<div class="frm_heading"><span>Past Due Payments</span></div>
	        		<div class="frm_inputs">
	        			<?php $due = $this->Loan_model->get_due_payments();?>
	        			<?php if($due) : ?>
		        		<table class="tablesorter">
			        		<thead>
			        			<tr>
			        				<th>Loan #</th>
			        				<th>Check Date</th>
			        				<th>Amount Due</th>
			        				<th>Name</th>
			        				<th>Payment #</th>
			        			</tr>
			        		</thead>
			        		<tbody>
			        			<?php foreach ($due->result() as $due_payment) :?>
			        			<tr>
			        				<td><a href="<?php echo base_url();?>loan/view_info/?id=<?php echo $due_payment->borrower_loan_id ;?>"><?php echo $due_payment->borrower_loan_id ;?></a></td>
			        				<td><?php echo $due_payment->payment_sched ;?></td>
			        				<td><?php echo $due_payment->amount ;?></td>
			        				<td><a href="<?php echo base_url();?>borrower/view/?id=<?php echo $due_payment->borrower_id ;?>"><?php echo $due_payment->lname.', '.$due_payment->fname ;?></a></td>
			        				<td><?php echo $due_payment->payment_number ;?></td>
			        			</tr>
			        			<?php endforeach; ?>
			        		</tbody>
			        	</table>
			        	<?php else : ?>
			        	No past due payments.
			        	<?php endif; ?>
	        		</div>
        		</div>
        		<div class="frm_container">
	        		<div class="frm_heading"><span>Due Payments Today</span></div>
	        		<div class="frm_inputs">
	        			<?php $due = $this->Loan_model->get_due_payments_now();?>
	        			<?php if($due) : ?>
		        		<table class="tablesorter">
			        		<thead>
			        			<tr>
			        				<th>Loan #</th>
			        				<th>Check Date</th>
			        				<th>Amount Due</th>
			        				<th>Name</th>
			        				<th>Payment #</th>
			        			</tr>
			        		</thead>
			        		<tbody>
			        			<?php foreach ($due->result() as $due_payment) :?>
			        			<tr>
			        				<td><a href="<?php echo base_url();?>loan/view_info/?id=<?php echo $due_payment->borrower_loan_id ;?>"><?php echo $due_payment->borrower_loan_id ;?></a></td>
			        				<td><?php echo $due_payment->payment_sched ;?></td>
			        				<td><?php echo $due_payment->amount ;?></td>
			        				<td><a href="<?php echo base_url();?>borrower/view/?id=<?php echo $due_payment->borrower_id ;?>"><?php echo $due_payment->lname.', '.$due_payment->fname ;?></a></td>
			        				<td><?php echo $due_payment->payment_number ;?></td>
			        			</tr>
			        			<?php endforeach; ?>
			        		</tbody>
			        	</table>
			        	<?php else : ?>
			        	No due payments today.
			        	<?php endif; ?>
	        		</div>
        		</div>
        		<div class="frm_container">
	        		<div class="frm_heading"><span>Due Payments This Week</span></div>
	        		<div class="frm_inputs">
	        			<?php $due = $this->Loan_model->get_due_payments_week();?>
	        			<?php if($due) : ?>
		        		<table class="tablesorter">
			        		<thead>
			        			<tr>
			        				<th>Loan #</th>
			        				<th>Check Date</th>
			        				<th>Amount Due</th>
			        				<th>Name</th>
			        				<th>Payment #</th>
			        			</tr>
			        		</thead>
			        		<tbody>
			        			<?php foreach ($due->result() as $due_payment) :?>
			        			<tr>
			        				<td><a href="<?php echo base_url();?>loan/view_info/?id=<?php echo $due_payment->borrower_loan_id ;?>"><?php echo $due_payment->borrower_loan_id ;?></a></td>
			        				<td><?php echo $due_payment->payment_sched ;?></td>
			        				<td><?php echo $due_payment->amount ;?></td>
			        				<td><a href="<?php echo base_url();?>borrower/view/?id=<?php echo $due_payment->borrower_id ;?>"><?php echo $due_payment->lname.', '.$due_payment->fname ;?></a></td>
			        				<td><?php echo $due_payment->payment_number ;?></td>
			        			</tr>
			        			<?php endforeach; ?>
			        		</tbody>
			        	</table>
			        	<?php else : ?>
			        	No due payments this week.
			        	<?php endif; ?>
	        		</div>
        		</div>
	        </div>
	        <div class="clearFix"></div>
		</div>