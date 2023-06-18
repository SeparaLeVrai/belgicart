<template>
    <div class="homepage">
        <Carousel class="carousel">
            <Slide
            v-for="(slide, index) in carouselSlides"
            :key="index">
                <div class="slide-info">
                    <img
                    :src="
                    require(
                        `../js/assets/${slide}.jpg`)"
                        alt=""
                     />
                </div>
            </Slide>
        </Carousel>
    </div>
</template>


<script>
import Carousel from './sliders/Carousel.vue';
import Slider from './sliders/Slider.vue';

export default{
    name:'App',
    components: {
        Carousel,
        Slider
    },
    setup(){
        const carouselSlides = [
            'photo1',
            'photo2',
            'photo3'
        ];

    return { carouselSlides };
    }
};
</script>

<style scoped>
.carousel
{
    max-height: 100vh;
    height:100vh;
}
</style>
