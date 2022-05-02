import axios from 'axios';

const URL = 'http://127.0.0.1:8000/api/productsapi';

export const productsServices = {
    all: () => axios.get(URL),
    create: (data) => axios.post(URL, data),
    show: (id) => axios.get(`${URL}/${id}`),
    destroy: (id) => axios.delete(`${URL}/${id}`),
};
