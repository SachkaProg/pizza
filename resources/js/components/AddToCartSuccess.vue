<template>
    <div class="add-to-cart__success">
        <div class="add-to-cart__success__inner">
            <img src="/images/add-to-cart__success.png" alt="" class="add-to-cart__success__img">
            <div class="add-to-cart__success__text">
                Товар в корзине!
            </div>
        </div>
    </div>

</template>

<script>



export default {
  name: 'AddToCartSuccess',


}
</script>

<style>
    .add-to-cart__success{
        width: 410px;
        height: 139px;
        background: #FFFFFF;
        border-radius: 20px;

        position: fixed;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        margin: auto;

        z-index: 30;

        display: none;
    }
    .add-to-cart__success__inner{
        width: 410px;
        height: 139px;
        background: #FFFFFF;
        border-radius: 20px;



        display: flex;
        align-items: center;
        justify-content: space-between;

        padding: 40px 52px;

    }
    .add-to-cart__success__img{
        width: 58px;
        height: 58px;
    }
    .add-to-cart__success__text{
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
    @media(max-width: 375px) {
        .add-to-cart__success{
            width: 259px;
            height: 80px;
        }
        .add-to-cart__success__inner{
            width: 259px;
            height: 80px;
            padding: 25px 27px;
        }
        .add-to-cart__success__img{
            width: 29px;
            height: 29px;
        }
        .add-to-cart__success__text{
            font-size: 18px;
        }
    }
</style>



