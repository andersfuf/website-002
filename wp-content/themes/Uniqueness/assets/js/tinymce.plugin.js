(function(){
    tinymce.create( "tinymce.plugins.MyThemeShortcodes", {
        init: function(d,e) {
            d.addCommand( "addShortCode",function(c){
                selectedText = '';
                if ( d.selection.getContent().length > 0 ) {
                    selectedText = d.selection.getContent() + '<br><br>';
                }

                switch ( c ) {
                    case 'dspan_50x50':
                        var a = '[row][span6]<br><br>'+selectedText+'[/span6][span6]<br><br>[/span6][/row]';
                        break;
                    case 'dspan_75x25':
                        var a = '[row][span8]<br><br>'+selectedText+'[/span8][span4]<br><br>[/span4][/row]';
                        break;
                    case 'dspan_25x75':
                        var a = '[row][span4]<br><br>'+selectedText+'[/span4][span8]<br><br>[/span8][/row]';
                        break;
                    case 'tspan_33x33x33':
                        var a = '[row][span4]<br><br>'+selectedText+'[/span4][span4]<br><br>[/span4][span4]<br><br>[/span4][/row]';
                        break;
                    case 'tspan_50x25x25':
                        var a = '[row][span6]<br><br>'+selectedText+'[/span6][span3]<br><br>[/span3][span3]<br><br>[/span3][/row]';
                        break;
                    case 'tspan_25x50x25':
                        var a = '[row][span3]<br><br>'+selectedText+'[/span3][span6]<br><br>[/span6][span3]<br><br>[/span3][/row]';
                        break;
                    case 'tspan_25x25x50':
                        var a = '[row][span3]<br><br>'+selectedText+'[/span3][span3]<br><br>[/span3][span6]<br><br>[/span6][/row]';
                        break;
                    case 'qspan_25x25x25x25':
                        var a = '[row][span3]<br><br>'+selectedText+'[/span3][span3]<br><br>[/span3][span3]<br><br>[/span3][span3]<br><br>[/span3][/row]';
                        break;
                }

                tinyMCE.activeEditor.execCommand("mceInsertContent", false, a);
            });
        },

        createControl:function(d,e){
            if(d=="shortcodes_button"){
                d=e.createMenuButton("shortcodes_button",{
                    title:"Insert Shortcode",
                    image:'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAkhJREFUeNqslUurUlEUx9c5vp8IEpkicqWggkY16yP0MYSaikSKOBIRTHPmpElOHDW9X8BxXLjQKG8SyjEUJXxbPlv/jfugpjcKNyzWOfvs/dv/9TjnKJvNhs45VDrzMMqLYrH4gt3lP+4PxWKx5lGgDD0ajdJgMKD1ei3mdj1MbDIaqVKpiOtsNit8Mpk8DhyNRjQej2m5XArbhcIURaFGo0Gncv8HsFqtCgV+v59MJhMtFgtdGWCaplGtVhNzuD8cigTlcrkn7J6yXbP5fT7f+3A4HAB0tVqJNe12m+r1un4Aj09s3xncYJ+Jx+Nd5VC63JzP5y8Y+jUYDKpY0+12qdls7sJIVVUyGAxkNptpOp1eJRKJZyeBGKVSSQuFQoHhcEitVmsvbwgX6i0WC9ntdup0Opi+ZzzVD4VCIeR2u+/2ej2h7lAZVEkg4Pz8Gz/q6sBMJvOYHeyKi/LAarV+YEXGQxhCBAiFm8/nGnfCnKPSeO3LVCq12q3yBbuPTqdTKIAhVNkyUCHzZbPZkDPYc4Y0ZQr22kaqABCLJ5OJDgMcili1MJfLtddOt/YhQLPZTO8zGSKU4R5F41D1pr8N+Jndq36/b9+GoDLoHUBQBQi/Ra953ZoPURj4i69/nGxsOeS7ySrvc2g3CA9AvJJcoIfpdPrLsa6QOTz5+eKDAjJfHo+HHA4H5u789/eQN19zWD9REETBhZpi7m9APWQVO7nNtofAlEgk8sjr9b5B3jjct+Vy+QZnoSkObLPellw59y/gtwADACnkcJFIMwDzAAAAAElFTkSuQmCC',
                    icons:false
                });

                var a = function(d,e,a){d.add({title:e,onclick:function(){tinyMCE.activeEditor.execCommand("addShortCode",a)}})};

                d.onRenderMenu.add(function(c,b){
                    c = b.addMenu({title:"2 Columns"});
                        a(c,"50% | 50%","dspan_50x50");
                        a(c,"75% | 25%","dspan_75x25");
                        a(c,"25% | 75%","dspan_25x75");
                    c = b.addMenu({title:"3 Columns"});
                        a(c,"33.3% | 33.3% | 33.3%","tspan_33x33x33");
                        a(c,"50% | 25% | 25%","tspan_50x25x25");
                        a(c,"25% | 50% | 25%","tspan_25x50x25");
                        a(c,"25% | 25% | 50%","tspan_25x25x50");
                    c = b.addMenu({title:"4 Columns"});
                        a(c,"25% | 25% | 25% | 25%","qspan_25x25x25x25");
                });

                return d
            }

            return null
        },
    });

    tinymce.PluginManager.add("MyThemeShortcodes",tinymce.plugins.MyThemeShortcodes)

})();