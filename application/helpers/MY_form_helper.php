<?php
/* EXTRA FUNCTIONALITY FOR THE FORM HELPER */

if ( ! function_exists('secure_form_open'))
{
	function secure_form_open($action = '', $attributes = '', $hidden = array())
	{
		$CI =& get_instance();

		if ($attributes == '')
		{
			$attributes = 'method="post"';
		}

		$action = ( strpos($action, '://') === FALSE) ? $CI->config->secure_site_url($action) : $action;

		$form = '<form action="'.$action.'"';
	
		$form .= _attributes_to_string($attributes, TRUE);
	
		$form .= '>';

		if (is_array($hidden) AND count($hidden) > 0)
		{
			$form .= form_hidden($hidden);
		}

		return $form;
	}
}




//To create a drop down list of states with the option of including Canadian Provinces
function getStates($limit=FALSE)
{
$statearray= array(
		"" => "Select Your State/Province",
		"AK"=>"Alaska", 
		"AL"=>"Alabama", 
		"AR"=>"Arkansas", 
		"AZ"=>"Arizona", 
		"CA"=>"California", 
		"CO"=>"Colorado", 
		"CT"=>"Connecticut",
		"DC"=>"District of Columbia",
		"DE"=>"Delaware", 
		"FL"=>"Florida",
		"GA"=>"Georgia", 
		"HI"=>"Hawaii",
		"IA"=>"Iowa",
		"ID"=>"Idaho",
		"IL"=>"Illinois",
		"IN"=>"Indiana",
		"KS"=>"Kansas",
		"KY"=>"Kentucky",
		"LA"=>"Louisiana",
		"MA"=>"Massachussets",
		"MD"=>"Maryland",
		"ME"=>"Maine",
		"MI"=>"Michigan",
		"MN"=>"Minnesota",
		"MO"=>"Missouri",
		"MS"=>"Mississippi",
		"MT"=>"Montana",
		"NC"=>"North Carolina",
		"ND"=>"North Dakota",
		"NE"=>"Nebraska",
		"NH"=>"New Hampshire",
		"NJ"=>"New Jersey",
		"NM"=>"New Mexico",
		"NV"=>"Nevada", 
		"NY"=>"New York",
		"OH"=>"Ohio",
		"OK"=>"Oklahoma",
		"OR"=>"Oregon",
		"PA"=>"Pennsylvania",
		"PR"=>"Puerto Rico",
		"RI"=>"Rhode Island",
		"SC"=>"South Carolina",
		"SD"=>"South Dakota",
		"TN"=>"Tennessee",
		"TX"=>"Texas",
		"UT"=>"Utah",
		"VA"=>"Virginia",
		"VT"=>"Vermont",
		"WA"=>"Washington",
		"WI"=>"Wisconsin",
		"WV"=>"West Virginia",
		"WY"=>"Wyoming"
	);
	
	if(!$limit)
		{
			$statearray["AB"]="Alberta";
			$statearray["BC"]="British Columbia";
			$statearray["MB"]="Manitoba";
			$statearray["NB"]="New Brunswick";
			$statearray["NF"]="Newfoundland";
			$statearray["NT"]="Northwest Territories";
			$statearray["NS"]="Nova Scotia";
			$statearray["NU"]="Nunavit";
			$statearray["ON"]="Ontario";
			$statearray["PE"]="Prince Edward Island";
			$statearray["QC"]="Quebec";
			$statearray["SK"]="Saskatchewan";
			$statearray["YT"]="Yukon Territory";
		}
	return $statearray;
}

