<?php 
if(!class_exists('element_gva_text_rotate')):
   class element_gva_text_rotate{
      public function render_form(){
         $fields = array(
            'type' => 'gsc_icon_box',
            'title' => ('Text Rotate'), 
            'fields' => array(
               array(
                  'id'        => 'title',
                  'type'      => 'text',
                  'title'     => t('Administrator Title'),
                  'admin'     => true
               ),
               array(
                  'id'        => 'content',
                  'type'      => 'textarea_without_html',
                  'title'     => t('Content'),
                  'default'   => 'Facdori is <span id="typer" class="typer" data-typer-targets="Incredibly, Especially, Extremely, Incredibly"></span> and fully responsive.'
               ),
                array(
                  'id'        => 'desc',
                  'type'      => 'textarea',
                  'title'     => t('Desciption'),
               ),
               
               array(
                  'id'        => 'link',
                  'type'      => 'text',
                  'title'     => t('Link'),
                  'desc'      => t('Link for text')
               ),
               array(
                  'id'        => 'text_link',
                  'type'      => 'text',
                  'title'     => t('Text Link'),
                  'default'   => 'Read more'
               ),
               array(
                  'id'        => 'align',
                  'type'      => 'select',
                  'title'     => 'Align',
                  'options'   => array(
                     'left'   => t('Left'), 
                     'center' => t('Center')
                  ),
                  'default'   => 'center'
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
                  'id'        => 'target',
                  'type'      => 'select',
                  'options'   => array( 'off' => 'No', 'on' => 'Yes' ),
                  'title'     => t('Open in new window'),
                  'desc'      => t('Adds a target="_blank" attribute to the link.'),
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
            'title'              => '',
            'content'            => '',
            'desc'               => '',
            'link'               => '',
            'text_link'          => 'Read more',
            'align'              => 'center',
            'skin_text'          => '',
            'target'             => '',
            'animate'            => '',
            'animate_delay'      => '',
            'el_class'           => ''
         ), $attr));
         // target
         if( $target =='on' ){
            $target = ' target="_blank"';
         } else {
            $target = false;
         }

         $class = array();
         if($el_class) $class[] = $el_class;
         if($animate) $class[] = 'wow ' . $animate; 

         ob_start();
         ?>
            <div class="widget gsc-text-rotate <?php print $el_class ?> align-<?php print $align ?>" <?php print gavias_content_builder_print_animate_wow('', $animate_delay) ?>>
               <div class="rotate-text">
                  <div class="primary-text"><?php print $content ?></div>
                  <div class="second-text"><?php print $desc ?></div>
                  <?php if($link){ ?>
                     <div class="link"><a<?php print $target ?> class="btn-theme" href="<?php print $link ?>"><?php print $text_link ?></a></div>
                  <?php } ?>   
               </div>
            </div>
       
         <?php return ob_get_clean() ?>
       <?php
      }

   } 
endif;   
