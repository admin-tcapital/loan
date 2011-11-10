		<div class="clearFix"></div>
		<div class="contentBody w400">
			<div class="contentTitle">Search</div>
			<div class="clearFix"></div>
			<div class="midcontentBody">
					<?php echo form_open(base_url() . 'user/search_info'); ?>
					
					<?php 
							$search = array(
												'name' => 'search',
												'id'	 => 'search',
												'value'	 => isset($_POST['search']) ? $_POST['search'] : ''
											   );
											   
											   

							$option_name = array(
									    'name'        => 'option',
									    'id'          => 'option',
									    'value'       => 'name',
									    'checked'     => isset($_POST['option']) ? $_POST['option']== 'name':TRUE,
									    'style'       => 'margin:10px',
									    );
							
							$option_id = array(
									    'name'        => 'option',
									    'id'          => 'option',
									    'value'       => 'id',
									    'checked'     => isset($_POST['option']) ? $_POST['option']== 'id':TRUE,
									    'style'       => 'margin:10px',
									    );
					
					?>
					
					<table width="100%" border="0" cellpadding="5">
					 	<tr>
							<td width="10%">
								<font size = "3"><b>Find:</b></font>
							</td>
							<td width="80%">
								<?php echo form_input($search); ?>
							</td>
						</tr>
					 </table>
					 <table>
					 	<tr>
							<td>
								Name:
							</td>
							<td>
								<?php echo form_radio($option_name)?>
							</td>
						</tr>
						<tr>
							<td>
								Borrower ID:
							</td>
							<td>
								<?php echo form_radio($option_id)?>
							</td>
						</tr>
						<tr>
							<td>
								
							</td>
							<td>
								<?php echo form_submit(array('name' => 'search_but', 'id' => 'search_but', ),'Search'); ?>
							</td>
						</tr>
					 </table>
					 <table>
					 	<tr>
							<td>
								<font color = "RED">
									<?php echo validation_errors(); ?>
								</font>
							</td>
						</tr>
					 </table>
				<?php echo form_close(); ?>
			</div>
		</div>
		<div class="clearFix"></div>
		<div class="contentBody w800">
			<div class="contentTitle">Result</div>
			<div class="clearFix"></div>
			<div class="midcontentBody">
			<?php 
				if(isset($data))
				{
						
					 echo "<table class = 'tablesorter' width=1000 border=0 align=center cellspacing=1 cellpadding=3>";
					 echo "<thead>";
					 echo"<th>"."<b>"."Borrower ID"."</b>"."</th>";
					 echo"<th>"."<b>"."Loan ID"."</b>"."</th>";
					 echo"<th>"."<b>"."Name"."</b>"."</th>";
					 echo"<th>"."<b>"."Civil Status"."</b>"."</th>";
					 echo"<th>"."<b>"."Gender"."</b>"."</th>";
					 echo"<th>"."<b>"."Age"."</b>"."</th>";
					 echo"<th>"."<b>"."Address"."</b>"."</th>";
					 echo"<th>"."<b>"."Contact#"."</b>"."</th>";
					 echo"<th>"."<b>"."View"."</b>"."</th>";
					 echo "</thead>";
					 echo "<tbody>";
				 	
					foreach($data->result() as $row)
						{
							
							echo '<tr>';
							echo '<td>'.$row->borrower_id.'</td>';
							echo '<td>'.$row->loan_id.'</td>';
							echo '<td>'.$row->fname." ".$row->lname." ".$row->mi.'</td>';
							echo '<td>'.$row->civil_status.'</td>';
							echo '<td>'.$row->sex.'</td>';
							echo '<td>'.$row->age.'</td>';
							echo '<td>'.$row->address.'</td>';
							echo '<td>'.$row->phone_cell.'</td>';
							echo '<td>'.'<a target="_blank" href="'.base_url().'user/loan_view/'.$row->borrower_id.'">'.'<img src="'.base_url().'css/view.png" />'.'<a>'.'</td>';
						}
					echo '</tr>';
					echo "</tbody>";
					echo '</table>';
				}
			
			?>
		</div>
		</div>