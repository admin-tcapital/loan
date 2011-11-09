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
					$username = array(
								 'name' => 'username',
								 'id'	 => 'username',
								 'value'	 =>  isset($_POST['username']) ? $_POST['username']: (isset($row->username) ? $row->username : ''),
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
							User Name:
						</td>
						<td>
							 <?php echo form_input($username); ?>
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