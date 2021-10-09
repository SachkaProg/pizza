<template>
    <div class="main-nav">
        <div class="container">
            <div class="main-nav__inner">
                <ul class="main-nav__list">
                    <li class="main-nav__item">
                        <a href="#" class="main-nav__item-link"  @click="toggleActive">
                            Новинки
                        </a>
                        <span class="item-link__circle"></span>
                    </li>
                    <li class="main-nav__item">
                        <a href="#" class="main-nav__item-link"  @click="toggleActive">
                            Пицца
                        </a>
                        <span class="item-link__circle"></span>
                    </li>
                    <li class="main-nav__item">
                        <a href="#" class="main-nav__item-link"  @click="toggleActive">
                            Комбо
                        </a>
                        <span class="item-link__circle"></span>
                    </li>
                    <li class="main-nav__item">
                        <a href="#" class="main-nav__item-link"  @click="toggleActive">
                            Закуски
                        </a>
                        <span class="item-link__circle"></span>
                    </li>
                    <li class="main-nav__item">
                        <a href="#" class="main-nav__item-link"  @click="toggleActive">
                            Десерты
                        </a>
                        <span class="item-link__circle"></span>
                    </li>
                    <li class="main-nav__item">
                        <a href="#" class="main-nav__item-link"  @click="toggleActive">
                            Напитки
                        </a>
                        <span class="item-link__circle"></span>
                    </li>
                    <li class="main-nav__item">
                        <a href="#" class="main-nav__item-link"  @click="toggleActive">
                            Другие товары
                        </a>
                        <span class="item-link__circle"></span>
                    </li>
                    <li class="main-nav__item">
                        <a href="#" class="main-nav__item-link"  @click="toggleActive">
                            Акции
                        </a>
                        <span class="item-link__circle"></span>
                    </li>
                    <li class="main-nav__item">
                        <a href="footer" class="main-nav__item-link" @click="scrollAnch($event)">
                            Контакты
                        </a>
                        <span class="item-link__circle"></span>
                    </li>
                    <li class="main-nav__item">
                        <a href="footer" class="main-nav__item-link" @click="scrollAnch($event)">
                            О нас
                        </a>
                        <span class="item-link__circle"></span>
                    </li>
                </ul>
                <router-link class="main-nav__cart" to="cart">
                    Корзина
                    <CartPopUp/>
                </router-link>

            </div>
        </div>
    </div>
</template>

<script>
import CartPopUp from './CartPopUp.vue'

export default {
    name: 'MainNav',
    components: {
        CartPopUp
    },
    data: () => ({
        categories: [],
        category: 'Новинки',

    }),
    methods: {
        toggleActive: function(event){
            let matches = document.querySelectorAll('.main-nav__item-link');
            for(let i = 0; i < matches.length; i++){
                matches[i].classList.remove('active');
            }
            event.target.classList.toggle('active');
            this.category = event.target.innerHTML.trim();
            this.$emit('changeCategory', this.category)

            console.log(this.category);

            var myEl = document.getElementById('shop');
            $(myEl).fadeOut();
            $('body,html').animate({scrollTop: myEl.offsetTop - 80}, 1500);
            $(myEl).fadeIn(1800);
        },
        scrollAnch(event){

            event.preventDefault();
            var myId = event.target.getAttribute('href');


            var myEl = document.getElementById(myId);

            $(myId).fadeOut();
            $('body,html').animate({scrollTop: myEl.offsetTop - 80}, 1500);
            $(myId).fadeIn(1800);

        }
    }

}
</script>

<style>
    .main-nav__item{
        position: relative;
    }
    .item-link__circle{
        display: none;
        position: absolute;
        top: 0;
        right: -5px;
        width: 5px;
        height: 5px;
        background: #E34554;
        border-radius: 50%;
    }
    .main-nav__item-link.active + .item-link__circle{
        display: block;
    }


    .main-nav__inner{
        height: 64px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .main-nav__list{
        margin: 0;
        padding: 0;

        display: flex;
    }
    .main-nav__item{
        list-style-type: none;
    }
    .main-nav__item+.main-nav__item{
        margin-left: 20px;
    }
    .main-nav__item-link{
        font-family: Montserrat;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 125%;
        /* identical to box height, or 17px */


        color: #343435;
    }
    .main-nav__cart{
        width: 105px;
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
        color: #fff;

        cursor: pointer;

        position: relative;
    }

    .main-nav__cart:hover .cart__pop-up{
        display: flex;
    }
</style>




