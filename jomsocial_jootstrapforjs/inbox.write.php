<?php
/**
 * @package		JomSocial
 * @subpackage 	Template 
 * @copyright (C) 2008 by Slashes & Dots Sdn Bhd - All rights reserved!
 * @license		GNU/GPL, see LICENSE.php
 */
defined('_JEXEC') or die();
?>
<script type="text/javascript">
function disableFormField(){

//change the background color to light grey
document.getElementById('to').style.backgroundColor      = "#eee";
document.getElementById('subject').style.backgroundColor = "#eee";
document.getElementById('message-body').style.backgroundColor    = "#eee";

//text field
document.getElementById('to').readonly = true;
document.getElementById('subject').readonly = true;
document.getElementById('message-body').readonly = true;

//button
document.getElementById('submitBtn').disabled = true;
//document.getElementById('cancelBtn').disabled = true;

}//end disableFormField

var yPos;

function addFriendName()
{
    var inputs 		= [];    
    
    joms.jQuery('#selections option:selected').each( function() {
		inputs.push(this.value);				
	});

    var x = inputs.join(', ');
    joms.jQuery('#to').val(x);
}

joms.jQuery(document).ready(function(){
	<?php 
		//@since 2.4
		if(isset($data->toUsersInfo) && count($data->toUsersInfo) > 0 ){
			foreach($data->toUsersInfo as $user){
	?>
		cAddRecipients('<?php echo $user['rid'] ?>','<?php echo $user['avatar'] ?>','<?php echo $user['name'] ?>');
	<?php
			}
		}
	?>
});

</script>
<div class="app-box">
<form name="jsform-inbox-write" class="community-form-validate composeForm" id="writeMessageForm" action="<?php echo CRoute::getURI(); ?>" method="post" onsubmit="disableFormField();">
<?php
if( $totalSent >=  $maxSent && $maxSent != 0 )
{
?>
	<div class="error-box"><?php echo JText::_('COM_COMMUNITY_PM_LIMIT_REACHED');?></div>
<?php
}
else
{
?>
	<div class="cFormWrapper cFormSidebar">
		<table class="formtable" cellspacing="0" cellpadding="0">
			<?php echo $beforeFormDisplay;?>
			<!-- name -->
			<tr>
				<td class="key">
					<label for="name" class="label title">
					*<?php echo ($useRealName == '1') ? JText::_('COM_COMMUNITY_COMPOSE_TO_REALNAME') : JText::_('COM_COMMUNITY_COMPOSE_TO_USERNAME'); ?>
					</label>
				</td>
				<td class="value">
					<div id="inbox-selected-to-wrapper">
						<ul id="inbox-selected-to">
						</ul>
						<a id="addRecipient" href="javascript:void(0);" onclick="joms.friends.showForm('', 'friends,inviteUsers','0','1','joms.friends.selectRecipients()');;" ><?php echo JText::_('COM_COMMUNITY_INBOX_ADD_RECIPIENT');?></a>						
					</div>
				</td>
			</tr>
			<!-- subject -->
			<tr>
				<td class="key">
					<label for="description" class="label title">
						*<?php echo JText::_('COM_COMMUNITY_COMPOSE_SUBJECT'); ?>
					</label>
				</td>
				<td class="value">
					<input id="subject" class="inputbox fullwidth required text" name="subject" type="text" value="<?php echo htmlspecialchars($data->subject); ?>" />
				</td>
			</tr>
			<!-- message -->
			<tr>
				<td class="key">
					<label for="description" class="label title">
						*<?php echo JText::_('COM_COMMUNITY_COMPOSE_MESSAGE'); ?>
					</label>
				</td>
				<td class="value">
					<textarea id="message-body" name="body" class="inputbox fullwidth required textarea" style="resize: vertical; height: 280px"><?php echo $data->body; ?></textarea>
				</td>
			</tr>
			<tr>
				<td class="key"></td>
				<td class="value"><span class="hints"><?php echo JText::_( 'COM_COMMUNITY_REGISTER_REQUIRED_FILEDS' ); ?></span></td>
			</tr>
			<tr>
				<td colspan="2">
					<?php echo $afterFormDisplay;?>
				</td>
			</tr>
			<!-- buttons -->
			<tr class="noLabel">
				<td class="key"></td>
				<td class="value">
					<input type="hidden" name="action" value="doSubmit"/>					
					<input id="submitBtn" class="cButton validateSubmit" name="submitBtn" type="submit" value="<?php echo JText::_('COM_COMMUNITY_INBOX_SEND_MESSAGE'); ?>" />
				</td>
			</tr>
		</table>
	</div>
</form>
<script type="text/javascript">
    cvalidate.init();
    cvalidate.setSystemText('REM','<?php echo addslashes(JText::_("COM_COMMUNITY_ENTRY_MISSING")); ?>');
</script>
<?php
}
?>
</div>
