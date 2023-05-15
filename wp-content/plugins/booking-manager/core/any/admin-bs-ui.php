<?php /**
 * @version 1.1
 * @package Any
 * @category Toolbar. BS UI Elements for Admin Panel.
 * @author wpdevelop
 *
 * @web-site https://oplugins.com/
 * @email info@oplugins.com 
 * 
 * @modified 2015-11-14
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit, if accessed directly


////////////////////////////////////////////////////////////////////////////////
//  Single  elements      //////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

/** Show BS Button
 * 
 * @param array $item
                        array( 
                                'type' => 'button' 
                              , 'title' => ''                     // Title of the button
                              , 'hint' => ''                      // , 'hint' => array( 'title' => __('Select status' , 'booking-manager') , 'position' => 'bottom' )
                              , 'link' => 'javascript:void(0)'    // Direct link or skip  it
                              , 'action' => ''                    // Some JavaScript to execure, for example run  the function
                              , 'class' => 'button-secondary'     // button-secondary  | button-primary
                              , 'icon' => ''
                              , 'font_icon' => ''
                              , 'icon_position' => 'left'         // Position  of icon relative to Text: left | right
                              , 'style' => ''                     // Any CSS class here
                              , 'mobile_show_text' => false       // Show  or hide text,  when viewing on Mobile devices (small window size).
                              , 'attr' => array()
                        ); 
 */
function wpbm_bs_button( $item ) {
    
    $default_item_params = array( 
                                'type' => 'button' 
                              , 'title' => ''                     // Title of the button
                              , 'hint' => ''                      // , 'hint' => array( 'title' => __('Select status' , 'booking-manager') , 'position' => 'bottom' )
                              , 'link' => 'javascript:void(0)'    // Direct link or skip  it
                              , 'action' => ''                    // Some JavaScript to execure, for example run  the function
                              , 'class' => 'button-secondary'     // button-secondary  | button-primary
                              , 'icon' => ''
                              , 'font_icon' => ''
                              , 'icon_position' => 'left'         // Position  of icon relative to Text: left | right
                              , 'style' => ''                     // Any CSS class here
                              , 'mobile_show_text' => false       // Show  or hide text,  when viewing on Mobile devices (small window size).
                              , 'attr' => array()
                        ); 
    $item_params = wp_parse_args( $item, $default_item_params );

    ?><a  class="button <?php 
                              echo ( ! empty( $item_params['hint'] ) ) ? ' tooltip_' . $item_params['hint']['position'] . ' ' : '' ;  
                              echo $item_params['class']; 
              ?>" style="<?php echo $item_params['style']; ?>" 
              <?php if ( ! empty( $item_params['hint'] ) ) { ?>
                  title="<?php  echo esc_js( $item_params['hint']['title'] ); ?>"
              <?php } ?>                 
              href="<?php echo $item_params['link']; ?>"
          <?php if ( ! empty( $item_params['action'] ) ) { ?>
              onclick="javascript:<?php echo $item_params['action']; ?>"
          <?php } ?>  
          <?php echo wpbm_get_custom_attr( $item_params ); ?>        
        ><?php
              $btn_icon = '';
              if ( ! empty( $item_params['icon'] ) ) {                                

                  if ( substr( $item_params['icon'], 0, 4 ) != 'http') $img_path = WPBM_PLUGIN_URL . '/assets/img/' . $item_params['icon'];
                  else                                                 $img_path = $item_params['icon'];

                  $btn_icon = '<img class="menuicons" src="' . $img_path . '" />';    // Img  Icon

              } elseif ( ! empty( $item_params['font_icon'] ) ) {                     

                  $btn_icon = '<i class="menu_icon icon-1x ' . $item_params['font_icon'] . '"></i>';                         // Font Icon

              }  
              if (  ( ! empty( $btn_icon ) ) && ( $item_params['icon_position'] == 'left' )  )
                  echo $btn_icon . '&nbsp;';

              // Text
              echo '<span' . ( (  ( ! empty( $btn_icon ) )  && ( ! $item_params['mobile_show_text'] ) )? ' class="in-button-text"' : '' ) . '>';
              echo    $item_params['title'];                                             
              if (  ( ! empty( $btn_icon ) ) && ( $item_params['icon_position'] == 'right' )  )
                  echo '&nbsp;' ;
              echo '</span>';

              if (  ( ! empty( $btn_icon ) ) && ( $item_params['icon_position'] == 'right' )  )
                  echo   $btn_icon;                                  
    ?></a><?php    
}


/** Show BS text
 * 
 * @param array $item
                        array( 
                            'id' => ''                  // HTML ID  of element                                                          
                          , 'value' => ''                     
                          , 'placeholder' => ''
                          , 'style' => ''             // CSS of select element
                          , 'class' => ''             // CSS Class of select element
                          , 'attr' => array()         // Any  additional attributes, if this radio | checkbox element 
                        ); 
 */
function wpbm_bs_text( $item ) {

    $default_item_params = array(
                                'type'          => 'text' 
                                , 'id'          => ''  
                                , 'name'        => ''  
                                , 'label'       => ''  
                                , 'disabled'    => false
                                , 'class'       => ''
                                , 'style'       => ''
                                , 'placeholder' => ''                                                                                                                                    
                                , 'attr'        => array()
                                , 'value' => ''
                                , 'onfocus' => ''
    );
    $item_params = wp_parse_args( $item, $default_item_params );

    ?><input  type="<?php echo esc_attr( $item_params['type'] ); ?>" 
              id="<?php echo $item_params['id']; ?>"  
              name="<?php echo $item_params['id']; ?>" 
              style="<?php echo $item_params['style']; ?>" 
              class="form-control <?php echo $item_params['class']; ?>" 
              placeholder="<?php echo $item_params['placeholder']; ?>" 
              value="<?php echo $item_params['value']; ?>" 
              <?php disabled( $item_params['disabled'], true ); ?>               
              <?php echo wpbm_get_custom_attr( $item_params ); ?>
              <?php 
                if ( ! empty( $item_params['onfocus'] ) ) {
                    ?> onfocus="javascript:<?php echo $item_params['onfocus']; ?>" <?php 
                }
              ?>
          /><?php    
}


/** Show BS selectbox
 * 
 * @param array $item
                        array( 
                                  'id' => ''                        // HTML ID  of element
                                , 'name' => ''  
                                , 'style' => ''                     // CSS of select element
                                , 'class' => ''                     // CSS Class of select element
                                , 'multiple' => false
                                , 'disabled' => false
                                , 'attr' => array()                 // Any  additional attributes, if this radio | checkbox element                                                   
                                , 'options' => array()              // Associated array  of titles and values 
                                , 'disabled_options' => array()     // If some options disbaled,  then its must list  here
                                , 'value' => ''                     // Some Value from optins array that selected by default                                              
                                , 'onfocus' => ''
                                , 'onchange' => ''
                        )
 */
function wpbm_bs_select( $item ) {
    
    $default_item_params = array(         
                                  'id' => ''                        // HTML ID  of element
                                , 'name' => ''  
                                , 'style' => ''                     // CSS of select element
                                , 'class' => ''                     // CSS Class of select element
                                , 'multiple' => false
                                , 'disabled' => false
                                , 'attr' => array()                 // Any  additional attributes, if this radio | checkbox element                                                   
                                , 'options' => array()              // Associated array  of titles and values 
                                , 'disabled_options' => array()     // If some options disbaled,  then its must list  here
                                , 'value' => ''                     // Some Value from optins array that selected by default                                              
                                , 'onfocus' => ''
                                , 'onchange' => ''
                        ); 
    $item_params = wp_parse_args( $item, $default_item_params );

    
    ?><select  
            id="<?php echo esc_attr( $item_params['id'] ); ?>" 
            name="<?php echo esc_attr( $item_params['name'] ); echo ( $item_params['multiple'] ? '[]' : '' ); ?>" 
            class="form-control <?php echo esc_attr( $item_params['class'] ); ?>"                                 
            style="<?php echo esc_attr( $item_params['style'] ); ?>" 
            <?php disabled( $item_params['disabled'], true ); ?> 
            <?php echo wpbm_get_custom_attr( $item_params ); ?> 
            <?php echo ( $item_params['multiple'] ? ' multiple="MULTIPLE"' : '' ); ?>                                                                                                                                      
            <?php 
                if ( ! empty( $item_params['onfocus'] ) ) {
                    ?> onfocus="javascript:<?php echo $item_params['onfocus']; ?>" <?php 
                } 
                if ( ! empty( $item_params['onchange'] ) ) {
                    ?> onchange="javascript:<?php echo $item_params['onchange']; ?>" <?php 
                } 
            ?>
            autocomplete="off"
        ><?php
        foreach ( $item_params['options'] as $option_value => $option_data ) {

            if ( ! is_array( $option_data ) ) {
                $option_data = array( 'title' => $option_data );
                $is_was_simple = true;
            } else $is_was_simple = false;
            
            $default_option_params = array(         
                                          'id' => ''                            // HTML ID  of element
                                        , 'name' => ''  
                                        , 'style' => ''                         // CSS of select element
                                        , 'class' => ''                         // CSS Class of select element
                                        , 'disabled' => false
                                        , 'selected' => false
                                        , 'attr' => array()                     // Any  additional attributes, if this radio | checkbox element                                                   
                                        , 'value' => ''                         // Some Value from optins array that selected by default                                              
                
                                        , 'optgroup' => false                   // Use only  if you need to show OPTGROUP - Also  need to  use 'title' of start, end 'close' for END
                                        , 'close'  => false
                
                                ); 
            $option_data = wp_parse_args( $option_data, $default_option_params );
            
            if ( $option_data['optgroup'] ) {                                   // OPTGROUP
                
                if ( ! $option_data['close'] ) {
                    ?><optgroup label="<?php  echo esc_attr( $option_data['title'] ); ?>"><?php 
                } else {
                    ?></optgroup><?php     
                }
                
            } else {                                                            // OPTION
                
                ?><option 
                        value="<?php echo esc_attr( $option_value ); ?>" 
                        <?php                         
                        if ( $is_was_simple ) {
                            selected( $option_value, $item_params['value'] );                         
                            disabled( in_array( $option_value, $item_params['disabled_options'] ), true ); 
                        }
                        ?>        
                    class="<?php echo esc_attr( $option_data['class'] ); ?>"
                    style="<?php echo esc_attr( $option_data['style'] ); ?>" 
                    <?php echo wpbm_get_custom_attr( $option_data ); ?>                                                                
                    <?php selected(  $option_data['selected'], true ); ?>                                 
                    <?php if ( ! empty( $item_params['value'] ) ) selected(  $item_params['value'], esc_attr( $option_value ) ); //Recheck  global  selected parameter ?>
                    <?php disabled( $option_data['disabled'], true ); ?> 
                
                ><?php echo esc_attr( $option_data['title'] ); ?></option><?php
            }
        }
    ?></select><?php    
}


/** Show BS checkbox
 * 
 * @param array $item
                        array( 
                                'type' => 'radio'    
                                , 'id' => ''                        // HTML ID  of element
                                , 'name' => ''
                                , 'style' => ''                     // CSS of select element
                                , 'class' => ''                     // CSS Class of select element                                                                                
                                , 'disabled' => false
                                , 'attr' => array()                 // Any  additional attributes, if this radio | checkbox element 
                                , 'legend' => ''                    // aria-label parameter 
                                , 'value' => ''                     // Some Value from optins array that selected by default                                      
                                , 'selected' => false               // Selected or not                                
                        ); 
 */
