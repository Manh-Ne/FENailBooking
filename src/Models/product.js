import axios from 'axios';

const API_BASE_URL = '/api/products';

const ProductAPI = {
    getAllProducts: () => {
        return axios.get(API_BASE_URL)
            .then(response => response.data)
            .catch(error => {
                console.error('Error fetching products:', error);
                throw error;
            });
    },

    getProductById: (id) => {
        return axios.get(`${API_BASE_URL}/${id}`)
            .then(response => response.data)
            .catch(error => {
                console.error(`Error fetching product with id ${id}:`, error);
                throw error;
            });
    },

    createProduct: (productData) => {
        return axios.post(API_BASE_URL, productData)
            .then(response => response.data)
            .catch(error => {
                console.error('Error creating product:', error);
                throw error;
            });
    },

    updateProduct: (id, productData) => {
        return axios.put(`${API_BASE_URL}/${id}`, productData)
            .then(response => response.data)
            .catch(error => {
                console.error(`Error updating product with id ${id}:`, error);
                throw error;
            });
    },

    deleteProduct: (id) => {
        return axios.delete(`${API_BASE_URL}/${id}`)
            .then(response => response.data)
            .catch(error => {
                console.error(`Error deleting product with id ${id}:`, error);
                throw error;
            });
    },
};

export default ProductAPI;
