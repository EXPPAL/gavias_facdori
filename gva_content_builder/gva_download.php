<?php 

if(!class_exists('element_gva_download')):
   class element_gva_download{

      public function render_form(){
         $fields = array(
            'type' => 'gsc_download',
            'title' => t('Download box'),
            'size' => 3,
            'fields' => array(
               array(
                  'id'        => 'title',
                  'type'      => 'text',
                  'title'     => t('Title'),
                  'admin'     => true
               ),
               array(
                  'id'        => 'content',
                  'type'      => 'textarea',
                  'title'     => t('Content')
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
                  'options'   => gavias_content_builder_delay_aos(),
                  'desc'      => '0 = default',
                  'class'     => 'width-1-2'
               ), 
               array(
                  'id'        => 'el_class',
                  'type'      => 'text',
                  'title'     => t('Extra class name'),
                  'desc'      => t('Style particular content element differently - add a class name and refer to it in custom CSS.'),
               ),
               array(
                  'id'            => 'style',
                  'type'          => 'select',
                  'options'       => array(
                     'vertical'        => t('Vertical'),
                     'horizontal'        => t('Horizontal'),
                  ),
                  'title'  => t('Style'),
               ), 
            ),                                     
         );

         for($i=1; $i<=5; $i++){
            $fields['fields'][] = array(
               'id'     => "info_${i}",
               'type'   => 'info',
               'desc'   => "Information for item file {$i}"
            );
            $fields['fields'][] = array(
               'id'     => "name_${i}",
               'type'   => 'text',
               'title'   => "File Name {$i}"
            );
            $fields['fields'][] = array(
               'id'        => "link_{$i}",
               'type'      => 'text',
               'title'     => t("File Link Download {$i}")
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
            'animate_delay'   => '',
            'content'         => '',
            'style'           => 'vertical'
         );

         for($i=1; $i<=10; $i++){
            $default["name_{$i}"] = '';
            $default["link_{$i}"] = '';
         }

         extract(gavias_merge_atts($default, $attr));


         $el_class .= ' ' . $style;
         $_id = gavias_content_builder_makeid();
         if($animate) $el_class .= ' wow ' . $animate; 
         ob_start();
         ?>
            <div class="gsc-box-download <?php echo $el_class ?>" <?php print gavias_content_builder_print_animate_wow('', $animate_delay) ?>> 
               <div class="box-content">
                  <div class="info">
                     <?php if($title){ ?>
                        <div class="title"><?php print $title ?></div>
                     <?php } ?>
                      <?php if($content){ ?>
                        <div class="desc"><?php print $content ?></div>
                     <?php } ?>
                  </div>
                  <div class="box-files">
                  <?php for($i=1; $i<=10; $i++){ ?>
                     <?php 
                        $name = "name_{$i}";
                        $link = "link_{$i}";
                     ?>
                     <?php if($$name){ ?>
                        <div class="item">
                          <div class="file">
                              <a href="<?php print $$link ?>"><?php print $$name ?></a></div>
                        </div>
                     <?php } ?>    
                  <?php } ?>
                  </div>
               </div> 
           
         <?php return ob_get_clean();
      }

   }
 endif;  