function wpbm_bs_radio( $item ) {
    $item['type'] = 'radio';
    wpbm_bs_checkbox( $item );
}


/** Show BS checkbox
 * 
 * @param array $item
                        array( 
                                'type' => 'checkbox'    
                                , 'id' => ''                        // HTML ID  of element
                                , 'name' => ''
                                , 'style' => ''                     // CSS of select element
                                , 'class' => ''                     // CSS Class of select element                                                                                
                                , 'disabled' => false
                                , 'attr' => array()                 // Any  additional attributes, if this radio | checkbox element 
                                , 'legend' => ''                    // aria-label parameter 
                                , 'value' => ''                     // Some Value from optins array that selected by default                                      
                                , 'selected' => false               // Selected or not                                
                        ); 
 */
function wpbm_bs_checkbox( $item ) {

    $default_item_params = array( 
                                'type' => 'checkbox'    
                                , 'id' => ''                        // HTML ID  of element
                                , 'name' => ''
                                , 'style' => ''                     // CSS of select element
                                , 'class' => ''                     // CSS Class of select element                                                                                
                                , 'disabled' => false
                                , 'attr' => array()                 // Any  additional attributes, if this radio | checkbox element 
                                , 'legend' => ''                    // aria-label parameter 
                                , 'value' => ''                     // Some Value from optins array that selected by default                                      
                                , 'selected' => false               // Selected or not                                
                      ); 
    $item_params = wp_parse_args( $item, $default_item_params );

    ?><input    type="<?php echo esc_attr( $item_params['type'] ); ?>"
                id="<?php echo esc_attr( $item_params['id'] ); ?>" 
                name="<?php echo esc_attr( $item_params['name'] ); ?>" 
                value="<?php echo esc_attr( $item_params['value'] ); ?>" 
                aria-label="<?php echo esc_attr( $item_params['legend'] ); ?>"
                class="<?php echo esc_attr( $item_params['class'] ); ?>"
                style="<?php echo esc_attr( $item_params['style'] ); ?>" 
                <?php echo wpbm_get_custom_attr( $item_params ); ?>                                                                
                <?php checked(  $item_params['selected'], true ); ?>                                 
                <?php disabled( $item_params['disabled'], true ); ?> 
        /><?php 
}


/** Show BS addon
 * 
 * @param array $item
                        array( 
                            'type' => 'addon' 
                          , 'element' => 'text'               // text | radio | checkbox
                          , 'text' => ''                      // Simple plain text showing
                          , 'id' => ''                        // ID, if this radio | checkbox element
                          , 'name' => ''                      // Name, if this radio | checkbox element
                          , 'value' => ''                     // value, if this radio | checkbox element
                          , 'selected' => false               // Selected, if this radio | checkbox element     
                          , 'legend' => ''                    // aria-label parameter , if this radio | checkbox element
                          , 'class' => ''                     // Any CSS class here
                          , 'attr' => array()                 // Any  additional attributes, if this radio | checkbox element 
                          , 'text' => ''                      // Text  tp  show for Text  element
                        )
*/
function wpbm_bs_addon( $item ) {
    $milliseconds = round( microtime( true ) * 1000 );    //FixIn:  8.8.2.1
    $default_item_params = array( 
                            'type' => 'addon' 
                          , 'element' => 'text'               // text | radio | checkbox
                          , 'text' => ''                      // Simple plain text showing
                          , 'id' => ''                        // ID, if this radio | checkbox element
                          , 'name' => ''                      // Name, if this radio | checkbox element
                          , 'value' => ''                     // value, if this radio | checkbox element
                          , 'selected' => false               // Selected, if this radio | checkbox element     
                          , 'legend' => ''                    // aria-label parameter , if this radio | checkbox element
                          , 'class' => ''                     // Any CSS class here
                          , 'attr' => array()                 // Any  additional attributes, if this radio | checkbox element 
                          , 'text' => ''                      // Text  tp  show for Text  element
                          , 'style' => ''
                        ); 
    $item_params = wp_parse_args( $item, $default_item_params );

    ?><span class="input-group-addon"><?php 
    if ( $item_params['element'] == 'text' ) {
        ?><span class="<?php echo esc_attr( $item_params['class'] ); ?>" 
                style="<?php echo esc_attr( $item_params['style'] ); ?>"><?php
              echo $item_params['text'];
        ?></span><?php
    } elseif ( $item_params['element'] == 'checkbox' ) {

        if ( empty( $item_params['id'] ) )
          $item_params['id'] = $item_params['element'] . '_grp_' . $milliseconds ;

        if ( empty( $item_params['name'] ) )
          $item_params['name'] = $item_params['id'];

        ?><input type="checkbox" 
                 id="<?php echo $item_params['id']; ?>" 
                 name="<?php echo $item_params['name']; ?>" 
                 value="<?php echo $item_params['value']; ?>" 
                 aria-label="<?php echo $item_params['legend']; ?>"
                 class="<?php echo $item_params['class']; ?>"
                 <?php echo wpbm_get_custom_attr( $item_params ); ?>
                 <?php if ( $item_params['selected'] ) { echo ' checked="CHECKED" '; } ?>
          /><?php    

    } elseif ( $item_params['element'] == 'radio' ) {

        if ( empty( $item_params['id'] ) )
          $item_params['id'] = $item_params['element'] . '_grp_' . $milliseconds ;

        if ( empty( $item_params['name'] ) )
          $item_params['name'] = $item_params['id'];

        ?><input type="radio" 
                 id="<?php echo $item_params['id']; ?>" 
                 name="<?php echo $item_params['name']; ?>" 
                 value="<?php echo $item_params['value']; ?>" 
                 aria-label="<?php echo $item_params['legend']; ?>"
                 class="<?php echo $item_params['class']; ?>"
                 <?php echo wpbm_get_custom_attr( $item_params ); ?>
                 <?php if ( $item_params['selected'] ) { echo ' checked="CHECKED" '; } ?>
          /><?php                                          
    }
    ?></span><?php
    
}


/** Show BS Dropdown
 * 
 * @param array $item
                        array( 
 
                        ); 
 */
function wpbm_bs_dropdown( $item ) {
        
    $default_item_params = array( 
                          'id' => ''                                            // HTML ID  of element
                        , 'default' => ''                                       // Some Value from optins array that selected by default
                        , 'hint' => ''                                          // Hint // array( 'title' => __('Delete' , 'booking-manager') , 'position' => 'bottom' ) 
                        , 'class' => 'button-secondary'        
                        , 'style' => ''                                         // Any CSS style
                        , 'label' => ''                                         // Label of element "at Top of element"
                        , 'title' => ''                                         // Title of element "Inside of element"
                        , 'align' => 'left'                                     // Align: left | right                                               
                        , 'attr' => array()                              
                        , 'icon' => ''
                        , 'font_icon' => ''
                        , 'icon_position' => 'left'                             // Position  of icon relative to Text: left | right
                        , 'mobile_show_text' => false                           // Show  or hide text,  when viewing on Mobile devices (small window size).
                        , 'disabled' => array()                                 // If some options disbaled,  then its must list  here
                        , 'options' => array()                                  // Associated array  of titles and values         
                        ); 
    $params = wp_parse_args( $item, $default_item_params );

    
    $milliseconds = round(microtime(true) * 1000);
    
    if ( empty( $params['id'] ) ) $params['id'] = 'wpbm_bs_dropdown' . $milliseconds;
    
    // Check  if this list Simple or Complex (with  input elements) ////////////
    $is_this_simple_list = true;
    foreach ( $params['options'] as $key => $value ) {
        if ( is_array( $value ) ) {                                             
            $is_this_simple_list = false;
            break;
        }    
    }    
    
    ?><a href="javascript:void(0)" 
         <?php if (! $is_this_simple_list ) { ?>
         onclick="javascript:jQuery('#<?php echo $params['id']; ?>_container').show();"
         <?php } ?>
         data-toggle="dropdown" 
         id="<?php echo $params['id'];?>_selector" 
          <?php if ( ! empty( $params['hint'] ) ) { ?>
         title="<?php  echo esc_js( $params['hint']['title'] ); ?>"
          <?php } ?>                 
         class="button dropdown-toggle <?php 
                echo ( ! empty( $params['hint'] ) ) ? 'tooltip_' . $params['hint']['position'] . ' ' : '' ;  
                echo ( ! empty( $params['class'] ) ) ? $params['class'] . ' ' : '' ;  
                ?>"   
         style="<?php echo $params['style']; ?>" 
         <?php echo wpbm_get_custom_attr( $params ); ?>
         ><?php 

            $btn_icon = '';
            if ( ! empty( $params['icon'] ) ) {                                

                if ( substr( $params['icon'], 0, 4 ) != 'http') $img_path = WPBM_PLUGIN_URL . '/assets/img/' . $params['icon'];
                else                                                 $img_path = $params['icon'];

                $btn_icon = '<img class="menuicons" src="' . $img_path . '" />';    // Img  Icon

            } elseif ( ! empty( $params['font_icon'] ) ) {                     

                $btn_icon = '<i class="menu_icon icon-1x ' . $params['font_icon'] . '"></i>';                         // Font Icon

            }  
            if (  ( ! empty( $btn_icon ) ) && ( $params['icon_position'] == 'left' )  )
                echo $btn_icon . '&nbsp;';

            // Text
            echo '<span' . ( (  ( ! empty( $btn_icon ) )  && ( ! $params['mobile_show_text'] ) )? ' class="in-button-text"' : '' ) . '>';
            echo    $params['title'];                                             
            if (  ( ! empty( $btn_icon ) ) && ( $params['icon_position'] == 'right' )  )
                echo '&nbsp;' ;
            echo '</span>';

            if (  ( ! empty( $btn_icon ) ) && ( $params['icon_position'] == 'right' )  )
                echo   $btn_icon;                                  
        ?> &nbsp;<span class="caret"></span></a><?php    
        
        ?><ul   
            id="<?php echo $params['id']; ?>_container"
            class="dropdown-menu dropdown-menu-<?php echo $params['align']; ?>" 
             ><?php
             
            wpbm_bs_list_of_options_for_dropdown( $params , 'simple' , $is_this_simple_list);
            
        ?></ul><?php 
}


