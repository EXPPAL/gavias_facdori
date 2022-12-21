<?php 

if(!class_exists('element_gva_images_parallax')):
   class element_gva_images_parallax{
      public function render_form(){
         return array(
           'type'          => 'gva_images_parallax',
            'title'        => t('Images Parallax'),
            'fields' => array(
               array(
                  'id'        => 'title',
                  'type'      => 'text',
                  'title'     => t('Title'),
                  'admin'     => true
               ),
               array(
                  'id'        => 'icon',
                  'type'      => 'text',
                  'title'     => t('Icon class'),
                  'std'       => '',
                  'desc'     => t('Use class icon font <a target="_blank" href="http://fontawesome.io/icons/">Icon Awesome</a> or <a target="_blank" href="http://gaviasthemes.com/icons/">Custom icon</a>'),
               ),
               array(
                  'id'        => 'icon_image',
                  'type'      => 'upload',
                  'title'     => t('Image Icon'),
                  'desc'      => t('Use image icon instead of icon class'),
               ),
               array(
                  'id'        => 'image_1',
                  'type'      => 'upload',
                  'title'     => t('Images 1')
               ),
               array(
                  'id'        => 'image_2',
                  'type'      => 'upload',
                  'title'     => t('Images 2')
               ),
              array(
                  'id'        => 'position',
                  'type'      => 'select',
                  'title'     => t('Images Align'),
                  'options'   => array( 
                     'left' => t('Left'), 
                     'right' => t('Right')
                  ),
               ),
               array(
                  'id'        => 'link',
                  'type'      => 'text',
                  'title'     => t('Link Image'),
               ),

               array(
                  'id'        => 'target',
                  'type'      => 'select',
                  'title'     => t('Open in new window'),
                  'desc'      => t('Adds a target="_blank" attribute to the link'),
                  'options'   => array( 'off' => 'No', 'on' => 'Yes' ),
                  'std'       => 'on'
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
      }

      public static function render_content( $attr = array(), $content = '' ){
         global $base_url;
         extract(gavias_merge_atts(array(
            'title'              => '',
            'icon'               => '',
            'icon_image'         => '',
            'image_1'            => '',
            'image_2'            => '',
            'position'           => 'left',
            'link'               => '',
            'target'             => '',
            'style'              => 'style-v1',
            'el_class'           => '',
            'animate'            => '',
            'animate_delay'      => ''
         ), $attr));

         // target
         if( $target =='on' ){
            $target = 'target="_blank"';
         } else {
            $target = false;
         }

        if($icon_image) $icon_image = $base_url . $icon_image; 

         if($image_1) $image_1 = $base_url . $image_1; 
         if($image_2) $image_2 = $base_url . $image_2; 

         $el_class .= ' ' . $position;
         if($style) $el_class .= ' ' . $style;
         if($animate) $el_class .= ' wow ' . $animate; 

         $skrollable1 = '';
         $skrollable2 = '';
         if($style == 'style-v1'){
           if($position == 'left') $skrollable2 = 'data-bottom-top="bottom: -150px;" data-top-bottom="bottom: 10px;"';
           if($position == 'right') $skrollable2 = 'data-bottom-top="bottom: -150px;" data-top-bottom="bottom: 10px;"';
         }
         ob_start();
         ?>

        <div class="widget gsc-images-parallax <?php print $el_class; ?> ">
          <div class="widget-content">
            <div class="images">

              <?php if($icon || $icon_image || $title){ ?>
                <div class="content-box">
                  <?php if($icon){ ?><div class="icon <?php print $icon ?>"></div> <?php } ?>
                  <?php if($icon_image){ ?><div class="icon"><img src="<?php print $icon_image ?>" alt="<?php print $title; ?>"/> </div> <?php } ?>
                  <?php if($title){ ?>
                    <?php if($link){ ?><a href="<?php print $link ?>"> <?php } ?>
                      <?php print $title; ?>
                    <?php if($link){ ?> </a> <?php } ?>
                  <?php } ?>
                </div>
              <?php } ?>

              <?php if($image_1){ ?>
                <div class="image-1" <?php print $skrollable1 ?>>
                  <?php if($link){ ?><a href="<?php print $link ?>" <?php print $target ?>> <?php } ?>
                    <img src="<?php print $image_1 ?>" alt="<?php print $title; ?>" />
                  <?php if($link){ ?> </a> <?php } ?>
                </div>  
              <?php } ?>

              <?php if($image_2){ ?>
                <div class="image-2" <?php print $skrollable2 ?>>
                  <?php if($link){ ?><a href="<?php print $link ?>" <?php print $target ?>> <?php } ?>
                    <img src="<?php print $image_2 ?>" alt="<?php print $title; ?>" />
                  <?php if($link){ ?> </a> <?php } ?>
                </div>
              <?php } ?> 

            </div>
          </div>
        </div>

         <?php return ob_get_clean() ?>
        <?php            
      } 

   }
endif;   
