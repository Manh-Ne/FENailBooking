import axios from "axios";
import { error } from "naive-ui/es/_utils/naive/warn";
const API_BASE_URL = "/api/customers";
const CustomerAPI = {
  getAllCustomer: () => {
    return axios
      .get(API_BASE_URL)
      .then(response => response.data)
      .catch(error => {
        console.error('Error fetching customers:', error);
        throw error;
      });
  },
  getById: (id) => {
    return axios.get(`${API_BASE_URL}/${id}`)
    .then(response => response.data)
    .catch(error => {
      console.error('Error fetching customer with id ${id}:', error);
      throw error;
    })
  },
  createCustomer: (customerData) => {
    return axios.post(API_BASE_URL, customerData)
    .then(response => response.data)
    .catch(error => {
      console.error('Error creating customer:', error);
      throw error;
    });
  },
  updateCustomer: (id, customerData) => {
    return axios.put(`${API_BASE_URL}/${id}`, customerData)
    .then(response => response.data)
    .catch(error => {
      console.error('Error updating customer with id ${id}:', error);
      throw error;
    });
  },
  deleteCustomer: (id) => {
    return axios.delete(`${API_BASE_URL}/${id}`)
    .then(response => response.data)
    .catch(error => {
      console.error('Error deleting customer with id ${id}:', error);
      throw error;
    })
  },
};
export default CustomerAPI;
