<?php 
if(!class_exists('element_gva_progress')):
   class element_gva_progress{
      public function render_form(){
         $fields = array(
            'type'   => 'gsc_progress',
            'title'  => t('Progress'),
            'fields' => array(
              array(
                  'id'        => 'title',
                  'type'      => 'text',
                  'title'     => t('Title'),
                  'admin'     => true
               ),
               array(
                  'id'        => 'percent',
                  'type'      => 'text',
                  'title'     => t('Percent'),
                  'desc'      => t('Number between 0-100'),
               ),
               array(
                  'id'        => 'background',
                  'type'      => 'text',
                  'title'     => t('Background Color'),
                  'desc'      => 'Background color for progress'
               ),
               array(
                  'id'        => 'skin_text',
                  'type'      => 'select',
                  'title'     => 'Skin Text for box',
                  'options'   => array(
                     'text-light' => t('Text Light'),
                     'text-dark'  => t('Text Dark') 
                  ) 
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
               array(
                  'id'        => 'el_class',
                  'type'      => 'text',
                  'title'     => t('Extra class name'),
                  'desc'      => t('Style particular content element differently - add a class name and refer to it in custom CSS.'),
               ),
            ),                                     
         );
         return $fields;
      }


      public static function render_content( $attr = array(), $content = '' ){
         extract(gavias_merge_atts(array(
            'title'           => '',
            'percent'         => '',
            'background'      => '',
            'skin_text'       => '',
            'animate'         => '',
            'animate_delay'   => '',
            'el_class'        => ''
         ), $attr));
         $style = '';
         if($background) $style = 'style="background-color: ' . $background . '"';
         $class_array = array();
         $class_array[] = $el_class;
         $class_array[] = $skin_text;
         if($animate) $class_array[] = 'wow ' . $animate; 
         ob_start();
         ?>
         <div class="widget gsc-progress<?php if(count($class_array)) print (' ' . implode(' ', $class_array)) ?>" <?php print gavias_content_builder_print_animate_wow('', $animate_delay) ?>>
            <div class="progress-label"><?php print $title ?></div>
            <div class="progress">
               <div class="progress-bar" <?php if($style) print $style; ?> data-progress-animation="<?php print $percent ?>%"><span></span></div>
               <span class="percentage"><span></span><?php print $percent ?>%</span>
            </div>
         </div>   
         <?php return ob_get_clean() ?>
      <?php
      }
   }
 endif;  



