<?php
/** 
Plugin Name: COVID-19 Coronavirus - Viral Pandemic Prediction Tools Free Version
Plugin URI: //1.envato.market/coderevolution
Description: This plugin will show prediction graphs and charts for a viral pandemic spreading - applicable for COVID-19 - free version
Author: CodeRevolution
Version: 1.0.1
Author URI: //coderevolution.ro/
Text Domain: coronavirus-spread-prediction-graphs-free
*/
defined('ABSPATH') or die();

function cspgf_load_textdomain() {
    load_plugin_textdomain( 'coronavirus-spread-prediction-graphs-free', false, basename( dirname( __FILE__ ) ) . '/languages' ); 
}
add_action( 'init', 'cspgf_load_textdomain' );
$plugin = plugin_basename(__FILE__);
if(is_admin())
{
    add_action("after_plugin_row_{$plugin}", function( $plugin_file, $plugin_data, $status ) {
        $cr_myplugin_url = '//codecanyon.net/item/covid19-coronavirus-viral-pandemic-prediction-tools-wordpress-plugin/25750154';
        echo '<tr class="active"><td>&nbsp;</td><td colspan="2"><p class="cr_auto_update">';
        echo sprintf( wp_kses( __( 'This is a free version of the plugin. To get the full version of it, please click <a href="%s" target="_blank">here</a>.', 'coronavirus-spread-prediction-graphs-free'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://1.envato.market/covid19'));     
        echo '</p> </td></tr>';
    }, 10, 3 );
    add_action('admin_enqueue_scripts', 'cspgf_admin_enqueue_all');
}
function cspgf_admin_enqueue_all()
{
    $reg_css_code = '.cr_auto_update{background-color:#fff8e5;margin:5px 20px 15px 20px;border-left:4px solid #fff;padding:12px 12px 12px 12px !important;border-left-color:#ffb900;}';
    wp_register_style( 'cspgf-plugin-reg-style', false );
    wp_enqueue_style( 'cspgf-plugin-reg-style' );
    wp_add_inline_style( 'cspgf-plugin-reg-style', $reg_css_code );
}
add_action('admin_menu', 'cspgf_register_my_custom_menu_page');
add_action('network_admin_menu', 'cspgf_register_my_custom_menu_page');
function cspgf_register_my_custom_menu_page()
{
    add_menu_page('Viral Pandemic Prediction Free', 'Viral Pandemic Prediction Free', 'manage_options', 'cspgf_admin_settings', 'cspgf_admin_settings', plugins_url('images/icon.png', __FILE__));
    $main = add_submenu_page('cspgf_admin_settings', esc_html__("Main Settings", 'coronavirus-spread-prediction-graphs-free'), esc_html__("Main Settings", 'coronavirus-spread-prediction-graphs-free'), 'manage_options', 'cspgf_admin_settings');
    add_action( 'load-' . $main, 'cspgf_load_all_admin_js' );
    $more = add_submenu_page('cspgf_admin_settings', esc_html__('Other Plugins', 'coronavirus-spread-prediction-graphs-free'), esc_html__('Other Plugins', 'coronavirus-spread-prediction-graphs-free'), 'manage_options', 'cspgf_more_plugins', 'cspgf_more_plugins');
    add_action( 'load-' . $more, 'cspgf_load_all_admin_js' );
}
function cspgf_more_plugins() {
?>
<style>
.grid {
   display: flex;
     flex-wrap: wrap;
}
.box {
   width: 300px;
   margin: 10px;
   background: white;
   border-radius: 7px;
   overflow: hidden;
   box-shadow: 2px 5px 5px 5px #ececec;
}
.box .info {
   padding: 0px 15px 15px 15px;
}
</style>

<div id="optimize-more">
</div>
<script>
fetch('https://coderevolution.ro/custom-feeds/pandemic-plugins.json')
  .then(response => {
    return response.json()
  })
  .then(sections => {
      let html = "";
      sections.forEach(section => {
         html += `<h3>${section.title}</h3>`;
         html += `<div class="grid">`;
         section.products.forEach(product => {
            html += `<div class="box">
                        <img src="${product.picture}" width="300px" height="150px"/>
                        <div class="info">
                           <h3>${product.name}</h3>
                           <p>${product.description}</p>
                           <a href="${product.buttonLink}" target="_blank"><button class="button button-primary">${product.buttonText}</button></a>
                        </div>
                     </div>`
         })
         html += `</div>`;
      })
      document.getElementById("optimize-more").innerHTML = html;
  })
  .catch(err => {
     console.log(err)
     document.getElementById("optimize-more").innerText = "Error, our website is unreachable from your server.";
  })
</script>
<?php
}
add_filter("plugin_action_links_$plugin", 'cspgf_add_settings_link');
function cspgf_add_settings_link($links)
{
    $plugin_shortcuts = array(
        '<a href="admin.php?page=cspgf_admin_settings">' . esc_html__('Settings', 'coronavirus-spread-prediction-graphs-free') . '</a>',
        '<a href="https://www.buymeacoffee.com/coderevolution" target="_blank" style="color:#3db634;">' . esc_html__('Buy developer a coffee', 'coronavirus-spread-prediction-graphs-free') . '</a>'
    );
    $links = array_merge($links, $plugin_shortcuts);
    return $links;
}

register_activation_hook(__FILE__, 'cspgf_activation_callback');
function cspgf_activation_callback($defaults = FALSE)
{
    if (!get_option('cspgf_Main_Settings') || $defaults === TRUE) {
        $cspgf_Main_Settings = array(
            'cspgf_enabled' => 'on'
        );
        if ($defaults === FALSE) {
            add_option('cspgf_Main_Settings', $cspgf_Main_Settings);
        } else {
            update_option('cspgf_Main_Settings', $cspgf_Main_Settings);
        }
    }
}
function cspgf_display_iframe( $atts, $content  = '')
{
    extract( shortcode_atts(
		array(
			'starting_population' => '7727439400',
            'unkillable_elite_in_bunkers' => '50000',
            'start_date' => '01-01-2020',
            'initial_infections' => '2',
            'infection_rate' => '2.45',
            'incubation_days' => '10',
            'mortality_rate' => '3', //%%
            'mortality_complicator' => '10', //%%
            'burnout_rate' => '4', //%%
            'iteration_count' => '50',
            'date_format' => 'Y-m-d',
            'header_texts' => '',
            'thousands_sep' => ','
		), $atts )
	);
    $html = '';
    if(!is_numeric($iteration_count))
    {
        $iteration_count = 50;
    }
    else
    {
        $iteration_count = floatval($iteration_count);
    }
    if($iteration_count < 0)
    {
        $iteration_count = 50;
    }
    if(!is_numeric($starting_population))
    {
        $starting_population = 7000000000;
    }
    else
    {
        $starting_population = floatval($starting_population);
    }
    if(!is_numeric($unkillable_elite_in_bunkers))
    {
        $unkillable_elite_in_bunkers = 0;
    }
    else
    {
        $unkillable_elite_in_bunkers = floatval($unkillable_elite_in_bunkers);
    }
    if($unkillable_elite_in_bunkers > $starting_population)
    {
        $unkillable_elite_in_bunkers = $starting_population;
    }
    if(!is_numeric($infection_rate))
    {
        $infection_rate = 2.45;
    }
    else
    {
        $infection_rate = floatval($infection_rate);
    }
    if(!is_numeric($mortality_rate))
    {
        $mortality_rate = 3;
    }
    else
    {
        $mortality_rate = floatval($mortality_rate);
    }
    $mortality_rate = $mortality_rate / 100;
    if(!is_numeric($mortality_complicator))
    {
        $mortality_complicator = 10;
    }
    else
    {
        $mortality_complicator = floatval($mortality_complicator);
    }
    $mortality_complicator = $mortality_complicator / 100;
    if(!is_numeric($burnout_rate))
    {
        $burnout_rate = 4;
    }
    else
    {
        $burnout_rate = floatval($burnout_rate);
    }
    $burnout_rate = $burnout_rate / 100;
    if(!is_numeric($incubation_days))
    {
        $incubation_days = 10;
    }
    else
    {
        $incubation_days = floatval($incubation_days);
    }
    
    $header_texts = array_map('trim', explode(',', $header_texts));
    if(!isset($header_texts[0]) || $header_texts[0] == '')
    {
        $header_texts[0] = esc_html__('Date', 'coronavirus-spread-prediction-graphs-free');
    }
    if(!isset($header_texts[1]))
    {
        $header_texts[1] = esc_html__('Day', 'coronavirus-spread-prediction-graphs-free');
    }
    if(!isset($header_texts[2]))
    {
        $header_texts[2] = esc_html__('New Infected', 'coronavirus-spread-prediction-graphs-free');
    }
    if(!isset($header_texts[3]))
    {
        $header_texts[3] = esc_html__('Total Infected', 'coronavirus-spread-prediction-graphs-free');
    }
    if(!isset($header_texts[4]))
    {
        $header_texts[4] = esc_html__('New Deaths', 'coronavirus-spread-prediction-graphs-free');
    }
    if(!isset($header_texts[5]))
    {
        $header_texts[5] = esc_html__('Total Deaths', 'coronavirus-spread-prediction-graphs-free');
    }
    $html .= '<div class="cspgf-table"><table class="coronavirus-spread-prediction" id="cspgf-table-main">';
    $html .= '<tr>';
    $html .= '<th>' . esc_html($header_texts[0]) . '</th>';
    $html .= '<th>' . esc_html($header_texts[1]) . '</th>';
    $html .= '<th>' . esc_html($header_texts[2]) . '</th>';
    $html .= '<th>' . esc_html($header_texts[3]) . '</th>';
    $html .= '<th>' . esc_html($header_texts[4]) . '</th>';
    $html .= '<th>' . esc_html($header_texts[5]) . '</th>';
    $html .= '<th class="cspgf-absorbing-column">' . esc_html__('Population Alive', 'coronavirus-spread-prediction-graphs-free') . '</th>';
    $html .= '</tr>';
    $new_infected = $initial_infections;
    $total_infected = $initial_infections;
    $remaining_population = $starting_population;
    $new_deaths = 0;
    for($i = 0; $i < $iteration_count; $i++)
    {
        $old_new_infected = $new_infected;
        $html .= '<tr>';
        
        $html .= '<td>';
        $html .= date($date_format, strtotime($start_date . ' + ' . ($i * $incubation_days) . ' days'));
        $html .= '</td>';
        
        $current_day = $i * $incubation_days;
        $html .= '<td>';
        $html .= number_format($current_day, 0, '', $thousands_sep);
        $html .= '</td>';
        
        if($i > 0)
        {
            $new_infected = round(max(0, (min(($remaining_population - $unkillable_elite_in_bunkers - $total_infected), ($old_new_infected * (($infection_rate - ($current_day / $incubation_days) * $burnout_rate)))))));
        }
        $html .= '<td>';
        $html .= number_format($new_infected, 0, '', $thousands_sep);
        $html .= '</td>';
        
        if($i > 0)
        {
            $new_deaths = round(min($remaining_population,($new_infected * $mortality_rate) + ($old_new_infected * $mortality_complicator)));
        }
        else
        {
            $new_deaths = round(min($starting_population, ($new_infected * $mortality_rate)));
        }
        if($i > 0)
        {
            $total_infected = min($remaining_population - $unkillable_elite_in_bunkers, ($new_infected + ($total_infected - $new_deaths)));
        }
        $html .= '<td>';
        $html .= number_format($total_infected, 0, '', $thousands_sep);
        $html .= '</td>';
        
        $html .= '<td>';
        $html .= number_format($new_deaths, 0, '', $thousands_sep);
        $html .= '</td>';
        
        if($i > 0)
        {
            $total_deaths = min($remaining_population,(($total_deaths + $new_deaths)));
        }
        else
        {
            $total_deaths = $new_deaths;
        }
        $html .= '<td>';
        $html .= number_format($total_deaths, 0, '', $thousands_sep);
        $html .= '</td>';
        
        if($i > 0)
        {
            $remaining_population = max($unkillable_elite_in_bunkers,($remaining_population - $new_deaths));
        }
        $html .= '<td>';
        $html .= number_format($remaining_population, 0, '', $thousands_sep);
        $html .= '</td>';
        
        $html .= '</tr>';
    }
    $html .= '</table>';
    return $html;
}
function cspgf_sanitize_text_field($data)
{
    return strip_tags(
        stripslashes(
            sanitize_text_field($data
            )
        )
    );
}
function cspgf_display_chart_new_infected_death( $atts, $content  = '')
{
    extract( shortcode_atts(
		array(
			'starting_population' => '7727439400',
            'unkillable_elite_in_bunkers' => '50000',
            'start_date' => '01-01-2020',
            'initial_infections' => '2',
            'infection_rate' => '2.45',
            'incubation_days' => '10',
            'mortality_rate' => '3', //%%
            'mortality_complicator' => '10', //%%
            'burnout_rate' => '4', //%%
            'iteration_count' => '50',
            'date_format' => 'Y-m-d',
            'align' => 'aligncenter',
            'margin' => '5px 20px',
            'datalabels' => 'New Infected, New Deaths',
            'canvaswidth'      => '625',
            'canvasheight'     => '625',
            'width'			   => '100%',
            'height'		   => 'auto',
            'relativewidth'	   => '1',
            'classn'			   => '',
            'colors'           => '#69D2E7,#a0a48C,#F38630,#96CE7F,#CEBC17,#CE4264',
            'fillopacity'      => '0.7',
            'animation'		   => 'true',
            'scalefontsize'    => '12',
            'scalefontcolor'   => '#666',
            'scaleoverride'    => 'false',
            'scalesteps' 	   => 'null',
            'scalestepwidth'   => 'null',
            'scalestartvalue'  => 'null'
		), $atts )
	);
    $html = '';
    if(!is_numeric($iteration_count))
    {
        $iteration_count = 50;
    }
    else
    {
        $iteration_count = floatval($iteration_count);
    }
    if($iteration_count < 0)
    {
        $iteration_count = 50;
    }
    if(!is_numeric($starting_population))
    {
        $starting_population = 7000000000;
    }
    else
    {
        $starting_population = floatval($starting_population);
    }
    if(!is_numeric($unkillable_elite_in_bunkers))
    {
        $unkillable_elite_in_bunkers = 0;
    }
    else
    {
        $unkillable_elite_in_bunkers = floatval($unkillable_elite_in_bunkers);
    }
    if($unkillable_elite_in_bunkers > $starting_population)
    {
        $unkillable_elite_in_bunkers = $starting_population;
    }
    if(!is_numeric($infection_rate))
    {
        $infection_rate = 2.45;
    }
    else
    {
        $infection_rate = floatval($infection_rate);
    }
    if(!is_numeric($mortality_rate))
    {
        $mortality_rate = 3;
    }
    else
    {
        $mortality_rate = floatval($mortality_rate);
    }
    $mortality_rate = $mortality_rate / 100;
    if(!is_numeric($mortality_complicator))
    {
        $mortality_complicator = 10;
    }
    else
    {
        $mortality_complicator = floatval($mortality_complicator);
    }
    $mortality_complicator = $mortality_complicator / 100;
    if(!is_numeric($burnout_rate))
    {
        $burnout_rate = 4;
    }
    else
    {
        $burnout_rate = floatval($burnout_rate);
    }
    $burnout_rate = $burnout_rate / 100;
    if(!is_numeric($incubation_days))
    {
        $incubation_days = 10;
    }
    else
    {
        $incubation_days = floatval($incubation_days);
    }
    
    $new_infected = $initial_infections;
    
    $new_inf_chart = array();
    $new_dead_chart = array();
    $date_chart = array();
    
    $total_infected = $initial_infections;
    $remaining_population = $starting_population;
    $new_deaths = 0;
    for($i = 0; $i < $iteration_count; $i++)
    {
        $old_new_infected = $new_infected;
        $current_day = $i * $incubation_days;
        $date_chart[] = date($date_format, strtotime($start_date . ' + ' . ($i * $incubation_days) . ' days'));
        if($i > 0)
        {
            $new_infected = round(max(0, (min(($remaining_population - $unkillable_elite_in_bunkers - $total_infected), ($old_new_infected * (($infection_rate - ($current_day / $incubation_days) * $burnout_rate)))))));
        }
        $new_inf_chart[] = $new_infected;
        if($i > 0)
        {
            $new_deaths = round(min($remaining_population,($new_infected * $mortality_rate) + ($old_new_infected * $mortality_complicator)));
        }
        else
        {
            $new_deaths = round(min($starting_population, ($new_infected * $mortality_rate)));
        }
        $new_dead_chart[] = $new_deaths;
        if($i > 0)
        {
            $total_infected = min($remaining_population - $unkillable_elite_in_bunkers, ($new_infected + ($total_infected - $new_deaths)));
        }
        if($i > 0)
        {
            $total_deaths = min($remaining_population,(($total_deaths + $new_deaths)));
        }
        else
        {
            $total_deaths = $new_deaths;
        }
        if($i > 0)
        {
            $remaining_population = max($unkillable_elite_in_bunkers,($remaining_population - $new_deaths));
        }
    }
    
    $html .= do_shortcode('[cspgf_charts title="linechart' . uniqid() . '" datalabels="' . esc_html__('Total Infected, Total Deaths', 'coronavirus-spread-prediction-graphs-free') . '" type="line" align="aligncenter" margin="5px 20px" datasets="' . implode(',', $new_inf_chart) . ' next ' . implode(',', $new_dead_chart) . '" labels="' . implode(',', $date_chart) . '" canvasheight="' . $canvasheight . '" width="' . $width . '" height="' . $height . '" relativewidth="' . $relativewidth . '" classn="' . $classn . '" colors="' . $colors . '" fillopacity="' . $fillopacity . '" animation="' . $animation . '" scalefontsize="' . $scalefontsize . '" scalefontcolor="' . $scalefontcolor . '" scaleoverride="' . $scaleoverride . '" scalesteps="' . $scalesteps . '" scalestepwidth="' . $scalestepwidth . '" scalestartvalue="' . $scalestartvalue . '" ]');
    return $html;
}

function cspgf_display_chart_total_infected_death( $atts, $content  = '')
{
    extract( shortcode_atts(
		array(
			'starting_population' => '7727439400',
            'unkillable_elite_in_bunkers' => '50000',
            'start_date' => '01-01-2020',
            'initial_infections' => '2',
            'infection_rate' => '2.45',
            'incubation_days' => '10',
            'mortality_rate' => '3', //%%
            'mortality_complicator' => '10', //%%
            'burnout_rate' => '4', //%%
            'iteration_count' => '50',
            'date_format' => 'Y-m-d',
            'align' => 'aligncenter',
            'margin' => '5px 20px',
            'datalabels' => 'Total Infected, Total Deaths',
            'canvaswidth'      => '625',
            'canvasheight'     => '625',
            'width'			   => '100%',
            'height'		   => 'auto',
            'relativewidth'	   => '1',
            'classn'			   => '',
            'colors'           => '#69D2E7,#a0a48C,#F38630,#96CE7F,#CEBC17,#CE4264',
            'fillopacity'      => '0.7',
            'animation'		   => 'true',
            'scalefontsize'    => '12',
            'scalefontcolor'   => '#666',
            'scaleoverride'    => 'false',
            'scalesteps' 	   => 'null',
            'scalestepwidth'   => 'null',
            'scalestartvalue'  => 'null'
		), $atts )
	);
    $html = '';
    if(!is_numeric($iteration_count))
    {
        $iteration_count = 50;
    }
    else
    {
        $iteration_count = floatval($iteration_count);
    }
    if($iteration_count < 0)
    {
        $iteration_count = 50;
    }
    if(!is_numeric($starting_population))
    {
        $starting_population = 7000000000;
    }
    else
    {
        $starting_population = floatval($starting_population);
    }
    if(!is_numeric($unkillable_elite_in_bunkers))
    {
        $unkillable_elite_in_bunkers = 0;
    }
    else
    {
        $unkillable_elite_in_bunkers = floatval($unkillable_elite_in_bunkers);
    }
    if($unkillable_elite_in_bunkers > $starting_population)
    {
        $unkillable_elite_in_bunkers = $starting_population;
    }
    if(!is_numeric($infection_rate))
    {
        $infection_rate = 2.45;
    }
    else
    {
        $infection_rate = floatval($infection_rate);
    }
    if(!is_numeric($mortality_rate))
    {
        $mortality_rate = 3;
    }
    else
    {
        $mortality_rate = floatval($mortality_rate);
    }
    $mortality_rate = $mortality_rate / 100;
    if(!is_numeric($mortality_complicator))
    {
        $mortality_complicator = 10;
    }
    else
    {
        $mortality_complicator = floatval($mortality_complicator);
    }
    $mortality_complicator = $mortality_complicator / 100;
    if(!is_numeric($burnout_rate))
    {
        $burnout_rate = 4;
    }
    else
    {
        $burnout_rate = floatval($burnout_rate);
    }
    $burnout_rate = $burnout_rate / 100;
    if(!is_numeric($incubation_days))
    {
        $incubation_days = 10;
    }
    else
    {
        $incubation_days = floatval($incubation_days);
    }
    
    $new_infected = $initial_infections;
    
    $total_inf_chart = array();
    $total_dead_chart = array();
    $date_chart = array();
    
    $total_infected = $initial_infections;
    $remaining_population = $starting_population;
    $new_deaths = 0;
    for($i = 0; $i < $iteration_count; $i++)
    {
        $old_new_infected = $new_infected;
        $current_day = $i * $incubation_days;
        $date_chart[] = date($date_format, strtotime($start_date . ' + ' . ($i * $incubation_days) . ' days'));
        if($i > 0)
        {
            $new_infected = round(max(0, (min(($remaining_population - $unkillable_elite_in_bunkers - $total_infected), ($old_new_infected * (($infection_rate - ($current_day / $incubation_days) * $burnout_rate)))))));
        }
        if($i > 0)
        {
            $new_deaths = round(min($remaining_population,($new_infected * $mortality_rate) + ($old_new_infected * $mortality_complicator)));
        }
        else
        {
            $new_deaths = round(min($starting_population, ($new_infected * $mortality_rate)));
        }
        if($i > 0)
        {
            $total_infected = min($remaining_population - $unkillable_elite_in_bunkers, ($new_infected + ($total_infected - $new_deaths)));
        }
        $total_inf_chart[] = $total_infected;
        if($i > 0)
        {
            $total_deaths = min($remaining_population,(($total_deaths + $new_deaths)));
        }
        else
        {
            $total_deaths = $new_deaths;
        }
        $total_dead_chart[] = $total_deaths;
        if($i > 0)
        {
            $remaining_population = max($unkillable_elite_in_bunkers,($remaining_population - $new_deaths));
        }
    }
    $html .= do_shortcode('[cspgf_charts title="linechart' . uniqid() . '" datalabels="' . $datalabels . '" type="line" align="' . $align . '" margin="' . $margin . '" datasets="' . implode(',', $total_inf_chart) . ' next ' . implode(',', $total_dead_chart) . '" labels="' . implode(',', $date_chart) . '" canvaswidth="' . $canvaswidth . '" canvasheight="' . $canvasheight . '" width="' . $width . '" height="' . $height . '" relativewidth="' . $relativewidth . '" classn="' . $classn . '" colors="' . $colors . '" fillopacity="' . $fillopacity . '" animation="' . $animation . '" scalefontsize="' . $scalefontsize . '" scalefontcolor="' . $scalefontcolor . '" scaleoverride="' . $scaleoverride . '" scalesteps="' . $scalesteps . '" scalestepwidth="' . $scalestepwidth . '" scalestartvalue="' . $scalestartvalue . '"]');
    return $html;
}
function cspgf_display_chart_population_decline( $atts, $content  = '')
{
    extract( shortcode_atts(
		array(
			'starting_population' => '7727439400',
            'unkillable_elite_in_bunkers' => '50000',
            'start_date' => '01-01-2020',
            'initial_infections' => '2',
            'infection_rate' => '2.45',
            'incubation_days' => '10',
            'mortality_rate' => '3', //%%
            'mortality_complicator' => '10', //%%
            'burnout_rate' => '4', //%%
            'iteration_count' => '50',
            'date_format' => 'Y-m-d',
            'align' => 'aligncenter',
            'margin' => '5px 20px',
            'datalabels' => 'Population Decline',
            'canvaswidth'      => '625',
            'canvasheight'     => '625',
            'width'			   => '100%',
            'height'		   => 'auto',
            'relativewidth'	   => '1',
            'classn'			   => '',
            'colors'           => '#69D2E7,#a0a48C,#F38630,#96CE7F,#CEBC17,#CE4264',
            'fillopacity'      => '0.7',
            'animation'		   => 'true',
            'scalefontsize'    => '12',
            'scalefontcolor'   => '#666',
            'scaleoverride'    => 'false',
            'scalesteps' 	   => 'null',
            'scalestepwidth'   => 'null',
            'scalestartvalue'  => 'null'
		), $atts )
	);
    $html = '';
    if(!is_numeric($iteration_count))
    {
        $iteration_count = 50;
    }
    else
    {
        $iteration_count = floatval($iteration_count);
    }
    if($iteration_count < 0)
    {
        $iteration_count = 50;
    }
    if(!is_numeric($starting_population))
    {
        $starting_population = 7000000000;
    }
    else
    {
        $starting_population = floatval($starting_population);
    }
    if(!is_numeric($unkillable_elite_in_bunkers))
    {
        $unkillable_elite_in_bunkers = 0;
    }
    else
    {
        $unkillable_elite_in_bunkers = floatval($unkillable_elite_in_bunkers);
    }
    if($unkillable_elite_in_bunkers > $starting_population)
    {
        $unkillable_elite_in_bunkers = $starting_population;
    }
    if(!is_numeric($infection_rate))
    {
        $infection_rate = 2.45;
    }
    else
    {
        $infection_rate = floatval($infection_rate);
    }
    if(!is_numeric($mortality_rate))
    {
        $mortality_rate = 3;
    }
    else
    {
        $mortality_rate = floatval($mortality_rate);
    }
    $mortality_rate = $mortality_rate / 100;
    if(!is_numeric($mortality_complicator))
    {
        $mortality_complicator = 10;
    }
    else
    {
        $mortality_complicator = floatval($mortality_complicator);
    }
    $mortality_complicator = $mortality_complicator / 100;
    if(!is_numeric($burnout_rate))
    {
        $burnout_rate = 4;
    }
    else
    {
        $burnout_rate = floatval($burnout_rate);
    }
    $burnout_rate = $burnout_rate / 100;
    if(!is_numeric($incubation_days))
    {
        $incubation_days = 10;
    }
    else
    {
        $incubation_days = floatval($incubation_days);
    }
    
    $new_infected = $initial_infections;
    
    $population_chart = array();
    $date_chart = array();
    
    $total_infected = $initial_infections;
    $remaining_population = $starting_population;
    $new_deaths = 0;
    for($i = 0; $i < $iteration_count; $i++)
    {
        $old_new_infected = $new_infected;
        $current_day = $i * $incubation_days;
        $date_chart[] = date($date_format, strtotime($start_date . ' + ' . ($i * $incubation_days) . ' days'));
        if($i > 0)
        {
            $new_infected = round(max(0, (min(($remaining_population - $unkillable_elite_in_bunkers - $total_infected), ($old_new_infected * (($infection_rate - ($current_day / $incubation_days) * $burnout_rate)))))));
        }
        if($i > 0)
        {
            $new_deaths = round(min($remaining_population,($new_infected * $mortality_rate) + ($old_new_infected * $mortality_complicator)));
        }
        else
        {
            $new_deaths = round(min($starting_population, ($new_infected * $mortality_rate)));
        }
        if($i > 0)
        {
            $total_infected = min($remaining_population - $unkillable_elite_in_bunkers, ($new_infected + ($total_infected - $new_deaths)));
        }
        if($i > 0)
        {
            $total_deaths = min($remaining_population,(($total_deaths + $new_deaths)));
        }
        else
        {
            $total_deaths = $new_deaths;
        }
        if($i > 0)
        {
            $remaining_population = max($unkillable_elite_in_bunkers,($remaining_population - $new_deaths));
        }
        $population_chart[] = $remaining_population;
    }
    $html .= do_shortcode('[cspgf_charts title="linechart' . uniqid() . '" datalabels="' . $datalabels . '" type="line" align="' . $align . '" margin="' . $margin . '" datasets="' . implode(',', $population_chart) . '" labels="' . implode(',', $date_chart) . '" canvaswidth="' . $canvaswidth . '" canvasheight="' . $canvasheight . '" width="' . $width . '" height="' . $height . '" relativewidth="' . $relativewidth . '" classn="' . $classn . '" colors="' . $colors . '" fillopacity="' . $fillopacity . '" animation="' . $animation . '" scalefontsize="' . $scalefontsize . '" scalefontcolor="' . $scalefontcolor . '" scaleoverride="' . $scaleoverride . '" scalesteps="' . $scalesteps . '" scalestepwidth="' . $scalestepwidth . '" scalestartvalue="' . $scalestartvalue . '"]');
    return $html;
}


function cspgf_display_chart_total_deaths( $atts, $content  = '')
{
    extract( shortcode_atts(
		array(
			'starting_population' => '7727439400',
            'unkillable_elite_in_bunkers' => '50000',
            'start_date' => '01-01-2020',
            'initial_infections' => '2',
            'infection_rate' => '2.45',
            'incubation_days' => '10',
            'mortality_rate' => '3', //%%
            'mortality_complicator' => '10', //%%
            'burnout_rate' => '4', //%%
            'iteration_count' => '50',
            'date_format' => 'Y-m-d',
            'align' => 'aligncenter',
            'margin' => '5px 20px',
            'datalabels' => 'Total Deaths',
            'canvaswidth'      => '625',
            'canvasheight'     => '625',
            'width'			   => '100%',
            'height'		   => 'auto',
            'relativewidth'	   => '1',
            'classn'			   => '',
            'colors'           => '#69D2E7,#a0a48C,#F38630,#96CE7F,#CEBC17,#CE4264',
            'fillopacity'      => '0.7',
            'animation'		   => 'true',
            'scalefontsize'    => '12',
            'scalefontcolor'   => '#666',
            'scaleoverride'    => 'false',
            'scalesteps' 	   => 'null',
            'scalestepwidth'   => 'null',
            'scalestartvalue'  => 'null'
		), $atts )
	);
    $html = '';
    if(!is_numeric($iteration_count))
    {
        $iteration_count = 50;
    }
    else
    {
        $iteration_count = floatval($iteration_count);
    }
    if($iteration_count < 0)
    {
        $iteration_count = 50;
    }
    if(!is_numeric($starting_population))
    {
        $starting_population = 7000000000;
    }
    else
    {
        $starting_population = floatval($starting_population);
    }
    if(!is_numeric($unkillable_elite_in_bunkers))
    {
        $unkillable_elite_in_bunkers = 0;
    }
    else
    {
        $unkillable_elite_in_bunkers = floatval($unkillable_elite_in_bunkers);
    }
    if($unkillable_elite_in_bunkers > $starting_population)
    {
        $unkillable_elite_in_bunkers = $starting_population;
    }
    if(!is_numeric($infection_rate))
    {
        $infection_rate = 2.45;
    }
    else
    {
        $infection_rate = floatval($infection_rate);
    }
    if(!is_numeric($mortality_rate))
    {
        $mortality_rate = 3;
    }
    else
    {
        $mortality_rate = floatval($mortality_rate);
    }
    $mortality_rate = $mortality_rate / 100;
    if(!is_numeric($mortality_complicator))
    {
        $mortality_complicator = 10;
    }
    else
    {
        $mortality_complicator = floatval($mortality_complicator);
    }
    $mortality_complicator = $mortality_complicator / 100;
    if(!is_numeric($burnout_rate))
    {
        $burnout_rate = 4;
    }
    else
    {
        $burnout_rate = floatval($burnout_rate);
    }
    $burnout_rate = $burnout_rate / 100;
    if(!is_numeric($incubation_days))
    {
        $incubation_days = 10;
    }
    else
    {
        $incubation_days = floatval($incubation_days);
    }
    
    $new_infected = $initial_infections;
    
    $death_chart = array();
    $date_chart = array();
    
    $total_infected = $initial_infections;
    $remaining_population = $starting_population;
    $new_deaths = 0;
    for($i = 0; $i < $iteration_count; $i++)
    {
        $old_new_infected = $new_infected;
        $current_day = $i * $incubation_days;
        $date_chart[] = date($date_format, strtotime($start_date . ' + ' . ($i * $incubation_days) . ' days'));
        if($i > 0)
        {
            $new_infected = round(max(0, (min(($remaining_population - $unkillable_elite_in_bunkers - $total_infected), ($old_new_infected * (($infection_rate - ($current_day / $incubation_days) * $burnout_rate)))))));
        }
        if($i > 0)
        {
            $new_deaths = round(min($remaining_population,($new_infected * $mortality_rate) + ($old_new_infected * $mortality_complicator)));
        }
        else
        {
            $new_deaths = round(min($starting_population, ($new_infected * $mortality_rate)));
        }
        if($i > 0)
        {
            $total_infected = min($remaining_population - $unkillable_elite_in_bunkers, ($new_infected + ($total_infected - $new_deaths)));
        }
        if($i > 0)
        {
            $total_deaths = min($remaining_population,(($total_deaths + $new_deaths)));
        }
        else
        {
            $total_deaths = $new_deaths;
        }
        if($i > 0)
        {
            $remaining_population = max($unkillable_elite_in_bunkers,($remaining_population - $new_deaths));
        }
        $death_chart[] = $total_deaths;
    }
    $html .= do_shortcode('[cspgf_charts title="linechart' . uniqid() . '" datalabels="' . $datalabels . '" type="line" align="' . $align . '" margin="' . $margin . '" datasets="' . implode(',', $death_chart) . '" labels="' . implode(',', $date_chart) . '" canvaswidth="' . $canvaswidth . '" canvasheight="' . $canvasheight . '" width="' . $width . '" height="' . $height . '" relativewidth="' . $relativewidth . '" classn="' . $classn . '" colors="' . $colors . '" fillopacity="' . $fillopacity . '" animation="' . $animation . '" scalefontsize="' . $scalefontsize . '" scalefontcolor="' . $scalefontcolor . '" scaleoverride="' . $scaleoverride . '" scalesteps="' . $scalesteps . '" scalestepwidth="' . $scalestepwidth . '" scalestartvalue="' . $scalestartvalue . '"]');
    return $html;
}

$cspgf_Main_Settings = get_option('cspgf_Main_Settings', false);
if (isset($cspgf_Main_Settings['cspgf_enabled']) && $cspgf_Main_Settings['cspgf_enabled'] == 'on') {
    add_shortcode( 'coronavirus-spread-prediction-table', 'cspgf_display_iframe' );
    add_shortcode( 'coronavirus-new-infected-death-chart', 'cspgf_display_chart_new_infected_death' );
    add_shortcode( 'coronavirus-total-infected-death-chart', 'cspgf_display_chart_total_infected_death' );
    add_shortcode( 'coronavirus-population-decline-chart', 'cspgf_display_chart_population_decline' );
    add_shortcode( 'coronavirus-total-deaths-chart', 'cspgf_display_chart_total_deaths' );
}
else
{
    add_shortcode( 'coronavirus-spread-prediction-table', 'cspgf_blank_func' );
    add_shortcode( 'coronavirus-new-infected-death-chart', 'cspgf_blank_func' );
    add_shortcode( 'coronavirus-total-infected-death-chart', 'cspgf_blank_func' );
    add_shortcode( 'coronavirus-population-decline-chart', 'cspgf_blank_func' );
    add_shortcode( 'coronavirus-total-deaths-chart', 'cspgf_blank_func' );
}

add_action( 'enqueue_block_editor_assets', 'cspgf_enqueue_block_editor_assets' );
function cspgf_enqueue_block_editor_assets() {
    wp_register_style('cspgf-browser-style', plugins_url('styles/cspgf-browser.css', __FILE__), false, '1.0.0');
    wp_enqueue_style('cspgf-browser-style');
    $block_js_list   = 'scripts/time.js';
	wp_enqueue_script(
		'cspgf-time-block-js', 
        plugins_url( $block_js_list, __FILE__ ), 
        array(
			'wp-blocks',
			'wp-i18n',
			'wp-element',
		),
        '1.0.0'
	);
    $block_js_list   = 'scripts/idgraph.js';
	wp_enqueue_script(
		'cspgf-idgraph-block-js', 
        plugins_url( $block_js_list, __FILE__ ), 
        array(
			'wp-blocks',
			'wp-i18n',
			'wp-element',
		),
        '1.0.0'
	);
    $block_js_list   = 'scripts/tdgraph.js';
	wp_enqueue_script(
		'cspgf-tdgraph-block-js', 
        plugins_url( $block_js_list, __FILE__ ), 
        array(
			'wp-blocks',
			'wp-i18n',
			'wp-element',
		),
        '1.0.0'
	);
    $block_js_list   = 'scripts/pgraph.js';
	wp_enqueue_script(
		'cspgf-pgraph-block-js', 
        plugins_url( $block_js_list, __FILE__ ), 
        array(
			'wp-blocks',
			'wp-i18n',
			'wp-element',
		),
        '1.0.0'
	);
    $block_js_list   = 'scripts/dgraph.js';
	wp_enqueue_script(
		'cspgf-dgraph-block-js', 
        plugins_url( $block_js_list, __FILE__ ), 
        array(
			'wp-blocks',
			'wp-i18n',
			'wp-element',
		),
        '1.0.0'
	);
}
add_action('init', 'cspgf_init_func', 0);
function cspgf_init_func()
{
    add_action( "wp_enqueue_scripts", "cspgf_load_scripts" );
	add_shortcode( 'cspgf_charts', 'cspgf_chart_shortcode' );
    if ( function_exists( 'register_block_type' ) ) {
        $cspgf_Main_Settings = get_option('cspgf_Main_Settings', false);
        if (isset($cspgf_Main_Settings['cspgf_enabled']) && $cspgf_Main_Settings['cspgf_enabled'] == 'on') {
            register_block_type( 'coronavirus-spread-prediction-graphs-free/cspgf-time', array(
                'render_callback' => 'cspgf_display_iframe',
            ) );
            register_block_type( 'coronavirus-spread-prediction-graphs-free/cspgf-nidg', array(
                'render_callback' => 'cspgf_display_chart_new_infected_death',
            ) );
            register_block_type( 'coronavirus-spread-prediction-graphs-free/cspgf-tidg', array(
                'render_callback' => 'cspgf_display_chart_total_infected_death',
            ) );
            register_block_type( 'coronavirus-spread-prediction-graphs-free/cspgf-pgraph', array(
                'render_callback' => 'cspgf_display_chart_population_decline',
            ) );
            register_block_type( 'coronavirus-spread-prediction-graphs-free/cspgf-dgraph', array(
                'render_callback' => 'cspgf_display_chart_total_deaths',
            ) );
        }
        else
        {
            register_block_type( 'coronavirus-spread-prediction-graphs-free/cspgf-time', array(
                'render_callback' => 'cspgf_blank_func',
            ) );
            register_block_type( 'coronavirus-spread-prediction-graphs-free/cspgf-nidg', array(
                'render_callback' => 'cspgf_blank_func',
            ) );
            register_block_type( 'coronavirus-spread-prediction-graphs-free/cspgf-tidg', array(
                'render_callback' => 'cspgf_blank_func',
            ) );
            register_block_type( 'coronavirus-spread-prediction-graphs-free/cspgf-pgraph', array(
                'render_callback' => 'cspgf_blank_func',
            ) );
            register_block_type( 'coronavirus-spread-prediction-graphs-free/cspgf-dgraph', array(
                'render_callback' => 'cspgf_blank_func',
            ) );
            register_block_type( 'coronavirus-spread-prediction-graphs-free/cspgf-ui', array(
                'render_callback' => 'cspgf_blank_func',
            ) );
        }
    }
}
function cspgf_blank_func()
{
    return '';
}
function cspgf_enqueue_plugin_scripts($plugin_array)
{
    $plugin_array["cspgf_extension"] =  plugin_dir_url(__FILE__) . "res/cspgf-js.js";
    return $plugin_array;
}
add_filter("mce_external_plugins", "cspgf_enqueue_plugin_scripts");

function cspgf_register_buttons_editor($buttons)
{
    array_push($buttons, "blue");
    array_push($buttons, "red");
    array_push($buttons, "green");
    array_push($buttons, "black");
    array_push($buttons, "white");
    array_push($buttons, "yellow");
    array_push($buttons, "orange");
    array_push($buttons, "pink");
    return $buttons;
}

add_filter("mce_buttons", "cspgf_register_buttons_editor");

register_activation_hook(__FILE__, 'cspgf_check_version');
function cspgf_check_version()
{
    if (!function_exists('curl_init')) {
        echo '<h3>'.esc_html__('Please enable curl PHP extension. Please contact your hosting provider\'s support to help you in this matter.', 'coronavirus-spread-prediction-graphs-free').'</h3>';
        die;
    }
    global $wp_version;
    if (!current_user_can('activate_plugins')) {
        echo '<p>' . esc_html__('You are not allowed to activate plugins!', 'coronavirus-spread-prediction-graphs-free') . '</p>';
        die;
    }
    $php_version_required = '5.0';
    $wp_version_required  = '2.7';
    
    if (version_compare(PHP_VERSION, $php_version_required, '<')) {
        deactivate_plugins(basename(__FILE__));
        echo '<p>' . sprintf(esc_html__('This plugin can not be activated because it requires a PHP version greater than %1$s. Please update your PHP version before you activate it.', 'coronavirus-spread-prediction-graphs-free'), $php_version_required) . '</p>';
        die;
    }
    
    if (version_compare($wp_version, $wp_version_required, '<')) {
        deactivate_plugins(basename(__FILE__));
        echo '<p>' . sprintf(esc_html__('This plugin can not be activated because it requires a WordPress version greater than %1$s. Please go to Dashboard -> Updates to get the latest version of WordPress.', 'coronavirus-spread-prediction-graphs-free'), $wp_version_required) . '</p>';
        die;
    }
}

add_action('admin_init', 'cspgf_register_mysettings');
function cspgf_register_mysettings()
{
    register_setting('cspgf_option_group', 'cspgf_Main_Settings');
    if (is_multisite()) {
        if (!get_option('cspgf_Main_Settings')) {
            cspgf_activation_callback(TRUE);
        }
    }
}

function cspgf_load_all_admin_js(){
    add_action('admin_enqueue_scripts', 'cspgf_admin_load_files');
}
function cspgf_admin_load_files()
{
    wp_register_style('cspgf-browser-style', plugins_url('styles/cspgf-browser.css', __FILE__), false, '1.0.0');
    wp_enqueue_style('cspgf-browser-style');
    wp_enqueue_script('jquery');
    wp_register_style('cspgf-custom-style', plugins_url('styles/coderevolution-style.css', __FILE__), false, '1.0.0');
    wp_enqueue_style('cspgf-custom-style');
}

require(dirname(__FILE__) . "/res/cspgf-main.php");

function cspgf_load_scripts( $force =  false ) {

	if ( ! is_admin() || $force ) {
		wp_register_script( 'cspgf-charts-js', trailingslashit( plugins_url('', __FILE__) ) . 'js/Chart.min.js' );
		wp_register_script( 'cspgf-charts-functions', trailingslashit( plugins_url('', __FILE__) ) . '/js/functions.js', array( 'jquery' ) ,'', true );
		wp_enqueue_script( 'cspgf-charts-js' );
		wp_enqueue_script( 'cspgf-charts-functions' );
    $reg_css_code = '.cspgf-table {
  overflow: visible!important;
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  text-align:center;
  font-size:14px;
}
.cspgf-table td, .cspgf-table th {
  border: 1px solid #ddd;
  padding: 8px;
}
.cspgf-table tr:nth-child(even){background-color: #f2f2f2;}
.cspgf-table tr:hover {background-color: #ddd;}
.cspgf-table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
  text-align:center;
}
table th.cspgf-absorbing-column {
    min-width: 150px;
}.cspgf-table{text-align:center;overflow-x:auto;overflow-y: auto;}.cspgf-table table{table-layout: fixed;border-collapse: collapse;width: 100%;}.cspgf-table td{overflow-x: auto;}
    @media 
only screen and (max-width: 760px)  {
    .cspgf-table table, .cspgf-table thead, .cspgf-table tbody, .cspgf-table th, .cspgf-table td, .cspgf-table tr { 
		display: block; 
	}
	.cspgf-table thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	.cspgf-table tr { border: 1px solid #ccc; }
	.cspgf-table td { 
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	.cspgf-table td:before { 
		position: absolute;
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
	}
	.cspgf-table td:nth-of-type(1):before { content: "' . esc_html__('Date', 'coronavirus-spread-prediction-graphs-free') . '"; }
	.cspgf-table td:nth-of-type(2):before { content: "' . esc_html__('Day', 'coronavirus-spread-prediction-graphs-free') . '"; }
	.cspgf-table td:nth-of-type(3):before { content: "' . esc_html__('New Infected', 'coronavirus-spread-prediction-graphs-free') . '"; }
	.cspgf-table td:nth-of-type(4):before { content: "' . esc_html__('Total Infected', 'coronavirus-spread-prediction-graphs-free') . '"; }
	.cspgf-table td:nth-of-type(5):before { content: "' . esc_html__('New Deaths', 'coronavirus-spread-prediction-graphs-free') . '"; }
	.cspgf-table td:nth-of-type(6):before { content: "' . esc_html__('Total Deaths', 'coronavirus-spread-prediction-graphs-free') . '"; }
	.cspgf-table td:nth-of-type(7):before { content: "' . esc_html__('Population Alive', 'coronavirus-spread-prediction-graphs-free') . '"; }
}
.cspgf_charts_canvas {width:100%!important;max-width:100%;}@media screen and (max-width:480px) {div.cspgf-chart-wrap {float: none!important;margin-left: auto!important;margin-right: auto!important;text-align: center;}}';
        wp_register_style( 'cspgf-plugin-reg-style', false );
        wp_enqueue_style( 'cspgf-plugin-reg-style' );
        wp_add_inline_style( 'cspgf-plugin-reg-style', $reg_css_code );
	}
}

function cspgf_compare_fill(&$measure,&$fill) {
	if (count($measure) != count($fill)) {
        while (count($fill) < count($measure) ) {
		    $fill = array_merge( $fill, array_values($fill) );
		}
		$fill = array_slice($fill, 0, count($measure));
	}
}


function cspgf_hex2rgb($hex) {
    $hex = str_replace("#", "", $hex);
    if(strlen($hex) == 3) {
        $r = hexdec(substr($hex,0,1).substr($hex,0,1));
	    $g = hexdec(substr($hex,1,1).substr($hex,1,1));
	    $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
	    $r = hexdec(substr($hex,0,2));
	    $g = hexdec(substr($hex,2,2));
	    $b = hexdec(substr($hex,4,2));
	}
	$rgb = array($r, $g, $b);
	return implode(",", $rgb);
}


function cspgf_trailing_comma($incrementor, $count, &$subject) {
    $stopper = $count - 1;
	if ($incrementor !== $stopper) {
		return $subject .= ',';
	}
}

function cspgf_chart_shortcode( $atts ) 
{
    extract( shortcode_atts(
            array(
                'type'             => 'line',
                'title'            => 'coronavirus-chart' . uniqid(),
                'canvaswidth'      => '625',
                'canvasheight'     => '625',
                'width'			   => '100%',
                'height'		   => 'auto',
                'margin'		   => '5px',
                'relativewidth'	   => '1',
                'align'            => '',
                'classn'			   => '',
                'labels'           => '',
                'datalabels'       => 'New Infected, New Deaths',
                'data'             => '',
                'datasets'         => '',
                'colors'           => '#69D2E7,#a0a48C,#F38630,#96CE7F,#CEBC17,#CE4264',
                'fillopacity'      => '0.7',
                'animation'		   => 'true',
                'scalefontsize'    => '12',
                'scalefontcolor'   => '#666',
                'scaleoverride'    => 'false',
                'scalesteps' 	   => 'null',
                'scalestepwidth'   => 'null',
                'scalestartvalue'  => 'null'
            ), $atts )
    );

    $title    = str_replace(' ', '', $title);
    $data     = explode(',', str_replace(' ', '', $data));
    $datalabels     = array_map('trim', explode(',', $datalabels));
    $datasets = explode("next", str_replace(' ', '', $datasets));

    if ( ! $title || ( empty( $data ) && empty( $datasets ) ) ) {
        return '';
    }

    if ($colors != "") {
        $colors   = explode(',', str_replace(' ','',$colors));
    } else {
        $colors = array('#69D2E7','#E0E4CC','#F38630','#96CE7F','#CEBC17','#CE4264');
    }

    (strpos($type, 'lar') !== false ) ? $type = 'PolarArea' : $type = ucwords($type);

    $currentchart = '<div class="'.$align.' '.$classn.' cspgf-chart-wrap" data-proportion="'.$relativewidth.'">';
    $currentchart .= '<canvas id="'.$title.'" height="'.$canvasheight.'" width="'.$canvaswidth.'" class="cspgf_charts_canvas" data-proportion="'.$relativewidth.'"></canvas></div>';
    $script_var   = 'var '.$title.'Ops = {';
    if($animation == 'true')
    {
        $script_var .= 'animation: {
                    duration: 2000
        },';
    }
    if ($type == 'Line' || $type == 'Radar' || $type == 'Bar' || $type == 'PolarArea') {
        $script_var .=	'scaleFontSize: '.$scalefontsize.',';
        $script_var .=	'scaleFontColor: "'.$scalefontcolor.'",';
        $script_var .=    'scaleOverride:'   .$scaleoverride.',';
        $script_var .=    'scaleSteps:' 	   .$scalesteps.',';
        $script_var .=    'scaleStepWidth:'  .$scalestepwidth.',';
        $script_var .=    'scaleStartValue:' .$scalestartvalue;
    }

    $script_var .= '}; ';

    if ($type == 'Line' || $type == 'Radar' || $type == 'Bar' ) {

        cspgf_compare_fill($datasets, $colors);
        $total    = count($datasets);

        $script_var .= 'var '.$title.'Data = {';
        $script_var .= 'labels : [';
        $labelstrings = explode(',',$labels);
        for ($j = 0; $j < count($labelstrings); $j++ ) {
            $script_var .= '"'.$labelstrings[$j].'"';
            cspgf_trailing_comma($j, count($labelstrings), $script_var);
        }
        $script_var .= 	'],';
        $script_var .= 'datasets : [';
    } else {
        cspgf_compare_fill($data, $colors);
        $total = count($data);
        $script_var .= 'var '.$title.'Data = [';
    }

    for ($i = 0; $i < $total; $i++) {

        if ($type === 'Pie' || $type === 'Doughnut' || $type === 'PolarArea') {
            $script_var .= '{
					value 	: '. $data[$i] .',
					color 	: '.'"'. $colors[$i].'"'.'
				}';

        } else if ($type === 'Bar') {
            $script_var .= '{
					fillColor 	: "rgba('. cspgf_hex2rgb( $colors[$i] ) .','.$fillopacity.')",
					strokeColor : "rgba('. cspgf_hex2rgb( $colors[$i] ) .',1)",
					data 		: ['.$datasets[$i].']
				}';

        } else if ($type === 'Line' || $type === 'Radar') {
            $script_var .= '{
					borderColor 	: "rgba('. cspgf_hex2rgb( $colors[$i] ) .','.$fillopacity.')",
					backgroundColor : "rgba('. cspgf_hex2rgb( $colors[$i] ) .','.$fillopacity.')",
					pointBackgroundColor 	: "rgba('. cspgf_hex2rgb( $colors[$i] ) .',1)",
					data 		: [' . $datasets[$i] . '],
					label 		: "' . $datalabels[$i] . '",
                    order       : ' . ($total - $i) . '
				}';

        }
        cspgf_trailing_comma($i, $total, $script_var);
    }

    if ($type == 'Line' || $type == 'Radar' || $type == 'Bar') {
        $script_var .=	']};';
    } else {
        $script_var .=	'];';
    }
    $script_var .= '
         window.cspgf_charts = window.cspgf_charts || {};
	     window.cspgf_charts["'.$title.'"] = { options: '.$title.'Ops, data: '.$title.'Data, type: "'.$type.'" };';
    wp_register_script( 'cspgf-dummy-handle-header', plugins_url('scripts/header.js', __FILE__) );
    wp_enqueue_script( 'cspgf-dummy-handle-header'  );
    wp_add_inline_script( 'cspgf-dummy-handle-header', $script_var );
    $reg_css_code_style = '.cspgf-chart-wrap{max-width: 100%; width:'.$width.'; height:'.$height.';margin:'.$margin.';}';
    wp_register_style( 'cspgf-plugin-reg-style-local', false );
    wp_enqueue_style( 'cspgf-plugin-reg-style-local' );
    wp_add_inline_style( 'cspgf-plugin-reg-style-local', $reg_css_code_style );
    return $currentchart;
}
?>