require('./bootstrap');

import { createApp } from 'vue';
import App from '../vue/App';
import Chart from "../vue/components/Chart";
import BarChart from "../vue/components/BarChart"

createApp(App).mount('#app');
createApp(Chart).mount('#chart');
createApp(BarChart).mount('#barChart')
