<template>
    <div class="pizza__pop-up">
        <img src="/images/pop-up__cross.png" alt="" class="pizza__pop-up__cross" @click="closePopUp">
        <div class="pizza__pop-up__back-arrow--mob" @click="closePopUp">
            <img src="/images/pp_back-arrow--mob.svg" alt="" class="pizza__pop-up__back-arrow__img">
        </div>
        <div class="pizza__pop-up__img">
            <img :src="pizza_data.img" alt="" class="pizza__pop-up__img-img">
        </div>
        <div class="pizza__pop-up__info">

            <div class="pizza__pop-up__name" >
                <div class="pizza__pop-up__name-text">
                    {{pizza_data.name}}
                </div>

                <div class="pizza__pop-up__price--mob">
                    {{itemTotalPrice}} ₽
                </div>
                <div class="pizza__pop-up__name__info">
                    <img src="/images/info-icon.png" alt="" class="pizza__pop-up__name__info-icon">
                    <div class="pizza__pop-up__info-nutritive__inner">
                        <img src="/images/triangle-black-info.png" alt="" class="pizza__pop-up__info-nutritive__triangle">
                        <div class="pizza__pop-up__info-nutritive__content">
                            <div class="pizza__pop-up__info-nutritive__content__title">
                                Пищевая ценность на 100 г
                            </div>
                            <div class="pizza__pop-up__info-nutritive__content__inner">
                                <div class="pizza__pop-up__info-nutritive__content__energy-value
                                pizza__pop-up__info-nutritive__content__block
                                ">
                                    <p>Энерг. ценность</p>
                                    <p>{{pizza_data.components && pizza_data.components.comp1}}</p>
                                </div>
                                <div class="pizza__pop-up__info-nutritive__content__proteins
                                pizza__pop-up__info-nutritive__content__block
                                ">
                                    <p>Белки</p>
                                    <p>{{pizza_data.components && pizza_data.components.comp2}}</p>
                                </div>
                                <div class="pizza__pop-up__info-nutritive__content__fats
                                pizza__pop-up__info-nutritive__content__block
                                ">
                                    <p>Жиры</p>
                                    <p>{{pizza_data.components && pizza_data.components.comp3}}</p>
                                </div>
                                <div class="pizza__pop-up__info-nutritive__content__carbonhydrates
                                pizza__pop-up__info-nutritive__content__block
                                ">
                                    <p>Углеводы</p>
                                    <p>{{pizza_data.components && pizza_data.components.comp4}}</p>
                                </div>
                                <div class="pizza__pop-up__info-nutritive__content__weight
                                pizza__pop-up__info-nutritive__content__block
                                ">
                                    <p>Вес</p>
                                    <p>{{pizza_data.components && pizza_data.components.comp5}}</p>
                                </div>
                                <div class="pizza__pop-up__info-nutritive__content__diameter
                                pizza__pop-up__info-nutritive__content__block
                                ">
                                    <p>Диаметр</p>
                                    <p>{{pizza_data.components && pizza_data.components.comp6}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pizza__pop-up__specifics">
                30 см, традиционное тесто, 450 г
            </div>

            <div class="pizza__pop-up__ingredients">
                <div v-for="(item,index) in pizza_data.composition" :key="index" class="pizza__pop-up__desc__ingradient">

                    <div v-if="item.nullable == '1'"  class="nullable">
                        {{item.ingradient}}

                        <img src="/images/delete-ingradient.svg" title="Удалить" alt="Удалить"
                        class="pizza__pop-up__delete-ingradient-btn" @click="deleteIngradient(item, $event)">
                        <img src="/images/return-ingradient.svg" title="Вернуть" alt="Вернуть"
                        class="pizza__pop-up__return-ingradient-btn" @click="returnIngradient(item, $event)">
                    </div>
                    <div v-else class="unnullable">{{item.ingradient}}</div>

                </div>
            </div>

            <div class="pizza__pop-up__add-ingradients">

                <p class="pizza__pop-up__add-ingradients__title">
                    Добавить в пиццу
                </p>




                <div class="pizza__pop-up__ingradients-list">


                    <IngradientsItem v-for="(item,index) in pizza_data.possibleAds" :key="index" :ingradient_name="item"
                    @addAddition="addAddition"
                    @removeAddition="removeAddition"
                    />


                </div>


            </div>


            <div class="pizza__pop-up__price-cart">
                <div class="pizza__pop-up__total-price">
                    {{itemTotalPrice}} ₽
                </div>
                <div class="pizza__pop-up__add-to-cart__btn" @click="addToCart">
                    Добавить в корзину
                    <div class="pizza__pop-up__add-to-cart__btn-quantity--cost--mob">
                        {{itemTotalPrice}} ₽
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>

import {mapActions} from 'vuex'

import IngradientsItem from './IngradientsItem.vue'

export default {
    name: 'PizzaPopUp',
    components: {
        IngradientsItem
    },
    props: {
        pizza_data: {
            type: Object,
            default() {
                return {}
            }
        },
    },
    data: () => ({
        cartItem: {
            name: '',
            price: 0,
            img: '',
            composition: [],
            comp: [],
            additions: [],
            deletedAdditives: [],
            quantity: 1,
        },


    }),
    computed: {
        itemTotalPrice(){
            let result = [];
            console.log(this.pizza_data);
            result.push(Number(this.pizza_data.price));

            if (this.cartItem.additions.length) {
                for (let item of this.cartItem.additions) {
                    result.push(Number(item.price * item.quantity))
                }
            }

            if (this.cartItem.deletedAdditives.length) {
                for (let item of this.cartItem.deletedAdditives) {
                    result.push(Number(-item.price))
                }
            }

            console.log(this.cartItem.additions);
            result = result.reduce(function (sum, el) {
                return sum + el;
            })
            return result;

            // if (this.CART.length) {
            //     for (let item of this.CART) {
            //         result.push(item.price * item.quantity)
            //     }

            //     result = result.reduce(function (sum, el) {
            //         return sum + el;
            //     })
            //     return result;
            // } else {
            //     return 0;
            // }
        }
    },
    // mounted() {
    //     setTimeout(function() {
    //         this.pizza_data.composition.forEach((el) => {
    //             this.$set(el, 'use', 1)
    //         });
    //         console.log(this.pizza_data);
    //     }, 5000);
    //     // this.pizza_data.composition.forEach((el) => {
    //     //     this.$set(el, 'use', 1)
    //     // });

    // },
    methods: {
        closePopUp(){
            $('.pizza__pop-up').hide();
            $('body').removeClass('open');
        },
        addToCart(){
            this.cartItem.name = this.pizza_data.name;
            this.cartItem.img = this.pizza_data.img;
            this.cartItem.price = this.itemTotalPrice;
            this.cartItem.composition = [];
            this.pizza_data.composition.forEach((el) => {
                if(el.use == true){
                    this.cartItem.composition.push(el.ingradient);
                }

            });

            this.ADD_TO_CART(this.cartItem);

            $('.pizza__pop-up').hide();
            $(".add-to-cart__success").show('slow');
            setTimeout(function() {
                $(".add-to-cart__success").hide('slow');
                $('body').removeClass('open');
            }, 2000);
        },
        deleteIngradient: function(item, event){
            event.target.style.display = "none";
            event.target.closest('.nullable').classList.toggle("null");
            event.target.closest('.nullable').querySelector('.pizza__pop-up__return-ingradient-btn').style.display = "block";


            this.cartItem.deletedAdditives.push(item);
            item.use = false;
            console.log(this.cartItem.deletedAdditives);
            // console.log(this.cartItem);
        },
        returnIngradient: function(item, event){
            event.target.style.display = "none";
            event.target.closest('.nullable').classList.toggle("null");
            event.target.closest('.nullable').querySelector('.pizza__pop-up__delete-ingradient-btn').style.display = "block";


            this.cartItem.deletedAdditives.splice(this.cartItem.deletedAdditives.indexOf(item),1);
            item.use = true;
            console.log(this.cartItem.deletedAdditives);
        },

        order(){
            this.cartItem.name = this.pizza_data.name;
            this.cartItem.img = this.pizza_data.img;
            this.cartItem.price = this.pizza_data.price;
            this.cartItem.composition = [];
            this.pizza_data.composition.forEach((el) => {
                if(el.use == true){
                    this.cartItem.composition.push(el.ingradient);
                }

            });
            // for(item in this.pizza_data.composition){
            //     this.cartItem.composition.push(item.ingradient)
            // }
            console.log(this.cartItem);
        },

        ...mapActions([
          'ADD_TO_CART'
        ]),


        addAddition(item){
            // this.cartItem.additions.push(item);


            let isProductExists = false;
            if (this.cartItem.additions.length) {
                this.cartItem.additions.map(function (el) {
                    if (el.name === item.name) {
                        isProductExists = true;
                        el.quantity++
                    }
                })
                if (!isProductExists) {
                    this.cartItem.additions.push(item);
                }
            } else {
                this.cartItem.additions.push(item);
            }

            console.log(this.cartItem.additions);
        },


        removeAddition: function(item, event){
            if(this.cartItem.additions[this.cartItem.additions.indexOf(item)].quantity > 1){
                this.cartItem.additions[this.cartItem.additions.indexOf(item)].quantity--;
            } else {
                this.cartItem.additions.splice(this.cartItem.additions.indexOf(item),1);
                event.target.parentElement.style.display = "none";
                event.target.parentElement.parentElement.querySelector('.pizza__pop-up__ingradients-item__price').style.display = "flex";
            }
        }




    }
}
</script>

<style>
    .nullable{
        display: inline-flex;
        align-items: center;

    }

    .nullable.null{
        text-decoration: line-through;
    }
    .unnullable{
        display: inline;
    }

    .pizza__pop-up__delete-ingradient-btn,
    .pizza__pop-up__return-ingradient-btn{
        margin-left: 5px;
        cursor: pointer;
    }
    .pizza__pop-up__return-ingradient-btn{
        display: none;
    }

</style>

<style>
    .pizza__pop-up__desc__ingradient{
        display: inline;
        margin-right: 5px;
    }

    .pizza__pop-up__desc__ingradient::after{
        content: ',';
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 125%;
        /* identical to box height, or 17px */
        color: #343435;
        margin-bottom: 30px;
    }
    .pizza__pop-up__desc__ingradient:last-child::after{
        display: none;
    }
</style>

<style>
    body:after{
        opacity: 0;
        content: "";
    }


    .pizza__pop-up__add-to-cart__btn-quantity--cost--mob{
        display: none;
    }
    body.open:after{
        content: "";
        background: rgba(0, 0, 0, 1);
        opacity: .3;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        position: fixed;
        transition: all 0.3s 0.3s;
        z-index: 25;
    }

</style>

<style>
    .pizza__pop-up__name__info-icon{
        width: 23px;
        height: 23px;
    }

    .pizza__pop-up__name__info{
        position: relative;
    }
    .pizza__pop-up__info-nutritive__inner{
        position: absolute;
        width: 269px;
        top: 10px;
        right: -44px;

        display: none;
        flex-direction: column;
        align-items: flex-end;
        z-index: 31;


    }




    .pizza__pop-up__info-nutritive__triangle{
        /* transform: rotate(180deg); */
        position: relative;
        right: 20px;
        top: 20px;
        width: 70px;
        height: 38px;
    }

    .pizza__pop-up__info-nutritive__content{
        width: 269px;


        background: #343435;
        border-radius: 16px;

        font-family: Open Sans;
        font-style: normal;
        font-weight: 600;
        font-size: 12px;
        line-height: 125%;
        /* identical to box height, or 15px */


        color: #C1C1C1;

        padding: 15px;

    }

    .pizza__pop-up__name__info:hover .pizza__pop-up__info-nutritive__inner{
        display: flex;
    }

    .pizza__pop-up__info-nutritive__content__title{

        font-family: Open Sans;
        font-style: normal;
        font-weight: 600;
        font-size: 12px;
        line-height: 125%;
        /* identical to box height, or 15px */


        color: #808080;
        margin-bottom: 15px;
    }

    .pizza__pop-up__info-nutritive__content__block{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
    }

</style>

<style>
    .pizza__pop-up{
        position: fixed;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        margin: auto;

        width: 790px;
        height: 583px;
        background: #FFFFFF;
        border-radius: 20px;

        /* display: flex; */
        display: none;
        align-items: center;
        /* justify-content: space-around; */
        z-index: 50;
    }

    .pizza__pop-up__img{
        width: 55%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .pizza__pop-up__img-img{
        display: block;
        width: 305px;
        height: 305px;
    }

    .pizza__pop-up__info{
        max-width: 288px;
        display: flex;
        flex-direction: column;
    }

    .pizza__pop-up__name{
        font-family: Open Sans;
        font-style: normal;
        font-weight: bold;
        font-size: 24px;
        line-height: 125%;
        /* identical to box height, or 30px */
        color: #343435;
        margin-bottom: 15px;


        display: flex;
        justify-content: space-between;
    }

    .pizza__pop-up__specifics{
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 125%;
        /* identical to box height, or 17px */
        color: #B0B0B0;
        margin-bottom: 15px;
    }
    .pizza__pop-up__ingredients{
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 125%;
        /* identical to box height, or 17px */
        color: #343435;
        margin-bottom: 30px;
    }

    .pizza__pop-up__add-ingradients{
        display: flex;
        flex-direction: column;
    }

    .pizza__pop-up__add-ingradients__title{
        font-family: Open Sans;
        font-style: normal;
        font-weight: 600;
        font-size: 18px;
        line-height: 125%;
        /* identical to box height, or 22px */
        color: #343435;
        margin-bottom: 20px;
    }

    .pizza__pop-up__ingradients-list{
        display: flex;
        /* justify-content: space-between; */
        flex-wrap: wrap;
        margin-bottom: 8px;
        width: 295px;
        position: relative;
        top: -10px;
        left: -10px;
        padding: 10px 10px 0;

        max-height: 270px;
        overflow-y: scroll;
    }



    .pizza__pop-up__ingradients-list::-webkit-scrollbar{
        width: 7px;
    }
    .pizza__pop-up__ingradients-list::-webkit-scrollbar-thumb {
        background-color: #808080;    /* color of the scroll thumb */
        border-radius: 27px;       /* roundness of the scroll thumb */
        border: 1px solid #fff;  /* creates padding around scroll thumb */
        /* height: 120px; */
        /* margin-top: 10px; */
        /* margin-bottom: 120px; */
    }




    .pizza__pop-up__ingradients-item{
        display: flex;
        flex-direction: column;

        width: 85px;
        height: 120px;
        background: #FFFFFF;
        box-shadow: 0px 4px 17px rgba(0, 0, 0, 0.15);
        border-radius: 5px;
        /* margin: 4px; */

        margin-bottom: 10px;
        margin-right: 4px;
    }

    .pizza__pop-up__ingradients-item__img{
        width: 100%;
        height: 60px;
        padding: 10px 13px;

        display: flex;
        justify-content: center;
        align-items: center;
    }
    .pizza__pop-up__ingradients-item__img-img{
        display: block;
    }

    .pizza__pop-up__ingradients-item__name{
        display: flex;
        justify-content: center;
        align-items: center;

        font-family: Open Sans;
        font-style: normal;
        font-weight: 300;
        font-size: 12px;
        line-height: 125%;
        /* identical to box height, or 15px */
        color: #000000;
        margin-bottom: 15px;
    }

    .pizza__pop-up__ingradients-item__price{
        width: 50px;
        height: 20px;
        background: rgba(235, 92, 39, 0.1);
        border-radius: 17px;
        display: flex;
        justify-content: center;
        align-items: center;

        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 12px;
        line-height: 125%;
        /* identical to box height, or 15px */
        color: #FF6900;

        margin: 0 auto 10px;

        cursor: pointer;
    }
    .pizza__pop-up__ingradients-item__price:hover{
        background: rgba(235, 92, 39, 0.34);
    }

    .pizza__pop-up__price-cart{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .pizza__pop-up__total-price{
        font-family: Open Sans;
        font-style: normal;
        font-weight: bold;
        font-size: 24px;
        line-height: 125%;
        /* identical to box height, or 30px */
        color: #343435;
    }

    .pizza__pop-up__add-to-cart__btn{
        width: 179px;
        height: 40px;
        background: #EB5C27;
        border-radius: 20px;

        display: flex;
        justify-content: center;
        align-items: center;

        font-family: Montserrat;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 125%;
        /* identical to box height, or 17px */
        color: #FFFFFF;

        cursor: pointer;
    }

    .pizza__pop-up__cross{
        display: block;
        position: absolute;
        top: 0;
        right: -71px;
        cursor: pointer;
    }

    .pizza__pop-up__back-arrow--mob{
        display: none;
        width: 55px;
        height: 55px;
        border-radius: 50%;

        /*display: flex;*/
        justify-content: center;
        align-items: center;

        background: #FFFFFF;
        box-shadow: 0px 4px 22px rgba(0, 0, 0, 0.15);

        position: absolute;
        top: 15px;
        left: 15px;
    }
</style>


<style>

@media(max-width: 910px) {





    .pizza__pop-up{
        width: 100%;

    }
    .pizza__pop-up__cross{
        display: none;
    }
    .pizza__pop-up__back-arrow--mob{
        display: flex;
    }
}



@media(max-width: 767px) {
    .pizza__pop-up__add-to-cart__btn{
        max-width: 400px;
        margin: 0 auto;
    }
    .pizza__pop-up__info{
        width: 70%;
    }
    .pizza__pop-up__add-ingradients__title{
        text-align: center;
    }
    .pizza__pop-up__ingradients-list{
        margin: 0 auto;
    }




    .pizza__pop-up{
        width: 100%;
        height: 100%;
        border-radius: 0%;

        flex-direction: column;
        padding-top: 15px;

        overflow-y: scroll;
    }
    .pizza__pop-up__img-img{
        width: 270px;
        height: 270px;
    }
    .pizza__pop-up__img{
        width: auto;
        height: auto;
        margin-bottom: 20px;
    }
    .pizza__pop-up__name{
        font-size: 18px;
    }

    .pizza__pop-up__ingradients-list{
        width: 340px;
    }
    .pizza__pop-up__ingradients-item{
        width: 89px;
        margin-right: 15px;
    }

    .pizza__pop-up__name{
        justify-content: flex-end;
    }
    .pizza__pop-up__name-text{
        flex-grow: 1;
    }
    .pizza__pop-up__price--mob{
        margin: 0 20px;
        white-space: nowrap;

        font-family: Open Sans;
        font-style: normal;
        font-weight: bold;
        font-size: 24px;
        line-height: 125%;
        /* identical to box height, or 30px */


        color: #343435;
    }

    .pizza__pop-up__total-price{
        display: none;
    }


    .pizza__pop-up__add-to-cart__btn-quantity--cost--mob{
        margin-left: 5px;
    }

    .pizza__pop-up__info{
        /*width: 100%;*/
        max-width: 100%;
        padding: 0 15px;
    }

    .pizza__pop-up__add-to-cart__btn{
        width: 100%;
        font-family: Montserrat;
        font-style: normal;
        font-weight: 500;
        font-size: 18px;
        line-height: 125%;
        /* identical to box height, or 22px */


        color: #FFFFFF;

        margin-bottom: 15px;
    }
    .pizza__pop-up__add-to-cart__btn-quantity--cost--mob{
        display: block;
    }

    .pizza__pop-up__back-arrow--mob {
        display: flex;
    }

    .pizza__pop-up__cross{
        display: none;
    }


    .pizza__pop-up__info-nutritive__triangle{
        transform: rotate(143deg);
        right: -15px;
        width: 50px;
        height: 31px;
    }
    .pizza__pop-up__info-nutritive__inner{
        right: 12px;
        top: 15px;
    }
}


@media(max-width: 500px) {
    .pizza__pop-up__info{
        width: 90%;
    }
}
    @media(max-width: 375px) {
        .pizza__pop-up{
            width: 100%;
            height: 100%;
            border-radius: 0%;

            flex-direction: column;
            padding-top: 15px;

            overflow-y: scroll;
        }
        .pizza__pop-up__img-img{
            width: 270px;
            height: 270px;
        }
        .pizza__pop-up__img{
            width: auto;
            height: auto;
            margin-bottom: 20px;
        }
        .pizza__pop-up__name{
            font-size: 18px;
        }

        .pizza__pop-up__ingradients-list{
            width: 340px;
        }
        .pizza__pop-up__ingradients-item{
            width: 89px;
            margin-right: 15px;
        }

        .pizza__pop-up__name{
            justify-content: flex-end;
        }
        .pizza__pop-up__name-text{
            flex-grow: 1;
        }
        .pizza__pop-up__price--mob{
            margin: 0 20px;
            white-space: nowrap;

            font-family: Open Sans;
            font-style: normal;
            font-weight: bold;
            font-size: 24px;
            line-height: 125%;
            /* identical to box height, or 30px */


            color: #343435;
        }

        .pizza__pop-up__total-price{
            display: none;
        }


        .pizza__pop-up__add-to-cart__btn-quantity--cost--mob{
            margin-left: 5px;
        }

        .pizza__pop-up__info{
            width: 100%;
            max-width: 100%;
            padding: 0 15px;
        }

        .pizza__pop-up__add-to-cart__btn{
            width: 100%;
            font-family: Montserrat;
            font-style: normal;
            font-weight: 500;
            font-size: 18px;
            line-height: 125%;
            /* identical to box height, or 22px */


            color: #FFFFFF;

            margin-bottom: 15px;
        }
        .pizza__pop-up__add-to-cart__btn-quantity--cost--mob{
            display: block;
        }

        .pizza__pop-up__back-arrow--mob {
            display: flex;
        }

        .pizza__pop-up__cross{
            display: none;
        }


        .pizza__pop-up__info-nutritive__triangle{
            transform: rotate(143deg);
            right: -15px;
            width: 50px;
            height: 31px;
        }
        .pizza__pop-up__info-nutritive__inner{
            right: 12px;
            top: 15px;
        }
    }
</style>







