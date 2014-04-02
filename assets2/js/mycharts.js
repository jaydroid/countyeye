/**
 * Created by Jay on 4/1/14.
 * Will serve as a holder for all charts on the website
 * Will server charts based on AJAX calls
 *
 */


//Function to budget Draw Chart for a specific project
function drawchart(dt){

    //parse data to int
    a= parseInt(dt[0]);
    b= parseInt(dt[1]);
    c= parseInt(dt[2]);
    d= parseInt(dt[3]);
    e= parseInt(dt[4]);
    f= parseInt(dt[5]);
    g= parseInt(dt[6]);

    $('#chart_canvas').highcharts({

        chart: {
            type: 'column'
        },
        title: {
            text: 'Project Budget (7Yrs)'
        },
        subtitle: {
            text: 'Source: Kenya Open Data'
        },
        xAxis: {
            categories: [
                '2003-2004',
                '2004-2005',
                '2005-2006',
                '2006-2007',
                '2007-2008',
                '2008-2009',
                '2009-2010'
            ]
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Amount (Ksh)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} Ksh</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Budget',
            data: [a,b,c,d,e,f,g]
        }]
    });

}//end draw chart function


//Function to draw highchart

function sector_chart(data){

$('#sector_pie').highcharts({
chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false
},
title: {
    text: 'Project sectors being undertaken in a county'
    },
tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
},
plotOptions: {
    pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
            enabled: true,
            color: '#000000',
            connectorColor: '#000000',
            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
        }
    }
},
series: [{
        type: 'pie',
        name: 'Sector',
        data: [data]
    }]
});
};

/*
*['Firefox',   45.0],
 ['IE',       26.8],
 ['Chrome',    16.8],
 ['Safari',    8.5],
 ['Opera',     6.2],
 ['Others',   0.7]
s
 * */


/*
*
 {
 name: 'Chrome',
 y: 12.8,
 sliced: true,
 selected: true
 },

 * */




/*
* Project budget bar chart function
* */
function budget_chart(dt){
    //parse data to int
    a= parseInt(dt[0]);
    b= parseInt(dt[1]);
    c= parseInt(dt[2]);
    d= parseInt(dt[3]);
    e= parseInt(dt[4]);
    f= parseInt(dt[5]);
    g= parseInt(dt[6]);

    $('#budget_chart').highcharts({

        chart: {
            type: 'column'
        },
        title: {
            text: 'Total Project Budget (7Yrs)'
        },
        subtitle: {
            text: 'Source: Kenya Open Data'
        },
        xAxis: {
            categories: [
                '2003-2004',
                '2004-2005',
                '2005-2006',
                '2006-2007',
                '2007-2008',
                '2008-2009',
                '2009-2010'
            ]
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Amount (Ksh)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} Ksh</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Budget',
            data: [a,b,c,d,e,f,g]
        }]
    });

}//end draw chart function