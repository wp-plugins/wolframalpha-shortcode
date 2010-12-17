<?php
/*
 Plugin Name: Wolfram|Alpha Widget Shortcode
 Plugin URI: http://developer.wolframalpha.com/widgets
 Description: Embed live, interactive computational knowledge into your WordPress site with the Wolfram|Alpha Widget shortcode plugin.
 Author: Wolfram|Alpha
 Author URI: http://developer.wolframalpha.com
 Version: 1.0
 Usage: [wolframalphawidget id="widgetid"]
*/

function wolframalphawidget_func($atts,$content) {
  extract(shortcode_atts(array(
	'id' => ''
  ), $atts));

  //sanitize id
  $id = preg_replace('/[^\w]+/', '', $id);
  
  //validate id
  if ( strlen($id) < 30 || strlen($id) > 32 ){
    return '<!-- invalid Wolfram|Alpha widget id -->';
  }
  
  //escape id
  $id = esc_attr($id);

  return "<script type=\"text/javascript\" id=\"WolframAlphaScript${id}\" src=\"http://www.wolframalpha.com/widget/widget.jsp?id={$id}\"></script>";
}

add_shortcode('wolframalphawidget', 'wolframalphawidget_func');

?>