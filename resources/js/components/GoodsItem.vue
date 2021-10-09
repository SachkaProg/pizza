<template>


    <div class="good-item">
        <div class="good-item__img">
            <img :src="item_data.img" alt="" class="good-item__img-img">
            <div class="good-item__discount--new discount">-70%</div>
            <div class="good-item__discount--new new">NEW</div>
        </div>
        <div class="good-item__content-inner">
            <div class="good-item__name-desc">
                <div class="good-item__name">
                    {{item_data.name}}
                </div>
                <div class="good-item__desc">
                    <div v-for="(item,index) in item_data.composition" :key="index" class="good-item__desc__ingradient">
                        {{item.ingradient}}
                    </div>
                </div>
            </div>

            <div class="good-item__price-order">
                <div class="good-item__price">
                    от {{item_data.price}} ₽
                </div>
                <div class="good-item__order" @click="addToCart">
                    Заказать
                </div>
            </div>
        </div>

    </div>


</template>

<script>

import {mapActions} from 'vuex'

export default {
    name: 'goodItem',
    data: () => ({
        cartItem: {},
    }),
    mounted(){
        this.$set(this.item_data, 'quantity', 1)
    },
    methods: {
        // goodInfo(){
        //     this.$emit('goodInfo');
        // },

        addToCart(){
            this.ADD_TO_CART(this.item_data);
        },
        ...mapActions([
            'ADD_TO_CART'
        ]),
    },
    props: {
        item_data: {
            type: Object,
            default() {
                return {}
            }
        },
    }
}
</script>

<style>
    .good-item__discount--new{
        width: 70px;
        height: 30px;
        background: linear-gradient(180deg, #C060E1 0%, #B537E2 100%);
        border-radius: 17px;

        display: flex;
        justify-content: center;
        align-items: center;

        position: absolute;
        right: 0;
        top: 20px;

        font-family: Open Sans;
        font-style: normal;
        font-weight: 600;
        font-size: 16px;
        line-height: 125%;
        /* identical to box height, or 20px */
        color: #FFFFFF;
    }
    .good-item__discount--new.discount{
        background: linear-gradient(180deg, #C060E1 0%, #B537E2 100%);
    }
    .good-item__discount--new.new{
        background: linear-gradient(180deg, #FA5656 0%, #F90606 100%);
    }
</style>

<style>
    .good-item{
        width: 200px;
        display: flex;
        flex-direction: column;

        margin-bottom: 40px;
        margin-right: 62px;
    }
    .good-item:nth-child(4n+4){
        margin-right: 0;
    }


    .good-item:hover .good-item__img{
        margin-bottom: 5px;
    }


    .good-item__img,
    .good-item__img-img{
        width: 200px;
        height: 200px;
    }
    .good-item__img{
        margin-bottom: 15px;

        position: relative;
    }
    .good-item__name{
        width: 100%;
        margin-bottom: 10px;

        font-family: Open Sans;
        font-style: normal;
        font-weight: bold;
        font-size: 16px;
        line-height: 110%;
        /* identical to box height, or 18px */


        color: #343435;
    }
    .good-item__desc{
        width: 100%;
        margin-bottom: 24px;

        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 10px;
        line-height: 110%;
        /* or 11px */


        color: #B0B0B0;
    }

    .good-item__price-order{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .good-item__price{
        max-width: 60%;
        font-family: Open Sans;
        font-style: normal;
        font-weight: 600;
        font-size: 16px;
        line-height: 110%;
        /* identical to box height, or 18px */


        color: #343435;
    }
    .good-item__order{
        width: 85px;
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;

        background: rgba(235, 92, 39, 0.1);
        border-radius: 17px;

        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 125%;
        /* identical to box height, or 17px */

        cursor: pointer;
        color: #FF6900;
    }

    .good-item__order:hover{
        background: rgba(235, 92, 39, 0.34);
        border-radius: 17px;
    }
    /* .good-item__order:focus{
        background: rgba(235, 92, 39, 0.1);
    } */
</style>

<style>
@media(max-width: 767px) {
    .good-item{
        margin-right: 20px;
    }
}
@media(max-width: 375px) {
    .good-item__content-inner{
        width: 100%;
    }
    .h-heading{
        font-size: 15px;
    }
    .good .h-heading{
        display: none;
    }
    .good{
        margin-bottom: 20px;
    }
    .good-item{
        flex-direction: row;
        width: 315px;
        margin-right: 0;
        padding-top: 20px;
        margin-bottom: 0;
    }
    .good-item__img{
        height: 100px;
        margin-bottom: 0;
    }
    .good-item__img-img{
        width: 100px;
        height: 100px;
        margin-right: 14px;
    }
    .good-item__discount--new{
        width: 40px;
        height: 18px;
        font-size: 10px;
        line-height: 125%;
        top: 10px;
        right: 14px;
    }
    .good-item__name-desc{
        display: flex;
        flex-direction: column;
    }
    .good-item__price-order{
        align-items: flex-end;
    }

}
</style>


