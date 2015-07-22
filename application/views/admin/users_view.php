<h2>Administrative Users</h2>
<p>Instructions are to go in here...</p>

<div class="alert" id="message" style="display:none;"></div>

<?= anchor('admin/users/add','Add A New User',array('class'=>'button green'));?>

<table>
	<tr>
		<th>Name</th>
		<th>User Name</th>
		<th>Email Address</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<? if(count($users)): ?>
	<? foreach($users as $user):?>
	<tr>
		<td><?= $user['first_name'].' '.$user['last_name'];?></td>
		<td><?= $user['user_name'];?></td>
		<td><?= $user['email'];?></td>
		<td align="center"><?= anchor('admin/users/update/'.$user['user_name'],img(array('src'=>'images/icons/edit.png','alt'=>'edit')),array('title'=>'edit'));?></td>
		<td align="center"><?= $user['user_type'] ==2 ? '':anchor('admin/users/delete/'.$user['user_name'],img(array('src'=>'images/icons/delete.png','alt'=>'delete')),array('title'=>'delete','class'=>'delete_btn'))?></td>
	</tr>
	
	<? endforeach; ?>
	
	<? else: ?>
	
	<tr>
		<td colspan="5">There are currently no users in the system.</td>
	</tr>
	
	<? endif; ?>
	
</table>


<?= form_open(current_url());?>
	<?= form_fieldset('Add a New User');?>
		<p>Use the form below to add a new Administrative User (all fields required)</p>
		<?= validation_errors();?>
		<div class="grid_4 alpha">
			<?= form_label('First Name', 'first_name');?>
			<?= form_input(array('name'=>'first_name','id'=>'first_name','value'=>set_value('first_name'),'placeholder'=>'First Name'));?>
			
			<?= form_label('Last Name','last_name');?>
			<?= form_input(array('name'=>'last_name','id'=>'last_name','value'=>set_value('last_name'),'placeholder'=>'Last Name'));?>
			
			<?= form_label('Email Address','email');?>
			<?= form_input(array('name'=>'email','id'=>'email','type'=>'email','value'=>set_value('email'),'placeholder'=>'Email Address'));?>
		</div>
		<div class="grid_5 omega">	
			<?= form_label('User Name','user_name');?>
			<?= form_input(array('name'=>'user_name','id'=>'user_name','value'=>set_value('user_name'),'placeholder'=>'User Name'));?>
			
			<?= form_label('Password','password');?>
			<?= form_input(array('name'=>'password','id'=>'password','type'=>'password'));?>
			
			<?= form_label('Confirm Password','password2');?>
			<?= form_input(array('name'=>'password2','id'=>'password2','type'=>'password'));?>
			
			<?= form_input(array('name'=>'type','id'=>'type','type'=>'hidden','value'=>1));?>
			
		</div>
		<?= form_submit('submit','Add User',array('class'=>'button green'));?>
	<?= form_fieldset_close();?>
<?= form_close();?>

<script>
	$(function(){
		$('.delete_btn').click(function(evt){
			evt.preventDefault();
			var url = $(this).attr('href'),
				par = $(this).parent().parent();
				
				$(par).css({'background':'#bd1212'});
			
			if(confirm('Are You Sure You Want to Delete This User? Deleting a User is Instant and Permanent')){
				$.post(
					url,
					{
						'ajax' : 'true'
					},
					function(r){
						if(r.status === 'success'){
							$(par).fadeOut('slow').remove();
							// show message box
							$('#message').html(r.message).addClass('alert-success');
							$('#message').slideDown('slow').delay(3000).slideUp('slow');
							
							
						} else {
							// show message box
							$('#message').html(r.message).addClass('alert-error');
							$('#message').slideDown('slow').delay(3000).slideUp('slow');
							$(par).css({'background':'#fff0c4'});
						}
					},'json'
				);
				
			} else {
				$(par).css({'background':'none'});
			}
		});
	});
</script>
