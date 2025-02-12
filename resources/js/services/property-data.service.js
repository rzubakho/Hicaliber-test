import axios from "axios";
class PropertyDataService {
    getList(params) {
        return axios.get(`/api/property-data`, { params })
            .then(response => response.data)
            .catch(error => {
                const errors = error.response?.data;
                throw new Error(JSON.stringify({ errors }));
            });
    }
}
export default new PropertyDataService();
