<?php
class element_gva_column{
	public function render_form(){
		return array(
			'title'	=> t('Column'),
         'key'    => 'gva_column',
			'fields'	=> array(
		      array(
		        'id'        => 'info',
		        'type'      => 'info',
		        'title'      => 'Setting background for column'
		      ),
		      array(
		        'id'       => 'bg_image',
		        'type'     => 'upload',
		        'title'    => ('Background Image'),
		      ),
		      array(
		        'id'          => 'bg_color',
		        'type'        => 'text',
		        'title'       => ('Background Color'),
		        'desc'        => ('Use color name (eg. "gray") or hex (eg. "#808080").'),
		      ),
		      array(
		        'id'         => 'bg_position',
		        'type'       => 'select',
		        'title'      => t('Background Position'),
              'class'       => 'width-1-4',
		        'options'    => array(
		          'center top' 			=> 'center top',
		          'center right' 		=> 'center right',
		          'center bottom' 		=> 'center bottom',
		          'center center' 		=> 'center center',
		          'left top' 			=> 'left top',
		          'left center' 		=> 'left center',
		          'left bottom' 		=> 'left bottom',
		          'right top' 			=> 'right top',
		          'right center' 		=> 'right center',
		          'right bottom' 		=> 'right bottom',
		        )
		      ),
		      array(
		        'id'         => 'bg_repeat',
		        'type'       => 'select',
		        'title'      => t('Background Position'),
              'class'       => 'width-1-4',
		        'options'    => array(
		          'no-repeat' 	=> 'no-repeat',
		          'repeat' 		=> 'repeat',
		          'repeat-x' 	=> 'repeat-x',
		          'repeat-y' 	=> 'repeat-y',
		          )
		      ),

		      array(
		        'id'         => 'bg_attachment',
		        'type'       => 'select',
		        'title'      => t('Background Attachment'),
              'class'       => 'width-1-4',
		        'options'    => array(
		          'scroll'    => 'Scroll',
		          'fixed'     => ' Parallax',
              'bg-fixed'  => 'Fixed',
		          ),
		        'std'         => 'scroll'
		      ),
		      
		      array(
		        'id'         => 'bg_size',
		        'type'       => 'select',
		        'title'      => t('Background Size'),
              'class'       => 'width-1-4',
		        'options'    => array(
		            'cover'      => 'cover',
		            'contain'    => 'contain',
		            'default'    => 'default'
		          ),
		        'std'         => 'cover'
		      ),

		      array(
		        'id'        => 'info',
		        'type'      => 'info',
		        'title'      => 'Setting padding, margin for column'
		      ),
		      array(
		        'id'        => 'padding_top',
		        'type'      => 'text',
		        'title'     => ('Padding Top'),
		        'desc'      => ('Padding Top for column (e.g. 30)'),
		        'class'     => 'width-1-4',
		        'std'       => '0',
		      ),
		      array(
		        'id'          => 'padding_right',
		        'type'        => 'text',
		        'title'       => ('Padding Right'),
		        'desc'        => ('Padding Right for column (e.g. 30)'),
		        'class'     => 'width-1-4',
		        'std'         => '0',
		      ),
		      array(
		        'id'          => 'padding_bottom',
		        'type'        => 'text',
		        'title'       => ('Padding Bottom'),
		        'desc'        => ('Padding Bottom for column (e.g. 30)'),
		        'class'     => 'width-1-4',
		        'std'         => '0',
		      ),
		      array(
		        'id'          => 'padding_left',
		        'type'        => 'text',
		        'title'       => ('Padding Left'),
		        'desc'        => ('Padding Left for column (e.g. 30)'),
		        'class'     => 'width-1-4',
		        'std'         => '0',
		      ),

		      array(
		        'id'        => 'info',
		        'type'      => 'info',
		        'title'      => 'Setting padding, margin for column'
		      ),

		      array(
		        'id'          => 'margin_top',
		        'type'        => 'text',
		        'title'       => ('Margin Top'),
		        'desc'        => ('Margin top for column (e.g. 30)'),
		        'class'     => 'width-1-4',
		        'std'         => '0',
		      ),
		      array(
		        'id'          => 'margin_right',
		        'type'        => 'text',
		        'title'       => ('Margin Right'),
		        'desc'        => ('Margin Right for column (e.g. 30)'),
		        'class'     => 'width-1-4',
		        'std'         => '0',
		      ),
		      array(
		        'id'          => 'margin_bottom',
		        'type'        => 'text',
		        'title'       => ('Margin Bottom'),
		        'desc'        => ('Margin Bottom for column (e.g. 30)'),
		        'class'     => 'width-1-4',
		        'std'         => '0',
		      ),
		      array(
		        'id'          => 'margin_left',
		        'type'        => 'text',
		        'title'       => ('Margin Left'),
		        'desc'        => ('Margin Left for column (e.g. 30)'),
		        'class'     => 'width-1-4',
		        'std'         => '0',
		      ),

		      array(
		        'id'        => 'info',
		        'type'      => 'info',
		        'title'      => 'Setting style, class, id for columns'
		      ),
          array(
            'id'         => 'vertical_align',
            'type'       => 'select',
            'title'      => t('Content Vertical Align'),
            'options'    => array(
              ''                 => 'Default',
              'align-self-start'        => 'Vertical Align Top',
              'align-self-center'       => 'Vertical Align Middle',
              'align-self-end'          => 'Vertical Align Bottom'
            )
          ),
            array(
               'id'         => 'style',
               'type'       => 'select',
               'title'      => t('Style Available'),
               'options'    => array(
                  ''                 => 'Default',
                  'column-style-1'        => 'Style 1: max-with 700px, float left, padding responsive',
                  'column-style-2'        => 'Style 2: max-with 700px, float right, padding responsive',
                  'column-style-3'        => 'Style 3: max-with 600px, float left, padding responsive',
                  'column-box-shadow'     => 'Style 4: Box Shadow',
                  'column-box-shadow-2'   => 'Style 4: Box Shadow & Padding',
               )
            ),
		      array(
		        'id'      => 'el_class',
		        'type'    => 'text',
		        'title'   => ('Custom CSS classes'),
		        'desc'    => ('Multiple classes should be separated with SPACE.'),
		      ),
		      array(
		        'id'      => 'inner_class',
		        'type'    => 'text',
		        'title'   => ('Custom for element inner CSS classes'),
		        'desc'    => ('Multiple classes should be separated with SPACE.'),
		      ),
		      
		      array(
		        'id'      => 'id_column',
		        'type'    => 'text',
		        'title'   => ('Custom ID'),
		        'desc'    => ('For example: Your Custom ID for column'),
		      ),
		      
		      array(
		        'id'        => 'info',
		        'type'      => 'info',
		        'title'      => 'Setting Responsive Visibility for Columns'
		      ),
		      array(
		        'id' => 'hidden_lg',
		        'type'    => 'select',
		        'title'   => ('Hide on large screen'),
              'class'   => 'width-1-4',
		        'options'   => array(
		          ''             => 'Show',   
		          'hidden-lg'    => 'Hidden'
		        )
		      ),
		      array(
		        'id' => 'hidden_md',
		        'type'    => 'select',
		        'title'   => ('Hide on medium screen'),
              'class'   => 'width-1-4',
		        'options'   => array(
		             ''             => 'Show',   
		             'hidden-sm'    => 'Hidden'
		        )
		      ),
		      array(
		        'id' => 'hidden_sm',
		        'type'    => 'select',
		        'title'   => ('Hide on small screen'),
              'class'   => 'width-1-4',
		        'options'   => array(
		             ''             => 'Show',   
		             'hidden-sm'    => 'Hidden'
		        )
		      ),
		      array(
		        'id' => 'hidden_xs',
		        'type'    => 'select',
		        'title'   => ('Hide on extra small screen'),
              'class'   => 'width-1-4',
		        'options'   => array(
		             ''            => 'Show',   
		             'hidden-xs'   => 'Hidden'
		        )
		      ),
            array(
              'id'        => 'info',
              'type'      => 'info',
              'title'      => 'Setting Responsive Width for Columns'
            ),
           array(
              'id' => 'col_lg_2',
              'type'    => 'select',
              'title'   => ('Large Screen < 1200px'),
              'class'   => 'width-1-4',
              'options'   => array(
                  ''         => 'Default',   
                  '1'        => '1',
                  '2'        => '2',
                  '3'        => '3',
                  '4'        => '4',
                  '5'        => '5',
                  '6'        => '6',
                  '7'        => '7',
                  '8'        => '8',
                  '9'        => '9',
                  '10'        => '10',
                  '11'        => '11',
                  '12'        => '12'
               )
            ),
            array(
              'id' => 'col_md',
              'type'    => 'select',
              'title'   => ('Medium Screen < 992px'),
              'class'   => 'width-1-4',
              'options'   => array(
                  ''         => 'Default',   
                  '1'        => '1',
                  '2'        => '2',
                  '3'        => '3',
                  '4'        => '4',
                  '5'        => '5',
                  '6'        => '6',
                  '7'        => '7',
                  '8'        => '8',
                  '9'        => '9',
                  '10'        => '10',
                  '11'        => '11',
                  '12'        => '12'
               )
            ),
            array(
              'id' => 'col_sm',
              'type'    => 'select',
              'title'   => ('Small Screen < 768px'),
              'class'   => 'width-1-4',
              'options'   => array(
                  ''         => 'Default',   
                  '1'        => '1',
                  '2'        => '2',
                  '3'        => '3',
                  '4'        => '4',
                  '5'        => '5',
                  '6'        => '6',
                  '7'        => '7',
                  '8'        => '8',
                  '9'        => '9',
                  '10'        => '10',
                  '11'        => '11',
                  '12'        => '12'
              )
            ),
            array(
              'id' => 'col_xs',
              'type'    => 'select',
              'title'   => ('Extra Small < 576px'),
              'class'   => 'width-1-4',
              'options'   => array(
                  ''         => 'Default',   
                  '1'        => '1',
                  '2'        => '2',
                  '3'        => '3',
                  '4'        => '4',
                  '5'        => '5',
                  '6'        => '6',
                  '7'        => '7',
                  '8'        => '8',
                  '9'        => '9',
                  '10'        => '10',
                  '11'        => '11',
                  '12'        => '12'
               )
            ),
            array(
              'id'        => 'info',
              'type'      => 'info',
              'title'      => 'Setting class, id for columns'
            ),
            array(
              'id'    => 'class',
              'type'    => 'text',
              'title'   => ('Custom CSS classes'),
              'desc'    => ('Multiple classes should be separated with SPACE.'),
            ),

            array(
              'id'    => 'class_inner',
              'type'    => 'text',
              'title'   => ('Custom for element inner CSS classes'),
              'desc'    => ('Multiple classes should be separated with SPACE.'),
            ),
            
            array(
              'id'    => 'column_id',
              'type'    => 'text',
              'title'   => ('Custom ID'),
              'desc'    => ('For example: Your Custom ID for column'),
              'class'   => 'small-text',
            )
		   )
    	);
	}

