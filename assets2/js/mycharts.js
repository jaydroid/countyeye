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


//Function to draw sector pie chart..
function sector_chart(data){

$('#sector_pie').highcharts({
chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false
},
title: {
    text: 'Project sectors being undertaken'
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
        data: data
    }]
});
}


//function to draw mtfe sector pie chart
function mtfe_chart(data){

$('#mtfe_pie').highcharts({
chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false
},
title: {
    text: 'Project sectors being undertaken'
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
        data: data
    }]
});
}


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

//        chart: {
//            type: 'column'
//        },
        title: {
            text: 'Total Project Budget (7Yrs)',
            x: 20
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
            title: {
                text: 'Amount (Ksh)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },

        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0; font-size: 10px;"><b>{point.y:.1f} Ksh</b></td></tr>',
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

/*
* Projects count per county
* */

function project_per_county_chart(dt){
    var data =['Baringo','Bomet','Bungoma','Busia','Embu','Garissa','Homa Bay','Isiolo','Kajiado','Kakamega','Kericho','Kiambu',
        'Kilifi','Kirinyaga','Kisii','Kisumu','Kitui','Kwale','Laikipia','Lamu','Machakos','Makueni','Mandera','Marakwet_Elgeyo','Marsabit','Meru','Migori','Mombasa','Muranga','Nairobi','Nakuru','Nandi','Narok','Nyamira','Nyandarua','Nyeri','Samburu','Siaya','Taita Taveta','Tana River','Tharaka Nithi','Trans Nzoia','Turkana','Uasin Gishu','Vihiga','Wajir','West Pokot'];

    $('#county_projects').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Total Projects Per County'
        },
        subtitle: {
            text: 'Source: Kenya Open Data'
        },
        xAxis: {
            categories: data,
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Project Count',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' millions'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: '#FFFFFF',
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Count',
            data: dt
        }]
    });
}

/*
* Function to draw donut of budget overviews
*
* */
function budget_donut_chart(dt){
    //alert(dt[0]);
    var num = dt[0].substr(1); //2nd grade hack
    a=parseInt(num);
    b=parseInt(dt[1]);

    $('#project_budgets').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        title: {
            text: 'Budget<br>Overviews',
            align: 'center',
            verticalAlign: 'middle',
            y: 50
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    distance: -50,
                    style: {
                        fontWeight: 'bold',
                        color: 'white',
                        textShadow: '0px 1px 2px black'
                    }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '75%']
            }
        },
        series: [{
            type: 'pie',
            name: 'Percentage',
            innerSize: '50%',
            data: [
                ['On budget', a],
                ['Over budget',  b]
            ]
        }]
    });
}