//To create a list of Counntries with the option of limiting it to the US and Canada
function getCountries($limit=TRUE)
{
	if($limit)
		$countryarray=array(""=>"Select Your Country", "USA"=>"United States", "CAN"=>"Canada");
	else
	{	$countryarray = array(
			'' => 'Select Your Country',
			'USA'=>'United States',
			'CAN' => 'Canada',
			'AFG'=>'Afghanistan',
			'ALB'=>'Albania',
			'DZA'=>'Algeria',
			'ASM'=>'American Samoa',
			'AND'=>'Andorra',
			'AGO'=>'Angola',
			'AIA'=>'Anguilla',
			'ATA'=>'Antarctica',
			'ATG'=>'Antigua And Barbuda',
			'ARG'=>'Argentina',
			'ARM'=>'Armenia',
			'ABW'=>'Aruba',
			'AUS'=>'Australia',
			'AUT'=>'Austria',
			'AZE'=>'Azerbaijan',
			'BHS'=>'Bahamas',
			'BHR'=>'Bahrain',
			'BGD'=>'Bangledesh',
			'BRB'=>'Barbados',
			'BLR'=>'Belarus',
			'BEL'=>'Belgium',
			'BLZ'=>'Belize',
			'BEN'=>'Benin',
			'BMU'=>'Bermuda',
			'BTN'=>'Bhutan',
			'BOL'=>'Bolivia',
			'BIH'=>'Bosnia And Herzegovina',
			'BWA'=>'Botswana',
			'BVT'=>'Bouvet Island',
			'BRA'=>'Brazil',
			'IOT'=>'British Indian Ocean Territory',
			'BRN'=>'Brunei Darussalam',
			'BGR'=>'Bulgaria',
			'BFA'=>'Burkina Faso',
			'BDI'=>'Burundi',
			'KHM'=>'Cambodia',
			'CMR'=>'Cameroon',
			'CPV'=>'Cape Verde',
			'CYM'=>'Cayman Islands',
			'CAF'=>'Central African Republic',
			'TCD'=>'Chad',
			'CHL'=>'Chile',
			'CHN'=>'China',
			'CXR'=>'Christmas Island',
			'CCK'=>'Cocos (Keeling) Islands',
			'COL'=>'Colombia',
			'COM'=>'Comoros',
			'COG'=>'Congo',
			'COK'=>'Cook Islands',
			'CRI'=>'Costa Rica',
			'CIV'=>'Cote D Ivoire',
			'HRV'=>'Croatia',
			'CYP'=>'Cyprus',
			'CZE'=>'Czech Republic',
			'DNK'=>'Denmark',
			'DJI'=>'Djibouti',
			'DMA'=>'Dominica',
			'DOM'=>'Domincan Republic',
			'ECU'=>'Ecuador',
			'EGY'=>'Egypt',
			'SLV'=>'El Salvador',
			'GNQ'=>'Equatorial Guinea',
			'ERI'=>'Eritrea',
			'EST'=>'Estonia',
			'ETH'=>'Ethiopia',
			'FLK'=>'Falkland Islands',
			'FRO'=>'Faroe Islands',
			'FJI'=>'Fiji',
			'FIN'=>'Finland',
			'FRA'=>'France',
			'GUF'=>'French Guiana',
			'PYF'=>'French Polynesia',
			'GAB'=>'Gabon',
			'GMB'=>'Gambia',
			'GEO'=>'Georgia',
			'DEU'=>'Germany',
			'GHA'=>'Ghana',
			'GIB'=>'Gibraltar',
			'GRC'=>'Greece',
			'GRL'=>'Greenland',
			'GRD'=>'Grenada',
			'GLP'=>'Guadeloupe',
			'GUM'=>'Guam',
			'GTM'=>'Guatemala',
			'GIN'=>'Guinea',
			'GUY'=>'Guyana',
			'HTI'=>'Haiti',
			'HND'=>'Honduras',
			'HKG'=>'Hong Kong',
			'HUN'=>'Hungary',
			'ISL'=>'Iceland',
			'IND'=>'India',
			'IDN'=>'Indonesia',
			'IRQ'=>'Iraq',
			'IRL'=>'Ireland',
			'ISR'=>'Israel',
			'ITA'=>'Italy',
			'JAM'=>'Jamaica',
			'JPN'=>'Japan',
			'JOR'=>'Jordan',
			'KAZ'=>'Kazakhstan',
			'KEN'=>'Kenya',
			'KIR'=>'Kiribati',
			'KOR'=>'South Korea',
			'KWT'=>'Kuwait',
			'KGZ'=>'Kyrgyzstan',
			'LAO'=>'Lao',
			'LVA'=>'Latvia',
			'LBN'=>'Lebanon',
			'LSO'=>'Lesotho',
			'LBR'=>'Liberia',
			'LIE'=>'Liechtenstein',
			'LTU'=>'Lithuania',
			'LUX'=>'Luxembourg',
			'MAC'=>'Macao',
			'MKD'=>'Macedonia',
			'MDG'=>'Madagascar',
			'MWI'=>'Malawi',
			'MYS'=>'Malaysia',
			'MDV'=>'Maldives',
			'MLI'=>'Mali',
			'MLT'=>'Malta',
			'MHL'=>'Marshall Islands',
			'MTQ'=>'Martinique',
			'MRT'=>'Mauritania',
			'MUS'=>'Mauritius',
			'MYT'=>'Mayotte',
			'MEX'=>'Mexico',
			'FSM'=>'Micornesia',
			'MDA'=>'Moldova',
			'MCO'=>'Monaco',
			'MNG'=>'Mongolia',
			'MSR'=>'Montserrat',
			'MAR'=>'Morocco',
			'MOZ'=>'Mozambique',
			'NAM'=>'Namibia',
			'NRU'=>'Nauru',
			'NPL'=>'Nepal',
			'NLD'=>'Nehterlands',
			'ANT'=>'Netherlands Antilles',
			'NCL'=>'New Caledonia',
			'NZL'=>'New Zealand',
			'NIC'=>'Nicaragua',
			'NER'=>'Niger',
			'NGA'=>'Nigeria',
			'NIU'=>'Niue',
			'NFK'=>'Norfollk Island',
			'MNP'=>'Northern Mariana Islands',
			'NOR'=>'Norway',
			'OMN'=>'Oman',
			'PAK'=>'Pakistan',
			'PLW'=>'Palau',
			'PAN'=>'Panama',
			'PNG'=>'Papua New Guinea',
			'PRY'=>'Paraguay',
			'PER'=>'Peru',
			'PHL'=>'Philippines',
			'PCN'=>'Pitcairn',
			'POL'=>'Poland',
			'PRT'=>'Portugal',
			'PRI'=>'Puerto Rico',
			'QAT'=>'Qatar',
			'REU'=>'Reunion',
			'ROU'=>'Romania',
			'RUS'=>'Russian Federation',
			'RWA'=>'Rwanda',
			'SHN'=>'Saint Helena',
			'LCA'=>'Saint Lucia',
			'SPM'=>'Saint Pierre and Miquelon',
			'WSM'=>'Samoa',
			'SMR'=>'San Marino',
			'SAU'=>'Saudi Arabia',
			'SEN'=>'Senegal',
			'SYC'=>'Seychelles',
			'SLE'=>'Sierra Leone',
			'SGP'=>'Singapore',
			'SVK'=>'Slovakia',
			'SVN'=>'Slovenia',
			'SLB'=>'Solomon Islands',
			'SOM'=>'Somalia',
			'ZAF'=>'South Africa',
			'ESP'=>'Spain',
			'LKA'=>'Sri Lanka',
			'SDN'=>'Sudan',
			'SUR'=>'Suriname',
			'SWZ'=>'Swaziland',
			'SWE'=>'Sweden',
			'CHE'=>'Switzerland',
			'TWN'=>'Taiwan',
			'TJK'=>'Tajikistan',
			'TZA'=>'Tanzania',
			'THA'=>'Thailand',
			'TGO'=>'Togo',
			'TKL'=>'Tokelau',
			'TON'=>'Tonga',
			'TTO'=>'Trinidad And Tobago',
			'TUN'=>'Tunisia',
			'TUR'=>'Turkey',
			'TKM'=>'Turkmenistan',
			'TUV'=>'Tuvalu',
			'UGA'=>'Uganda',
			'UKR'=>'Ukraine',
			'ARE'=>'United Arab Emirates',
			'GBR'=>'United Kingdom',
			
			'URY'=>'Uruguay',
			'UZB'=>'Uzbekistan',
			'VUT'=>'Vanuatu',
			'VEN'=>'Venezuela',
			'VNM'=>'Vietnam',
			'VIR'=>'US Virgin Islands',
			'WLF'=>'Wallis And Futuna',
			'ESH'=>'Western Sahara',
			'YEM'=>'Yemen',
			'ZMB'=>'Zambia',
			'ZWE'=>'Zimbabwe'
			);
		}
	return $countryarray;

}

function create_year_select($interval)
{
	
	$curryear = date("Y");
	$i=$curryear+$interval;
	while($curryear < $i)
	{
		$data[$curryear] = $curryear;
		$curryear++;
	}
	return $data;
}

function create_month_select()
{
	$data = array(
		'01' => 1,
		'02' => 2,
		'03' => 3,
		'04' => 4,
		'05' => 5,
		'06' => 6,
		'07' => 7,
		'08' => 8,
		'09' => 9,
		'10' => 10,
		'11' => 11,
		'12' => 12
	);	
	return $data;
}

/* End of file MY_form_helper.php */
/* Location: ./system/application/helpers/MY_form_helper.php */