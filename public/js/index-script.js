// index.blade

function calculateBMI() {
    var height = document.getElementById("height").value / 100;
    var weight = document.getElementById("weight").value;
    var bmi = weight / (height * height);
    document.getElementById("result1").innerText = bmi.toFixed(2);
}

function calculateStandardWeight() {
    var height = document.getElementById("height").value / 100;
    var standard_weight =  height * height * 22;
    document.getElementById("result2").innerText = standard_weight.toFixed(2);
}

function calculateWeightDiff() {
    var height = document.getElementById("height").value / 100;
    var current_weight = document.getElementById("weight").value;
    var standard_weight =  height * height * 22;
    var weight_diff = current_weight - standard_weight
    document.getElementById("result3").innerText = weight_diff.toFixed(2);
}