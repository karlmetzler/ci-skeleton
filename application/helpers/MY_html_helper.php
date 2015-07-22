<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function img($src = '', $index_page = FALSE)
	{
		if ( ! is_array($src) )
		{
			$src = array('src' => $src);
		}

		$img = '<img';

		foreach ($src as $k=>$v)
		{

			if ($k == 'src' AND strpos($v, '://') === FALSE)
			{
				$CI =& get_instance();

				if ($index_page === TRUE)
				{
					if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] = 'on')
					{
						$img .= ' src="'.$CI->config->secure_site_url($v).'" ';
					}
					else
					{
						$img .= ' src="'.$CI->config->site_url($v).'" ';
					}
				}
				else
				{
					if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] = 'on')
					{
						$img .= ' src="'.$CI->config->slash_item('secure_base_url').$v.'" ';
					}
					else
					{
						$img .= ' src="'.$CI->config->slash_item('base_url').$v.'" ';
					}
				}
			}
			else
			{
				$img .= " $k=\"$v\" ";
			}
		}

		$img .= '/>';

		return $img;
}


function link_tag($href = '', $rel = 'stylesheet', $type = 'text/css', $title = '', $media = '', $index_page = FALSE)
	{
		$CI =& get_instance();

		$link = '<link ';

		if (is_array($href))
		{
			foreach ($href as $k=>$v)
			{
				if ($k == 'href' AND strpos($v, '://') === FALSE)
				{
					if ($index_page === TRUE)
					{
						if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] = 'on')
						{
							$link .= ' href="'.$CI->config->secure_site_url($v).'" ';
						}
						else
						{
							$link .= ' href="'.$CI->config->site_url($v).'" ';
						}
					}
					else
					{
						if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] = 'on')
						{
							$link .= ' href="'.$CI->config->slash_item('secure_base_url').$v.'" ';
						}
						else
						{
							$link .= ' href="'.$CI->config->slash_item('base_url').$v.'" ';
						}
					}
				}
				else
				{
					$link .= "$k=\"$v\" ";
				}
			}

			$link .= "/>";
		}
		else
		{
			if ( strpos($href, '://') !== FALSE)
			{
				$link .= ' href="'.$href.'" ';
			}
			elseif ($index_page === TRUE)
			{
				if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] = 'on')
				{
					$link .= ' href="'.$CI->config->secure_site_url($href).'" ';
				}
				else
				{
					$link .= ' href="'.$CI->config->site_url($href).'" ';
				}
			}
			else
			{
				if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] = 'on')
				{
					$link .= ' href="'.$CI->config->slash_item('secure_base_url').$href.'" ';
				}
				else
				{
					$link .= ' href="'.$CI->config->slash_item('base_url').$href.'" ';
				}
			}

			$link .= 'rel="'.$rel.'" type="'.$type.'" ';

			if ($media	!= '')
			{
				$link .= 'media="'.$media.'" ';
			}

			if ($title	!= '')
			{
				$link .= 'title="'.$title.'" ';
			}

			$link .= '/>';
		}


		return $link;
}

/**
* Script
*
* Generates a script inclusion of a JavaScript file
* Based on the CodeIgniters original Link Tag.
*
* Author(s): Isern Palaus <ipalaus@ipalaus.es>, Viktor Rutberg <wishie@gmail.com>
*
* @access    public
* @param    mixed    javascript sources or an array
* @param    string    language
* @param    string    type
* @param    boolean    should index_page be added to the javascript path
* @return    string
*/    

if ( ! function_exists('script_tag'))
{
    function script_tag($src = '', $language = 'javascript', $type = 'text/javascript', $index_page = FALSE)
    {
        $CI =& get_instance();

        $script = '<script ';
        
        if(is_array($src))
        {
            foreach($src as $v)
            {
                if ($k == 'src' AND strpos($v, '://') === FALSE)
                {
                    if ($index_page === TRUE)
                    {
                        $script .= ' src="'.$CI->config->site_url($v).'"';
                    }
                    else
                    {
                        $script .= ' src="'.$CI->config->slash_item('base_url').$v.'"';
                    }
                }
                else
                {
                    $script .= "$k=\"$v\"";
                }
            }
            
            $script .= ">\n";
        }
        else
        {
            if ( strpos($src, '://') !== FALSE)
            {
                $script .= ' src="'.$src.'" ';
            }
            elseif ($index_page === TRUE)
            {
                $script .= ' src="'.$CI->config->site_url($src).'" ';
            }
            else
            {
                $script .= ' src="'.$CI->config->slash_item('base_url').$src.'" ';
            }
                
            $script .= 'language="'.$language.'" type="'.$type.'"';
            
            $script .= '>'."\n";
        }

        
        $script .= '</script>';
        
        return $script;
    }
}

