<?php 

if(!class_exists('element_gva_icon_box_color')):
   class element_gva_icon_box_color{
      public function render_form(){
         $fields = array(
            'type'            => 'gva_icon_color',
            'title'           => t('Icon Box Workflow'),
            'fields' => array(
               array(
                  'id'        => 'title',
                  'type'      => 'text',
                  'title'     => 'Title',
                  'admin'     => true
               ),
               array(
                  'id'        => 'icon',
                  'type'      => 'text',
                  'title'     => 'Icon',
               ),
               array(
                  'id'        => 'content',
                  'type'      => 'textarea',
                  'title'     => t('Content'),
               ),
               array(
                  'id'        => 'link',
                  'type'      => 'text',
                  'title'     => t('Link'),
               ),
               array(
                  'id'        => 'color',
                  'type'      => 'text',
                  'title'     => t('Background color'),
               ),
               array(
                  'id'        => 'icon_color',
                  'type'      => 'text',
                  'title'     => t('Icon color'),
               ),
               array(
                  'id'        => 'image',
                  'type'      => 'upload',
                  'title'     => t('Image Icon'),
                  'desc'      => t('Use image icon instead of icon class'),
               ),
               array(
                  'id'        => 'style',
                  'type'      => 'select',
                  'title'     => t('Style'),
                  'options'   => array( 
                     'style-1' => t('Icon Top Center'),
                     'style-2' => t('Icon Top Left'), 
                     'style-3' => t('Icon Top Right') 
                  )
               ),
               array(
                  'id'        => 'text_style',
                  'type'      => 'select',
                  'title'     => t('Text Style'),
                  'options'   => array( 
                     'text-dark' => t('Dark'), 
                     'text-light' => t('White')
                  )
               ),
               array(
                  'id'        => 'arrow',
                  'type'      => 'select',
                  'title'     => t('Enable Arrow'),
                  'options'   => array( 
                     ''  => t('-- Disable Arrow --'),
                     'arrow-right arrow-left'   => t('Arrow Right Left'), 
                     'arrow-right'  => t('Arrow Right'),
                     'arrow-left'  => t('Arrow Left'),
                  )
               ),
               array(
                  'id'        => 'icon_style',
                  'type'      => 'select',
                  'title'     => t('Icon Style'),
                  'options'   => array( 
                     'icon-style-1'  => t('Icon Style 1'),
                     'icon-style-2'  => t('Icon Style 2')
                  )
               ),
               array(
                  'id'        => 'arrow_style',
                  'type'      => 'select',
                  'title'     => t('Arrow Style'),
                  'options'   => array( 
                     'arrow-style-1'  => t('Icon Style 1'),
                     'arrow-style-2'  => t('Icon Style 2')
                  )
               ),
               array(
                  'id'        => 'target',
                  'type'      => 'select',
                  'title'     => t('Open in new window'),
                  'desc'      => t('Adds a target="_blank" attribute to the link'),
                  'options'   => array( 0 => 'No', 1 => 'Yes' ),
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

      public static function render_content( $attr = array(), $content = '' ){
         global $base_url;
         extract(gavias_merge_atts(array(
            'title'                 => '',
            'icon'                  => '',
            'image'                 => '',
            'content'               => '',
            'link'                  => '',
            'color'                 => '',
            'icon_color'            => '',
            'style'                 => 'style-1',
            'text_style'            => 'dark',
            'arrow'                 => '',
            'icon_style'            => 'icon-style-1',
            'arrow_style'           => 'arrow-style-1',
            'target'                => '',
            'el_class'              => '',
            'animate'               => '',
            'animate_delay'         => ''
         ), $attr));

         if($image) $image = $base_url . $image; 

         if( $target ){
            $target = 'target="_blank"';
         } else {
            $target = false;
         }
         if($image) $el_class .= ' icon-image';
         $el_class .= ' ' . $text_style;
         $el_class .= ' ' . $style;
         $el_class .= ' ' . $icon_style;
         $el_class .= ' ' . $arrow_style;
         $el_class .= ' ' . $arrow;

         $css = '';
         $css .= !empty($color) ? "background-color: {$color};" : "";
         $css .= !empty($icon_color) ? "color:{$icon_color};" : "";
         if(!empty($css)){
            $css = " style=\"{$css}\"";
         }

         if($animate) $el_class .= ' wow ' . $animate; 

         ob_start();
         ?>
         <div class="widget gsc-icon-box-color clearfix <?php print $el_class; ?>" <?php print gavias_content_builder_print_animate_wow('', $animate_delay) ?>>
            <div class="box-content">
               <div class="box-icon">
                  <?php if($icon){ ?><span class="icon <?php print $icon ?>"<?php print $css ?>></span> <?php } ?>
                  <?php if($image){ ?><span class="icon"><img src="<?php print $image ?>" alt="<?php print strip_tags($title) ?>"/> </span> <?php } ?>
               </div>   
               <div class="content-inner">
                  <h4 class="box-title">
                     <a class="link" <?php if($link) print 'href="'. $link .'"' ?> <?php print $target ?>><?php print $title ?></a>   
                  </h4>
                  <div class="box-desc"><?php print $content ?></div>
               </div>
            </div>  
            
         </div>
         <?php return ob_get_clean() ?>
         <?php
      }

   }
endif;   




