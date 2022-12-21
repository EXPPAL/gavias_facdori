<?php 
if(!class_exists('element_gva_tabs')){
   class element_gva_tabs{
      public function render_form(){
         $fields = array(
            'type'   => 'gsc_tabs',
            'title'  => t('Tabs'), 
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
                     'horizontal'   => 'Horizontal',
                     'horizontal_icon'   => 'Horizontal Icon',
                     'vertical'     => 'Vertical', 
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
         }
         return $fields;
      }

      public static function render_content( $attr = array(), $content = '' ){
         $default = array(
            'title'           => '',
            'uid'             => 'tab-',
            'type'            => '',
            'el_class'        => '',
            'animate'         => '',
            'animate_delay'   => ''
         );        
         for($i=1; $i<=8; $i++){
            $default["title_{$i}"] = '';
            $default["content_{$i}"] = '';
         }
         extract(gavias_merge_atts($default, $attr)); 
         
         $_id = gavias_content_builder_makeid();
         $uid .= $_id;

         if($animate) $el_class .= ' wow' . $animate;
         ob_start() ?>
         <div class="gsc-tabs <?php print $el_class ?>" <?php print gavias_content_builder_print_animate_wow('', $animate_delay) ?>>
            <div class="tabs_wrapper tabs_<?php print $type ?>">
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
               <div class="tab-content">
                  <?php for($i=1; $i<=8; $i++){ ?>
                     <?php 
                        $title = "title_{$i}";
                        $content = "content_{$i}";
                     ?>
                     <?php if($$title){ ?>
                        <div id="<?php print($uid .'-'. $i) ?>" class="tab-pane fade in <?php print($i==1?'active show':'') ?>"><?php print $$content ?></div>
                     <?php } ?>
                  <?php } ?>
               </div>
            </div>
         </div>
         <?php return ob_get_clean();
      }
   }
}


