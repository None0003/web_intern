import axios from 'axios';

const instance = axios.create({
    baseURL: 'http://localhost:8000/api/', // URL của backend Laravel
    timeout: 1000,
    headers: {
        'Content-Type': 'application/json',
    },
});

export default instance;