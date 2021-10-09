<template>
    <div class="cart">
        <HeaderCart :step="1" />

        <div class="container">
            <div class="cart-title">Корзина</div>

            <div class="cart__inner">

                <div v-if="!this.CART.length" class="cart-is-empty">
                    <img src="/images/cart.png" alt="" class="cart-is-empty__img">
                    <p class="cart-is-empty__text">
                        Ваша корзина пуста, добавьте что-нибудь из меню
                    </p>
                </div>

                <div v-else class="cart-list">

                    <div v-for="(cart_item,index) in this.CART" :key="index" class="cart-item">
                        <div class="cart-item__img">
                            <img :src="cart_item.img" alt="" class="cart-item__img-img">
                        </div>
                        <div class="cart-item__content">
                            <div class="cart-item__name">
                                {{cart_item.name}}
                            </div>
                            <div class="cart-item__desc">
                                <div v-for="(item,index) in cart_item.composition" :key="index" class="cart-item__desc__ingradient">
                                    {{item}}
                                </div>
                            </div>
                        </div>
                        <div class="cart-item__quantity__inner">
                            <div @click="decrementItem(index)" class="cart-item__quantity__decrement">
                                –
                            </div>
                            <div class="cart-item__quantity">
                                {{cart_item.quantity}}
                            </div>
                            <div @click="incrementItem(index)" class="cart-item__quantity__increment">
                                +
                            </div>
                        </div>
                        <div class="cart-item__price">
                            {{cart_item.price*cart_item.quantity}} ₽
                        </div>
                        <div class="cart-item__delete-btn">
                            <svg @click="deleteFromCart(index, $event)" width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.857178 13.7142C0.857178 14.6614 1.62431 15.4285 2.57148 15.4285H9.42865C10.3758 15.4285 11.1429 14.6614 11.1429 13.7142V3.42847H0.857178V13.7142Z" fill="#343435"/>
                                <path d="M9.00002 0.857131L8.14285 0H3.85715L2.99998 0.857131H0V2.57143H12V0.857131H9.00002Z" fill="#343435"/>
                            </svg>
                        </div>
                    </div>













                    <div v-for="(cart_item,index) in this.CART" :key="index" class="cart-item--mob">
                        <div class="cart-item__img">
                            <img :src="cart_item.img" alt="" class="cart-item__img-img">
                        </div>
                        <div class="cart-item--mob__content-block">
                            <div class="cart-item--mob__content">
                                <div class="cart-item__content">
                                    <div class="cart-item__name">
                                        {{cart_item.name}}
                                    </div>
                                    <div class="cart-item__desc">
                                        <div v-for="(item,index) in cart_item.composition" :key="index" class="cart-item__desc__ingradient">
                                            {{item}}
                                        </div>
                                    </div>
                                </div>

                                <div class="cart-item__quantity-price__wrapper">
                                    <div class="cart-item__quantity__inner">
                                        <div @click="decrementItem(index)" class="cart-item__quantity__decrement">
                                            –
                                        </div>
                                        <div class="cart-item__quantity">
                                            {{cart_item.quantity}}
                                        </div>
                                        <div @click="incrementItem(index)" class="cart-item__quantity__increment">
                                            +
                                        </div>
                                    </div>
                                    <div class="cart-item__price">
                                        {{cart_item.price*cart_item.quantity}} ₽
                                    </div>
                                </div>
                            </div>


                            <div class="cart-item__delete-btn">
                                <svg @click="deleteFromCart(index, $event)" width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.857178 13.7142C0.857178 14.6614 1.62431 15.4285 2.57148 15.4285H9.42865C10.3758 15.4285 11.1429 14.6614 11.1429 13.7142V3.42847H0.857178V13.7142Z" fill="#343435"/>
                                    <path d="M9.00002 0.857131L8.14285 0H3.85715L2.99998 0.857131H0V2.57143H12V0.857131H9.00002Z" fill="#343435"/>
                                </svg>
                            </div>
                        </div>
                    </div>

















                </div>

                <div v-if="this.CART.length" class="cart-additives">
                    <div class="cart-additives__title">
                        Соусы
                    </div>

                    <div class="cart-additives__list">

                        <div v-for="item in sauces" class="cart-additives__item">
                            <div class="cart-additives__item__img">
                                <img :src="item.img" alt="" class="cart-additives__item__img-img">
                            </div>

                            <div class="cart-additives__item__name-price">
                                <div class="cart-additives__item__name">
                                    {{item.name}}
                                </div>
                                <div class="cart-additives__item__price" @click="addToCart(item)">
                                    {{item.price}} ₽
                                </div>
                            </div>


                        </div>

                        <div class="cart-additives__item">
                            <div class="cart-additives__item__img">
                                <img src="/images/additives/cheese-sauce.png" alt="" class="cart-additives__item__img-img">
                            </div>

                            <div class="cart-additives__item__name-price">
                                <div class="cart-additives__item__name">
                                    Сырный соус
                                </div>
                                <div class="cart-additives__item__price">
                                    20 ₽
                                </div>
                            </div>


                        </div>

                        <div class="cart-additives__item">
                            <div class="cart-additives__item__img">
                                <img src="/images/additives/cheese-sauce.png" alt="" class="cart-additives__item__img-img">
                            </div>

                            <div class="cart-additives__item__name-price">
                                <div class="cart-additives__item__name">
                                    Сырный соус
                                </div>
                                <div class="cart-additives__item__price">
                                    20 ₽
                                </div>
                            </div>


                        </div>

                        <div class="cart-additives__item">
                            <div class="cart-additives__item__img">
                                <img src="/images/additives/cheese-sauce.png" alt="" class="cart-additives__item__img-img">
                            </div>

                            <div class="cart-additives__item__name-price">
                                <div class="cart-additives__item__name">
                                    Сырный соус
                                </div>
                                <div class="cart-additives__item__price">
                                    20 ₽
                                </div>
                            </div>


                        </div>

                        <div class="cart-additives__item">
                            <div class="cart-additives__item__img">
                                <img src="/images/additives/cheese-sauce.png" alt="" class="cart-additives__item__img-img">
                            </div>

                            <div class="cart-additives__item__name-price">
                                <div class="cart-additives__item__name">
                                    Сырный соус
                                </div>
                                <div class="cart-additives__item__price">
                                    20 ₽
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>

        </div>

        <RecomendSlider heading="Мы рекомендуем"/>
        <PopularSlider heading="Популярные"/>

        <div class="container">
            <div class="cart__total__inner">
                <div class="cart__total-price">
                    Сумма заказа <span class="span-orange">{{cartTotalCost}} ₽</span>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="cart__btns__inner">
                <router-link class="cart-btn home-btn-gray mob-hide" to="/">
                    <img src="/images/btns/arrow-back-black.png" alt="" class="cart-btn__arrow">
                    Вернуться в меню
                </router-link>


                <div v-if="!this.CART.length" class="cart-btn locked-btn">
                    Оформить заказ
                    <img src="/images/btns/arrow-next-white.png" alt="" class="cart-btn__arrow">
                </div>


                <router-link v-else class="cart-btn make-order-btn" to="order">
                    Оформить заказ
                    <img src="/images/btns/arrow-next-white.png" alt="" class="cart-btn__arrow">
                </router-link>
            </div>
        </div>

        <MainFooter/>

    </div>
