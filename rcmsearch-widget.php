<?php
/**
 * rcm search widget
 *
 * @since 1.1
 */
class Rcmsearch_Widget extends WP_Widget {
	
	function __construct() {
		$widget_ops = array('classname' => 'Rcmsearch_Widget', 'description' => __('RCM Search Widget'));
		$control_ops = array('width' => 400, 'height' => 350);		
		parent::__construct('Rcmsearch_Widget', __('RCM Search Widget'), $widget_ops, $control_ops);
	}
	function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['customsize'] = ( ! empty( $new_instance['customsize'] ) ) ? strip_tags( $new_instance['customsize'] ) : '';
		$instance['checksize'] = ( ! empty( $new_instance['checksize'] ) ) ? strip_tags( $new_instance['checksize'] ) : 'autowh';
		$instance['setlang'] = ( ! empty( $new_instance['setlang'] ) ) ? strip_tags( $new_instance['setlang'] ) : 'en';	
		$instance['enabledpromo'] = ( ! empty( $new_instance['enabledpromo'] ) ) ? strip_tags( $new_instance['enabledpromo'] ) : 'yes';	
		$instance['resultpage'] = ( ! empty( $new_instance['resultpage'] ) ) ? strip_tags( $new_instance['resultpage'] ) : '';	
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'setlang' => 'en', 'enabledpromo' => 'yes','checksize' =>'autowh','customsize'=>'' ) );
?>
		<p>Set Result Page &nbsp;&nbsp;<select name="<?php echo $this->get_field_name('resultpage'); ?>">
        <option value=""><?php echo esc_attr( __( 'Select page' ) ); ?></option> 
 <?php 
  $pages = get_pages(); 
  foreach ( $pages as $page ) {
	  if($instance['resultpage'] == $page->ID){
  		$option = '<option selected value="' . $page->ID  . '">';
	  } else {
		  $option = '<option value="' . $page->ID  . '">';
	  }
	$option .= $page->post_title;
	$option .= '</option>';
	echo $option;
  }
 ?>
        </select><br/>
        <span style="font-style:italic">Notes:You need to put shortcode on selected page to work search result page</span>
        </p>
		<p>Set Language &nbsp;&nbsp;<select name="<?php echo $this->get_field_name('setlang'); ?>">
        	<option value="en" <?php if($instance['setlang'] == 'en'){ echo 'selected';}?>>English</option>
            <option value="da" <?php if($instance['setlang'] == 'da'){ echo 'selected';}?>>German</option>
            <option value="fr" <?php if($instance['setlang'] == 'fr'){ echo 'selected';}?>>France</option>
             <option value="du" <?php if($instance['setlang'] == 'du'){ echo 'selected';}?>>Netherland</option>
        </select>
        </p>	
        <p>Promocode&nbsp;<input type="radio" name="<?php echo $this->get_field_name('enabledpromo'); ?>"  value="yes" <?php if($instance['enabledpromo'] == 'yes'){ echo 'checked';}?>/>&nbsp;Enabled&nbsp;<input type="radio" name="<?php echo $this->get_field_name('enabledpromo'); ?>" value="no" <?php if($instance['enabledpromo'] == 'no'){ echo 'checked';}?>/>&nbsp;Disabled</p>
         <p>Choose size<br/><input type="radio" name="<?php echo $this->get_field_name('checksize'); ?>"  value="onewaycampervans" <?php if($instance['checksize'] == 'onewaycampervans'){ echo 'checked';}?>/>&nbsp;218px width auto height<br/>
         <input type="radio" name="<?php echo $this->get_field_name('checksize'); ?>" value="autowh" <?php if($instance['checksize'] == 'autowh'){ echo 'checked';}?>/>&nbsp;auto width auto height<br/>
          <input type="radio" name="<?php echo $this->get_field_name('checksize'); ?>"  value="custom" <?php if($instance['checksize']=='custom'){ echo 'checked';}?>/>&nbsp;Custom width only&nbsp;<input type="text" name="<?php echo $this->get_field_name('customsize'); ?>" style="width:80px" value="<?php echo $instance['customsize'];?>"/>in pixel</p>
