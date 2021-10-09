<template>


    <div class="pizza-item" @click="pizzaInfo()">
        <div class="pizza-item__img">
            <img :src="item_data.img" alt="" class="pizza-item__img-img">
            <div class="pizza-item__discount--new discount">-70%</div>
            <div class="pizza-item__discount--new new">NEW</div>
        </div>
        <div class="pizza-item__content-inner">
            <div class="pizza-item__name-desc">
                <div class="pizza-item__name">
                    {{item_data.name}}
                </div>
                <div class="pizza-item__desc">
                    <div v-for="(item,index) in item_data.composition" :key="index" class="pizza-item__desc__ingradient">
                        {{item.ingradient}}
                    </div>
                </div>
            </div>

            <div class="pizza-item__price-order">
                <div class="pizza-item__price">
                    от {{item_data.price}} ₽
                </div>
                <div class="pizza-item__order">
                    Заказать
                </div>
            </div>
        </div>

    </div>


</template>

<script>



export default {
    name: 'PizzaItem',
    methods: {
        pizzaInfo(){
            this.$emit('pizzaInfo');
        }
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
    .pizza-item__discount--new{
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
    .pizza-item__discount--new.discount{
        background: linear-gradient(180deg, #C060E1 0%, #B537E2 100%);
    }
    .pizza-item__discount--new.new{
        background: linear-gradient(180deg, #FA5656 0%, #F90606 100%);
    }
</style>

<style>
    .pizza-item{
        width: 200px;
        display: flex;
        flex-direction: column;

        margin-bottom: 40px;
        margin-right: 62px;
    }
    .pizza-item:nth-child(4n+4){
        margin-right: 0;
    }


    .pizza-item:hover .pizza-item__img{
        margin-bottom: 5px;
    }


    .pizza-item__img,
    .pizza-item__img-img{
        width: 200px;
        height: 200px;
    }
    .pizza-item__img{
        margin-bottom: 15px;

        position: relative;
    }
    .pizza-item__name{
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
    .pizza-item__desc{
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

    .pizza-item__price-order{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .pizza-item__price{
        max-width: 60%;
        font-family: Open Sans;
        font-style: normal;
        font-weight: 600;
        font-size: 16px;
        line-height: 110%;
        /* identical to box height, or 18px */


        color: #343435;
    }
    .pizza-item__order{
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

    .pizza-item__order:hover{
        background: rgba(235, 92, 39, 0.34);
        border-radius: 17px;
    }
    /* .pizza-item__order:focus{
        background: rgba(235, 92, 39, 0.1);
    } */
</style>



