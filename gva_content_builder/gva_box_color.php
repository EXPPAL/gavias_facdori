<?php 

if(!class_exists('element_gva_box_color')):
   class element_gva_box_color{
      
      public function render_form(){
         $fields = array(
            'type'            => 'gsc_box_color',
            'title'           => t('Box color'),
            'fields' => array(
               array(
                  'id'        => 'title_admin',
                  'type'      => 'text',
                  'title'     => 'Title Administrator',
                  'admin'     => true
               ),
               array(
                  'id'        => 'title',
                  'type'      => 'textarea',
                  'title'     => 'Content'
               ),
               array(
                  'id'        => 'image',
                  'type'      => 'upload',
                  'title'     => t('Images')
               ),
               array(
                  'id'        => 'link',
                  'type'      => 'text',
                  'title'     => t('Link'),
               ),
               array(
                  'id'        => 'text_link',
                  'type'      => 'text',
                  'title'     => t('Text Link'),
                  'std'       => t('Read more')
               ),
               array(
                  'id'        => 'color',
                  'type'      => 'text',
                  'title'     => t('Background color'),
                  'desc'      => t('Background color fox box. e.g: #ccc')
               ),
               array(
                  'id'        => 'text_style',
                  'type'      => 'select',
                  'title'     => t('Text Style'),
                  'options'   => array( 'white' => t('White'), 'dark' => t('Dark') ),
               ),
               array(
                  'id'        => 'target',
                  'type'      => 'select',
                  'title'     => t('Open in new window'),
                  'desc'      => t('Adds a target="_blank" attribute to the link'),
                  'options'   => array( 0 => 'No', 1 => 'Yes' ),
               ),
               array(
                  'id'        => 'height',
                  'type'      => 'text',
                  'title'     => t('Min Height')
               ),
               array(
                  'id'        => 'el_class',
                  'type'      => 'text',
                  'title'     => t('Extra class name'),
                  'desc'      => t('Style particular content element differently - add a class name and refer to it in custom CSS.'),
               ),
               array(
                  'id'        => 'animate',
                  'type'      => 'select',
                  'title'     => t('Animation'),
                  'desc'      => t('Entrance animation for element'),
                  'options'   => gavias_content_builder_animate(),
                  'class'     => 'width-1-2'
               ), 
               array(
                  'id'        => 'animate_delay',
                  'type'      => 'select',
                  'title'     => t('Animation Delay'),
                  'options'   => gavias_content_builder_delay_wow(),
                  'desc'      => '0 = default',
                  'class'     => 'width-1-2'
               ), 
            ),                                     
         );
         return $fields;
      }

      public function render_content( $item ) {
         print self::sc_box_color( $item['fields'] );
      }

      public static function sc_box_color( $attr, $content = null ){
         global $base_url;
         extract(gavias_merge_atts(array(
            'icon'                  => '',
            'title'                 => '',
            'link'                  => '',
            'text_link'             => 'Read more',
            'color'                 => '',
            'text_style'            => 'white',
            'target'                => '',
            'image'                 => '',
            'height'                => '',
            'el_class'              => '',
            'animate'               => '',
            'animate_delay'         => ''
         ), $attr));

         // target
         if( $target ){
            $target = 'target="_blank"';
         } else {
            $target = false;
         }

         if($image){
            $image = $base_url . $image;
         }

         $el_class .= ' text-' . $text_style;
         $css = '';
         $css .= !empty($color) ? "background-color: {$color};" : "";
         $css .= !empty($height) ? "min-height: {$height};" : "";
         if(!empty($css)){
            $css = "style=\"{$css}\"";
         }

         if($animate) $el_class .= ' wow ' . $animate; 

        ob_start();
         ?>
         <div class="widget gsc-box-color clearfix <?php print $el_class; ?>" <?php print $css ?> <?php print gavias_content_builder_print_animate_wow('', $animate_delay) ?>>
            <div class="box-content">
               <?php if($image){ ?><div class="image"><img src="<?php print $image ?>"/></div> <?php } ?>
               <div class="content-inner">
                  <div class="box-title"><?php print $title ?></div>
                  <div class="action"><a class="link" <?php if($link) print 'href="'. $link .'"' ?> <?php print $target ?>><span class="text"><?php print $text_link ?></span></a></div>
               </div>
            </div>   
         </div>
         <?php return ob_get_clean() ?>
         <?php
      }

      public function load_shortcode(){
         add_shortcode( 'box_color', array('gsc_box_color', 'sc_box_color') );
      }
   }
endif;   




