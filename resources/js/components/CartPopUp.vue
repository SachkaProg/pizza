<template>
    <div class="cart__pop-up">
        <img class="p-p-triangle" src="/images/pop-up__triangle.png" alt="">
        <div class="cart__pop-up__inner">


            <div v-if="!this.CART.length" class="cart__pop-up__is-empty">
                <img src="/images/cart.png" class="cart__pop-up__is-empty__img" alt="">
                <div class="cart__pop-up__is-empty__text">
                    <p class="cart__pop-up__is-empty__text-title">
                        Ой, пусто!
                    </p>
                    <p class="cart__pop-up__is-empty__text-small">
                        Добавьте один или<br>
                        несколько товаров
                    </p>
                </div>
            </div>



            <div v-else class="cart__pop-up__list">

                <div v-for="(cart_item,index) in this.CART" :key="index" class="cart__pop-up__item">
                    <div class="cart__pop-up__item__img">
                        <img :src="cart_item.img" alt="" class="cart__pop-up__item__img-img">
                    </div>
                    <div class="cart__pop-up__item__content__inner">
                        <div class="cart__pop-up__item__content__inner__wrapper">
                            <div class="cart__pop-up__item__content">
                                <div class="cart__pop-up__item__name">
                                    {{cart_item.name}}
                                </div>
                                <div class="cart__pop-up__item__desc">
                                    <div v-for="(item,index) in cart_item.composition" :key="index" class="cart__pop-up__item__desc__ingradient">
                                        {{item}}
                                    </div>
                                </div>
                            </div>
                            <div class="cart__pop-up__item__price">
                                {{cart_item.price}} ₽
                            </div>
                            <div class="cart__pop-up__item__delete-btn">
                                <!-- <img src="/images/trash-black.svg" alt=""> -->
                                <svg @click="deleteFromCart(cart_item.id, $event)" width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.857178 13.7142C0.857178 14.6614 1.62431 15.4285 2.57148 15.4285H9.42865C10.3758 15.4285 11.1429 14.6614 11.1429 13.7142V3.42847H0.857178V13.7142Z" fill="#343435"/>
                                    <path d="M9.00002 0.857131L8.14285 0H3.85715L2.99998 0.857131H0V2.57143H12V0.857131H9.00002Z" fill="#343435"/>
                                </svg>
                            </div>
                        </div>
                        <div class="cart__pop-up__item__line"></div>
                    </div>
                    
                </div>

            </div>

        </div>
    </div>
</template>

<script>

import {mapGetters,mapActions} from 'vuex'

export default {
    name: 'CartPopUp',
    computed: {
        ...mapGetters([
            'CART',
        ]),
    },
    methods: {
        ...mapActions([
            'DELETE_FROM_CART',
        ]),
        deleteFromCart: function(id, event){
            event.preventDefault();
            event.stopPropagation();
            this.DELETE_FROM_CART(id);
        },
    },
}
</script>

<style>
    .cart__pop-up__item__desc__ingradient{
        display: inline;
    }
    .cart__pop-up__item__desc__ingradient::after{
        content: ',';
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 8px;
        line-height: 110%;
        /* or 11px */
        color: #B0B0B0;
    }
    .cart__pop-up__item__desc__ingradient:last-child::after{
        display: none;
    }
</style>

<style>
    .cart__pop-up__item__delete-btn svg path{
        stroke: inherit;
        stroke-width: inherit;
        fill: inherit;
    }
    

    .cart__pop-up__item__delete-btn svg {
        fill: #343435;
        height: 16px;
    }

    .cart__pop-up__item__delete-btn:hover svg {
        height: 20px;
    }

    .cart__pop-up__item__delete-btn:hover {
        /* stroke: #EB5C27; */
        fill: #EB5C27;
    }
    .cart__pop-up__item__delete-btn svg:hover{
        /* stroke: #EB5C27; */
        fill: #EB5C27;
    }
    
</style>

<style>
    .cart__pop-up{
        position: absolute;
        top: 36px;
        right: 0;

        display: none;
        flex-direction: column;
        align-items: flex-end;
        z-index: 20;

        
    }
    .p-p-triangle{
        position: relative;
        right: 16px;
    }
    .cart__pop-up__inner{
        background: #fff;
        border-radius: 16px;
        min-width: 273px;
        max-width: 335px;
        width: auto;
        padding: 16px;

        
    }
    .cart__pop-up__is-empty{
        display: flex;
        align-items: center;
    }

    .cart__pop-up__is-empty__img{
        display: block;
        width: 103px;
        height: 103px;
    }
    .cart__pop-up__is-empty__text{
        display: flex;
        flex-direction: column;
        justify-content: space-around;
    }

    .cart__pop-up__is-empty__text-title{
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 125%;
        /* identical to box height, or 22px */


        /* Secondary color */

        color: #343435;

        margin-bottom: 10px;
    }
    .cart__pop-up__is-empty__text-small{
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 10px;
        line-height: 125%;
        /* or 12px */


        color: #B0B0B0;
    }
</style>

<style>
    .cart__pop-up__item__content__inner{
        width: 100%;
        align-self: flex-end;
    }
    .cart__pop-up__item__content__inner__wrapper{
        display: flex;
        align-items: center;
    }

    .cart__pop-up__inner{
        max-height: 406px;
        overflow-y: scroll;
    }
    .cart__pop-up__inner::-webkit-scrollbar{
        width: 7px;
    }
    .cart__pop-up__inner::-webkit-scrollbar-thumb {
        background-color: #808080;    /* color of the scroll thumb */
        border-radius: 27px;       /* roundness of the scroll thumb */
        border: 1px solid #fff;  /* creates padding around scroll thumb */
        /* height: 120px; */
        margin-top: 10px;
        /* margin-bottom: 120px; */
    }
    .cart__pop-up__inner::-webkit-scrollbar-button {
        /* height: 120px; */
        margin-top: 10px;
        /* margin-bottom: 120px; */
    }

    .cart__pop-up__list{
        width: 303px;

        
    }
    .cart__pop-up__item{
        display: flex;
        align-items: center;
        justify-content: flex-start;

        margin-bottom: 15px;
    }

    

    .cart__pop-up__item__img{
        width: 50px;
        height: 50px;
        margin-right: 10px;
    }    
    .cart__pop-up__item__img-img{
        width: 50px;
        height: 50px;
        display: block;
    }

    .cart__pop-up__item__content{
        display: flex;
        flex-direction: column;
        justify-content: center;
        flex-grow: 1;

        max-width: 122px;
    }
    .cart__pop-up__item__name{
        margin-bottom: 5px;
        font-family: Open Sans;
        font-style: normal;
        font-weight: 600;
        font-size: 10px;
        line-height: 110%;
        /* identical to box height, or 11px */


        color: #343435;
    }
    .cart__pop-up__item__desc{
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 8px;
        line-height: 110%;
        /* or 9px */

        max-width: 160px;
        color: #B0B0B0;

        margin-bottom: 10px;
    }
    .cart__pop-up__item__price{
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 16px;
        line-height: 110%;
        /* identical to box height, or 18px */

        min-width: 45px;
        margin-right: 20px;
        margin-left: 20px;
        color: #343435;
    }

    .cart__pop-up__item__line{
        width: 100%;
        height: 1px;
        background: #C4C4C4;
    }
    .cart__pop-up__item:last-child .cart__pop-up__item__line{
        display: none;
    }
</style>






