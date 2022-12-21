<?php 
if(!class_exists('element_gva_chart')):
   class element_gva_chart{
      public function render_form(){
         $fields = array(
            'type' => 'gsc_chart',
            'title' => ('Chart'),
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
                  'id'        => 'icon',
                  'type'      => 'text',
                  'title'     => t('Chart Icon'),
                  'desc'     => t('Use class icon font <a target="_blank" href="http://fontawesome.io/icons/">Icon Awesome</a>'),
               ),
               array(
                  'id'        => 'content',
                  'type'      => 'textarea',
                  'title'     => t('Chart Content'),
               ),
               array(
                  'id'        => 'color',
                  'type'      => 'text',
                  'title'     => t('Chart color'),
                  'desc'      => t('Use color name ( blue ) or hex ( #2991D6 )'),
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
            'content'         => '',
            'percent'         => '',
            'label'           => '',
            'icon'            => '',
            'color'           => '',
            'animate'         => '',
            'animate_delay'   => '',
            'el_class'        => ''
         ), $attr));

         if(!$color) $color = '#008FD5';
         if($animate) $el_class .= ' wow ' . $animate; 
         ob_start();
         ?>
         <div class="widget gsc-chart <?php print $el_class ?>" <?php print gavias_content_builder_print_animate_wow('', $animate_delay) ?>>
            <div class="pieChart" data-bar-color="<?php print $color ?>" data-bar-width="150" data-percent="<?php print $percent ?>">
               <span><?php print $percent; ?>%</span>  
            </div>
            <div class="content">
            <?php if($icon){ ?>
               <div class="icon" <?php if($color) print 'style="color:'.$color.';"' ?>><i class="<?php print $icon ?>"></i></div>
            <?php } ?>
            <?php if($title){ ?>   
               <div class="title"><span><?php print $title; ?></span></div>  
            <?php } ?>  
            <?php if($content){ ?>   
               <div class="content"><?php print $content; ?></div>
            <?php } ?>   
            </div>
         </div>  
         <?php return ob_get_clean() ?>    
         <?php
      }
   }
 endif;  



