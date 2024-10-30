<?php
   function cspgf_admin_settings()
   {
   ?>
<div class="wp-header-end"></div>
<div class="wrap gs_popuptype_holder seo_pops">
   <div>
      <form id="myForm" method="post" action="<?php if(is_multisite() && is_network_admin()){echo '../options.php';}else{echo 'options.php';}?>">
         <?php
            settings_fields('cspgf_option_group');
            do_settings_sections('cspgf_option_group');
            $cspgf_Main_Settings = get_option('cspgf_Main_Settings', false);
            if (isset($cspgf_Main_Settings['cspgf_enabled'])) {
                $cspgf_enabled = $cspgf_Main_Settings['cspgf_enabled'];
            } else {
                $cspgf_enabled = '';
            }
            if (isset($_GET['settings-updated'])) {
            ?>
         <div id="message" class="updated">
            <p class="cr_saved_notif"><strong>&nbsp;<?php echo esc_html__('Settings saved.', 'coronavirus-spread-prediction-graphs-free');?></strong></p>
         </div>
         <?php
            $get = get_option('coderevolution_settings_changed', 0);
            if($get == 1)
            {
                delete_option('coderevolution_settings_changed');
            ?>
         <div id="message" class="updated">
            <p class="cr_failed_notif"><strong>&nbsp;<?php echo esc_html__('Plugin registration failed!', 'coronavirus-spread-prediction-graphs-free');?></strong></p>
         </div>
         <?php 
            }
            elseif($get == 2)
            {
                    delete_option('coderevolution_settings_changed');
            ?>
         <div id="message" class="updated">
            <p class="cr_saved_notif"><strong>&nbsp;<?php echo esc_html__('Plugin registration successful!', 'coronavirus-spread-prediction-graphs-free');?></strong></p>
         </div>
         <?php 
            }
                }
            ?>
         <div>
            <div class="cspgf_class">
               <table>
                  <tr>
                     <td>
                        <h1>
                           <span class="gs-sub-heading"><b>Viral Pandemic Prediction Tools Free - <?php echo esc_html__('Main Switch:', 'coronavirus-spread-prediction-graphs-free');?></b>&nbsp;</span>
                           <span class="cr_07_font">v1.0&nbsp;</span>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Enable or disable this plugin. This acts like a main switch.", 'coronavirus-spread-prediction-graphs-free');
                                    ?>
                              </div>
                           </div>
                        </h1>
                     </td>
                     <td>
                        <div class="slideThree">	
                           <input class="input-checkbox" type="checkbox" id="cspgf_enabled" name="cspgf_Main_Settings[cspgf_enabled]"<?php
                              if ($cspgf_enabled == 'on')
                                  echo ' checked ';
                              ?>>
                           <label for="cspgf_enabled"></label>
                        </div>
                     </td>
                  </tr>
               </table>
            </div>
            <div><?php if($cspgf_enabled != 'on'){echo '<div class="crf_bord cr_color_red cr_auto_update">' . esc_html__('This feature of the plugin is disabled! Please enable it from the above switch.', 'coronavirus-spread-prediction-graphs-free') . '</div>';}?>
               <table>
                  <tr>
                     <td>
                        <hr/>
                     </td>
                     <td>
                        <hr/>
                     </td>
                  </tr>
               <tr><td colspan="2">
               <h3><?php echo esc_html__("Usage Tips:", 'coronavirus-spread-prediction-graphs-free');?></h3>
                  <ul>
                     <li><?php echo sprintf( wp_kses( __( 'This is the free version of this plugin. To get more features (and also allow your visitors to input data and create their own pandemic scenarios), and also benefit from frequent updates, please purchase it\'s full version: <a href="%s" target="_blank">here</a>.', 'coronavirus-spread-prediction-graphs-free'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://1.envato.market/covid19' ) );?>
                     </li>
                     <li><?php echo sprintf( wp_kses( __( 'Need help configuring this plugin? Please check it\'s full version\'s <a href="%s" target="_blank">video tutorial</a>.', 'coronavirus-spread-prediction-graphs-free'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://www.youtube.com/watch?v=QFcJOabci2k' ) );?>
                     </li>
                  </ul>
               
               </td></tr>
               </table>
               <hr/>
               <p>
               <h3><?php echo esc_html__("Available shortcode (also with Gutenberg block alternatives):", 'coronavirus-spread-prediction-graphs-free');?> </h3>
               <ul class="cr_list_type">
                  <li><h4>[coronavirus-spread-prediction-table]</h4> <i><?php echo esc_html__("Used to display a table of estimated spreading of a viral pandemic. You can use the following shortcode parameters:", 'coronavirus-spread-prediction-graphs-free');?></i>
                        <ol>
                        <li>
                        <b class="cspgf-red-me">'starting_population'</b> => <?php echo esc_html__("The population to start the ecuation with. Default:", 'coronavirus-spread-prediction-graphs-free');?>'7727439400'</li><li>
                        <b class="cspgf-red-me">'unkillable_elite_in_bunkers'</b> => <?php echo esc_html__("The population that will not die. Default:", 'coronavirus-spread-prediction-graphs-free');?>'50000'</li><li>
                        <b class="cspgf-red-me">'start_date'</b> => <?php echo esc_html__("The date when the pandemic starts. Default:", 'coronavirus-spread-prediction-graphs-free');?>'01-01-2020'</li><li>
                        <b class="cspgf-red-me">'initial_infections'</b> => <?php echo esc_html__("The count of the initially infected people. Default:", 'coronavirus-spread-prediction-graphs-free');?>'2'</li><li>
                        <b class="cspgf-red-me">'infection_rate'</b> => <?php echo esc_html__("The rate of infection - how many newly infected people each infected will generate. Default:", 'coronavirus-spread-prediction-graphs-free');?>'2.45'</li><li>
                        <b class="cspgf-red-me">'incubation_days'</b> => <?php echo esc_html__("The incubation period of the disease (in days). Default:", 'coronavirus-spread-prediction-graphs-free');?>'10'</li><li>
                        <b class="cspgf-red-me">'mortality_rate'</b> => <?php echo esc_html__("The mortality rate of the disease (in percentage). Default:", 'coronavirus-spread-prediction-graphs-free');?>'3'</li><li>
                        <b class="cspgf-red-me">'mortality_complicator'</b> => <?php echo esc_html__("The mortality complicator of the disease (in percentage). This kicks in when many new infected are being generated in a short period of time (no more free space in hospitals). Default:", 'coronavirus-spread-prediction-graphs-free');?>'10'</li><li>
                        <b class="cspgf-red-me">'burnout_rate'</b> => <?php echo esc_html__("The rate after which the disease will be stopped (cured or self contained) - (in percentage). Default:", 'coronavirus-spread-prediction-graphs-free');?>'4'</li><li>
                        <b class="cspgf-red-me">'iteration_count'</b> => <?php echo esc_html__("The number of iterations to display. Default:", 'coronavirus-spread-prediction-graphs-free');?>'50'</li><li>
                        <b>'date_format'</b> => <?php echo esc_html__("The format of the date. Default:", 'coronavirus-spread-prediction-graphs-free');?>'Y-m-d'</li><li>
                        <b>'header_texts'</b> => <?php echo esc_html__("A comma separated list of header texts for the table. Default:'Date,Day,New Infected,Total Infected,New Deaths,Total Deaths'", 'coronavirus-spread-prediction-graphs-free');?></li><li>
                        <b>'thousands_sep'</b> => <?php echo esc_html__("The 'thousand' separator for numbers. Default:", 'coronavirus-spread-prediction-graphs-free');?>','
                        </li>
                        </ol>
                        </li>
                    <li><h4>[coronavirus-new-infected-death-chart]</h4> <i><?php echo esc_html__("Used to display a chart to display and compare values for estimated new infected cases and new deaths for a time period, of a viral pandemic. You can use the following shortcode parameters:", 'coronavirus-spread-prediction-graphs-free');?></i>
                        <ol>
                        <li>
                        <b class="cspgf-red-me">'starting_population'</b> => <?php echo esc_html__("The population to start the ecuation with. Default:", 'coronavirus-spread-prediction-graphs-free');?>'7727439400'</li><li>
                        <b class="cspgf-red-me">'unkillable_elite_in_bunkers'</b> => <?php echo esc_html__("The population that will not die. Default:", 'coronavirus-spread-prediction-graphs-free');?>'50000'</li><li>
                        <b class="cspgf-red-me">'start_date'</b> => <?php echo esc_html__("The date when the pandemic starts. Default:", 'coronavirus-spread-prediction-graphs-free');?>'01-01-2020'</li><li>
                        <b class="cspgf-red-me">'initial_infections'</b> => <?php echo esc_html__("The count of the initially infected people. Default:", 'coronavirus-spread-prediction-graphs-free');?>'2'</li><li>
                        <b class="cspgf-red-me">'infection_rate'</b> => <?php echo esc_html__("The rate of infection - how many newly infected people each infected will generate. Default:", 'coronavirus-spread-prediction-graphs-free');?>'2.45'</li><li>
                        <b class="cspgf-red-me">'incubation_days'</b> => <?php echo esc_html__("The incubation period of the disease (in days). Default:", 'coronavirus-spread-prediction-graphs-free');?>'10'</li><li>
                        <b class="cspgf-red-me">'mortality_rate'</b> => <?php echo esc_html__("The mortality rate of the disease (in percentage). Default:", 'coronavirus-spread-prediction-graphs-free');?>'3'</li><li>
                        <b class="cspgf-red-me">'mortality_complicator'</b> => <?php echo esc_html__("The mortality complicator of the disease (in percentage). This kicks in when many new infected are being generated in a short period of time (no more free space in hospitals). Default:", 'coronavirus-spread-prediction-graphs-free');?>'10'</li><li>
                        <b class="cspgf-red-me">'burnout_rate'</b> => <?php echo esc_html__("The rate after which the disease will be stopped (cured or self contained) - (in percentage). Default:", 'coronavirus-spread-prediction-graphs-free');?>'4'</li><li>
                        <b class="cspgf-red-me">'iteration_count'</b> => <?php echo esc_html__("The number of iterations to display. Default:", 'coronavirus-spread-prediction-graphs-free');?>'50'</li><li>
                        <b>'date_format'</b> => <?php echo esc_html__("The format of the date. Default:", 'coronavirus-spread-prediction-graphs-free');?>'Y-m-d'</li><li>
                        <b>'align'</b> => <?php echo esc_html__("The alignment of the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'alignright'</li><li>
                        <b>'margin'</b> => <?php echo esc_html__("The margin size of the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'5px 20px'</li><li>
                        <b>'datalabels'</b> => <?php echo esc_html__("A comma separated list of labels for the top of the graph. Default:'New Infected, New Deaths'", 'coronavirus-spread-prediction-graphs-free');?></li><li>
                        <b>'canvaswidth'</b>      => <?php echo esc_html__("The width of the canvas of the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'625'</li><li>
                        <b>'canvasheight'</b>     => <?php echo esc_html__("The height of the canvas of the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'625'</li><li>
                        <b>'width'</b>			   => <?php echo esc_html__("The width of the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'100%'</li><li>
                        <b>'height'</b>		   => <?php echo esc_html__("The height of the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'auto'</li><li>
                        <b>'relativewidth'</b>	   => <?php echo esc_html__("Enable relative width. Default:", 'coronavirus-spread-prediction-graphs-free');?>'1'</li><li>
                        <b>'classn'</b>			   => <?php echo esc_html__("Additional class for the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>''</li><li>
                        <b>'colors'</b>           => <?php echo esc_html__("A comma separated list of colors for graph elements. Default:", 'coronavirus-spread-prediction-graphs-free');?>'#69D2E7,#a0a48C,#F38630,#96CE7F,#CEBC17,#CE4264'</li><li>
                        <b>'fillopacity'</b>      => <?php echo esc_html__("The opacity of the color filling of graph elements. Default:", 'coronavirus-spread-prediction-graphs-free');?>'0.7'</li><li>
                        <b>'animation'</b>		   => <?php echo esc_html__("Enable animations for the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'true'</li><li>
                        <b>'scalefontsize'</b>    => <?php echo esc_html__("The size of the fonts, scaled. Default:", 'coronavirus-spread-prediction-graphs-free');?>'12'</li><li>
                        <b>'scalefontcolor'</b>   => <?php echo esc_html__("The color of the fonts. Default:", 'coronavirus-spread-prediction-graphs-free');?>'#666'</li><li>
                        <b>'scaleoverride'</b>    => <?php echo esc_html__("The override for fonts. Default:", 'coronavirus-spread-prediction-graphs-free');?>'false'</li><li>
                        <b>'scalesteps'</b> 	   => <?php echo esc_html__("The steps for fonts (advanced). Default:", 'coronavirus-spread-prediction-graphs-free');?>'null'</li><li>
                        <b>'scalestepwidth'</b>   => <?php echo esc_html__("The step width for fonts (advanced). Default:", 'coronavirus-spread-prediction-graphs-free');?>'null'</li><li>
                        <b>'scalestartvalue'</b>  => <?php echo esc_html__("The step start value for fonts (advanced). Default:", 'coronavirus-spread-prediction-graphs-free');?>'null'
                        </li>
                        </ol>
                        </li>
                    <li><h4>[coronavirus-total-infected-death-chart]</h4> <i><?php echo esc_html__("Used to display a chart to display and compare values for estimated total infected cases and total deaths for a time period, of a viral pandemic. You can use the following shortcode parameters:", 'coronavirus-spread-prediction-graphs-free');?></i>
                        <ol>
                        <li>
                        <b class="cspgf-red-me">'starting_population'</b> => <?php echo esc_html__("The population to start the ecuation with. Default:", 'coronavirus-spread-prediction-graphs-free');?>'7727439400'</li><li>
                        <b class="cspgf-red-me">'unkillable_elite_in_bunkers'</b> => <?php echo esc_html__("The population that will not die. Default:", 'coronavirus-spread-prediction-graphs-free');?>'50000'</li><li>
                        <b class="cspgf-red-me">'start_date'</b> => <?php echo esc_html__("The date when the pandemic starts. Default:", 'coronavirus-spread-prediction-graphs-free');?>'01-01-2020'</li><li>
                        <b class="cspgf-red-me">'initial_infections'</b> => <?php echo esc_html__("The count of the initially infected people. Default:", 'coronavirus-spread-prediction-graphs-free');?>'2'</li><li>
                        <b class="cspgf-red-me">'infection_rate'</b> => <?php echo esc_html__("The rate of infection - how many newly infected people each infected will generate. Default:", 'coronavirus-spread-prediction-graphs-free');?>'2.45'</li><li>
                        <b class="cspgf-red-me">'incubation_days'</b> => <?php echo esc_html__("The incubation period of the disease (in days). Default:", 'coronavirus-spread-prediction-graphs-free');?>'10'</li><li>
                        <b class="cspgf-red-me">'mortality_rate'</b> => <?php echo esc_html__("The mortality rate of the disease (in percentage). Default:", 'coronavirus-spread-prediction-graphs-free');?>'3'</li><li>
                        <b class="cspgf-red-me">'mortality_complicator'</b> => <?php echo esc_html__("The mortality complicator of the disease (in percentage). This kicks in when many new infected are being generated in a short period of time (no more free space in hospitals). Default:", 'coronavirus-spread-prediction-graphs-free');?>'10'</li><li>
                        <b class="cspgf-red-me">'burnout_rate'</b> => <?php echo esc_html__("The rate after which the disease will be stopped (cured or self contained) - (in percentage). Default:", 'coronavirus-spread-prediction-graphs-free');?>'4'</li><li>
                        <b class="cspgf-red-me">'iteration_count'</b> => <?php echo esc_html__("The number of iterations to display. Default:", 'coronavirus-spread-prediction-graphs-free');?>'50'</li><li>
                        <b>'date_format'</b> => <?php echo esc_html__("The format of the date. Default:", 'coronavirus-spread-prediction-graphs-free');?>'Y-m-d'</li><li>
                        <b>'align'</b> => <?php echo esc_html__("The alignment of the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'alignright'</li><li>
                        <b>'margin'</b> => <?php echo esc_html__("The margin size of the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'5px 20px'</li><li>
                        <b>'datalabels'</b> => <?php echo esc_html__("A comma separated list of labels for the top of the graph. Default:'Total Infected, Total Deaths'", 'coronavirus-spread-prediction-graphs-free');?></li><li>
                        <b>'canvaswidth'</b>      => <?php echo esc_html__("The width of the canvas of the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'625'</li><li>
                        <b>'canvasheight'</b>     => <?php echo esc_html__("The height of the canvas of the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'625'</li><li>
                        <b>'width'</b>			   => <?php echo esc_html__("The width of the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'100%'</li><li>
                        <b>'height'</b>		   => <?php echo esc_html__("The height of the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'auto'</li><li>
                        <b>'relativewidth'</b>	   => <?php echo esc_html__("Enable relative width. Default:", 'coronavirus-spread-prediction-graphs-free');?>'1'</li><li>
                        <b>'classn'</b>			   => <?php echo esc_html__("Additional class for the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>''</li><li>
                        <b>'colors'</b>           => <?php echo esc_html__("A comma separated list of colors for graph elements. Default:", 'coronavirus-spread-prediction-graphs-free');?>'#69D2E7,#a0a48C,#F38630,#96CE7F,#CEBC17,#CE4264'</li><li>
                        <b>'fillopacity'</b>      => <?php echo esc_html__("The opacity of the color filling of graph elements. Default:", 'coronavirus-spread-prediction-graphs-free');?>'0.7'</li><li>
                        <b>'animation'</b>		   => <?php echo esc_html__("Enable animations for the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'true'</li><li>
                        <b>'scalefontsize'</b>    => <?php echo esc_html__("The size of the fonts, scaled. Default:", 'coronavirus-spread-prediction-graphs-free');?>'12'</li><li>
                        <b>'scalefontcolor'</b>   => <?php echo esc_html__("The color of the fonts. Default:", 'coronavirus-spread-prediction-graphs-free');?>'#666'</li><li>
                        <b>'scaleoverride'</b>    => <?php echo esc_html__("The override for fonts. Default:", 'coronavirus-spread-prediction-graphs-free');?>'false'</li><li>
                        <b>'scalesteps'</b> 	   => <?php echo esc_html__("The steps for fonts (advanced). Default:", 'coronavirus-spread-prediction-graphs-free');?>'null'</li><li>
                        <b>'scalestepwidth'</b>   => <?php echo esc_html__("The step width for fonts (advanced). Default:", 'coronavirus-spread-prediction-graphs-free');?>'null'</li><li>
                        <b>'scalestartvalue'</b>  => <?php echo esc_html__("The step start value for fonts (advanced). Default:", 'coronavirus-spread-prediction-graphs-free');?>'null'
                        </li>
                        </ol>
                        </li>
                    <li><h4>[coronavirus-population-decline-chart]</h4> <i><?php echo esc_html__("Used to display a chart to display the amount of population decline, for a time period, in case of  a viral pandemic. You can use the following shortcode parameters:", 'coronavirus-spread-prediction-graphs-free');?></i>
                        <ol>
                        <li>
                        <b class="cspgf-red-me">'starting_population'</b> => <?php echo esc_html__("The population to start the ecuation with. Default:", 'coronavirus-spread-prediction-graphs-free');?>'7727439400'</li><li>
                        <b class="cspgf-red-me">'unkillable_elite_in_bunkers'</b> => <?php echo esc_html__("The population that will not die. Default:", 'coronavirus-spread-prediction-graphs-free');?>'50000'</li><li>
                        <b class="cspgf-red-me">'start_date'</b> => <?php echo esc_html__("The date when the pandemic starts. Default:", 'coronavirus-spread-prediction-graphs-free');?>'01-01-2020'</li><li>
                        <b class="cspgf-red-me">'initial_infections'</b> => <?php echo esc_html__("The count of the initially infected people. Default:", 'coronavirus-spread-prediction-graphs-free');?>'2'</li><li>
                        <b class="cspgf-red-me">'infection_rate'</b> => <?php echo esc_html__("The rate of infection - how many newly infected people each infected will generate. Default:", 'coronavirus-spread-prediction-graphs-free');?>'2.45'</li><li>
                        <b class="cspgf-red-me">'incubation_days'</b> => <?php echo esc_html__("The incubation period of the disease (in days). Default:", 'coronavirus-spread-prediction-graphs-free');?>'10'</li><li>
                        <b class="cspgf-red-me">'mortality_rate'</b> => <?php echo esc_html__("The mortality rate of the disease (in percentage). Default:", 'coronavirus-spread-prediction-graphs-free');?>'3'</li><li>
                        <b class="cspgf-red-me">'mortality_complicator'</b> => <?php echo esc_html__("The mortality complicator of the disease (in percentage). This kicks in when many new infected are being generated in a short period of time (no more free space in hospitals). Default:", 'coronavirus-spread-prediction-graphs-free');?>'10'</li><li>
                        <b class="cspgf-red-me">'burnout_rate'</b> => <?php echo esc_html__("The rate after which the disease will be stopped (cured or self contained) - (in percentage). Default:", 'coronavirus-spread-prediction-graphs-free');?>'4'</li><li>
                        <b class="cspgf-red-me">'iteration_count'</b> => <?php echo esc_html__("The number of iterations to display. Default:", 'coronavirus-spread-prediction-graphs-free');?>'50'</li><li>
                        <b>'date_format'</b> => <?php echo esc_html__("The format of the date. Default:", 'coronavirus-spread-prediction-graphs-free');?>'Y-m-d'</li><li>
                        <b>'align'</b> => <?php echo esc_html__("The alignment of the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'alignright'</li><li>
                        <b>'margin'</b> => <?php echo esc_html__("The margin size of the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'5px 20px'</li><li>
                        <b>'datalabels'</b> => <?php echo esc_html__("A comma separated list of labels for the top of the graph. Default:'Population Decline'", 'coronavirus-spread-prediction-graphs-free');?></li><li>
                        <b>'canvaswidth'</b>      => <?php echo esc_html__("The width of the canvas of the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'625'</li><li>
                        <b>'canvasheight'</b>     => <?php echo esc_html__("The height of the canvas of the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'625'</li><li>
                        <b>'width'</b>			   => <?php echo esc_html__("The width of the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'100%'</li><li>
                        <b>'height'</b>		   => <?php echo esc_html__("The height of the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'auto'</li><li>
                        <b>'relativewidth'</b>	   => <?php echo esc_html__("Enable relative width. Default:", 'coronavirus-spread-prediction-graphs-free');?>'1'</li><li>
                        <b>'classn'</b>			   => <?php echo esc_html__("Additional class for the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>''</li><li>
                        <b>'colors'</b>           => <?php echo esc_html__("A comma separated list of colors for graph elements. Default:", 'coronavirus-spread-prediction-graphs-free');?>'#69D2E7,#a0a48C,#F38630,#96CE7F,#CEBC17,#CE4264'</li><li>
                        <b>'fillopacity'</b>      => <?php echo esc_html__("The opacity of the color filling of graph elements. Default:", 'coronavirus-spread-prediction-graphs-free');?>'0.7'</li><li>
                        <b>'animation'</b>		   => <?php echo esc_html__("Enable animations for the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'true'</li><li>
                        <b>'scalefontsize'</b>    => <?php echo esc_html__("The size of the fonts, scaled. Default:", 'coronavirus-spread-prediction-graphs-free');?>'12'</li><li>
                        <b>'scalefontcolor'</b>   => <?php echo esc_html__("The color of the fonts. Default:", 'coronavirus-spread-prediction-graphs-free');?>'#666'</li><li>
                        <b>'scaleoverride'</b>    => <?php echo esc_html__("The override for fonts. Default:", 'coronavirus-spread-prediction-graphs-free');?>'false'</li><li>
                        <b>'scalesteps'</b> 	   => <?php echo esc_html__("The steps for fonts (advanced). Default:", 'coronavirus-spread-prediction-graphs-free');?>'null'</li><li>
                        <b>'scalestepwidth'</b>   => <?php echo esc_html__("The step width for fonts (advanced). Default:", 'coronavirus-spread-prediction-graphs-free');?>'null'</li><li>
                        <b>'scalestartvalue'</b>  => <?php echo esc_html__("The step start value for fonts (advanced). Default:", 'coronavirus-spread-prediction-graphs-free');?>'null'
                        </li>
                        </ol>
                        </li>
                    <li><h4>[coronavirus-total-deaths-chart]</h4> <i><?php echo esc_html__("Used to display a chart to display the amount of total deaths count, for a time period, in case of  a viral pandemic. You can use the following shortcode parameters:", 'coronavirus-spread-prediction-graphs-free');?></i>
                        <ol>
                        <li>
                        <b class="cspgf-red-me">'starting_population'</b> => <?php echo esc_html__("The population to start the ecuation with. Default:", 'coronavirus-spread-prediction-graphs-free');?>'7727439400'</li><li>
                        <b class="cspgf-red-me">'unkillable_elite_in_bunkers'</b> => <?php echo esc_html__("The population that will not die. Default:", 'coronavirus-spread-prediction-graphs-free');?>'50000'</li><li>
                        <b class="cspgf-red-me">'start_date'</b> => <?php echo esc_html__("The date when the pandemic starts. Default:", 'coronavirus-spread-prediction-graphs-free');?>'01-01-2020'</li><li>
                        <b class="cspgf-red-me">'initial_infections'</b> => <?php echo esc_html__("The count of the initially infected people. Default:", 'coronavirus-spread-prediction-graphs-free');?>'2'</li><li>
                        <b class="cspgf-red-me">'infection_rate'</b> => <?php echo esc_html__("The rate of infection - how many newly infected people each infected will generate. Default:", 'coronavirus-spread-prediction-graphs-free');?>'2.45'</li><li>
                        <b class="cspgf-red-me">'incubation_days'</b> => <?php echo esc_html__("The incubation period of the disease (in days). Default:", 'coronavirus-spread-prediction-graphs-free');?>'10'</li><li>
                        <b class="cspgf-red-me">'mortality_rate'</b> => <?php echo esc_html__("The mortality rate of the disease (in percentage). Default:", 'coronavirus-spread-prediction-graphs-free');?>'3'</li><li>
                        <b class="cspgf-red-me">'mortality_complicator'</b> => <?php echo esc_html__("The mortality complicator of the disease (in percentage). This kicks in when many new infected are being generated in a short period of time (no more free space in hospitals). Default:", 'coronavirus-spread-prediction-graphs-free');?>'10'</li><li>
                        <b class="cspgf-red-me">'burnout_rate'</b> => <?php echo esc_html__("The rate after which the disease will be stopped (cured or self contained) - (in percentage). Default:", 'coronavirus-spread-prediction-graphs-free');?>'4'</li><li>
                        <b class="cspgf-red-me">'iteration_count'</b> => <?php echo esc_html__("The number of iterations to display. Default:", 'coronavirus-spread-prediction-graphs-free');?>'50'</li><li>
                        <b>'date_format'</b> => <?php echo esc_html__("The format of the date. Default:", 'coronavirus-spread-prediction-graphs-free');?>'Y-m-d'</li><li>
                        <b>'align'</b> => <?php echo esc_html__("The alignment of the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'alignright'</li><li>
                        <b>'margin'</b> => <?php echo esc_html__("The margin size of the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'5px 20px'</li><li>
                        <b>'datalabels'</b> => <?php echo esc_html__("A comma separated list of labels for the top of the graph. Default:'Total Deaths'", 'coronavirus-spread-prediction-graphs-free');?></li><li>
                        <b>'canvaswidth'</b>      => <?php echo esc_html__("The width of the canvas of the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'625'</li><li>
                        <b>'canvasheight'</b>     => <?php echo esc_html__("The height of the canvas of the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'625'</li><li>
                        <b>'width'</b>			   => <?php echo esc_html__("The width of the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'100%'</li><li>
                        <b>'height'</b>		   => <?php echo esc_html__("The height of the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'auto'</li><li>
                        <b>'relativewidth'</b>	   => <?php echo esc_html__("Enable relative width. Default:", 'coronavirus-spread-prediction-graphs-free');?>'1'</li><li>
                        <b>'classn'</b>			   => <?php echo esc_html__("Additional class for the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>''</li><li>
                        <b>'colors'</b>           => <?php echo esc_html__("A comma separated list of colors for graph elements. Default:", 'coronavirus-spread-prediction-graphs-free');?>'#69D2E7,#a0a48C,#F38630,#96CE7F,#CEBC17,#CE4264'</li><li>
                        <b>'fillopacity'</b>      => <?php echo esc_html__("The opacity of the color filling of graph elements. Default:", 'coronavirus-spread-prediction-graphs-free');?>'0.7'</li><li>
                        <b>'animation'</b>		   => <?php echo esc_html__("Enable animations for the graph. Default:", 'coronavirus-spread-prediction-graphs-free');?>'true'</li><li>
                        <b>'scalefontsize'</b>    => <?php echo esc_html__("The size of the fonts, scaled. Default:", 'coronavirus-spread-prediction-graphs-free');?>'12'</li><li>
                        <b>'scalefontcolor'</b>   => <?php echo esc_html__("The color of the fonts. Default:", 'coronavirus-spread-prediction-graphs-free');?>'#666'</li><li>
                        <b>'scaleoverride'</b>    => <?php echo esc_html__("The override for fonts. Default:", 'coronavirus-spread-prediction-graphs-free');?>'false'</li><li>
                        <b>'scalesteps'</b> 	   => <?php echo esc_html__("The steps for fonts (advanced). Default:", 'coronavirus-spread-prediction-graphs-free');?>'null'</li><li>
                        <b>'scalestepwidth'</b>   => <?php echo esc_html__("The step width for fonts (advanced). Default:", 'coronavirus-spread-prediction-graphs-free');?>'null'</li><li>
                        <b>'scalestartvalue'</b>  => <?php echo esc_html__("The step start value for fonts (advanced). Default:", 'coronavirus-spread-prediction-graphs-free');?>'null'
                        </li>
                        </ol>
                        </li>
                  </ul>
               </p>
            </div>
         </div>
         <hr/>
         <div>
            <p class="submit"><input type="submit" name="btnSubmit" id="btnSubmit" class="button button-primary" onclick="unsaved = false;" value="<?php echo esc_html__("Save Settings", 'coronavirus-spread-prediction-graphs-free');?>"/></p>
         </div>
      </form>
   </div>
</div>
<?php
}
?>