<template>
    <div class="mt-5">
        <canvas id="myChart"/>
    </div>
</template>

<script setup>

import {Chart, registerables} from 'chart.js';
import {onMounted} from "vue";
import axios from "axios";

Chart.register(...registerables)

let values = [];
let data = [];
let config = [];
let myChart = {};
let labels = [];

const getChart = (newData) => {
    data = {
        labels: labels,
        datasets: [{
            label: 'Payments',
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1,
            data: newData,
        }],
    }

    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };

    myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
}
onMounted(() => {
        axios.get('/api/metricPayments').then(response => {
            values = Object.values(response.data.data);
            labels = Object.keys(response.data.data);
            getChart(values);
        })
    }
)
</script>

<style scoped>


</style>
