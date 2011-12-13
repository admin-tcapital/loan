		<div class="clearFix"></div>
		<div class="contentBody">
			<div class="contentTitle">View Loan Types</div>
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
	        	<div class="manage_menu"><a href="<?php echo base_url();?>loan/add/" class="button_add">Add New</a></div>
	        	<div class="clearFix"></div>
	        	<table class="tablesorter" cellspacing="1">
	        		<thead>
	        			<tr>
	        				<th>Name</th>
	        				<th width="50">Interest</th>
	        				<th width="50">Terms</th>
	        				<th width="110">Frequency</th>
	        				<th width="45">Edit</th>
	        				<th width="45">Delete</th>
	        			</tr>
	        		</thead>
	        		<tbody>
	        			<?php $loans = $this->Loan_model->view_all();?>
	        			<?php foreach ($loans->result() as $loan) :?>
	        			<tr>
	        				<td style="font-size: 12px; color: #191970; font-weight: 900;"><?php echo $loan->lname; ?></td>
	        				<td><?php echo $loan->interest; ?>%</td>
	        				<td><?php echo $loan->terms; ?></td>
	        				<td>Every <?php echo $loan->frequency; ?></td>
	        				<td><a href="<?php echo base_url(); ?>loan/edit/?id=<?php echo $loan->id; ?>" style="margin-left: 12px;"><img src="<?php echo base_url(); ?>css/document_edit.png" /></a></td>
	        				<td><a href="<?php echo base_url(); ?>loan/delete/<?php echo $loan->id; ?>" style="margin-left: 12px;"><img src="<?php echo base_url(); ?>css/document_delete.png" /></a></td>
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
	        <div class="clearFix"></div>
		</div>