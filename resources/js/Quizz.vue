<template>
    <!-- v-for="question in questions"
            :key="question.id" -->

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

    <section v-else class="quizz-fin">
        <h2>Fin</h2>
        <p>Score : {{ score }} / {{ questions.length }}</p>
        <!-- <button @click="sendScore">Enregistrer le score</button> -->
    </section>
</template>

<style>

.quizz, .quizz-fin
{
background-color: rgb(235, 195, 32);
padding:1rem;
width:100%;
max-width: 640px;
border-radius: .5rem;
}
.quizz-questions
{
    display:flex;
    justify-content: space-between;
    margin-bottom: 1rem;
}

.question
{
    color:rgb(25, 41, 80);
    font-size:1.5rem;
}

.quizz-options
{
    margin-bottom:1rem;
}

.option 
{
    display:block;
    padding:1rem;
    background-color: rgb(25, 41, 80);
    margin-bottom: .5rem;
    border-radius: .5rem;
    cursor: pointer;
    text-align: center;
}

.option:hover
{
    background-color: rgb(76, 43, 167);
}

.option:last-of-type{
    margin-bottom: 0;
}

.option.disabled
{
    opacity:.5;
}

.option input
{
    display:none;
}

.quizz-reponses
{
    color:gold;
    
}

h2
{
    color:rgb(25, 41, 80);
    font-size: 2rem;
    margin-bottom: 2rem;
    text-align: center;
}

p
{
    color:rgb(25, 41, 80);
    font-size: 1.5rem;
}

</style>

<script>
import { ref, computed, onMounted } from "vue";
import axios from 'axios';
// import { auth } from '@/services/auth';
// import Question from "./././Model/Question";

export default {
    // delimiters: ['[[', ']]'],
    setup(){

        const questions = ref([
            {
            question : 'Quel est le point culminant de la Belgique ?',
            answer: 0,
            options: [
                'Signal de Botrange',
                'Baraque Michel'
            ]
            },
            {
            question : "Lequel de ces cours d'eau est un fleuve ?",
            answer: 1,
            options: [
            "La Mehaigne",
                "La Meuse"
            ]
            },
            {
            question: "Il existe une version chien du Manneken-Pis.",
            answer: 0,
            options: [
                "Vrai",
                "Faux"
            ]
            },
            {
                question : "Quelle est la ville la plus peuplée de Belgique ?",
                answer:0,
                options: [
                    "Anvers",
                    "Bruxelles",
                ]
            },
            {
                question: "Il existe en Belgique, une grande étendue de sable considérée comme un petit Sahara. Après quelle ville est-elle nommée ?",
                answer: 1,
                options: [
                    "Genk",
                    "Lommel"
                ]
            },
            {
                question: "Quelle région de Belgique est la plus densément peuplée ?",
                answer:0,
                options: [
                    "La Flandre",
                    "La Wallonie"
                ]
            },
            {
                question: "Quelle mer la Belgique borde-t-elle ?",
                answer:0,
                options: [
                    "La Mer du Nord",
                    "La Manche"
                ]
            },
            {
                question: "Comment s'appelle l'ancienne ligne de fer qui crée des frontières étranges entre la Belgique et l'Allemagne ?",
                answer:1,
                options: [
                    "La Wasserbahn",
                    "La Vennbahn"
                ]
            },
            {
                question: "Dans quelle province se situe le plateau de Herve, connu pour son bocage ?",
                answer:1,
                options: [
                    "Namur",
                    "Liège"
                ]
            },
            {
                question: "Dans quel arrondissement bruxellois se situe l'Atomium ?",
                answer:1,
                options: [
                    "Anderlecht",
                    "Laeken"
                ]
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

const sendScore = () => {
    const scoreData = {
        user_id: auth.user.id,
        score: score.value
    };

    axios.post('/scores', scoreData)
        .then(response => {
            console.log('Score enregistré avec succès');
        })
        .catch(error => {
            console.error('Erreur lors de l\'enregistrement du score', error);
        });
};

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
        // getQuestions,
        sendScore,
    };
    },

};

</script>
