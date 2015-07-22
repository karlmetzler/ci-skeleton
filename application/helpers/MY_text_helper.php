<?php
/* EXTRA FUNCTIONALITY FOR THE TEXT HELPER */
function formatPhone($sPhone)
{
	$sPhone = preg_replace("[^0-9]",'',$sPhone);
	if(strlen($sPhone) != 10) return(False);
	$sArea = substr($sPhone,0,3);
	$sPrefix = substr($sPhone,3,3);
	$sNumber = substr($sPhone,6,4);
	$sPhone = "(".$sArea.")".$sPrefix."-".$sNumber;
	return($sPhone);
}

function dynamicCopyrightYear($YearSiteCreated)
	{
	
	if (date('Y') > $YearSiteCreated)
	{return $YearSiteCreated." - ".date('Y');}
	else
	{return $YearSiteCreated;}
	}
	
	
function make_possessive($string)
{
	$last_char = substr($string,-1);
	if($last_char == 's' || $last_char == 'S')
	{
		return $string.'&rsquo;';
	}
	else
		{
			return $string.'&rsquo;s';
		}
		
}
	
/* End of file MY_text_helper.php */
/* Location: ./system/application/helpers/MY_text_helper.php */