		<div class="clearFix"></div>
		<div class="contentBody w400">
			<div class="contentTitle">Manage User</div>
			<div class="clearFix"></div>
			<div class="midcontentBody">
				<form action="" method="post">
					<?php 
						
					 echo "<table class = 'tablesorter' width=1000 border=0 align=center cellspacing=1 cellpadding=3>";
					 echo "<thead>";
					 echo"<th>"."<b>"."User ID"."</b>"."</th>";
					 echo"<th>"."<b>"."User Name"."</b>"."</th>";
					 echo"<th>"."<b>"."Edit"."</b>"."</th>";
					 echo"<th>"."<b>"."Delete"."</b>"."</th>";
					 echo "</thead>";
					 echo "<tbody>";
				 	
					foreach($data->result() as $row)
						{
							
							echo '<tr>';
							echo '<td>'.$row->id.'</td>';
							echo '<td>'.$row->username.'</td>';
							echo '<td>'.'<a target="_blank" href="'.base_url().'user/user_edit/'.$row->id.'">'.'<img src="'.base_url().'css/document_edit.png" />'.'<a>'.'</td>';
						   	echo '<td>'.'<a href="'.base_url().'user/user_delete/'.$row->id.'">'.'<img src="'.base_url().'css/document_delete.png" />'.'<a>'.'</td>';
						}
					echo '</tr>';
					echo "</tbody>";
					echo '</table>';
					
					?>
				</form>
			</div>
		</div>