function wpbm_bs_list_of_options_for_dropdown( $params, $dropdown_type = 'simple', $is_this_simple_list = true ) {

	$milliseconds = round( microtime( true ) * 1000 );    //FixIn:  8.8.2.1

    foreach ( $params['options'] as $key => $value ) {

        if ( is_array( $value ) ) {                                 // Complex value constructions

            ?><li role="presentation">
                <div class="btn-toolbar" role="toolbar">
                    <?php 
                    $item_params = reset($value) ;   
                    
                    $default_item_params = array( 
                                          'id' => ''                                            // HTML ID  of element
                                        , 'default' => ''                                       // Some Value from optins array that selected by default
                                        , 'hint' => ''                                          // Hint // array( 'title' => __('Delete' , 'booking-manager') , 'position' => 'bottom' ) 
                                        , 'class' => 'button-secondary'        
                                        , 'style' => ''                                         // Any CSS style
                                        , 'label' => ''                                         // Label of element "at Top of element"
                                        , 'title' => ''                                         // Title of element "Inside of element"
                                        , 'align' => 'left'                                     // Align: left | right                                               
                                        , 'attr' => array()                              
                                        , 'icon' => ''
                                        , 'font_icon' => ''
                                        , 'icon_position' => 'left'                             // Position  of icon relative to Text: left | right
                                        , 'mobile_show_text' => false                           // Show  or hide text,  when viewing on Mobile devices (small window size).
                                        , 'disabled' => array()                                 // If some options disbaled,  then its must list  here
                                        , 'options' => array()                                  // Associated array  of titles and values         
                                        ); 
                    $item_params = wp_parse_args( $item_params, $default_item_params );
                    
                    ?>
                    <div class="<?php echo ( $item_params['type'] == 'group' ) ? esc_attr( $item_params['class'] ) : 'input-group'; ?>" 
                         style="<?php echo ( $item_params['type'] == 'group' ) ? esc_attr( $item_params['style'] ) : ''; ?>" 
                         role="group"><?php 

                         // Count number of text elements in this LI section
                        $number_of_text_elements = 0; 
                        foreach ( $value as $item_params ) { 
                            if ( $item_params['type'] == 'text' )
                                $number_of_text_elements++;
                        }
                        $focus_element_id = 'shjgkdfhgjhhsjgkhjkgdhghdjghjdkghjkdhgjkfghdfjhgjdkdgkhjf';
                        foreach ( $value as $item_params ) {

                            $item_type = $item_params['type'];

                            switch ( $item_type ) {

                                case 'checkbox':
                                case 'radio':
                                    ?><span class="input-group-addon"><?php 

                                        if ( empty( $item_params['id'] ) )      $item_params['id'] = $params['id'] . '_grp_' . $milliseconds ;

                                        if ( empty( $item_params['name'] ) )    $item_params['name'] = $item_params['id'];

                                        $focus_element_id = esc_attr( $item_params['id'] );

                                        wpbm_bs_checkbox( $item_params );

                                        if ( ! empty( $item_params['label'] ) ) {

                                            ?><label for="<?php echo esc_attr( $item_params['id'] ); ?>"><?php 

                                                echo wp_kses_post( $item_params['label'] );
                                            ?></label><?php
                                        }
                                    ?></span><?php                                    

                                    break;

                                case 'select':

                                    if ( empty( $item_params['id'] ) )      $item_params['id'] = $params['id'] . '_grp_' . $milliseconds ;

                                    if ( empty( $item_params['name'] ) )    $item_params['name'] = $item_params['id'];

                                    $item_params['onfocus'] = "jQuery('#" . $focus_element_id ."').prop('checked', true);";

                                    wpbm_bs_select( $item_params );

                                    break;

                                case 'text': 

                                    if ( empty( $item_params['id'] ) )      $item_params['id'] = $params['id'] . '_grp_' . $milliseconds ;

                                    if ( empty( $item_params['name'] ) )    $item_params['name'] = $item_params['id'];

                                    ?><div class="dropdown-menu-text-element <?php echo 'dropdown-menu-text-element-count-' . $number_of_text_elements; ?>"><?php 

                                        if ( ! empty( $item_params['label'] ) ) {

                                            ?><label for="<?php echo esc_attr( $item_params['id'] ); ?>"><?php 

                                                echo wp_kses_post( $item_params['label'] );

                                            ?></label><?php
                                        } 

                                        ?><legend class="screen-reader-text"><span><?php echo wp_kses_post( $item_params['label'] ); ?></span></legend><?php                                                     

                                        $item_params['onfocus'] = "jQuery('#" . $focus_element_id ."').prop('checked', true);";

                                        wpbm_bs_text( $item_params );

                                    ?></div><?php 

                                    break;

                                case 'button':

                                    $default_item_params = array( 
                                                        'action' => "wpbm_close_dropdown_selectbox( '" . $params['id'] . "' )" // Close list and uncheck  any checkboxes or radio boxes in dropdown list
                                                        ); 

                                    $item_params = wp_parse_args( $item_params, $default_item_params );

                                    wpbm_bs_button( $item_params );
                                    break;

                                default:
                                    break;
                          }
                      }                        
                    ?>
                    </div>
                </div>
            </li><?php 

        } else {

            if ( $value == 'divider' ) {

                ?><li role="presentation" class="divider"></li><?php

            } elseif ( $value == 'header' ) {

                ?><li role="presentation" class="dropdown-header"><?php echo $key ?></li><?php

            } else {                             
                    ?><li role="presentation" <?php if ( in_array( $value,  $params['disabled'] ) === true ) { echo ' class="disabled"';  } ?> >
                          <a  role="menuitem"
                              tabindex="-1"
                              href="javascript:void(0)" 
                              <?php 
                                if ( in_array( $value,  $params['disabled'] ) !== true ) { 
                                  
                                    if ( $dropdown_type == 'list' ) { ?>
                              
                                                onclick="javascript:
                                                                    wpbm_show_selected_in_dropdown('<?php echo $params['id']; ?>', jQuery(this).html(), '<?php echo $value; ?>');
                                                            <?php if (! $is_this_simple_list ) { ?>
                                                                    wpbm_close_dropdown_selectbox( '<?php echo $params['id']; ?>' );
                                                            <?php } ?>"                                  
                                    <?php } else { ?>
                                                
                                                onclick="javascript:<?php echo $value; ?>"
                                    <?php } 
                                                
                                } ?>
                           ><?php echo $key; ?></a>
                      </li><?php
            }                  
        }

    }    
}

////////////////////////////////////////////////////////////////////////////////
//  Control elements      //////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

/** Button Groups
 * 
 * @param array $args
 * 
        
    $params = array(  
                      'label_for' => 'actions'                              // "For" parameter  of button group element
                    , 'label' => __('Actions:', 'booking-manager')                  // Label above the button group
                    , 'style' => ''                                         // CSS Style of entire div element
                    , 'items' => array(
                                        array(                                                 
                                              'type' => 'button' 
                                            , 'title' => __('Delete', 'booking-manager')    // Title of the button
                                            , 'hint' => array( 'title' => __('Delete' , 'booking-manager') , 'position' => 'bottom' ) // Hint
                                            , 'link' => 'javascript:void(0)'        // Direct link or skip  it
                                            , 'action' => ''                // Some JavaScript to execure, for example run  the function
                                            , 'class' => ''                 // button-secondary  | button-primary
                                            , 'icon' => ''
                                            , 'font_icon' => ''
                                            , 'icon_position' => 'left'     // Position  of icon relative to Text: left | right
                                            , 'style' => ''                 // Any CSS class here
                                            , 'mobile_show_text' => false       // Show  or hide text,  when viewing on Mobile devices (small window size).
                                            , 'attr' => array()
                                        )
                                        , array( 
                                            'type' => 'button'
                                            , 'title' => __('Delete', 'booking-manager')
                                            , 'class' => 'button-primary' 
                                            , 'font_icon' => 'glyphicon glyphicon-trash'
                                            , 'icon_position' => 'left'
                                            , 'action' => "jQuery('#opl_filters_formID').trigger( 'submit' );"
                                            , 'mobile_show_text' => false       // Show  or hide text,  when viewing on Mobile devices (small window size).
                                        )
                                    )
    );             
    wpbm_bs_button_group( $params );                           
 
 */
function wpbm_bs_button_group( $args = array() ) {
        
    $milliseconds = round(microtime(true) * 1000);
    
    $defaults = array(                        
                      'label_for' => 'btn_bs_' . $milliseconds                  // "For" parameter  of label element
                    , 'label' => ''                                             // Label above element
                    , 'style' => ''                                             // CSS of entire div element
                    , 'items' => array()                                        // Array of elements            
              );
    
    $params = wp_parse_args( $args, $defaults );
        
  ?><div class="control-group" style="<?php echo $params['style']; ?>" ><?php        
        if (! empty( $params['label'] ) ) { 
            ?><label for="<?php echo $params['label_for']; ?>" class="control-label"><?php echo $params['label']; ?></label><?php
        } 
      ?><div class="btn-toolbar" role="toolbar" aria-label="..." id="<?php echo $params['label_for']; ?>">
            <div class="btn-group" role="group" aria-label="..."><?php 
            
                foreach ( $params['items'] as $item ) {
                      
                    switch ( $item['type'] ) {
                        
                        case 'button':
                                        wpbm_bs_button( $item );
                                        break;                        
                        case 'dropdown':
                                        wpbm_bs_dropdown( $item );                            
                                        break;
                        default:
                            break;
                    }
                      
                } ?>
            </div>
        </div>
    </div><?php
}


