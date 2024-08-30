<template>
    <div v-if="visible" class="confirm-dialog-overlay">
        <div class="confirm-dialog">
            <p class="mt-5 px-4">{{ message }}</p>
            <div class="my-4">
                <button class="btn btn-secondary me-5" @click="cancel">Cancel</button>
                <button class="btn btn-danger" @click="confirm">Delete</button>
            </div>
        </div>
    </div>
</template>
  
<script>
import { defineComponent } from 'vue';

export default defineComponent({
    props: {
        visible: {
            type: Boolean,
            default: false
        },
        message: {
            type: String,
            default: 'Are you sure to delete this information?'
        }
    },
    setup(props, { emit }) {
        const confirm = () => {
            emit('confirm');
        };

        const cancel = () => {
            emit('cancel');
        };

        return {
            confirm,
            cancel
        };
    }
});
</script>


  
<style scoped>
    .confirm-dialog-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .confirm-dialog {
        background: white;
        padding: 20px;
        border-radius: 5px;
        text-align: center;
    }
</style>
  