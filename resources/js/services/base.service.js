import axios from 'axios';
import ErrorHandler from '../helpers/error-handler';

class BaseService {
    constructor(endpoint) {
        this.endpoint = endpoint;
    }

    getList(params) {
        return axios.get(`/api/${this.endpoint}`, { params })
            .then(response => response.data)
            .catch(error => {
                const errors = ErrorHandler.handleErrors(error.response?.data || error.message);
                throw new Error(JSON.stringify({ errors }));
            });
    }
}

export default BaseService;