/** Show Input Group 
 * 
 * @param array $args
 * 
        
    $params = array(  
                      'label_for' => 'min_cost'                             // "For" parameter  of label element
                    , 'label' => __('Min / Max cost:', 'booking-manager')           // Label above the input group
                    , 'style' => ''                                         // CSS Style of entire div element
                    , 'items' => array(
                                        array(      
                                            'type' => 'addon' 
                                            , 'element' => 'text'       // text | radio | checkbox
                                            , 'text' => __('Cost', 'booking-manager') . ':'
                                            , 'class' => ''                 // Any CSS class here
                                            , 'style' => 'font-weight:600;'                 // CSS Style of entire div element
                                        )  
                                        , array(      
                                            'type' => 'addon' 
                                            , 'element' => 'checkbox'       // text | radio | checkbox
                                            , 'id' => 'apply_elem'          // ID, if this radio | checkbox element
                                            , 'name' => 'apply_elem'        // Name, if this radio | checkbox element
                                            , 'value' => 'On'               // value, if this radio | checkbox element
                                            , 'selected' => false           // Selected, if this radio | checkbox element     
                                            , 'legend' => ''                // aria-label parameter , if this radio | checkbox element
                                            , 'class' => ''                 // Any CSS class here
                                            , 'attr' => array()             // Any  additional attributes, if this radio | checkbox element 
                                        )  
                                        , array(      
                                            'type' => 'addon' 
                                            , 'element' => 'radio'          // text | radio | checkbox
                                            , 'id' => 'min_elem'            // ID, if this radio | checkbox element
                                            , 'name' => 'cost_elem'         // Name, if this radio | checkbox element
                                            , 'value' => 'min'              // value, if this radio | checkbox element
                                            , 'selected' => false           // Selected, if this radio | checkbox element     
                                            , 'legend' => ''                // aria-label parameter , if this radio | checkbox element
                                            , 'class' => ''                 // Any CSS class here
                                            , 'attr' => array()             // Any  additional attributes, if this radio | checkbox element 
                                        )  
                            // Warning! Can be text or selectbox, not both OR you need to define width           
                            , array(    
                                'type' => 'text'
                                , 'id' => 'min_cost'            // HTML ID  of element                                                          
                                , 'value' => ''                 // Value of Text field
                                , 'placeholder' => __('Reason of Cancelation', 'booking-manager')
                                , 'style' => 'width:100px;'                 // CSS of select element
                                , 'class' => ''                 // CSS Class of select element
                                , 'attr' => array()             // Any  additional attributes, if this radio | checkbox element 
                            ) 
                                        , array(      
                                            'type' => 'addon' 
                                            , 'element' => 'text'           // text | radio | checkbox
                                            , 'text' => ' - '               // Simple plain text showing
                                        )  
                                        , array(    
                                            'type' => 'text'
                                            , 'id' => 'max_cost'            // HTML ID  of element                                                          
                                            , 'value' => ''                 // Value of Text field
                                            , 'placeholder' => __('Max Cost', 'booking-manager')
                                            , 'style' => ''                 // CSS of select element
                                            , 'class' => ''                 // CSS Class of select element
                                            , 'attr' => array()             // Any  additional attributes, if this radio | checkbox element 

                                        )
                                        , array(      
                                            'type' => 'addon' 
                                            , 'element' => 'radio'          // text | radio | checkbox
                                            , 'id' => 'max_elem'            // ID, if this radio | checkbox element
                                            , 'name' => 'cost_elem'         // Name, if this radio | checkbox element
                                            , 'value' => 'max'              // value, if this radio | checkbox element
                                            , 'selected' => false           // Selected, if this radio | checkbox element     
                                            , 'legend' => ''                // aria-label parameter , if this radio | checkbox element
                                            , 'class' => ''                 // Any CSS class here
                                            , 'attr' => array()             // Any  additional attributes, if this radio | checkbox element 
                                        )  
                            // Warning! Can be text or selectbox, not both  OR you need to define width                     
                            , array(    
                                  'type' => 'select'  
                                , 'id' => 'select_option'       // HTML ID  of element
                                , 'options' => array( 'delete' => __('Delete', 'booking-manager'), 'any' => __('Any', 'booking-manager'), 'specific' => __('Specific', 'booking-manager')  )      // Associated array  of titles and values 
                                , 'disabled_options' => array( 'any' )  // If some options disbaled,  then its must list  here
                                , 'default' => 'specific'       // Some Value from optins array that selected by default                                      
                                , 'style' => 'width:200px;'                 // CSS of select element
                                , 'class' => ''                 // CSS Class of select element
                                , 'attr' => array()             // Any  additional attributes, if this radio | checkbox element 
                            )
 
                                // Select Advanced option list
                                , array(                                            
                                      'type' => 'select'                              
                                    , 'id' => 'select_form_help_shortcode'  
                                    , 'name' => 'select_form_help_shortcode'  
                                    , 'style' => ''                            
                                    , 'class' => ''   
                                    , 'multiple' => false
                                    , 'disabled' => false
                                    , 'disabled_options' => array()             // If some options disbaled,  then its must list  here                                
                                    , 'attr' => array()                         // Any  additional attributes, if this radio | checkbox element                                                   
                                    , 'options' => array(                       // Associated array  of titles and values   
                                                          'info' => array(  
                                                                        'title' => __('General Info', 'booking-manager')
                                                                        , 'id' => ''   
                                                                        , 'name' => ''  
                                                                        , 'style' => ''    
                                                                        , 'class' => ''     
                                                                        , 'disabled' => false
                                                                        , 'selected' => false
                                                                        , 'attr' => array()   
                                                                    )
                                                        , 'optgroup_sf_s' => array( 
                                                                        'optgroup' => true
                                                                        , 'close'  => false
                                                                        , 'title'  => '&nbsp;' . __('Standard Fields' , 'booking-manager') 
                                                                    )
                                                        , 'text' => array(  
                                                                        'title' => __('Text', 'booking-manager')
                                                                        , 'id' => ''   
                                                                        , 'name' => ''  
                                                                        , 'style' => ''
                                                                        , 'class' => ''     
                                                                        , 'disabled' => false
                                                                        , 'selected' => false
                                                                        , 'attr' => array()   
                                                                    )
                                                        , 'select' => array(  
                                                                        'title' => __('Select', 'booking-manager')
                                                                        , 'id' => ''   
                                                                        , 'name' => ''  
                                                                        , 'style' => ''
                                                                        , 'class' => ''     
                                                                        , 'disabled' => false
                                                                        , 'selected' => false
                                                                        , 'attr' => array()   
                                                                    )
                                                        , 'textarea' => array(  
                                                                        'title' => __('Textarea', 'booking-manager')
                                                                        , 'id' => ''   
                                                                        , 'name' => ''  
                                                                        , 'style' => ''
                                                                        , 'class' => ''     
                                                                        , 'disabled' => false
                                                                        , 'selected' => false
                                                                        , 'attr' => array()   
                                                                    )
                                                        , 'checkbox' => array(  
                                                                        'title' => __('Checkbox', 'booking-manager')
                                                                        , 'id' => ''   
                                                                        , 'name' => ''  
                                                                        , 'style' => ''
                                                                        , 'class' => ''     
                                                                        , 'disabled' => false
                                                                        , 'selected' => false
                                                                        , 'attr' => array()   
                                                                    )
                                                        , 'optgroup_sf_e' => array( 'optgroup' => true, 'close'  => true )
                                        
                                        
                                                        , 'optgroup_af_s' => array( 
                                                                        'optgroup' => true
                                                                        , 'close'  => false
                                                                        , 'title'  => '&nbsp;' . __('Advanced Fields' , 'booking-manager') 
                                                                    )
                                                        , 'info_advanced' => array(  
                                                                        'title' => __('Info', 'booking-manager')
                                                                        , 'id' => ''   
                                                                        , 'name' => ''  
                                                                        , 'style' => ''
                                                                        , 'class' => ''     
                                                                        , 'disabled' => false
                                                                        , 'selected' => false
                                                                        , 'attr' => array()   
                                                                    )
                                                        , 'optgroup_af_e' => array( 'optgroup' => true, 'close'  => true )
                                        
                                                    )
                                    , 'value' => ''                             // Some Value from optins array that selected by default                                                                              
                                    , 'onfocus' => ''
                                    , 'onchange' => "jQuery('.wpbm_field_generator').hide();jQuery('.wpbm_field_generator_' + this.options[this.selectedIndex].value ).show();"                                
                                )
                                        , array(                                                 
                                              'type' => 'button' 
                                            , 'title' => __('Delete', 'booking-manager')    // Title of the button
                                            , 'hint' => array( 'title' => __('Delete' , 'booking-manager') , 'position' => 'bottom' ) // Hint
                                            , 'link' => 'javascript:void(0)'        // Direct link or skip  it
                                            , 'action' => ''                // Some JavaScript to execure, for example run  the function
                                            , 'class' => ''                 // button-secondary  | button-primary
                                            , 'icon' => ''
                                            , 'font_icon' => ''
                                            , 'icon_position' => 'left'     // Position  of icon relative to Text: left | right
                                            , 'style' => ''                 // Any CSS class here
                                            , 'attr' => array()
                                        )
                                        , array( 
                                            'type' => 'button'
                                            , 'title' => __('Delete', 'booking-manager')
                                            , 'class' => 'button-primary' 
                                            , 'font_icon' => 'glyphicon glyphicon-trash'
                                            , 'icon_position' => 'left'
                                            , 'action' => "jQuery('#bookingmanager_filters_formID').trigger( 'submit' );"
                                        )
                    )
              );     
    ?><div class="control-group wpbm-no-padding" style="max-width:730px;"><?php 
            wpbm_bs_input_group( $params );                   
    ?></div><?php

 */
function wpbm_bs_input_group( $args = array() ) {
        
    $milliseconds = round(microtime(true) * 1000);
    
    $defaults = array(  
                      'label_for' => 'btn_bs_' . $milliseconds                  // "For" parameter  of label element
                    , 'label' => ''                                             // Label above element
                    , 'style' => ''                                             // CSS of entire div element
                    , 'items' => array()                                        // Array of elements    
              );
    
    $params = wp_parse_args( $args, $defaults );

    ?><div class="wpbm-no-padding" style="width:auto;<?php echo $params['style']; ?>" ><?php
        if (! empty( $params['label'] ) ) { 
            ?><label for="<?php echo $params['label_for']; ?>" class="control-label"><?php echo $params['label']; ?></label><?php
        } 
        ?><div class="btn-toolbar" role="toolbar" aria-label="..." id="<?php echo $params['label_for']; ?>_toolbar">
            <div class="input-group" role="group" aria-label="..."><?php 

                    foreach ( $params['items'] as $item ) {

                        switch ( $item['type'] ) {

                            case 'button':                                
                                        ?><div class="input-group-btn"><?php 
                                        
                                        wpbm_bs_button( $item );
                                        
                                        ?></div><?php                                 
                                        break;

                            case 'text':                                
                                        wpbm_bs_text( $item );                                
                                        break; 
                            
                            case 'select':                                
                                        wpbm_bs_select( $item );
                                        break; 
                            
                            case 'addon':
                                        wpbm_bs_addon( $item );                                
                                        break; 
                            default:
                                break;
                        }
                    } 

            ?></div><!-- /input-group -->    
        </div>
    </div><?php      
}


