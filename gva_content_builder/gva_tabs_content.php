<?php 
if(!class_exists('element_gva_tabs_content')){
   class element_gva_tabs_content{
      public function render_form(){
         $fields = array(
            'type'   => 'gav_tabs_content',
            'title'  => t('Tabs Content Width Image'), 
            'fields' => array(      
               array(
                  'id'        => 'title',
                  'type'      => 'text',
                  'title'     => t('Title for admin'),
                  'admin'     => true
               ),
               array(
                  'id'        => 'type',
                  'type'      => 'select',
                  'options'   => array(
                     'style-1'         => 'Default',
                     'style-2'         => 'Background white, padding, box-shadow',
                     'style-3'         => 'Background white, padding',
                  ),
                  'title'  => t('Style'),
                  'desc'      => t('Vertical tabs works only for column widths: 1/2, 3/4 & 1/1'),
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
         for($i=1; $i<=8; $i++){
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
            $fields['fields'][] = array(
               'id'        => "image_{$i}",
               'type'      => 'upload',
               'title'     => t("Image {$i}")
            );
         }
         return $fields;
      }

      public static function render_content( $attr = array(), $content = '' ){
         global $base_url;
         $default = array(
            'title'           => '',
            'type'            => 'style-1',
            'el_class'        => '',
            'animate'         => '',
            'animate_delay'   => ''
         );        
         for($i=1; $i<=8; $i++){
            $default["title_{$i}"] = '';
            $default["content_{$i}"] = '';
            $default["image_{$i}"] = '';
         }
         extract(gavias_merge_atts($default, $attr)); 
         
         $_id = gavias_content_builder_makeid();
         $uid = $_id;
         $el_class .= ' ' . $type;
         if($animate) $el_class .= ' wow' . $animate;
         ob_start() ?>
         <div class="gsc-tabs-content <?php print $el_class ?>" <?php print gavias_content_builder_print_animate_wow('', $animate_delay) ?>>
            <div class="tabs_wrapper">
               <ul class="nav nav-tabs">
                  <?php for($i=1; $i<=8; $i++){ ?>
                     <?php 
                        $title = "title_{$i}";
                        $content = "content_{$i}";
                     ?>
                     <?php if($$title){ ?>
                        <li><a <?php print($i==1?'class="active show"':'') ?> data-toggle="tab" href="#<?php print ($uid .'-'. $i) ?>">  <?php print $$title ?> </a></li>
                     <?php } ?>
                  <?php } ?>
               </ul>
               <div class="tab-content clearfix">
                  <?php for($i=1; $i<=8; $i++){ ?>
                     <?php 
                        $title = "title_{$i}";
                        $content = "content_{$i}";
                        $image = "image_{$i}";
                     ?>
                     <?php if($$title){ ?>
                        <div id="<?php print($uid .'-'. $i) ?>" class="tab-pane fade in <?php print($i==1?'active show':'') ?>">
                           <?php if($$image){ ?>
                              <div class="images"><div class="content-inner"><span><img src="<?php echo ($base_url . $$image) ?>" /></span></div></div>
                           <?php } ?>
                           <div class="content-inner"><?php print $$content; ?></div>
                        </div>
                     <?php } ?>
                  <?php } ?>
               </div>
            </div>
         </div>
         <?php return ob_get_clean();
      }
   }
}


