<template>
    <router-link class="cart-icon--mob" to="cart">
        <img src="/images/cart-icon-mob.svg" alt="" class="cart-image--mob">
        <div class="cart-quantity">
            {{this.CART.length}}
        </div>
    </router-link>
</template>

<script>
import {mapGetters} from 'vuex'

export default {
    name: "CartIconMob",
    computed: {
        ...mapGetters([
            'CART',
        ]),
    }
}
</script>

<style>
    .cart-icon--mob{
        position: fixed;
        right: 20px;
        bottom: 50px;

        width: 55px;
        height: 55px;
        background: #FFFFFF;
        box-shadow: 0px 11px 22px rgba(0, 0, 0, 0.42);
        border-radius: 50%;

        display: flex;
        justify-content: center;
        align-items: center;
    }
    .cart-quantity{
        position: absolute;
        top: 0;
        right: 0;

        width: 18px;
        height: 18px;
        background: #EB5C27;
        font-family: Montserrat;
        font-style: normal;
        font-weight: 500;
        font-size: 13px;
        line-height: 125%;
        /* or 16px */
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;


        color: #FFFFFF;

    }
</style>
