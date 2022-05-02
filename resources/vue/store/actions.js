import {productsServices} from "../../js/services/productsServices";
import {state} from "./state";

export const actions = {
    initialize: () => {
        actions.refreshProducts()
    },

    refreshProducts: async () => {
        state.products = (await productsServices.all()).data.data
    },

    closeModal: () => {
        state.modal = null;
    },
}
