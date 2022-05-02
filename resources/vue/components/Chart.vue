<template>
    <div class="mt-5">
        <canvas id="myChart"/>
    </div>
</template>

<script setup>

import { Chart, registerables } from 'chart.js';
import { onMounted } from "vue";
import axios from "axios";

    Chart.register(...registerables)

    let values = [];
    let data = [];
    let config = [];
    let myChart = {};
    let labels = [];

    const getChart = (newData) => {
        data =  {
            labels: labels,
            datasets: [{
                label: 'My First dataset',
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(99,193,255)',
                    'rgb(175,26,18)',
                    'rgb(55, 299, 132)',
                    'rgb(19,123,25)',
                    'rgb(420,126,181)',
                ],
                borderColor: 'rgb(0,0,0)',
                data: newData,
            }],
        }

        config = {
            type: 'doughnut',
            data: data,
            options: {}
        };

        myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    }
    onMounted( () => {
        axios.get('/api/productMetric').then(response => {
            values = Object.values(response.data.data);
            labels = Object.keys(response.data.data);
            getChart(values);
        })
        }
    )
</script>

<style scoped>


</style>
