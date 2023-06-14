<template>
    <h1>{{ titre }}</h1>

    <section class="quizz" v-if="!quizzFinished && getCurrentQuestion">
        <div class="quizz-questions">
            <span class="question">{{ getCurrentQuestion.question }}</span>
            <!-- <span class="score"> Score : {{ score }} / {{ questions.length }}</span> -->
        </div>

        <div class="quizz-options">
            <label v-for="(option, index) in getCurrentQuestion.options"
            :key="index"
            :class="`option ${
                getCurrentQuestion.selected == index
                ? (index == getCurrentQuestion.answer
                  ? 'vrai'
                  : 'faux')
                : ''
            } ${
                getCurrentQuestion.selected != null &&
                index != getCurrentQuestion.selected
                ? 'disabled'
                : ''
            }`">
                <input type="radio"
                :name="getCurrentQuestion.index"
                :value="index"
                v-model="getCurrentQuestion.selected"
                :disabled="getCurrentQuestion.selected"
                @change="checkAnswer">
                <span class="quizz-reponses">{{ option }}</span>
            </label>
        </div>

        <!-- <button
         @click="nextQuestion"
         :disabled="!getCurrentQuestion.selected">
        {{
           getCurrentQuestion.index == questions.length - 1
           ? 'Fin'
           : getCurrentQuestion.selected == null
             ? 'Réponds'
             : 'Question suivante'
         }}
       </button> -->
    </section>

    <section v-else>
        <h2>Fin</h2>
        <p>Score : {{ score }} / {{ questions.length }}</p>
    </section>
</template>

<script>
import { ref, computed } from "vue";

export default {
    // delimiters: ['[[', ']]'],
    setup(){

        const questions = ref([
    {
        question: "qui a pété ?",
        answer: 0,
        options : [
            "Moi",
            "Toi",
        ],
        selected: null
    },
    {
        question: "Suis-je moche ?",
        answer: 0,
        options : [
            'Oui',
            'Non',
        ],
        selected: null
    }
])

const quizzFinished = ref(false);
const currentQuestion = ref(0);
const score = computed(() => {
    let value = 0
    questions.value.map(q => {
        if (q.selected == q.answer){
            value++
        }
    })

    return value;
})

// const shuffleArray = array => {
//         for (let i = array.length - 1; i > 0; i--) {
//         const j = Math.floor(Math.random() * (i + 1));
//         [array[i], array[j]] = [array[j], array[i]];
//         }
//         return array;
// }

const getCurrentQuestion = computed(() => {
    let question = questions.value[currentQuestion.value]
    question.index = currentQuestion.value
    // questions.options = shuffleArray(questions.options)
    return question
})

// const setAnswer = event => {
//     questions.value[currentQuestion.value].selected = event.target.value
//     event.target.value = null
// }

const nextQuestion = () => {
    if (currentQuestion.value < questions.value.length - 1){
        currentQuestion.value ++
    }else{
            quizzFinished.value = true
        }
    };

const checkAnswer = () => {
    if (getCurrentQuestion.value.selected !== null){
        nextQuestion();
    }
}

    return {
        questions,
        quizzFinished,
        currentQuestion,
        score,
        // shuffleArray,
        getCurrentQuestion,
        // setAnswer,
        nextQuestion,
        checkAnswer,
    };
    },

};

</script>
