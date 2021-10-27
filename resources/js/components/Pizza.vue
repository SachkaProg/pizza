<template>
    <div class="pizza">
        <div class="container">
            <h3 class="h-heading">
                Пицца
            </h3>
            <div class="pizza new__inner">

                <PizzaItem v-for="pizza in pizzas" :key="pizza.id" :item_data="pizza" @pizzaInfo="pizzaInfo(pizza)" />


            </div>
        </div>
    </div>

</template>

<script>
import PizzaItem from './PizzaItem.vue'


export default {
    name: 'Pizza',
    components: {
        PizzaItem
    },

    data: () => ({
        pizzas: [],

    }),

    mounted() {
        this.loadPizza()
    },

    methods: {

        loadPizza(){
            axios.get('api/get-pizza')
            .then(res => {
                console.log(this.pizzas);
                this.pizzas = res.data;
                console.log(res.data);
                console.log(this.pizzas);

                    this.pizzas.forEach((el)=>{
                        el.composition = JSON.parse(el.composition);
                        el.possibleAds = JSON.parse(el.possibleAds);
                        el.components = JSON.parse(el.components);
                        console.log("FASFASFASFASFASFAS");
                        console.log(el.components);
                        el.created_at = this.getDate(+Date.parse(el.created_at));
                        el.created_date = new Date(+Date.parse(el.created_at));
                    });

                console.log(this.pizzas);
            })
        },

        getDate(arg){
            let date = new Date(arg);
            let dd = date.getDate();
            if (dd < 10) dd = '0' + dd;
            let mm = date.getMonth() + 1;
            if (mm < 10) mm = '0' + mm;
            let yy = date.getFullYear() % 100;
            if (yy < 10) yy = '0' + yy;
            return dd + '.' + mm + '.' + yy;
        },

        pizzaInfo(item){
            this.$emit('pizzaInfo', item);
        }


    }

}
</script>

<style>
    .new__inner{
        display: flex;
        /* justify-content: space-between; */
        flex-wrap: wrap;
    }
</style>

<style>
    @media(max-width: 767px){
        .pizza-item{
            margin-right: 20px;
        }
    }
    @media(max-width: 375px) {
        .pizza-item__content-inner{
            width: 100%;
        }
        .h-heading{
            font-size: 15px;
        }
        .pizza .h-heading{
            display: none;
        }
        .pizza{
            margin-bottom: 20px;
        }
        .pizza-item{
            flex-direction: row;
            width: 315px;
            margin-right: 0;
            padding-top: 20px;
            margin-bottom: 0;
        }
        .pizza-item__img{
            height: 100px;
            margin-bottom: 0;
        }
        .pizza-item__img-img{
            width: 100px;
            height: 100px;
            margin-right: 14px;
        }
        .pizza-item__discount--new{
            width: 40px;
            height: 18px;
            font-size: 10px;
            line-height: 125%;
            top: 10px;
            right: 14px;
        }
        .pizza-item__name-desc{
            display: flex;
            flex-direction: column;
        }
        .pizza-item__price-order{
            align-items: flex-end;
        }

    }
</style>



