<?php
/**
* Star Rating Helper
* 
* USAGE:
* 
* - Copy the src folder to your cake app directory
*
* - If you have not yet included jQuery in your app do that first 
*   You can download it at www.jquery.com
*   Then you have to include the js file in your view or layout
* 
* - Include the rating helper in your controller
*   var $helpers = array('Rating');
*  
* -  In your view you can use it like this:
*     echo $this->Rating->star('field_name', 'model_name', $data_array);
*     $data_array is a key->value pair
*     
*     e.g.:
*     echo $this->Rating->star('rating_id', 'Movie', $ratings);
*     
*     or with options: 
*     echo $this->Rating->star('rating_id', 'Movie', $ratings, array(
*       'label' => 'My rater',			// Individual label
*       'no_label' => false,			// No label will be created
*       'hover' => false,				// Hover function on or off 
*       'show_selection' => false, 		// Show the value of the selection
*       'selected_value' => 5,			// preset selected value
*       'read_only' => false,			// make rater read-only
*       'style' => margin-left: 3px;); 	// css style of the surrounding div element 	
* 
* 
* @author  Pierre Krohmer
* @website http://techblog.pierrekrohmer.de
* @version 1.0.2
*/
App::import('Helper', 'Form');
class RatingHelper extends AppHelper {
   	var $helpers = array('Form', 'Js', 'Html');
   
    /**
     * Setup the imports
     */
    function beforeRender(){
        // JS Files
        $this->Js->link('rating/jquery.rating', false);

		// CSS Theme
		echo $this->Html->css('jquery.rating', null, array('inline' => false));
    }
   
	/**
	 * Set the default values
	 * 
	 * @param String $fieldName
	 * @param String $model
	 * @param String $options helper options array
	 * @return array $options helper options array with merged default values
	 */
	private function _setDefaults($fieldName, $model, $options){
    	$label = explode("_", ucfirst($fieldName));
        $options_default['label'] = $label[0];
        $options_default['no_label'] = false;
        $options_default['hover'] = true;
        $options_default['show_selection'] = true;
        $options_default['read_only'] = false;
        $options_default['style'] = "";
        
        return array_merge($options_default, $options);;
    }

    /**
     * Creates the star rating
     * Options:
     * ['label'] => Label text (default: true)
     * ['hover'] => Specifies if the value will be shown on hover besides the rating (true|false, default: true)
     * ['show_selection'] => If true the value of the selected rating will be shown besides the rating (true|false, default: true)
     * 
     * @param String $fieldName
     * @param String $model
     * @param array('key' => 'value') $data
     * @param array $options helper options array
     * @return string output
     */
    function star($fieldName, $model, $data, $options = array()) {
        $options = $this->_setDefaults($fieldName, $model, $options);
        
        $checked = false;
        
        // check for post data
        if(isset($this->data[$model][$fieldName])){
        	$checked = $this->data[$model][$fieldName];
        }
        
    	// check for selected value
        if(isset($options['selected_value'])){
        	$checked = $options['selected_value'];
        }
        
        $uuid = $this->_getUUID($fieldName, $model);
        $output = "";
        if(!$options['no_label']){
        	$output = $this->_createLabel($fieldName, $model, $options['label']);
        }
		$element = "";
		foreach($data as $id => $value){
			if($checked == $id){
				$element .= $this->_createRadioButton($fieldName, $model, $id, $value, true, $options['read_only']);
			}else{
				$element .= $this->_createRadioButton($fieldName, $model, $id, $value, false, $options['read_only']);
			}
		}
		
		$element .= $this->_createHoverBox($uuid);
		//$element .= $this->Js->codeBlock($this->_createJS($options, $uuid));
		$element .= $this->Html->scriptBlock($this->_createJS($options, $uuid));
		// element div
		$output .= $this->Html->div('star-rating-element', $element);
		
		// complete div
		$output = $this->Html->div('input', $output, array(
			'id' => $uuid,
			'style' => $options['style'])
		);
		
        return $output;
    }
    
    private function _getUUID($fieldName, $model){
    	return "starRating_" . $model . "_" . $fieldName;
    }
    
    /**
     * Creates a radio button
     * 
     * @param String $fieldName
     * @param String $model
     * @param String $id
     * @param String $value
     * @param String $checked
     * @param String $disabled
     * @return String output
     */
    private function _createRadioButton($fieldName, $model, $id, $value, $checked = false, $disabled = false){
    	$checked = ($checked) ? 'checked="checked"' : "";
    	$disabled = ($disabled) ? 'disabled="disabled"' : "";

    	$output = String::insert(
    		'<input name="data[:model][:field_name]" type="radio" :checked title=":value" :disabled value=":id" class="hover-star"/>', array(
				'field_name' => $fieldName,
    			'model' => $model,
				'id' => $id,
    			'value' => $value,
    			'checked' => $checked,
    			'disabled' => $disabled
			));
			
		return $output;
    }
    

    /**
     * Creates the box element for the hover text
     * 
     * @param String $uuid
     * @return string output
     */
    private function _createHoverBox($uuid){
    	$output = '<span id="'.$uuid.'_selected" style="display:none"></span>';
    	$output .= '<span id="'.$uuid.'_hover-box" class="hover-box"></span>';
		return $output;		 
    }
    
    /**
     * Creates the nessaccary java script code
     * 
     * @param $options helper options array 
     * @param $uuid  
     * @return string
     */
    private function _createJS($options, $uuid){
    	$js = "";
    	$hover_box = $uuid."_hover-box";
    	$selected = $uuid."_selected";
    	if($options['hover']){
    		$js .= "
    			$('.hover-star').rating({
					focus: function(value, link){
						var tip = $('#".$hover_box."');
						tip[0].data = tip[0].data || tip.html();
						tip.html(link.title || 'value: '+value);
					},
					blur: function(value, link){
						var box = $('#".$hover_box."');
						var sel = $('#".$selected."');
						box.html(sel.html());
					}
				});
    		";
    	}
    	if($options['show_selection']){
    		$js .= "
    			$('.hover-star').rating({
					blur: function(value, link){
						var box = $('#".$hover_box."');
						var sel = $('#".$selected."');
						box.html(sel.html());
					}
				});
				$('#".$uuid." .hover-star').click(function() {
					$('#".$hover_box."').text('' + $(this).find('a').attr('title'));			 					
  					$('#".$selected."').text('' + $(this).find('a').attr('title'));
				});
				$('#".$uuid." .rating-cancel').click(function() {
					$('#".$hover_box."').text('');			 					
  					$('#".$selected."').text('');
				});
    		";
    	}

    	return $js;
    }
    
    /**
     * Creates a label
     * 
     * @param String $fieldName
     * @param String $model
     * @param String $label
     * @return String output
     */
    private function _createLabel($fieldName, $model, $label){
    	$output = String::insert(
    		'<label for="data[:model][:field_name]">:label</label>', array(
				'field_name' => $fieldName,
    			'model' => $model,
    			'label' => $label
			));
		return $output;
    }
}
?>