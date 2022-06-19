import axios from 'axios';

// const baseURL = 'http://localhost/api';
const baseURL = process.env.MIX_APP_API_BASE_URL;

export default axios.create({
  baseURL
});