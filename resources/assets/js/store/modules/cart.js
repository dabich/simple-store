import axios from 'axios';

const state = {
    items: [],
    totalCount: 0,
    totalPrice: 0
};

const getters = {

    /**
     * Get items of cart
     * @param state
     * @returns {Array|DataTransferItemList}
     */
    items: state => state.items,

    /**
     * Total count of items
     * @param state
     * @returns {number}
     */
    totalCount: state => state.totalCount,

    /**
     * Total pricing
     * @param state
     * @returns {number}
     */
    totalPrice: state => state.totalPrice,
};

const prepareData = (res) => {
    if (res) {
        state.items = res.data.items;
        state.totalCount = res.data.totalCount;
        state.totalPrice = res.data.totalPrice;
    }
};

const actions = {

    fetchData: function () {
        axios.get('/cart').then((data) => prepareData(data))
    },

    addItem: function (target, item) {
        axios.post('/cart', item).then((data) => prepareData(data))
    },

    removeItem: function (target, id) {
        axios.delete('/cart' + id).then((data) => prepareData(data))
    },

    clear: function () {
        axios.delete('/cart').then((data) => prepareData(data))
    },
};

const mutations = {};

export default {
    state,
    getters,
    actions,
    mutations
}