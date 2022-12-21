<?php 
if(!class_exists('element_gva_links')):
   class element_gva_links{

      public function render_form(){
         $fields = array(
            'type' => 'gva_links',
            'title' => t('Links'),
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
               'id'        => "icon_{$i}",
               'type'      => 'text',
               'title'     => t("Icon {$i}")
            );
            $fields['fields'][] = array(
               'id'        => "title_{$i}",
               'type'      => 'text',
               'title'     => t("Title {$i}")
            );
            $fields['fields'][] = array(
               'id'        => "link_{$i}",
               'type'      => 'text',
               'title'     => t("link {$i}")
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
            $default["icon_{$i}"] = '';
            $default["title_{$i}"] = '';
            $default["link_{$i}"] = '';
         }

         extract(gavias_merge_atts($default, $attr));

         $_id = gavias_content_builder_makeid();
         
         if($animate) $el_class .= ' wow ' . $animate; 
         ob_start();
         ?>
         <div class="gsc-links gv-sticky-menu <?php echo $el_class ?>" <?php print gavias_content_builder_print_animate_wow('', $animate_delay) ?>> 
            <a class="btn-hidden-links" href="#"><span class="ion-ios-close-outline"></span></a>
            <div class="content-wrapper">
               <div class="content-inner">
                  <div class="owl-carousel init-carousel-owl owl-loaded owl-drag" data-items="6" data-items_lg="6" data-items_md="6" data-items_sm="4" data-items_xs="2" data-loop="1" data-speed="500" data-auto_play="0" data-auto_play_speed="2000" data-auto_play_timeout="5000" data-auto_play_hover="1" data-navigation="0" data-rewind_nav="0" data-pagination="0" data-mouse_drag="1" data-touch_drag="1">
                     <?php for($i=1; $i<=10; $i++){ ?>
                        <?php 
                           $icon = "icon_{$i}";
                           $title = "title_{$i}";
                           $link = "link_{$i}";
                        ?>
                        <?php if($$link && $$title){ ?>
                           <div class="item">
                              <div class="box-content">
                                 <a href="<?php print $$link ?>">
                                    <?php if($$icon){ ?><span class="icon"><i class="<?php print $$icon ?>"></i></span><?php } ?>   
                                    <span class="title"><?php print $$title ?></span>
                                 </a>
                              </div>      
                           </div>
                        <?php } ?>    
                     <?php } ?>
                  </div> 
               </div>  
            </div>    
         </div>   
         <?php return ob_get_clean();
      }
   }
 endif;  



