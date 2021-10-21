<template>
    <div class="order">
        <HeaderCart :step="2" />

        <div class="container">
            <div class="order__inner">
                <div class="order-title">Оформление заказа</div>
                <div class="required__text">
                    Поля со звездочкой обязательны к заполнению
                </div>

                <form name="order_form" class="order__form">

                    <div class="order__form__main-row">
                        <div class="order__form-input__inner">
                            <input v-model.trim="$v.name.$model" type="text" name="name" placeholder="Имя*"
                            :class="{ 'input-invalid': $v.name.$error }">
                            <div class="order__form-input__invalid" v-if="$v.name.$error">
                                <div class="order__form-input__invalid__text">
                                    Пожалуйста заполните это поле
                                </div>
                                <img src="/images/triangle-black.png" alt="" class="order__form-input__invalid__triangle">
                            </div>
                        </div>

                        <div class="order__form-input__inner">
                            <input v-model.trim="$v.tel.$model" type="phone" name="phone" placeholder="Номер телефона*"
                            :class="{ 'input-invalid': $v.tel.$error }">
                            <div class="order__form-input__invalid" v-if="$v.tel.$error">
                                <div class="order__form-input__invalid__text">
                                    Пожалуйста заполните это поле
                                </div>
                                <img src="/images/triangle-black.png" alt="" class="order__form-input__invalid__triangle">
                            </div>
                        </div>


                    </div>

                    <div class="order__form__sub-row">
                        <div class="order__form-input__inner">
                            <input v-model.trim="$v.city.$model" type="text" name="city" placeholder="Город*"
                            :class="{ 'input-invalid': $v.city.$error }">
                            <div class="order__form-input__invalid" v-if="$v.city.$error">
                                <div class="order__form-input__invalid__text">
                                    Пожалуйста заполните это поле
                                </div>
                                <img src="/images/triangle-black.png" alt="" class="order__form-input__invalid__triangle">
                            </div>
                        </div>

                        <div class="order__form-input__inner">
                            <input v-model.trim="$v.street.$model" type="text" name="street" placeholder="Улица*"
                            :class="{ 'input-invalid': $v.street.$error }">
                            <div class="order__form-input__invalid" v-if="$v.street.$error">
                                <div class="order__form-input__invalid__text">
                                    Пожалуйста заполните это поле
                                </div>
                                <img src="/images/triangle-black.png" alt="" class="order__form-input__invalid__triangle">
                            </div>
                        </div>

                        <div class="order__form-input__inner">
                            <input v-model.trim="$v.house.$model" type="text" name="house" placeholder="Дом*"
                            :class="{ 'input-invalid': $v.house.$error }">
                            <div class="order__form-input__invalid" v-if="$v.house.$error">
                                <div class="order__form-input__invalid__text">
                                    Пожалуйста заполните это поле
                                </div>
                                <img src="/images/triangle-black.png" alt="" class="order__form-input__invalid__triangle">
                            </div>
                        </div>

                        <input type="text" name="apartment" placeholder="Квартира">
                        <input type="text" name="floor" placeholder="Этаж">
                        <input type="text" name="intercom" placeholder="Домофон">
                        <input type="text" name="korpus" placeholder="Корпус">
                        <input type="text" name="entrace" placeholder="Подьезд" >
                    </div>

                    <textarea name="comment" placeholder="Оставить комментарий"></textarea>

                    <div class="order__form-input__inner">
                            <input type="checkbox" name="callback" id="checkbox-id" @click="checkboxMessage" />
                            <label for="checkbox-id">Не перезванивать</label>
                            <div class="order__form-input__invalid checkbox__feedback">
                                <div class="order__form-input__invalid__text">
                                    Мы не будем перезванивать для подтверждения заказа, и свяжемся с Вами только по приезду курьера
                                </div>
                                <img src="/images/triangle-black.png" alt="" class="order__form-input__invalid__triangle">
                            </div>
                        </div>
                    <!-- <input type="checkbox" id="checkbox-id" />
                    <label for="checkbox-id">Не перезванивать</label> -->

                </form>
            </div>


        </div>


        <div class="container">
            <div class="cart__total__inner">
                <div class="cart__total-price">
                    Сумма заказа <span class="span-orange">{{cartTotalCost}} ₽</span>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="cart__btns__inner">
                <router-link class="cart-btn home-btn-gray" to="cart">
                    <img src="/images/btns/arrow-back-black.png" alt="" class="cart-btn__arrow">
                    В корзину
                </router-link>




                <div class="error-msg" v-if="requestError">
                    Произошла ошибка. Попробуйте позже или позвоните по горячему номеру
                </div>
                <a @click="makeOrderRequest" class="cart-btn make-order-btn" to="order-success">
                    Заказать
                    <img src="/images/btns/arrow-next-white.png" alt="" class="cart-btn__arrow">
                </a>
            </div>
        </div>

        <MainFooter/>

    </div>