/** Selectbox - Dropdown List with comple UI elements
 * 
 * @param array $args = array(
                                'id' => ''                                              // HTML ID  of element
                                , 'id2' => ''                                           // (optional) HTML ID  of 2nd element
                                , 'default' => ''                                       // Some Value from optins array that selected by default
                                , 'default2' => ''                                      // (optional) Some Value from optins array that selected by default
                                , 'hint' => ''                                          // (optional) Hint: array( 'title' => __('Delete' , 'booking-manager') , 'position' => 'bottom' ) 
                                , 'css_classes' => ''                                   // (optional) 
                                , 'label' => ''                                         // (optional) Label of element "at Top of element"
                                , 'title' => ''                                         // Title of element "Inside of element"
                                , 'align' => 'left'                                     // (optional) Align: left | right                       
                                , 'disabled' => array()                                 // (optional) If some options disbaled,  then its must list  here
                                , 'options' => array(                                   // Associated array  of titles and values 
                                                        __('Bla bla bla', 'booking-manager') => '1'
                                                        , 'divider0' => 'divider'
                                                        , __('Section Header', 'booking-manager') => 'header'
                                                            ...
                                                            
                                                        , '_radio_or_checkbox' => array( 
                                                                                    array(  'type'          => 'radio'          // 'radio' or 'checkbox'                                                                                           
                                                                                            , 'id' => $item_params['id']          // HTML ID  of element
                                                                                            , 'name' => $item_params['name']
                                                                                            , 'style' => ''                     // CSS of select element
                                                                                            , 'class' => ''                     // CSS Class of select element                                                                                
                                                                                            , 'disabled' => false
                                                                                            , 'attr' => array()                 // Any  additional attributes, if this radio | checkbox element 
                                                                                            , 'legend' => ''                    // aria-label parameter 
                                                                                            , 'value' => ''                     // Some Value from optins array that selected by default                                      
                                                                                            , 'selected' => false               // Selected or not
                                                                                            , 'label' => ''                     // Label - title
                                                                                        )
                                                                            )
                                                        , '_select' => array( 
                                                                                    array(  'type'          => 'select'                                                                                            
                                                                                            , 'id' => ''                        // HTML ID  of element
                                                                                            , 'style' => ''                     // CSS of select element
                                                                                            , 'class' => ''                     // CSS Class of select element
                                                                                            , 'multiple' => false
                                                                                            , 'disabled' => false
                                                                                            , 'attr' => array()                 // Any  additional attributes, if this radio | checkbox element                                                   
                                                                                            , 'options' => array()              // Associated array  of titles and values 
                                                                                            , 'disabled_options' => array()     // If some options disbaled,  then its must list  here
                                                                                            , 'value' => ''                     // Some Value from optins array that selected by default                                      
                                                                                        )
                                                                            )
                                                        , '_texts' => array( 
                                                                                    array(  'type'          => 'text' 
                                                                                            , 'id'          => ''  
                                                                                            , 'name'        => ''  
                                                                                            , 'label'       => ''  
                                                                                            , 'disabled'    => false
                                                                                            , 'class'       => ''
                                                                                            , 'style'       => ''
                                                                                            , 'placeholder' => ''                                                                                                                                    
                                                                                            , 'attr'        => array()
                                                                                            , 'value' => ''
                                                                                        )
                                                                            )
                                                        , '_buttons' => array( 
                                                                                    array(  'type' => 'button' 
                                                                                          , 'title' => ''                     // Title of the button
                                                                                          , 'hint' => ''                      // , 'hint' => array( 'title' => __('Select status' , 'booking-manager') , 'position' => 'bottom' )
                                                                                          , 'link' => 'javascript:void(0)'    // Direct link or skip  it
                                                                                          , 'action' => "wpbm_close_dropdown_selectbox( '" . $params['id'] . "' )" // Some JavaScript to execure, for example run  the function
                                                                                          , 'class' => 'button-secondary'     // button-secondary  | button-primary
                                                                                          , 'icon' => ''
                                                                                          , 'font_icon' => ''
                                                                                          , 'icon_position' => 'left'         // Position  of icon relative to Text: left | right
                                                                                          , 'style' => ''                     // Any CSS class here
                                                                                          , 'mobile_show_text' => false       // Show  or hide text,  when viewing on Mobile devices (small window size).
                                                                                          , 'attr' => array()
                                                                                        )
                                                                            )
                                                     )
                            );
 * 
 Exmaple #1:
            $params = array(                                                    // Pending, Active, Suspended, Terminated, Cancelled, Fraud 
                            'id' => 'wh_approved'
                            , 'options' => array (
                                                    __('Pending', 'booking-manager') => '0',
                                                    __('Approved', 'booking-manager') => '1',
                                                    , 'divider0' => 'divider'
                                                    , __('Section Header', 'booking-manager') => 'header'
                                                    , __('Any', 'booking-manager') => ''
                                                 )
                            , 'disabled' => array( '' )                         // It will disable "Any" option    
                            , 'default' => ( isset( $_REQUEST[ 'wh_approved' ] ) ) ? esc_attr( $_REQUEST[ 'wh_approved' ] ) : ''
                            , 'label' => ''//__('Status', 'booking-manager') . ':'
                            , 'title' => __('Items', 'booking-manager')                                              
                        );            
                                                  
            wpbm_bs_dropdown_list( $params );                         

 Exmaple #2:
            $dates_interval = array(  
                                        1 => '1' . ' ' . __('day' , 'booking-manager')
                                      , 2 => '2' . ' ' . __('days' , 'booking-manager')
                                      , 3 => '3' . ' ' . __('days' , 'booking-manager')
                                      , 4 => '4' . ' ' . __('days' , 'booking-manager')
                                      , 5 => '5' . ' ' . __('days' , 'booking-manager')
                                      , 6 => '6' . ' ' . __('days' , 'booking-manager')
                                      , 7 => '1' . ' ' . __('week' , 'booking-manager')
                                      , 14 => '2' . ' ' . __('weeks' , 'booking-manager')
                                      , 30 => '1' . ' ' . __('month' , 'booking-manager')
                                      , 60 => '2' . ' ' . __('months' , 'booking-manager')
                                      , 90 => '3' . ' ' . __('months' , 'booking-manager')
                                      , 183 => '6' . ' ' . __('months' , 'booking-manager')
                                      , 365 => '1' . ' ' . __('Year' , 'booking-manager')
                                );
            $params = array(                                                    
                              'id'  => 'wh_bookingmanager_date'
                            , 'id2' => 'wh_bookingmanager_date2'
                            , 'default' =>  ( isset( $_REQUEST[ 'wh_bookingmanager_date' ] ) ) ? esc_attr( $_REQUEST[ 'wh_bookingmanager_date' ] ) : ''
                            , 'default2' => ( isset( $_REQUEST[ 'wh_bookingmanager_date2' ] ) ) ? esc_attr( $_REQUEST[ 'wh_bookingmanager_date2' ] ) : ''
                            , 'hint' => array( 'title' => __('Filter itenms by  dates' , 'booking-manager') , 'position' => 'top' )
                            , 'label' => ''//__('Booked Dates', 'booking-manager') . ':'
                            , 'title' => __('Dates', 'booking-manager')                                                              
                            , 'options' => array (
                                                      __('Current dates' , 'booking-manager')    => '0'
                                                    , __('Today' , 'booking-manager')            => '1'
                                                    , __('Previous dates' , 'booking-manager')   => '2'
                                                    , __('All dates' , 'booking-manager')        => '3'
                                                    , 'divider1' => 'divider'
                                                    , __('Today check in/out' , 'booking-manager')   => '9'
                                                    , __('Check In - Tomorrow' , 'booking-manager')  => '7'
                                                    , __('Check Out - Tomorrow' , 'booking-manager') => '8'
                                                    , 'divider2' => 'divider'                                
                                                    , 'next' => array(  
                                                                        array(
                                                                                'type' => 'radio'                                                        
                                                                              , 'label' => __('Next' , 'booking-manager')
                                                                              , 'id' => 'wh_bookingmanager_datedays_interval1' 
                                                                              , 'name' => 'wh_bookingmanager_datedays_interval_Radios'                                                                                            
                                                                              , 'style' => ''                     // CSS of select element
                                                                              , 'class' => ''                     // CSS Class of select element                                                                                
                                                                              , 'disabled' => false
                                                                              , 'attr' => array()                 // Any  additional attributes, if this radio | checkbox element 
                                                                              , 'legend' => ''                    // aria-label parameter 
                                                                              , 'value' => '4'                     // Some Value from optins array that selected by default                                      
                                                                              , 'selected' => ( isset($_REQUEST[ 'wh_bookingmanager_datedays_interval_Radios'] ) 
                                                                                                && ( $_REQUEST[ 'wh_bookingmanager_datedays_interval_Radios'] == '4' ) ) ? true : false
                                                                              )
                                                                        , array( 
                                                                                'type' => 'select'
                                                                              , 'attr' => array() 
                                                                              , 'name' => 'wh_bookingmanager_datenext'
                                                                              , 'id' => 'wh_bookingmanager_datenext'                                                                                                                                                                                                                                                                                
                                                                              , 'options' => $dates_interval
                                                                              , 'value' => isset( $_REQUEST[ 'wh_bookingmanager_datenext'] ) ? esc_attr( $_REQUEST[ 'wh_bookingmanager_datenext'] ) : ''
                                                                              )                                                        
                                                                     ) 
                                                    , 'prior' => array( 
                                                                        array( 
                                                                                'type' => 'radio'
                                                                              , 'label' => __('Prior' , 'booking-manager')
                                                                              , 'id' => 'wh_bookingmanager_datedays_interval2' 
                                                                              , 'name' => 'wh_bookingmanager_datedays_interval_Radios'                                                                                            
                                                                              , 'style' => ''                     // CSS of select element
                                                                              , 'class' => ''                     // CSS Class of select element                                                                                
                                                                              , 'disabled' => false
                                                                              , 'attr' => array()                 // Any  additional attributes, if this radio | checkbox element 
                                                                              , 'legend' => ''                    // aria-label parameter 
                                                                              , 'value' => '5'                     // Some Value from optins array that selected by default                                      
                                                                              , 'selected' => ( isset($_REQUEST[ 'wh_bookingmanager_datedays_interval_Radios'] ) 
                                                                                                && ( $_REQUEST[ 'wh_bookingmanager_datedays_interval_Radios'] == '5' ) ) ? true : false
                                                                              )
                                                                        , array( 
                                                                                'type' => 'select'
                                                                              , 'attr' => array() 
                                                                              , 'name' => 'wh_bookingmanager_dateprior'
                                                                              , 'id' => 'wh_bookingmanager_dateprior'                                                                                                                                                                                                                                                                                
                                                                              , 'options' => $dates_interval
                                                                              , 'value' => isset( $_REQUEST[ 'wh_bookingmanager_dateprior'] ) ? esc_attr( $_REQUEST[ 'wh_bookingmanager_dateprior'] ) : ''
                                                                              )                                                        
                                                                     )                                        
                                                    , 'fixed' => array( array(  'type' => 'group', 'class' => 'input-group text-group'), 
                                                                        array( 
                                                                                'type' => 'radio'
                                                                              , 'label' => __('Dates' , 'booking-manager')
                                                                              , 'id' => 'wh_bookingmanager_datedays_interval3' 
                                                                              , 'name' => 'wh_bookingmanager_datedays_interval_Radios'                                                                                            
                                                                              , 'style' => ''                     // CSS of select element
                                                                              , 'class' => ''                     // CSS Class of select element                                                                                
                                                                              , 'disabled' => false
                                                                              , 'attr' => array()                 // Any  additional attributes, if this radio | checkbox element 
                                                                              , 'legend' => ''                    // aria-label parameter 
                                                                              , 'value' => '6'                     // Some Value from optins array that selected by default                                      
                                                                              , 'selected' => ( isset($_REQUEST[ 'wh_bookingmanager_datedays_interval_Radios'] ) 
                                                                                                && ( $_REQUEST[ 'wh_bookingmanager_datedays_interval_Radios'] == '6' ) ) ? true : false
                                                                              )
                                                                        , array(                                                                                 
                                                                                'type'          => 'text' 
                                                                                , 'id'          => 'wh_bookingmanager_datefixeddates'  
                                                                                , 'name'        => 'wh_bookingmanager_datefixeddates'  
                                                                                , 'label'       => __('Check-in' , 'booking-manager') . ':'
                                                                                , 'disabled'    => false
                                                                                , 'class'       => 'wpdevbk-filters-section-calendar'           // This class add datepicker
                                                                                , 'style'       => ''
                                                                                , 'placeholder' => date( 'Y-m-d' )                                                                                                                                   
                                                                                , 'attr'        => array()    
                                                                                , 'value' => isset( $_REQUEST[ 'wh_bookingmanager_datefixeddates'] ) ? esc_attr( $_REQUEST[ 'wh_bookingmanager_datefixeddates'] ) : ''
                                                                              )                                                        
                                                                        , array(                                                                                 
                                                                                'type'          => 'text' 
                                                                                , 'id'          => 'wh_bookingmanager_date2fixeddates'  
                                                                                , 'name'        => 'wh_bookingmanager_date2fixeddates'  
                                                                                , 'label'       => __('Check-out' , 'booking-manager') . ':'
                                                                                , 'disabled'    => false
                                                                                , 'class'       => 'wpdevbk-filters-section-calendar'                  // This class add datepicker
                                                                                , 'style'       => ''
                                                                                , 'placeholder' => date( 'Y-m-d' )                                                                                                                                   
                                                                                , 'attr'        => array()       
                                                                                , 'value' => isset( $_REQUEST[ 'wh_bookingmanager_date2fixeddates'] ) ? esc_attr( $_REQUEST[ 'wh_bookingmanager_date2fixeddates'] ) : ''
                                                                              )                                                        
                                                                     )                                                     
                                                    , 'divider3' => 'divider'  
                                                    , 'custom' => array( array(  'type' => 'group', 'class' => 'input-group text-group') 
                                                                        , array( 
                                                                                'type' => 'radio'
                                                                              , 'label' => __('Tada' , 'booking-manager')
                                                                              , 'id' => 'wh_bookingmanager_datedays_interval4' 
                                                                              , 'name' => 'wh_bookingmanager_datedays_interval_Radios'                                                                                            
                                                                              , 'style' => ''                     // CSS of select element
                                                                              , 'class' => ''                     // CSS Class of select element                                                                                
                                                                              , 'disabled' => false
                                                                              , 'attr' => array()                 // Any  additional attributes, if this radio | checkbox element 
                                                                              , 'legend' => ''                    // aria-label parameter 
                                                                              , 'value' => '10'                     // Some Value from optins array that selected by default                                      
                                                                              , 'selected' => ( isset($_REQUEST[ 'wh_bookingmanager_datedays_interval_Radios'] ) 
                                                                                                && ( $_REQUEST[ 'wh_bookingmanager_datedays_interval_Radios'] == '10' ) ) ? true : false
                                                                              )
                                                        
                                                                        , array(                                                                                 
                                                                                'type'          => 'text' 
                                                                                , 'id'          => 'wh_bookingmanager_datecustom'  
                                                                                , 'name'        => 'wh_bookingmanager_datecustom'  
                                                                                , 'label'       => __('Custom' , 'booking-manager') . ':'
                                                                                , 'disabled'    => false
                                                                                , 'class'       => ''
                                                                                , 'style'       => ''
                                                                                , 'placeholder' => date( 'Y' )                                                                                                                                   
                                                                                , 'attr'        => array()    
                                                                                , 'value' => isset( $_REQUEST[ 'wh_bookingmanager_datecustom'] ) ? esc_attr( $_REQUEST[ 'wh_bookingmanager_datecustom'] ) : ''
                                                                              )
                                                                        )
                                                    , 'divider4' => 'divider'  
                                                    , 'buttons' => array( array(  'type' => 'group', 'class' => 'btn-group' ), 
                                                                        array( 
                                                                                  'type' => 'button' 
                                                                                , 'title' => __('Apply' , 'booking-manager')                     // Title of the button
                                                                                , 'hint' => ''                      // , 'hint' => array( 'title' => __('Select status' , 'booking-manager') , 'position' => 'bottom' )
                                                                                , 'link' => 'javascript:void(0)'    // Direct link or skip  it
                                                                                , 'action' => "wpbm_show_selected_in_dropdown__radio_select_option("
                                                                                                                                                 . "  'wh_bookingmanager_date'"
                                                                                                                                                 . ", 'wh_bookingmanager_date2'"
                                                                                                                                                 . ", 'wh_bookingmanager_datedays_interval_Radios' "
                                                                                                                                                 . ");"
                                                                                                                    // Some JavaScript to execure, for example run  the function
                                                                                , 'class' => 'button-primary'       // button-secondary  | button-primary
                                                                                , 'icon' => ''
                                                                                , 'font_icon' => ''
                                                                                , 'icon_position' => 'left'         // Position  of icon relative to Text: left | right
                                                                                , 'style' => ''                     // Any CSS class here
                                                                                , 'mobile_show_text' => false       // Show  or hide text,  when viewing on Mobile devices (small window size).
                                                                                , 'attr' => array()
                                                                            
                                                                              )
                                                                        , array( 
                                                                                  'type' => 'button' 
                                                                                , 'title' => __('Close' , 'booking-manager')                     // Title of the button
                                                                                , 'hint' => ''                      // , 'hint' => array( 'title' => __('Select status' , 'booking-manager') , 'position' => 'bottom' )
                                                                                , 'link' => 'javascript:void(0)'    // Direct link or skip  it
                                                                                //, 'action' => ''                    // Some JavaScript to execure, for example run  the function
                                                                                , 'class' => 'button-secondary'     // button-secondary  | button-primary
                                                                                , 'icon' => ''
                                                                                , 'font_icon' => ''
                                                                                , 'icon_position' => 'left'         // Position  of icon relative to Text: left | right
                                                                                , 'style' => ''                     // Any CSS class here
                                                                                , 'mobile_show_text' => false       // Show  or hide text,  when viewing on Mobile devices (small window size).
                                                                                , 'attr' => array()                                                                            
                                                                              )
                                                                        )
                                                )
                        );            
            wpbm_bs_dropdown_list( $params );                     


Exmaple #3:
            $params = array(                                                    
                          'id'  => 'wh_pay_status'
                        // , 'id2' => 'wh_bookingmanager_date2'
                        , 'default' =>  ( isset( $_REQUEST[ 'wh_pay_status' ] ) ) ? esc_attr( $_REQUEST[ 'wh_pay_status' ] ) : 'all'
                        // , 'default2' => ( isset( $_REQUEST[ 'wh_bookingmanager_date2' ] ) ) ? esc_attr( $_REQUEST[ 'wh_bookingmanager_date2' ] ) : ''
                        , 'hint' => array( 'title' => __('Payment status' , 'booking-manager') , 'position' => 'top' )
                        , 'label' => ''//__('Booked Dates', 'booking-manager') . ':'
                        , 'title' => __('Payment', 'booking-manager')                                                              
                        , 'options' => array (
                                                __('Any Status' , 'booking-manager')       =>'all',
                                                'divider0' => 'divider',
                                                __('Paid OK' , 'booking-manager') =>'group_ok',
                                                __('Unknown Status' , 'booking-manager')    =>'group_unknown',
                                                __('Not Completed' , 'booking-manager')     =>'group_pending',
                                                __('Failed' , 'booking-manager')            =>'group_failed'
                                                , 'divider2' => 'divider'                                
                                                , 'custom' => array( array(  'type' => 'group', 'class' => 'input-group text-group') 
                                                                    , array( 
                                                                            'type' => 'radio'
                                                                          , 'label' => __('Custom' , 'booking-manager') 
                                                                          , 'id' => 'wh_pay_statuscustom_radios1' 
                                                                          , 'name' => 'wh_pay_statuscustom_Radios'                                                                                            
                                                                          , 'style' => ''                     // CSS of select element
                                                                          , 'class' => ''                     // CSS Class of select element                                                                                
                                                                          , 'disabled' => false
                                                                          , 'attr' => array()                 // Any  additional attributes, if this radio | checkbox element 
                                                                          , 'legend' => ''                    // aria-label parameter 
                                                                          , 'value' => '1'                     // Some Value from optins array that selected by default                                      
                                                                          , 'selected' => ( isset($_REQUEST[ 'wh_pay_statuscustom_Radios'] ) 
                                                                                            && ( $_REQUEST[ 'wh_pay_statuscustom_Radios'] == '1' ) ) ? true : false
                                                                          )

                                                                    , array(                                                                                 
                                                                            'type'          => 'text' 
                                                                            , 'id'          => 'wh_pay_statuscustom'  
                                                                            , 'name'        => 'wh_pay_statuscustom'  
                                                                            , 'label'       => __('Payment status' , 'booking-manager') . ':'
                                                                            , 'disabled'    => false
                                                                            , 'class'       => ''
                                                                            , 'style'       => ''
                                                                            , 'placeholder' => ''
                                                                            , 'attr'        => array()    
                                                                            , 'value' => isset( $_REQUEST[ 'wh_pay_statuscustom'] ) ? esc_attr( $_REQUEST[ 'wh_pay_statuscustom'] ) : ''
                                                                          )
                                                                    )
                                                , 'divider4' => 'divider'  
                                                , 'buttons' => array( array(  'type' => 'group', 'class' => 'btn-group' ), 
                                                                    array( 
                                                                              'type' => 'button' 
                                                                            , 'title' => __('Apply' , 'booking-manager')                     // Title of the button
                                                                            , 'hint' => ''                      // , 'hint' => array( 'title' => __('Select status' , 'booking-manager') , 'position' => 'bottom' )
                                                                            , 'link' => 'javascript:void(0)'    // Direct link or skip  it
                                                                            , 'action' => "wpbm_show_selected_in_dropdown__radio_select_option("
                                                                                                                                             . "  'wh_pay_status'"
                                                                                                                                             . ", ''"
                                                                                                                                             . ", 'wh_pay_statuscustom_Radios' "
                                                                                                                                             . ");"
                                                                                                                // Some JavaScript to execure, for example run  the function
                                                                            , 'class' => 'button-primary'       // button-secondary  | button-primary
                                                                            , 'icon' => ''
                                                                            , 'font_icon' => ''
                                                                            , 'icon_position' => 'left'         // Position  of icon relative to Text: left | right
                                                                            , 'style' => ''                     // Any CSS class here
                                                                            , 'mobile_show_text' => false       // Show  or hide text,  when viewing on Mobile devices (small window size).
                                                                            , 'attr' => array()

                                                                          )
                                                                    , array( 
                                                                              'type' => 'button' 
                                                                            , 'title' => __('Close' , 'booking-manager')                     // Title of the button
                                                                            , 'hint' => ''                      // , 'hint' => array( 'title' => __('Select status' , 'booking-manager') , 'position' => 'bottom' )
                                                                            , 'link' => 'javascript:void(0)'    // Direct link or skip  it
                                                                            //, 'action' => ''                    // Some JavaScript to execure, for example run  the function
                                                                            , 'class' => 'button-secondary'     // button-secondary  | button-primary
                                                                            , 'icon' => ''
                                                                            , 'font_icon' => ''
                                                                            , 'icon_position' => 'left'         // Position  of icon relative to Text: left | right
                                                                            , 'style' => ''                     // Any CSS class here
                                                                            , 'mobile_show_text' => false       // Show  or hide text,  when viewing on Mobile devices (small window size).
                                                                            , 'attr' => array()                                                                            
                                                                          )
                                                                    )
                                            )
                    );            
            wpbm_bs_dropdown_list( $params );                 

 */
