<?php 

if(!class_exists('element_gva_instagram')):
   class element_gva_instagram{

      public function render_form(){
         $fields = array(
            'type' => 'gsc_instagram',
            'title' => ('Instagram'), 
            'size' => 3,'fields' => array(
               array(
                  'id'        => 'title',
                  'type'      => 'text',
                  'title'     => t('Title'),
                  'admin'     => true
               ),
               array(
                  'id'        => 'content',
                  'type'      => 'textarea',
                  'title'     => t('Content'),
                  'desc'      => t('Some Shortcodes and HTML tags allowed'),
               ),
               array(
                  'id'        => 'username',
                  'type'      => 'text',
                  'title'     => t('Username'),
               ),
               array(
                  'id'        => 'access_token',
                  'type'      => 'text',
                  'title'     => t('Access Token '),
               ),
               array(
                  'id'        => 'number',
                  'type'      => 'text',
                  'title'     => t('Number'),
                  'std'       => '6'
               ),
               array(
                  'id'        => 'columns',
                  'type'      => 'text',
                  'title'     => t('Columns'),
                  'std'       => '5'
               ),
               array(
                  'id'        => 'columns_md',
                  'type'      => 'text',
                  'title'     => t('Columns for medium screen'),
                  'std'       => '5'
               ),
               array(
                  'id'        => 'columns_sm',
                  'type'      => 'text',
                  'title'     => t('Columns for small screen'),
                  'std'       => '5'
               ),
               array(
                  'id'        => 'link',
                  'type'      => 'select',
                  'title'     => t('Show link use'),
                  'options'   => array(
                     1     =>  t('Enable'),
                     0     =>  t('Disable')               
                  )
               ),
               array(
                  'id'        => 'style',
                  'title'     => t('Style'),
                  'type'      => 'select',
                  'options'   => array(
                     'style-1'        => 'default',
                     'style-2'        => 'style #2: no padding',
                  ),
                  'std'    => 'icon-left',
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
                  'id'     => 'el_class',
                  'type'      => 'text',
                  'title'  => t('Extra class name'),
                  'desc'      => t('Style particular content element differently - add a class name and refer to it in custom CSS.'),
               ),

            ),                                       
         );
         return $fields;
      }

      public static function render_content( $attr, $content = '' ){
         extract(gavias_merge_atts(array(
            'title'           => '',
            'content'         => '',
            'username'        => '',
            'access_token'    => '',
            'number'          => '6',
            'columns'         => '5',
            'columns_sm'      => '4',
            'columns_md'      => '5', 
            'link'            => 0,
            'style'           => 'style-1',
            'animate'         => '',
            'animate_delay'   => '',
            'el_class'        => ''
         ), $attr));
         
         $el_class .= ' ' . $style;

         if(empty($access_token)){ // doesn't using token

            $results_array = false;
            if($username){
               $results_array = scrape_insta_hash($username);
            }
            if($link && $results_array){
               $link = 'https://' . $results_array['hostname'] . '/' . $username;
            }
            if($animate) $el_class .= ' wow ' . $animate; 
            ob_start();
         ?>
            <div class="widget gsc-instagram <?php print $el_class; ?>" <?php print gavias_content_builder_print_animate_wow('', $animate_delay) ?>>
               <div class="widget-heading">
                  <?php if($title){ ?>
                     <div class="title"><?php print $title ?> <?php if($link) print "<a href=\"{$link}\">{$username}</a>"; ?></div>
                  <?php } ?>
                  <?php if($content){ ?>
                     <div class="desc"><?php print $content; ?></div>
                  <?php } ?>
               </div>
               <?php
               
               ?>
               <div class="widget-content">
                  <div class="owl-carousel init-carousel-owl" data-items="<?php print $columns ?>" data-items_lg="<?php print $columns ?>" data-items_md="<?php print $columns_md ?>" data-items_sm="<?php print $columns_sm ?>" data-items_xs="2" data-loop="1" data-speed="500" data-auto_play="1" data-auto_play_speed="2000" data-auto_play_timeout="3000" data-auto_play_hover="1" data-navigation="0" data-rewind_nav="0" data-pagination="0" data-mouse_drag="1" data-touch_drag="1">
                     <?php 
                        if($results_array){

                           for ($i=0; $i <= $number; $i++) { 
                              $image = $results_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'][$i]['node'];
                              print '<div class="instagram-image item"><a data-rel="prettyPhoto[g_gal]" href="'.$image['display_url'].'"><img src="'.$image['thumbnail_src'].'" alt=""/></a></div>';
                           }
                        }
                     ?>
                  </div>
               </div>
            </div>
            <?php return ob_get_clean() ?>
          <?php

         }else{
            $photo_count = $number;
            $json_link = "https://api.instagram.com/v1/users/self/media/recent/?";
            $json_link .="access_token={$access_token}&count={$photo_count}";
            $json = file_get_contents($json_link);
            $obj = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', $json), true);
            if($link && $results_array){
               $link = 'https://www.instagram.com/'. $username;
            }
         ob_start();
         ?>
            <div class="widget gsc-instagram <?php print $el_class; ?>" <?php print gavias_content_builder_print_animate_wow('', $animate_delay) ?>>
               <div class="widget-heading">
                  <?php if($title){ ?>
                     <div class="title"><?php print $title ?> <?php if($link) print "<a href=\"{$link}\">{$username}</a>"; ?></div>
                  <?php } ?>
                  <?php if($content){ ?>
                     <div class="desc"><?php print $content; ?></div>
                  <?php } ?>
               </div>
               <?php
               
               ?>
               <div class="widget-content">
                  <div class="owl-carousel init-carousel-owl" data-items="<?php print $columns ?>" data-items_lg="<?php print $columns ?>" data-items_md="<?php print $columns_md ?>" data-items_sm="<?php print $columns_sm ?>" data-items_xs="2" data-loop="1" data-speed="500" data-auto_play="1" data-auto_play_speed="2000" data-auto_play_timeout="3000" data-auto_play_hover="1" data-navigation="0" data-rewind_nav="0" data-pagination="0" data-mouse_drag="1" data-touch_drag="1">
                     <?php 

                        foreach ($obj['data'] as $post){
                           $pic_text = $post['caption']['text'];
                           $pic_link = $post['link'];
                           $pic_like_count = $post['likes']['count'];
                           $pic_comment_count=$post['comments']['count'];
                           $pic_src=str_replace("http://", "https://", $post['images']['standard_resolution']['url']);
                           $pic_created_time=date("F j, Y", $post['caption']['created_time']);
                           $pic_created_time=date("F j, Y", strtotime($pic_created_time . " +1 days"));
                           print '<div class="instagram-image item"><a data-rel="prettyPhoto[g_gal]" href="'.$pic_src.'"><img src="'.$pic_src.'" alt=""/></a></div>';
                        }
                     ?>
                  </div>
               </div>
            </div>
            <?php return ob_get_clean() ?>

            <?php
         }
      }

   } 
endif;   


