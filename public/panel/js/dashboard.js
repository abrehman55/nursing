(function($) {
  'use strict'; 
  $(function() { 

    //Orders Chart
    if ($("#orders-chart-emerald").length) {
      var orderChartCanvas = $("#orders-chart-emerald").get(0).getContext("2d");

      var gradient1 = orderChartCanvas.createLinearGradient(0, 0, 0, 350);
      gradient1.addColorStop(0, 'rgba(56, 148, 102, 0.7)');
      gradient1.addColorStop(1, 'rgba(0, 0, 0, 0)');

      var currentChart = new Chart(orderChartCanvas, {
        type: 'bar',
        data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
          datasets: [{
              label: 'Delivered',
              data: [110, 190, 105, 195, 390, 260, 160, 90],
              backgroundColor: gradient1,
              borderColor: "#389466",
              borderWidth: 2,
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 20,
              bottom: 0
            }
          },
          scales: {
            yAxes: [{
              gridLines: {
                drawBorder: false,
                color: "rgba(123, 255, 206, 0.05)"
              },
              ticks: {
                fontColor: '#9a9a9a',
                stepSize: 100,
              }
            }],
            xAxes: [{
              ticks: {
                fontColor: '#9a9a9a',
                beginAtZero: true
              },
              gridLines: {
                display: false,
                color: "rgba(123, 255, 206, 0.05)"
              },
              barPercentage: 0.6
            }]
          },
          legend: {
            display: false
          },
          elements: {
            point: {
              radius: 0
            }
          }
        }
      });
    }

    //Orders Chart Mustard
    if ($("#orders-chart-mustard").length) {
      var orderChartCanvas = $("#orders-chart-mustard").get(0).getContext("2d");

      var gradient1 = orderChartCanvas.createLinearGradient(0, 0, 0, 350);
      gradient1.addColorStop(0, 'rgba(240, 161, 64, 0.7)');
      gradient1.addColorStop(1, 'rgba(0, 0, 0, 0)');

      var currentChart = new Chart(orderChartCanvas, {
        type: 'bar',
        data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
          datasets: [{
              label: 'Delivered',
              data: [110, 190, 105, 195, 390, 260, 160, 90],
              backgroundColor: gradient1,
              borderColor: "rgba(240, 161, 64, 0.8)",
              borderWidth: 2,
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 20,
              bottom: 0
            }
          },
          scales: {
            yAxes: [{
              gridLines: {
                drawBorder: false,
                color: "rgba(240, 161, 64, 0.05)"
              },
              ticks: {
                fontColor: '#9a9a9a',
                stepSize: 100,
              }
            }],
            xAxes: [{
              ticks: {
                fontColor: '#9a9a9a',
                beginAtZero: true
              },
              gridLines: {
                display: false,
                color: "rgba(240, 161, 64, 0.05)"
              },
              barPercentage: 0.6
            }]
          },
          legend: {
            display: false
          },
          elements: {
            point: {
              radius: 0
            }
          }
        }
      });
    }

    //Orders Chart Azure
    if ($("#orders-chart-azure").length) {
      var orderChartCanvas = $("#orders-chart-azure").get(0).getContext("2d");

      var gradient1 = orderChartCanvas.createLinearGradient(0, 0, 0, 350);
      gradient1.addColorStop(0, 'rgba(24, 135, 157, 0.7)');
      gradient1.addColorStop(1, 'rgba(0, 0, 0, 0)');

      var currentChart = new Chart(orderChartCanvas, {
        type: 'bar',
        data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
          datasets: [{
              label: 'Delivered',
              data: [110, 190, 105, 195, 390, 260, 160, 90],
              backgroundColor: gradient1,
              borderColor: "rgba(24, 135, 157, 0.8)",
              borderWidth: 2,
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 20,
              bottom: 0
            }
          },
          scales: {
            yAxes: [{
              gridLines: {
                drawBorder: false,
                color: "rgba(56, 184, 242, 0.05)"
              },
              ticks: {
                fontColor: '#9a9a9a',
                stepSize: 100,
              }
            }],
            xAxes: [{
              ticks: {
                fontColor: '#9a9a9a',
                beginAtZero: true
              },
              gridLines: {
                display: false,
                color: "rgba(56, 184, 242, 0.05)"
              },
              barPercentage: 0.6
            }]
          },
          legend: {
            display: false
          },
          elements: {
            point: {
              radius: 0
            }
          }
        }
      });
    }

    //Orders Chart Flamingo
    if ($("#orders-chart-flamingo").length) {
      var orderChartCanvas = $("#orders-chart-flamingo").get(0).getContext("2d");

      var gradient1 = orderChartCanvas.createLinearGradient(0, 0, 0, 350);
      gradient1.addColorStop(0, 'rgba(210, 69, 113, 0.7)');
      gradient1.addColorStop(1, 'rgba(0, 0, 0, 0)');

      var currentChart = new Chart(orderChartCanvas, {
        type: 'bar',
        data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
          datasets: [{
              label: 'Delivered',
              data: [110, 190, 105, 195, 390, 260, 160, 90],
              backgroundColor: gradient1,
              borderColor: "rgba(210, 69, 113, 0.8)",
              borderWidth: 2,
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 20,
              bottom: 0
            }
          },
          scales: {
            yAxes: [{
              gridLines: {
                drawBorder: false,
                color: "rgba(210, 69, 113, 0.05)"
              },
              ticks: {
                fontColor: '#9a9a9a',
                stepSize: 100,
              }
            }],
            xAxes: [{
              ticks: {
                fontColor: '#9a9a9a',
                beginAtZero: true
              },
              gridLines: {
                display: false,
                color: "rgba(210, 69, 113, 0.05)"
              },
              barPercentage: 0.6
            }]
          },
          legend: {
            display: false
          },
          elements: {
            point: {
              radius: 0
            }
          }
        }
      });
    }

    //Chart Sales
    if ($("#chart-sales").length) {
      var chartSalesCanvas = $("#chart-sales").get(0).getContext("2d");

      var gradient1 = chartSalesCanvas.createLinearGradient(0, 0, 0, 160);
      gradient1.addColorStop(0, 'rgba(255, 141, 114, 0.5)');
      gradient1.addColorStop(1, 'rgba(0, 0, 0, 0)');

      var gradient2 = chartSalesCanvas.createLinearGradient(0, 0, 0, 160);
      gradient2.addColorStop(0, 'rgba(119, 111, 249, 0.5)');
      gradient2.addColorStop(1, 'rgba(0, 0, 0, 0)');


      var areaData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "June"],
        datasets: [{
            data: [1000, 1894, 600, 1400, 2400, 1000, 3000],
            backgroundColor: gradient1,
            borderColor: [
              '#ff8d72'
            ],
            borderWidth: 2,
            pointBorderColor: "#ff8d72",
            pointBorderWidth: 4,
            pointRadius: 1,
            fill: 'origin',
            label: "online"
          },
          {
            data: [2000, 800, 1723, 600, 1200, 2000],
            backgroundColor: gradient2,
            borderColor: [
              '#776ff9'
            ],
            borderWidth: 2,
            pointBorderColor: "#776ff9",
            pointBorderWidth: 4,
            pointRadius: 1,
            fill: 'origin',
            label: "store"
          }
        ]
      };
      var areaOptions = {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          filler: {
            propagate: false
          }
        },
        scales: {
          xAxes: [{
            ticks: {
              fontColor: "#9a9a9a"
            },
            gridLines: {
              display: false,
              color: "rgba(101, 103, 119, 0.21)"
            }
          }],
          yAxes: [{
            ticks: {
              fontColor: "#9a9a9a",
              stepSize: 500,
              min: 0,
              max: 2500
            },
            gridLines: {
              drawBorder: false,
              color: "rgba(101, 103, 119, 0.21)"
            }
          }]
        },
        legend: {
          display: false
        },
        legendCallback : function(chart) {
          var text = [];
          text.push(' <div class="d-flex justify-content-between justify-content-lg-start flex-wrap">');
          text.push('<div class="mr-5 mb-2">');
          text.push('<div class="d-flex">');
          text.push('<i class="ti-briefcase" style="color: ' + chart.data.datasets[0].borderColor[0] +' "></i>');
          text.push('<h3 class="text-white ml-3">'+ chart.data.datasets[0].data[1] + '</h3>');
          text.push('</div>');
          text.push('<h6 class="font-weight-normal mb-0">Online sales</h6>');
          text.push('</div>');
          text.push('<div class="mb-2">');
          text.push('<div class="d-flex">');
          text.push('<i class="ti-apple" style="color: ' + chart.data.datasets[1].borderColor[0] +' "></i>');
          text.push('<h3 class="text-white ml-3">'+ chart.data.datasets[1].data[2] + '</h3>');
          text.push('</div>');
          text.push('<h6 class="font-weight-normal mb-0">Sales in store</h6>');
          text.push('</div>');
          text.push('</div>');
          return text.join('');
        },
        tooltips: {
          enabled: true
        }
      }
      var salesChartCanvas = $("#chart-sales").get(0).getContext("2d");
      var salesChart = new Chart(salesChartCanvas, {
        type: 'line',
        data: areaData,
        options: areaOptions
      });
      document.getElementById('sales-legend').innerHTML = salesChart.generateLegend();
    }

    //Trafic Chart
    if ($("#traffic-chart").length) {
      var ctx = document.getElementById('traffic-chart').getContext("2d");

      var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 181);
      gradientStrokeBlue.addColorStop(0, '#8433f7');
      gradientStrokeBlue.addColorStop(1, '#38b8f2');
      var gradientLegendBlue = 'linear-gradient(145deg, #8433f7, #0e4cfb)';

      var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 150);
      gradientStrokeRed.addColorStop(0, '#ff8d72');
      gradientStrokeRed.addColorStop(1, '#ff6491');
      var gradientLegendRed = 'linear-gradient(to right, rgba(238, 143, 154, 1), rgba(233, 79, 133, 1))';

      var trafficChartData = {
        datasets: [{
          data: [40, 60],
          backgroundColor: [
            gradientStrokeBlue,
            gradientStrokeRed
          ],
          hoverBackgroundColor: [
            gradientStrokeBlue,
            gradientStrokeRed
          ],
          borderColor: [
            gradientStrokeBlue,
            gradientStrokeRed
          ],
          legendColor: [
            gradientLegendBlue,
            gradientLegendRed
          ]
        }],
    
        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
          'Facebook',
          'Google',
          'Linkedin',
        ]
      };
      var trafficChartOptions = {
        responsive: true,
        animation: {
          animateScale: true,
          animateRotate: true
        },
        legend: false,
        legendCallback: function(chart) {
          var text = []; 
          text.push('<ul>'); 
          for (var i = 0; i < trafficChartData.datasets[0].data.length; i++) { 
              text.push('<li><h2 class="mb-2">'+trafficChartData.datasets[0].data[i]+'%</h2><div class="legend-content"><span class="legend-dots" style="background:' + 
              trafficChartData.datasets[0].legendColor[i] + 
                          '"></span>'+trafficChartData.labels[i]+'</div>'); 
              text.push('</li>'); 
          }
          text.push('</ul>'); 
          return text.join('');
        },
        cutoutPercentage: 86
      };
      var trafficChartPlugins = {
        beforeDraw: function(chart) {
          var width = chart.chart.width,
              height = chart.chart.height,
              ctx = chart.chart.ctx;
      
          ctx.restore();
          var fontSize = 1.2;
          ctx.font = fontSize + "em sans-serif";
          ctx.textBaseline = "middle";
          ctx.fillStyle = "#ffffff";
      
          var text = "1.2 M",
              textX = Math.round((width - ctx.measureText(text).width) / 2),
              textY = height / 2;
      
          ctx.fillText(text, textX, textY);
          ctx.save();
        }
      }
      var trafficChartCanvas = $("#traffic-chart").get(0).getContext("2d");
      var trafficChart = new Chart(trafficChartCanvas, {
        type: 'doughnut',
        data: trafficChartData,
        options: trafficChartOptions,
        plugins: trafficChartPlugins
      });
      $("#traffic-chart-legend").html(trafficChart.generateLegend()); 
    }

    //Navbar Search
    $( "#search-icon" ).on("click", function()  {
      $( "#search-field" ).toggle( "slow", function() {
      });
    });

  });
})(jQuery);