<?php 

if(!class_exists('element_gva_gallery')):
   class element_gva_gallery{

      public function render_form(){
         $fields = array(
            'type' => 'gsc_gallery',
            'title' => t('Gallery'),
            'size' => 3,
            'fields' => array(
               array(
                  'id'        => 'title',
                  'type'      => 'text',
                  'title'     => t('Title For Admin'),
                  'admin'     => true
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
               'id'        => "image_{$i}",
               'type'      => 'upload',
               'title'     => t("Image {$i}")
            );
            $fields['fields'][] = array(
               'id'        => "content_{$i}",
               'type'      => 'textarea_without_html',
               'title'     => t("Title {$i}")
            );
         }
         return $fields;
      }

      public static function render_content( $attr = array(), $content = '' ){
         global $base_url;
         $default = array(
            'title'           => '',
            'el_class'        => '',
            'animate'         => '',
            'animate_delay'   => ''
         );

         for($i=1; $i<=10; $i++){
            $default["title_{$i}"] = '';
            $default["image_{$i}"] = '';
            $default["content_{$i}"] = '';
         }

         extract(gavias_merge_atts($default, $attr));

         $_id = gavias_content_builder_makeid();
         
         if($animate) $el_class .= ' wow ' . $animate; 
         ob_start();
         ?>
         <div class="gsc-our-gallery <?php echo $el_class ?>" <?php print gavias_content_builder_print_animate_wow('', $animate_delay) ?>> 
            <div class="owl-carousel init-carousel-owl owl-loaded owl-drag" data-items="1" data-items_lg="1" data-items_md="1" data-items_sm="1" data-items_xs="1" data-loop="1" data-speed="500" data-auto_play="1" data-auto_play_speed="2000" data-auto_play_timeout="5000" data-auto_play_hover="1" data-navigation="1" data-rewind_nav="0" data-pagination="0" data-mouse_drag="1" data-touch_drag="1">
               <?php for($i=1; $i<=10; $i++){ ?>
                  <?php 
                     $title = "title_{$i}";
                     $image = "image_{$i}";
                     $content = "content_{$i}";
                  ?>
                  <?php if($$title){ ?>
                     <div class="item"><div class="content-inner">
                        <?php if($$image){ ?><div class="image"><img src="<?php echo ($base_url . $$image) ?>" alt="<?php print strip_tags($$title) ?>"/></div><?php } ?>
                        <div class="box-content">
                           <?php if($$title){ ?><div class="title"><?php print $$title ?></div><?php } ?>   
                           <?php if($$content){ ?><div class="desc"><?php print $$content ?></div><?php } ?>   
                        </div>      
                     </div></div>
                  <?php } ?>    
               <?php } ?>
            </div> 
         </div>   
         <?php return ob_get_clean();
      }
   }
 endif;  



