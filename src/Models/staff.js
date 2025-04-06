import axios from 'axios';

const API_BASE_URL = '/api/staffs';

const StaffAPI = {
    getAllStaffs: () => {
        return axios.get(API_BASE_URL)
            .then(response => response.data)
            .catch(error => {
                console.error('Error fetching staff:', error);
                throw error;
            });
    },

    getStaffById: (id) => {
        return axios.get(`${API_BASE_URL}/${id}`)
            .then(response => response.data)
            .catch(error => {
                console.error(`Error fetching staff with id ${id}:`, error);
                throw error;
            });
    },

    createStaff: (staffData) => {
        return axios.post(API_BASE_URL, staffData)
            .then(response => response.data)
            .catch(error => {
                console.error('Error creating staff:', error);
                throw error;
            });
    },

    updateStaff: (id, staffData) => {
        return axios.put(`${API_BASE_URL}/${id}`, staffData)
            .then(response => response.data)
            .catch(error => {
                console.error(`Error updating staff with id ${id}:`, error);
                throw error;
            });
    },

    deleteStaff: (id) => {
        return axios.delete(`${API_BASE_URL}/${id}`)
            .then(response => response.data)
            .catch(error => {
                console.error(`Error deleting staff with id ${id}:`, error);
                throw error;
            });
    },
};

export default StaffAPI;
