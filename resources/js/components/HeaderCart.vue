<template>

        <div class="header__cart">
            <div class="container">
                <div class="header__cart__inner">

                    <router-link class="back-arrow--mob" to="/">
                        <img src="/images/pp_back-arrow--mob.svg" alt="" class="back-arrow__img">
                    </router-link>


                    <div class="header__cart__main-wrapper">
                        <div class="header__cart-block">
                            <router-link to="/" class="logo">
                                <img src="/images/logo.png" alt="logo">
                            </router-link>
                        </div>

                        <div class="header__cart-block h-block2">
                            <span>Доставка пиццы</span>
                            <span class="span-orange">№1 в Донецке</span>
                        </div>

                        <div class="free-delivery">
                            <img src="/images/delivery.svg" alt="">
                            <p>При заказе от <span>500 р.</span> доставка бесплатная</p>
                        </div>
                    </div>

                    <div class="order-steps">
                        <img :src="'/images/step-'+step+'.png'" alt="">
                    </div>
                </div>
            </div>
        </div>

</template>

<script>


export default {
  name: 'header__cartCart',
  props: {
      step: Number,
  }
}
</script>

<style>
    .header__cart{
        border-bottom: 1px solid #C4C4C4;
    }
    .header__cart__inner{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .header__cart__main-wrapper{
        display: flex;
        align-items: center;
    }

    .header__cart-block{
        margin-right: 30px;
    }
    .header__cart-block.h-block2{
        margin-right: 40px;
    }
    .free-delivery{
        width: 271px;
        height: 40px;
        background: #F5C518;
        border-radius: 19px;

        display: flex;
        justify-content: space-between;
        align-items: center;

        font-family: Open Sans;
        font-style: normal;
        font-weight: 600;
        font-size: 10px;
        line-height: 125%;
        color: #343435;

        padding: 10px;
    }
    .free-delivery span{
        font-weight: 700;
    }
</style>

<style>
    .header__cart{
        padding-top: 20px;
    }
    .header__cart__inner{
        display: flex;
        align-items: center;
    }
    .header__cart-block{
        display: flex;
        flex-direction: column;

        font-family: Montserrat;
        font-style: normal;
        font-weight: 500;
        font-size: 16px;
        line-height: 125%;
        /* or 20px */


        color: #343435;
    }

    .header__cart-block span{
        font-family: Montserrat;
        font-style: normal;
        font-weight: 500;
        font-size: 16px;
        line-height: 125%;
        /* or 20px */


        color: #343435;
    }
    span.span-orange,
    .span-orange{
        color: #EB5C27;
    }

</style>

<style>
.back-arrow--mob{
    display: none;
    width: 55px;
    height: 55px;
    border-radius: 50%;

    display: flex;
    justify-content: center;
    align-items: center;

    background: #FFFFFF;
    box-shadow: 0px 4px 22px rgba(0, 0, 0, 0.15);


}
</style>

<style>
@media(max-width: 1000px) {
    .back-arrow--mob{
        display: flex;
    }

    .header__cart__inner .order-steps{
        display: none;
    }

    .header__cart{
        border-bottom: none;
    }
    .header__cart__inner{
        padding-right: 15px;
    }

}
@media(max-width: 767px) {
    .back-arrow--mob{
        display: flex;
    }

    .header__cart__inner .order-steps{
        display: none;
    }

    .header__cart{
        border-bottom: none;
    }
    .header__cart__inner{
        padding-right: 15px;
    }

}
@media(max-width: 630px) {
    .back-arrow--mob{
        display: flex;
    }
    .header__cart__main-wrapper .header__cart-block,
    .header__cart__inner .order-steps{
        display: none;
    }

    .header__cart{
        border-bottom: none;
    }
    .header__cart__inner{
        padding-right: 15px;
    }

}
    @media(max-width: 375px) {
        .back-arrow--mob{
            display: flex;
        }
        .header__cart__main-wrapper .header__cart-block,
        .header__cart__inner .order-steps{
            display: none;
        }

        .header__cart{
            border-bottom: none;
        }
        .header__cart__inner{
            padding-right: 15px;
        }

    }
</style>




