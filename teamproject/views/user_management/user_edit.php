<?php 
include_once '../../header.php'; 
global $tp_user;	

if( isset($_POST['submit_address'] ) )
	update_address();

$address_info = get_user_address( $tp_user->uid );
?>

<div class="buffer">
	<form action="" method="POST">
		<h3>Address</h3>
		<label for="street1">Street 1:</label>
		<input type="text" name="street1" id="street1" value="<?php echo $address_info['street1']; ?>" />

		<label for="street1">Street 2:</label>
		<input type="text" name="street2" id="street2" value="<?php echo $address_info['street2']; ?>" />

		<label for="state_prov">State/Province:</label>
		<input type="text" name="state_prov" id="state_prov" value="<?php echo $address_info['state_prov']; ?>" />

		<label for="zipcode">Zipcode:</label>
		<input type="text" name="zipcode" id="zipcode" value="<?php echo $address_info['zipcode']; ?>" />

		<label for="city">Zipcode:</label>
		<input type="text" name="city" id="city" value="<?php echo $address_info['city']; ?>" />
		
		<p><input type="submit" value="Submit" name="submit_address" /></p>
	</form>

</div>

<?php include_once SITE_DIR . 'footer.php'; ?>