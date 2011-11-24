		<div class="clearFix"></div>
		<div class="contentBody">
			<div class="contentTitle">Search Loan</div>
			<div class="clearFix"></div>
			<div class="leftcontentBody">
				<ul>
					<li><a href="<?php echo base_url(); ?>loan/view/">Loan</a></li>
					<li><a href="<?php echo base_url(); ?>borrower/">Borrower</a></li>
					<li><a href="<?php echo base_url(); ?>stats/payments">Payments</a></li>
				</ul>
	        </div>
	        <div class="rightcontentBody">
    			<?php 
    				if (isset($_GET['loan_id']) AND trim($_GET['loan_id']) != '') {
						$loans = $this->Search_model->search(array('lend_borrower_loans.id' => $_GET['loan_id']));
    				} elseif (isset($_GET['customer_name']) AND trim($_GET['customer_name']) != '') {
    					$loans = $this->Search_model->search("concat(lend_borrower.fname,' ',lend_borrower.lname) LIKE '%".$_GET['customer_name']."%'");
    				}
				?>
				
				<?php if (@$loans) : ?>
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
	        			<?php foreach ($loans->result() as $loan) :?>
	        			<tr>
	        				<td><a href="<?php echo base_url(); ?>loan/view_info/?id=<?php echo $loan->borrower_loan_id;?>"><?php echo $loan->borrower_loan_id; ?></a></td>
	        				<td><?php echo $loan->loan_name; ?>%</td>
	        				<td><?php echo $loan->status; ?></td>
	        				<td><a href="<?php echo base_url(); ?>borrower/view/?id=<?php echo $loan->borrower_id;?>"><?php echo $loan->lname.', '.$loan->fname; ?></a></td>
	        				<td>&#8369;<?php echo number_format($loan->loan_amount_total, 2, '.', ','); ?></td>
	        			</tr>
	        			<?php endforeach; ?>
	        		</tbody>
	        	</table>
	        	<?php else : ?>
	        	No record found. Please try again
	        	<?php endif; ?>
	        </div>
	        <div class="clearFix"></div>
		</div>