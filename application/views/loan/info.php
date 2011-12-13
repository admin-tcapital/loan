		<?php 
			$loan = $this->Loan_model->chk_borrower_loan_exist(array('lend_borrower_loans.id' => $_GET['id']));
		?>
		<div class="clearFix"></div>
		<div class="contentBody">
			<div class="contentTitle">Loan Details</div>
			<div class="clearFix"></div>
			<div class="leftcontentBody">
				<ul>
					<li><a href="<?php echo base_url(); ?>stats">Home</a></li><li><a href="<?php echo base_url(); ?>loan/view/">Loan</a></li>
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
				<div class="manage_menu">
					<!-- <a href="<?php echo base_url();?>transaction/payment/?id=<?php echo $payment->id; ?>" class="button_cart">Payment</a> -->
					<span class="button_cart">Payment</span>
				</div>
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
		        		<!-- Dialog Box -->
						<?php 
							$ipayment = $this->Payment_model->get_info($payment->id);
						?>
						<div style='display:none'>
							<div class="frm_container" id="dialog-modal">
				        		<div class="frm_heading"><span>Payment Confirmation</span></div>
				        		<div class="frm_inputs">
				        			<form action="<?php echo base_url(); ?>transaction/paid/<?php echo $payment->id.'/'.$_GET['id']; ?>" method="post">
					        		<table class="info_view">
					        			<tr>
					        				<td>Payment #:</td>
					        				<td><?php echo $ipayment->payment_number; ?></td>
					        			</tr>
					        			<tr>
					        				<td>Borrower:</td>
					        				<td><?php echo $ipayment->lname.', '.$ipayment->fname; ?></td>
					        			</tr>
					        			<tr>
					        				<td>Amount:</td>
					        				<td><?php echo $ipayment->amount; ?></td>
					        			</tr>
					        			<tr>
					        				<td>Due Date:</td>
					        				<td><?php echo $ipayment->payment_sched; ?></td>
					        			</tr>
					        			<tr>
					        				<td>Status:</td>
					        				<td><?php echo $ipayment->status; ?></td>
					        			</tr>
					        			<tr>
					        				<td></td>
					        				<td><input type="submit" name="submit_payment" value="Paid" /></td>
					        			</tr>
					        		</table>
					        		<input type="hidden" name="borrower_id" value="<?php echo $_GET['id']; ?>" />
					        		</form>  
				        		</div>
			        		</div>   
						</div>
						<!-- End Dialog Box -->
		        		<?php else : ?>
		        		No scheduled payment.
		        		<?php endif; ?>
	        		</div>
        		</div>
        		<div class="frm_container">
	        		<div class="frm_heading"><span>Overview</span></div>
	        		<div class="frm_inputs">
		        		<table class="tablesorter" cellspacing="1">
			        		<thead>
			        			<tr>
			        				<th class="{sorter: false}">Payment #</th>
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
			        				<td><span style="color:<?php echo $payment->status=='PAID' ? 'GREEN' : 'RED'?>"><?php echo $payment->status; ?></span></td>
			        			</tr>
			        			<?php endforeach; ?>
			        		</tbody>
			        	</table>
			        	<div class="pager">
			        		<ul>
			        			<li><span class="first ui-icon ui-icon-seek-first"></span></li>
			        			<li><span class="prev first ui-icon ui-icon-seek-prev"></span></li>
			        			<li><input class="pagedisplay" type="text"></li>
			        			<li><span class="next first ui-icon ui-icon-seek-next"></span></li>
			        			<li><span class="last ui-icon ui-icon-seek-end"></span></li>
			        			<li>
			        				<select class="pagesize">
										
										<option value="20" selected="selected">20</option>
										<option value="30">30</option>
										<option value="40">40</option>
									</select>
			        			</li>
			        		</ul>
						</div>
	        		</div>
        		</div>
        		<div class="clearFix"></div>
        		<div class="frm_container">
	        		<div class="frm_heading"><span>Transactions</span></div>
	        		<div class="frm_inputs">
		        		<table class="tablesorter" cellspacing="1">
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
			        	<div class="pager">
			        		<ul>
			        			<li><span class="first ui-icon ui-icon-seek-first"></span></li>
			        			<li><span class="prev first ui-icon ui-icon-seek-prev"></span></li>
			        			<li><input class="pagedisplay" type="text"></li>
			        			<li><span class="next first ui-icon ui-icon-seek-next"></span></li>
			        			<li><span class="last ui-icon ui-icon-seek-end"></span></li>
			        			<li>
			        				<select class="pagesize">
										
										<option value="20" selected="selected">20</option>
										<option value="30">30</option>
										<option value="40">40</option>
									</select>
			        			</li>
			        		</ul>
						</div>
	        		</div>
        		</div>
	        </div>
	        <div class="clearFix"></div>
		</div>