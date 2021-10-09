<template>
    <div class="order-success">
        <HeaderCart :step="3" />

        <div class="container">
            <div class="order-success__inner">
                <div class="order-success__title">
                    Заказ принят!
                </div>
                <div class="order-success__img">
                    <img src="/images/order-success.png" alt="" class="order-success__img-img">
                </div>
                <div class="order-success__text">
                    В ближайшее время с Вами свяжется наш представитель
                </div>

                <router-link class="cart-btn back-btn mb60" to="/">
                    Назад в меню
                    <img src="/images/btns/arrow-next-white.png" alt="" class="cart-btn__arrow">
                </router-link>
            </div>



        </div>

        <MainFooter/>

    </div>
</template>

<script>
import HeaderCart from '../components/HeaderCart.vue'
import MainFooter from '../components/MainFooter.vue'

export default {
  name: 'Cart',
  components: {
      HeaderCart,
      MainFooter,

  }
}
</script>

<style>
    .order-success__inner{
        display: flex;
        flex-direction: column;
        align-items: center;

        padding-top: 60px;
    }
    .order-success__title{
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 36px;
        line-height: 125%;
        /* identical to box height, or 45px */

        text-align: center;

        color: #343435;
        margin-bottom: 40px;
    }
    .order-success__img,
    .order-success__img-img{
        width: 638px;
        height: 577px;
    }
    .order-success__img{
        margin-bottom: 40px;
    }
    .order-success__text{
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 24px;
        line-height: 125%;
        /* identical to box height, or 30px */

        text-align: center;

        color: #343435;
        margin-bottom: 60px;
    }
</style>

<style scoped>
    .mb60{
        margin-bottom: 60px;

        flex-direction: row-reverse;

        color: #FFFFFF;
        background: #EB5C27;
        cursor: pointer;
    }
    .mb60 img{
        transform: rotate(180deg);
    }
</style>


<style>
@media(max-width: 767px) {
    .order-success .cart-btn.back-btn.mb60{
        max-width: 300px;
    }
    .order-success .header__cart__inner{
        padding-right: 0;
    }
    .order-success__title{
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 24px;
        line-height: 125%;
        color: #343435;
    }
    .order-success__img,
    .order-success__img-img{
        width: 265px;
        height: 240px;
    }
    .order-success__text{
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 15px;
        line-height: 125%;
        text-align: center;
        color: #343435;
    }

    .order-success .cart-btn.back-btn.mb60 {
        justify-content: center;
        width: 100%;
        background: #FF6900;
    }
    .order-success .cart-btn.back-btn.mb60 .cart-btn__arrow{
        display: none;
    }
}
    @media(max-width: 375px) {
        .order-success .header__cart__inner{
            padding-right: 0;
        }
        .order-success__title{
            font-family: Open Sans;
            font-style: normal;
            font-weight: normal;
            font-size: 24px;
            line-height: 125%;
            color: #343435;
        }
        .order-success__img,
        .order-success__img-img{
            width: 265px;
            height: 240px;
        }
        .order-success__text{
            font-family: Open Sans;
            font-style: normal;
            font-weight: normal;
            font-size: 15px;
            line-height: 125%;
            text-align: center;
            color: #343435;
        }

        .order-success .cart-btn.back-btn.mb60 {
            justify-content: center;
            width: 100%;
            background: #FF6900;
        }
        .order-success .cart-btn.back-btn.mb60 .cart-btn__arrow{
            display: none;
        }
    }
</style>




