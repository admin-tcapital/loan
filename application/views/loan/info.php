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
		        				<td><?php echo $this->config->item('currency_symbol') . number_format($loan->loan_amount_total, 2, '.', ','); ?></td>
		        			</tr>
		        			<tr>
		        				<td>Payments Made:</td>
		        				<td><?php $payments = $this->Loan_model->payments_made($loan->borrower_loan_id); 
		        						echo !$payments ? $this->config->item('currency_symbol') . 0: $this->config->item('currency_symbol') . number_format($payments, 2, '.', ',');
		        					?>
		        				</td>
		        			</tr>
		        			<tr>
		        				<td>Remaining Balance:</td>
		        				<td><?php echo $this->config->item('currency_symbol') . number_format($loan->loan_amount_total - $payments, 2, '.', ','); ?></td>
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
					<span class="button_cart">Payment</span><span class="button_move">Move Payment</span>
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
		        				<td><?php echo $this->config->item('currency_symbol') . $payment->amount; ?></td>
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
							<div class="frm_container" id="dialog-modal-pay">
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
					        				<td><?php echo $this->config->item('currency_symbol') . $ipayment->amount; ?></td>
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
						
						<div style='display:none'>
							<div class="frm_container" id="dialog-modal-move">
				        		<div class="frm_heading"><span>Move Payment Confirmation</span></div>
				        		<div class="frm_inputs">
				        			<form action="<?php echo base_url(); ?>transaction/move/<?php echo $payment->id.'/'.$_GET['id']; ?>" method="post">
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
					        				<td><?php echo $this->config->item('currency_symbol') . $ipayment->amount; ?></td>
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
					        				<td>Move-in Date:</td>
					        				<td><input type="text" name="mdate" class="datepicker" value="<?php echo $ipayment->payment_sched; ?>" /></td>
					        			</tr>
					        			<tr>
					        				<td>Notes:</td>
					        				<td><textarea name="notes" rows="5" cols="45"></textarea></td>
					        			</tr>
					        			<!--
					        			<tr>
					        				<td></td>
					        				<td><input type="checkbox" name="move_all" /> adjust remaining payments</td>
					        			</tr>
					        			-->
					        			<tr>
					        				<td></td>
					        				<td><input type="submit" name="submit_move" value="Move Payment" /></td>
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
			        				<th>Payment #</th>
			        				<th>Check Date</th>
			        				<th>Amount</th>
			        				<th>Status</th>
			        			</tr>
			        		</thead>
			        		<tbody>
			        			<?php $payments = $this->Loan_model->payments_overview($_GET['id']);?>
			        			<?php foreach ($payments->result() as $payment) :?>
			        			<?php 
			        				//change color depending on it's status
			        				$css = '';
									$xstatus = '';
			        				if($payment->is_due > 0  AND $payment->status == 'UNPAID') {
			        					$css = ' class="due"';
										$xstatus = ' | OVER DUE';
			        				} elseif($payment->status=='PAID') {
			        					$css = ' class="paid"';
			        				} elseif($payment->is_due == 0  AND $payment->status == 'UNPAID') {
			        					$css = ' class="due_now"';
			        					$xstatus = ' | DUE TODAY';
									}
			        			?>
			        			<tr style="font-weight: <?php echo !empty($xstatus)?'900':'200'; ?>;">
			        				<td<?php echo $css; ?>><?php echo $payment->payment_number ;?></td>
			        				<td<?php echo $css; ?>><?php echo $payment->payment_sched ;?></td>
			        				<td<?php echo $css; ?>><?php echo $this->config->item('currency_symbol') . $payment->amount ;?></td>
			        				<td<?php echo $css; ?>><span style="color:<?php echo $payment->status=='PAID' ? 'GREEN' : 'RED'?>"><?php echo $payment->status.$xstatus; ?></span></td>
			        			</tr>
			        			<?php endforeach; ?>
			        		</tbody>
			        	</table>
	        		</div>
        		</div>
        		<div class="clearFix"></div>
        		<div class="frm_container">
	        		<div class="frm_heading"><span>Transactions</span></div>
	        		<div class="frm_inputs">
						<?php echo $this->logger->show($_GET['id']); ?>
	        		</div>
        		</div>
	        </div>
	        <div class="clearFix"></div>
		</div>
		<script type="text/javascript">
			$( '.button_cart' ).button({ icons: {primary:'ui-icon-cart'} });
			$( '.button_cart').colorbox({width:'50%', inline:true, href:'#dialog-modal-pay'});
			
			$( '.button_move' ).button({ icons: {primary:'ui-icon-transferthick-e-w'} });
			$( '.button_move').colorbox({width:'50%', inline:true, href:'#dialog-modal-move'});
		</script>