</template>

<script>
import HeaderCart from '../components/HeaderCart.vue'
import RecomendSlider from '../components/RecomendSlider.vue'
import MainFooter from '../components/MainFooter.vue'
import PopularSlider from '../components/PopularSlider.vue'

import {mapGetters,mapActions} from 'vuex'
import axios from "axios";

export default {
    name: 'Cart',
    components: {
        HeaderCart,
        RecomendSlider,
        MainFooter,
        PopularSlider

    },
    data: () => ({
        sauces: [],
        sauce: {},
    }),

    mounted() {

        $(document).ready(function(){
            $('.popular-slider').slick({
                slidesToShow: 4,
                variableWidth: true,
                // dots: true,
                // appendDots: $('.slick-slider-dots'),
                // arrows: false,
                infinite: true,
                speed: 700,
                // autoplay: true,
                autoplaySpeed: 3000,
                prevArrow: $('.popular-slider__arrow.left-arrow'),
                nextArrow: $('.popular-slider__arrow.right-arrow'),
                responsive: [
                    {
                        breakpoint: 375,
                        settings: {
                            dots: false,
                            arrows: false
                        }
                    },
                ],
            });

        });

        this.loadSauces();
    },
    computed: {
        ...mapGetters([
            'CART',
        ]),
        cartTotalCost() {
            let result = []

            if (this.CART.length) {
                for (let item of this.CART) {
                    result.push(item.price * item.quantity)
                }

                result = result.reduce(function (sum, el) {
                    return sum + el;
                })
                return result;
            } else {
                return 0;
            }
        },
        // cartItemTotal(item){
        //     return item.price*item.quantity;
        // }
    },
    methods: {
        ...mapActions([
            'DELETE_FROM_CART',
            'INCREMENT_CART_ITEM',
            'DECREMENT_CART_ITEM',
            'ADD_TO_CART'
        ]),
        incrementItem(index) {
            this.INCREMENT_CART_ITEM(index)
        },
        decrementItem(index) {
            this.DECREMENT_CART_ITEM(index)
        },
        deleteFromCart: function(id, event){
            event.preventDefault();
            event.stopPropagation();
            this.DELETE_FROM_CART(id);
        },

        loadSauces(){
            axios.get('api/get-sauces')
                .then(res => {

                    this.sauces = res.data;


                    console.log(this.sauces);
                })
        },
        addToCart(data){
            this.$set(data, 'quantity', 1)

            this.sauce.name = data.name;
            this.sauce.price = Number(data.price);
            this.sauce.img = data.img;
            this.sauce.quantity = data.quantity;
            this.ADD_TO_CART(this.sauce);

        },
    },
}
</script>

