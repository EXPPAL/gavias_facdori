<?php 
if(!class_exists('element_gva_socials')):
   class element_gva_socials{
      public function render_form(){
         $fields = array(
            'type'      => 'gsc_socials',
            'title'     => t('Socials'), 
            
            'fields'    => array(
               array(
                  'id'        => 'title',
                  'type'      => 'text',
                  'title'     => t('Title for admin'),
                  'admin'     => true
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
         for($i=1; $i<=10; $i++){
            $fields['fields'][] = array(
               'id'     => "info_${i}",
               'type'   => 'info',
               'desc'   => "Information for item {$i}"
            );
            $fields['fields'][] = array(
               'id'        => "icon_{$i}",
               'type'      => 'text',
               'title'     => t("Icon {$i}"),
               'desc'     => t('Use class icon font <a target="_blank" href="http://fontawesome.io/icons/">Icon Awesome</a>'),
            );
            $fields['fields'][] = array(
               'id'           => "link_{$i}",
               'type'         => 'text',
               'title'        => t("Link {$i}")
            );
         }
         return $fields;
      } 
      
      public static function render_content( $attr = array(), $content = '' ){
         $default = array(
            'title'           => '',
            'style'           => 'style-1',
            'el_class'        => '',
            'animate'         => '',
            'animate_delay'   => ''
         );

         for($i=1; $i<=10; $i++){
            $default["icon_{$i}"] = '';
            $default["link_{$i}"] = '';
         }
         extract(gavias_merge_atts($default, $attr));

         $class = array();
         $class[] = $el_class;
         $class[] = $style;
         if($animate) $class[] = 'wow ' . $animate; 
         ob_start();
         ?>
         <div class="widget gsc-socials <?php print implode(' ', $class) ?>" <?php print gavias_content_builder_print_animate_wow('', $animate_delay) ?>>
            <div class="socials">
               <?php for($i=1; $i<=10; $i++){ ?>
                  <?php $icon = "icon_{$i}"; $link = "link_{$i}"; ?>
                  <?php if($$icon && $$link){ ?>
                     <a href="<?php print $$link ?>"><i class="<?php print $$icon ?>" /></i></a>
                  <?php } ?>
               <?php } ?>
            </div>   
         </div>
         <?php return ob_get_clean() ?>
         <?php
      }

   }
endif;

