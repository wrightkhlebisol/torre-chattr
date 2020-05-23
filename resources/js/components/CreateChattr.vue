<template>
    <span class="lg:w-2/3 w-1/2">
        <button class="border-solid border-2 mb-5 border-gray-200 rounded-full lg:text-sm lg:p-2 p-1 float-right" @click="toggleCreateChattr">Create Chattr 🖊</button>
        <div v-if="toggleChattr">
            <form @submit.prevent="createChattr">
                <div class="mb-2">
                    <input type="text" class="w-full p-2 h-30 border-solid border-2 rounded-md border-black-200 sm:text-xs text-sm" placeholder="Your Torre username" v-model="username" @blur="getUserProfile">
                    <p class="text-green-400 text-xs">..fetching user records from torre servers</p>
                    <p class="text-red-400 text-xs">..invalid username, please update the username field</p>
                </div>
                <textarea class="w-full p-2 h-30 border-solid border-2 rounded-md border-black-200 sm:text-xs text-sm" name="chattr" id="chattr" placeholder="Create some chattr around this job opportunity" v-model="chattr"></textarea>
                <input type="submit" class="cursor-pointer rounded-md py-2 px-5 text-white text-sm bg-black" value="Publish">
                <p class="text-red-400">{{ chattr }} from {{ username }}</p>
            </form>
        </div>
    </span>

</template>

<script>
    export default {
        data() {
            return {
                chattr: "",
                toggleChattr: false,
                username: "",
            }
        },
        methods: {
            getUserProfile(){
                // axios
                // .get(`https://bio.torre.co/api/bios/${this.username}`)
                // .then(res => console.log(res))
                // .catch(e => console.log(e))
                // this.username
            },
            toggleCreateChattr(){
                this.toggleChattr = !this.toggleChattr;
            },
            createChattr(){
                axios.post('/', {
                    user: this.username,
                    chattr: this.chattr
                }).then()
                .catch()
                // if(this.chattr){
                //     alert(this.chattr)
                // }else{
                //     alert("Please enter some chattr")
                // }
            }
        },
        mounted() {
            // console.log('Component mounted.')
        }
    }
</script>
