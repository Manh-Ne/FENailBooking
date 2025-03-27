import axios from 'axios';

const API_BASE_URL = '/api/services';

const ServiceAPI = {
    getAllServices: () => {
        return axios.get(API_BASE_URL)
            .then(response => response.data)
            .catch(error => {
                console.error('Error fetching services:', error);
                throw error;
            });
    },

    getServiceById: (id) => {
        return axios.get(`${API_BASE_URL}/${id}`)
            .then(response => response.data)
            .catch(error => {
                console.error(`Error fetching service with id ${id}:`, error);
                throw error;
            });
    },

    createService: (serviceData) => {
        return axios.post(API_BASE_URL, serviceData)
            .then(response => response.data)
            .catch(error => {
                console.error('Error creating service:', error);
                throw error;
            });
    },

    updateService: (id, serviceData) => {
        return axios.put(`${API_BASE_URL}/${id}`, serviceData)
            .then(response => response.data)
            .catch(error => {
                console.error(`Error updating service with id ${id}:`, error);
                throw error;
            });
    },

    deleteService: (id) => {
        return axios.delete(`${API_BASE_URL}/${id}`)
            .then(response => response.data)
            .catch(error => {
                console.error(`Error deleting service with id ${id}:`, error);
                throw error;
            });
    },
};

export default ServiceAPI;
