		<div class="clearFix"></div>
		<div class="contentBody">
			<div class="contentTitle">Payments</div>
			<div class="clearFix"></div>
			<div class="leftcontentBody">
				<?php $this->menu->generate(); ?>
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
			        	<table class="incoming" cellspacing="1">
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
			        				<td><?php echo $this->config->item('currency_symbol') . $payment->amount ;?></td>
			        				<td><a href="<?php echo base_url();?>borrower/view/?id=<?php echo $payment->borrower_id ;?>"><?php echo $payment->lname.', '.$payment->fname ;?></a></td>
			        				<td><?php echo $payment->payment_number ;?></td>
			        			</tr>
			        			<?php endforeach; ?>
			        		</tbody>
			        	</table>
			        	<!-- pager -->
						<div class='incoming_pager'>
						    <img src='<?php echo base_url(); ?>css/tablesorter/first.png' class='first'/>
						    <img src='<?php echo base_url(); ?>css/tablesorter/prev.png' class='prev'/>
						    <span class='pagedisplay'></span> <!-- this can be any element, including an input -->
						    <img src='<?php echo base_url(); ?>css/tablesorter/next.png' class='next'/>
						    <img src='<?php echo base_url(); ?>css/tablesorter/last.png' class='last'/>
						    <select class='pagesize'>
						        <option value='20'>20</option>
						        <option value='30'>30</option>
						        <option value='40'>40</option>
						    </select>
						</div>
			        	<?php elseif($payments AND $payment_type == 'Received') : ?>
			        	<table class="received" cellspacing="1">
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
			        				<td><?php echo $this->config->item('currency_symbol') . $payment->amount ;?></td>
			        				<td><a href="<?php echo base_url();?>borrower/view/?id=<?php echo $payment->borrower_id ;?>"><?php echo $payment->lname.', '.$payment->fname ;?></a></td>
			        				<td><?php echo $payment->username ;?></td>
			        				<td><?php echo $payment->payment_number ;?></td>
			        			</tr>
			        			<?php endforeach; ?>
			        		</tbody>
			        	</table>
			        	<!-- pager -->
						<div class='received_pager'>
						    <img src='<?php echo base_url(); ?>css/tablesorter/first.png' class='first'/>
						    <img src='<?php echo base_url(); ?>css/tablesorter/prev.png' class='prev'/>
						    <span class='pagedisplay'></span> <!-- this can be any element, including an input -->
						    <img src='<?php echo base_url(); ?>css/tablesorter/next.png' class='next'/>
						    <img src='<?php echo base_url(); ?>css/tablesorter/last.png' class='last'/>
						    <select class='pagesize'>
						        <option value='20'>20</option>
						        <option value='30'>30</option>
						        <option value='40'>40</option>
						    </select>
						</div>
			        	<?php else : ?>
					        No records found.
					    <?php endif; ?>
	        		</div>
	        	</div>
	        </div>
	        <div class="clearFix"></div>
		</div>
		<script type='text/javascript'>
			$('.incoming').tablesorter()
				.tablesorterPager({
				    container: $('.incoming_pager'),
				    updateArrows: true,
				    page: 0,
				    size: 20,
				    fixedHeight: false,
				    removeRows: false,
				    cssNext: '.next',
				    cssPrev: '.prev',
				    cssFirst: '.first',
				    cssLast: '.last',
				    cssPageDisplay: '.pagedisplay',
				    cssPageSize: '.pagesize',
				    cssDisabled: 'disabled'
			});
			$('.received').tablesorter()
				.tablesorterPager({
				    container: $('.received_pager'),
				    updateArrows: true,
				    page: 0,
				    size: 20,
				    fixedHeight: false,
				    removeRows: false,
				    cssNext: '.next',
				    cssPrev: '.prev',
				    cssFirst: '.first',
				    cssLast: '.last',
				    cssPageDisplay: '.pagedisplay',
				    cssPageSize: '.pagesize',
				    cssDisabled: 'disabled'
			});
		</script>