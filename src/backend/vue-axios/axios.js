/* global localStorage */

import axios from 'axios'

const API_URL = process.env.API_URL || 'http://local.controlescolarapi:8080/'

export default axios.create({
	baseURL: API_URL,
	headers: {
		'Content-Type': 'multipart/form-data'
	}
})