</template>

<script>
import { required } from 'vuelidate/lib/validators'
import {mapGetters} from 'vuex'

import HeaderCart from '../components/HeaderCart.vue'
import MainFooter from '../components/MainFooter.vue'
import axios from 'axios'

export default {
  name: 'Cart',
  components: {
      HeaderCart,
      MainFooter,

  },
  data() {
        return {
            name: '',
            tel: '',
            city: '',
            street: '',
            house: '',
            checkboxText: false,
            requestError: false,
        }
  },
  validations: {
        name: {
            required,
        },
        tel: {
            required,

        },
        city: {
            required,

        },
        street: {
            required,

        },
        house: {
            required,

        },

  },

  methods: {
        checkboxToggle(){
            if(this.checkboxText == false){this.checkboxText=true}
            else{this.checkboxText=false}
        },

        checkboxMessage(){
            $(".order__form-input__invalid.checkbox__feedback").show('slow');
              setTimeout(function() {
                  $(".order__form-input__invalid.checkbox__feedback").hide('slow');
              }, 5000);
        },

        makeOrderRequest(){
            console.log(this.CART);
            let form = document.forms.order_form;
            let fd = new FormData(form);
            fd.set("callback", !fd.get("callback"));
            fd.set("order", JSON.stringify(this.CART));
            fd.set("total", this.cartTotalCost);

            this.$v.$touch();
            if(this.$v.$invalid || this.CART.length == 0){
                console.log("invalid form");
                return;
            }
            axios.post("/api/make-order", fd)
                .then((res)=>{
                    console.log(res.data);
                    res = res.data;
                    if(res.status){
                        this.$router.push("order-success");
                        this.CART = [];
                    } else {

                    }
                })
                .catch((err)=>{
                    console.log(err);
                });
        }
    // setName(value) {
    //   this.name = value
    //   this.$v.name.$touch()
    // },
    // setTel(value) {
    //   this.tel = value
    //   this.$v.tel.$touch()
    // },
    // setCity(value) {
    //   this.city = value
    //   this.$v.city.$touch()
    // },
    // setStreet(value) {
    //   this.street = value
    //   this.$v.street.$touch()
    // },
    // setHouse(value) {
    //   this.house = value
    //   this.$v.house.$touch()
    // },
  },
    computed: {
        ...mapGetters([
            'CART',
        ]),
        cartTotalCost() {
            let result = [];

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
        }
    },
}
</script>



<style>
    .order__form-input__inner{
        position: relative;
    }
    .order__form-input__invalid{
        max-width: 300px;
        position: absolute;
        bottom: 61px;
        left: 75px;
    }
    .order__form-input__invalid__triangle{
        position: relative;
        bottom: 10px;
        left: 10px;
        z-index: 30;
    }
    .order__form-input__invalid__text{
        width: 220px;
        z-index: 31;
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 12px;
        line-height: 125%;
        /* identical to box height, or 15px */
        color: #C1C1C1;

        padding: 9px 15px;
        background: #343435;
        border-radius: 15px;

        display: flex;
        justify-content: center;
        align-items: center;
    }

    .order__form-input__invalid.checkbox__feedback{
        width: 312px;
        bottom: 40px;
        left: 170px;

        display: none;
    }

    /* #checkbox-id:checked .order__form-input__invalid.checkbox__feedback{
        display: block;
    } */
    .order__form-input__invalid.checkbox__feedback
     .order__form-input__invalid__text{
         width: 100%;
     }
</style>

<style>
    .order__inner{
        width: 795px;
        margin: 0 auto;
    }
    .order-title{
        padding-top: 60px;
        margin-bottom: 40px;
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 36px;
        line-height: 125%;
        /* identical to box height, or 45px */
        color: #343435;
    }
    .required__text{
        margin-bottom: 40px;
        font-family: Open Sans;
        font-style: normal;
        font-weight: 600;
        font-size: 12px;
        line-height: 125%;
        /* identical to box height, or 15px */
        color: #F55B69;
    }
