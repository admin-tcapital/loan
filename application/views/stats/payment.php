		<div class="clearFix"></div>
		<div class="contentBody">
			<div class="contentTitle">Payments</div>
			<div class="clearFix"></div>
			<div class="leftcontentBody">
				<ul>
					<li><a href="<?php echo base_url(); ?>loan/view/">Loan</a></li>
					<li><a href="<?php echo base_url(); ?>borrower/">Borrower</a></li>
					<li><a href="<?php echo base_url(); ?>stats/payments">Payments</a></li>
					<li class="submenu"><a href="<?php echo base_url(); ?>stats/payments/received">Received</a></li>
					<li class="submenu"><a href="<?php echo base_url(); ?>stats/payments/incoming">Incoming</a></li>
				</ul>
	        </div>
	        <div class="rightcontentBody">
	        	<div class="frm_container">
	        		<?php 
	        			
        				$action = $this->uri->segment(3);
						
						switch ($action) {
							case 'incoming':
								$payments = $this->Payment_model->get_incoming_payments();
								$payment_type = 'Incoming';
								break;
							default:
								$payments = $this->Payment_model->get_received_payments();
								$payment_type = 'Received';
								break;
						}
        			?>
	        		<div class="frm_heading"><span><?php echo $payment_type;?> Payments</span></div>
	        		<div class="frm_inputs">
			        	<?php if($payments AND $payment_type == 'Incoming') : ?>
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
			        			<?php foreach ($payments->result() as $payment) :?>
			        			<tr>
			        				<td><a href="<?php echo base_url();?>loan/view_info/?id=<?php echo $payment->borrower_loan_id ;?>"><?php echo $payment->borrower_loan_id ;?></a></td>
			        				<td><?php echo $payment->payment_sched ;?></td>
			        				<td><?php echo $payment->amount ;?></td>
			        				<td><a href="<?php echo base_url();?>borrower/view/?id=<?php echo $payment->borrower_id ;?>"><?php echo $payment->lname.', '.$payment->fname ;?></a></td>
			        				<td><?php echo $payment->payment_number ;?></td>
			        			</tr>
			        			<?php endforeach; ?>
			        		</tbody>
			        	</table>
			        	<?php elseif($payments AND $payment_type == 'Received') : ?>
			        	<table class="tablesorter">
			        		<thead>
			        			<tr>
			        				<th>Loan #</th>
			        				<th>Process Date</th>
			        				<th>Amount Received</th>
			        				<th>Customer Name</th>
			        				<th>Processed By</th>
			        				<th>Payment #</th>
			        			</tr>
			        		</thead>
			        		<tbody>
			        			<?php foreach ($payments->result() as $payment) :?>
			        			<tr>
			        				<td><a href="<?php echo base_url();?>loan/view_info/?id=<?php echo $payment->borrower_loan_id ;?>"><?php echo $payment->borrower_loan_id ;?></a></td>
			        				<td><?php echo $payment->process_date ;?></td>
			        				<td><?php echo $payment->amount ;?></td>
			        				<td><a href="<?php echo base_url();?>borrower/view/?id=<?php echo $payment->borrower_id ;?>"><?php echo $payment->lname.', '.$payment->fname ;?></a></td>
			        				<td><?php echo $payment->username ;?></td>
			        				<td><?php echo $payment->payment_number ;?></td>
			        			</tr>
			        			<?php endforeach; ?>
			        		</tbody>
			        	</table>
			        	<?php else : ?>
					        No records found.
					    <?php endif; ?>
	        		</div>
	        	</div>
	        </div>
	        <div class="clearFix"></div>
		</div>