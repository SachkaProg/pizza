<template>
    <div class="main">
        <Header/>
        <MainNav @changeCategory="changeCategory" />
        <MainSlider/>
        <PopularSlider heading="Популярные"/>
        <NavMobile @changeCategory="changeCategory" />
        <CartIconMob />
<!--        <New/>-->
        <Shop v-if="shopCategory != 'Пицца'" :heading="this.shopCategory" :key="this.shopCategory"/>
        <Pizza v-if="shopCategory == 'Пицца'" @pizzaInfo="pizzaInfo" />
        <MainFooter/>
        <PizzaPopUp :pizza_data="this.pizzaPopUpInfo"/>
        <AddToCartSuccess/>
    </div>
</template>

<script>
import Header from '../components/Header.vue'
import MainNav from '../components/MainNav.vue'
import MainSlider from '../components/MainSlider.vue'
import PopularSlider from '../components/PopularSlider.vue'
import New from '../components/New.vue'
import Pizza from '../components/Pizza.vue'
import MainFooter from '../components/MainFooter.vue'
import PizzaPopUp from '../components/PizzaPopUp.vue'
import AddToCartSuccess from '../components/AddToCartSuccess.vue'
import NavMobile from '../components/NavMobile.vue'
import CartIconMob from '../components/CartIconMob.vue'

import Shop from '../components/Shop.vue'

export default {
    name: 'Main',
    data: () => ({
        pizzaPopUpInfo: {},
        shopCategory: 'Новинки',
    }),
    components: {
        Header,
        MainNav,
        MainSlider,
        PopularSlider,
        New,
        Pizza,
        MainFooter,
        PizzaPopUp,
        AddToCartSuccess,
        NavMobile,
        CartIconMob,
        Shop
    },
    mounted(){
        $(document).ready(function(){
            $('.popular-slider').not('.slick-initialized').slick({
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
            });

        });

        $(document).ready(function(){
            $('.main-slider').not('.slick-initialized').slick({
                slidesToShow: 1,
                centerMode: true,
                centerPadding: '60px',
                variableWidth: true,
                dots: true,
                appendDots: $('.slick-slider-dots'),
                arrows: false,
                infinite: true,
                speed: 1000,
                autoplay: true,
                autoplaySpeed: 3000,
                responsive: [
                    {
                        breakpoint: 375,
                        settings: {
                            dots: false
                        }
                    },
                ],
            });

        });
    },
    methods: {
        pizzaInfo(item){
            this.pizzaPopUpInfo = item;
            this.pizzaPopUp();
        },
        pizzaPopUp(){
            $('body').addClass('open');
            $('.pizza__pop-up').css('display', 'flex');
        },

        changeCategory(data){
            console.log(data);
            this.shopCategory = data;
        }

    }
}
</script>

<style>
    @media(max-width: 940px) {
        .main-nav{
            display: none;
        }
        .container{
            padding: 0 15px;
        }
    }
    @media(max-width: 375px) {
        .main-nav{
            display: none;
        }
    }

</style>



