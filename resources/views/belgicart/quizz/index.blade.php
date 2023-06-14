<x-guest-layout class="w-9/12">
    <div id="vue"></div>
</x-guest-layout>

<script>
    import Vue from "vue";
    import Quizz from '../../../js/Quizz.vue';
    new Vue({
        el: "#vue",
        components: {
            Quizz,
        },
    });
</script>
