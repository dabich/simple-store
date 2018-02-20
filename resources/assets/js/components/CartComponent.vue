<template>
    <a href="/checkout" class="nav-link">
        <shopping-cart-icon></shopping-cart-icon>
        <i class="badge badge-primary badge-pill">{{ totalCount }}</i>
    </a>
</template>

<script>
    import { ShoppingCart } from 'vue-feather-icon';
    import { mapGetters } from 'vuex';

    export default {
        components: {
            ShoppingCartIcon: ShoppingCart
        },

        computed: {
            ...mapGetters({
                totalCount: 'totalCount',
                totalPrice: 'totalPrice',
                items: 'items',
            })
        },

        props: {
            cart: Object,
        },

        mounted() {
            this.$store.state.cart.totalCount = this.cart.totalCount;
            this.$store.state.cart.totalPrice = this.cart.totalPrice;
            this.$store.state.cart.items = this.cart.items;
        }
    }
</script>

<style scoped>

</style>