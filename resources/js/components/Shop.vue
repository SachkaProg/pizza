<template>
    <div class="shop" id="shop">
        <div class="container">
            <h3 class="h-heading">
                {{heading}}
            </h3>

            <div class="pizza new__inner">

                <GoodsItem v-for="good in goods" :key="good.id" :item_data="good"  />


            </div>
        </div>
    </div>
</template>

<script>
import GoodsItem from './GoodsItem.vue'
import axios from "axios";

export default {
    name: "Shop",
    components: {
        GoodsItem,
    },
    props: {
        heading: String,
    },
    data: () => ({
        goods: [],
        subject: '',
    }),
    mounted() {
        this.loadGoods()
    },
    methods: {

        loadGoods() {
            this.subject = this.heading;
            let formData = new FormData();
            formData.append('subject', this.subject);
            // axios.get('api/get-goods')
            //     .then(res => {
            //         console.log(this.goods);
            //         this.goods = res.data;
            //         console.log(res.data);
            //         console.log(this.goods);
            //
            //         // this.pizzas.forEach((el) => {
            //         //     el.composition = JSON.parse(el.composition);
            //         //     el.possibleAds = JSON.parse(el.possibleAds);
            //         //     el.created_at = this.getDate(+Date.parse(el.created_at));
            //         //     el.created_date = new Date(+Date.parse(el.created_at));
            //         // });
            //
            //         console.log(this.goods);
            //     })

            //
            for (var value of formData.values()) {
                console.log(value);
            }
            axios.post('api/get-goods', formData, {
                headers: {
                    "Content-type": "multi-part/form-data"
                    // "Content-type": "application/json"
                }
            })
                .then(res => {
                    console.log(res.data);
                    this.goods = res.data;
                })
        },
    }
}
</script>

<style>
    @media(max-width: 767px) {
        .shop .h-heading{
            display: none;
        }
    }
    @media(max-width: 375px) {
        .shop .h-heading{
            display: none;
        }
    }
</style>
