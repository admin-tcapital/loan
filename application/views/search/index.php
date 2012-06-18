		<div class="clearFix"></div>
		<div class="contentBody">
			<div class="contentTitle">Search Loan</div>
			<div class="clearFix"></div>
			<div class="leftcontentBody">
				<ul>
					<li><a href="<?php echo base_url(); ?>stats">Home</a></li><li><a href="<?php echo base_url(); ?>loan/view/">Loan</a></li>
					<li><a href="<?php echo base_url(); ?>borrower/">Borrower</a></li>
					<li><a href="<?php echo base_url(); ?>stats/payments">Payments</a></li>
				</ul>
	        </div>
	        <div class="rightcontentBody">
    			<?php 
    				if (isset($_GET['s']) AND trim($_GET['s']) != '') {
    					if (is_numeric($_GET['s'])) {
							$loans = $this->Search_model->search(array('lend_borrower_loans.id' => $_GET['s']));
    					} else {
	    					$loans = $this->Search_model->search("concat(lend_borrower.fname,' ',lend_borrower.lname) LIKE \"%".$_GET['s']."%\"");
    					}
    				}
				?>
				
				
				<div class="frm_container">
	        		<div class="frm_heading"><span>Search Result</span></div>
	        		<div class="frm_inputs">
	        			<?php if (@$loans) : ?>
	        			<table class="tablesorter" cellspacing="1">
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
			        			<?php foreach ($loans->result() as $loan) :?>
			        			<tr>
			        				<td><a href="<?php echo base_url(); ?>loan/view_info/?id=<?php echo $loan->borrower_loan_id;?>"><?php echo $loan->borrower_loan_id; ?></a></td>
			        				<td><?php echo $loan->loan_name; ?></td>
			        				<td><?php echo $loan->status; ?></td>
			        				<td><a href="<?php echo base_url(); ?>borrower/view/?id=<?php echo $loan->fborrower_id;?>"><?php echo $loan->lname.', '.$loan->fname; ?></a></td>
			        				<td><?php echo $this->config->item('currency_symbol') . number_format($loan->loan_amount_total, 2, '.', ','); ?></td>
			        			</tr>
			        			<?php endforeach; ?>
			        		</tbody>
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
			        	<?php else : ?>
			        	No record found. Please try again
			        	<?php endif; ?>
	        		</div>
	        	</div>
	        	
	        </div>
	        <div class="clearFix"></div>
		</div>