function wpbm_bs_dropdown_list( $args = array() ) {
    
    $milliseconds = round(microtime(true) * 1000);
    
    $defaults = array(
                        'id' => ''                                              // HTML ID  of element
                        , 'id2' => ''                                           // HTML ID  of 2nd element
                        , 'default' => ''                                       // Some Value from optins array that selected by default
                        , 'default2' => ''                                      // Some Value from optins array that selected by default
                        , 'hint' => ''                                          // Hint // array( 'title' => __('Delete' , 'booking-manager') , 'position' => 'bottom' ) 
                        , 'css_classes' => ''        
                        , 'label' => ''                                         // Label of element "at Top of element"
                        , 'title' => ''                                         // Title of element "Inside of element"
                        , 'align' => 'left'                                     // Align: left | right                                               
                        , 'options' => array()                                  // Associated array  of titles and values 
                        , 'disabled' => array()                                 // If some options disbaled,  then its must list  here
                    );
    $params = wp_parse_args( $args, $defaults );

    // Check  if this list Simple or Complex (with  input elements) ////////////
    $is_this_simple_list = true;
    foreach ( $params['options'] as $key => $value ) {
        if ( is_array( $value ) ) {                                             
            $is_this_simple_list = false;
            break;
        }    
    }    

    // Selected Value //////////////////////////////////////////////////////////
    $wpbm_value = $params[ 'default' ];
        
    $wpbm_selector_default = array_search( $wpbm_value, $params['options'] );
    if ( $wpbm_selector_default === false ) {
        $wpbm_selector_default = key( $params['options'] );
        $wpbm_selector_default_value = current( $params['options'] );
    } else
        $wpbm_selector_default_value = $wpbm_value;
    
    $wpbm_selector_default_value2 = $params[ 'default2' ];    
    
    // Initial setting title,  if already  was request /////////////////////////
      if ( isset( $_REQUEST[ esc_attr( $params['id'] ) ] ) ) { 
        ?><script type="text/javascript">        
            jQuery(document).ready( function(){
                jQuery('#<?php echo esc_attr( $params['id'] ); ?>_container .button.button-primary').trigger( "click" );
            });                 
           </script><?php       
      } 
    ////////////////////////////////////////////////////////////////////////////
    ?>   
      <div class="control-group">
        <?php if ( ! empty( $params['label'] ) ) {             
            ?><label for="<?php echo $params['id']; ?>" class="control-label"><?php echo $params['label']; ?></label><?php
        }
        ?><div>
            <div class="btn-group">                    
              <a href="javascript:void(0)" 
                 <?php if (! $is_this_simple_list ) { ?>
                 onclick="javascript:jQuery('#<?php echo $params['id']; ?>_container').show();"
                 <?php } ?>
                 data-toggle="dropdown" 
                 id="<?php echo $params['id'];?>_selector" 
                  <?php if ( ! empty( $params['hint'] ) ) { ?>
                 title="<?php  echo esc_js( $params['hint']['title'] ); ?>"
                  <?php } ?>                 
                 class="button button-secondary dropdown-toggle <?php 
                        echo ( ! empty( $params['hint'] ) ) ? 'tooltip_' . $params['hint']['position'] . ' ' : '' ;  
                        echo ( ! empty( $params['css_classes'] ) ) ? $params['css_classes'] . ' ' : '' ;  
                        ?>"                 
                 <?php echo wpbm_get_custom_attr( $params ); ?>
                 ><label class="label_in_filters"
                      ><?php echo $params['title']; ?>: </label> <span class="wpbm_selected_in_dropdown"><?php echo $wpbm_selector_default; ?></span> &nbsp; <span class="caret"></span></a>
              <ul   
                  id="<?php echo $params['id']; ?>_container"
                  class="dropdown-menu dropdown-menu-<?php echo $params['align']; ?>" 
                   ><?php
                   
                    wpbm_bs_list_of_options_for_dropdown( $params , 'list', $is_this_simple_list );
                   
            ?></ul>
              <input type="hidden" autocomplete="off" value="<?php echo $wpbm_selector_default_value; ?>" id="<?php echo $params['id']; ?>"  name="<?php echo $params['id']; ?>" />
              <?php if ( ! empty($params['id2'] ) ) { ?>
                    <input type="hidden" autocomplete="off" value="<?php echo $wpbm_selector_default_value2; ?>" id="<?php echo $params['id2']; ?>"  name="<?php echo $params['id2']; ?>" />
              <?php } ?>
            </div>
        </div>
      </div>
    <?php
}



