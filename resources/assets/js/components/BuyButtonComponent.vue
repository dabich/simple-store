<template>
    <button type="button" @click="addItem(product)" class="btn btn-sm btn-primary">Buy</button>
</template>

<script>
    import { mapActions } from 'vuex';

    export default {
        props: {
            product: {
                type: Object
            }
        },
        methods: {
            ...mapActions([
                'addItem'
            ])
        }
    }
</script>
