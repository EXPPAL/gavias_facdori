<?php 

if(!class_exists('element_gva_box_hover')):
   class element_gva_box_hover{
      
      public function render_form(){
         $fields = array(
            'type'            => 'gsc_box_hover',
            'title'           => t('Box Hover'),
            'fields' => array(
               array(
                  'id'        => 'title',
                  'type'      => 'text',
                  'title'     => 'Title for box',
                  'admin'     => true
               ),
               array(
                  'id'        => 'content',
                  'type'      => 'textarea',
                  'title'     => t('Content for Frontend'),
               ),
               array(
                  'id'        => 'content_backend',
                  'type'      => 'textarea',
                  'title'     => t('Content for Backend'),
               ),
               array(
                  'id'        => 'image',
                  'type'      => 'upload',
                  'title'     => t('Background Image'),
                  'std'       => '',
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
               ),
               array(
                  'id'        => 'height',
                  'type'      => 'text',
                  'title'     => t('Min-height of Box'),
                  'desc'      => t('e.g 220px')
               ),
               array(
                  'id'        => 'target',
                  'type'      => 'select',
                  'title'     => t('Open in new window'),
                  'desc'      => t('Adds a target="_blank" attribute to the link'),
                  'options'   => array( 'off' => 'No', 'on' => 'Yes' ),
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
            )                                    
         );
         return $fields;
      }

      public static function render_content( $attr = array(), $content = '' ){
         extract(gavias_merge_atts(array(
            'icon'               => '',
            'title'              => '',
            'content'            => '',
            'content_backend'    => '',
            'link'               => '',
            'text_link'          => 'Read more',
            'height'             => '',
            'image'              => '',
            'target'             => '',
            'el_class'           => '',
            'animate'            => '',
            'animate_delay'      => ''
         ), $attr));
         if($image) $image = substr(base_path(), 0, -1) . $image; 
         
         // target
         if( $target ){
            $target = 'target="_blank"';
         } else {
            $target = false;
         }
         $css = '';
         $css .= !empty($height) ? "min-height: {$height};" : "";
         if(!empty($css)){
            $css = " style=\"{$css}\"";
         }

         if($animate) $el_class .= ' wow ' . $animate; 

         ob_start();
         ?>
         <div class="widget gsc-box-hover clearfix <?php print $el_class; ?>"<?php print $css ?> <?php print gavias_content_builder_print_animate_wow('', $animate_delay) ?>>
            <div class="box-content">
               <div class="frontend">
                  <?php if($image){ ?><div class="image"><img src="<?php print $image ?>" alt=""/></div><?php } ?>
                  <div class="frontend-content">
                     <div class="box-title">
                        <a class="box-link" <?php if($link) print ("href=\"{$link}\"" . $target) ?>><?php print $title ?></a>                
                     </div>
                     <div class="be-desc"><?php print $content ?></div>
                  </div>   
               </div>
               <div class="backend">
                  <div class="content-be">
                     <div class="box-title">
                        <a class="box-link" <?php if($link) print ("href=\"{$link}\"" . $target) ?>><?php print $title ?></a>
                     </div>
                     <div class="be-desc"><?php print $content_backend ?></div>
                     <?php if($link){ ?><div class="link-action"><a href="<?php print $link ?>" <?php print $target ?>><?php print $text_link ?><i class=" gv-icon-165"></i></a></div><?php } ?>
                  </div>
               </div>
            </div>
         </div>  
         <?php return ob_get_clean() ?>
         <?php
      }
   }
endif;   




