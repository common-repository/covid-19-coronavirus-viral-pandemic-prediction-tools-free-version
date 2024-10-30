"use strict";
var { registerBlockType } = wp.blocks;
var gcel = wp.element.createElement;

registerBlockType( 'coronavirus-spread-prediction-graphs-free/cspgf-dgraph', {
    title: 'COVID-19 Total Deaths Chart',
    icon: 'chart-line',
    category: 'embed',
    attributes: {
        starting_population : {
            default: '',
            type:   'string',
        },
        unkillable_elite_in_bunkers : {
            default: '',
            type:   'string',
        },
        start_date : {
            default: '',
            type:   'string',
        },
        initial_infections : {
            default: '',
            type:   'string',
        },
        infection_rate : {
            default: '',
            type:   'string',
        },
        incubation_days : {
            default: '',
            type:   'string',
        },
        mortality_rate : {
            default: '',
            type:   'string',
        },
        mortality_complicator : {
            default: '',
            type:   'string',
        },
        burnout_rate : {
            default: '',
            type:   'string',
        },
        iteration_count : {
            default: '',
            type:   'string',
        },
        date_format : {
            default: '',
            type:   'string',
        },
        align : {
            default: '',
            type:   'string',
        },
        margin : {
            default: '',
            type:   'string',
        },
        datalabels : {
            default: '',
            type:   'string',
        },
        canvaswidth : {
            default: '',
            type:   'string',
        },
        canvasheight : {
            default: '',
            type:   'string',
        },
        width : {
            default: '',
            type:   'string',
        },
        height : {
            default: '',
            type:   'string',
        },
        relativewidth : {
            default: '',
            type:   'string',
        },
        classn : {
            default: '',
            type:   'string',
        },
        colors : {
            default: '',
            type:   'string',
        },
        fillopacity : {
            default: '',
            type:   'string',
        },
        animation : {
            default: '',
            type:   'string',
        },
        scalefontsize : {
            default: '',
            type:   'string',
        },
        scalefontcolor : {
            default: '',
            type:   'string',
        },
        scaleoverride : {
            default: '',
            type:   'string',
        },
        scalesteps : {
            default: '',
            type:   'string',
        },
        scalestepwidth : {
            default: '',
            type:   'string',
        },
        scalestartvalue : {
            default: '',
            type:   'string',
        }
    },
    keywords: ['table', 'coronavirus', 'covid'],
    edit: (function( props ) {
        var starting_population = props.attributes.starting_population;
        function updateMessage( event ) {
            props.setAttributes( { starting_population: event.target.value} );
		}
        var unkillable_elite_in_bunkers = props.attributes.unkillable_elite_in_bunkers;
        function updateMessage2( event ) {
            props.setAttributes( { unkillable_elite_in_bunkers: event.target.value} );
		}
        var start_date = props.attributes.start_date;
        function updateMessage3( event ) {
            props.setAttributes( { start_date: event.target.value} );
		}
        var initial_infections = props.attributes.initial_infections;
        function updateMessage4( event ) {
            props.setAttributes( { initial_infections: event.target.value} );
		}
        var infection_rate = props.attributes.infection_rate;
        function updateMessage5( event ) {
            props.setAttributes( { infection_rate: event.target.value} );
		}
        var incubation_days = props.attributes.incubation_days;
        function updateMessage6( event ) {
            props.setAttributes( { incubation_days: event.target.value} );
		}
        var mortality_rate = props.attributes.mortality_rate;
        function updateMessage7( event ) {
            props.setAttributes( { mortality_rate: event.target.value} );
		}
        var mortality_complicator = props.attributes.mortality_complicator;
        function updateMessage8( event ) {
            props.setAttributes( { mortality_complicator: event.target.value} );
		}
        var burnout_rate = props.attributes.burnout_rate;
        function updateMessage9( event ) {
            props.setAttributes( { burnout_rate: event.target.value} );
		}
        var iteration_count = props.attributes.iteration_count;
        function updateMessage10( event ) {
            props.setAttributes( { iteration_count: event.target.value} );
		}
        var date_format = props.attributes.date_format;
        function updateMessage11( event ) {
            props.setAttributes( { date_format: event.target.value} );
		}
        var align = props.attributes.align;
        function updateMessage12( event ) {
            props.setAttributes( { align: event.target.value} );
		}
        var margin = props.attributes.margin;
        function updateMessage13( event ) {
            props.setAttributes( { margin: event.target.value} );
		}
        var datalabels = props.attributes.datalabels;
        function updateMessage14( event ) {
            props.setAttributes( { datalabels: event.target.value} );
		}
        var canvaswidth = props.attributes.canvaswidth;
        function updateMessage15( event ) {
            props.setAttributes( { canvaswidth: event.target.value} );
		}
        var canvasheight = props.attributes.canvasheight;
        function updateMessage16( event ) {
            props.setAttributes( { canvasheight: event.target.value} );
		}
        var width = props.attributes.width;
        function updateMessage17( event ) {
            props.setAttributes( { width: event.target.value} );
		}
        var height = props.attributes.height;
        function updateMessage18( event ) {
            props.setAttributes( { height: event.target.value} );
		}
        var relativewidth = props.attributes.relativewidth;
        function updateMessage19( event ) {
            props.setAttributes( { relativewidth: event.target.value} );
		}
        var classn = props.attributes.classn;
        function updateMessage20( event ) {
            props.setAttributes( { classn: event.target.value} );
		}
        var colors = props.attributes.colors;
        function updateMessage21( event ) {
            props.setAttributes( { colors: event.target.value} );
		}
        var fillopacity = props.attributes.fillopacity;
        function updateMessage22( event ) {
            props.setAttributes( { fillopacity: event.target.value} );
		}
        var animation = props.attributes.animation;
        function updateMessage23( event ) {
            props.setAttributes( { animation: event.target.value} );
		}
        var scalefontsize = props.attributes.scalefontsize;
        function updateMessage24( event ) {
            props.setAttributes( { scalefontsize: event.target.value} );
		}
        var scalefontcolor = props.attributes.scalefontcolor;
        function updateMessage25( event ) {
            props.setAttributes( { scalefontcolor: event.target.value} );
		}
        var scaleoverride = props.attributes.scaleoverride;
        function updateMessage26( event ) {
            props.setAttributes( { scaleoverride: event.target.value} );
		}
        var scalesteps = props.attributes.scalesteps;
        function updateMessage27( event ) {
            props.setAttributes( { scalesteps: event.target.value} );
		}
        var scalestepwidth = props.attributes.scalestepwidth;
        function updateMessage28( event ) {
            props.setAttributes( { scalestepwidth: event.target.value} );
		}
        var scalestartvalue = props.attributes.scalestartvalue;
        function updateMessage29( event ) {
            props.setAttributes( { scalestartvalue: event.target.value} );
		}
		return gcel(
			'div', 
			{ className: 'coderevolution_gutenberg_div' },
            gcel(
				'h4',
				{ className: 'coderevolution_gutenberg_title' },
                'COVID-19 Total Deaths Chart',
                gcel(
                    'div', 
                    {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                    ,
                    gcel(
                        'div', 
                        {className:'bws_hidden_help_text'},
                        'This block is used to display a prediction chart for the count of the total deaths over time, for a pandemic.'
                    )
                )
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Starting Population: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Input the starting number of population. Default is 7727439400.'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'7727439400', value: starting_population, onChange: updateMessage, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Unkillable Elite in Bunkers: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Input the number of unkillable elite in bunkers. Default is 50000.'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'50000', value: unkillable_elite_in_bunkers, onChange: updateMessage2, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Start Date: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Input the starting date for the pandemic. Default is 01-01-2020.'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'01-01-2020', value: start_date, onChange: updateMessage3, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Initial Infections: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Input the number of initial infections. Default is 2.'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'2', value: initial_infections, onChange: updateMessage4, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Infection Rate: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Input the infection rate for the disease. Default is 2.45.'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'2.45', value: infection_rate, onChange: updateMessage5, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Incubation Period (Days): '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Input the incubation period in days for the disease. Default is 10.'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'10', value: incubation_days, onChange: updateMessage6, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Mortality Rate (Percentage): '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Input the mortality percentage for the disease. Default is 3.'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'3', value: mortality_rate, onChange: updateMessage7, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Mortality Complicator (Percentage): '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Input the mortality complicator percentage for the disease. This kicks in when there are too many cases that require intensive care, in a short period of time (no more hospital beds). Default is 10.'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'10', value: mortality_complicator, onChange: updateMessage8, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Burnout Rate (Percentage): '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Input the burnout rate for the disease. This tells how fast the disease will die off, caused by heard imunity, genetic mutations of the virus or invention of a cure or vaccine. Default is 4.'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'4', value: burnout_rate, onChange: updateMessage9, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Iteration Count: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Input the number of iterations to show in the table. Default is 50.'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'50', value: iteration_count, onChange: updateMessage10, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Date Format: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Input the date format to use. Default is Y-m-d.'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'Y-m-d', value: date_format, onChange: updateMessage11, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Graph Alignment: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Input the alignment of the graph. Default is: alignright'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'alignright', value: align, onChange: updateMessage12, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Margin For The Graph: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Input the margin for the graph. Default is: 5px 20px'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'5px 20px', value: margin, onChange: updateMessage13, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Data Labels List: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Input a comma separated list of data labels to use in the graph. Default is: Total Deaths'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'Total Deaths', value: datalabels, onChange: updateMessage14, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Canvas Width: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Input the width of the canvas for the graph. Default is: 625'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'625', value: canvaswidth, onChange: updateMessage15, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Canvas Height: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Input the height of the canvas for the graph. Default is: 625'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'625', value: canvasheight, onChange: updateMessage16, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Graph Width: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Input the width of the graph. Default is: 100%'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'100%', value: width, onChange: updateMessage17, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Graph Height: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Input the height of the graph. Default is: auto'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'auto', value: width, onChange: updateMessage18, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Relative Width: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Enable relative width for the graph. Default is: 1'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'1', value: relativewidth, onChange: updateMessage19, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Addition Class For the Graph: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Addition class for the graph. Default is: empty'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'empty', value: classn, onChange: updateMessage20, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Graph Color List: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'A comma separated list of 2 colors to be used for the graph elements. Default is: #69D2E7,#a0a48C'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'#69D2E7,#a0a48C', value: colors, onChange: updateMessage21, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Graph Elements Opacity: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Input the opacity of graph elements. Default is: 0.7'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'0.7', value: fillopacity, onChange: updateMessage22, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Enable Animations: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Enable animations while drawing the graph. Default is: true'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'true', value: animation, onChange: updateMessage23, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Scaled Font Size (Advanced): '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Set the scaled font size. Default is: 12'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'12', value: scalefontsize, onChange: updateMessage24, className: 'coderevolution_gutenberg_input' }
			),
			gcel(
				'textarea',
				{ rows:1,placeholder:'true', value: animation, onChange: updateMessage23, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Scaled Font Color (Advanced): '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Set the scaled font color. Default is: #666'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'#666', value: scalefontcolor, onChange: updateMessage25, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Scaled Override (Advanced): '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Enable this to override the scale of the graph. Set this feature to true to activate the below options. Default is: false'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'false', value: scaleoverride, onChange: updateMessage26, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Scaled Steps (Advanced): '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Set the scaled steps for the graph. Default is: null'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'null', value: scalesteps, onChange: updateMessage27, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Scaled Steps (Advanced): '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Set the scaled steps for the graph. Default is: null'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'null', value: scalestepwidth, onChange: updateMessage28, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Scaled Start Value Width (Advanced): '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Set the scaled start value for the graph. Default is: null'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'null', value: scalestartvalue, onChange: updateMessage29, className: 'coderevolution_gutenberg_input' }
			)
		);
    }),
    save: (function( props ) {
       return null;
    }),
} );