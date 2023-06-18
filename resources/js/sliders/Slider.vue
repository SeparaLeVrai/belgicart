<template>
    <div class="slide">
        <transition name="slide">
            <slot />
        </transition>
    </div>
</template>

<script>
export default{
    name:'Slider',
    components: {

    },
}
</script>

<style scoped>
</style>
