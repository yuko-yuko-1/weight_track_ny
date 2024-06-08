// チャートのデータ
const data = {
    labels: ['Underweight', 'Normal', 'Overweight', 'Obese'], // ラベルの更新
    datasets: [{
        label: 'Weekly Sales',
        data: [18.5, 6.4, 4.9, 15.2],
        backgroundColor: [
            'rgba(23, 166, 227, 1)',   // 青
            'rgba(23, 227, 40, 1)',   // 緑
            'rgba(227, 152, 23, 1)',   // オレンジ
            'rgba(227, 23, 23, 1)'    // 赤
        ],
        borderColor: [
            'rgba(23, 166, 227, 1)',    // 青
            'rgba(23, 227, 40, 1)',    // 緑
            'rgba(227, 152, 23, 1)',    // オレンジ
            'rgba(227, 23, 23, 1)'     // 赤
        ],
        borderWidth: 1,
        circumference: 180,
        rotation: 270,
        cutout: '50%',
        needleValue: 18
    }]
};

// バロメーターの針を描画するオブジェクト
const gaugeNeedle = {
    id: 'gaugeNeedle',
    afterDatasetsDraw(chart, args, plugins) {
        const { ctx, data } = chart;

        ctx.save();
        const xCenter = chart.getDatasetMeta(0).data[0].x;
        const yCenter = chart.getDatasetMeta(0).data[0].y;
        const outerRadius = chart.getDatasetMeta(0).data[0].outerRadius;
        const innerRadius = chart.getDatasetMeta(0).data[0].innerRadius;
        const widthSlice = (outerRadius - innerRadius) / 2;
        const radius = 7; // 針の下の円のサイズ
        const angle = Math.PI / 180;

        // 現在のBMI値を取得
        const currentBMI = parseFloat(document.getElementById("currentbmi").value);

        // バロメーターの針の位置を現在のBMI値に応じて再計算
        const circumference = ((chart.getDatasetMeta(0).data[0].circumference / Math.PI) / data.datasets[0].data[0]) * currentBMI;

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

// バロメーターのフローメーターを描画するオブジェクト
const gaugeFlowMeter = {
    id: 'gaugeFlowMeter',
    afterDatasetsDraw(chart, args, plugins){
        const { ctx, data } = chart;

        ctx.save();
        const xCenter = chart.getDatasetMeta(0).data[0].x;
        const yCenter = chart.getDatasetMeta(0).data[0].y;

        // 現在のBMI値を取得
        const currentBMI = parseFloat(document.getElementById("currentbmi").value);

        let weightStatus;
        if (currentBMI < 18.5) {
            weightStatus = 'Underweight';
        } else if (currentBMI >= 18.5 && currentBMI <= 24.9) {
            weightStatus = 'Normal';
        } else if (currentBMI >= 25 && currentBMI <= 29.9) {
            weightStatus = 'Overweight';
        } else {
            weightStatus = 'Obese';
        }

        const circumference = ((chart.getDatasetMeta(0).data[0].circumference / Math.PI) / data.datasets[0].data[0]) * currentBMI;
        const percentageValue = circumference * 100;

        ctx.font = 'bold 13px sans-serif';
        ctx.fillStyle = 'Green';
        ctx.textAlign = 'center';
        ctx.fillText(weightStatus, xCenter, yCenter + 35);
    }
};

// バロメーターのラベルを描画するオブジェクト
const gaugeLabels = {
    id: 'gaugeLabels',
    afterDatasetsDraw(chart, args, plugins){
        const { ctx, chartArea: { left, right } } = chart;
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
};

// チャートの設定
const config = {
    type: 'doughnut',
    data,
    options: {
        layout: {
            padding: {
                bottom: 50
            }
        },
        aspectRatio: 1,
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                enabled: false
            }
        }
    },
    plugins: [gaugeNeedle, gaugeFlowMeter, gaugeLabels]
};

// チャートを描画
const myChart = new Chart(
    document.getElementById('myChart'),
    config
);