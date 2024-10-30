"use strict";
var { registerBlockType } = wp.blocks;
var gcel = wp.element.createElement;

registerBlockType( 'coronavirus-spread-prediction-graphs-free/cspgf-time', {
    title: 'COVID-19 Spread Prediction Table',
    icon: 'grid-view',
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
        header_texts : {
            default: '',
            type:   'string',
        },
        thousands_sep : {
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
        var header_texts = props.attributes.header_texts;
        function updateMessage12( event ) {
            props.setAttributes( { header_texts: event.target.value} );
		}
        var thousands_sep = props.attributes.thousands_sep;
        function updateMessage13( event ) {
            props.setAttributes( { thousands_sep: event.target.value} );
		}
		return gcel(
			'div', 
			{ className: 'coderevolution_gutenberg_div' },
            gcel(
				'h4',
				{ className: 'coderevolution_gutenberg_title' },
                'COVID-19 Spread Prediction Table',
                gcel(
                    'div', 
                    {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                    ,
                    gcel(
                        'div', 
                        {className:'bws_hidden_help_text'},
                        'This block is used to display a prediction table for the spread of COVID-19.'
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
                'Header Text List: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Input a comma separated list of header texts to use in the table. Default is: Date,Day,New Infected,Total Infected,New Deaths,Total Deaths'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:'Date,Day,New Infected,Total Infected,New Deaths,Total Deaths', value: header_texts, onChange: updateMessage12, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Thousands Separator (for large numbers): '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Input the thousand separator for large numbers (for better readability). Default is: ,'
                )
            ),
			gcel(
				'textarea',
				{ rows:1,placeholder:',', value: thousands_sep, onChange: updateMessage13, className: 'coderevolution_gutenberg_input' }
			)
		);
    }),
    save: (function( props ) {
       return null;
    }),
} );