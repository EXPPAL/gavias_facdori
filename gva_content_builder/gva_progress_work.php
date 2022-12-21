<?php 
if(!class_exists('element_gva_progress_work')):
   class element_gva_progress_work{
      public function render_form(){
         $fields = array(
            'type' => 'element_gva_progress_work',
            'title' => ('Progress Work Box'), 
            'fields' => array(
               array(
                  'id'        => 'title',
                  'type'      => 'text',
                  'title'     => t('Title'),
                  'admin'     => true
               ),
               array(
                  'id'        => 'content',
                  'type'      => 'textarea',
                  'title'     => t('Content'),
                  'desc'      => t('Some Shortcodes and HTML tags allowed'),
               ),
               array(
                  'id'        => 'step_number',
                  'type'      => 'text',
                  'title'     => t('Step Progress'),
                  'default'   => '1'
               ),
               array(
                  'id'        => 'step_text',
                  'type'      => 'text',
                  'title'     => t('Step Text'),
                  'default'   => 'Step'
               ),
               array(
                  'id'        => 'link',
                  'type'      => 'text',
                  'title'     => t('Link'),
                  'desc'      => t('Link for text')
               ),
               array(
                  'id'        => 'target',
                  'type'      => 'select',
                  'options'   => array( 'off' => 'No', 'on' => 'Yes' ),
                  'title'     => t('Open in new window'),
                  'desc'      => t('Adds a target="_blank" attribute to the link.'),
               ),
               array(
                  'id'        => 'min_height',
                  'type'      => 'text',
                  'title'     => t('Min Height'),
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
                  'id'     => 'el_class',
                  'type'      => 'text',
                  'title'  => t('Extra class name'),
                  'desc'      => t('Style particular content element differently - add a class name and refer to it in custom CSS.'),
               ),

            ),                                       
         );
         return $fields;
      }

      public static function render_content( $attr = array(), $content = '' ){
         global $base_url;
         extract(gavias_merge_atts(array(
            'title'                       => '',
            'content'                     => '',
            'step_number'                 => '1',
            'step_text'                   => 'Step',
            'link'                        => '',
            'target'                      => '',
            'animate'                     => '',
            'animate_delay'               => '',
            'min_height'                  => '',
            'el_class'                    => ''
         ), $attr));
         
         // target
         if( $target =='on' ){
            $target = 'target="_blank"';
         } else {
            $target = false;
         }

         $class = array();
         if($el_class) $class[] = $el_class;
         if($animate) $class[] = 'wow ' . $animate;
         $style = '';
         if($min_height) $style = 'style="min-height:' . $min_height . ';"';
         ob_start();
         ?>
         <div class="widget gsc-progress-box <?php if(count($class)>0) print implode(' ', $class) ?>" <?php if($style) print $style;?> <?php print gavias_content_builder_print_animate_wow('', $animate_delay) ?>>
            <div class="box-content">
               <div class="icon-box"><i class="fas fa-arrow-right"></i></div>
               <div class="heading-box">
                  <span class="step-number number-<?php print $step_number; ?>"><?php print $step_number; ?></span>
                  <span class="step-text"><?php print $step_text; ?></span>
               </div>
               <h3 class="title"><?php print $title ?></h3>
               <?php if($content){ ?>
                  <div class="desc"><?php print $content; ?></div>
               <?php } ?>
            </div>
         </div> 

         <?php return ob_get_clean() ?>
       <?php
      }

   } 
endif;   
