		<?php 
			$loan = $this->Loan_model->chk_borrower_loan_exist(array('lend_borrower_loans.id' => $_GET['id']));
		?>
		<div class="clearFix"></div>
		<div class="contentBody">
			<div class="contentTitle">Loan Details</div>
			<div class="clearFix"></div>
			<div class="leftcontentBody">
				<ul>
					<li><a href="<?php echo base_url(); ?>loan/view/">Loan</a></li>
					<li><a href="<?php echo base_url(); ?>borrower/">Borrower</a></li>
					<li class="submenu"><a href="<?php echo base_url(); ?>borrower/add">Add Borrower</a></li>
					<li class="submenu"><a href="<?php echo base_url(); ?>borrower/viewall">View Borrowers</a></li>
					<li><a href="<?php echo base_url(); ?>stats/payments">Payments</a></li>
				</ul>
	        </div>
	        <div class="rightcontentBody">
        		<div class="frm_container">
	        		<div class="frm_heading"><span>Loan Info</span></div>
	        		<div class="frm_inputs">
		        		<table class="info_view">
		        			<tr>
		        				<td>Loan #:</td>
		        				<td><?php echo $loan->borrower_loan_id; ?></td>
		        			</tr>
		        			<tr>
		        				<td>Loan Type:</td>
		        				<td><?php echo $loan->loan_name; ?></td>
		        			</tr>
		        			<tr>
		        				<td>Borrower:</td>
		        				<td><a href="<?php echo base_url(); ?>borrower/view/?id=<?php echo $loan->borrower_id;?>"><?php echo $loan->lname.', '.$loan->fname; ?></a></td>
		        			</tr>
		        			<tr>
		        				<td>Status:</td>
		        				<td><?php echo $loan->status; ?></td>
		        			</tr>
		        			<tr>
		        				<td>Total Loan Amount:</td>
		        				<td>&#8369;<?php echo number_format($loan->loan_amount_total, 2, '.', ','); ?></td>
		        			</tr>
		        			<tr>
		        				<td>Payments Made:</td>
		        				<td>&#8369;<?php $payments = $this->Loan_model->payments_made($loan->borrower_loan_id); 
		        						echo !$payments ? 0: number_format($payments, 2, '.', ',');
		        					?>
		        				</td>
		        			</tr>
		        			<tr>
		        				<td>Remaining Balance:</td>
		        				<td>&#8369;<?php echo number_format($loan->loan_amount_total - $payments, 2, '.', ','); ?></td>
		        			</tr>
		        		</table>
	        		</div>
        		</div>
        		<?php 
					$payment = $this->Loan_model->next_payment($loan->borrower_loan_id);
				?>
				<?php if ($payment) : ?>
				<div class="manage_menu"><a href="<?php echo base_url();?>transaction/payment/?id=<?php echo $payment->id; ?>" class="button_cart">Payment</a></div>
				<?php endif; ?>
				<div class="clearFix"></div>
        		<div class="frm_container">
	        		<div class="frm_heading"><span>Schedule Payment</span></div>
	        		<div class="frm_inputs">
	        			<?php if ($payment) : ?>
		        		<table class="info_view">
		        			<tr>
		        				<td>Payment #:</td>
		        				<td><?php echo $payment->payment_number; ?></td>
		        			</tr>
		        			<tr>
		        				<td>Amount:</td>
		        				<td><?php echo $payment->amount; ?></td>
		        			</tr>
		        			<tr>
		        				<td>Due Date:</td>
		        				<td><?php echo $payment->payment_sched; ?></td>
		        			</tr>
		        			<tr>
		        				<td>Status:</td>
		        				<td><?php echo $payment->status; ?></td>
		        			</tr>
		        		</table>
		        		<?php else : ?>
		        		No scheduled payment.
		        		<?php endif; ?>
	        		</div>
        		</div>
        		<div class="frm_container">
	        		<div class="frm_heading"><span>Overview</span></div>
	        		<div class="frm_inputs">
		        		<table class="tablesorter">
			        		<thead>
			        			<tr>
			        				<th>Payment #</th>
			        				<th>Check Date</th>
			        				<th>Amount</th>
			        				<th>Status</th>
			        			</tr>
			        		</thead>
			        		<tbody>
			        			<?php $payments = $this->Loan_model->payments_overview($_GET['id']);?>
			        			<?php foreach ($payments->result() as $payment) :?>
			        			<tr>
			        				<td><?php echo $payment->payment_number ;?></td>
			        				<td><?php echo $payment->payment_sched ;?></td>
			        				<td><?php echo $payment->amount ;?></td>
			        				<td><?php echo $payment->status ;?></td>
			        			</tr>
			        			<?php endforeach; ?>
			        		</tbody>
			        	</table>
	        		</div>
        		</div>
        		<div class="frm_container">
	        		<div class="frm_heading"><span>Transactions</span></div>
	        		<div class="frm_inputs">
		        		<table class="tablesorter">
			        		<thead>
			        			<tr>
			        				<th>Payment #</th>
			        				<th>Trans Date</th>
			        				<th>User</th>
			        				<th>Description</th>
			        				<th>Amount</th>
			        			</tr>
			        		</thead>
			        		<tbody>
			        			<?php $trans = $this->Loan_model->view_transactions($_GET['id']);?>
			        			<?php foreach ($trans->result() as $transact) :?>
			        			<tr>
			        				<td><?php echo $transact->payment_number; ?></td>
			        				<td><?php echo $transact->transaction_date; ?></td>
			        				<td><?php echo $transact->username; ?></td>
			        				<td><?php echo 'Description'; ?></td>
			        				<td><?php echo $transact->amount; ?></td>
			        			</tr>
			        			<?php endforeach; ?>
			        		</tbody>
			        	</table>
	        		</div>
        		</div>
	        </div>
	        <div class="clearFix"></div>
		</div>