<?php
	}
	
	function widget( $args, $instance ) {
		extract($args);		
		echo $before_widget;
		$this->displayform($instance['setlang'],$instance["checksize"],$instance["customsize"],$instance["enabledpromo"],$instance['resultpage']);
        echo $after_widget;
        }	
	function displayform($lang,$chksize,$customwidth,$enabledpromo,$pageid)
	{
		
	$searchout='';global $myoptions;
	
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
		$headertxt= '<img src="'.$lang_res['rental_headerimgurl'].'" border="0"/>';
	} else {
		$headertxt= '<h1 onclick="searchtoggle()">Enter Your Travel Details</h1>'; } 
	
	if($chksize == 'onewaycampervans'){
		$obstyle='style="width:218px"';$obleft='style="width:100%"';$obright='style="width:100%"';		
	}
	elseif($chksize == 'autowh'){$obstyle='';$obleft='';$obright='';}
	elseif($chksize == 'custom'){
		if($customwidth!=""){
		$obstyle='style="width:'.$customwidth.'"';$obleft='style="width:100%"';$obright='style="width:100%"';
		} else {$obstyle='';$obleft='';$obright='';}		
	}	
	
	if($enabledpromo == "yes")
	{
		$promodiv='<div class="clear5"></div>	
			<div class="custom_div_left" '.$obleft.'> 
					<label>'.$myoptions["promocode"].'</label>
					<div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset ui-shadow ui-btn-up-c"><input type="text" id="PromoCode" name="PromoCode" value="'.$PromoCode.'" data-theme="a" /></div>
				</div>';
	} else {
		$promodiv='';
	}
	
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
            </style>
			<script>					
			jQuery( document ).ready(function($) {		
		';
		if($lang == 'en') { $searchout .= 'jQuery.datepicker.setDefaults( jQuery.datepicker.regional[""] );';}
		else if($lang == 'da') { $searchout .= '$.datepicker.setDefaults( $.datepicker.regional[ "da" ] );';}
		else if($lang == 'fr') { $searchout .= '$.datepicker.setDefaults( $.datepicker.regional[ "fr" ] );';}
		else if($lang == 'du') { $searchout .= '$.datepicker.setDefaults( $.datepicker.regional[ "nl" ] );';}
		else { $searchout.='$.datepicker.setDefaults( $.datepicker.regional[ "" ] );';}  
		$searchout .='jQuery("#PickupLocation,#DropOffLocation").selectBoxIt({theme: "jquerymobile"});
		$("#PickupDate").datepicker({numberOfMonths: 3,dateFormat: "dd/mm/yy",
						onSelect: function (dateText, inst) {
								var date = $(this).datepicker("getDate");
								var date1 = $(this).datepicker("getDate");
								if (date){
									date.setDate(date.getDate() + 12);
									$( "#DropOffDate" ).val($.datepicker.formatDate("dd/mm/yy",date));
									
									date1.setDate(date1.getDate() + 1);
									$( "#DropOffDate" ).datepicker( "option", "minDate", date1 );
								}
						}
									});
		$("#DropOffDate").datepicker({ numberOfMonths: 3,dateFormat: "dd/mm/yy"});
		});
		</script>
		<div id="rentalcar_form_section" '.$obstyle.'>';
		$searchout .='<div id="toggle_custom_div" style="'.$backstyle.'background-color:'.get_option('rental_searchform_bg_color').';border-top:2px solid '.get_option('rental_searchform_bg_color').';border-right:2px solid '.get_option('rental_searchform_bg_color').';border-left:2px solid '.get_option('rental_searchform_bg_color').';border-radius:6px 6px 0 0;text-align:center;padding:5px;">'.$headertxt.'</div><div class="rentalcar_form_div" data-role="content" style="'.$backstyle.'background-color:'.get_option('rental_searchform_bg_color').';border-right:2px solid '.get_option('rental_searchform_bg_color').';border-left:2px solid '.get_option('rental_searchform_bg_color').';border-bottom:2px solid '.get_option('rental_searchform_bg_color').';border-radius:0 0 6px 6px">   
		<form method="GET" action="'.get_page_link($pageid).'" id="rentalcar">';	
		$searchout .='<div style="clear:both"></div>                          
            	<div class="custom_div_left" '.$obleft.'> 
					<label>'.$myoptions["pickuplocation"].'</label>
					<select id="PickupLocation" name="PickupLocation">'.$pickuplocationarr.'</select>
				</div>
				<div class="custom_div_right" '.$obright.'>
					<label>'.$myoptions["pickupdate"].'</label>
					<div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset ui-shadow ui-btn-up-c">
					<input type="text" name="PickupDate" id="PickupDate" value="'.$PickupDate.'" data-theme="a" />
					</div>
				</div>
				<div class="clear5"></div>				
			<div class="custom_div_left" '.$obleft.'> 
				<label>'.$myoptions["dropofflocation"].'</label>
				<select id="DropOffLocation" name="DropOffLocation">'.$dropofflocationarr.'</select>
			</div>
			<div class="custom_div_right" '.$obright.'>
				<label>'.$myoptions["dropoffdate"].'</label><div class="clear2"></div>
				<div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset ui-shadow ui-btn-up-c"> <input type="text" name="DropOffDate" id="DropOffDate" value="'.$DropOffDate.'" data-theme="a" /></div>	
			</div>
			'.$promodiv.'
			<div  style="height:20px;clear:both;"></div>	
			<div class="custom_div_right" '.$obright.'>
				<input type="hidden" name="action" value="step2"/>
				<img border="0" oldsrc="'.plugins_url('/upload/'.$myoptions['searchbtn'], __FILE__).'" srcover="'.plugins_url('/upload/'.$myoptions['searchbtn_ho'], __FILE__).'" src="'.plugins_url('/upload/'.$myoptions['searchbtn'], __FILE__).'" onclick="document.getElementById(\'rentalcar\').submit()"/>
			</div>
			<div style="clear:both"></div>			
	 </form>
	 </div>
	 </div>
	 <div class="clear5"></div>';
	 /*end search section*/	
	 
	 echo $searchout;
	}
}
?>