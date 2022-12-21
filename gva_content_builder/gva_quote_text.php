<?php 
if(!class_exists('element_gva_quote_text')):
   class element_gva_quote_text{
      public function render_form(){
         $fields =array(
            'type' => 'gsc_quote_text',
            'title' => ('Box Quote Text'), 
            'size' => 3,
            'fields' => array(
               array(
                  'id'        => 'title',
                  'type'      => 'text',
                  'title'     => t('Title for Admin'),
                  'admin'     => true
               ),
               array(
                  'id'        => 'content',
                  'type'      => 'textarea',
                  'title'     => t('Content'),
               ),
               array(
                  'id'        => 'width',
                  'type'      => 'text',
                  'title'     => t('Width'),
                  'desc'      => 'Sample: 80%'
               ),
               array(
                  'id'        => 'background',
                  'type'      => 'text',
                  'title'     => t('Background color'),
                  'desc'      => 'Sample: #f5f5f5'
               ),
               array(
                  'id'        => 'color',
                  'type'      => 'text',
                  'title'     => t('Text color'),
                  'desc'      => 'Sample: #ccc'
               ),
               array(
                  'id'        => 'border',
                  'type'      => 'select',
                  'title'     => t('border'),
                  'options'   => array(
                     'has-border'   => 'Enable',
                     'no-border'    => 'Disble',
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
         global $base_url;
         extract(gavias_merge_atts(array(
            'content'         => '',
            'width'           => '',
            'background'      => '',
            'color'           => '',
            'border'          => '',
            'animate'         => '',
            'animate_delay'   => '',
            'el_class'        => ''
         ), $attr));

         $el_class .= ' ' . $border;

         $styles = array();

         if($width){
            $styles[] = "width:{$width};";
         }
         if($color){
            $styles[] = "color:{$color};";
         }
         if($animate) $el_class .= ' wow ' . $animate; 
         ob_start();
         ?>
            <div class="widget gsc-quote-text <?php print $el_class ?>" <?php print ($background ? "style=\"background:{$background};\"" : '') ?> <?php print gavias_content_builder_print_animate_wow('', $animate_delay) ?>>
               <div class="widget-content">
                  <div class="content" style="<?php print(implode('', $styles)) ?>"><i <?php print ($color ? "style=\"color:{$color};\"" : '') ?> class="icon fa fa-quote-left"></i><?php print $content ?></div>
               </div>
            </div>  
            <?php return ob_get_clean() ?>    
         <?php       
      }

   }
endif;   




