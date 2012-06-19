		<div class="clearFix"></div>
		<div class="contentBody">
			<div class="contentTitle">Loan Summary</div>
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
	        		<div class="frm_heading"><span>Summary</span></div>
	        		<div class="frm_inputs">
			        	<table class="tablesorter" cellspacing="1">
			        		<thead>
			        			<tr>
			        				<th>Loan #</th>
			        				<th>Payment</th>
			        				<th>Principal</th>
			        				<th>Interest</th>
			        				<th>Balance</th>
			        			</tr>
			        		</thead>
			        		<tbody>
			        			<?php 
			        				$summary = $this->Report_model->get_summary();
			        				$t_payment = 0; $t_principal = 0; $t_interest = 0; $t_balance = 0;
			        			?>
			        			<?php foreach ($summary->result() as $row) :?>
			        			<?php $due = $row->is_due > 0 ? ' class="due"' : ''; ?>
			        			<tr>
			        				<td<?php echo $due; ?>><a href="<?php echo base_url();?>loan/view_info/?id=<?php echo $row->loan_id ;?>"><?php echo $row->loan_id ;?></a></td>
			        				<td<?php echo $due; ?>><?php echo $this->config->item('currency_symbol') . number_format($row->t_payment, 2, '.', ','); $t_payment += $row->t_payment; ?></td>
			        				<td<?php echo $due; ?>><?php echo $this->config->item('currency_symbol') . number_format($row->t_principal, 2, '.', ','); $t_principal += $row->t_principal;?></td>
			        				<td<?php echo $due; ?>><?php echo $this->config->item('currency_symbol') . number_format($row->t_interest, 2, '.', ','); $t_interest += $row->t_interest; ?></td>
			        				<td<?php echo $due; ?>><?php echo $this->config->item('currency_symbol') . number_format($row->t_balance, 2, '.', ','); $t_balance += $row->t_balance; ?></td>
			        			</tr>
			        			<?php endforeach; ?>
			        		</tbody>
			        		<tfoot>
			        			<tr>
			        				<td>TOTAL</td>
			        				<td><?php echo $this->config->item('currency_symbol') . number_format($t_payment, 2, '.', ','); ?></td>
			        				<td><?php echo $this->config->item('currency_symbol') . number_format($t_principal, 2, '.', ','); ?></td>
			        				<td><?php echo $this->config->item('currency_symbol') . number_format($t_interest, 2, '.', ','); ?></td>
			        				<td><?php echo $this->config->item('currency_symbol') . number_format($t_balance, 2, '.', ','); ?></td>
			        			</tr>
			        		</tfoot>
			        	</table>
			        	<div class="pager">
			        		<ul>
			        			<li><span class="first ui-icon ui-icon-seek-first"></span></li>
			        			<li><span class="prev ui-icon ui-icon-seek-prev"></span></li>
			        			<li><input class="pagedisplay" type="text"></li>
			        			<li><span class="next ui-icon ui-icon-seek-next"></span></li>
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