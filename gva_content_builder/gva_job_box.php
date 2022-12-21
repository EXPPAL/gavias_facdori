<?php 
if(!class_exists('element_gva_job_box')):
   class element_gva_job_box{ 
      public function render_form(){
         $fields = array(
            'type'            => 'gva_job_box',
            'title'           => t('Job Box'),
            'fields' => array(
               array(
                  'id'        => 'title',
                  'type'      => 'text',
                  'title'     => 'Title',
                  'admin'     => true
               ),
               array(
                  'id'        => 'logo',
                  'type'      => 'upload',
                  'title'     => 'Logo',
               ),
               array(
                  'id'        => 'job_type',
                  'type'      => 'text',
                  'title'     => t('Job Type'),
                  'default'   => 'Full Time',
                  'des'       => 'Job Type: Full Time, Part Time, Contact...'
               ),
               array(
                  'id'        => 'address',
                  'type'      => 'text',
                  'title'     => t('Address'),
               ),
               array(
                  'id'        => 'company',
                  'type'      => 'text',
                  'title'     => t('Company Name'),
               ),
               array(
                  'id'        => 'link',
                  'type'      => 'text',
                  'title'     => t('Link'),
               ),
                array(
                  'id'        => 'target',
                  'type'      => 'select',
                  'options'   => array( 'off' => 'Off', 'on' => 'On' ),
                  'title'     => t('Open in new window'),
                  'desc'      => t('Adds a target="_blank" attribute to the link.'),
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
            'logo'                  => '',
            'job_type'              => '',
            'address'               => '',
            'company'               => '',
            'link'                  => '',
            'target'                => 'off',
            'el_class'              => '',
            'animate'               => '',
            'animate_delay'         => ''
         ), $attr));
         if($logo) $logo = $base_url . $logo; 
         if($animate) $el_class .= ' wow ' . $animate; 

         ob_start();
         ?>
         <div class="widget gva-job-box clearfix <?php print $el_class; ?>" <?php print gavias_content_builder_print_animate_wow('', $animate_delay) ?>>
            <div class="box-content">
               <div class="logo-inner">
                  <?php if($logo){ ?><img src="<?php print $logo ?>" alt="<?php print $title ?>"/><?php } ?>
               </div>   
               <div class="content-inner">
                  <div class="job-type"><?php print $job_type; ?></div>
                  <div class="box-title">
                     <a class="title" <?php if($link) print 'href="'. $link .'"' ?> <?php print $target ?>><?php print $title ?></a>   
                  </div>
                  <div class="information">
                     <ul>
                        <?php if($company){ ?><li><i class="fas fa-suitcase"></i><?php print $company ?></li><?php } ?>
                        <?php if($address){ ?><li><i class="fas fa-map-marker"></i><?php print $address ?></li><?php } ?>
                     </ul>
                  </div>
               </div>
            </div>  
         </div>
         <?php return ob_get_clean() ?>
         <?php
      }
   }
endif;   