</style>

<style>
    /* order-form */
    .order__form{
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    .order__form__main-row{
        margin-bottom: 40px;
        display: flex;
        align-items: center;
    }
    .order__form__sub-row{
        margin-bottom: 20px;
        display: flex;
        flex-wrap: wrap;
    }

    .order__form input{
        width: 249px;
        height: 41px;
        background: #F3F3F3;
        border-radius: 19px;

        margin-bottom: 20px;
        margin-right: 16px;

        padding: 9px 15px;

        border: none;
    }

    .order__form textarea{
        width: 793px;
        height: 145px;
        background: #F3F3F3;
        border-radius: 19px;

        padding: 15px;

        border: none;
        resize: none;
        margin-bottom: 40px;
    }
</style>

<style scoped>


input[type="checkbox"] {
 display: none;
}

label {
  color: #000;
 cursor: default;
 font-weight: normal;
 line-height: 30px;
 padding: 10px 0;
 vertical-align: middle;

 display: flex;
    flex-direction: row-reverse;
    justify-content: flex-end;
    align-items: center;

    font-family: Open Sans;
font-style: normal;
font-weight: normal;
font-size: 18px;
line-height: 125%;
/* identical to box height, or 22px */


/* Secondary color */

color: #343435;
width: 220px;
}

label:before {
 content: " ";
 color: #000;
 display: inline-block;
/* шрифт Awesome*/
 font: 35px/30px FontAwesome;
 margin-left: 15px;
 position: relative;
 text-align: center;
 text-indent: 0px;
 width: 35px;
 height: 35px;
 background: #F3F3F3;
border: 2px solid #E2E2E2;
box-sizing: border-box;
border-radius: 10px;
 border-image: initial;
 vertical-align: middle;
}

input:checked + label:before {
/* глифон - галочка */
 content: url("/images/checked.svg");
}

input:disabled + label:before {
 background: #eee;
 color: #aaa;
}

.error-msg{
    color: red;
    font-weight: bold;
}

</style>

<style>
    .input-invalid{
        background: #FFEAE8 !important;
        border: 1px solid #F55B69 !important;
    }
</style>


<style>
@media(max-width: 767px) {
    .order .header__cart__inner {
        padding-right: 0;
    }
    .order__inner{
        width: 100%;
    }
    .order-title{
        padding-top: 20px;
        margin-bottom: 15px;
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 24px;
        line-height: 125%;
        color: #343435;
        text-align: center;
    }
    .required__text{
        font-family: Open Sans;
        font-style: normal;
        font-weight: 600;
        font-size: 10px;
        line-height: 125%;
        color: #F55B69;
        text-align: center;
    }
    .order__form{
        width: 100%;
    }
    .order__form__main-row{
        flex-direction: column;
        align-items: flex-start;
        margin-bottom: 0;
    }
    .order__form-input__inner{
        width: 100%;
    }
    .order__form input{
        width: 100%;
        margin-right: 0;
    }
    .order__form textarea{
        width: 100%;
    }

    .order .cart-btn.home-btn-gray{
        display: none;
    }
    .order .cart-btn.make-order-btn{
        margin-right: 0;
        background: #FF6900;
    }
}
    @media(max-width: 375px) {
        .order .header__cart__inner {
             padding-right: 0;
        }
        .order__inner{
            width: 100%;
        }
        .order-title{
            padding-top: 20px;
            margin-bottom: 15px;
            font-family: Open Sans;
            font-style: normal;
            font-weight: normal;
            font-size: 24px;
            line-height: 125%;
            color: #343435;
            text-align: center;
        }
        .required__text{
            font-family: Open Sans;
            font-style: normal;
            font-weight: 600;
            font-size: 10px;
            line-height: 125%;
            color: #F55B69;
            text-align: center;
        }
        .order__form{
            width: 100%;
        }
        .order__form__main-row{
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 0;
        }
        .order__form-input__inner{
            width: 100%;
        }
        .order__form input{
            width: 100%;
            margin-right: 0;
        }
        .order__form textarea{
            width: 100%;
        }

        .order .cart-btn.home-btn-gray{
            display: none;
        }
        .order .cart-btn.make-order-btn{
            margin-right: 0;
            background: #FF6900;
        }

    }
</style>