////////////////////////////////////////////////////////////////////////////////
//  Drop Down Menu
////////////////////////////////////////////////////////////////////////////////

/** Show Dropdown Menu
 * 
 * Usage: 

wpbm_dropdown_menu( array( 
                           'title' => __('Help', 'booking-manager') 
                         , 'hint' => array( 'title' => __('Help info' , 'booking-manager') , 'position' => 'bottom' )
                         , 'font_icon' => 'glyphicon glyphicon-question-sign'
                         , 'position' => 'right'
                         , 'items' => array( 
                                             array( 'type' => 'link', 'title' => __('About Plugin', 'booking-manager'), 'url' => 'https://oplugins.com/plugins/booking-manager' )
                                           , array( 'type' => 'divider' )
                                           , array( 'type' => 'text', 'title' => __('Text', 'booking-manager') )
                                           , array( 'type' => 'link', 'title' => __('Help', 'booking-manager'), 'url' => 'https://oplugins.com/plugins/booking-manager//help/' )
                                           , array( 'type' => 'link', 'title' => __('FAQ', 'booking-manager'), 'url' => 'https://oplugins.com/plugins/booking-manager/#faq' )
                                           , array( 'type' => 'link', 'title' => __('Technical Support', 'booking-manager'), 'url' => 'https://oplugins.com/plugins/booking-manager/#support' )
                                           , array( 'type' => 'divider' )
                                           , array( 'type' => 'link', 'title' => __('Upgrade Now', 'booking-manager'), 'url' => 'http://https://oplugins.com/plugins/booking-manager/', 'style' => 'font-weight: 600;' , 'attr' => array( 'target' => '_blank' ) )
                                      )
                  ) ); 
 * 
 * @param array $args
 */
function wpbm_bs_dropdown_menu( $args = array() ) {
        
        $defaults = array(
                'title' => '',
                'hint' => '',
                'icon' => '',
                'font_icon' => '',
                'position' => '',
                'items' => array()
        );        
	$params = wp_parse_args( $args, $defaults );
        
    ?><span class="dropdown <?php echo ( ( $params['position'] == 'right' ) ? 'pull-right' : '' ); ?>">              
        <a href="javascript:void(0)" 
           data-toggle="dropdown" 
           aria-expanded="true"
            <?php if ( ! empty( $params['hint'] ) ) { ?>
              title="<?php  echo esc_js( $params['hint']['title'] ); ?>"
            <?php } ?>           
           class="dropdown-toggle nav-tab <?php 
              echo ( ! empty( $params['hint'] ) ) ? 'tooltip_' . $params['hint']['position'] . ' ' : '' ;  
               ?>"><?php
           
           if ( ! empty( $params['icon'] ) ) {                                
                
                if ( substr( $params['icon'], 0, 4 ) != 'http') $img_path = WPBM_PLUGIN_URL . '/assets/img/' . $params['icon'];
                else                                            $img_path = $params['icon'];
                              
                ?><img class="menuicons" src="<?php echo $img_path; ?>"><?php      // Img  Icon
                         
            } elseif ( ! empty( $params['font_icon'] ) ) {                     
                
                 ?><i class="menu_icon icon-1x <?php echo $params['font_icon']; ?>"></i>&nbsp;<?php                              // Font Icon
                 
            } ?><span 
                    class="nav-tab-text"><?php echo $params['title']; ?></span>&nbsp;<b 
                    class="caret" style="border-top-color: #333333 !important;"></b></a>
        <ul class="dropdown-menu" role="menu" style="<?php echo ( ( $params['position'] == 'right' ) ? 'right:0px; left:auto;' : '' ); ?>">
            <?php
            foreach ( $params['items'] as $items ) {
                switch ( $items['type'] ) {
                    
                    case 'divider':
                            ?><li class="divider"></li><?php
                        break;

                    case 'text':
                            ?><li <?php echo wpbm_get_custom_attr( $items ); ?> ><?php echo $items['title']; ?></li><?php
                        break;

                    default:
                        ?><li><a <?php echo wpbm_get_custom_attr( $items ); ?> href="<?php echo $items['url']; ?>"><?php echo $items['title']; ?></a></li><?php
                        break;
                }
            }
            ?>
        </ul>
    </span><?php
}



////////////////////////////////////////////////////////////////////////////////
//  Vertical Buttons Group
////////////////////////////////////////////////////////////////////////////////

/** Devine Vertical Buttons Group
 * 
 * @param array $params
 * 
 *  Example:
    $params['btn_vm_calendar'] = array(
                                  'title' => ''
                                , 'hint' => array( 'title' => __('Calendar Overview' , 'booking-manager') , 'position' => 'bottom' )
                                , 'selected' => ( $selected_view_mode == 'vm_calendar' ) ? true : false
                                , 'link' => $bk_admin_url . '&view_mode=vm_calendar'
                                , 'icon' => ''
                                , 'font_icon' => 'glyphicon glyphicon-calendar'
                            );

 */
function wpbm_bs_vertical_buttons_group( $params ) {        
          
    ?><div role="group" class="btn-group-vertical" aria-label="..." ><?php 

        foreach ( $params as $btn_id => $btn_params ) {

            ?><a    id="<?php echo $btn_id; ?>" 
                  <?php if ( ! empty( $btn_params['hint'] ) ) { ?>
                    title="<?php  echo esc_js( $btn_params['hint']['title'] ); ?>"
                  <?php 
                  /* data-original-title="<?php  echo esc_js( $btn_params['hint'] ); ?>" */                      
                  } ?>                        
                    class="button button-secondary <?php 
                            echo ( $btn_params['selected'] ) ? 'active ' : '' ;  
                            echo ( ! empty( $btn_params['hint'] ) ) ? 'tooltip_' . $btn_params['hint']['position'] . ' ' : '' ;  
                            echo ( ! empty( $btn_params['css_classes'] ) ) ? $btn_params['css_classes'] . ' ' : '' ;  
                        ?>" 
                    href="<?php echo $btn_params['link']; ?>" 
                    onclick="javascript:void(0)" 
               ><?php 
               
                    // Icon
                    $is_icon_not_showed = false;                
                    if ( ! empty( $btn_params['icon'] ) ) {                                

                        if ( substr( $btn_params['icon'], 0, 4 ) != 'http')
                            $img_path = WPBM_PLUGIN_URL . '/assets/img/' . $btn_params['icon'];
                        else
                            $img_path = $btn_params['icon'];

                        ?><img class="menuicons" src="<?php echo $img_path; ?>" style="width:20px;" /><?php     // IMG  Icon

                    } elseif ( ! empty( $btn_params['font_icon'] ) ) {                     

                         ?><i class="menu_icon icon-1x <?php echo $btn_params['font_icon']; ?>"></i><?php              // Font Icon
                    } else {
                        $is_icon_not_showed = true;
                    }

                    // Text
                    if (  ( ! empty( $btn_params['title'] ) ) && (  ( $is_icon_not_showed ) )  ){
                        ?><span class="btn-group-vertical-text" >&nbsp;<?php echo esc_js( $btn_params['title'] ); ?></span><?php                            
                    }

            ?></a><?php
        }
        
    ?></div><?php      
    
}



////////////////////////////////////////////////////////////////////////////////
//  Navigation Toolbar Tabs
////////////////////////////////////////////////////////////////////////////////

/** Display Tab in Navigation line
 * 
 * @param array $args
                        array(                       
                                  'title' => ''                                 // Title of TAB                           
                                , 'hint' => array( 'title' => '', 'position' => 'bottom' )          // Hint    
                                , 'link' => 'javascript:void(0)'                // Can be skiped,  then generated link based on Page and Tab tags. Or can  be extenral link
                                , 'onclick' => ''                               // JS action
                                , 'position' => ''                              // 'left'  ||  'right'  ||  ''
                                , 'css_classes' => ''                           // CSS class(es)
                                , 'icon' => ''                                  // Icon - link to the real PNG img
                                , 'font_icon' => ''                             // CSS definition  of forn Icon
                                , 'default' => false                            // Is it activated by default: true || false. 
                                , 'disabled' => false                           // Is this sub tab deactivated: true || false. 
                                , 'checkbox'  => false                          // false or definition array  for specific checkbox: array( 'checked' => true, 'name' => 'feature1_active_status', 'value' => '', 'onclick' => '' )
                                , 'top' => true                                 // Top or Bottom TAB: true || false. 
                        )
 */
