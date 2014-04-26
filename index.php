<?php
/*
Plugin Name: Rentalcar
Plugin URI:http://github.com/smrutiranjan/rentalcar
Description: This is a custom widget allow to search rental carpervan or car and get quotation of each carpervan / car via rci api. <a href="http://github.com/smrutiranjan/rentalcar/archive/master.zip" target="_blank">click here to you can download latest update.</a>
Author: Smrutiranjan
Author URI: http://smrutiranjan.in
Version: 1.1
*/
//ini_set('default_charset', 'utf-8');
register_activation_hook(__FILE__,'rentalcar_install');
function rentalcar_install()
{
$layout='
@media screen and (-webkit-min-device-pixel-ratio:0) {
	.inpt_booking_extend{border:1px solid #ddd;box-shadow:inset 0 1px 2px rgba(0,0,0,.07);padding:3px 5px;margin:0px;line-height:15px;font-size:14px;width:100%; }
	.chk_inpt_booking{border:1px solid #ddd;box-shadow:inset 0 1px 2px rgba(0,0,0,.07);padding:3px 5px;margin:0px;line-height:15px;font-size:14px;width:155px;}
	.chk_avail_fname_lvl{float:left;width:84px;}
.chk_avail_fname_input{float:left;}
.chk_avail_lname_lvl{float:left;margin-left:15%;width:84px;}
.chk_avail_lname_input{float:left;}
.chk_avail_email_lvl{float:left;width:84px;}
.chk_avail_email_input{float:left;width:81%;}
.chk_avail_emailquote{float:left;margin-left:84px;}
.chk_avail_availbtn{float:right;margin-right:20px;}
	
	.lvl{width:35%;font-weight:bold;float:left;text-align:left;}
	.lvl_val{width:65%;font-weight:normal;float:right;}
	.lvl_val_email{float:right;text-align:right;width:100%;}
	.emailqu_textarea{margin: 4px 0px; width: 100%;border:1px solid #CCCCCC;font-family:Arial,Helvetica,sans-serif;font-size:1em;vertical-align:middle;height:80px;}
	.emailqu{margin-left:168px;box-shadow:none;border:none;border-radius:none;margin-top:5px;}
	.booking_checkout_center{width:65%;float:left;margin-left:2%;}
.emailme{float:left;}
.customerfield{width:100%;background:#fff;vertical-align:middle;margin:0 1px 2px;font-size:1em;font-family:Arial,Helvetica,sans-serif;border:1px solid #CCCCCC;}
.booking_chkoutleft{float:left;width:30%;}
.booking_chkoutright{float:right;line-height:30px;width:65%;}
.bookingleft{
	clear: left;
	float: left;
	line-height: 15px;
	width: 30%;
}
.desc{height: 80px; overflow: hidden;}
.bookingleft img{
	max-width:150px;
	height:114px;
}
.price {
 	font-size: 18px;
    font-weight: bold;
    height: 70px;
    line-height: 0;
    margin: 0;
    padding-top: 10px;
}
.bookingcentre
{
    float: left;
    font-size: 14px;
    line-height: 18px;
    margin-left: 2%;
    text-align: left;
    width: 40%;
}
.bookingright{
	float: right;
	position: relative;
	width: 28%;
}
.underline {border-bottom: 1px solid #E8E8E8;}
}
@media only screen and (min-device-width:320px) and (max-device-width: 480px) {
	.emailqu_textarea{margin: 4px 0px; width: 100%;border:1px solid #CCCCCC;font-family:Arial,Helvetica,sans-serif;font-size:1em;vertical-align:middle;height:80px;}
	.emailqu{box-shadow:none;border:none;border-radius:none;margin-top:5px;}
	.booking_checkout_center{width:100%;float:none;text-align:center;}
	.emailme,.bookingleft,.bookingcentre,.bookingright{ width:100%;float:none; line-height: 15px;text-align:center;}
	.bookingh1{text-align:center;}.bookingcentre{margin:0;}.desc{margin:5px 0;}
	.price {
 	font-size: 18px;
    font-weight: bold;
    margin:20px 0 0 0;
    line-height: 0;
}
.inpt_booking_extend{border:1px solid #ddd;box-shadow:inset 0 1px 2px rgba(0,0,0,.07);padding:3px 5px;margin:0px;line-height:15px;font-size:14px;width:100%; }
.chk_inpt_booking{border:1px solid #ddd;box-shadow:inset 0 1px 2px rgba(0,0,0,.07);padding:3px 5px;margin:0px;line-height:15px;font-size:14px;width:100%;}
.lvl{width:100%;font-weight:bold;text-align:center;}
.lvl_val{width:100%;font-weight:normal;text-align:center;}
.lvl_val_email{float:none;text-align:center;width:100%;}
.bookingleft img{
	max-width:100%;
}
.booking_chkoutleft{float:none;width:100%;text-align:center;}
.booking_chkoutright{float:none;line-height:30px;width:100%;text-align:center;}
.customerfield{width:100%;background:#fff;vertical-align:middle;margin:0 1px 2px;font-size:1em;font-family:Arial,Helvetica,sans-serif;border:1px solid #CCCCCC;}

.chk_avail_fname_lvl,.chk_avail_fname_input,.chk_avail_lname_lvl,.chk_avail_lname_lvl,.chk_avail_lname_input,.chk_avail_email_lvl,.chk_avail_email_input,.chk_avail_emailquote,.chk_avail_availbtn{float:none;width:100%;text-align:center;}
}

@media only screen and (min-device-width:480px) and (max-device-width:1900px) {
	.inpt_booking_extend{border:1px solid #ddd;box-shadow:inset 0 1px 2px rgba(0,0,0,.07);padding:3px 5px;margin:0px;line-height:15px;font-size:14px;width:100%; }
	.chk_inpt_booking{border:1px solid #ddd;box-shadow:inset 0 1px 2px rgba(0,0,0,.07);padding:3px 5px;margin:0px;line-height:15px;font-size:14px;width:155px;}
	.chk_avail_fname_lvl{float:left;width:84px;}
.chk_avail_fname_input{float:left;}
.chk_avail_lname_lvl{float:left;margin-left:15%;width:84px;}
.chk_avail_lname_input{float:left;}
.chk_avail_email_lvl{float:left;width:84px;}
.chk_avail_email_input{float:left;width:81%;}
.chk_avail_emailquote{float:left;margin-left:84px;}
.chk_avail_availbtn{float:right;margin-right:20px;}
	
	.lvl{width:35%;font-weight:bold;float:left;text-align:left;}
	.lvl_val{width:65%;font-weight:normal;float:right;}
	.lvl_val_email{float:right;text-align:right;width:100%;}
	.emailqu_textarea{margin: 4px 0px; width: 100%;border:1px solid #CCCCCC;font-family:Arial,Helvetica,sans-serif;font-size:1em;vertical-align:middle;height:80px;}
	.emailqu{margin-left:168px;box-shadow:none;border:none;border-radius:none;margin-top:5px;}
	.booking_checkout_center{width:65%;float:left;margin-left:2%;}
.emailme{float:left;}
.customerfield{width:100%;background:#fff;vertical-align:middle;margin:0 1px 2px;font-size:1em;font-family:Arial,Helvetica,sans-serif;border:1px solid #CCCCCC;}
.booking_chkoutleft{float:left;width:30%;}
.booking_chkoutright{float:right;line-height:30px;width:65%;}
.bookingleft{
	clear: left;
	float: left;
	line-height: 15px;
	width: 30%;
}
.desc{height: 80px; overflow: hidden;}
.bookingleft img{
	max-width:150px;
	height:114px;
}
.price {
 	font-size: 18px;
    font-weight: bold;
    height: 70px;
    line-height: 0;
    margin: 0;
    padding-top: 10px;
}
.bookingcentre
{
    float: left;
    font-size: 14px;
    line-height: 18px;
    margin-left: 2%;
    text-align: left;
    width: 40%;
}
.bookingright{
	float: right;
	position: relative;
	width: 28%;
}
.underline {border-bottom: 1px solid #E8E8E8;}
}

.sep_checkout{background-color:#F69812;height: 1px; width: 100%; clear: both; margin: 10px 0; }
.clear{clear:both;}
.clear5{clear:both;height:10px;}
.clearfix {
    display: block;
}
.calculate_total,#totalcost{color:#F69812;font-size:15px;}
.insuranceth{color:#F69812;font-size:13px;font-weight:bold;}
.booking_title{color:#F69812;font-size:15px;font-weight:bold;}
.inpt_booking{border:1px solid #ddd;box-shadow:inset 0 1px 2px rgba(0,0,0,.07);padding:3px 5px;margin:0px;line-height:15px;font-size:14px;width:200px; }

.dailyrate {
    font-size: 25px;
    line-height: 30px;
    margin: 0;
    padding: 0;
}
.dailyrate_small {
    font-size: 11px;
    font-weight: normal;
    line-height: 0;
    padding: 20px;
}

.bookingwrap {
    background:#fff;
    clear: both;
    margin: 0 auto 10px;  
}
.restdiv{
	border:2px solid #F69812;
	padding:10px;
	border-radius:0 0 6px 6px;
	font-size: 15px;
    line-height: 30px;
	font-family:Arial,Helvetica,sans-serif;
}
.bookingfooter{
	height:60px;display:block;width:100%;
}


.bookingh1{
	background-color:#F69812;
	padding:3px 10px;
	color:#fff;
	border-radius:6px 6px 0 0;
}

.bookingright .TotalCost {
    color: #000;
    text-align: center;
}
.bookingright .TotalCost h3{
	 color: #000;
    font-size: 18px;
    font-weight: bold;
}
.ErrorBookingNEW, .ErrorBookingNEW a, .ErrorBookingNEW a:hover {
    color: #000;
    line-height: 1.3em;
    text-align: center;
    text-decoration: none;
}
.ErrorBookingNEW {
    background: none repeat scroll 0 0 #EE5B28;
    border-radius: 5px;
    bottom: 40px;
    left: 555px;
    padding: 3px;
    position: absolute;
    visibility: visible;
    width: 194px;
}
.moreInfo {
    background: url('.plugins_url('icon-moreinfo.png', __FILE__).') no-repeat scroll center center rgba(0, 0, 0, 0);
    width: 110px;
}
.videoTour a, .moreInfo a, .currencyConverter a, .liveChat a{
	display: block;
    height: 100%;
    width: 100%;
}
.videoTour span, .moreInfo span, .currencyConverter span{
	visibility:hidden;
}
.currencyConverter {
    background: url('.plugins_url('icon-currency.png', __FILE__).') no-repeat scroll center center rgba(0, 0, 0, 0);
    width: 105px;
}
br {
    clear: both;
    padding: 0;
    width: 100%;
}
.custom_div_left{width: 45%; float: left; margin: 0px; padding: 0px; text-align: left; line-height: 25px;}
.custom_div_right{width: 45%; float: right; margin: 0px; padding: 0px; text-align: left; line-height: 25px;}
/* SelectBoxIt container */
.selectboxit-container {
  position: relative;
  display: block;
  vertical-align: top;
}
.ui-btn-up-c {
    background: none repeat scroll 0 0 #F9F9F9;
}
/* Styles that apply to all SelectBoxIt elements */
.selectboxit-container * {
  font: 14px Helvetica, Arial;
  /* Prevents text selection */
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: -moz-none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
  outline: none;
  white-space: nowrap;
}

/* Button */
.selectboxit-container .selectboxit {
  width: 100%; /* Width of the dropdown button */
  cursor: pointer;
  margin: 0;
  padding: 0;
  border-radius: 6px;
  overflow: hidden;
  display: block;
  position: relative;
}

/* Height and Vertical Alignment of Text */
.selectboxit-container span, .selectboxit-container .selectboxit-options a {
  height: 35px; /* Height of the drop down */
  line-height:35px; /* Vertically positions the drop down text */
  display: block;
}

/* Focus pseudo selector */
.selectboxit-container .selectboxit:focus {
  outline: 0;
}

/* Disabled Mouse Interaction */
.selectboxit.selectboxit-disabled, .selectboxit-options .selectboxit-disabled {
  opacity: 0.65;
  filter: alpha(opacity=65);
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  cursor: default;
}

/* Button Text */
.selectboxit-text {
  text-indent: 5px;
  overflow: hidden;
  text-overflow: ellipsis;
  float: left;
color:#111111;
font:bold 13px Arial,Helvetica;
}

.selectboxit .selectboxit-option-icon-container {
  margin-left: 5px;
}

/* Options List */
.selectboxit-container .selectboxit-options {
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  min-width: 100%;  /* Minimum Width of the dropdown list box options */
  *width: 100%;
  width: 100%;
  margin: 0;
  padding: 0;
  list-style: none;
  position: absolute;
  overflow-x: hidden;
  overflow-y: auto;
  cursor: pointer;
  display: none;
  z-index: 9999999999999;
  border-radius: 6px;
  text-align: left;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
}

/* Individual options */
 .selectboxit-option .selectboxit-option-anchor{
  padding: 0 2px;
}

/* Individual Option Hover Action */
.selectboxit-option .selectboxit-option-anchor:hover {
  text-decoration: none;
}

/* Individual Option Optgroup Header */
.selectboxit-option, .selectboxit-optgroup-header {
  text-indent: 5px; /* Horizontal Positioning of the select box option text */
  margin: 0;
  list-style-type: none;
}

/* The first Drop Down option */
.selectboxit-option-first {
  border-top-right-radius: 6px;
  border-top-left-radius: 6px;
}

/* The first Drop Down option optgroup */
.selectboxit-optgroup-header + .selectboxit-option-first {
  border-top-right-radius: 0px;
  border-top-left-radius: 0px;
}

/* The last Drop Down option */
.selectboxit-option-last {
  border-bottom-right-radius: 6px;
  border-bottom-left-radius: 6px;
}

/* Drop Down optgroup headers */
.selectboxit-optgroup-header {
  font-weight: bold;
}

/* Drop Down optgroup header hover psuedo class */
.selectboxit-optgroup-header:hover {
  cursor: default;
}

/* Drop Down down arrow container */
.selectboxit-arrow-container {
  /* Positions the down arrow */
  width: 30px;
  position: absolute;
  right: 0;
}

/* Drop Down down arrow */
.selectboxit .selectboxit-arrow-container .selectboxit-arrow {
  /* Horizontally centers the down arrow */
  margin: 0 auto;
  position: absolute;
  top: 50%;
  right: 0;
  left: 0;
}

/* Drop Down down arrow for jQueryUI and jQuery Mobile */
.selectboxit .selectboxit-arrow-container .selectboxit-arrow.ui-icon {
  top: 30%;
}

/* Drop Down individual option icon positioning */
.selectboxit-option-icon-container {
  float: left;
}

.selectboxit-container .selectboxit-option-icon {
  margin: 0;
  padding: 0;
  vertical-align: middle;
}

/* Drop Down individual option icon positioning */
.selectboxit-option-icon-url {
  width: 18px;
  background-size: 18px 18px;
  background-repeat: no-repeat;
  height: 100%;
  background-position: center;
  float: left;
}

.selectboxit-rendering {
  display: inline-block !important;
  *display: inline !important;
  zoom: 1 !important;
  visibility: visible !important;
  position: absolute !important;
  top: -9999px !important;
  left: -9999px !important;
}

/* jQueryUI and jQuery Mobile compatability fix - Feel free to remove this style if you are not using jQuery Mobile */
.jqueryui .ui-icon {
  background-color: inherit;
}

/* Another jQueryUI and jQuery Mobile compatability fix - Feel free to remove this style if you are not using jQuery Mobile */
.jqueryui .ui-icon-triangle-1-s {
  background-position: -64px -16px;
}

/*
  Default Theme
  -------------
  Note: Feel free to remove all of the CSS underneath this line if you are not using the default theme
*/
.selectboxit-btn {
  background-color: #f5f5f5;
  background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6));
  background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
  background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
  background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
  background-repeat: repeat-x;
  border: 1px solid #cccccc;
  border-color: #e6e6e6 #e6e6e6 #bfbfbf;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  border-bottom-color: #b3b3b3;
}

.selectboxit-btn.selectboxit-enabled:hover,
.selectboxit-btn.selectboxit-enabled:focus,
.selectboxit-btn.selectboxit-enabled:active {
  color: #333333;
  background:none;
}

.selectboxit-btn.selectboxit-enabled:hover,
.selectboxit-btn.selectboxit-enabled:focus {
  color: #333333;
  text-decoration: none;
  background-position: 0 -15px;
}

.selectboxit-default-arrow {
  width: 0;
  height: 0;
  border-top: 4px solid #000000;
  border-right: 4px solid transparent;
  border-left: 4px solid transparent;
}

.selectboxit-list {
  background-color: #ffffff;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, 0.2);
  -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}

.selectboxit-list .selectboxit-option-anchor {
  color: #333333;
}

.selectboxit-list > .selectboxit-focus > .selectboxit-option-anchor {
  color: #ffffff;
  background-color: #0081c2;
  background-image: -moz-linear-gradient(top, #0088cc, #0077b3);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0077b3));
  background-image: -webkit-linear-gradient(top, #0088cc, #0077b3);
  background-image: -o-linear-gradient(top, #0088cc, #0077b3);
  background-image: linear-gradient(to bottom, #0088cc, #0077b3);
  background-repeat: repeat-x;
}

.selectboxit-list > .selectboxit-disabled > .selectboxit-option-anchor {
  color: #999999;
}
.rentalcar_form_div h1{  
    display: block;
    font-size: 17px;
    font-weight: 700;
    line-height: 23px;
    margin: 0;
    padding: 20px 0 0;
    text-align: left;
}	
.rentalcar_form_div .col1{width:49%;float:left;}
.rentalcar_form_div.col2{width:49%;float:left;margin-left:2%;}
.rentalcar_form_div .clear5{clear:both;height:1px;}
.rentalcar_form_div h1{
	color:#59595a;
	text-transform:capitalize;
	font-weight:bold;
	border-bottom:2px solid #b4b4b5;
	padding:0;
	margin:0;
}
.rentalcar_form_div{
	font-size:13px;
	padding:5px;
	border-radius:8px;
	border:2px solid #026cd6;
	background-color:#026cd6;
}
#PickupDate,#DropOffDate{
	background: url('.plugins_url('cal.gif', __FILE__).') no-repeat scroll right center rgba(0, 0, 0, 0);
    border: medium none;
    color: #111111;
    font: bold 13px Arial,Helvetica;
    padding: 0;
    text-indent: 10px;
    width: 97%;
}
#PromoCode{
	background-color:rgba(0, 0, 0, 0);
	border: medium none;
    color: #111111;
    font: bold 13px Arial,Helvetica;
    padding: 0;
    text-indent: 10px;
    width: 97%;
}
.ui-input-text input, .ui-input-search input{
min-height:2.6em;
}
.ui-select .ui-btn > span:not(.ui-li-count) {
text-align:left;
}
.rentalcar_form_div label{
color:#fff;
}
.ui-datepicker .ui-datepicker-header {
background:none repeat scroll 0 0 #026CD6;
color:#fff;
}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default{
 background:none repeat scroll 0 0 #026CD6;
    color: #FFFFFF;
}
.ui-icon-arrow-d{
background:url('.plugins_url('down_arrow.png', __FILE__).') no-repeat;
}
.ui-state-highlight, .ui-widget-content .ui-state-highlight, .ui-widget-header .ui-state-highlight {
color:#111;
background:none repeat scroll 0 0 #026CD6;
border:1px solid #026CD6;
}
.ui-datepicker .ui-datepicker-next span {
background:url('.plugins_url('next.png', __FILE__).') no-repeat;
}
.ui-datepicker .ui-datepicker-prev span{
background:url('.plugins_url('prev.png', __FILE__).') no-repeat;
}
.ui-widget-header .ui-state-hover, .ui-state-focus, .ui-widget-content .ui-state-focus, .ui-widget-header .ui-state-focus {
color:#111;
background:none;border:none;
}
.ui-state-hover, .ui-widget-content .ui-state-hover{
color:#111;
}
.rentalcar_form_div ul li{
	list-style-type:none;	
	padding:0;
	border:none;
	margin:0;
}
.rentalcar_form_div img{
vertical-align:middle;
}

	
.error{text-align:center;font-weight:bold;color:red;}';
	$sucessmsg='<div align="center"><h1>Thank you for your quote with travelwheels.</h1><p>Our friendly staff will soon be in touch and if you have any further questions you can email us at info@travelwheels.com.au</p></div>';
	$optionsarr['en']=array(					 
					'header_img'=>'headlogo.png',	
					'searchbtn'=>'search.png',
					'searchbtn_ho'=>'search_ho.png',
					'emailquote'=>'emailquote.png',
					'emailquote_ho'=>'emailquote_ho.png',
					'continuebtn'=>'continue.png',
					'continuebtn_ho'=>'continue_ho.png',
					'checkavailbtn'=>'checkavailability.png',
					'checkavailbtn_ho'=>'checkavailability_ho.png',	
					'pickuplocation'=>'Pickup Location',
					'pickupdate'=>'Pickup Date',
					'dropofflocation'=>'Dropoff Location',			
					'dropoffdate'=>'Dropoff Date',
					'promocode'=>'Promo Code',					
					'acrodian'=>'Click Here to Change Search Cities & Dates',
					'step3tr1td3'=>'Red',
					'step3tr2td3'=>'Orange',
					'step3tr3td3'=>'Green',
					'bookingfname'=>'First Name',
					'bookinglname'=>'Last Name',
					'bookingemail'=>'Email',
					'step3th1'=>'Campervan Insurance',
					'step3th2'=>'Bond',
					'step3th3'=>'Select Insurance',
					'step3trtd1'=>'Red Insurance $10 per day',
					'step3trtd2'=>'Orange Insurance $15 per day',
					'step3trtd3'=>'Green Insurance $25 per day',
					'avgrate'=>'Average daily rate',
					'step3quotetitle'=>'Campervan Hire Quote',
					'vehicletype'=>'Vehicle Type',
					'pickup'=>'Pickup',
					'step3bookingtitle'=>'Enter your name & email to check availability',
					'dropoff'=>'Dropoff',
					'clickinfo'=>'Click for vehicle info',
					'dailyrate'=>'Daily Rate',
					'subtotal'=>'SUB TOTAL',
					'insurance'=>'Insurance',
					'totalcost'=>'Total Cost',
					'back'=>'Back',
					'step3title'=>'Campervan Insurance - please select one option Red, Orange or Green Insurance',
					'step3moreinfo'=>'Click here for more information about Campervan insurance',
					'oneway'=>'One Way Fee','addition_details'=>'Questions or special requests',
					'subtotal_notes'=>'This quote is for vehicle rental hire cost only and does not include any applicable insurances or additional item charges','bookingsummary'=>'Enter your name and email for a quick quote'
					);
	$optionsarr['fr']=array(					 
					'header_img'=>'headlogo-fr.png',	
					'searchbtn'=>'search_fr.png',
					'searchbtn_ho'=>'search_fr_ho.png',

					'emailquote'=>'emailquote-fr.png',
					'emailquote_ho'=>'emailquote_ho-fr.png',
					'continuebtn'=>'continue-fr.png',
					'continuebtn_ho'=>'continue_ho-fr.png',
					'checkavailbtn'=>'checkavailability-fr.png',
					'checkavailbtn_ho'=>'checkavailability_ho-fr.png',								
					'pickuplocation'=>'Pickup Location',
					'pickupdate'=>'Pickup Date',
					'dropofflocation'=>'Dropoff Location',			
					'dropoffdate'=>'Dropoff Date',
					'promocode'=>'Promo Code',					
					'acrodian'=>'Click Here to Change Search Cities & Dates',
					'step3tr1td3'=>'Red',
					'step3tr2td3'=>'Orange',
					'step3tr3td3'=>'Green',
					'bookingfname'=>'First Name',
					'bookinglname'=>'Last Name',
					'bookingemail'=>'Email',
					'step3th1'=>'Campervan Insurance',
					'step3th2'=>'Bond',
					'step3th3'=>'Select Insurance',
					'step3trtd1'=>'Red Insurance $10 per day',
					'step3trtd2'=>'Orange Insurance $15 per day',
					'step3trtd3'=>'Green Insurance $25 per day',
					'avgrate'=>'Average daily rate',
					'step3quotetitle'=>'Campervan Hire Quote',
					'vehicletype'=>'Vehicle Type',
					'pickup'=>'Pickup',
					'step3bookingtitle'=>'Enter your name & email to check availability',
					'dropoff'=>'Dropoff',
					'clickinfo'=>'Click for vehicle info',
					'dailyrate'=>'Daily Rate',
					'subtotal'=>'SUB TOTAL',
					'insurance'=>'Insurance',
					'totalcost'=>'Total Cost',
					'back'=>'Back',
					'step3title'=>'Campervan Insurance - please select one option Red, Orange or Green Insurance',
					'step3moreinfo'=>'Click here for more information about Campervan insurance',
					'oneway'=>'One Way Fee','addition_details'=>'Questions or special requests',
					'subtotal_notes'=>'This quote is for vehicle rental hire cost only and does not include any applicable insurances or additional item charges','bookingsummary'=>'Enter your name and email for a quick quote'
					);
	$optionsarr['da']=array(					 
					'header_img'=>'headlogo-ge.png',	
					'searchbtn'=>'search_ge.png',
					'searchbtn_ho'=>'search_ge_ho.png',
					'emailquote'=>'emailquote-da.png',
					'emailquote_ho'=>'emailquote_ho-da.png',
					'continuebtn'=>'continue-da.png',
					'continuebtn_ho'=>'continue_ho-da.png',
					'checkavailbtn'=>'checkavailability-da.png',
					'checkavailbtn_ho'=>'checkavailability_ho-da.png',					
					'pickuplocation'=>'Pickup Location',
					'pickupdate'=>'Pickup Date',
					'dropofflocation'=>'Dropoff Location',			
					'dropoffdate'=>'Dropoff Date',
					'promocode'=>'Promo Code',					
					'acrodian'=>'Click Here to Change Search Cities & Dates',
					'step3tr1td3'=>'Red',
					'step3tr2td3'=>'Orange',
					'step3tr3td3'=>'Green',
					'bookingfname'=>'First Name',
					'bookinglname'=>'Last Name',
					'bookingemail'=>'Email',
					'step3th1'=>'Campervan Insurance',
					'step3th2'=>'Bond',
					'step3th3'=>'Select Insurance',
					'step3trtd1'=>'Red Insurance $10 per day',
					'step3trtd2'=>'Orange Insurance $15 per day',
					'step3trtd3'=>'Green Insurance $25 per day',
					'avgrate'=>'Average daily rate',
					'step3quotetitle'=>'Campervan Hire Quote',
					'vehicletype'=>'Vehicle Type',
					'pickup'=>'Pickup',
					'step3bookingtitle'=>'Enter your name & email to check availability',
					'dropoff'=>'Dropoff',
					'clickinfo'=>'Click for vehicle info',
					'dailyrate'=>'Daily Rate',
					'subtotal'=>'SUB TOTAL',
					'insurance'=>'Insurance',
					'totalcost'=>'Total Cost',
					'back'=>'Back',
					'step3title'=>'Campervan Insurance - please select one option Red, Orange or Green Insurance',
					'step3moreinfo'=>'Click here for more information about Campervan insurance',
					'oneway'=>'One Way Fee','addition_details'=>'Questions or special requests',
					'subtotal_notes'=>'This quote is for vehicle rental hire cost only and does not include any applicable insurances or additional item charges','bookingsummary'=>'Enter your name and email for a quick quote'
					);	
	$optionsarr['du']=array(					 
					'header_img'=>'headlogo-du.png',	
					'searchbtn'=>'search_du.png',
					'searchbtn_ho'=>'search_du_ho.png',
					'emailquote'=>'emailquote-du.png',
					'emailquote_ho'=>'emailquote_ho-du.png',
					'continuebtn'=>'continue-du.png',
					'continuebtn_ho'=>'continue_ho-du.png',
					'checkavailbtn'=>'checkavailability-du.png',
					'checkavailbtn_ho'=>'checkavailability_ho-du.png',									
					'pickuplocation'=>'Pickup Location',
					'pickupdate'=>'Pickup Date',
					'dropofflocation'=>'Dropoff Location',			
					'dropoffdate'=>'Dropoff Date',
					'promocode'=>'Promo Code',					
					'acrodian'=>'Click Here to Change Search Cities & Dates',
					'step3tr1td3'=>'Red',
					'step3tr2td3'=>'Orange',
					'step3tr3td3'=>'Green',
					'bookingfname'=>'First Name',
					'bookinglname'=>'Last Name',
					'bookingemail'=>'Email',
					'step3th1'=>'Campervan Insurance',
					'step3th2'=>'Bond',
					'step3th3'=>'Select Insurance',
					'step3trtd1'=>'Red Insurance $10 per day',
					'step3trtd2'=>'Orange Insurance $15 per day',
					'step3trtd3'=>'Green Insurance $25 per day',
					'avgrate'=>'Average daily rate',
					'step3quotetitle'=>'Campervan Hire Quote',
					'vehicletype'=>'Vehicle Type',
					'pickup'=>'Pickup',
					'step3bookingtitle'=>'Enter your name & email to check availability',
					'dropoff'=>'Dropoff',
					'clickinfo'=>'Click for vehicle info',
					'dailyrate'=>'Daily Rate',
					'subtotal'=>'SUB TOTAL',
					'insurance'=>'Insurance',
					'totalcost'=>'Total Cost',
					'back'=>'Back',
					'step3title'=>'Campervan Insurance - please select one option Red, Orange or Green Insurance',
					'step3moreinfo'=>'Click here for more information about Campervan insurance',
					'oneway'=>'One Way Fee','addition_details'=>'Questions or special requests',
					'subtotal_notes'=>'This quote is for vehicle rental hire cost only and does not include any applicable insurances or additional item charges','bookingsummary'=>'Enter your name and email for a quick quote'
					);
	
	$emailquote_template ='<p align="center"><img src="http://secure.rentalcarmanager.com.au/db/AUTravelWheels107/logo.gif" alt="121" /></p>
<div align="center">
  <table border="0" cellspacing="0" cellpadding="4" width="650" style="border:1px solid #F69812;font-size:13px;line-height:1.2em;font-family:Arial">
    <tr>
      <td colspan="2" bgcolor="#F69812" style="padding:3px 4px">Online Quotation with Travelwheels - Ref #[refquote]    (Sydney) </td>
    </tr>
    <tr>
      <td colspan="2">Thank you for your Online Quotation with Travelwheels.</td>
    </tr>
    <tr>
      <td colspan="2">This Online Quotation has now been forwarded to the    Location - Sydney.</td>
    </tr>
    <tr>
      <td colspan="2">If you would like to proceed with this quotation :</td>
    </tr>
    <tr>
      <td colspan="2"><table border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><strong>TURN YOUR QUOTE INTO A BOOKING REQUEST <a href="https://secure.rentalcarmanager.com.au/s_QPay.asp?id=107&amp;MC2=19&amp;ferq=[refkey]&amp;E604=[today]" target="_blank"><font color="#FF0000">CLICK HERE</font></a></strong></td>
          <td><img src="https://secure.rentalcarmanager.com.au/images/SafePayment.jpg" alt="231312" border="0" id="_x0000_i1026" /></td>
        </tr>
        <tr>
          <td colspan="2">Note : If you are viewing this message in text mode and      having difficulties opening the above link, please try copying and pasting      the following entire link into the address bar of your Internet homepage.</td>
        </tr>
        <tr>
          <td colspan="2"><a href="https://secure.rentalcarmanager.com.au/s_QPay.asp?id=107&amp;MC2=19&amp;ferq=[refkey]&amp;E604=[today]&amp;VD2=" target="_blank">https://secure.rentalcarmanager.com.au/s_QPay.asp?id=107&amp;MC2=19&amp;ferq=[refkey]&amp;E604=[today]&amp;VD2=</a></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td colspan="2">Your Quotation details are as follows:</td>
    </tr>
    <tr>
      <td colspan="2" style="border-bottom:1px solid #F69812;margin-bottom:2px;">Quotation Date: [today]</td>
    </tr>   
    <tr>
      <td style="margin-top:2px;"><strong>Ref:</strong></td>
      <td style="margin-top:2px;">[refquote] (Sydney)</td>
    </tr>
    <tr>
      <td>Name: </td>
      <td>[customer_name]</td>
    </tr>
    <tr>
      <td style="border-bottom:1px solid #F69812;margin-bottom:2px;">Email: </td>
      <td style="border-bottom:1px solid #F69812;margin-bottom:2px;"><a href="mailto:[customer_email]" target="_blank">[customer_email]</a></td>
    </tr>  
    <tr>
      <td style="margin-top:2px;">Vehicle Type </td>
      <td style="margin-top:2px;">[vehicle_type]</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><img src="[imgsrc]" alt="logo" width="192" border="0" id="_x0000_i1027" /></td>
    </tr>
    <tr>
      <td>Pickup Location: </td>
      <td>[pickuplocation]</td>
    </tr>
    <tr>
      <td>Pickup Date: </td>
      <td>[pickupdate]&nbsp;</td>
    </tr>
    <tr>
      <td>Dropoff Location: </td>
      <td>[dropofflocation]</td>
    </tr>
    <tr>
      <td>Dropoff Date: </td>
      <td>[dropoffdate]&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">Rental Rate and Fees</td>
    </tr>
    <tr>
      <td colspan="2" style="border-bottom:1px solid #F69812;margin-bottom:2px;"><table border="0" cellpadding="0" width="100%">
        <tr>
          <td>[totalrentaldays]&nbsp;days @&nbsp;AU$[rateperday]&nbsp;(per day)&nbsp;</td>
          <td align="right">&nbsp;AU$[subtotal]</td>
        </tr>
		[insurance]
		[oneway]
        <tr>
          <td><strong>Total:</strong></td>
          <td align="right">AU$[totalcost]</td>
        </tr>
        <tr>
          <td colspan="2" align="right">(All Prices GST Inclusive)</td>
        </tr>
      </table></td>
    </tr>    
    <tr>
      <td colspan="2" style="margin-top:2px;"><strong>CANCELLATION POLICY</strong><br />
        If you unfortunately have to change your dates/travel plans, then we will do    our best to provide you with another campervan if we have availability    without any extra cancellation fees.&nbsp; If you have to completely cancel    your booking, then the following charges applies to all bookings:<br />
        If cancelled over 30 days prior to pick-up date: Cancellation fee of 25%    of the full rental fee applies (equals the non refundable holding deposit to    secure the booking)&nbsp; If cancelled within 29-8 days of pick up: 50% of    the full rental fee applies.<br />
        If cancelled within 7-1 days prior to pick up: 75% of full rental charge    applies.&nbsp; If cancelled on the day of pick up or no show: NO REFUNDS    sorry, &amp; the full rental fee will be charged to your credit card.<br/></td>
    </tr>   
    <tr>
      <td colspan="2"><strong>Travelwheels</strong><br/>Sydney</td>
    </tr>  
    <tr>
      <td colspan="2" bgcolor="#F69812" align="center">155 - 159 William    St<br />
        Darlinghurst Sydney,&nbsp;NSW&nbsp;2010&nbsp;Australia<br />
        Phone:1800 289 222 then dial 2&nbsp;&nbsp;&nbsp;Fax: 02 9666    4695&nbsp;&nbsp;Free Phone: 1800 289 222 THEN PRESS 2</td>
    </tr>
  </table>
</div>
<p align="center">[sitetitle]<br/>[siteurl]</p>';
		
	delete_option('rental_option_en');delete_option('rental_option_fr');delete_option('rental_option_da');delete_option('rental_option_du');	
	add_option('rental_option_en',$optionsarr['en']);add_option('rental_option_fr',$optionsarr['fr']);
	add_option('rental_option_da',$optionsarr['da']);add_option('rental_option_du',$optionsarr['du']);
	
	$generalarr=array('rental_searchform_css'=>$layout,'rental_searchform_bg_color'=>'#026CD6','rental_searchform_bg_img'=>'widget-background.jpg','rental_searchform_bg_stat'=>'disabled','rental_env_mode' => 'live','rental_type'=>'9','emailquote_template_en'=>$emailquote_template,'emailquote_template_da'=>$emailquote_template,'emailquote_template_du'=>$emailquote_template,'emailquote_template_fr'=>$emailquote_template,'successmsg_en'=>$sucessmsg,'successmsg_fr'=>$sucessmsg,'successmsg_da'=>$sucessmsg,'successmsg_du'=>$sucessmsg,'rentalcar_timediff'=>'13','rental_emails_from'=>'Webmaster <'.get_bloginfo('admin_email').'>','rental_emails_to'=>'info <info@travelwheels.com.au>,info <gino@travelwheels.com.au>,Developer <smrutiniit@gmail.com>');
	
	foreach($generalarr as $ky => $value)
	{
		delete_option($ky);
		add_option($ky,$value, '', 'yes' );
	}
}
add_action( 'init', 'rentalcar_front_js' );

if ( is_admin() ){ // admin actions
	add_action('admin_menu', 'rentalcar_form_setting');	
	add_action( 'admin_init', 'rentalcar_form_setting_admin_stylesheet' );  
}
function rentalcar_front_js() {
	 if (wp_script_is('rollover1.js','enqueued')) {
       return;
     } else {
       wp_register_script( 'rollover1-js', plugins_url('rollover1.js', __FILE__));
		wp_enqueue_script( 'rollover1-js' );
     }
}
function rentalcar_form_setting_admin_stylesheet() {
	wp_register_style( 'rentalcar_form_setting-style', plugins_url('rentalcar_form_setting-admin.css', __FILE__) );
	wp_enqueue_style( 'rentalcar_form_setting-style' );
}
function rentalcar_form_setting() {
	add_menu_page( 'Rental Car', 'Rental Car', 'manage_options', 'rentalcar_setting', 'rentalcar_settingfn'); 			
	add_submenu_page('rentalcar_setting', __( 'English', 'rentalcar_form'), __( 'English', 'rentalcar_form' ), 'manage_options', 'set_rentalcar_en', 'set_rentalcar_en');
	add_submenu_page('rentalcar_setting', __( 'French', 'rentalcar_form'), __( 'French', 'rentalcar_form' ), 'manage_options', 'set_rentalcar_fr', 'set_rentalcar_fr');
	add_submenu_page('rentalcar_setting', __( 'German', 'rentalcar_form'), __( 'German', 'rentalcar_form' ), 'manage_options', 'set_rentalcar_da', 'set_rentalcar_da');
	add_submenu_page('rentalcar_setting', __( 'Netherlands', 'rentalcar_form'), __( 'Netherlands', 'rentalcar_form' ), 'manage_options', 'set_rentalcar_du', 'set_rentalcar_du');
}
function rentalcar_settingfn() {
	$msg='';
	if(isset($_POST['save'])){		
		
		if(isset($_POST["rentalcar_timediff"]))
		{
			delete_option( 'rentalcar_timediff');
			add_option( 'rentalcar_timediff',$_POST["rentalcar_timediff"], '', 'yes' ); 
		}
		
		if(isset($_POST["rental_searchform_bg_stat"]))
		{
			delete_option( 'rental_searchform_bg_stat');
			add_option( 'rental_searchform_bg_stat',$_POST["rental_searchform_bg_stat"], '', 'yes' ); 
		}
		if(isset($_POST['rental_searchform_css']))
		{
			delete_option( 'rental_searchform_css');
			add_option( 'rental_searchform_css',$_POST["rental_searchform_css"], '', 'yes' ); 
		}
		if(isset($_POST["rental_searchform_bg_color"]))
		{
			delete_option( 'rental_searchform_bg_color');
			add_option( 'rental_searchform_bg_color',$_POST["rental_searchform_bg_color"], '', 'yes' ); 
		}
		if(isset($_POST['rental_env_mode']))
		{
			delete_option( 'rental_env_mode');
			add_option( 'rental_env_mode',$_POST["rental_env_mode"], '', 'yes' ); 
		}
		if(isset($_POST['rental_test_api']))
		{
			delete_option( 'rental_test_api');
			add_option( 'rental_test_api',$_POST["rental_test_api"], '', 'yes' ); 
		}
		if(isset($_POST['rental_live_api']))
		{
			delete_option( 'rental_live_api');
			add_option( 'rental_live_api',$_POST["rental_live_api"], '', 'yes' ); 
		}
		if(isset($_POST['rental_type']))
		{
			delete_option( 'rental_type');
			add_option( 'rental_type',$_POST["rental_type"], '', 'yes' ); 
		}
		if(isset($_POST['rental_emails_to']))
		{
			delete_option( 'rental_emails_to');
			add_option( 'rental_emails_to',$_POST["rental_emails_to"], '', 'yes' ); 
		}
		if(isset($_POST['rental_emails_from']))
		{
			delete_option( 'rental_emails_from');
			add_option( 'rental_emails_from',$_POST["rental_emails_from"], '', 'yes' ); 
		}
		$msg="Setting has been saved successfully.";
	}
	if(isset($_POST['reset'])){
		rentalcar_install();
		$msg="Setting has been reset successfully.";
	}
	?>
    <div class="pea_admin_wrap">
        <div class="pea_admin_top">
            <h1>Rental Car Setting</h1>
        </div>        
 		<?php if($msg!=""){ echo '<div class="msg">'.$msg.'</div>';}?>
        <div class="pea_admin_main_wrap">
            <div class="pea_admin_main_left">
            <form method="post" action="" name="form1" enctype="multipart/form-data">
            	<h2>Api Setting</h2>
                <p>Environment Mode &nbsp;&nbsp;&nbsp;<input type="radio" name="rental_env_mode" value="test" <?php if(get_option('rental_env_mode')=='test'){ echo 'checked';}?>/>&nbsp;Test Mode&nbsp;&nbsp;<input type="radio" name="rental_env_mode" value="live" <?php if(get_option('rental_env_mode')=='live'){ echo 'checked';}?>/>&nbsp;Live Mode</p>
                <p>Test SecureKey&nbsp;&nbsp;&nbsp;<input type="text" name="rental_test_api" value="<?php echo get_option('rental_test_api');?>" style="width:250px;"/>&nbsp;&nbsp;&nbsp;example like +vsv1BjQDUZfPcP9cQXYEA==</p>
                <p>Live SecureKey&nbsp;&nbsp;&nbsp;<input type="text" name="rental_live_api" value="<?php echo get_option('rental_live_api');?>" style="width:250px;"/>&nbsp;&nbsp;&nbsp;example like 384t8FEFjKURylW9+PngGg==</p>
                 <p>Category &nbsp;&nbsp;&nbsp;<input type="radio" name="rental_type" value="9" <?php if(get_option('rental_type')=='9'){ echo 'checked';}?>/>&nbsp;Campervan&nbsp;&nbsp;<input type="radio" name="rental_type" value="1" <?php if(get_option('rental_type')=='1'){ echo 'checked';}?>/>&nbsp;Car</p>
                 <p>Time Difference&nbsp;&nbsp;&nbsp;<select name="rentalcar_timediff">
                   <?php				   		
				   		for($t=-20;$t<1;$t++)
						{
							if(get_option('rentalcar_timediff')==$t){echo '<option selected value="'.$t.'">'.$t.' hours</option>';}else{
								echo '<option value="'.$t.'">'.$t.' hours</option>';}							
						}
						for($t=1;$t<20;$t++)
						{
							if(get_option('rentalcar_timediff')==$t){echo '<option selected value="'.$t.'">&#43;'.$t.' hours</option>';}else{
								echo '<option value="'.$t.'">&#43;'.$t.' hours</option>';}							
						}	
				   ?>
                   </select>
                   </p>  
                 <h2>Email Address</h2> 
                 <p>From&nbsp;&nbsp;&nbsp;<input type="text" name="rental_emails_from" value="<?php echo get_option('rental_emails_from');?>" style="width:800px;"/></p>
                 <span style="font-size:11px">Notes:You can fill the field on format like name&lt;emailaddress&gt; format.</span>
                 <p>To&nbsp;&nbsp;&nbsp;<input type="text" name="rental_emails_to" value="<?php echo get_option('rental_emails_to');?>"  style="width:800px;"/></p>
                  <span style="font-size:11px">Notes:You can fill the field on format like name1&lt;emailaddress1&gt;,name2&lt;emailaddress2&gt; etc. multiple email addresses are supported.</span>
                 <h2>Other</h2> 
                 <p>Set Widget Background Color&nbsp;&nbsp;&nbsp;<input type="text" name="rental_searchform_bg_color" value="<?php echo get_option('rental_searchform_bg_color');?>"/></p>
                  <p>Set Widget Background Image&nbsp;&nbsp;&nbsp;<input type="file" name="rental_searchform_bg_img" />&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'rental_searchform_bg_img') , __FILE__ );?>" target="_blank">Preview</a></p>    
                   <p>Widget Background Image&nbsp;&nbsp;&nbsp;<input type="radio" name="rental_searchform_bg_stat" value="enabled" <?php if(get_option('rental_searchform_bg_stat')=='enabled'){ echo 'checked';}?>/>&nbsp;&nbsp;Enabled&nbsp;&nbsp;<input type="radio" name="rental_searchform_bg_stat" value="disabled" <?php if(get_option('rental_searchform_bg_stat')=='disabled'){ echo 'checked';}?>/>&nbsp;&nbsp;Disabled</p>                 
                 <p>Stylesheet&nbsp;&nbsp;(<strong>Shortcode:</strong>&nbsp;[rcm_search_results lang='en']&nbsp;[rcm_search_results lang='da']&nbsp;[rcm_search_results lang='fr']&nbsp;[rcm_search_results lang='du'])</p>
                <p><textarea name="rental_searchform_css" class="regular-text csstxt"><?php echo stripslashes(get_option('rental_searchform_css'));?></textarea></p>
                <div style="float: left; width: 80%;" class="submit">
                    <input type="submit" name="reset" value="Reset Settings" class="button-primary">
                </div>
                <div style="float: left; width: 18%;" class="submit">
                    <input type="submit" style="float: right;" name="save" value="Save Settings" class="button-primary">
                </div>
			</form>            
            </div>
		</div>            
    </div>
    <?php
}
function set_rentalcar_en()
{
	$lang='en';$langtxt='english';
	set_rentalcar_lang($lang,$langtxt);
}
function set_rentalcar_fr()
{
	$lang='fr';$langtxt='french';
	set_rentalcar_lang($lang,$langtxt);
}
function set_rentalcar_da()
{
	$lang='da';$langtxt='german';
	set_rentalcar_lang($lang,$langtxt);
}
function set_rentalcar_du()
{
	$lang='du';$langtxt='netherlands';
	set_rentalcar_lang($lang,$langtxt);
}
function set_rentalcar_lang($lang,$langtxt)
{	
	$msg='';
	$myoptions=get_option('rental_option_'.$lang);
	if(isset($_POST['save']))
	{			
		$allowedExts = array("gif", "jpeg", "jpg", "png");			
		$filenamearr=array('header_img','searchbtn','searchbtn_ho','continuebtn','continuebtn_ho','checkavailbtn','checkavailbtn_ho','emailquote','emailquote_ho');
		foreach($filenamearr as $filename)
		{
			$temp = explode(".", $_FILES[$filename]["name"]);
			$extension = end($temp);
			if(($_FILES[$filename]["size"] < 200000) && in_array($extension, $allowedExts))
			{
				if ($_FILES[$filename]["error"] > 0)
				{
					$msg="Error while uploading file";
				}
				else
				{
					 move_uploaded_file($_FILES[$filename]["tmp_name"],plugin_dir_path( __FILE__ )."/upload/" . $_FILES[$filename]["name"]);				
					 
				}
			}
		}
		
		if($_FILES["header_img"]["name"]!=""){$header_img=$_FILES["header_img"]["name"];}else{$header_img=$myoptions["header_img"];}
		if($_FILES["searchbtn"]["name"]!=""){$searchbtn=$_FILES["searchbtn"]["name"];}else{$searchbtn=$myoptions["searchbtn"];}
		if($_FILES["searchbtn_ho"]["name"]!=""){$searchbtn_ho=$_FILES["searchbtn_ho"]["name"];}else{$searchbtn_ho=$myoptions["searchbtn_ho"];}
		if($_FILES["continuebtn"]["name"]!=""){$continuebtn=$_FILES["continuebtn"]["name"];}else{$continuebtn=$myoptions["continuebtn"];}
		if($_FILES["continuebtn_ho"]["name"]!=""){$continuebtn_ho=$_FILES["continuebtn_ho"]["name"];}else{$continuebtn_ho=$myoptions["continuebtn_ho"];}
		if($_FILES["checkavailbtn"]["name"]!=""){$checkavailbtn=$_FILES["checkavailbtn"]["name"];}else{$checkavailbtn=$myoptions["checkavailbtn"];}
		if($_FILES["checkavailbtn_ho"]["name"]!=""){$checkavailbtn_ho=$_FILES["checkavailbtn_ho"]["name"];}else{$checkavailbtn_ho=$myoptions["checkavailbtn_ho"];}		
		
		if($_FILES["emailquote"]["name"]!=""){$emailquote=$_FILES["emailquote"]["name"];}else{$emailquote=$myoptions["emailquote"];}
		if($_FILES["emailquote_ho"]["name"]!=""){$emailquote_ho=$_FILES["emailquote_ho"]["name"];}else{$emailquote_ho=$myoptions["emailquote_ho"];}
		
		if(isset($_POST['emailquote_template_'.$lang]))
		{
			delete_option( 'emailquote_template_'.$lang);
			add_option( 'emailquote_template_'.$lang,$_POST["emailquote_template_".$lang], '', 'yes' ); 
		}
		if(isset($_POST['successmsg_'.$lang]))
		{
			delete_option( 'successmsg_'.$lang);
			add_option( 'successmsg_'.$lang,$_POST["successmsg_".$lang], '', 'yes' ); 
		}
		$optionsarr[$lang]=array(					 
					'header_img'=>$header_img,	
					'searchbtn'=>$searchbtn,
					'searchbtn_ho'=>$searchbtn_ho,					
					'continuebtn'=>$continuebtn,
					'continuebtn_ho'=>$continuebtn_ho,
					'checkavailbtn'=>$checkavailbtn,
					'checkavailbtn_ho'=>$checkavailbtn_ho,
					'emailquote'=>$emailquote,
					'emailquote_ho'=>$emailquote_ho,					
					'pickuplocation'=>$_POST["pickuplocation"],
					'pickupdate'=>$_POST["pickupdate"],
					'dropofflocation'=>$_POST["dropofflocation"],			
					'dropoffdate'=>$_POST["dropoffdate"],
					'promocode'=>$_POST["promocode"],					
					'acrodian'=>$_POST["acrodian"],
					'step3tr1td3'=>$_POST["step3tr1td3"],
					'step3tr2td3'=>$_POST["step3tr2td3"],
					'step3tr3td3'=>$_POST["step3tr3td3"],
					'bookingfname'=>$_POST["bookingfname"],
					'bookinglname'=>$_POST["bookinglname"],
					'bookingemail'=>$_POST["bookingemail"],
					'step3th1'=>$_POST["step3th1"],
					'step3th2'=>$_POST["step3th2"],
					'step3th3'=>$_POST["step3th3"],
					'step3trtd1'=>$_POST["step3trtd1"],
					'step3trtd2'=>$_POST["step3trtd2"],
					'step3trtd3'=>$_POST["step3trtd3"],
					'avgrate'=>$_POST["avgrate"],
					'step3quotetitle'=>$_POST["step3quotetitle"],
					'vehicletype'=>$_POST["vehicletype"],
					'pickup'=>$_POST["pickup"],
					'step3bookingtitle'=>$_POST["step3bookingtitle"],
					'dropoff'=>$_POST["dropoff"],
					'clickinfo'=>$_POST["clickinfo"],
					'dailyrate'=>$_POST["dailyrate"],
					'subtotal'=>$_POST["subtotal"],
					'insurance'=>$_POST["insurance"],
					'totalcost'=>$_POST["totalcost"],
					'back'=>$_POST["back"],
					'step3title'=>$_POST["step3title"],
					'step3moreinfo'=>$_POST["step3moreinfo"],
					'oneway'=>$_POST["oneway"],'yourdetails'=>$_POST["yourdetails"],
					'addition_details'=>$_POST["addition_details"],
					'subtotal_notes'=>$_POST["subtotal_notes"],
					'bookingsummary'=>$_POST["bookingsummary"]
					);
		
		update_option('rental_option_'.$lang,$optionsarr[$lang]);
		$msg="Setting has been saved successfully.";
		$myoptions=get_option('rental_option_'.$lang);
	}
	?>
     <div class="pea_admin_wrap">
        <div class="pea_admin_top">
            <h1>Rental Car<small> - set <?php echo $langtxt;?> language</small></h1>
        </div>
 		<?php if($msg!=""){ echo '<div class="msg">'.$msg.'</div>';}?>

        <div class="pea_admin_main_wrap">
            <div class="pea_admin_main_left">
             <form method="post" action="" name="setlangform" enctype="multipart/form-data">
              <table cellpadding="2" cellspacing="4" border="0" width="100%">
                <tr><td colspan="2"><h2>Search Form</h2></td></tr>
                <tr>
                	<td valign="top" width="50%">
                    	<table cellpadding="2" cellspacing="2" border="0" width="100%">
                        	<tr>
                                <td>Header image</td>
                                <td>
                                <input type="file" name="header_img"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.$myoptions['header_img'] , __FILE__ );?>" target="_blank">Preview</a>
                                </td>
                              </tr>
                              <tr>
                                <td>Search Button image</td>
                                <td>
                                <input type="file" name="searchbtn"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.$myoptions['searchbtn'] , __FILE__ );?>" target="_blank">Preview</a>
                                </td>
                              </tr>
                              <tr>
                                <td>Hover Search Button image</td>
                                <td>
                                <input type="file" name="searchbtn_ho"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.$myoptions['searchbtn_ho'] , __FILE__ );?>" target="_blank">Preview</a>
                                </td>
                              </tr>                              
                        	 <tr>
                                <td>Pickup Location</td>
                                <td>
                                <input type="text"  name="pickuplocation" value="<?php echo $myoptions["pickuplocation"];?>" class="regular-text"/>
                                </td>
                              </tr>
                              <tr>
                                <td>Pickup Date</td>
                                <td><input type="text"  name="pickupdate" value="<?php echo $myoptions["pickupdate"];?>" class="regular-text"/></td>
                              </tr>
                               <tr>
                                <td>Dropoff Location</td>
                                <td><input type="text"  name="dropofflocation" value="<?php echo $myoptions["dropofflocation"];?>" class="regular-text"/></td>
                              </tr>
                              <tr>
                                <td>Dropoff Date</td>
                                <td><input type="text"  name="dropoffdate" value="<?php echo $myoptions["dropoffdate"];?>" class="regular-text"/></td>
                              </tr>
                              <tr>
                                <td>Promo Code</td>
                                <td><input type="text"  name="promocode" value="<?php echo $myoptions["promocode"];?>" class="regular-text"/></td>
                              </tr>
                             
                        </table>
                    </td>
                    <td valign="top">
                    	<table cellpadding="2" cellspacing="2" border="0" width="100%">
                    	 <tr>
                    <td>Red</td>
                    <td><input type="text"  name="step3tr1td3" value="<?php echo $myoptions["step3tr1td3"];?>" class="regular-text"/></td>
                  </tr>
                   <tr>
                    <td>Orange</td>
                    <td><input type="text"  name="step3tr2td3" value="<?php echo $myoptions["step3tr2td3"];?>" class="regular-text"/></td>
                  </tr>
                   <tr>
                    <td>Green</td>
                    <td><input type="text"  name="step3tr3td3" value="<?php echo $myoptions["step3tr3td3"];?>" class="regular-text"/></td>
                  </tr>
                          <tr>
                            <td>First Name</td>
                            <td><input type="text"  name="bookingfname" value="<?php echo $myoptions["bookingfname"];?>" class="regular-text"/></td>
                          </tr>
                           <tr>
                            <td>Last Name</td>
                            <td><input type="text"  name="bookinglname" value="<?php echo $myoptions["bookinglname"];?>" class="regular-text"/></td>
                          </tr>
                           <tr>
                            <td>Email</td>
                            <td><input type="text"  name="bookingemail" value="<?php echo $myoptions["bookingemail"];?>" class="regular-text"/></td>
                          </tr>
                           
                            <tr>
                            <td>One Way Fee</td>
                            <td><input type="text"  name="oneway" value="<?php echo $myoptions["oneway"];?>" class="regular-text"/></td>
                          </tr>
                           <tr>
                            <td>Booking summary</td>
                            <td><input type="text"  name="bookingsummary" value="<?php echo $myoptions["bookingsummary"];?>" class="regular-text"/></td>
                          </tr>
                   		</table>
                    </td>
                </tr>
                <tr><td colspan="2"><h2>Search Result</h2></td></tr>
                <tr>
                	<td valign="top">
                    	<table cellpadding="2" cellspacing="2" border="0" width="100%">
                        <tr>
                            <td>Campervan Insurance</td>
                            <td><input type="text"  name="step3th1" value="<?php echo $myoptions["step3th1"];?>" class="regular-text"/></td>
                          </tr>
                          <tr>
                            <td>Bond</td>
                            <td><input type="text"  name="step3th2" value="<?php echo $myoptions["step3th2"];?>" class="regular-text"/></td>
                          </tr>
                          <tr>
                            <td>Select Insurance</td>
                            <td><input type="text"  name="step3th3" value="<?php echo $myoptions["step3th3"];?>" class="regular-text"/></td>
                          </tr>
                        	
                            <td>Red Insurance $10 per day</td>
                            <td><input type="text"  name="step3trtd1" value="<?php echo $myoptions["step3trtd1"];?>" class="regular-text"/></td>
                          </tr>
                           <tr>
                            <td>Orange Insurance $15 per day</td>
                            <td><input type="text"  name="step3trtd2" value="<?php echo $myoptions["step3trtd2"];?>" class="regular-text"/></td>
                          </tr>
                           <tr>
                            <td>Green Insurance $25 per day</td>
                            <td><input type="text"  name="step3trtd3" value="<?php echo $myoptions["step3trtd3"];?>" class="regular-text"/></td>
                          </tr>
                         
                            <tr>
                            <td>Average daily rate</td>
                            <td><input type="text"  name="avgrate" value="<?php echo $myoptions["avgrate"];?>" class="regular-text"/></td>
                          </tr>
                          <tr>
                            <td>Campervan Hire Quote</td>
                            <td><input type="text"  name="step3quotetitle" value="<?php echo $myoptions["step3quotetitle"];?>" class="regular-text"/></td>
                          </tr>
                           <tr>
                            <td>Vehicle Type</td>
                            <td><input type="text"  name="vehicletype" value="<?php echo $myoptions["vehicletype"];?>" class="regular-text"/></td>
                          </tr>
                           <tr>
                            <td>Pickup</td>
                            <td><input type="text"  name="pickup" value="<?php echo $myoptions["pickup"];?>" class="regular-text"/></td>
                          </tr>
                           <tr>
                            <td>Dropoff</td>
                            <td><input type="text"  name="dropoff" value="<?php echo $myoptions["dropoff"];?>" class="regular-text"/></td>
                          </tr>
                           
                            <tr>
                            <td>Total Cost</td>
                            <td><input type="text"  name="totalcost" value="<?php echo $myoptions["totalcost"];?>" class="regular-text"/></td>
                          </tr>
                         
                      </table>
                    </td>
                    <td valign="top">
                  		<table cellpadding="2" cellspacing="2" border="0" width="100%">
                  		   <tr>
                                <td>Email Quote button image</td>
                                <td><input type="file" name="emailquote"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.$myoptions['emailquote'] , __FILE__ );?>" target="_blank">Preview</a></td>
                              </tr>
                              <tr>
                                <td>Hover Email Quote button image</td>
                                <td><input type="file" name="emailquote_ho"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.$myoptions['emailquote_ho'] , __FILE__ );?>" target="_blank">Preview</a></td>
                              </tr>
                              <tr>
                                <td>Continue button image</td>
                                <td><input type="file" name="continuebtn"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.$myoptions['continuebtn'] , __FILE__ );?>" target="_blank">Preview</a></td>
                              </tr>
                              <tr>
                                <td>Hover continue button image</td>
                                <td><input type="file" name="continuebtn_ho"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.$myoptions['continuebtn_ho'] , __FILE__ );?>" target="_blank">Preview</a></td>
                              </tr>
                              <tr>
                                <td>Check availability button image</td>
                                <td><input type="file" name="checkavailbtn"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.$myoptions['checkavailbtn'] , __FILE__ );?>" target="_blank">Preview</a></td>
                              </tr>
                              <tr>
                                <td>Hover Check availability button image</td>
                                <td><input type="file" name="checkavailbtn_ho"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.$myoptions['checkavailbtn_ho'] , __FILE__ );?>" target="_blank">Preview</a></td>
                              </tr>
                             <tr>
                         
                             <tr>
                           <tr>
                            <td>Click for vehicle info</td>
                            <td><input type="text"  name="clickinfo" value="<?php echo $myoptions["clickinfo"];?>" class="regular-text"/></td>
                          </tr>
                          <tr>
                            <td>Daily Rate</td>
                            <td><input type="text"  name="dailyrate" value="<?php echo $myoptions["dailyrate"];?>" class="regular-text"/></td>
                          </tr>
                           <tr>
                            <td>SUB TOTAL</td>
                            <td><input type="text"  name="subtotal" value="<?php echo $myoptions["subtotal"];?>" class="regular-text"/></td>
                          </tr>
                          <tr>
                            <td>Insurance</td>
                            <td><input type="text"  name="insurance" value="<?php echo $myoptions["insurance"];?>" class="regular-text"/></td>
                          </tr>
                       
                            <tr>
                             <td>Back</td>
                             <td><input type="text"  name="back" value="<?php echo $myoptions["back"];?>" class="regular-text"/></td>
                           </tr>
                  		</table>
                    </td>
                </tr> 
                 <tr>
                    <td>Questions or special requests</td>
                    <td><input type="text"  name="addition_details" value="<?php echo $myoptions["addition_details"];?>" class="regular-text" style="width:500px"/></td>
                  </tr> 
                  
                    <tr>
                    <td>Subtotal notes</td>
                    <td><input type="text"  name="subtotal_notes" value="<?php echo $myoptions["subtotal_notes"];?>" class="regular-text" style="width:500px"/></td>
                  </tr> 
                 <tr>
                    <td>Click Here to Change Search Cities & Dates</td>
                    <td><input type="text"  name="acrodian" value="<?php echo $myoptions["acrodian"];?>" class="regular-text" style="width:500px"/></td>
                  </tr>                 
                   <tr>
                    <td>Campervan Insurance - please select one option Red, Orange or Green Insurance</td>
                    <td><input type="text"  name="step3title" value="<?php echo $myoptions["step3title"];?>" class="regular-text" style="width:500px"/></td>
                  </tr>
                  
                  <tr>
                    <td>Click here for more information about Campervan insurance Campervan insurance</td>
                    <td><input type="text"  name="step3moreinfo" value="<?php echo $myoptions["step3moreinfo"];?>" class="regular-text" style="width:500px"/></td>
                  </tr>
                   <tr>
                    <td>Enter your name & email to check availability</td>
                    <td><input type="text"  name="step3bookingtitle" value="<?php echo $myoptions["step3bookingtitle"];?>" class="regular-text" style="width:500px;"/></td>
                  </tr>
                    <tr>
                     <td colspan="2">Success Message</td>
                   </tr>
                    <tr>
                     <td colspan="2">
                    <?php 
					 $settings = array('media_buttons' => false,'teeny' => true,'textarea_rows' => 8);
					 $wpcontent=stripslashes_deep(get_option("successmsg_".$lang,true));					 
					 $wpcontent = apply_filters('the_content', $wpcontent);
					 wp_editor( $wpcontent, "successmsg_".$lang ,$settings);
					 ?>
                    </td>
                  </tr>                  
                   <tr>
                     <td colspan="2">Quote email template</td>
                   </tr>
                    <tr>
                     <td colspan="2"><?php 
					 $settings = array('media_buttons' => false,'teeny' => true,'textarea_rows' => 50);
					 $tempcontent=stripslashes_deep(get_option("emailquote_template_".$lang,true));
					 $tempcontent = apply_filters('the_content', $tempcontent);
					 wp_editor( $tempcontent, "emailquote_template_".$lang ,$settings);
					 ?></td>
                   </tr>
               </table>
               <p class="submit">
                    <input type="submit" class="button-primary" value="Save Language Settings" name="save"/>
                </p>
			</form>            
            </div>
		</div>            
    </div>    
    <?php
}
function set_html_content_type() {
		return 'text/html';
}
require_once('rcmsearch-widget.php');
function rcmsearch_widget_init(){
	register_widget('Rcmsearch_Widget');
}
add_action('widgets_init','rcmsearch_widget_init');

add_shortcode('rcm_search_results','rentalcarmanagementsearchresults');

function rentalcarmanagementsearchresults($attr)
{
	$output='';$results='';	$searchout='';
	global $myoptions,$emailquote_template_msg,$sucess_msg;
	if(is_array($attr)){
		if($attr["lang"] !=""){$lang=$attr["lang"];}else{$lang='en';}
		if($attr["only"] !=""){$resonly=$attr["only"];}else{$resonly='';}
	}
	else
	{
		$lang='en';$resonly='';
	}
	
	if(get_option('rental_env_mode') == 'live'){$securekey=get_option('rental_live_api');} else {$securekey=get_option('rental_test_api');}
	if(get_option('rental_type') == '9'){$CategoryTypeID='9';}else{$CategoryTypeID='1';}
	
	$myoptions=get_option('rental_option_'.$lang);
	
	$sucess_msg=stripslashes_deep(get_option("successmsg_".$lang,true));
	
	$emailquote_template_msg=stripslashes_deep(get_option('emailquote_template_'.$lang,true));
	
	$lang_res['rental_headerimgurl']=plugins_url('/upload/'.$myoptions["header_img"], __FILE__);
	
	$continuebtn=plugins_url('/upload/'.$myoptions["continuebtn"], __FILE__);
	$continuebtn_ho=plugins_url('/upload/'.$myoptions["continuebtn_ho"], __FILE__);
	
	$emailquote=plugins_url('/upload/'.$myoptions["emailquote"], __FILE__);
	$emailquote_ho=plugins_url('/upload/'.$myoptions["emailquote_ho"], __FILE__);
	
	$checkavailbtn=plugins_url('/upload/'.$myoptions["checkavailbtn"], __FILE__);
	$checkavailbtn_ho=plugins_url('/upload/'.$myoptions["checkavailbtn_ho"], __FILE__);

	$locationarray=array('Sydney'=>1,'Adelaide'=>28,'Brisbane'=>33,'Cairns'=>36,'Darwin'=>12,'Melbourne'=>4,'Perth'=>9);
	$pickuplocationarr='';$dropofflocationarr='';$from='';$to='';
	foreach($locationarray as $k => $v)
	{
		if($_GET["PickupLocation"] == $v or $_GET["PickupLocationID"] == $v)
		{
			$pickuplocationarr .='<option selected value="'.$v.'">'.$k.'</option>';
			$from=$k;
		}
		else{
			$pickuplocationarr .='<option value="'.$v.'">'.$k.'</option>';
		}	
		
		if($_GET["DropOffLocation"] == $v or $_GET["DLocationID"] == $v)
		{
			$dropofflocationarr .='<option selected value="'.$v.'">'.$k.'</option>';
			$to=$k;
		}
		else{
			$dropofflocationarr .='<option value="'.$v.'">'.$k.'</option>';
		}	
		
	}	
	/*start search section */
	if($_GET["PickupDate"]!=""){ $PickupDate=$_GET["PickupDate"];}else {$PickupDate=date("d/m/Y",strtotime("+2 day"));}
	if($_GET["DropOffDate"]!=""){ $DropOffDate=$_GET["DropOffDate"];}else {$DropOffDate=date("d/m/Y",strtotime("+14 day"));}
	if($_GET["PromoCode"]!=""){$PromoCode=$_GET["PromoCode"];}
	
	if(get_option('rental_searchform_bg_stat') == 'enabled')
	{
		$backstyle='background-image:url('.plugins_url('/upload/'.get_option( 'rental_searchform_bg_img') , __FILE__ ).');';
	}
	if($lang_res['rental_headerimgurl']!=""){
		$headertxt= '<img src="'.$lang_res['rental_headerimgurl'].'" border="0" onclick="searchtoggle()"/>';
	} else {
		$headertxt= '<h1 onclick="searchtoggle()">Enter Your Travel Details</h1>'; } 
	
	if($resonly == ""){
	$searchout .='<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" />
          <link type="text/css" rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
          <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
          <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
		   <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/i18n/jquery-ui-i18n.min.js"></script>	
          <script src="'.plugins_url('jquery.selectBoxIt.js', __FILE__).'"></script> 
		  <style>'.get_option('rental_searchform_css').'
			.ui-datepicker .ui-datepicker-header {background:none repeat scroll 0 0 #026CD6;color:#FFFFFF}
			.rentalcar_widget_div ul li{background:none;padding:5px;margin:0;}
			.tabsidebar .ui-widget-content{	border:none;}
			.ui-tabs .ui-tabs-panel{padding:0;}
			.content_left .ui-tabs{padding:0;}
			.clear5{clear:both;height:10px;}
			#custom_toggle_a{background-position:-80px top !important;background-image:url(http://static.olark.com/themes/azul/buttons-light.png);background-position:0 top;background-repeat:no-repeat !important;border-radius:5px !important;cursor:pointer !important;float:right;height:16px;line-height:1000;margin-right:10px;margin-top:5px;overflow:hidden;padding:0;width:16px;
}
#custom_toggle_a:hover{background-color:#333;}
            </style>
 <script>
jQuery( document ).ready(function($) {		
		';
		if($lang == 'en') { $searchout .= 'jQuery.datepicker.setDefaults( jQuery.datepicker.regional[""] );';}
		else if($lang == 'ge') { $searchout .= '$.datepicker.setDefaults( $.datepicker.regional[ "de" ] );';}
		else if($lang == 'fr') { $searchout .= '$.datepicker.setDefaults( $.datepicker.regional[ "fr" ] );';}
		else if($lang == 'du') { $searchout .= '$.datepicker.setDefaults( $.datepicker.regional[ "nl" ] );';}
		else { $searchout.='$.datepicker.setDefaults( $.datepicker.regional[ "" ] );';}  
$searchout .='jQuery("#PickupLocation,#DropOffLocation").selectBoxIt({theme: "jquerymobile"});
$("#PickupDate").datepicker({numberOfMonths: 3,dateFormat: "dd/mm/yy",defaultDate: +2,
						onSelect: function (dateText, inst) {
								var date = $(this).datepicker("getDate");
								if (date){
									date.setDate(date.getDate() + 14);
									$( "#DropOffDate" ).datepicker( "option", "minDate", date );
								}
						}
									});
		$("#DropOffDate").datepicker({ numberOfMonths: 3,defaultDate: +14,dateFormat: "dd/mm/yy"});
});
var j = jQuery.noConflict();
function searchtoggle()
{	
	if(j(".rentalcar_form_div").css("display") == "none"){
		j(".rentalcar_form_div").show("slow");
		j("#toggle_custom_div").html(\''.$headertxt.'<a id="custom_toggle_a" onclick="searchtoggle()">^</a>\');
		j("#toggle_custom_div").css("border-radius","6px 6px 0 0");
	}
	else
	{
		j(".rentalcar_form_div").hide("slow");
		j("#toggle_custom_div").css("border-radius","6px");
		j("#toggle_custom_div").html(\'<a style="color:#fff;font-size:15px;text-decoration:underline;" onclick="searchtoggle()">Click Here to Change Search Cities & Dates</a><a id="custom_toggle_a" style="background-position:-96px top !important" onclick="searchtoggle()">^</a>\');		
	}
		
}
</script>
<div id="rentalcar_form_section">';
if($_GET["action"] == 'step2' or $_GET["action"] == 'email'){
	$searchout .='<div id="toggle_custom_div" style="'.$backstyle.'background-color:'.get_option('rental_searchform_bg_color').';border:2px solid '.get_option('rental_searchform_bg_color').';border-radius:6px;text-align:center;padding:5px;"><a style="text-decoration:underline;color:#fff;font-size:15px;" onclick="searchtoggle()">'.$myoptions["acrodian"].'</a><a id="custom_toggle_a" style="background-position:-96px top !important" onclick="searchtoggle()">^</a></div>
	<div class="rentalcar_form_div" data-role="content" style="'.$backstyle.'display:none;background-color:'.get_option('rental_searchform_bg_color').';border-right:2px solid '.get_option('rental_searchform_bg_color').';border-left:2px solid '.get_option('rental_searchform_bg_color').';border-bottom:2px solid '.get_option('rental_searchform_bg_color').';border-radius:0 0 6px 6px">   
<form method="GET" action="'.get_permalink().'" id="rentalcar">';
}
else
{
$searchout .='<div id="toggle_custom_div" style="'.$backstyle.'background-color:'.get_option('rental_searchform_bg_color').';border-top:2px solid '.get_option('rental_searchform_bg_color').';border-right:2px solid '.get_option('rental_searchform_bg_color').';border-left:2px solid '.get_option('rental_searchform_bg_color').';border-radius:6px 6px 0 0;text-align:center;padding:5px;">'.$headertxt.'<a id="custom_toggle_a" onclick="searchtoggle()">^</a></div><div class="rentalcar_form_div" data-role="content" style="'.$backstyle.'background-color:'.get_option('rental_searchform_bg_color').';border-right:2px solid '.get_option('rental_searchform_bg_color').';border-left:2px solid '.get_option('rental_searchform_bg_color').';border-bottom:2px solid '.get_option('rental_searchform_bg_color').';border-radius:0 0 6px 6px">   
<form method="GET" action="'.get_permalink().'" id="rentalcar">';
}
	
	$searchout .='<div style="clear:both"></div>                          
            	<div class="custom_div_left"> 
					<label>'.$myoptions["pickuplocation"].'</label>
					<select id="PickupLocation" name="PickupLocation">'.$pickuplocationarr.'</select>
				</div>
				<div class="custom_div_right">
					<label>'.$myoptions["pickupdate"].'</label>
					<div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset ui-shadow ui-btn-up-c">
					<input type="text" name="PickupDate" size="30" id="PickupDate" value="'.$PickupDate.'" data-theme="a" />
					</div>
				</div>
				<div class="clear5"></div>				
			<div class="custom_div_left">
				<label>'.$myoptions["dropofflocation"].'</label>
				<select id="DropOffLocation" name="DropOffLocation">'.$dropofflocationarr.'</select>
			</div>
			<div class="custom_div_right">
				<label>'.$myoptions["dropoffdate"].'</label><div class="clear2"></div>
				<div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset ui-shadow ui-btn-up-c"> <input type="text" name="DropOffDate" size="30" id="DropOffDate" value="'.$DropOffDate.'" data-theme="a" /></div>	
			</div>
			<div class="clear5"></div>	
			<div class="custom_div_left">
					<label>'.$myoptions["promocode"].'</label>
					<div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset ui-shadow ui-btn-up-c"><input type="text" id="PromoCode" name="PromoCode" size="30" value="'.$PromoCode.'" data-theme="a" /></div>
				</div>
			<div class="custom_div_right" style="margin-top:20px;">
				<input type="hidden" name="action" value="step2"/>
				<img border="0" oldsrc="'.plugins_url('/upload/'.$myoptions['searchbtn'], __FILE__).'" srcover="'.plugins_url('/upload/'.$myoptions['searchbtn_ho'], __FILE__).'" src="'.plugins_url('/upload/'.$myoptions['searchbtn'], __FILE__).'" onclick="document.getElementById(\'rentalcar\').submit()"/>
			</div>
			<div style="clear:both"></div>			
	 </form>
	 </div>
	 </div>
	 <div class="clear5"></div>';
	 /*end search section*/	
	}
	
	if($_GET["action"] == "Quote")
	{
		$output='';
		$url='http://secure.rentalcarmanager.com.au/ClientWebMobileAPI/RCMClientAPI.asmx/PopulateWebBookingTotal?RCMReferenceKey='.urlencode($_POST["refkey"]);
			$populatetotal=file_get_contents($url);
			
			$url='http://secure.rentalcarmanager.com.au/ClientWebMobileAPI/RCMClientAPI.asmx/confirmBookingTotal?CustomerEmailID='.urlencode($_POST["CustomerEmail"]).'&RCMReferenceKey='.urlencode($_POST["refkey"]);
			$confirmBookingTotal=file_get_contents($url);
		
		$url='http://secure.rentalcarmanager.com.au/ClientWebMobileAPI/RCMClientAPI.asmx/confirmVehicleSelection?CarID='.$_POST["CarSizeID"].'&RCMReferenceKey='.urlencode($_POST["refkey"]);	
		
			$articles = file_get_contents($url);
			$dom = new DOMDocument();
			$dom->loadXML($articles);
			$dom->preserveWhiteSpace = false;
			$elements = $dom->documentElement;
			$error=$elements->getElementsByTagName("Error");
			
			if( trim($error->item(0)->nodeValue)!="")
			{
				$output .='<div class="error">'.$error->item(0)->nodeValue.'</div>';				
			}
			else
			{
				
				$url='http://secure.rentalcarmanager.com.au/ClientWebMobileAPI/RCMClientAPI.asmx/requestExtras?RCMReferenceKey='.urlencode($_POST["refkey"]);
				$articles = file_get_contents($url);
				$requestExtras=$articles;
				
				$insuranceid=$_POST["isureid"];
				$url='http://secure.rentalcarmanager.com.au/ClientWebMobileAPI/RCMClientAPI.asmx/confirmInsuranceFees?InsuranceID='.$insuranceid.'&RCMReferenceKey='.urlencode($_POST["refkey"]);
				$articles = file_get_contents($url);
				$dom = new DOMDocument();
				$dom->loadXML($articles);
				$dom->preserveWhiteSpace = false;
				$elements = $dom->documentElement;
				$error=$elements->getElementsByTagName("Error");
				if( trim($error->item(0)->nodeValue)!="")
				{
					$output .='<div class="error">'.$error->item(0)->nodeValue.'</div>';				
				}
				else
				{
					$url='http://secure.rentalcarmanager.com.au/ClientWebMobileAPI/RCMClientAPI.asmx/requestCustomerCountryDetails?RCMReferenceKey='.urlencode($_POST["refkey"]);
			$requestCustomerCountryDetails=file_get_contents($url);
			
					$url='http://secure.rentalcarmanager.com.au/ClientWebMobileAPI/RCMClientAPI.asmx/requestRentalSource?RCMReferenceKey='.urlencode($_POST["refkey"]);
					$requestRentalSource=file_get_contents($url);
					
					$url='http://secure.rentalcarmanager.com.au/ClientWebMobileAPI/RCMClientAPI.asmx/confirmVehicleBookingQuote?CustomerFirstName='.urlencode($_POST["firstname"]).'&CustomerLastName='.urlencode($_POST["lastname"]).'&PrimaryDriverDOB=&PrimaryDriverLicenseNo=&LicenseIssuedCountryID=7&LicenseExpiryDate=&Address=&City=&StateProvince=&PostalCode=&CountryID=7&CustomerEmailID='.urlencode($_POST["CustomerEmail"]).'&CustomerPhone=985985&ArrivalFlight=&PickUpRequiredFrom=&DropOffRequiredTo=&NoOfTravelling=&CarTransmissionPreferenceID=&RentalSourceID='.$_POST["PickupLocationID"].'&AdditionalDetails=&CreditCardTypeID=&CreditCardNumber=&CCV=&NameOnCreditCard=&CreditCardExpiryDate=&RCMReferenceKey='.urlencode($_POST["refkey"]).'&BookingType=quote';
					$articles = file_get_contents($url);
					$dom = new DOMDocument();
					$dom->loadXML($articles);
					$dom->preserveWhiteSpace = false;
					$elements = $dom->documentElement;
					$error=$elements->getElementsByTagName("Error");
					if( trim($error->item(0)->nodeValue)!="")
					{
						$output .='<div class="error">'.$error->item(0)->nodeValue.'</div>';				
					}
					else
					{
						$quote=$elements->getElementsByTagName("ReferenceNo");$refquote=$quote->item(0)->nodeValue;
						$ReservationNo=$elements->getElementsByTagName("ReservationNo");$refkey=$ReservationNo->item(0)->nodeValue;
						$output .=$sucess_msg;
						$subject='Online Quotation with Travelwheels - Ref #'.$quote->item(0)->nodeValue.'(Sydney)';
						
						$message ='';	
						$hr=get_option("rentalcar_timediff",true);
						$today=date("d/M/Y",strtotime("+".$hr." hours"));$customer_email=$_POST["CustomerEmail"];
						$customer_name=$_POST["firstname"].'&nbsp;'.$_POST["lastname"];
						if($_POST["isureid"] == '739')
						{
						$insurance='<tr>
						  <td>1. Green Insurance, Daily at AU$25.00 :</td>
						  <td align="right">AU$'.$_POST["insurance"].'</td>
						</tr>';
						}
						elseif($_POST["isureid"] == '738')
						{
						$insurance='<tr>
						  <td>1. Orange Insurance, Daily at AU$15.00 :</td>
						   <td align="right">AU$'.$_POST["insurance"].'</td>
						</tr>';
						}
						else
						{
						$insurance='<tr>
						  <td>1. Red Insurance, Daily at AU$10.00 :</td>
						  <td align="right">AU$'.$_POST["insurance"].'</td>
						</tr>';
						}
						
						if(trim($_POST["oneway"]) > 0)
						{
						$oneway='<tr>
						  <td>2.One Way Fee :</td>
						   <td align="right">AU$'.$_POST["oneway"].'</td>
						</tr>';
						}else {$oneway='';}
						if($_POST["totalcost"]!=""){$totalcost=$_POST["totalcost"];}else{$totalcost='';}
						
						$findtag=array("[refquote]","[refkey]","[today]","[customer_name]","[customer_email]","[vehicle_type]","[imgsrc]","[pickuplocation]","[pickupdate]","[dropofflocation]","[dropoffdate]","[totalrentaldays]","[rateperday]","[subtotal]","[insurance]","[oneway]","[totalcost]","[sitetitle]","[siteurl]");
						$replacetag=array($refquote,$refkey,$today,$customer_name,$customer_email,$_POST["vehicle_type"],$_POST["imgsrc"],$_POST["pickuplocation"],$_POST["pickupdate"],$_POST["dropofflocation"],$_POST["dropoffdate"],$_POST["TotalRentalDays"],$_POST["rateperday"],$_POST["subtotal"],$insurance,$oneway,$totalcost,get_bloginfo("name"),get_bloginfo("url"));
						$message .=str_replace($findtag,$replacetag,$emailquote_template_msg);	
						
						if(get_option("rental_emails_from",true)!=""){$headers[] = 'From: '.get_option("rental_emails_from",true).''."\r\n";
						}else{
							$headers[] = 'From: Webmaster <'.get_bloginfo('admin_email').'>'."\r\n";
						}
						if(get_option("rental_emails_to",true)!=""){
							$bccarr=explode(",",get_option("rental_emails_to",true));
							foreach($bccarr as $val){
								if($val!=""){
									$headers[] = 'Bcc: '.$val.''."\r\n";
								}
							}
						}	
						
						add_filter( 'wp_mail_content_type', 'set_html_content_type' );
						wp_mail($_POST["CustomerEmail"],$subject,$message,$headers);	
						remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
					}
				}
			}
			
	}	 
	elseif($_GET["action"] == 'detail')
	{
		$output='';
		$output .='<style>header{display:none;}nav{display:none;}</style>';
		$url='http://secure.rentalcarmanager.com.au/ClientWebMobileAPI/RCMClientAPI.asmx/requestVehicleAvailability?PickupLocation='.urlencode($_GET["PickupLocationID"]).'&PickupDate='.urlencode($_GET["PickDate"]).'&PickupTime=12:00&DropOffLocation='.urlencode($_GET["DLocationID"]).'&DropOffDate='.urlencode($_GET["DropoffDate"]).'&DropOffTime=12:00&DriverAge=30&CategoryTypeID='.$CategoryTypeID.'&SecureKey='.urlencode($securekey).'&PromoCode='.urlencode($_GET["promo"]);	
		
			$articles = file_get_contents($url);
			
			$dom = new DOMDocument();
			$dom->loadXML($articles);
			$dom->preserveWhiteSpace = false;
			$elements = $dom->documentElement;
			$error=$elements->getElementsByTagName("Error");			
			if( trim($error->item(0)->nodeValue)!="")
			{
				$output .='<div class="error">'.$error->item(0)->nodeValue.'</div>';				
			}
			else
			{
				$refid=$elements->getElementsByTagName("ReferenceKey");
				$refkey=$refid->item(0)->nodeValue;			
				
				$numofday=(date("z",strtotime($_GET["DropoffDate"])-strtotime($_GET["PickDate"]))+1);
				$items=$elements->getElementsByTagName("VehicleEachSeason");
				
				$pickup=date("d F Y",strtotime($_GET["PickDate"])).' from '.$from;
				$dropoff=date("d F Y",strtotime($_GET["DropoffDate"])).' at '.$to;	
				
				for ($i = 0; $i < $items->length; $i++) {
					$id=$items->item($i)->getElementsByTagName("CarID")->item(0)->nodeValue;	
					if($id == $_GET["CarSizeID"])
					{
						$carid=$id;
						
						$TotalCost=$items->item($i)->getElementsByTagName("TotalCost")->item(0)->nodeValue;
						$rateperday=number_format(($TotalCost / $numofday),'2','.','');
					
						$imgsrc=$items->item($i)->getElementsByTagName("CarImageMobile")->item(0)->nodeValue;
						$catdesc=$items->item($i)->getElementsByTagName("CategoryDesc")->item(0)->nodeValue;
						$desc=$items->item($i)->getElementsByTagName("VehicleDesc")->item(0)->nodeValue;
						$descurl=$items->item($i)->getElementsByTagName("VehicleDescURL")->item(0)->nodeValue;
						
						$MandatoryFees=$items->item($i)->getElementsByTagName("MandatoryFees");$extrafees=0;
						for ($y = 0; $y < $MandatoryFees->length; $y++) {
							$rate=$MandatoryFees->item($y)->getElementsByTagName("Rate")->item(0)->nodeValue;
							$ratename=$MandatoryFees->item($y)->getElementsByTagName("Name")->item(0)->nodeValue;							
							if($rate!=""){
							$ratetrtd='<tr><td width="35%"><strong>'.$myoptions["oneway"].':</strong></td>
							<td>AUD $'.number_format($rate,2,'.','').'</td></tr>';
							$extrafees = $extrafees + $rate;
							}
						}
					}
				}				
				$subtotal=$numofday * $rateperday;
				$insurance=$numofday * 10;
				$output .='<style>'.get_option('rental_searchform_css').'</style><script>function openMoreInfo() {window.open("'.plugins_url('insurance_details.php',__FILE__).'", "WindowMore", "width=970,height=440,scrollbars=yes");}function moreInfo(id) { window.open("'.plugins_url('moreinfo.php',__FILE__).'?v=" + id, "WindowMore", "width=970,height=440,scrollbars=yes");}
				function updatedotalcost(numofday,extrafee){
					var subtotal;
					var extra=parseFloat(extrafee);
					subtotal=parseFloat(document.getElementById("subtotal").value);
					var totalid=document.getElementById("totalcost");
					var insuranceid=document.getElementById("insurance");
					var insure1=document.getElementById("InsuranceID1").value;
					var insure2=document.getElementById("InsuranceID2").value;
					var insure3=document.getElementById("InsuranceID3").value;
					var isureid=document.getElementById("isureid");
						if(document.getElementById("InsuranceID1").checked == true){
							insuranceid.innerHTML="AUD $" + (numofday * insure1).toFixed(2);
							totalid.innerHTML="AUD $" + (extra + subtotal + (numofday * insure1)).toFixed(2);
							isureid.value="737";
							document.getElementById("pinsurance").value=(numofday * insure1).toFixed(2);
							document.getElementById("ptotalcost").value=(extra + subtotal + (numofday * insure1)).toFixed(2);
						}
						if(document.getElementById("InsuranceID2").checked == true){
							insuranceid.innerHTML="AUD $" + (numofday * insure2).toFixed(2);
							totalid.innerHTML="AUD $" + (extra + subtotal + (numofday * insure2)).toFixed(2);
							isureid.value="738";
							document.getElementById("pinsurance").value=(numofday * insure2).toFixed(2);
							document.getElementById("ptotalcost").value=(extra + subtotal + (numofday * insure2)).toFixed(2);
						}
						if(document.getElementById("InsuranceID3").checked == true){
							insuranceid.innerHTML="AUD $" + (numofday * insure3).toFixed(2);
							totalid.innerHTML="AUD $" + (extra + subtotal + (numofday * insure3)).toFixed(2);
							isureid.value="739";
							document.getElementById("pinsurance").value=(numofday * insure3).toFixed(2);
							document.getElementById("ptotalcost").value=(extra + subtotal + (numofday * insure3)).toFixed(2);
						}
						
					}
					function validatebookingfrm()
					{
						 if (document.theForm.firstname.value == "")
						  {   
						  	  alert("First Name required.");
							  document.theForm.firstname.focus();
							  return (false);
						  }
						  if (document.theForm.lastname.value == "")
						  {      alert("Last Name required.");
							  document.theForm.lastname.focus();
							  return (false);
						  }
						  if (document.theForm.CustomerEmail.value == "")
						  {      alert("Email Address required.");
							  document.theForm.CustomerEmail.focus();
							  return (false);
						  }
						   var emailRegEx = /^[a-zA-Z0-9._-]*\@[a-zA-Z0-9._-]*$/;
							  if(!emailRegEx.test(theForm.CustomerEmail.value))
							  {
								 alert("Invalid Email address");
								 document.theForm.CustomerEmail.focus();
								 return false;
							  }
						 /*  if (document.theForm.Phone.value == "")
						  {  
						  	  alert("Phone No required.");
							  document.theForm.Phone.focus();
							  return (false);
						  }*/
						document.theForm.submit();
					}
					</script>
		<div class="bookingwrap clearfix">
			<div class="bookingh1">'.$myoptions["step3title"].'</div>
				<div class="restdiv">
						<table border="0" cellspacing="0" cellpadding="0" width="100%">
				<tbody>
					<tr>
						<td width="45%" align="left"><div class="insuranceth">'.$myoptions["step3th1"].'</div></td>
						<td align="center" width="35%"><div class="insuranceth">'.$myoptions["step3th2"].'</div></td>
						<td align="left"><div class="insuranceth">'.$myoptions["step3th3"].'</div></td>
					</tr>
					<tr>
						<td class="underline" width="45%" align="left">'.$myoptions["step3trtd1"].'</td>						
						<td align="center" width="35%" class="underline">$1000</td>
						<td align="left" class="underline"><input type="radio" checked="" value="10" name="InsuranceID" id="InsuranceID1" onclick="updatedotalcost(\''.$numofday.'\',\''.$extrafees.'\')"/>&nbsp;'.$myoptions["step3tr1td3"].'</td>
					</tr>
					<tr>
						<td class="underline" width="45%" align="left">'.$myoptions["step3trtd2"].'</td>
						<td align="center" width="35%" class="underline">$500</td>
						<td align="left" class="underline">
						<input type="radio" value="15" name="InsuranceID" id="InsuranceID2" onclick="updatedotalcost(\''.$numofday.'\',\''.$extrafees.'\')"/>&nbsp;'.$myoptions["step3tr2td3"].'</td>						
					</tr>
					<tr>
						<td class="underline" width="45%" align="left">'.$myoptions["step3trtd3"].'</td>						
						<td align="center" width="35%"" class="underline">$0</td>
						<td align="left" class="underline"><input type="radio" value="25" name="InsuranceID" id="InsuranceID3" onclick="updatedotalcost(\''.$numofday.'\',\''.$extrafees.'\')"/>&nbsp;'.$myoptions["step3tr3td3"].'</td>
					</tr>
					<tr>
						<td colspan="3" align="left"><a href="javascript:void(0)" onclick="openMoreInfo()" style="font-size:12px;color:#000">'.$myoptions["step3moreinfo"].' </a></td>
					</tr>
					</tbody>
			</table>	
					<div class="sep_checkout">&nbsp;</div>
					<div class="booking_title">'.$myoptions["step3quotetitle"].'</div>
					<div class="booking_chkoutleft">											
						<a onclick="openMoreInfo('.$carid.');" href="#"><img src="'.$imgsrc.'" border="0"/></a>	
						<div class="clear"></div>
						<a onclick="moreInfo('.$carid.');" href="#" style="font-size: 13px;">'.$myoptions["clickinfo"].'</a>
					</div>
					<div class="booking_chkoutright">						
						<table cellpadding="0" cellspacing="0" border="0" width="100%">
						<tr>
							<td width="35%"><strong>'.$myoptions["vehicletype"].':</strong></td>
							<td>'.$catdesc.'</td>
						</tr>
						<tr>
							<td width="35%"><strong>'.$myoptions["pickup"].':</strong></td>
							<td>'.$pickup.'</td>
						</tr>
						<tr>
							<td width="35%"><strong>'.$myoptions["dropoff"].':</strong></td>
							<td>'.$dropoff.'</td>
						</tr>
						<tr>
							<td width="35%"><strong>'.$myoptions["dailyrate"].':</strong></td>
							<td>$'.$rateperday.'&nbsp;/&nbsp;day&nbsp;(total '.$numofday.' days)</td>
						</tr>
						<tr>
							<td width="35%"><strong>'.$myoptions["subtotal"].':</strong></td>
							<td>AUD $'.number_format($subtotal,2,'.','').'<input id="subtotal" type="hidden" value="'.$subtotal.'"/></td>
						</tr>
						<tr>
							<td width="35%"><strong>'.$myoptions["insurance"].':</strong></td>
							<td><span id="insurance">AUD $'.number_format($insurance,2,'.','').'</span></td>
						</tr>
						'.$ratetrtd.'
						<tr>
							<td width="35%" class="calculate_total">'.$myoptions["totalcost"].':</td>
							<td><span id="totalcost">AUD $'.number_format(($subtotal + $insurance + $extrafees),2,'.','').'</span></td>
						</tr>
						</table>													
					</div>
					<div class="clear5"></div>
					</div>
				</div>	
			
			<div class="bookingwrap clearfix">
				<div class="bookingh1">'.$myoptions["step3bookingtitle"].'</div>
				<div class="restdiv">
				<form action="?action=Quote&categoryStatus=1" method="post" name="theForm">
					<div  style="width:95%;margin:0 auto;">
					<div class="chk_avail_fname_lvl"><strong>'.$myoptions["bookingfname"].'</strong></div>
					<div class="chk_avail_fname_input"><input type="text" name="firstname" id="firstname" class="chk_inpt_booking"/></div>
					<div class="chk_avail_lname_lvl"><strong>'.$myoptions["bookinglname"].'</strong></div>
					<div class="chk_avail_lname_input"><input type="text" name="lastname" id="lastname" class="chk_inpt_booking"/></div>
					
					<div class="clear5"></div>					
					<div class="chk_avail_email_lvl"><strong>'.$myoptions["bookingemail"].'</strong></div>
					<div class="chk_avail_email_input">
						<input type="text" name="CustomerEmail" id="CustomerEmail" class="inpt_booking_extend"/></div>
					<div class="clear5"></div>
				
					<div class="chk_avail_emailquote"><img border="0" oldsrc="'.$emailquote.'" srcover="'.$emailquote_ho.'" src="'.$emailquote.'" style="box-shadow:none;border:none;border-radius:none;" onclick="validatebookingfrm()"/></div>
					
					<div class="chk_avail_availbtn"><img border="0" oldsrc="'.$checkavailbtn.'" srcover="'.$checkavailbtn_ho.'" src="'.$checkavailbtn.'" style="box-shadow:none;border:none;border-radius:none;" onclick="validatebookingfrm()"/></div>						
					
					<input type="hidden" name="CarSizeID" size="5" value="'.$carid.'" />
					<input type="hidden" name="refkey" size="5" value="'.$refkey.'" />
					<input type="hidden" name="isureid" id="isureid" size="15" value="737" />
					
					<input type="hidden" name="imgsrc" size="5" value="'.$imgsrc.'" />
					<input type="hidden" name="vehicle_type" value="'.$catdesc.'"/>
					<input type="hidden" name="pickuplocation" size="5" value="'.$from.'" />
					<input type="hidden" name="dropofflocation" size="5" value="'.$to.'" />
					<input type="hidden" name="pickupdate" size="15" value="'.date("d/M/Y",strtotime($_GET["PickDate"])).'" />
					<input type="hidden" name="dropoffdate" size="15" value="'.date("d/M/Y",strtotime($_GET["DropoffDate"])).'" />
					<input type="hidden" name="rateperday" size="15" value="'.$rateperday.'" />
					<input type="hidden" name="subtotal" size="15" value="'.number_format($subtotal,2,'.','').'" />
					<input type="hidden" name="TotalRentalDays" size="15" value="'.$numofday.'" />
					<input type="hidden" name="oneway" size="15" value="'.number_format($extrafees,2,'.','').'" />
					<input type="hidden" name="insurance" size="15" id="pinsurance" value="'.number_format($insurance,2,'.','').'" />
					<input type="hidden" name="totalcost" size="15" id="ptotalcost" value="'.number_format(($subtotal + $insurance + $extrafees),2,'.','').'" />
					</div>
				</form>
				<div class="clear"></div>
				</div>
			</div>';
		$output .='<div align="left"><a onclick="javascript:history.back(-1)" href="javascript:void(0)" style="font-size:13px;color:#000;font-weight:bold;text-decoration:underline;">'.$myoptions["back"].'</a></div>
										<div class="clear"></div>';	
			}		
	}	
	elseif($_GET["action"] == 'email')
	{
		
		
		 if($_POST["action"] == 'sent')
		{
			$searchout='';
			$url='http://secure.rentalcarmanager.com.au/ClientWebMobileAPI/RCMClientAPI.asmx/PopulateWebBookingTotal?RCMReferenceKey='.urlencode($_POST["refkey"]);
			$populatetotal=file_get_contents($url);
			
			$url='http://secure.rentalcarmanager.com.au/ClientWebMobileAPI/RCMClientAPI.asmx/confirmBookingTotal?CustomerEmailID='.urlencode($_POST["CustomerEmail"]).'&RCMReferenceKey='.urlencode($_POST["refkey"]);
			$confirmBookingTotal=file_get_contents($url);
		
		$url='http://secure.rentalcarmanager.com.au/ClientWebMobileAPI/RCMClientAPI.asmx/confirmVehicleSelection?CarID='.$_POST["CarSizeID"].'&RCMReferenceKey='.urlencode($_POST["refkey"]);	
		
			$articles = file_get_contents($url);
			$dom = new DOMDocument();
			$dom->loadXML($articles);
			$dom->preserveWhiteSpace = false;
			$elements = $dom->documentElement;
			$error=$elements->getElementsByTagName("Error");
			
			if( trim($error->item(0)->nodeValue)!="")
			{
				$output .='<div class="error">'.$error->item(0)->nodeValue.'</div>';				
			}
			else
			{
					$url='http://secure.rentalcarmanager.com.au/ClientWebMobileAPI/RCMClientAPI.asmx/requestCustomerCountryDetails?RCMReferenceKey='.urlencode($_POST["refkey"]);
			$requestCustomerCountryDetails=file_get_contents($url);
			
				$url='http://secure.rentalcarmanager.com.au/ClientWebMobileAPI/RCMClientAPI.asmx/requestRentalSource?RCMReferenceKey='.urlencode($_POST["refkey"]);
			$requestRentalSource=file_get_contents($url);
					
					$url='http://secure.rentalcarmanager.com.au/ClientWebMobileAPI/RCMClientAPI.asmx/confirmVehicleBookingQuote?CustomerFirstName='.urlencode($_POST["firstname"]).'&CustomerLastName='.urlencode($_POST["lastname"]).'&PrimaryDriverDOB=&PrimaryDriverLicenseNo=&LicenseIssuedCountryID=7&LicenseExpiryDate=&Address=&City=&StateProvince=&PostalCode=&CountryID=7&CustomerEmailID='.urlencode($_POST["CustomerEmail"]).'&CustomerPhone=9999&ArrivalFlight=&PickUpRequiredFrom=&DropOffRequiredTo=&NoOfTravelling=&CarTransmissionPreferenceID=&RentalSourceID='.$_POST["PickupLocationID"].'&AdditionalDetails='.urlencode($_POST["Notes"]).'&CreditCardTypeID=&CreditCardNumber=&CCV=&NameOnCreditCard=&CreditCardExpiryDate=&RCMReferenceKey='.urlencode($_POST["refkey"]).'&BookingType=quote';
					$articles = file_get_contents($url);
					$dom = new DOMDocument();
					$dom->loadXML($articles);
					$dom->preserveWhiteSpace = false;
					$elements = $dom->documentElement;
					$error=$elements->getElementsByTagName("Error");
					if( trim($error->item(0)->nodeValue)!="")
					{
						$output .='<div class="error">'.$error->item(0)->nodeValue.'</div>';				
					}
					else
					{
						
						$quote=$elements->getElementsByTagName("ReferenceNo");$refquote=$quote->item(0)->nodeValue;
						$ReservationNo=$elements->getElementsByTagName("ReservationNo");$refkey=$ReservationNo->item(0)->nodeValue;
						$output .=$sucess_msg;
						$subject='Online Quotation with Travelwheels - Ref #'.$quote->item(0)->nodeValue.'(Sydney)';
						
						$message ='';	
						$hr=get_option("rentalcar_timediff",true);
						$today=date("d/M/Y",strtotime("+".$hr." hours"));$customer_email=$_POST["CustomerEmail"];
						$customer_name=$_POST["firstname"].'&nbsp;'.$_POST["lastname"];
						
						if($_POST["totalcost"]!=""){$totalcost=$_POST["totalcost"];}else{$totalcost='';}
						
						$findtag=array("[refquote]","[refkey]","[today]","[customer_name]","[customer_email]","[vehicle_type]","[imgsrc]","[pickuplocation]","[pickupdate]","[dropofflocation]","[dropoffdate]","[totalrentaldays]","[rateperday]","[subtotal]","[insurance]","[oneway]","[totalcost]","[sitetitle]","[siteurl]");
						$replacetag=array($refquote,$refkey,$today,$customer_name,$customer_email,$_POST["vehicle_type"],$_POST["imgsrc"],$_POST["pickuplocation"],$_POST["pickupdate"],$_POST["dropofflocation"],$_POST["dropoffdate"],$_POST["TotalRentalDays"],$_POST["rateperday"],$_POST["subtotal"],'','',$_POST["subtotal"],get_bloginfo("name"),get_bloginfo("url"));
						$message .=str_replace($findtag,$replacetag,$emailquote_template_msg);	
						
						if(get_option("rental_emails_from",true)!=""){$headers[] = 'From: '.get_option("rental_emails_from",true).''."\r\n";
						}else{
							$headers[] = 'From: Webmaster <'.get_bloginfo('admin_email').'>'."\r\n";
						}
						if(get_option("rental_emails_to",true)!=""){
							$bccarr=explode(",",get_option("rental_emails_to",true));
							foreach($bccarr as $val){
								if($val!=""){
									$headers[] = 'Bcc: '.$val.''."\r\n";
								}
							}
						}	
						
						add_filter( 'wp_mail_content_type', 'set_html_content_type' );
						wp_mail($_POST["CustomerEmail"],$subject,$message,$headers);	
						remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
					
					}
				
			}			
		}
		else
		{	
			$output=$searchout;
		$url='http://secure.rentalcarmanager.com.au/ClientWebMobileAPI/RCMClientAPI.asmx/requestVehicleAvailability?PickupLocation='.urlencode($_GET["PickupLocationID"]).'&PickupDate='.urlencode($_GET["PickDate"]).'&PickupTime=12:00&DropOffLocation='.urlencode($_GET["DLocationID"]).'&DropOffDate='.urlencode($_GET["DropoffDate"]).'&DropOffTime=12:00&DriverAge=30&CategoryTypeID='.$CategoryTypeID.'&SecureKey='.urlencode($securekey).'&PromoCode='.urlencode($_GET["promo"]);	
		
			$articles = file_get_contents($url);
			$dom = new DOMDocument();
			$dom->loadXML($articles);
			$dom->preserveWhiteSpace = false;
			$elements = $dom->documentElement;
			$error=$elements->getElementsByTagName("Error");			
			if( trim($error->item(0)->nodeValue)!="")
			{
				$output .='<div class="error">'.$error->item(0)->nodeValue.'</div>';				
			}
			else
			{
				$numofday=(date("z",strtotime($_GET["DropoffDate"])-strtotime($_GET["PickDate"]))+1);
				$items=$elements->getElementsByTagName("VehicleEachSeason");
				
				$pickup=date("d F Y",strtotime($_GET["PickDate"])).' from '.$from;
				$dropoff=date("d F Y",strtotime($_GET["DropoffDate"])).' at '.$to;	
				
				$refid=$elements->getElementsByTagName("ReferenceKey");
				$refkey=$refid->item(0)->nodeValue;
				
				for ($i = 0; $i < $items->length; $i++) {
					$id=$items->item($i)->getElementsByTagName("CarID")->item(0)->nodeValue;	
					if($id == $_GET["CarSizeID"])
					{
						$carid=$id;
						$TotalCost=$items->item($i)->getElementsByTagName("TotalCost")->item(0)->nodeValue;
						
						$rateperday=number_format(($TotalCost / $numofday),'2','.','');
						
						$imgsrc=$items->item($i)->getElementsByTagName("CarImageMobile")->item(0)->nodeValue;
						$catdesc=$items->item($i)->getElementsByTagName("CategoryDesc")->item(0)->nodeValue;
						$desc=$items->item($i)->getElementsByTagName("VehicleDesc")->item(0)->nodeValue;
						$descurl=$items->item($i)->getElementsByTagName("VehicleDescURL")->item(0)->nodeValue;
					}
				}
				$subtotal=$numofday * $rateperday;
				
			$output .=' <script language="Javascript">function openMoreInfo() { window.open("'.plugins_url('insurance_details.php',__FILE__).'", "WindowMore", "width=970,height=440,scrollbars=yes");}function validatequote(){
	if(document.getElementById("firstname").value == "")
	{
		alert("Please enter your first name");
		document.getElementById("firstname").focus();
		return false;
	}
	if(document.getElementById("lastname").value == "")
	{
		alert("Please enter your lastname");
		document.getElementById("lastname").focus();
		return false;
	}
	 if(document.getElementById("CustomerEmail").value == "")
	{
		alert("Please enter your Email address");
		document.getElementById("CustomerEmail").focus();
		return false;
	}
	 var emailRegEx = /^[a-zA-Z0-9._-]*\@[a-zA-Z0-9._-]*$/;
      if(!emailRegEx.test(document.getElementById("CustomerEmail").value))
      {
         alert("Invalid Email address");
         return false;
      }
	document.getElementById("Rate").submit();}</script>
		<style>'.get_option('rental_searchform_css').'</style>
			<div class="bookingwrap clearfix">
		<form id="Rate" name="Rate" action="" method="post">
			<div class="bookingh1">'.$myoptions["bookingsummary"].'</div>
				<div class="restdiv">
					<div class="booking_chkoutleft">											
						<a onclick="openMoreInfo('.$carid.');" href="#"><img src="'.$imgsrc.'" border="0"/></a>											
					</div>
					<div class="booking_checkout_center">
						<div class="lvl">'.$myoptions["vehicletype"].':</div>
						<div class="lvl_val">'.$catdesc.'</div>
						<div class="clear5"></div>
						
						<div class="lvl">'.$myoptions["pickup"].':</div>
						<div class="lvl_val">'.$pickup.'</div>
						<div class="clear5"></div>
						
						<div class="lvl">'.$myoptions["dropoff"].':</div>
						<div class="lvl_val">'.$dropoff.'</div>
						<div class="clear5"></div>
						
						<div class="lvl">'.$myoptions["dailyrate"].':</div>
						<div class="lvl_val">$'.$rateperday.'&nbsp;/&nbsp;day&nbsp;(total '.$numofday.' days)</div>
						<div class="clear5"></div>
						
						<div class="lvl">'.$myoptions["subtotal"].':</div>
						<div class="lvl_val">AUD $'.$subtotal.'</div>
						<div class="clear5"></div>
						<div style="padding: 0px; margin: 0px; font-size: 11px; line-height: 1.4em;">'.$myoptions["subtotal_notes"].'</div>						
					</div>
					<div class="clear5"></div>	
					<div style="width:90%;margin:0 auto">
						<div class="lvl underline">'.$myoptions["bookingfname"].':</div>
                    	<div class="lvl_val underline">
							<input type="text" class="customerfield" maxlength="30" name="firstname" id="firstname"/>
                  		</div>
						<div class="clear5"></div>
                  		<div class="lvl underline">'.$myoptions["bookinglname"].':</div>
                    	<div class="lvl_val underline">
							<input type="text" class="customerfield" maxlength="30" name="lastname" id="lastname"/>
                  		</div>
						<div class="clear5"></div>
                  		<div class="lvl underline">'.$myoptions["bookingemail"].':</div>
                    	<div class="lvl_val underline">
							<input type="text" class="customerfield" maxlength="50" name="CustomerEmail" id="CustomerEmail"/>
                    	</div>
						<div class="clear5"></div>
						<div class="lvl_val_email">                    
							<input type="hidden" name="CarSizeID" value="'.$_GET["CarSizeID"].'"/>
							<input type="hidden" name="refkey" size="5" value="'.$refkey.'" />
							
							<input type="hidden" name="imgsrc" size="5" value="'.$imgsrc.'" />
							<input type="hidden" name="vehicle_type" value="'.$catdesc.'"/>
							<input type="hidden" name="pickuplocation" size="5" value="'.$from.'" />
							<input type="hidden" name="dropofflocation" size="5" value="'.$to.'" />
							<input type="hidden" name="pickupdate" size="15" value="'.date("d/M/Y",strtotime($_GET["PickDate"])).'" />
							<input type="hidden" name="dropoffdate" size="15" value="'.date("d/M/Y",strtotime($_GET["DropoffDate"])).'" />
							<input type="hidden" name="rateperday" size="15" value="'.$rateperday.'" />
							<input type="hidden" name="subtotal" size="15" value="'.number_format($subtotal,2,'.','').'" />
							<input type="hidden" name="TotalRentalDays" size="15" value="'.$numofday.'" />
							
							<input type="hidden" name="pickup" value="'.$pickup.'"/>
							<input type="hidden" name="dropoff" value="'.$dropoff.'"/>
							<input type="hidden" name="action" value="sent"/>
						<img border="0" oldsrc="'.$emailquote.'" srcover="'.$emailquote_ho.'" src="'.$emailquote.'" class="emailqu" onclick="validatequote();"/>
						</div>
						<div class="clear5"></div>
                  		<div class="lvl" style="width:100%;">'.$myoptions["addition_details"].':</div>
                    	<div class="lvl_val" style="width:100%">
							<textarea name="Notes" class="emailqu_textarea"></textarea>
                    	</div>
					</div>			
					<div class="clear5"></div>
				</div>
				<div class="clear5"></div>
				<div align="left"><a onclick="javascript:history.back(-1)" href="javascript:void(0)" style="font-size:13px;color:#000;font-weight:bold;text-decoration:underline;">'.$myoptions["back"].'</a></div>			
				</form>
		</div>
		';
			}
		}
	}
	elseif($_GET["action"] == 'step2')
	{	
		$output=$searchout;
		
		$output .='<script>function openMoreInfo(id) {window.open("'.plugins_url('moreinfo.php',__FILE__).'?v=" + id, "WindowMore", "width=970,height=440,scrollbars=yes");}</script>';
		
		$pickupdatearr=explode("/",$_GET["PickupDate"]);
		$pickupdate=$pickupdatearr[1].'/'.$pickupdatearr[0].'/'.$pickupdatearr[2];
		$dropoffdatearr=explode("/",$_GET["DropOffDate"]);
		$dropoffdate=$dropoffdatearr[1].'/'.$dropoffdatearr[0].'/'.$dropoffdatearr[2];
		
		$url='http://secure.rentalcarmanager.com.au/ClientWebMobileAPI/RCMClientAPI.asmx/requestVehicleAvailability?PickupLocation='.urlencode($_GET["PickupLocation"]).'&PickupDate='.urlencode($pickupdate).'&PickupTime=12:00&DropOffLocation='.urlencode($_GET["DropOffLocation"]).'&DropOffDate='.urlencode($dropoffdate).'&DropOffTime=12:00&DriverAge=30&CategoryTypeID='.$CategoryTypeID.'&SecureKey='.urlencode($securekey).'&PromoCode='.urlencode($_GET["PromoCode"]);	
		
			$articles = file_get_contents($url);
			$dom = new DOMDocument();
			$dom->loadXML($articles);
			$dom->preserveWhiteSpace = false;
			$elements = $dom->documentElement;
			$error=$elements->getElementsByTagName("Error");			
			if( trim($error->item(0)->nodeValue)!="")
			{
				$output .='<div class="error">'.$error->item(0)->nodeValue.'</div>';				
			}
			else
			{
				$items=$elements->getElementsByTagName("VehicleEachSeason");
				for ($i = 0; $i < $items->length; $i++) {
					$carid=$items->item($i)->getElementsByTagName("CarID")->item(0)->nodeValue;
					
					$imgsrc=$items->item($i)->getElementsByTagName("CarImageMobile")->item(0)->nodeValue;
					$catdesc=$items->item($i)->getElementsByTagName("CategoryDesc")->item(0)->nodeValue;
					$desc=$items->item($i)->getElementsByTagName("VehicleDesc")->item(0)->nodeValue;
					$descurl=$items->item($i)->getElementsByTagName("VehicleDescURL")->item(0)->nodeValue;
					
					$pickup=date("d F Y",strtotime($pickupdate)).' from '.$from;
					$dropoff=date("d F Y",strtotime($dropoffdate)).' at '.$to;				
					$numofday=(date("z",strtotime($dropoffdate)-strtotime($pickupdate))+1);
					
					$TotalCost=$items->item($i)->getElementsByTagName("TotalCost")->item(0)->nodeValue;
					$rateperday=number_format(($TotalCost / $numofday),'2','.','');
					
					$price='<br/><strong>AUD $'.$rateperday.'</strong>';					
					
					$output .='<div class="bookingwrap clearfix">
									<div class="bookingh1">'.$catdesc.'</div>
									<div class="restdiv">
										<div class="bookingleft"><img src="'.$imgsrc.'" border="0"/>
											<div class="clear"></div>
											<a onclick="openMoreInfo('.$carid.');" href="#" style="font-size: 13px;">'.$myoptions["clickinfo"].'</a>
										</div>
										<div class="bookingcentre">
												<div class="desc">'.$desc.'</div>
												<div class="emailme">
												<a href="'.get_permalink().'?CarSizeID='.$carid.'&PickupLocationID='.$_GET["PickupLocation"].'&DLocationID='.$_GET["DropOffLocation"].'&PickDate='.$pickupdate.'&DropoffDate='.$dropoffdate.'&promo='.urlencode($_GET["PromoCode"]).'&action=email"><img border="0" oldsrc="'.$emailquote.'" srcover="'.$emailquote_ho.'" src="'.$emailquote.'" style="box-shadow:none;border:none;border-radius:none;"/></a></div>
										</div>
										<div class="bookingright">
											<div class="TotalCost">
												<div class="price">
													<strong>'.$price.'</strong><div class="dailyrate_small">'.$myoptions["avgrate"].'</div>
												</div>												
													<a href="'.get_permalink().'?CarSizeID='.$carid.'&PickupLocationID='.$_GET["PickupLocation"].'&DLocationID='.$_GET["DropOffLocation"].'&PickDate='.$pickupdate.'&DropoffDate='.$dropoffdate.'&promo='.urlencode($_GET["PromoCode"]).'&action=detail"><img border="0" oldsrc="'.$continuebtn.'" srcover="'.$continuebtn_ho.'" src="'.$continuebtn.'" style="box-shadow:none;border:none;border-radius:none;"/></a>
											</div>
										</div>										
										<div class="clear"></div>										
									</div>									
								</div>';	
				}
				$output .='<div align="left"><a onclick="javascript:history.back(-1)" href="javascript:void(0)" style="font-size:13px;color:#000;font-weight:bold;text-decoration:underline;">'.$myoptions["back"].'</a></div>
										<div class="clear"></div>';
			}		
	}
	else
	{		
		$output=$searchout;	
	}
	return $output;
}

function rentalcarmanagementsearch($attr)
{
	$searchout='';global $myoptions;
	if(is_array($attr)){
		if($attr["lang"] !=""){$lang=$attr["lang"];}else{$lang='en';}
	}
	else
	{
		$lang='en';
	}
	$myoptions=get_option('rental_option_'.$lang);
	$lang_res['rental_headerimgurl']=plugins_url('/upload/'.$myoptions["header_img"], __FILE__);
	
	$locationarray=array('Sydney'=>1,'Adelaide'=>28,'Brisbane'=>33,'Cairns'=>36,'Darwin'=>12,'Melbourne'=>4,'Perth'=>9);
	$pickuplocationarr='';$dropofflocationarr='';$from='';$to='';
	foreach($locationarray as $k => $v)
	{
		if($_GET["PickupLocation"] == $v or $_GET["PickupLocationID"] == $v)
		{
			$pickuplocationarr .='<option selected value="'.$v.'">'.$k.'</option>';
			$from=$k;
		}
		else{
			$pickuplocationarr .='<option value="'.$v.'">'.$k.'</option>';
		}	
		
		if($_GET["DropOffLocation"] == $v or $_GET["DLocationID"] == $v)
		{
			$dropofflocationarr .='<option selected value="'.$v.'">'.$k.'</option>';
			$to=$k;
		}
		else{
			$dropofflocationarr .='<option value="'.$v.'">'.$k.'</option>';
		}	
		
	}	
	/*start search section */
	if($_GET["PickupDate"]!=""){ $PickupDate=$_GET["PickupDate"];}else {$PickupDate=date("d/m/Y",strtotime("+2 day"));}
	if($_GET["DropOffDate"]!=""){ $DropOffDate=$_GET["DropOffDate"];}else {$DropOffDate=date("d/m/Y",strtotime("+14 day"));}
	if($_GET["PromoCode"]!=""){$PromoCode=$_GET["PromoCode"];}
	
	if(get_option('rental_searchform_bg_stat') == 'enabled')
	{
		$backstyle='background-image:url('.plugins_url('/upload/'.get_option( 'rental_searchform_bg_img') , __FILE__ ).');';
	}
	if($lang_res['rental_headerimgurl']!=""){
		$headertxt= '<img src="'.$lang_res['rental_headerimgurl'].'" border="0" onclick="searchtoggle()"/>';
	} else {
		$headertxt= '<h1 onclick="searchtoggle()">Enter Your Travel Details</h1>'; } 
		
	$searchout .='<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" />
          <link type="text/css" rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
          <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
          <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
		   <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/i18n/jquery-ui-i18n.min.js"></script>	
          <script src="'.plugins_url('jquery.selectBoxIt.js', __FILE__).'"></script> 
		  <style>'.get_option('rental_searchform_css').'
			.ui-datepicker .ui-datepicker-header {background:none repeat scroll 0 0 #026CD6;color:#FFFFFF}
			.rentalcar_widget_div ul li{background:none;padding:5px;margin:0;}
			.tabsidebar .ui-widget-content{	border:none;}
			.ui-tabs .ui-tabs-panel{padding:0;}
			.content_left .ui-tabs{padding:0;}
			.clear5{clear:both;height:10px;}
			#custom_toggle_a{background-position:-80px top !important;background-image:url(http://static.olark.com/themes/azul/buttons-light.png);background-position:0 top;background-repeat:no-repeat !important;border-radius:5px !important;cursor:pointer !important;float:right;height:16px;line-height:1000;margin-right:10px;margin-top:5px;overflow:hidden;padding:0;width:16px;
}
#custom_toggle_a:hover{background-color:#333;}
            </style>
 <script>
function openMoreInfo(id) {
 window.open("'.plugins_url('moreinfo.php',__FILE__).'?v=" + id, "WindowMore", "width=970,height=440,scrollbars=yes");
}

jQuery( document ).ready(function($) {		
		';
		if($lang == 'en') { $searchout .= 'jQuery.datepicker.setDefaults( jQuery.datepicker.regional[""] );';}
		else if($lang == 'ge') { $searchout .= '$.datepicker.setDefaults( $.datepicker.regional[ "de" ] );';}
		else if($lang == 'fr') { $searchout .= '$.datepicker.setDefaults( $.datepicker.regional[ "fr" ] );';}
		else if($lang == 'du') { $searchout .= '$.datepicker.setDefaults( $.datepicker.regional[ "nl" ] );';}
		else { $searchout.='$.datepicker.setDefaults( $.datepicker.regional[ "" ] );';}  
$searchout .='jQuery("#PickupLocation,#DropOffLocation").selectBoxIt({theme: "jquerymobile"});
$("#PickupDate").datepicker({numberOfMonths: 3,dateFormat: "dd/mm/yy",defaultDate: +2});
$("#DropOffDate").datepicker({ numberOfMonths: 3,defaultDate: +16,dateFormat: "dd/mm/yy"});
});
var j = jQuery.noConflict();
function searchtoggle()
{	
	if(j(".rentalcar_form_div").css("display") == "none"){
		j(".rentalcar_form_div").show("slow");
		j("#toggle_custom_div").html(\''.$headertxt.'<a id="custom_toggle_a" onclick="searchtoggle()">^</a>\');
		j("#toggle_custom_div").css("border-radius","6px 6px 0 0");
	}
	else
	{
		j(".rentalcar_form_div").hide("slow");
		j("#toggle_custom_div").css("border-radius","6px");
		j("#toggle_custom_div").html(\'<a style="color:#fff;font-size:15px;text-decoration:underline;" onclick="searchtoggle()">Click Here to Change Search Cities & Dates</a><a id="custom_toggle_a" style="background-position:-96px top !important" onclick="searchtoggle()">^</a>\');		
	}
		
}
</script>
<div id="rentalcar_form_section">';
if($_GET["action"] == 'step2'){
	$searchout .='<div id="toggle_custom_div" style="'.$backstyle.'background-color:'.get_option('rental_searchform_bg_color').';border:2px solid '.get_option('rental_searchform_bg_color').';border-radius:6px;text-align:center;padding:5px;"><a style="text-decoration:underline;color:#fff;font-size:15px;" onclick="searchtoggle()">'.$myoptions["acrodian"].'</a><a id="custom_toggle_a" style="background-position:-96px top !important" onclick="searchtoggle()">^</a></div>
	<div class="rentalcar_form_div" data-role="content" style="'.$backstyle.'display:none;background-color:'.get_option('rental_searchform_bg_color').';border-right:2px solid '.get_option('rental_searchform_bg_color').';border-left:2px solid '.get_option('rental_searchform_bg_color').';border-bottom:2px solid '.get_option('rental_searchform_bg_color').';border-radius:0 0 6px 6px">   
<form method="GET" action="'.get_permalink().'" id="rentalcar">';
}
else
{
$searchout .='<div id="toggle_custom_div" style="'.$backstyle.'background-color:'.get_option('rental_searchform_bg_color').';border-top:2px solid '.get_option('rental_searchform_bg_color').';border-right:2px solid '.get_option('rental_searchform_bg_color').';border-left:2px solid '.get_option('rental_searchform_bg_color').';border-radius:6px 6px 0 0;text-align:center;padding:5px;">'.$headertxt.'<a id="custom_toggle_a" onclick="searchtoggle()">^</a></div><div class="rentalcar_form_div" data-role="content" style="'.$backstyle.'background-color:'.get_option('rental_searchform_bg_color').';border-right:2px solid '.get_option('rental_searchform_bg_color').';border-left:2px solid '.get_option('rental_searchform_bg_color').';border-bottom:2px solid '.get_option('rental_searchform_bg_color').';border-radius:0 0 6px 6px">   
<form method="GET" action="'.get_permalink().'" id="rentalcar">';
}
	
	$searchout .='<div style="clear:both"></div>                          
            	<div class="custom_div_left"> 
					<label>'.$myoptions["pickuplocation"].'</label>
					<select id="PickupLocation" name="PickupLocation">'.$pickuplocationarr.'</select>
				</div>
				<div class="custom_div_right">
					<label>'.$myoptions["pickupdate"].'</label>
					<div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset ui-shadow ui-btn-up-c">
					<input type="text" name="PickupDate" size="30" id="PickupDate" value="'.$PickupDate.'" data-theme="a" />
					</div>
				</div>
				<div class="clear5"></div>				
			<div class="custom_div_left">
				<label>'.$myoptions["dropofflocation"].'</label>
				<select id="DropOffLocation" name="DropOffLocation">'.$dropofflocationarr.'</select>
			</div>
			<div class="custom_div_right">
				<label>'.$myoptions["dropoffdate"].'</label><div class="clear2"></div>
				<div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset ui-shadow ui-btn-up-c"> <input type="text" name="DropOffDate" size="30" id="DropOffDate" value="'.$DropOffDate.'" data-theme="a" /></div>	
			</div>
			<div class="clear5"></div>	
			<div class="custom_div_left">
					<label>'.$myoptions["promocode"].'</label>
					<div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset ui-shadow ui-btn-up-c"><input type="text" id="PromoCode" name="PromoCode" size="30" value="'.$PromoCode.'" data-theme="a" /></div>
				</div>
			<div class="custom_div_right" style="margin-top:20px;">
				<input type="hidden" name="action" value="step2"/>
				<img border="0" oldsrc="'.plugins_url('/upload/'.$myoptions['searchbtn'], __FILE__).'" srcover="'.plugins_url('/upload/'.$myoptions['searchbtn_ho'], __FILE__).'" src="'.plugins_url('/upload/'.$myoptions['searchbtn'], __FILE__).'" onclick="document.getElementById(\'rentalcar\').submit()"/>
			</div>
			<div style="clear:both"></div>			
	 </form>
	 </div>
	 </div>
	 <div class="clear5"></div>';
	 /*end search section*/	
	 
	 return $searchout;
}
?>