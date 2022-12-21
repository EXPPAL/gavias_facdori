<?php 
if(!class_exists('element_gva_services_carousel')):
   class element_gva_services_carousel{
      public function render_form(){
         $fields = array(
            'type' => 'gsc_services_carousel',
            'title' => t('Services Carousel'),
            'fields' => array(
               array(
                  'id'        => 'title',
                  'type'      => 'text',
                  'title'     => t('Title For Admin'),
                  'admin'     => true
               ),
               array(
                  'id'        => 'more_link',
                  'type'      => 'text',
                  'title'     => t('Link view more'),
               ),
               array(
                  'id'        => 'more_text',
                  'type'      => 'text',
                  'title'     => t('Text Link view more'),
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
               'id'           => "icon_{$i}",
               'type'         => 'text',
               'title'        => t("Icon {$i}"),
            );
            $fields['fields'][] = array(
               'id'        => "link_{$i}",
               'type'      => 'text',
               'title'     => t("Link {$i}")
            );
         }
         return $fields;
      }

      public static function render_content( $attr = array(), $content = '' ){
         global $base_url;
         $default = array(
            'title'           => '',
            'more_link'       => '',
            'more_text'       => 'View all services',
            'el_class'        => '',
            'animate'         => '',
            'animate_delay'   => ''
         );

         for($i=1; $i<=10; $i++){
            $default["title_{$i}"] = '';
            $default["icon_{$i}"] = '';
            $default["link_{$i}"] = '';
         }

         extract(gavias_merge_atts($default, $attr));

         $_id = gavias_content_builder_makeid();
         if($animate) $el_class .= ' wow ' . $animate; 
         ob_start();
         ?>
         <div class="gsc-service-carousel <?php echo $el_class ?>" <?php print gavias_content_builder_print_animate_wow('', $animate_delay) ?>> 
            <div class="owl-carousel init-carousel-owl owl-loaded owl-drag" data-items="6" data-items_lg="6" data-items_md="5" data-items_sm="4" data-items_xs="2" data-loop="1" data-speed="500" data-auto_play="1" data-auto_play_speed="2000" data-auto_play_timeout="5000" data-auto_play_hover="1" data-navigation="1" data-rewind_nav="0" data-pagination="0" data-mouse_drag="1" data-touch_drag="1">
               <?php for($i=1; $i<=10; $i++){ ?>
                  <?php 
                     $title = "title_{$i}";
                     $icon = "icon_{$i}";
                     $link = "link_{$i}";
                  ?>
                  <?php if($$title){ ?>
                     <div class="item"><div class="content-inner">
                     <?php if($$icon){ ?><div class="icon"><a href="<?php print $$link ?>"><i class="<?php print $$icon ?>"></i></a></div><?php } ?>         
                     <?php if($$title){ ?><div class="title"><a href="<?php print $$link ?>"><?php print $$title ?></a></div><?php } ?>
                     </div></div>
                  <?php } ?>    
               <?php } ?>
            </div> 
            <?php if($more_link){ ?>
               <div class="read-more"><a class="btn-theme" href="<?php print $more_link ?>"><?php print $more_text ?></a></div>
            <?php } ?>   
         </div>   

         <?php return ob_get_clean();
      }

   }
 endif;  