function wpbm_bs_display_tab( $args = array() ) {

    $defaults = array(
            'top' => true, 
            'title' => '',
            'hint' => '',
            'link' => 'javascript:void(0)',
            'onclick' => '',
            'css_classes' => '',
            'icon' => '',
            'font_icon' => '', 
            'checkbox' => false,
            'disabled' => false,
            'default' => false        
    );

    $tab = wp_parse_args( $args, $defaults );


    if (  ( ! empty( $tab['hint'] ) ) && ( is_string( $tab['hint'] ) )  ) {     // Compatibility with previous hint declaration

        if ( $tab['top'] === true ) $tab['hint'] = array( 'title' => $tab['hint'], 'position' => 'top' );
        else                        $tab['hint'] = array( 'title' => $tab['hint'], 'position' => 'bottom' );        
    }
    
    
    $html_tag = 'a';

    if ( $tab['disabled'] ) {
        $tab['link'] = 'javascript:void(0)';
        $html_tag = 'span';
    }


    echo '<' , $html_tag , ' ';                                                 // Start HTML Tag

    if ( $html_tag == 'a' ) {                                                   // Paramters for A tag

        echo ' href="' , $tab['link'] ,  '" ';
        //echo ' title="' , esc_js( $tab['title'] ) ,  '" ';

        if ( ! empty( $tab['onclick'] ) )
            echo ' onclick="javascript:' , $tab['onclick'] ,  '" ';          
    } 
    
    if ( ! empty( $tab['hint'] ) ) {                                            // Hint
        echo ' title="' , esc_js( $tab['hint']['title'] ) ,  '" ';
    } 

    echo ' class="nav-tab';                                                     // CSS Classes

            if ( $tab['top'] !== true )         echo ' wpdevelop-submenu-tab'; 
            if ( $tab['default'] )              echo ' nav-tab-active';                     
            if ( $tab['disabled'] )             echo ' wpdevelop-tab-disabled';             
            if ( ! empty( $tab['hint'] ) )      echo ' tooltip_' , $tab['hint']['position'];              
            if ( ! empty( $tab['position'] ) )  echo ' nav-tab-position-' , $tab['position'];             
            if ( ! empty( $tab['hided'] ) )     echo ' hide'; 
                        
            echo ' ' , $tab['css_classes']; 

    echo '" ';
            
    echo wpbm_get_custom_attr( $tab ); 
    echo '>';                                                                   // Close  >  for A  or SPAN


        // Icon
        $is_icon_showed = true;                
        if ( ! empty( $tab['icon'] ) ) {                                

            if ( substr( $tab['icon'], 0, 4 ) != 'http')
                $img_path = WPBM_PLUGIN_URL . '/assets/img/' . $tab['icon'];
            else
                $img_path = $tab['icon'];

            ?><img class="menuicons" src="<?php echo $img_path; ?>" style="width:20px;" /><?php     // IMG  Icon

        } elseif ( ! empty( $tab['font_icon'] ) ) {                     

             ?><i class="menu_icon icon-1x <?php echo $tab['font_icon']; ?>"></i><?php              // Font Icon
        } else {
            $is_icon_showed = false;
        }

        // Text

        ?><span class="<?php echo ( $is_icon_showed ) ? 'nav-tab-text' : '';  ?>" ><?php 
            echo ( $is_icon_showed ) ? '&nbsp;&nbsp;' : ''; 
            echo $tab['title']; 
        ?></span><?php                            

        // C h e c k b o x                                        
        if ( $tab['checkbox'] !== false ) {                                                                         
            ?><input type="checkbox" 
                    <?php if ( $tab['checkbox']['checked'] ) echo ' checked="CHECKED" '; ?>
                    name="<?php echo $tab['checkbox']['name']; ?>_dublicated" 
                    id="<?php echo $tab['checkbox']['name']; ?>_dublicated"
                    value="<?php echo (  isset( $tab['checkbox']['value'] ) ? $tab['checkbox']['value'] : ''  ); ?>"
                    onchange="javascript: <?php if (  isset( $tab['checkbox']['onclick'] )  ) { 
                                                    echo $tab['checkbox']['onclick'];
                                                } else {
                                                    ?>if ( jQuery('#<?php echo $tab['checkbox']['name']; ?>').length > 0 ) { document.getElementById('<?php echo $tab['checkbox']['name']; ?>').checked = this.checked; }<?php 
                                                }
                            ?>"                    
                    /><?php
        } 


    echo '</' , $html_tag , '>';     


    if ( 
            ( isset( $tab['top'] ) ) && ( $tab['top'] ) 
            && ( isset( $tab['position'] ) ) && ( $tab['position'] !== 'right' )    //FixIn: 6.0.1.13
        )
        echo '&nbsp;';
}

function wpbm_bs_toolbar_tabs_html_container_start() {
    
    ?>
    <div class="wpdvlp-top-tabs">
        <div class="wpdvlp-tabs-wrapper">
            <div class="nav-tabs" ><?php                                        // T O P    T A B S    
}

function wpbm_bs_toolbar_tabs_html_container_end() {
    
          ?></div><!-- nav-tabs -->            
        </div><!-- wpdvlp-tabs-wrapper -->
    </div><!-- wpdvlp-top-tabs --><?php    
}

function wpbm_bs_toolbar_sub_html_container_start() {
                                                                                // S U B    T A B S     or      U I  elements
    ?><div class="wpdvlp-sub-tabs">
        <div class="wpdvlp-tabs-wrapper">
            <div class="nav-tabs"><?php                                     
}

function wpbm_bs_toolbar_sub_html_container_end() {
    
          ?><div class="clear"></div>
            </div><!-- nav-tabs -->            
        </div><!-- wpdvlp-tabs-wrapper -->
    </div><!-- wpdvlp-sub-tabs --><?php    
}



////////////////////////////////////////////////////////////////////////////////
//  HTML sections and groups
////////////////////////////////////////////////////////////////////////////////

/** Clear Div */
function wpbm_clear_div() {
    ?><div class="clear"></div><?php 
}



////////////////////////////////////////////////////////////////////////////////
//  JS & CSS 
////////////////////////////////////////////////////////////////////////////////
/** Tooltips JavaScript functions */
function wpbm_bs_javascript_tooltips() {
    
    ?><span id="wpbm_tooltips_container"></span><?php
    
    ?><script type="text/javascript">
        jQuery(document).ready( function(){
          jQuery('.tooltip_right').tooltip( {
              animation: true
            , delay: { show: 500, hide: 100 }
            , selector: false
            , placement: 'right'
            , trigger: 'hover'
            , title: ''
            , template: '<div class="wpdevelop tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>'
            , container: '#wpbm_tooltips_container'
            , viewport: '#wpbody-content'
          });

          jQuery('.tooltip_left').tooltip( {
              animation: true
            , delay: { show: 500, hide: 100 }
            , selector: false
            , placement: 'left'
            , trigger: 'hover'
            , title: ''
            , template: '<div class="wpdevelop tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>'
            , container: '#wpbm_tooltips_container'
            , viewport: '#wpbody-content'
          });

          jQuery('.tooltip_top').tooltip( {
              animation: true
            , delay: { show: 500, hide: 100 }
            , selector: false
            , placement: 'top'
            , trigger: 'hover'
            , title: ''
            , template: '<div class="wpdevelop tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>'
            , container: '#wpbm_tooltips_container'
            , viewport: '#wpbody-content'
          });

          jQuery('.tooltip_bottom').tooltip( {
              animation: true
            , delay: { show: 500, hide: 100 }
            , selector: false
            , placement: 'bottom'
            , trigger: 'hover'
            , title: ''
            , template: '<div class="wpdevelop tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>'
            , container: '#wpbm_tooltips_container'
            , viewport: '#wpbody-content'
          });

          jQuery('.tooltip_top_slow').tooltip( {
              animation: true
            , delay: { show: 2500, hide: 100 }
            , selector: false
            , placement: 'top'
            , trigger: 'hover'
            , title: ''
            , template: '<div class="wpdevelop tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>'
            , container: '#wpbm_tooltips_container'
            , viewport: '#wpbody-content'
          });
            
         });
    </script><?php 
}
    
    
/** Popover JavaScript functions */
function wpbm_bs_javascript_popover() {    
    
    ?><script type="text/javascript">
        jQuery(document).ready( function(){
                    
            jQuery('.popover_click.popover_bottom').popover( {
                  placement: 'bottom'	//FixIn: 8.4.5.12
                , trigger:'manual'  
                //, delay: {show: 100, hide: 8}
                , content: ''
                , template: '<div class="popover" role="tooltip"><div class="arrow"></div><div class="popover-close"><a href="javascript:void(0)" data-dismiss="popover" aria-hidden="true">&times;</a></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
                , container: '.wpbm_container_frame'
                , html: 'true'
            });
            jQuery('.popover_click.popover_top').popover( {
                  placement: 'top auto'
                , trigger:'manual'  
                //, delay: {show: 100, hide: 8}
                , content: ''
                , template: '<div class="popover" role="tooltip"><div class="arrow"></div><div class="popover-close"><a href="javascript:void(0)" data-dismiss="popover" aria-hidden="true">&times;</a></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
                , container: '.wpbm_container_frame'
                , html: 'true'
            });
            jQuery('.popover_click.popover_left').popover( {
                  placement: 'left auto'
                , trigger:'manual'  
                //, delay: {show: 100, hide: 8}
                , content: ''
                , template: '<div class="popover" role="tooltip"><div class="arrow"></div><div class="popover-close"><a href="javascript:void(0)" data-dismiss="popover" aria-hidden="true">&times;</a></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
                , container: '.wpbm_container_frame'
                , html: 'true'
            });
            jQuery('.popover_click.popover_right').popover( {
                  placement: 'right auto'
                , trigger:'manual'  
                //, delay: {show: 100, hide: 8}
                , content: ''
                , template: '<div class="popover" role="tooltip"><div class="arrow"></div><div class="popover-close"><a href="javascript:void(0)" data-dismiss="popover" aria-hidden="true">&times;</a></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
                , container: '.wpbm_container_frame'
                , html: 'true'
            });
           
            // Close popover by clicking on X button
            jQuery(document).on("click", ".popover .popover-close a" , function(){  
                  jQuery(this).parents(".popover").popover('hide');
            });
            // Show or hide popover on click at target element
            jQuery(document).on("click", ".popover_click" , function(){  
                jQuery(this).popover('toggle');
                
                //Solving Issue: sometime,  when many elements at  the page with  long popover, its can overlap  exist  elements, and then  its does not possible to  click on elements.     
                jQuery('.wpbm_container_ajax_replace .popover.fade.bottom:not(.in)').css('left','-9000px'); 
                  
            });

            jQuery('.popover_hover.popover_bottom').popover( {
                  placement: 'bottom'	//FixIn: 8.4.5.12
                , trigger:'hover'  
                , delay: {show: 100, hide: 100}
                , content: ''
                , template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
                , container: '.wpbm_container_frame'
                , html: 'true'
            });
            jQuery('.popover_hover.popover_top').popover( {
                  placement: 'top auto'
                , trigger:'hover'  
                , delay: {show: 100, hide: 100}
                , content: ''
                , template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
                , container: '.wpbm_container_frame'
                , html: 'true'
            });
            jQuery('.popover_hover.popover_left').popover( {
                  placement: 'left auto'
                , trigger:'hover'  
                , delay: {show: 100, hide: 100}
                , content: ''
                , template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
                , container: '.wpbm_container_frame'
                , html: 'true'
            });
            jQuery('.popover_hover.popover_right').popover( {
                  placement: 'right auto'
                , trigger:'hover'  
                , delay: {show: 100, hide: 100}
                , content: ''
                , template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
                , container: '.wpbm_container_frame'
                , html: 'true'
            });
                   
          //////////////////////////////////////////////////////////////////////
          //////////////////////////////////////////////////////////////////////
        });
    </script><?php 
}
    


////////////////////////////////////////////////////////////////////////////////
// S U P P O R T 
////////////////////////////////////////////////////////////////////////////////

/** Get custom atrributes for HTML elements
 * 
 * @param array $field
 * @return type
 */
function wpbm_get_custom_attr( $field ) {

        $attributes = array();

        if ( ! empty( $field['attr'] ) && is_array( $field['attr'] ) ) {

            foreach ( $field['attr'] as $attr => $attr_v ) {
                $attributes[] = esc_attr( $attr ) . '="' . esc_attr( $attr_v ) . '"';
            }
        }

        return implode( ' ', $attributes );
}