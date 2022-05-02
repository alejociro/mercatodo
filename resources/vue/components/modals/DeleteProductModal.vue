<template>
    <LayoutModal>
        <h2 class="font-semibold text-gray-800">Delete Product</h2>
        <div class="flex items-center gap-1 text-xs font-semibold italic text-yellow-500">
            <ExclamationIcon class="h-4" />
            <span>This action can not be undone</span>
        </div>
        <div class="mt-4 flex justify-around">
            <button @click="deleteProduct" class="btn btn-danger text-xs">Delete</button>
            <button @click="close" class="btn btn-secondary text-xs">Cancel</button>
        </div>
    </LayoutModal>
</template>

<script>
import LayoutModal from './LayoutModal.vue';
import { actions, state } from '../../store';
import { XIcon, ExclamationIcon } from '@heroicons/vue/outline';
import { productsServices} from "../../../js/services/productsServices";

export default {
    components: { XIcon, ExclamationIcon, LayoutModal },
    setup() {
        const deleteProduct = async () => {
            await productsServices.destroy(state.productSelected.id);
            actions.closeModal();
            actions.refreshProducts();
            console.log('estoy en delete')
        };
        return { close: actions.closeModal, deleteProduct };
    },
};
</script>
