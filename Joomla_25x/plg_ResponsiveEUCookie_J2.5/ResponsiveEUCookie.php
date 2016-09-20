<?php

/* ======================================================
# Plugin Responsive EU Cookie - Joomla! Plugin (Pro version)
# -------------------------------------------------------
# For Joomla! 3.x
# Copyright (©) 2015 vgoritsas.com. All rights reserved.
# License: GNU/GPLv3, http://www.gnu.org/licenses/gpl-3.0.html
# Website: http://www.vgoritsas.com
# Support: support@vgoritsas.com
========================================================= */


// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

class  plgSystemResponsiveEUCookie extends JPlugin
{
	 function plgSystemEUCookieDirectiveLite(& $subject, $config)
    {
        parent::__construct($subject, $config);
    
    }

    /**
    * Start the output
    *
    */
    function onAfterRender()
    {
           global $mainframe, $database;

	$doc    = JFactory::getDocument();
        $doctype    = $doc->getType();
        $app = JFactory::getApplication();
         $language = JFactory::getLanguage();
$language->load('ResponsiveEUCookie');
    	

if ( $app->getClientId() === 0 ) {

// params 
    	$folder = JURI::root() . 'plugins/system/ResponsiveEUCookie/';
                $max_width               = $this->params->get('max_width', '100%');
		$position                = $this->params->get('position', 'top');
		$bg                      = $this->params->get('bg');
		$color                   = $this->params->get('color');
		$font                    = $this->params->get('font');
		$padding                 = $this->params->get('padding', '5px');
		$fontSize                = $this->params->get('fontSize', '12px');
		$align                   = $this->params->get('align', 'center');
		$bottomBorderColor       = $this->params->get('bottomBorderColor');
		$topBorderColor          = $this->params->get('topBorderColor');
		$bottomRightBorderColor  = $this->params->get('bottomRightBorderColor');
		$msg                     = $this->params->get('msg');
		$urlMoreInfo             = $this->params->get('urlMoreInfo' , '#');
		$btnsBg                  = $this->params->get('btnsBg');
		$btnsColor               = $this->params->get('btnsColor');
		$btnOkText               = $this->params->get('btnOkText');
		$btnMoreInfoText         = $this->params->get('btnMoreInfoText', 'More info');
		$btnInfoBgHover          = $this->params->get('btnInfoBgHover');
		$btnOkBgHover            = $this->params->get('btnOkBgHover');
		$btnOkHoverColor         = $this->params->get('btnInfoHoverColor');
		$btnInfoHoverColor       = $this->params->get('btnOkHoverColor');
                $showBtnMoreInfo         = $this->params->get('showBtnMoreInfo', '1');


        // css font
        $cssFont = '<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">';
        // js script
        $ResponsiveEUCookieJS   = '<script type="text/javascript" src="' . $folder . '/assets/javascript/ResponsiveEUCookie.js"></script>'."\n";
        $ResponsiveEUCookieCSS  = '<style>
								.cookie-alert {
									max-width: '.$max_width.';
									padding:  '.$padding.';
									margin: 0;
									color: '.$color.';
									font-family: '.$font.';
									position: relative;
									font-size: '.$fontSize.';
									display: block;
									background:  '.$bg.';
									border-bottom: 3px solid  '.$topBorderColor.';
								    -moz-box-sizing: border-box;
								       -webkit-box-sizing: border-box;
								    box-sizing: border-box;
								text-align:'.$align.' ;
								}
								.top {
									position: absolute;
									top: 0;
									left: 0;
									width: 100%;
								}
								.bottom {
									position: absolute;
									bottom: 0;
									left: 0;
									width: 100%;
									border-bottom: none;
									border-top: 3px solid  '.$bottomBorderColor.';
								}
								.bottom-right {
									position: absolute;
									bottom: 20px;
									right: 20px;
									width: 300px;
									border-radius: 3px;
									border-bottom: none;
									border: 3px solid '.$bottomRightBorderColor.';
								}
                                                              .cookie-message{
                                                                        float:left;width:100%;padding:3px;
                                                               }
                                                              .cookie-buttons{
                                                                        float:left;width:100%;padding:3px;
                                                               }

								.bottom-right > a.btn-ok {
									margin: 0;
								}
								.cookie-alert > .cookie-buttons > a {
									display: inline-block;
									color: '.$btnsColor.';
									text-decoration: none;margin:2px;
									padding: 5px;
									border-radius: 2px;
									background: '.$btnsBg.' ;
								}
								a.btn-ok {
									margin-left: 10px;
								}
								a.btn-ok:hover {
									background: '.$btnOkBgHover.';
								         color: '.$btnOkHoverColor.';
								}
								a.more-info:hover {
									background: '.$btnInfoBgHover.';
								    color: '.$btnInfoHoverColor.';
								}
        					     </style>';

        // html output.

        $ResponsiveEUCookieHtml  = '';
        $ResponsiveEUCookieHtml .= '<div class="cookie-alert '.$position.'" id="cookie-alert" style="display:none;">';

  	if(!empty($msg)):

        $ResponsiveEUCookieHtml .= '<div class="cookie-message">';
        $ResponsiveEUCookieHtml .= ''.$msg.'';
           $ResponsiveEUCookieHtml .= '</div>';
        endif;
        $ResponsiveEUCookieHtml .= '<div class="cookie-buttons">';
        $ResponsiveEUCookieHtml .= '<a href="#" class="btn-ok" onclick="addCookie();""><i class="fa fa-check"></i> '.$btnOkText.'</a>';
        if($showBtnMoreInfo==1):
        $ResponsiveEUCookieHtml .= '<a href="'.$urlMoreInfo.'" class="more-info"><i class="fa fa-info-circle"></i> '. $btnMoreInfoText.'</a>';
        endif;
        $ResponsiveEUCookieHtml .= '</div>';
        $ResponsiveEUCookieHtml .= '</div>';

   


        $ResponsiveEUCookieBody = JResponse::getBody();
        $ResponsiveEUCookieBody = '<head>'.$cssFont.$ResponsiveEUCookieBody;
        $ResponsiveEUCookieBody = str_replace('</head>',$ResponsiveEUCookieCSS.'</head>', 										  $ResponsiveEUCookieBody);
        $ResponsiveEUCookieBody = str_replace('</body>', $ResponsiveEUCookieHtml.$ResponsiveEUCookieJS.'						  </body>', $ResponsiveEUCookieBody);
        JResponse::setBody($ResponsiveEUCookieBody);

  }
    }
}
