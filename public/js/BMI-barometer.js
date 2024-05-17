const data = {
        labels: ['Underweight', 'Normal', 'Overweight', 'Obese'], // Update labels
        datasets: [{
            label: 'Weekly Sales',
            data: [18.5, 6.4, 4.9, 15.2],
            backgroundColor: [
                'rgba(23, 166, 227, 1)',   // Blue
                'rgba(23, 227, 40, 1)',   // Green
                'rgba(227, 152, 23, 1)',   // Orange
                'rgba(227, 23, 23, 1)'    // Red
            ],
            borderColor: [
                'rgba(23, 166, 227, 1)',    // Blue
                'rgba(23, 227, 40, 1)',    // Green
                'rgba(227, 152, 23, 1)',    // Orange
                'rgba(227, 23, 23, 1)'     // Red
            ],
            borderWidth: 1,
            circumference: 180,
            rotation: 270,
            cutout: '50%',
            needleValue: 18
        }]
    };

    const gaugeNeedle = {
        id: 'gaugeNeedle',
        afterDatasetsDraw(chart, args, plugins) {
            const {ctx, data} = chart;

            ctx.save();
            const xCenter = chart.getDatasetMeta(0).data[0].x;
            const yCenter = chart.getDatasetMeta(0).data[0].y;
            const outerRadius = chart.getDatasetMeta(0).data[0].outerRadius;
            const innerRadius = chart.getDatasetMeta(0).data[0].innerRadius;
            const widthSlice = (outerRadius - innerRadius) / 2;
            const radius = 7; //size of the circle at the bottom of the needle
            const angle = Math.PI / 180;

            const needleValue = data.datasets[0].needleValue;
            const dataTotal = data.datasets[0].data.reduce((a, b) => a + b, 0);

            const circumference = ((chart.getDatasetMeta(0).data[0].circumference / Math.PI) / data.datasets[0].data[0]) * needleValue;

            ctx.translate(xCenter, yCenter);
            ctx.rotate(Math.PI * (circumference + 1.5))

            ctx.beginPath();
            ctx.strokeStyle = 'black';
            ctx.fillStyle = 'black';
            ctx.lineWidth = 3;
            ctx.moveTo(0 - 5, 0);
            ctx.lineTo(0, 0 -innerRadius - widthSlice);
            ctx.lineTo(0 + 5, 0);
            ctx.closePath();
            ctx.stroke();
            ctx.fill();

            ctx.beginPath();
            ctx.arc(0, 0, radius, 0, angle * 360, false);
            ctx.fill();
            ctx.restore();
        }
    };

    const gaugeFlowMeter = {
        id: 'gaugeFlowMeter',
        afterDatasetsDraw(chart, args, plugins){
            const {ctx, data} = chart;

            ctx.save();
            const needleValue = data.datasets[0].needleValue;
            const xCenter = chart.getDatasetMeta(0).data[0].x;
            const yCenter = chart.getDatasetMeta(0).data[0].y;

            let weightStatus;
            if (needleValue < 18.5) {
                weightStatus = 'Underweight';
            } else if (needleValue >= 18.5 && needleValue <= 24.9) {
                weightStatus = 'Normal';
            } else if (needleValue >= 25 && needleValue <= 29.9) {
                weightStatus = 'Overweight';
            } else {
                weightStatus = 'Obese';
            }

            const circumference = ((chart.getDatasetMeta(0).data[0].circumference / Math.PI) / data.datasets[0].data[0]) * needleValue;
            const percentageValue = circumference * 100;

            ctx.font = 'bold 13px sans-serif';
            ctx.fillStyle = 'Green';
            ctx.textAlign = 'center';
            ctx.fillText(weightStatus, xCenter, yCenter + 35);
        }
    }

    const gaugeLabels = {
        id: 'gaugeLabels',
        afterDatasetsDraw(chart, args, plugins){
            const {ctx, chartArea: {left, right}} = chart;
            const xCenter = chart.getDatasetMeta(0).data[0].x;
            const yCenter = chart.getDatasetMeta(0).data[0].y;

            const outerRadius = chart.getDatasetMeta(0).data[0].outerRadius;
            const innerRadius = chart.getDatasetMeta(0).data[0].innerRadius;
            const widthSlice = (outerRadius - innerRadius) / 2;

            ctx.translate(xCenter, yCenter);
            ctx.font = 'bold 8px sans-serif';
            ctx.fillStyle = 'white';
            ctx.textAlign = 'Center';

            ctx.fillText('Underweight', 15 - innerRadius - widthSlice,  - 35);
            ctx.fillText('Obese', -5 + innerRadius + widthSlice, 0 - 35);
            ctx.fillText('Normal', -5,-80);
            ctx.fillText('Overweight', 35, -70);

            ctx.fillText('< 18.5', 5 - innerRadius - widthSlice, -5 - 18); //Underweight
            ctx.fillText('> 30', -1 + innerRadius + widthSlice, -13 - 10); //Obese
            ctx.fillText('18.6 - 24.9', -10, -70); //Normal
            ctx.fillText('25.0 - 29.9', 35, -60); //Overweight
            ctx.restore();
        }
    }

    const config = {
        type: 'doughnut',
        data,
        options: {
            layout:{
                padding:{
                    bottom: 50
                }
            },
            aspectRatio: 1,
            plugins:{
                legend:{
                    display: false
                },
                tooltip:{
                    enabled: false
                }
            }
        },
        plugins: [gaugeNeedle, gaugeFlowMeter, gaugeLabels]
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );

    const chartVersion = document.getElementById('chartVersion');
    chartVersion.innerText = Chart.version;