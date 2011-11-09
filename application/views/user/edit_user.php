<div class="clearFix"></div>
		<div class="contentBody w400">
			<div class="contentTitle">Manage User</div>
			<div class="clearFix"></div>
			<div class="midcontentBody">
			<?php if($data) {
					$row = $data->row();
					}
			?>
				<?php echo form_open(base_url().'user/user_update/'.$this->uri->segment(3));?>		
					<?php 
					$fname = array(
								 'name' => 'fname',
								 'id'	 => 'fname',
								 'value'	 =>  isset($_POST['fname']) ? $_POST['fname']: (isset($row->fname) ? $row->fname : ''),
								  'size'   => '25'
							 );
							 
					$lname= array(
								 'name' => 'lname',
								 'id'	 => 'lname',
								 'value'	 =>  isset($_POST['lname']) ? $_POST['lname']: (isset($row->lname) ? $row->lname : ''),
								  'size'   => '25'
							 );
					
					
					?>
					
				<table>
					<tr>
						<td>
							User ID:
						</td>
						<td>
							 <?php echo $row->id; ?>
						</td>
					</tr>
					<tr>
						<td>
							First Name:
						</td>
						<td>
							 <?php echo form_input($fname); ?>
						</td>
					</tr>
					<tr>
						<td>
							Last Name:
						</td>
						<td>
							 <?php echo form_input($lname); ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo form_submit(array('name' => 'update', 'id' => 'update', ), 'UPDATE'); ?>
						</td>
					</tr>
				</table>
				<?php echo form_close()?>
			</div>
		</div>