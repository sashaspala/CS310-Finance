$(function () {
    $('#graph').highcharts({
        title: {
            text: 'Finances',
            x: -20 //center
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'March']
        },
        yAxis: {
            title: {
                text: 'Amount in $'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valuePrefix: '$'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Liabilities',
            data: [7.0, 6.9, 9.5]
        }, {
            name: 'Assets',
            data: [-0.2, 0.8, 5.7]
        }, {
            name: 'Net Worth',
            data: [-0.9, 0.6, 3.5]
        }, {
            name: 'Account 1', //this should update automatically from some function call
            data: [3.9, 4.2, 5.7]
        }]
    });
});

$(function() {
    $( "#datepicker" ).datepicker();
});