<style>
    .cart-item__desc__ingradient{
        display: inline;
    }
    .cart-item__desc__ingradient::after{
        content: ',';
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 12px;
        line-height: 110%;
        /* or 11px */
        color: #B0B0B0;
    }
    .cart-item__desc__ingradient:last-child::after{
        display: none;
    }
</style>

<style>
    .cart-item__delete-btn svg path{
        stroke: inherit;
        stroke-width: inherit;
        fill: inherit;
    }


    .cart-item__delete-btn svg {
        fill: #343435;
        height: 16px;
    }

    .cart-item__delete-btn:hover svg {
        height: 20px;
    }

    .cart-item__delete-btn:hover {
        /* stroke: #EB5C27; */
        fill: #EB5C27;
    }
    .cart-item__delete-btn svg:hover{
        /* stroke: #EB5C27; */
        fill: #EB5C27;
    }
    .cart-item__delete-btn{
        cursor: pointer;
    }
</style>

<style>
    .cart-title{
        padding-top: 60px;
        margin-bottom: 60px;

        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 36px;
        line-height: 125%;
        /* identical to box height, or 45px */
        color: #343435;
    }
</style>

<style>
    .cart__total__inner{
        display: flex;
        justify-content: flex-end;

        padding-top: 60px;
        margin-bottom: 40px;
    }
    .cart__total-price{
        margin-right: 35px;

        font-family: Open Sans;
        font-style: normal;
        font-weight: 600;
        font-size: 24px;
        line-height: 125%;
        /* identical to box height, or 30px */
        color: #343435;
    }

</style>

<style>
    .cart-is-empty{
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 20px;
    }
    .cart-is-empty__img{
        width: 285px;
        height: 285px;

        display: block;
        margin-bottom: 20px;
    }
    .cart-is-empty__text{
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 170%;
        /* identical to box height, or 31px */
        text-align: center;
        color: #343435;
    }
</style>

<style>
    /* btns */
    .cart__btns__inner{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 60px;
    }
    .cart-btn{
        width: 246px;
        height: 60px;
        background: #F3F3F3;
        border-radius: 20px;

        padding: 20px;

        display: flex;
        justify-content: space-between;
        align-items: center;

        font-family: Open Sans;
        font-style: normal;
        font-weight: 600;
        font-size: 18px;
        line-height: 125%;
        /* identical to box height, or 22px */
        color: #343435;
        cursor: pointer;
    }
    .cart-btn.locked-btn{
        color: #FFFFFF;
        cursor: default;
    }
    .cart-btn.make-order-btn{
        color: #FFFFFF;
        background: #EB5C27;
        cursor: pointer;
    }
