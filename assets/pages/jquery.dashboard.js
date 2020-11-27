
/**
* Theme: Ubold Admin Template
* Author: Coderthemes
* Morris Chart
*/

!function($) {
    "use strict";

    var Dashboard1 = function() {
    	this.$realData = []
    };
    
    //creates Stacked chart
    Dashboard1.prototype.createStackedChart  = function(element, data, xkey, ykeys, labels, lineColors) {
        Morris.Bar({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            stacked: true,
            labels: labels,
            hideHover: 'auto',
            resize: true, //defaulted to true
            gridLineColor: '#eeeeee',
            barColors: lineColors
        });
    },

    //creates area chart with dotted
    Dashboard1.prototype.createAreaChartDotted = function(element, pointSize, lineWidth, data, xkey, ykeys, labels, Pfillcolor, Pstockcolor, lineColors) {
        Morris.Area({
            element: element,
            pointSize: 0,
            lineWidth: 0,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            hideHover: 'auto',
            pointFillColors: Pfillcolor,
            pointStrokeColors: Pstockcolor,
            resize: true,
            gridLineColor: '#eef0f2',
            lineColors: lineColors
        });

   },
    
    
    Dashboard1.prototype.init = function() {

        //creating Stacked chart
        var $stckedData  = [
            { y: 'JAN', a: 45, b: 180, c: 100 },
            { y: 'FEB', a: 75,  b: 65, c: 80 },
            { y: 'MAR', a: 100, b: 90, c: 56 },
            { y: 'APR', a: 75,  b: 65, c: 89 },
            { y: 'MAY', a: 100, b: 90, c: 120 },
            { y: 'JUN', a: 75,  b: 65, c: 110 },
            { y: 'JUL', a: 50,  b: 40, c: 85 },
            { y: 'AUG', a: 75,  b: 65, c: 52 },
            { y: 'SEP', a: 50,  b: 40, c: 77 },
            { y: 'OCT', a: 75,  b: 65, c: 90 },
            { y: 'NOV', a: 100, b: 90, c: 130 },
			{ y: 'DEC', a: 10, b: 50, c: 100 }
        ];
        this.createStackedChart('morris-bar-stacked', $stckedData, 'y', ['a', 'b', 'c'], ['Desktops', 'Tablets', 'Mobiles'], ['#5fbeaa', '#5d9cec', '#ebeff2']);

        //creating area chart
        var $areaDotData = [
                { y: '2009', a: 10, b: 20, c:30 },
                { y: '2010', a: 75,  b: 65, c:30 },
                { y: '2011', a: 50,  b: 40, c:30 },
                { y: '2012', a: 75,  b: 65, c:30 },
                { y: '2013', a: 50,  b: 40, c:30 },
                { y: '2014', a: 75,  b: 65, c:30 },
                { y: '2015', a: 90, b: 60, c:30 }
            ];
        this.createAreaChartDotted('morris-area-with-dotted', 0, 0, $areaDotData, 'y', ['a', 'b', 'c'], ['Desktops ', 'Tablets ', 'Mobiles '],['#ffffff'],['#999999'], ['#566676', '#5fbeaa', '#5d9cec']);

    },
    //init
    $.Dashboard1 = new Dashboard1, $.Dashboard1.Constructor = Dashboard1
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.Dashboard1.init();
}(window.jQuery);