	public function render_content( $settings = array(), $content = '' ) {
		global $base_url, $base_path;
      extract(gavias_merge_atts(array(
         'bg_image'           	=> '',
         'bg_color'           	=> '',
         'bg_position'        	=> '',
         'bg_repeat'    			=> '',
         'bg_attachment'      	=> '',
         'bg_size'          		=> '',
         'bg_video'           	=> '',
         'padding_top'          	=> '',
         'padding_right'         => '',
         'padding_bottom'        => '',
         'padding_left'          => '',
         'margin_top'            => '',
         'margin_right'          => '',
         'margin_bottom'         => '',
         'margin_left'           => '',
         'hidden_lg'             => '',
         'hidden_md'             => '',
         'hidden_sm'             => '',
         'hidden_xs'             => '',
         'vertical_align'        => '',
         'style'                 => '',
         'el_class'				       => '',
         'inner_class'				   => '',
         'id_column'					   => '',
         'col_lg'						     => '',
         'col_lg_2'              => '',
         'col_md'						     => '',
         'col_sm'						     => '',
         'col_xs'						     => ''		
         ), $settings));
      
      //Responsive
      switch ($col_lg) {
      	case 1:
      		$default_col_lg = 1; $default_col_md = 1; $default_col_sm = 2; $default_col_xs = 6;
      		break;
      	case 2: 
      		$default_col_lg = 2;$default_col_md = 2; $default_col_sm = 4; $default_col_xs = 12;
      		break;
      	case 3: 
      		$default_col_lg = 3;$default_col_md = 6; $default_col_sm = 12; $default_col_xs = 12;
      		break;
      	case 4: 
      		$default_col_lg = 4;$default_col_md = 4; $default_col_sm = 12; $default_col_xs = 12;
      		break;
      	case 5: 
      		$default_col_lg = 5;$default_col_md = 5; $default_col_sm = 12; $default_col_xs = 12;
      		break;
      	case 6: 
      		$default_col_lg = 6;$default_col_md = 6; $default_col_sm = 12; $default_col_xs = 12;
      		break;
      	case 7: 
      		$default_col_lg = 7;$default_col_md = 7; $default_col_sm = 12; $default_col_xs = 12;
      		break;
      	case 8: 
      		$default_col_lg = 8;$default_col_md = 8; $default_col_sm = 12; $default_col_xs = 12;
      		break;
      	case 9: 
      		$default_col_lg = 9;$default_col_md = 12; $default_col_sm = 12; $default_col_xs = 12;
      		break;
      	case 10: 
      		$default_col_lg = 10;$default_col_md = 12; $default_col_sm = 12; $default_col_xs = 12;
      		break;
      	case 11: 
      		$default_col_lg = 11;$default_col_md = 12; $default_col_sm = 12; $default_col_xs = 12;
      		break;
      	case 12: 
      		$default_col_lg = 12;$default_col_md = 12; $default_col_sm = 12; $default_col_xs = 12;
      		break;
      	default:
      		$default_col_lg = 12;$default_col_md = 12; $default_col_sm = 12; $default_col_xs = 12;
      		break;
      }
        if(empty($col_lg)) $col_lg = $default_col_lg;
        if(empty($col_lg_2)) $col_lg_2 = $default_col_lg;
      	if(empty($col_md)) $col_md = $default_col_md;
      	if(empty($col_sm)) $col_sm = $default_col_sm;
      	if(empty($col_xs)) $col_xs = $default_col_xs;

         $array_class = array();
         $array_style = array();
         $array_class_inner = array();

         $array_class[] = 'col-xl-' . $col_lg;
         $array_class[]	= 'col-lg-' . $col_lg_2;
         $array_class[]	= 'col-md-' . $col_md;
         $array_class[]	= 'col-sm-' . $col_sm;
         $array_class[]	= 'col-xs-' . $col_xs;

         if($hidden_lg) $array_class[] = $hidden_lg;
         if($hidden_md) $array_class[] = $hidden_md;
         if($hidden_sm) $array_class[] = $hidden_sm;
         if($hidden_xs) $array_class[] = $hidden_xs;

         $array_class[]	= $el_class;
         $array_class[] = $vertical_align;
         
      if($padding_top) $array_style[] 		= 'padding-top:'. intval( $padding_top ) .'px';
			if($padding_left) $array_style[] 	= 'padding-left:'. intval( $padding_left ) .'px';
			if($padding_bottom) $array_style[] 	= 'padding-bottom:'. intval( $padding_bottom ) .'px';
			if($padding_right) $array_style[] 	= 'padding-right:'. intval( $padding_right ) .'px';
			if($margin_top) $array_style[] 		= 'margin-top:'. intval( $margin_top ) .'px';
			if($margin_right) $array_style[] 	= 'margin-right:'. intval( $margin_right ) .'px';
			if($margin_bottom) $array_style[] 	= 'margin-bottom:'. intval( $margin_bottom ) .'px';
			if($margin_left) $array_style[] 		= 'margin-left:'. intval( $margin_left ) .'px';

			if($bg_color) $array_style[] 	= 'background-color:'. $bg_color;

			$class_col_parallax = '';
			if( $bg_image){
				$array_style[] 	= 'background-image:url(\''. substr($base_path, 0, -1) . $bg_image .'\')';
				$array_style[] 	= 'background-repeat:' . $bg_repeat;
				if($bg_attachment == 'fixed'){
          $array_style[]  = 'background-position: 50% 0';
          $array_class[] = 'gva-parallax-background';
        }else{
          $array_class[] = $bg_attachment;
          $array_class[] = 'bg-size-' . $bg_size;
          $array_style[]  = 'background-position:' . $bg_position;
          $array_style[]  = 'background-position:' . $bg_position;
        }
			}
			
			$col_bg_size = 'bg-size-cover';
			if($bg_size){
				$col_bg_size = 'bg-size-' . $bg_size;
			}
         $array_class_inner[] = $class_col_parallax;
         $array_class_inner[] = $col_bg_size;
         $array_class_inner[] = $inner_class;
         $array_class_inner[] = $style;

      $column_class = implode(' ', $array_class);
			$column_class_inner = implode(' ', $array_class_inner);
			$column_style 	= implode('; ', $array_style );
         
		ob_start();
         ?>
		<div <?php if($id_column) print 'id="'.$id_column.'"' ?> class="gsc-column <?php print $column_class; ?>" <?php echo(($column_style) ? 'style="'.$column_style.'"' : '');  ?>>
	      <div class="column-inner <?php print $column_class_inner ?>">
	         <div class="column-content-inner">
	           <?php print $content; ?>
	         </div>  
	      </div>
      <?php if($bg_attachment == 'fixed'){ 
        $data_parallax = 'data-bottom-top="top: -60%;" data-top-bottom="top: 0%;"';
        if($bg_position == 'center top'){
          $data_parallax = 'data-bottom-top="top: -40%;" data-top-bottom="top: 20%;"';
        }
      ?>
        <div style="background-repeat: <?php print $bg_repeat; ?>;background-position:<?php print $bg_position ?>;" class="<?php print $col_bg_size ?> gva-parallax-inner skrollable skrollable-between" <?php print $data_parallax ?>></div>
       <?php } ?>  
	    </div>
	   <?php return ob_get_clean();
	}

}