</style>



<style>
    /* cart */

    .cart-list{
        width: 792px;
        margin: 0 auto;
        border-bottom: 1px solid #E2E2E2;

        margin-bottom: 60px;
    }

    .cart-item{
        width: 100%;
        padding-top: 15px;
        margin-bottom: 15px;

        display: flex;
        align-items: center;

        border-top: 1px solid #E2E2E2;
    }

    /* .cart-item:last-child{
        border-bottom: 1px solid #E2E2E2;
    } */

    .cart-item__img,
    .cart-item__img-img{
        width: 87px;
        height: 87px;
    }
    .cart-item__img{
        margin-right: 20px;
    }
    .cart-item__img-img{
        display: block;
    }

    .cart-item__content{
        flex-grow: 1;
    }

    .cart-item__name{
        font-family: Open Sans;
        font-style: normal;
        font-weight: 600;
        font-size: 16px;
        line-height: 110%;
        /* identical to box height, or 18px */
        color: #343435;
        margin-bottom: 10px;
    }
    .cart-item__desc{
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 12px;
        line-height: 110%;
        /* or 13px */
        color: #B0B0B0;
        max-width: 350px;
    }

    .cart-item__quantity__inner{
        margin-right: 60px;
        display: flex;
        width: 100px;
        height: 28px;
        border-radius: 15px;
        background: #F7F6F6;
        font-family: Open Sans;
        font-style: normal;
        font-weight: 600;
        font-size: 16px;
        line-height: 110%;
        /* identical to box height, or 18px */
        color: #808080;
    }

    .cart-item__quantity{
        width: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .cart-item__quantity__decrement,
    .cart-item__quantity__increment{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 30px;
        cursor: pointer;
    }



    .cart-item__price{
        font-family: Open Sans;
        font-style: normal;
        font-weight: 600;
        font-size: 16px;
        line-height: 110%;
        /* identical to box height, or 18px */
        color: #343435;
        margin-right: 69px;
    }
</style>


<style>
    /* cart-additives */
    .cart-additives__title{
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 24px;
        line-height: 125%;
        /* identical to box height, or 30px */
        color: #343435;

        margin-bottom: 40px;
    }

    .cart-additives__list{
        display: flex;
        flex-wrap: wrap;
    }

    .cart-additives__item{
        width: 120px;
        height: 160px;
        border: 1px solid #E2E2E2;
        box-sizing: border-box;
        border-radius: 15px;

        display: flex;
        flex-direction: column;
        align-items: center;

        margin-right: 20px;
    }

    .cart-additives__item__img{
        flex-grow: 1;
        width: 100%;
        padding: 20px 20px 15px;

        display: flex;
        justify-content: center;
        align-items: center;
    }

    .cart-additives__item__img-img{
        display: block;
        width: 50px;
        height: 50px;
    }

    .cart-additives__item__name{
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 12px;
        line-height: 125%;
        /* identical to box height, or 15px */
        color: #343435;

        display: flex;
        justify-content: center;
        align-items: center;

        margin-bottom: 20px;
    }

    .cart-additives__item__price{
        width: 70px;
        height: 30px;
        background: rgba(235, 92, 39, 0.1);
        border-radius: 17px;

        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 125%;
        /* identical to box height, or 17px */
        color: #FF6900;

        display: flex;
        justify-content: center;
        align-items: center;

        margin-bottom: 10px;
        cursor: pointer;
    }
</style>

<style>
    .cart .popular {
        display: none;
    }

    .cart-item--mob{
        display: none;
    }
</style>

<style>
@media(max-width: 830px) {
    .cart-list{
        width: 100%;
    }
}
@media(max-width: 767px) {
    .cart .recomend{
        display: none;
    }

    .cart .popular{
        display: block;
    }



    .cart .cart-title{
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 24px;
        line-height: 125%;
        color: #343435;
        text-align: center;
        padding-top: 20px;
        margin-bottom: 20px;
    }

    .cart__inner .cart-is-empty__img{
        width: 160px;
        height: 160px;
    }
    .cart__inner .cart-is-empty__text{
        font-size: 15px;
        line-height: 140%;
        padding: 0 61px;
    }

    .cart .popular {
        display: block;
    }

    /*.popular-slider__arrow{*/
    /*    display: none !important;*/
    /*}*/



    .cart__btns__inner .mob-hide{
        display: none;
    }

    .cart-btn.locked-btn{
        width: 100%;
        font-family: Montserrat;
        font-style: normal;
        font-weight: 500;
        font-size: 18px;
        line-height: 125%;
        color: #D1D1D1;
        text-align: center;
        justify-content: center;
        margin-right: 15px;
    }
    .cart-btn.locked-btn .cart-btn__arrow{
        display: none;
    }

    .cart__total__inner{
        margin-bottom: 60px;
    }
    .cart__total-price{
        margin: 0 auto;
    }

    .cart .popular .h-heading{
        font-weight: 600;
    }
}
    @media(max-width: 375px) {
        .cart .recomend{
            display: none;
        }

        .cart .popular{
            display: block;
        }



        .cart .cart-title{
            font-family: Open Sans;
            font-style: normal;
            font-weight: normal;
            font-size: 24px;
            line-height: 125%;
            color: #343435;
            text-align: center;
            padding-top: 20px;
            margin-bottom: 20px;
        }

        .cart__inner .cart-is-empty__img{
            width: 160px;
            height: 160px;
        }
        .cart__inner .cart-is-empty__text{
            font-size: 15px;
            line-height: 140%;
            padding: 0 61px;
        }

        .cart .popular {
            display: block;
        }

        /*.popular-slider__arrow{*/
        /*    display: none !important;*/
        /*}*/



        .cart__btns__inner .mob-hide{
            display: none;
        }

        .cart-btn.locked-btn{
            width: 100%;
            font-family: Montserrat;
            font-style: normal;
            font-weight: 500;
            font-size: 18px;
            line-height: 125%;
            color: #D1D1D1;
            text-align: center;
            justify-content: center;
            margin-right: 15px;
        }
        .cart-btn.locked-btn .cart-btn__arrow{
            display: none;
        }

        .cart__total__inner{
            margin-bottom: 60px;
        }
        .cart__total-price{
            margin: 0 auto;
        }

        .cart .popular .h-heading{
            font-weight: 600;
        }
    }


</style>


<style>
@media(max-width: 767px) {
    .cart-additives__list{
        flex-wrap: nowrap;
        overflow-x: scroll;
        -ms-overflow-style:none;
        scrollbar-width: 0;
    }
    .cart-additives__list::-webkit-scrollbar {
        display: none;
    }
    .cart-additives__item{
        flex-direction: row;
        width: 135px;
        height: 59px;
        padding: 7px 11px;
        align-items: center;
        margin-right: 15px;
    }
    .cart-additives__item__img{
        width: 45px;
        height: 45px;
    }
    .cart-additives__item__img-img{
        width: 45px;
        height: 45px;
    }
    .cart-additives__item__name-price{
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .cart-additives__item__name{
        font-size: 10px;
        line-height: 125%;
        margin-bottom: 5px;
        padding-top: 14px;
        white-space: nowrap;
    }
    .cart-additives__item__price{
        width: 41px;
        height: 17px;
        font-size: 10px;
        line-height: 125%;
    }

    .cart-additives__title{
        font-family: Open Sans;
        font-style: normal;
        font-weight: 600;
        font-size: 15px;
        line-height: 125%;
        /* identical to box height, or 19px */
        color: #343435;
    }



    .cart-btn.make-order-btn{
        width: 100%;
        margin-right: 15px;
        font-family: Montserrat;
        font-style: normal;
        font-weight: 500;
        font-size: 18px;
        line-height: 125%;
        color: #FFFFFF;
        text-align: center;
        justify-content: center;
    }
    .cart-btn.make-order-btn .cart-btn__arrow{
        display: none;
    }
}
    @media(max-width: 375px) {
        .cart-additives__list{
            flex-wrap: nowrap;
            overflow-x: scroll;
            -ms-overflow-style:none;
            scrollbar-width: 0;
        }
        .cart-additives__list::-webkit-scrollbar {
            display: none;
        }
        .cart-additives__item{
            flex-direction: row;
            width: 135px;
            height: 59px;
            padding: 7px 11px;
            align-items: center;
            margin-right: 15px;
        }
        .cart-additives__item__img{
            width: 45px;
            height: 45px;
        }
        .cart-additives__item__img-img{
            width: 45px;
            height: 45px;
        }
        .cart-additives__item__name-price{
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .cart-additives__item__name{
            font-size: 10px;
            line-height: 125%;
            margin-bottom: 5px;
            padding-top: 14px;
            white-space: nowrap;
        }
        .cart-additives__item__price{
            width: 41px;
            height: 17px;
            font-size: 10px;
            line-height: 125%;
        }

        .cart-additives__title{
            font-family: Open Sans;
            font-style: normal;
            font-weight: 600;
            font-size: 15px;
            line-height: 125%;
            /* identical to box height, or 19px */
            color: #343435;
        }



        .cart-btn.make-order-btn{
            width: 100%;
            margin-right: 15px;
            font-family: Montserrat;
            font-style: normal;
            font-weight: 500;
            font-size: 18px;
            line-height: 125%;
            color: #FFFFFF;
            text-align: center;
            justify-content: center;
        }
        .cart-btn.make-order-btn .cart-btn__arrow{
            display: none;
        }
    }
</style>


<style>
@media(max-width: 767px) {
    .cart-item{
        display: none;
    }

    .cart-list{
        width: 100%;
        border-bottom: none;
        margin-bottom: 20px;
    }
    .cart-item--mob{
        display: flex;
        width: 100%;
        align-items: flex-start;
    }
    .cart-item__desc{
        margin-bottom: 10px;
    }
    .cart-item__quantity-price__wrapper{
        display: flex;
        align-items: flex-end;
    }
    .cart-item__quantity__inner{
        width: 70px;
        height: 22px;
    }
    .cart-item__price{
        white-space: nowrap;
        margin-right: 0;
    }
    .cart-item__delete-btn{
        margin-left: 42px;
    }
    .cart-item__img{
        width: 80px;
        height: 80px;
        margin-right: 10px;
    }
    .cart-item__img-img{
        width: 80px;
        height: 80px;
    }
    .cart-item--mob__content{
        padding-bottom: 20px;
        flex-grow: 1;
    }
    .cart-item__delete-btn{
        align-self: center;
        padding-bottom: 20px;
        margin-right: 15px;
    }
    .cart-item--mob__content-block{
        min-height: 100px;
        display: flex;
        border-bottom: 1px solid #EBEDF3;
        width: 100%;
    }




    .cart .container{
        padding: 0 0 0 15px;
    }
}
    @media(max-width: 375px) {
        .cart-item{
            display: none;
        }

        .cart-list{
            width: 100%;
            border-bottom: none;
            margin-bottom: 20px;
        }
        .cart-item--mob{
            display: flex;
            width: 100%;
            align-items: flex-start;
        }
        .cart-item__desc{
            margin-bottom: 10px;
        }
        .cart-item__quantity-price__wrapper{
            display: flex;
            align-items: flex-end;
        }
        .cart-item__quantity__inner{
            width: 70px;
            height: 22px;
        }
        .cart-item__price{
            white-space: nowrap;
            margin-right: 0;
        }
        .cart-item__delete-btn{
            margin-left: 42px;
        }
        .cart-item__img{
            width: 80px;
            height: 80px;
            margin-right: 10px;
        }
        .cart-item__img-img{
            width: 80px;
            height: 80px;
        }
        .cart-item--mob__content{
            padding-bottom: 20px;
            flex-grow: 1;
        }
        .cart-item__delete-btn{
            align-self: center;
            padding-bottom: 20px;
            margin-right: 15px;
        }
        .cart-item--mob__content-block{
            min-height: 100px;
            display: flex;
            border-bottom: 1px solid #EBEDF3;
            width: 100%;
        }




        .cart .container{
            padding: 0 0 0 15px;
        }
    }
</style>


