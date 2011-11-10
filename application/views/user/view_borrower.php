		<div class="clearFix"></div>
		<div class="contentBody w400">
			<div class="contentTitle">Borrower Info</div>
			<div class="clearFix"></div>
			<div class="midcontentBody">
					<?php 
				if(isset($data))
				{
						
					
				 	
					foreach($data->result() as $row)
						{
							
							echo "<table class = 'tablesorter' width=1000 border=0 align=center cellspacing=1 cellpadding=3>";
							echo "<tbody>";
							echo '<tr>';
							echo"<th>"."<b>"."Borrower ID"."</b>"."</th>";
							echo '<td>'.$row->borrower_id.'</td>';
							echo '</tr>';
							echo"<th>"."<b>"."Name"."</b>"."</th>";
							echo '<td>'.$row->fname." ".$row->lname." ".$row->mi.'</td>';
							echo '</tr>';
							echo"<th>"."<b>"."Civil Status"."</b>"."</th>";
							echo '<td>'.$row->civil_status.'</td>';
							echo '</tr>';
							echo"<th>"."<b>"."Gender"."</b>"."</th>";
							echo '<td>'.$row->sex.'</td>';
							echo '</tr>';
							echo"<th>"."<b>"."Age"."</b>"."</th>";
							echo '<td>'.$row->age.'</td>';
							echo '</tr>';
						 	echo"<th>"."<b>"."Address"."</b>"."</th>";
							echo '<td>'.$row->address.'</td>';
							echo '</tr>';
							echo"<th>"."<b>"."Contact#"."</b>"."</th>";
							echo '<td>'.$row->phone_cell.'</td>';
							echo '</tr>';
							echo"<th>"."<b>"."Email"."</b>"."</th>";
							echo '<td>'.$row->email.'</td>';
							echo '</tr>';
							echo"<th>"."<b>"."Company"."</b>"."</th>";
							echo '<td>'.$row->company.'</td>';
							echo '</tr>';
							echo"<th>"."<b>"."Job Title"."</b>"."</th>";
							echo '<td>'.$row->job_title.'</td>';
							echo '</tr>';
							echo"<th>"."<b>"."Employment Status"."</b>"."</th>";
							echo '<td>'.$row->employment_status.'</td>';
							echo '</tr>';
							echo"<th>"."<b>"."Birth Date"."</b>"."</th>";
							echo '<td>'.$row->birth_date.'</td>';
							echo '</tr>';
							echo"<th>"."<b>"."Loan Date"."</b>"."</th>";
							echo '<td>'.$row->rdate.'</td>';
							echo '</tr>';
							echo"<th>"."<b>"."Loan Status"."</b>"."</th>";
							echo '<td>'.$row->status.'</td>';
							echo '</tr>';
							echo "</tbody>";
							echo '</table>';
						}
						
					
				}
			?>
			</div>
		</div>
		<div class="clearFix"></div>
		<div class="contentBody w800">
			<div class="contentTitle">Loan Info</div>
			<div class="clearFix"></div>
			<div class="midcontentBody">
			<?php 
				if(isset($data))
				{
						
					 echo "<table class = 'tablesorter' width=1000 border=0 align=center cellspacing=1 cellpadding=3>";
					 echo "<thead>";
					 echo"<th>"."<b>"."Borrower ID"."</b>"."</th>";
					 echo"<th>"."<b>"."Loan ID"."</b>"."</th>";
					 echo"<th>"."<b>"."Loan Status"."</b>"."</th>";
					 echo"<th>"."<b>"."Loan Amount"."</b>"."</th>";
					 echo"<th>"."<b>"."Loan Interest"."</b>"."</th>";
					 echo"<th>"."<b>"."Term"."</b>"."</th>";
					 echo"<th>"."<b>"."Loan Total"."</b>"."</th>";
					 echo "</thead>";
					 echo "<tbody>";
				 	
					foreach($data->result() as $row)
						{
							
							echo '<tr>';
							echo '<td>'.$row->borrower_id.'</td>';
							echo '<td>'.$row->loan_id.'</td>';
							echo '<td>'.$row->status.'</td>';
							echo '<td>'.$row->loan_amount.'</td>';
							echo '<td>'.$row->loan_amount_interest.'</td>';
							echo '<td>'.$row->loan_amount_term.'</td>';
							echo '<td>'.$row->loan_amount_total.'</td>';
						}
					echo '</tr>';
					echo "</tbody>";
					echo '</table>';
				}
			
			?>
		</div>
		</div>