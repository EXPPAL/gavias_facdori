<?php 
if(!class_exists('element_gva_quotes_rotator')):
   class element_gva_quotes_rotator{
      public function render_form(){
         $fields = array(
            'title'  => t('Quotes Rotator'),
            //'key'      => 'gva_quotes_rotator',
            'fields' => array(
               array(
                  'id'     => 'title',
                  'type'      => 'text',
                  'title'  => t('Title'),
                  'admin'     => true
               ),
               array(
                  'id'        => 'skin_text',
                  'type'      => 'select',
                  'title'     => 'Skin Text for box',
                  'options'   => array(
                     'text-dark'  => t('Text Dark'), 
                     'text-light' => t('Text Light')
                  ) 
               ),
               array(
                  'id'        => 'max_width',
                  'type'      => 'text',
                  'title'     => t('Max Width'),
                  'desc'      => 'e.g: 600px'
               ),
               array(
                  'id'        => 'min_height',
                  'type'      => 'text',
                  'title'     => t('Min Height'),
                  'desc'      => 'e.g: 200px'
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
               )
            )                                          
         );
         for($i=1; $i<=10; $i++){
            $fields['fields'][] = array(
               'id'     => "info_${i}",
               'type'   => 'info',
               'desc'   => "Information for item {$i}"
            );
            $fields['fields'][] = array(
               'id'        => "title_{$i}",
               'type'      => 'text',
               'title'     => t("Title {$i}")
            );
            $fields['fields'][] = array(
               'id'           => "content_{$i}",
               'type'         => 'textarea',
               'title'        => t("Content {$i}")
            );
         }
      return $fields;
      }

      public static function render_content( $attr = array(), $content = '' ){
         $default = array(
            'title'           => '',
            'skin_text'       => 'text-dark',
            'max_width'       => '',
            'min_height'      => '',
            'animate'         => '',
            'animate_delay'   => '',
            'el_class'        => ''
         );
         for($i=1; $i<=10; $i++){
            $default["title_{$i}"] = '';
            $default["content_{$i}"] = '';
         }
         extract(gavias_merge_atts($default, $attr));

         $style = '';
         if($max_width) $style .= "max-width:{$max_width};";
         if($min_height) $style .= "min-height:{$min_height};";
         if($style) $style = " style=\"{$style}\"";
         if($animate) $el_class .= ' wow ' . $animate; 
         ob_start();
         ?>
         <div class="gsc-quotes-rotator <?php print $skin_text ?> <?php print $el_class ?>" <?php print gavias_content_builder_print_animate_wow('', $animate_delay) ?>>
            <div class="cbp-qtrotator"<?php print $style ?>>
              <?php for($i=1; $i<=10; $i++){ ?>
                  <?php 
                     $title = "title_{$i}";
                     $content = "content_{$i}";
                  ?>
                  <?php if($$title){ ?>
                     <div class="cbp-qtcontent">
                        <div class="content-title"><?php print $$title ?></div>
                        <div class="content-inner"><?php print $$content ?></div>
                     </div>
                  <?php } ?>   
               <?php } ?>  
            </div>
         </div>   
         <?php  return ob_get_clean() ?>
      <?php    
      }
   }

endif;