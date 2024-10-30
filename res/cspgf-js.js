"use strict";
(function() {
    tinymce.create("tinymce.plugins.cspgf_extension", {
        init : function(ed, url) { 
            ed.addButton("blue", {
                title : "COVID-19 Spread Prediction Table",
                cmd : "blue_command",
                icon: false,
                text: "COVID Table"
            });

            ed.addCommand("blue_command", function() {
                var selected_text = ed.selection.getContent();
                var return_text = "[coronavirus-spread-prediction-table starting_population=\"7727439400\" unkillable_elite_in_bunkers=\"50000\" start_date=\"01-01-2020\" initial_infections=\"2\" infection_rate=\"3\" incubation_days=\"10\" mortality_rate=\"3\" mortality_complicator=\"10\" burnout_rate=\"4\" iteration_count=\"50\"]" + selected_text;
                ed.execCommand("mceInsertContent", 0, return_text);
            });
            
            ed.addButton("red", {
                title : "COVID-19 New Infected and Death Chart",
                cmd : "red_command",
                icon: false,
                text: "COVID nI-D Chart"
            });

            ed.addCommand("red_command", function() {
                var selected_text = ed.selection.getContent();
                var return_text = "[coronavirus-new-infected-death-chart starting_population=\"7727439400\" unkillable_elite_in_bunkers=\"50000\" start_date=\"01-01-2020\" initial_infections=\"2\" infection_rate=\"3\" incubation_days=\"10\" mortality_rate=\"3\" mortality_complicator=\"10\" burnout_rate=\"4\" iteration_count=\"50\"]" + selected_text;
                ed.execCommand("mceInsertContent", 0, return_text);
            });
            
            ed.addButton("green", {
                title : "COVID-19 Total Infected and Death Chart",
                cmd : "green_command",
                icon: false,
                text: "COVID tI-D Chart"
            });

            ed.addCommand("green_command", function() {
                var selected_text = ed.selection.getContent();
                var return_text = "[coronavirus-total-infected-death-chart starting_population=\"7727439400\" unkillable_elite_in_bunkers=\"50000\" start_date=\"01-01-2020\" initial_infections=\"2\" infection_rate=\"3\" incubation_days=\"10\" mortality_rate=\"3\" mortality_complicator=\"10\" burnout_rate=\"4\" iteration_count=\"50\"]" + selected_text;
                ed.execCommand("mceInsertContent", 0, return_text);
            });
            
            ed.addButton("white", {
                title : "COVID-19 Population Decline Chart",
                cmd : "white_command",
                icon: false,
                text: "COVID Pop Chart"
            });

            ed.addCommand("white_command", function() {
                var selected_text = ed.selection.getContent();
                var return_text = "[coronavirus-population-decline-chart starting_population=\"7727439400\" unkillable_elite_in_bunkers=\"50000\" start_date=\"01-01-2020\" initial_infections=\"2\" infection_rate=\"3\" incubation_days=\"10\" mortality_rate=\"3\" mortality_complicator=\"10\" burnout_rate=\"4\" iteration_count=\"50\"]" + selected_text;
                ed.execCommand("mceInsertContent", 0, return_text);
            });
            
            ed.addButton("black", {
                title : "COVID-19 Total Deaths Chart",
                cmd : "black_command",
                icon: false,
                text: "COVID Death Chart"
            });

            ed.addCommand("black_command", function() {
                var selected_text = ed.selection.getContent();
                var return_text = "[coronavirus-total-deaths-chart starting_population=\"7727439400\" unkillable_elite_in_bunkers=\"50000\" start_date=\"01-01-2020\" initial_infections=\"2\" infection_rate=\"3\" incubation_days=\"10\" mortality_rate=\"3\" mortality_complicator=\"10\" burnout_rate=\"4\" iteration_count=\"50\"]" + selected_text;
                ed.execCommand("mceInsertContent", 0, return_text);
            });
        },
        createControl : function(n, cm) {
            return null;
        },
        getInfo : function() {
            return {
                longname : "Extra Buttons",
                author : "CodeRevolution",
                version : "1.0"
            };
        }
    });
    tinymce.PluginManager.add("cspgf_extension", tinymce.plugins.cspgf_extension);
})();